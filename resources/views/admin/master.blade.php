<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Playmountain | Statistic Profit</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-param" content="authenticity_token"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('')}}">
    <link rel="stylesheet" media="all" href="css/page.css">
    <link rel="stylesheet" media="all" href="assets/admin.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/alertBox.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/bootstrap-datepicker.self.css?body=1"
          data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/bootstrap-datepicker.min.self.css?body=1"
          data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/bootstrap-datepicker.standalone.self.css?body=1"
          data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/bootstrap-datepicker.standalone.min.self.css?body=1"
          data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/bootstrap-datepicker3.self.css?body=1"
          data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/bootstrap-datepicker3.min.self.css?body=1"
          data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/bootstrap-datepicker3.standalone.self.css?body=1"
          data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/bootstrap-datepicker3.standalone.min.self.css?body=1"
          data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/bootstrap.min.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/change_pass.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/color.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/custom.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/fontastic.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/grasp_mobile_progress_circle-1.0.0.min.self.css?body=1"
          data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/instock.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/jquery.mCustomScrollbar.self.css?body=1"
          data-turbolinks-track="reload"/>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" media="all" href="assets/maker.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/move_stock.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/page.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/rental.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/service.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/set_stock_history.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/shop.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/shops.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/size.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/statistics_total.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/stock_history.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/stores.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/style.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/supplier.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/taxes.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/application.self.css?body=1" data-turbolinks-track="reload"/>
    <link rel="stylesheet" media="all" href="assets/font-awesome.self.css?body=1" data-turbolinks-track="reload"/>
    {{--<link rel="stylesheet" media="all" href="assets/style.default.css"/>--}}
    <link rel="shortcut icon" href="http://img14.shop-pro.jp/PA01182/576/favicon.ico?cmsp_timestamp=20170806190435">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="assets/jquery.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/jquery_ujs.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/alertBox.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/bootstrap-datepicker.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/bootstrap-datepicker.min.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/bootstrap.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/bootstrap.min.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/action_cable.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/cable.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/front.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/grasp_mobile_progress_circle-1.0.0.min.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/jquery.autoKana.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/jquery.cookie.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/jquery.mCustomScrollbar.concat.min.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/jquery.mCustomScrollbar.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/jquery.validate.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/jquery.validate.min.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/move_stock.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/set_stock_history.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
    <script src="assets/application.self.js?body=1"
            data-turbolinks-track="reload" data-turbolinks-eval="false"></script>
</head>
<body style="overflow: scroll;">
<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <div class="sidenav-header-inner text-center"><i class="fa fa-user"></i>
                <h2 class="h5 text-uppercase">PlayMountain </h2>
            </div>
            <div class="sidenav-header-logo">
                <a class="brand-small text-center" href="/en/admins">
                    <strong>P</strong><strong class="text-primary">M</strong>
                </a></div>
        </div>
        <div class="admin-menu">
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                <li>
                    <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i
                                class="fa fa-cog fa-fw"></i><span>Basic settings</span>
                        <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div>
                    </a>
                    <ul id="pages-nav-list" class="collapse list-unstyled">
                        <li>
                            <a href="/en/admins">
                                <i class="fa fa-user-circle"></i>
                                <span>Administrator</span>
                            </a></li>
                        <li>
                            <a href="{{url('list-of-service-packages')}}">
                                <i class="fa fa-list-alt"></i><span>List of service packages</span>
                            </a></li>
                        <li>
                            <a href="{{url('rental-listings')}}">
                                <i class="fa fa-list-alt"></i><span>Rental listings</span>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li>
                    <a href="{{url('shop-manager')}}">
                        <i class="fa fa-list-alt"></i><span>Shop manager</span>
                    </a></li>
            </ul>
        </div>
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li>
                    <a href="{{url('staff')}}">
                        <i class="fa fa-list-alt"></i><span>Staff management</span>
                    </a></li>
            </ul>
        </div>
        <div class="admin-menu">
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                <li>
                    <a href="#pages-nav-list1" data-toggle="collapse" aria-expanded="false"><i
                                class="fa fa-list-alt"></i><span>Item manager</span>
                        <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div>
                    </a>
                    <ul id="pages-nav-list1" class="collapse list-unstyled">
                        <li>
                            <a href="{{url('goods-manager')}}">
                                <i class="fa fa-list-alt"></i><span>Goods management</span>
                            </a></li>
                        <li>
                            <a href="/en/admin/stockhistory">
                                <i class="fa fa-list-alt"></i><span>Inventory History</span>
                            </a></li>
                        <li>
                            <a href="{{url('supplier')}}">
                                <i class="fa fa-list-alt"></i><span>Supplier</span>
                            </a></li>
                        <li>
                            <a href="{{url('item-manager/producer')}}">
                                <i class="fa fa-list-alt"></i><span>Producer</span>
                            </a></li>
                        <li>
                            <a href="/en/admin/instock">
                                <i class="fa fa-list-alt"></i><span>Import Manager</span>
                            </a></li>
                        <li>
                            <a href="{{url('size-management')}}">
                                <i class="fa fa-list-alt"></i><span>Size management</span>
                            </a></li>
                        <li>
                            <a href="{{url('color-management')}}">
                                <i class="fa fa-list-alt"></i><span>Color management</span>
                            </a></li>
                        <li>
                            <a href="{{url('tax')}}">
                                <i class="fa fa-list-alt"></i><span>Tax administration</span>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="admin-menu">
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                <li>
                    <a href="#pages-nav-list2" data-toggle="collapse" aria-expanded="false"><i
                                class="fa fa-list-alt"></i><span>Statistical</span>
                        <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div>
                    </a>
                    <ul id="pages-nav-list2" class="collapse list-unstyled">
                        <li class=active>
                            <a href="/en/admin/statistics_total">
                                <i class="fa fa-list-alt"></i><span>Total earnings statistics</span>
                            </a></li>
                        <li>
                            <a href="/en/admin/statistics_infomation">
                                <i class="fa fa-list-alt"></i><span>Statistical information</span>
                            </a></li>
                        <li>
                            <a href="/en/admin/statistics_cash_total">
                                <i class="fa fa-list-alt"></i><span>Cash Statistics</span>
                            </a></li>
                        <li>
                            <a href="/en/admin/statistics_cards_total">
                                <i class="fa fa-list-alt"></i><span>Statistics by card</span>
                            </a></li>
                        <li>
                            <a href="/en/admin/statistics_sale">
                                <i class="fa fa-list-alt"></i><span>Sales Statistics</span>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="page home-page">
    <!-- navbar-->
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header">
                        <a id="toggle-btn" href="" class="menu-btn"><i class="fa fa-bars"></i></a>
                        <a class="navbar-brand" href="/en/admins">
                            <div class="brand-text d-none d-md-inline-block">
                                <span>Admin</span><strong class="text-primary">Dashboard</strong></div>
                        </a></div>
                    <div>
                        English
                        |
                        <a href="/jp/admin/statistics_total">Japanese</a>
                    </div>
                    <div style="color: white">
                        Welcome: <u>admin</u>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <br>
    @yield('content')
    <script type="text/javascript">

        !function (a) {
            a.fn.datepicker.dates.ja = {
                days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                daysShort: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
                today: "Today",
                format: "yyyy-mm-dd",
                titleFormat: "yyyy-mm",
                clear: "Clear"
            }
        }(jQuery);

        $(function () {
            $('.input-group.date').datepicker({
                todayHighlight: true,
                todayBtn: "linked",
                clearBtn: true,
                language: "ja"
            });
        });
    </script>
    <footer class="main-footer ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 offset-sm-5">
                    <p> &copy; 2013 PlayMountain</p>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>