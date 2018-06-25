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
                                <a class="btn btn-primary"
                                   href="/en/admin/statistics_sale.csv?begin=2018-05-01&amp;end=2018-05-16">CSV</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="row" id="statistics_sale">
        <div class="col-lg-12 container-fluid">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h2 class="h1 display">List product sale</h2>
                    <select id="pageChangeStatistic_Sale" name="pageChangeStatistic_Sale"
                            onchange="window.location.href ='?stt='+this.value"
                            class="btn btn-default offset-sm-7 page_select">
                        <option value="30">30/page</option>
                        <option value="50">50/page</option>
                        <option value="70">70/page</option>
                        <option value="100">100/page</option>
                    </select>
                </div>
                <div class="offset-4">
                    <nav role="navigation">
                        <ul class="cd-pagination">
                            <li class="currentPosition"></li>
                        </ul>
                    </nav>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-lg">
                        <tbody>
                        <tr class="title fonsize_total">
                            <th>Datetime</th>
                            <th>Member Code</th>
                            <th>Member Name</th>
                            <th>ShopName</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Number</th>
                            <th>Price</th>
                            <th>StockPrice</th>
                            <th>Coupon</th>
                            <th>Payment</th>
                            <th>GrossProfit</th>
                            <th>Note</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="offset-4">
                    <nav role="navigation">
                        <ul class="cd-pagination">
                            <li class="currentPosition"></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection