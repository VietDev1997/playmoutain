@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-6 container-fluid">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h2 class="h1 display">検索</h2>
                </div>
                <form action="">
                    <table class="table col-lg-6 yav">
                        <tbody>
                        <tr>
                            <td>開始日付</td>
                            <th>
                                <div class="input-group date">
                                    <input type="text" name="begin" class="form-control" value="2018-05-01"><span
                                            class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                終了日付
                            </td>
                            <th>
                                <div class="input-group date">
                                    <input type="text" name="end" class="form-control" value="2018-05-16"><span
                                            class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>店舗別</td>
                            <td>
                                <select class="form-control" name="shop_id" id="shop_id">
                                    <option value="">すべて</option>
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
                                <input class="btn btn-primary" type="submit" name="submit" value="統計">   
                                <a class="btn btn-primary"
                                   href="/jp/admin/statistics_total.csv?begin=2018-05-01&amp;end=2018-05-16">CSV</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="row updates">
        <div class="col-lg-12 container-fluid">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h2 class="h1 display">売上リスト</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-lg-12">
        <div class="col-lg-11 offset-1 container-fluid">
        </div>
    </div>
    <div class="row" id="service">
        <div class="col-lg-12 container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive-lg">
                        <thead>
                        <tr class="fonsize_total title">
                            <th rowspan="2">Date and time</th>
                            <th colspan="4">Visitors</th>
                            <th colspan="3">Admission ticket</th>
                            <th colspan="3">Sales</th>
                            <th rowspan="2">Other</th>
                            <th rowspan="2">Total</th>
                        </tr>
                        <tr class="fonsize_total title">
                            <th>Number of People</th>
                            <th>New registration</th>
                            <th>Young children</th>
                            <th>Monthly Ticket</th>
                            <th>Ticket sales</th>
                            <th>Additional Registration</th>
                            <th>Average Revenue</th>
                            <th>Sales</th>
                            <th>Online sales</th>
                            <th>Net profit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="fonsize_total">
                            <td>2018年05月09日Wednesday</td>
                            <td>1</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>2,100</td>
                            <td>0</td>
                            <td>2,100</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <th>2,100</th>
                        </tr>
                        </tbody>
                        <thead>
                        <tr class="fonsize_total">
                            <th>Total</th>
                            <th>1 人</th>
                            <th>0</th>
                            <th>0 人</th>
                            <th>0</th>
                            <th>2,100</th>
                            <th>0</th>
                            <th>2,100</th>
                            <th>0</th>
                            <th>0</th>
                            <th>0</th>
                            <th>0</th>
                            <th>2,100 Yen</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection