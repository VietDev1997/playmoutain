@extends('admin.master')
@section('content')
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
                            <td>Start date</td>
                            <th>
                                <div class="input-group date">
                                    <input type="text" name="begin" class="form-control" value="2018-05-01"><span
                                            class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                End date
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
    <div id="container" class="col-lg-12 " style="min-width: 310px; height: 400px; margin: 0 auto"
         data-highcharts-chart="0">
        <div id="highcharts-6bebpot-0" dir="ltr" class="highcharts-container "
             style="position: relative; overflow: hidden; width: 666px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
            <svg version="1.1" class="highcharts-root"
                 style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;"
                 xmlns="http://www.w3.org/2000/svg" width="666" height="400" viewBox="0 0 666 400">
                <desc>Created with Highcharts 6.1.0</desc>
                <defs>
                    <clipPath id="highcharts-6bebpot-1">
                        <rect x="0" y="0" width="454" height="325" fill="none"></rect>
                    </clipPath>
                </defs>
                <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="666" height="400" rx="0"
                      ry="0"></rect>
                <rect fill="none" class="highcharts-plot-background" x="116" y="42" width="454" height="325"></rect>
                <g class="highcharts-grid highcharts-xaxis-grid ">
                    <path fill="none" class="highcharts-grid-line" d="M 569.5 42 L 569.5 367" opacity="1"></path>
                    <path fill="none" class="highcharts-grid-line" d="M 115.5 42 L 115.5 367" opacity="1"></path>
                </g>
                <g class="highcharts-grid highcharts-yaxis-grid ">
                    <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"
                          d="M 116 367.5 L 570 367.5" opacity="1"></path>
                    <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"
                          d="M 116 302.5 L 570 302.5" opacity="1"></path>
                    <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"
                          d="M 116 237.5 L 570 237.5" opacity="1"></path>
                    <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"
                          d="M 116 172.5 L 570 172.5" opacity="1"></path>
                    <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"
                          d="M 116 107.5 L 570 107.5" opacity="1"></path>
                    <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"
                          d="M 116 41.5 L 570 41.5" opacity="1"></path>
                </g>
                <g class="highcharts-grid highcharts-yaxis-grid ">
                    <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"
                          d="M 116 367.5 L 570 367.5" opacity="1"></path>
                    <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"
                          d="M 116 302.5 L 570 302.5" opacity="1"></path>
                    <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"
                          d="M 116 237.5 L 570 237.5" opacity="1"></path>
                    <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"
                          d="M 116 172.5 L 570 172.5" opacity="1"></path>
                    <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"
                          d="M 116 107.5 L 570 107.5" opacity="1"></path>
                    <path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line"
                          d="M 116 41.5 L 570 41.5" opacity="1"></path>
                </g>
                <rect fill="none" class="highcharts-plot-border" x="116" y="42" width="454" height="325"></rect>
                <g class="highcharts-axis highcharts-xaxis ">
                    <path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1"
                          d="M 570.5 367 L 570.5 377" opacity="1"></path>
                    <path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1"
                          d="M 115.5 367 L 115.5 377" opacity="1"></path>
                    <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1"
                          d="M 116 367.5 L 570 367.5"></path>
                </g>
                <g class="highcharts-axis highcharts-yaxis ">
                    <text x="21.859375" text-anchor="middle" transform="translate(0,0) rotate(270 21.859375 204.5)"
                          class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="204.5">
                        <tspan>Sales Amount</tspan>
                    </text>
                    <path fill="none" class="highcharts-axis-line" d="M 116 42 L 116 367"></path>
                </g>
                <g class="highcharts-axis highcharts-yaxis ">
                    <text x="643.96875" text-anchor="middle" transform="translate(0,0) rotate(90 643.96875 204.5)"
                          class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="204.5">
                        <tspan>Comein</tspan>
                    </text>
                    <path fill="none" class="highcharts-axis-line" d="M 570 42 L 570 367"></path>
                </g>
                <g class="highcharts-series-group">
                    <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-color-0  highcharts-tracker"
                       transform="translate(116,42) scale(1 1)" clip-path="url(#highcharts-6bebpot-1)">
                        <rect x="117.5" y="52.5" width="218" height="0" fill="#7cb5ec" stroke="#ffffff" stroke-width="1"
                              class="highcharts-point highcharts-color-0"></rect>
                    </g>
                    <g class="highcharts-markers highcharts-series-0 highcharts-column-series highcharts-color-0 "
                       transform="translate(116,42) scale(1 1)" clip-path="none"></g>
                    <g class="highcharts-series highcharts-series-1 highcharts-column-series highcharts-color-1  highcharts-tracker"
                       transform="translate(116,42) scale(1 1)" clip-path="url(#highcharts-6bebpot-1)">
                        <rect x="117.5" y="52.5" width="218" height="0" fill="#434348" stroke="#ffffff" stroke-width="1"
                              class="highcharts-point highcharts-color-1"></rect>
                    </g>
                    <g class="highcharts-markers highcharts-series-1 highcharts-column-series highcharts-color-1 "
                       transform="translate(116,42) scale(1 1)" clip-path="none"></g>
                    <g class="highcharts-series highcharts-series-2 highcharts-column-series highcharts-color-2  highcharts-tracker"
                       transform="translate(116,42) scale(1 1)" clip-path="url(#highcharts-6bebpot-1)">
                        <rect x="117.5" y="52.5" width="218" height="0" fill="#90ed7d" stroke="#ffffff" stroke-width="1"
                              class="highcharts-point highcharts-color-2"></rect>
                    </g>
                    <g class="highcharts-markers highcharts-series-2 highcharts-column-series highcharts-color-2 "
                       transform="translate(116,42) scale(1 1)" clip-path="none"></g>
                    <g class="highcharts-series highcharts-series-3 highcharts-column-series highcharts-color-3  highcharts-tracker"
                       transform="translate(116,42) scale(1 1)" clip-path="url(#highcharts-6bebpot-1)">
                        <rect x="117.5" y="52.5" width="218" height="0" fill="#f7a35c" stroke="#ffffff" stroke-width="1"
                              class="highcharts-point highcharts-color-3"></rect>
                    </g>
                    <g class="highcharts-markers highcharts-series-3 highcharts-column-series highcharts-color-3 "
                       transform="translate(116,42) scale(1 1)" clip-path="none"></g>
                    <g class="highcharts-series highcharts-series-4 highcharts-column-series highcharts-color-4  highcharts-tracker"
                       transform="translate(116,42) scale(1 1)" clip-path="url(#highcharts-6bebpot-1)">
                        <rect x="117.5" y="52.5" width="218" height="273" fill="#8085e9" stroke="#ffffff"
                              stroke-width="1" class="highcharts-point highcharts-color-4 "></rect>
                    </g>
                    <g class="highcharts-markers highcharts-series-4 highcharts-column-series highcharts-color-4 "
                       transform="translate(116,42) scale(1 1)" clip-path="none"></g>
                    <g class="highcharts-series highcharts-series-5 highcharts-column-series highcharts-color-5  highcharts-tracker"
                       transform="translate(116,42) scale(1 1)" clip-path="url(#highcharts-6bebpot-1)">
                        <rect x="117.5" y="325.5" width="218" height="0" fill="#f15c80" stroke="#ffffff"
                              stroke-width="1" class="highcharts-point highcharts-color-5"></rect>
                    </g>
                    <g class="highcharts-markers highcharts-series-5 highcharts-column-series highcharts-color-5 "
                       transform="translate(116,42) scale(1 1)" clip-path="none"></g>
                    <g class="highcharts-series highcharts-series-6 highcharts-column-series highcharts-color-6  highcharts-tracker"
                       transform="translate(116,42) scale(1 1)" clip-path="url(#highcharts-6bebpot-1)">
                        <rect x="117.5" y="325.5" width="218" height="0" fill="#e4d354" stroke="#ffffff"
                              stroke-width="1" class="highcharts-point highcharts-color-6"></rect>
                    </g>
                    <g class="highcharts-markers highcharts-series-6 highcharts-column-series highcharts-color-6 "
                       transform="translate(116,42) scale(1 1)" clip-path="none"></g>
                    <g class="highcharts-series highcharts-series-7 highcharts-spline-series highcharts-color-7 "
                       transform="translate(116,42) scale(1 1)" clip-path="url(#highcharts-6bebpot-1)">
                        <path fill="none" d="M 227 195" class="highcharts-graph" stroke="#2b908f" stroke-width="2"
                              stroke-linejoin="round" stroke-linecap="round"></path>
                        <path fill="none" d="M 217 195 L 227 195 L 237 195" stroke-linejoin="round" visibility="visible"
                              stroke="rgba(192,192,192,0.0001)" stroke-width="22" class="highcharts-tracker"></path>
                    </g>
                    <g class="highcharts-markers highcharts-series-7 highcharts-spline-series highcharts-color-7 highcharts-tracker "
                       transform="translate(116,42) scale(1 1)">
                        <path fill="#2b908f" visibility="hidden" d="M 227 195 A 0 0 0 1 1 227 195 Z"
                              class="highcharts-halo highcharts-color-7" fill-opacity="0.25"></path>
                        <path fill="#2b908f" d="M 231 195 A 4 4 0 1 1 230.99999800000018 194.99600000066667 Z"
                              class="highcharts-point highcharts-color-7 " stroke-width="0.00003947789809188862"></path>
                    </g>
                </g>
                <text x="333" text-anchor="middle" class="highcharts-title"
                      style="color:#333333;font-size:18px;fill:#333333;" y="24">
                    <tspan>Sales Stats</tspan>
                </text>
                <text x="333" text-anchor="middle" class="highcharts-subtitle" style="color:#666666;fill:#666666;"
                      y="41"></text>
                <g class="highcharts-stack-labels" visibility="visible" transform="translate(116,42)">
                    <text x="227" style="font-size:11px;font-weight:bold;color:gray;fill:gray;" text-anchor="middle"
                          transform="translate(0,0)" y="46">
                        <tspan x="227" y="46" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF"
                               stroke-width="2px" stroke-linejoin="round">2.1
                        </tspan>
                        <tspan x="227" y="46">2.1</tspan>
                    </text>
                </g>
                <g class="highcharts-stack-labels" visibility="visible" transform="translate(116,42)"></g>
                <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-color-0  highcharts-tracker"
                   transform="translate(116,42) scale(1 1)" opacity="1" visibility="visible">
                    <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0 "
                       transform="translate(218,43)" opacity="0" visibility="hidden">
                        <text x="5" style="font-size:11px;font-weight:bold;color:white;fill:white;" y="16">
                            <tspan x="5" y="16" class="highcharts-text-outline" fill="#000000" stroke="#000000"
                                   stroke-width="2px" stroke-linejoin="round" style="">0
                            </tspan>
                            <tspan x="5" y="16">0</tspan>
                        </text>
                    </g>
                </g>
                <g class="highcharts-data-labels highcharts-series-1 highcharts-column-series highcharts-color-1  highcharts-tracker"
                   transform="translate(116,42) scale(1 1)" opacity="1" visibility="visible">
                    <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1 "
                       transform="translate(218,43)" opacity="0" visibility="hidden">
                        <text x="5" style="font-size:11px;font-weight:bold;color:white;fill:white;" y="16">
                            <tspan x="5" y="16" class="highcharts-text-outline" fill="#000000" stroke="#000000"
                                   stroke-width="2px" stroke-linejoin="round">0
                            </tspan>
                            <tspan x="5" y="16">0</tspan>
                        </text>
                    </g>
                </g>
                <g class="highcharts-data-labels highcharts-series-2 highcharts-column-series highcharts-color-2  highcharts-tracker"
                   transform="translate(116,42) scale(1 1)" opacity="1" visibility="visible">
                    <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2 "
                       transform="translate(218,43)" opacity="0" visibility="hidden">
                        <text x="5" style="font-size:11px;font-weight:bold;color:white;fill:white;" y="16">
                            <tspan x="5" y="16" class="highcharts-text-outline" fill="#000000" stroke="#000000"
                                   stroke-width="2px" stroke-linejoin="round">0
                            </tspan>
                            <tspan x="5" y="16">0</tspan>
                        </text>
                    </g>
                </g>
                <g class="highcharts-data-labels highcharts-series-3 highcharts-column-series highcharts-color-3  highcharts-tracker"
                   transform="translate(116,42) scale(1 1)" opacity="1" visibility="visible">
                    <g class="highcharts-label highcharts-data-label highcharts-data-label-color-3 "
                       transform="translate(218,43)" opacity="0" visibility="hidden">
                        <text x="5" style="font-size:11px;font-weight:bold;color:white;fill:white;" y="16">
                            <tspan x="5" y="16" class="highcharts-text-outline" fill="#000000" stroke="#000000"
                                   stroke-width="2px" stroke-linejoin="round">0
                            </tspan>
                            <tspan x="5" y="16">0</tspan>
                        </text>
                    </g>
                </g>
                <g class="highcharts-data-labels highcharts-series-4 highcharts-column-series highcharts-color-4  highcharts-tracker"
                   transform="translate(116,42) scale(1 1)" opacity="1" visibility="visible">
                    <g class="highcharts-label highcharts-data-label highcharts-data-label-color-4 "
                       transform="translate(213,179)">
                        <text x="5" style="font-size:11px;font-weight:bold;color:white;fill:white;" y="16">
                            <tspan x="5" y="16" class="highcharts-text-outline" fill="#000000" stroke="#000000"
                                   stroke-width="2px" stroke-linejoin="round" style="">2.1
                            </tspan>
                            <tspan x="5" y="16">2.1</tspan>
                        </text>
                    </g>
                </g>
                <g class="highcharts-data-labels highcharts-series-5 highcharts-column-series highcharts-color-5  highcharts-tracker"
                   transform="translate(116,42) scale(1 1)" opacity="1" visibility="visible">
                    <g class="highcharts-label highcharts-data-label highcharts-data-label-color-5 "
                       transform="translate(218,310)">
                        <text x="5" style="font-size:11px;font-weight:bold;color:white;fill:white;" y="16">
                            <tspan x="5" y="16" class="highcharts-text-outline" fill="#000000" stroke="#000000"
                                   stroke-width="2px" stroke-linejoin="round">0
                            </tspan>
                            <tspan x="5" y="16">0</tspan>
                        </text>
                    </g>
                </g>
                <g class="highcharts-data-labels highcharts-series-6 highcharts-column-series highcharts-color-6  highcharts-tracker"
                   transform="translate(116,42) scale(1 1)" opacity="1" visibility="visible">
                    <g class="highcharts-label highcharts-data-label highcharts-data-label-color-6 "
                       transform="translate(218,310)" opacity="0" visibility="hidden">
                        <text x="5" style="font-size:11px;font-weight:bold;color:white;fill:white;" y="16">
                            <tspan x="5" y="16" class="highcharts-text-outline" fill="#000000" stroke="#000000"
                                   stroke-width="2px" stroke-linejoin="round">0
                            </tspan>
                            <tspan x="5" y="16">0</tspan>
                        </text>
                    </g>
                </g>
                <g class="highcharts-legend" transform="translate(-162,35)">
                    <rect fill="white" class="highcharts-legend-box" rx="0" ry="0" stroke="#CCC" stroke-width="1"
                          x="0.5" y="0.5" width="717" height="34" visibility="visible"></rect>
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
                               transform="translate(128.359375,3)">
                                <text x="21" y="15"
                                      style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                      text-anchor="start">
                                    <tspan>Rental</tspan>
                                </text>
                                <rect x="2" y="4" width="12" height="12" fill="#434348" rx="6" ry="6"
                                      class="highcharts-point"></rect>
                            </g>
                            <g class="highcharts-legend-item highcharts-column-series highcharts-color-2 highcharts-series-2"
                               transform="translate(248.71875,3)">
                                <text x="21" y="15"
                                      style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                      text-anchor="start">
                                    <tspan>Prepaid</tspan>
                                </text>
                                <rect x="2" y="4" width="12" height="12" fill="#90ed7d" rx="6" ry="6"
                                      class="highcharts-point"></rect>
                            </g>
                            <g class="highcharts-legend-item highcharts-column-series highcharts-color-3 highcharts-series-3"
                               transform="translate(369.078125,3)">
                                <text x="21" y="15"
                                      style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                      text-anchor="start">
                                    <tspan>Season ticket</tspan>
                                </text>
                                <rect x="2" y="4" width="12" height="12" fill="#f7a35c" rx="6" ry="6"
                                      class="highcharts-point"></rect>
                            </g>
                            <g class="highcharts-legend-item highcharts-column-series highcharts-color-4 highcharts-series-4"
                               transform="translate(489.4375,3)">
                                <text x="21" y="15"
                                      style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                      text-anchor="start">
                                    <tspan>Service</tspan>
                                </text>
                                <rect x="2" y="4" width="12" height="12" fill="#8085e9" rx="6" ry="6"
                                      class="highcharts-point"></rect>
                            </g>
                            <g class="highcharts-legend-item highcharts-column-series highcharts-color-5 highcharts-series-5"
                               transform="translate(609.796875,3)">
                                <text x="21" y="15"
                                      style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                      text-anchor="start">
                                    <tspan>Registed</tspan>
                                </text>
                                <rect x="2" y="4" width="12" height="12" fill="#f15c80" rx="6" ry="6"
                                      class="highcharts-point"></rect>
                            </g>
                            <g class="highcharts-legend-item highcharts-column-series highcharts-color-6 highcharts-series-6"
                               transform="translate(8,15)">
                                <text x="21" y="15"
                                      style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                      text-anchor="start">
                                    <tspan>Report</tspan>
                                </text>
                                <rect x="2" y="4" width="12" height="12" fill="#e4d354" rx="6" ry="6"
                                      class="highcharts-point"></rect>
                            </g>
                            <g class="highcharts-legend-item highcharts-spline-series highcharts-color-7 highcharts-series-7"
                               transform="translate(128.359375,15)">
                                <path fill="none" d="M 0 11 L 16 11" class="highcharts-graph" stroke="#2b908f"
                                      stroke-width="2"></path>
                                <path fill="#2b908f" d="M 12 11 A 4 4 0 1 1 11.999998000000167 10.996000000666664 Z"
                                      class="highcharts-point"></path>
                                <text x="21" y="15"
                                      style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;"
                                      text-anchor="start">
                                    <tspan>Comein</tspan>
                                </text>
                            </g>
                        </g>
                    </g>
                </g>
                <g class="highcharts-axis-labels highcharts-xaxis-labels ">
                    <text x="343" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle"
                          transform="translate(0,0)" y="386" opacity="1">2018-05-09
                    </text>
                </g>
                <g class="highcharts-axis-labels highcharts-yaxis-labels ">
                    <text x="101" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end"
                          transform="translate(0,0)" y="373" opacity="1">
                        <tspan>0 Thousand</tspan>
                    </text>
                    <text x="101" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end"
                          transform="translate(0,0)" y="308" opacity="1">
                        <tspan>0.5 Thousand</tspan>
                    </text>
                    <text x="101" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end"
                          transform="translate(0,0)" y="243" opacity="1">
                        <tspan>1 Thousand</tspan>
                    </text>
                    <text x="101" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end"
                          transform="translate(0,0)" y="178" opacity="1">
                        <tspan>1.5 Thousand</tspan>
                    </text>
                    <text x="101" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end"
                          transform="translate(0,0)" y="113" opacity="1">
                        <tspan>2 Thousand</tspan>
                    </text>
                    <text x="101" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end"
                          transform="translate(0,0)" y="48" opacity="1">
                        <tspan>2.5 Thousand</tspan>
                    </text>
                </g>
                <g class="highcharts-axis-labels highcharts-yaxis-labels ">
                    <text x="585" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="start"
                          transform="translate(0,0)" y="373" opacity="1">
                        <tspan>-1 People</tspan>
                    </text>
                    <text x="585" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="start"
                          transform="translate(0,0)" y="308" opacity="1">
                        <tspan>0 People</tspan>
                    </text>
                    <text x="585" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="start"
                          transform="translate(0,0)" y="243" opacity="1">
                        <tspan>1 People</tspan>
                    </text>
                    <text x="585" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="start"
                          transform="translate(0,0)" y="178" opacity="1">
                        <tspan>2 People</tspan>
                    </text>
                    <text x="585" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="start"
                          transform="translate(0,0)" y="113" opacity="1">
                        <tspan>3 People</tspan>
                    </text>
                    <text x="585" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="start"
                          transform="translate(0,0)" y="48" opacity="1">
                        <tspan>4 People</tspan>
                    </text>
                </g>
                <text x="656" class="highcharts-credits" text-anchor="end"
                      style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="395">Highcharts.com
                </text>
                <g class="highcharts-label highcharts-tooltip highcharts-color-7"
                   style="cursor:default;pointer-events:none;white-space:nowrap;" transform="translate(286,-9999)"
                   opacity="0" visibility="visible">
                    <path fill="none" class="highcharts-label-box highcharts-tooltip-box"
                          d="M 3.5 0.5 L 111.5 0.5 C 114.5 0.5 114.5 0.5 114.5 3.5 L 114.5 55.5 C 114.5 58.5 114.5 58.5 111.5 58.5 L 62.5 58.5 56.5 64.5 50.5 58.5 3.5 58.5 C 0.5 58.5 0.5 58.5 0.5 55.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5"
                          isShadow="true" stroke="#000000" stroke-opacity="0.049999999999999996" stroke-width="5"
                          transform="translate(1, 1)"></path>
                    <path fill="none" class="highcharts-label-box highcharts-tooltip-box"
                          d="M 3.5 0.5 L 111.5 0.5 C 114.5 0.5 114.5 0.5 114.5 3.5 L 114.5 55.5 C 114.5 58.5 114.5 58.5 111.5 58.5 L 62.5 58.5 56.5 64.5 50.5 58.5 3.5 58.5 C 0.5 58.5 0.5 58.5 0.5 55.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5"
                          isShadow="true" stroke="#000000" stroke-opacity="0.09999999999999999" stroke-width="3"
                          transform="translate(1, 1)"></path>
                    <path fill="none" class="highcharts-label-box highcharts-tooltip-box"
                          d="M 3.5 0.5 L 111.5 0.5 C 114.5 0.5 114.5 0.5 114.5 3.5 L 114.5 55.5 C 114.5 58.5 114.5 58.5 111.5 58.5 L 62.5 58.5 56.5 64.5 50.5 58.5 3.5 58.5 C 0.5 58.5 0.5 58.5 0.5 55.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5"
                          isShadow="true" stroke="#000000" stroke-opacity="0.15" stroke-width="1"
                          transform="translate(1, 1)"></path>
                    <path fill="rgba(247,247,247,0.85)" class="highcharts-label-box highcharts-tooltip-box"
                          d="M 3.5 0.5 L 111.5 0.5 C 114.5 0.5 114.5 0.5 114.5 3.5 L 114.5 55.5 C 114.5 58.5 114.5 58.5 111.5 58.5 L 62.5 58.5 56.5 64.5 50.5 58.5 3.5 58.5 C 0.5 58.5 0.5 58.5 0.5 55.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5"
                          stroke="#2b908f" stroke-width="1"></path>
                    <text x="8" style="font-size:12px;color:#333333;fill:#333333;" y="20">
                        <tspan style="font-weight:bold">2018-05-09</tspan>
                        <tspan x="8" dy="15">Comein: 1 People</tspan>
                        <tspan x="8" dy="15">Total :</tspan>
                    </text>
                </g>
            </svg>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 container-fluid">
            <div class="card">
                <div class="card-body" style="overflow: scroll;">
                    <table class="table col-lg-12">
                        <thead>
                        <tr class="title fonsize_total">
                            <th>Date and time</th>
                            <th>Purchase</th>
                            <th>Rental</th>
                            <th>Prepaid</th>
                            <th>Season ticket</th>
                            <th>Service</th>
                            <th>Registed</th>
                            <th>Comein</th>
                            <th>Online sales</th>
                            <th>Report</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class=" fonsize_total">
                            <td>2018年05月09日Wednesday</td>
                            <td>0</td>
                            <td>0.0</td>
                            <td>0.0</td>
                            <td>0.0</td>
                            <td>2.1</td>
                            <td>0</td>
                            <td>1</td>
                            <td>0.0</td>
                            <td>0.0</td>

                            <td>3.1</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class=" fonsize_total">
                            <th>Total</th>
                            <th>0</th>
                            <th>0.0</th>
                            <th>0.0</th>
                            <th>0.0</th>
                            <th>2.1</th>
                            <th>0.0</th>
                            <th>1.0 人</th>
                            <th>0.0</th>
                            <th>0.0</th>
                            <th>3.1 千円</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection