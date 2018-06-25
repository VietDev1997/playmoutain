<div id="highcharts-3582e750-5e20-42f0-9619-92a5df04e8a1"></div>
<script>
    (function () {
        var files = ["https://code.highcharts.com/stock/highstock.js", "https://code.highcharts.com/highcharts-more.js", "https://code.highcharts.com/highcharts-3d.js", "https://code.highcharts.com/modules/data.js", "https://code.highcharts.com/modules/exporting.js", "https://code.highcharts.com/modules/funnel.js", "https://code.highcharts.com/modules/annotations.js", "https://code.highcharts.com/modules/solid-gauge.js"],
            loaded = 0;
        if (typeof window["HighchartsEditor"] === "undefined") {
            window.HighchartsEditor = {ondone: [cl], hasWrapped: false, hasLoaded: false};
            include(files[0]);
        } else {
            if (window.HighchartsEditor.hasLoaded) {
                cl();
            } else {
                window.HighchartsEditor.ondone.push(cl);
            }
        }

        function isScriptAlreadyIncluded(src) {
            var scripts = document.getElementsByTagName("script");
            for (var i = 0; i < scripts.length; i++) {
                if (scripts[i].hasAttribute("src")) {
                    if ((scripts[i].getAttribute("src") || "").indexOf(src) >= 0 || (scripts[i].getAttribute("src") === "http://code.highcharts.com/highcharts.js" && src === "https://code.highcharts.com/stock/highstock.js")) {
                        return true;
                    }
                }
            }
            return false;
        }

        function check() {
            if (loaded === files.length) {
                for (var i = 0; i < window.HighchartsEditor.ondone.length; i++) {
                    try {
                        window.HighchartsEditor.ondone[i]();
                    } catch (e) {
                        console.error(e);
                    }
                }
                window.HighchartsEditor.hasLoaded = true;
            }
        }

        function include(script) {
            function next() {
                ++loaded;
                if (loaded < files.length) {
                    include(files[loaded]);
                }
                check();
            }

            if (isScriptAlreadyIncluded(script)) {
                return next();
            }
            var sc = document.createElement("script");
            sc.src = script;
            sc.type = "text/javascript";
            sc.onload = function () {
                next();
            };
            document.head.appendChild(sc);
        }

        function each(a, fn) {
            if (typeof a.forEach !== "undefined") {
                a.forEach(fn);
            } else {
                for (var i = 0; i < a.length; i++) {
                    if (fn) {
                        fn(a[i]);
                    }
                }
            }
        }

        var inc = {}, incl = [];
        each(document.querySelectorAll("script"), function (t) {
            inc[t.src.substr(0, t.src.indexOf("?"))] = 1;
        });

        function cl() {
            if (typeof window["Highcharts"] !== "undefined") {
                var options = {
                    "chart": {
                        "type": "column",
                        "margin": 75,
                        "height":711,
                        "width":1116,
                        "options3d": {"enabled": true, "alpha": 15, "beta": 15, "depth": 50, "viewDistance": 15},
                        "polar": false
                    },
                    "plotOptions": {
                        "column": {
                            "depth": 25,
                            "stacking": "normal",
                            "dataLabels": {"enabled": true, "color": "white"}
                        }, "series": {"stacking": "normal"}
                    },
                    "title": {"text": "Categorized, four series"},
                    "legend": {
                        "align": "right",
                        "x": -30,
                        "verticalAlign": "top",
                        "y": 25,
                        "floating": true,
                        "backgroundColor": "#E0E0E8",
                        "borderColor": "#CCC",
                        "borderWidth": 1,
                        "shadow": false,
                        "layout": "horizontal",
                        "enabled": true,
                        "itemStyle": {
                            "fontFamily": "\"Lucida Grande\", \"Lucida Sans Unicode\", Verdana, Arial, Helvetica, sans-serif",
                            "color": "#333333",
                            "fontSize": "12px",
                            "fontWeight": "bold",
                            "fontStyle": "normal",
                            "cursor": "pointer"
                        }
                    },
                    "tooltip": {
                        "headerFormat": "<b>{point.x}</b><br/>",
                        "pointFormat": "{series.name}: {point.y}<br/>Total: {point.stackTotal}"
                    },
                    "series": [{"name": "Tokyo", "turboThreshold": 0, "type": "line"}, {
                        "name": "New York",
                        "turboThreshold": 0
                    }, {"name": "Berlin", "turboThreshold": 0}, {"name": "London", "turboThreshold": 0}],
                    "data": {
                        "csv": "Categories,Tokyo,New York,Berlin,London\nJan,7,-0.2,-0.9,3.9\nFeb,6.9,0.8,0.6,4.2\nMar,9.5,5.7,3.5,5.7\nApr,14.5,11.3,8.4,8.5\nMay,18.2,17,13.5,11.9\nJun,21.5,22,17,15.2\nJul,25.2,24.8,18.6,17\nAug,26.5,24.1,17.9,16.6\nSep,23.3,20.1,14.3,14.2\nOct,18.3,14.1,9,10.3\nNov,13.9,8.6,3.9,6.6\nDec,9.6,2.5,1,4.8",
                        "googleSpreadsheetKey": false,
                        "googleSpreadsheetWorksheet": false
                    },
                    "subtitle": {"text": ""},
                    "credits": {"enabled": false},
                    "exporting": {"sourceWidth": 10},
                    "accessibility": {"enabled": true, "describeSingleSeries": false},
                    "boost": {
                        "debug": {
                            "showSkipSummary": false,
                            "timeBufferCopy": false,
                            "timeKDTree": false,
                            "timeRendering": false,
                            "timeSeriesProcessing": false,
                            "timeSetup": false
                        }
                    },
                    "pane": {"background": []},
                    "responsive": {"rules": []},
                    "yAxis": [{"title": {}}]
                };
                /*
                // Sample of extending options:
                Highcharts.merge(true, options, {
                    chart: {
                        backgroundColor: "#bada55"
                    },
                    plotOptions: {
                        series: {
                            cursor: "pointer",
                            events: {
                                click: function(event) {
                                    alert(this.name + " clicked\n" +
                                          "Alt: " + event.altKey + "\n" +
                                          "Control: " + event.ctrlKey + "\n" +
                                          "Shift: " + event.shiftKey + "\n");
                                }
                            }
                        }
                    }
                });
                */
                new Highcharts.Chart("highcharts-3582e750-5e20-42f0-9619-92a5df04e8a1", options);
            }
        }
    })();
</script>