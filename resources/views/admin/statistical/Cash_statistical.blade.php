@extends('admin.master')
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-6 container-fluid">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h2 class="h1 display">Search</h2>
                </div>
                <form action="">
                    <table class="table col-lg-6 table-sm">
                        <tbody>
                        <tr>
                            <td>Start Date</td>
                            <th>
                                <div class="input-group date">
                                    <input type="text" name="begin" class="form-control" value="2018-05-01"><span
                                            class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                End Date
                            </td>
                            <th>
                                <div class="input-group date">
                                    <input type="text" name="end" class="form-control" value="2018-05-16"><span
                                            class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>Store</td>
                            <td>
                                <select class="form-control" name="shop_id" id="shop_id">
                                    <option value="">All</option>
                                    <option value="1">岡崎店</option>
                                    <option value="5">名古屋店</option>
                                    <option value="6">今池店</option>
                                    <option value="7">ボルダランド</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input class="btn btn-primary" type="submit" name="submit" value="Statistics">   
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="row" id="statistics_sale_onl">
        <div class="col-lg-12 container-fluid">
            <div id="chart_card" style="min-width: 310px; height: 400px; margin: 0 auto" data-highcharts-chart="0">
                <div id="highcharts-cwjsnjd-0" dir="ltr" class="highcharts-container "
                     style="position: relative; overflow: hidden; width: 626px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                    <svg version="1.1" class="highcharts-root"
                         style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;"
                         xmlns="http://www.w3.org/2000/svg" width="626" height="400" viewBox="0 0 626 400">
                        <desc>Created with Highcharts 6.1.0</desc>
                        <defs>
                            <clipPath id="highcharts-cwjsnjd-1">
                                <rect x="0" y="0" width="374" height="340" fill="none"></rect>
                            </clipPath>
                        </defs>
                        <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="626" height="400" rx="0"
                              ry="0"></rect>
                        <rect fill="none" class="highcharts-plot-background" x="144" y="45" width="374"
                              height="340"></rect>
                        <g class="highcharts-grid highcharts-xaxis-grid "></g>
                        <g class="highcharts-grid highcharts-yaxis-grid ">
                            <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"></path>
                        </g>
                        <g class="highcharts-grid highcharts-yaxis-grid ">
                            <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"></path>
                        </g>
                        <rect fill="none" class="highcharts-plot-border" x="144" y="45" width="374" height="340"></rect>
                        <g class="highcharts-axis highcharts-xaxis ">
                            <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1"
                                  d="M 144 385.5 L 518 385.5"></path>
                        </g>
                        <g class="highcharts-axis highcharts-yaxis ">
                            <text x="22.34375" text-anchor="middle" transform="translate(0,0) rotate(270 22.34375 215)"
                                  class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="215">
                                <tspan>Sales amount</tspan>
                            </text>
                            <path fill="none" class="highcharts-axis-line" d="M 144 45 L 144 385"></path>
                        </g>
                        <g class="highcharts-axis highcharts-yaxis ">
                            <text x="604.1875" text-anchor="middle" transform="translate(0,0) rotate(90 604.1875 215)"
                                  class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="215">
                                <tspan>People</tspan>
                            </text>
                            <path fill="none" class="highcharts-axis-line" d="M 518 45 L 518 385"></path>
                        </g>
                        <g class="highcharts-series-group">
                            <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-color-0  highcharts-tracker"
                               transform="translate(144,45) scale(1 1)" clip-path="url(#highcharts-cwjsnjd-1)"></g>
                            <g class="highcharts-markers highcharts-series-0 highcharts-column-series highcharts-color-0 "
                               transform="translate(144,45) scale(1 1)" clip-path="none"></g>
                            <g class="highcharts-series highcharts-series-1 highcharts-column-series highcharts-color-1  highcharts-tracker"
                               transform="translate(144,45) scale(1 1)" clip-path="url(#highcharts-cwjsnjd-1)"></g>
                            <g class="highcharts-markers highcharts-series-1 highcharts-column-series highcharts-color-1 "
                               transform="translate(144,45) scale(1 1)" clip-path="none"></g>
                            <g class="highcharts-series highcharts-series-2 highcharts-column-series highcharts-color-2  highcharts-tracker"
                               transform="translate(144,45) scale(1 1)" clip-path="url(#highcharts-cwjsnjd-1)"></g>
                            <g class="highcharts-markers highcharts-series-2 highcharts-column-series highcharts-color-2 "
                               transform="translate(144,45) scale(1 1)" clip-path="none"></g>
                            <g class="highcharts-series highcharts-series-3 highcharts-column-series highcharts-color-3  highcharts-tracker"
                               transform="translate(144,45) scale(1 1)" clip-path="url(#highcharts-cwjsnjd-1)"></g>
                            <g class="highcharts-markers highcharts-series-3 highcharts-column-series highcharts-color-3 "
                               transform="translate(144,45) scale(1 1)" clip-path="none"></g>
                            <g class="highcharts-series highcharts-series-4 highcharts-column-series highcharts-color-4  highcharts-tracker"
                               transform="translate(144,45) scale(1 1)" clip-path="url(#highcharts-cwjsnjd-1)"></g>
                            <g class="highcharts-markers highcharts-series-4 highcharts-column-series highcharts-color-4 "
                               transform="translate(144,45) scale(1 1)" clip-path="none"></g>
                            <g class="highcharts-series highcharts-series-5 highcharts-column-series highcharts-color-5  highcharts-tracker"
                               transform="translate(144,45) scale(1 1)" clip-path="url(#highcharts-cwjsnjd-1)"></g>
                            <g class="highcharts-markers highcharts-series-5 highcharts-column-series highcharts-color-5 "
                               transform="translate(144,45) scale(1 1)" clip-path="none"></g>
                            <g class="highcharts-series highcharts-series-6 highcharts-column-series highcharts-color-6  highcharts-tracker"
                               transform="translate(144,45) scale(1 1)" clip-path="url(#highcharts-cwjsnjd-1)"></g>
                            <g class="highcharts-markers highcharts-series-6 highcharts-column-series highcharts-color-6 "
                               transform="translate(144,45) scale(1 1)" clip-path="none"></g>
                            <g class="highcharts-series highcharts-series-7 highcharts-spline-series highcharts-color-7 "
                               transform="translate(144,45) scale(1 1)" clip-path="url(#highcharts-cwjsnjd-1)"></g>
                            <g class="highcharts-markers highcharts-series-7 highcharts-spline-series highcharts-color-7 "
                               transform="translate(144,45) scale(1 1)"></g>
                        </g>
                        <text x="313" text-anchor="middle" class="highcharts-title"
                              style="color:#333333;font-size:18px;fill:#333333;" y="24">
                            <tspan>PlayMountain 売上集計</tspan>
                        </text>
                        <text x="313" text-anchor="middle" class="highcharts-subtitle"
                              style="color:#666666;fill:#666666;" y="44"></text>
                        <g class="highcharts-stack-labels" visibility="visible" transform="translate(144,45)"></g>
                        <g class="highcharts-stack-labels" visibility="visible" transform="translate(144,45)"></g>
                        <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-color-0  highcharts-tracker"
                           transform="translate(144,45) scale(1 1)" opacity="1" visibility="visible"></g>
                        <g class="highcharts-data-labels highcharts-series-1 highcharts-column-series highcharts-color-1  highcharts-tracker"
                           transform="translate(144,45) scale(1 1)" opacity="1" visibility="visible"></g>
                        <g class="highcharts-data-labels highcharts-series-2 highcharts-column-series highcharts-color-2  highcharts-tracker"
                           transform="translate(144,45) scale(1 1)" opacity="1" visibility="visible"></g>
                        <g class="highcharts-data-labels highcharts-series-3 highcharts-column-series highcharts-color-3  highcharts-tracker"
                           transform="translate(144,45) scale(1 1)" opacity="1" visibility="visible"></g>
                        <g class="highcharts-data-labels highcharts-series-4 highcharts-column-series highcharts-color-4  highcharts-tracker"
                           transform="translate(144,45) scale(1 1)" opacity="1" visibility="visible"></g>
                        <g class="highcharts-data-labels highcharts-series-5 highcharts-column-series highcharts-color-5  highcharts-tracker"
                           transform="translate(144,45) scale(1 1)" opacity="1" visibility="visible"></g>
                        <g class="highcharts-data-labels highcharts-series-6 highcharts-column-series highcharts-color-6  highcharts-tracker"
                           transform="translate(144,45) scale(1 1)" opacity="1" visibility="visible"></g>
                        <g class="highcharts-legend" transform="translate(-97,30)">
                            <rect fill="white" class="highcharts-legend-box" rx="0" ry="0" stroke="#CCC"
                                  stroke-width="1" x="0.5" y="0.5" width="612" height="34" visibility="visible"></rect>
                            <g>
                                <g>
                                    <g class="highcharts-legend-item highcharts-column-series highcharts-color-0 highcharts-series-0"
                                       transform="translate(8,3)">
                                        <text x="21"
                                              style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                              text-anchor="start" y="15">
                                            <tspan>Purchase</tspan>
                                        </text>
                                        <rect x="2" y="4" width="12" height="12" fill="#7cb5ec" rx="6" ry="6"
                                              class="highcharts-point"></rect>
                                    </g>
                                    <g class="highcharts-legend-item highcharts-column-series highcharts-color-1 highcharts-series-1"
                                       transform="translate(131.484375,3)">
                                        <text x="21" y="15"
                                              style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                              text-anchor="start">
                                            <tspan>Rental</tspan>
                                        </text>
                                        <rect x="2" y="4" width="12" height="12" fill="#434348" rx="6" ry="6"
                                              class="highcharts-point"></rect>
                                    </g>
                                    <g class="highcharts-legend-item highcharts-column-series highcharts-color-2 highcharts-series-2"
                                       transform="translate(254.96875,3)">
                                        <text x="21" y="15"
                                              style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                              text-anchor="start">
                                            <tspan>Prepaid</tspan>
                                        </text>
                                        <rect x="2" y="4" width="12" height="12" fill="#90ed7d" rx="6" ry="6"
                                              class="highcharts-point"></rect>
                                    </g>
                                    <g class="highcharts-legend-item highcharts-column-series highcharts-color-3 highcharts-series-3"
                                       transform="translate(378.453125,3)">
                                        <text x="21" y="15"
                                              style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                              text-anchor="start">
                                            <tspan>Season Ticket</tspan>
                                        </text>
                                        <rect x="2" y="4" width="12" height="12" fill="#f7a35c" rx="6" ry="6"
                                              class="highcharts-point"></rect>
                                    </g>
                                    <g class="highcharts-legend-item highcharts-column-series highcharts-color-4 highcharts-series-4"
                                       transform="translate(501.9375,3)">
                                        <text x="21" y="15"
                                              style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                              text-anchor="start">
                                            <tspan>Service</tspan>
                                        </text>
                                        <rect x="2" y="4" width="12" height="12" fill="#8085e9" rx="6" ry="6"
                                              class="highcharts-point"></rect>
                                    </g>
                                    <g class="highcharts-legend-item highcharts-column-series highcharts-color-5 highcharts-series-5"
                                       transform="translate(8,15)">
                                        <text x="21" y="15"
                                              style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                              text-anchor="start">
                                            <tspan>Register</tspan>
                                        </text>
                                        <rect x="2" y="4" width="12" height="12" fill="#f15c80" rx="6" ry="6"
                                              class="highcharts-point"></rect>
                                    </g>
                                    <g class="highcharts-legend-item highcharts-column-series highcharts-color-6 highcharts-series-6"
                                       transform="translate(131.484375,15)">
                                        <text x="21" y="15"
                                              style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                              text-anchor="start">
                                            <tspan>Report</tspan>
                                        </text>
                                        <rect x="2" y="4" width="12" height="12" fill="#e4d354" rx="6" ry="6"
                                              class="highcharts-point"></rect>
                                    </g>
                                    <g class="highcharts-legend-item highcharts-spline-series highcharts-color-7 highcharts-series-7"
                                       transform="translate(254.96875,15)">
                                        <path fill="none" d="M 0 11 L 16 11" class="highcharts-graph" stroke="#2b908f"
                                              stroke-width="2"></path>
                                        <path fill="#2b908f"
                                              d="M 12 11 A 4 4 0 1 1 11.999998000000167 10.996000000666664 Z"
                                              class="highcharts-point"></path>
                                        <text x="21" y="15"
                                              style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                              text-anchor="start">
                                            <tspan>Come In</tspan>
                                        </text>
                                    </g>
                                </g>
                            </g>
                        </g>
                        <g class="highcharts-axis-labels highcharts-xaxis-labels "></g>
                        <g class="highcharts-axis-labels highcharts-yaxis-labels ">
                            <text x="0" style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                  text-anchor="end" transform="translate(0,0)" y="-9999">
                                <tspan>NaN Thousand yen</tspan>
                            </text>
                        </g>
                        <g class="highcharts-axis-labels highcharts-yaxis-labels ">
                            <text x="0" style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                  text-anchor="start" transform="translate(0,0)" y="-9999">
                                <tspan>NaN People</tspan>
                            </text>
                        </g>
                        <text x="616" class="highcharts-credits" text-anchor="end"
                              style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="395">Highcharts.com
                        </text>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 container-fluid">
            <div class="card" style="overflow: scroll;">
                <div class="card-body">
                    <table class="table col-lg-12">
                        <thead>
                        <tr class="fonsize_total title">
                            <th>DateTime</th>
                            <th>Purchase</th>
                            <th>Rental</th>
                            <th>Prepaid</th>
                            <th>Season Ticket</th>
                            <th>Service</th>
                            <th>Register</th>
                            <th>Come In</th>
                            <th>Purchase online</th>
                            <th>Report</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="fonsize_total">
                            <th>Total</th>
                            <th>0</th>
                            <th>0.0</th>
                            <th>0.0</th>
                            <th>0.0</th>
                            <th>0.0</th>
                            <th>0.0</th>
                            <th>0.0 人</th>
                            <th>0.0</th>
                            <th>0.0</th>
                            <th>0千円</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection