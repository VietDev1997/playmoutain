@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('goods-manager')}}">Goods Managementer</a></li>
                <li class="breadcrumb-item active">List of goods</li>
            </ul>
        </div>
    </div>
    <br>
    @if (\Session::has('successs'))
        <div class="alert alert-success alert-fadeout">
            <ul>
                <li>{!! \Session::get('successs') !!}</li>
            </ul>
        </div>
    @endif
    @if (\Session::has('errorss'))
        <div class="alert alert-danger alert-fadeout">
            <ul>
                <li>{!! \Session::get('errorss') !!}</li>
            </ul>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissable alert-fadeout">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
            </button>
            <strong>Whoops!</strong> There were some problems with your input.
            <br/>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h1>Search</h1>
                    </div>
                    <div class="card-body">
                        <form method="get" action="{{url('goods-manager')}}"
                              class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Code</label>
                                        <input type="text" name="keyProduct" class="form-control"
                                               value="@if(isset($keyProduct)){{$keyProduct}}@endif">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Manufacture</label>
                                        <select name="maker" class="form-control">
                                            <option value="">---select---</option>
                                            @if(isset($list))
                                                @foreach($list as $key=>$value)
                                                    <option value="{{$value->maker['id']}}"
                                                    @if($maker == $value->maker['id'])
                                                        {{"selected"}}
                                                            @endif
                                                    >{{$value->maker['maker_name']}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Name</label>
                                        <input type="text" name="productName" class="form-control "
                                               value="@if(isset($productName)){{$productName}}@endif">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Suppliers</label>
                                        <select name="suppliers" class="form-control">
                                            <option value="">---select---</option>
                                            @if(isset($list))
                                                @foreach($list as $key=>$value)
                                                    <option value="{{$value->supplier['id']}}"
                                                    @if($suppliers == $value->supplier['id'])
                                                        {{"selected"}}
                                                            @endif
                                                    >{{$value->supplier['supplier_name']}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Shop</label>
                                        <select name="shop_id" class="form-control">
                                            <option value="">---select---</option>
                                            @if(isset($list))
                                                @foreach($list as $key=>$value)
                                                    <option value="{{$value->shop['id']}}"
                                                    @if($shop_id == $value->shop['id'])
                                                        {{"selected"}}
                                                            @endif
                                                    >{{$value->shop['shop_name']}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-success col-md-2"><i class="fa fa-search"
                                                                                          aria-hidden="true"></i>
                                    Search
                                </button>
                                <button type="reset" class="btn btn-warning col-md-2"><i
                                            class="fa fa-refresh fa-spin"></i> Reset
                                </button>
                                <button type="button" class="btn btn-info col-md-2" data-toggle="modal"
                                        data-target="#myModal"
                                ><i class="fa fa-upload"></i> CSV
                                    Import
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row updates">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h2 class="h1 display">List of goods</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="product">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <a class="btn btn-primary "
                       href="{{url('goods-manager/add')}}"><i
                                class="fa fa-plus"
                                aria-hidden="true"></i> Add
                        new</a>
                    <select id="pagination" name="pageChangeProduct"
                            class="selectpicker form-control offset-sm-10">
                        <option value="30" @if($items == 30) selected @endif >30</option>
                        <option value="50" @if($items == 50) selected @endif >50</option>
                        <option value="70" @if($items == 70) selected @endif >70</option>
                        <option value="100" @if($items == 100) selected @endif >100</option>
                    </select>
                </div>
                <div class=" d-flex align-items-center  offset-sm-4 mt-1">
                    {{ $list->appends(request()->query())->links() }}
                </div>
                <br>
                <div class="card-body">
                    <form id="form_product" autocomplete="off" action=""
                          method="post">
                        @csrf
                        <div class="table table-responsive-lg">
                            <table class="table table-striped table-hover">
                                <tbody class="thead-light">
                                <tr class="title size_td size_text">
                                    <th> #</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Purchase price</th>
                                    <th>Prices do not include taxes</th>
                                    <th>Tax inclusive price</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Manufacturer</th>
                                    <th>Suppliers</th>
                                    <th>Store</th>
                                    <th>Note</th>
                                    <th style="text-align: center">Number of stock</th>
                                    <th style="text-align: center">Active</th>
                                    <th style="text-align: center">Add more</th>
                                    <th style="text-align: center">Shipped</th>
                                </tr>
                                </tbody>
                                <tbody>
                                @if(isset($list))
                                    @foreach($list as $key=>$value)
                                        <tr class="size_td size_text" id="{{$value->shop_id}}"
                                            style="background-color: {{$value->shop['color']}}">
                                            <td>{{$key+1}}</td>
                                            <td>{{$value -> product_code}}</td>
                                            <td>{{$value -> product_name}}</td>
                                            <td>{{$value -> stock_price}}Yen</td>
                                            <td>{{$value -> notax_price}}Yen</td>
                                            <td>{{$value -> tax_price}}Yen</td>
                                            <td>{{$value -> size_text}}</td>
                                            <td>{{$value -> color_text}}</td>
                                            <td>{{$value->maker['maker_name']}}</td>
                                            <td>{{$value->supplier['supplier_name']}}</td>
                                            <td>{{$value->shop['shop_name']}}</td>
                                            <td>{{$value -> notes}}</td>
                                            <td>
                                                <div class="input-group "
                                                     data-proid="{{ isset($value->stock[0]->product_id) ? $value->stock[0]->product_id : '' }}"
                                                     data-shopid="{{ isset($value->stock[0]->shop_id) ? $value->stock[0]->shop_id : '' }}"
                                                     data-preset="{{ isset($value->stock[0]->stock_number) ? $value->stock[0]->stock_number : '' }}">
                                                    <input type="text"
                                                           id="valid_number_set_{{ isset($value->stock[0]->product_id) ? $value->stock[0]->product_id : '' }}"
                                                           data-number="{{ isset($value->stock[0]->stock_number) ? $value->stock[0]->stock_number : '' }}"
                                                           class="form-control-xs stock_count"
                                                           style="width: 60px;text-align: center"
                                                           value="{{ isset($value->stock[0]->stock_number) ? $value->stock[0]->stock_number : '' }}"
                                                           name="stock_number"
                                                           onkeyup="validate_number_add(this.value, {{ isset($value->stock[0]->product_id) ? $value->stock[0]->product_id : '' }})">
                                                    <button class="btn btn-success btn-sm rounded btn_set_stock"
                                                            type="button">set
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <button type="button" class="btn btn-primary " data-toggle="modal"
                                                            data-target="#exampleModal" data-myid="{{$value->id}}">
                                                        <i class="fa fa-th-list"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group"
                                                     data-id="{{ isset($value->stock[0]->id) ? $value->stock[0]->id : '' }}"
                                                     data-proid="{{ isset($value->stock[0]->product_id) ? $value->stock[0]->product_id : '' }}"
                                                     data-shopid="{{ isset($value->stock[0]->shop_id) ? $value->stock[0]->shop_id : '' }}">
                                                    <input type="hidden"
                                                           value="{{ isset($value->stock[0]->product_id) ? $value->stock[0]->product_id : '' }}"
                                                           name="product_id[]">
                                                    <input type="hidden"
                                                           value="{{ isset($value->stock[0]->shop_id) ? $value->stock[0]->shop_id : '' }}"
                                                           name="shop_add_id[]">
                                                    <input type="hidden"
                                                           value="{{ isset($value->stock[0]->id) ? $value->stock[0]->id : '' }}"
                                                           name="stock_id[]">
                                                    <input type="text" class="form-control-xs"
                                                           style="width: 60px;text-align: center"
                                                           id="valid_number_{{ isset($value->stock[0]->product_id) ? $value->stock[0]->product_id : '' }}"
                                                           onkeyup="validate_number_add(this.value, {{ isset($value->stock[0]->product_id) ? $value->stock[0]->product_id : '' }})"
                                                           name="stock_number_add[]">
                                                    <button class="btn btn-success btn-sm rounded btn_add_stock"
                                                            type="button">Save
                                                    </button>
                                                </div>
                                                <span class="text-danger">{{ $errors->first('stock_number_add') }}</span>
                                            </td>
                                            <td>
                                                <div class="input-group"
                                                     data-purchar="{{ isset($value->purchasing[0]->id) ? $value->purchasing[0]->id : '' }}"
                                                     data-id="{{ isset($value->stock[0]->id) ? $value->stock[0]->id : '' }}"
                                                     data-shopid="{{ isset($value->stock[0]->shop_id) ? $value->stock[0]->shop_id : '' }}"
                                                     data-proid="{{ isset($value->stock[0]->product_id) ? $value->stock[0]->product_id : '' }}"
                                                     data-from_number="{{ isset($value->stock[0]->stock_number) ? $value->stock[0]->stock_number : '' }}">
                                                    <input type="hidden"
                                                           value="{{ isset($value->stock[0]->stock_number) ? $value->stock[0]->stock_number : '' }}"
                                                           name="from_number[]">
                                                    <select class="selectpicker bg-secondary text-white shop_id"
                                                            data-style="btn-danger" name="shop_id[]">
                                                        @foreach($shop as $item)
                                                            <option value="{{$item['id']}}">{{$item['shop_name']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" class="" style="width: 60px;text-align: center"
                                                           id="valid_number_move_{{ isset($value->stock[0]['product_id']) ? $value->stock[0]['product_id'] : '' }}"
                                                           onkeyup="validate_number_add(this.value, {{ isset($value->stock[0]['product_id']) ? $value->stock[0]['product_id'] : '' }})"
                                                           name="stock_number_move[]">
                                                    <button type="button"
                                                            class="btn btn-outline-success btn-sm rounded btn_move_stock">
                                                        move
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <br>
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-success col-md-2" id="multi_add"><i
                                            class="fa fa-plus" aria-hidden="true"></i>
                                    Add multi stock
                                </button>
                                <button type="button" class="btn btn-info col-md-2" id="multi_move_stock"><i
                                            class="fa fa-arrow-right" aria-hidden="true"></i>
                                    Move multi stock
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="page"
                     class="text-center pagination_content mb-3">{{ $list->appends(request()->query())->links() }}</div>
            </div>
            <br>
            <br>
        </div>
    </div>
    </div>
    </div>
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true"
    >
        <div class="modal-dialog mt-4" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title m-auto text-danger font-weight-bold" id="exampleModalLabel">List of
                        goods</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-inline" action="">
                        <div class="form-group mt-3 col-sm">
                            <button type="button" class="btn btn-primary"><i class="fa fa-info-circle"></i> Details
                            </button>
                            <button type="button" class="btn btn-success ml-3"><i class="fa fa-exchange"></i> History
                                change number
                            </button>
                        </div>
                        <div class="form-group mt-3 col-sm">
                            <button type="button" class="btn btn-primary" id="copyid"><i class="fa fa-files-o"></i> Copy
                            </button>
                            <button type="button" class="btn btn-warning ml-3"><i class="fa fa-history"></i> History
                                Product
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa fa-times-circle-o font-weight-bold"></i> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    </div>
    <div class="modal fade col-lg-12" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Import CSV</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="{{action('GoodsManagerController@importCsv')}}"
                          accept-charset="UTF-8" method="post">
                        @csrf
                        <table class="table col-lg-12">
                            <input name="utf8" type="hidden" value="✓">
                            <input type="hidden" name="authenticity_token" value="">
                            <tbody>
                            <tr>
                                <th>
                                    Format
                                    Item number, item, manufacturer, item name, color, size, remarks, purchase price,
                                    tax excluded price, tax included price, membership price, inventory
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Shop&emsp;&emsp;&emsp;
                                    <select name="shop" id="shop_id">
                                        @foreach($sp as $s)
                                            <option value="{{$s->id}}">{{$s->shop_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Suppliers&emsp;&emsp;
                                    <select name="supplier" id="supplier_id">
                                        @foreach($spl as $sp)
                                            <option value="{{$sp->id}}">{{$sp->supplier_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>CSV file <input type="file" name="file" id="file"></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="mx-auto"><input type="submit" name="commit" value="CSV Import"
                                                                       class="btn btn-success btn-sm rounded"
                                                                       data-disable-with="CSV Import"></td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    @include('admin.paginate')
    <script>
        $('#exampleModal').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('myid');
            var modal = $(this);
            modal.find('.modal-body  #copyid').attr('onclick', 'copy(' + id + ')');
        });

        function copy(id) {
            window.location.href = "goods-manager/" + id + "/copy";
        };
    </script>
@endsection
<script>
    function myFunction() {
        var data = document.getElementById("data").value;
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    function validate_number_add(number, product_id) {
        var number_stock = $("#valid_number_set_" + product_id).data("number");
        if (number_stock < number || number < 0) {
            $("#valid_number_move_" + product_id).val("");
        }
        if (isNaN(number) == true || Math.floor(number) != number || number < 0) {
            $("#valid_number_set_" + product_id).val(number_stock);
        } else if (isNaN(number) == true || Math.floor(number) != number || number <= 0) {
            $("#valid_number_" + product_id).val("");
            $("#valid_number_move_" + product_id).val("");
        }
        return false;
    }

    $(document).ready(function () {

        $('#multi_add').click(function () {
            $('#form_product').attr('action', '{{action('MultiStockController@multiAdd')}}');
            $('#form_product').submit();
            setTimeout(function () {
                location.reload();
            }, 50);
        });

        $('#multi_move_stock').click(function () {
            $('#form_product').attr('action', '{{action('MultiStockController@multiMove')}}');
            $('#form_product').submit();
            setTimeout(function () {
                location.reload();
            }, 50);
        });

        $('.btn_set_stock').click(function () {
            sessionStorage.clear();
            $(window).scroll(function () {
                sessionStorage.scrollTop = $(this).scrollTop();
            });
            var stock_count = $(this).prev().val();
            var product_id = $(this).parent().data("proid");
            if (stock_count >= 0 && stock_count != "" && (Math.floor(stock_count) == stock_count && $.isNumeric(stock_count))) {
                $.ajax({
                    url: "goods-manager/" + stock_count +
                    "/" + product_id,
                    type: 'post',
                    contentType: "application/json",
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    complete: function () {
                        alert("Set stock success!");
                        $("#closeBtn").click(function () {
                            location.reload();
                        });
                        if (sessionStorage.scrollTop != "undefined") {
                            $(window).scrollTop(sessionStorage.scrollTop);
                        }
                    }
                });
            } else {
                alert("Please input number!");
            }
        });

        $('.btn_add_stock').click(function () {
            sessionStorage.clear();
            $(window).scroll(function () {
                sessionStorage.scrollTop = $(this).scrollTop();
            });
            var product_id = $(this).parent().data("proid");
            var shop = $(this).parent().data("shopid");
            var id = $(this).parent().data("id");
            var number = $(this).prev().val();
            if (number != 0 && number != "" && (Math.floor(number) == number && $.isNumeric(number))) {
                $.ajax({
                    url: "goods-manager/create/" + product_id +
                    "/" + shop +
                    "/" + number +
                    "/" + id,
                    type: 'post',
                    contentType: "application/json",
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    complete: function (xhr) {
                        if (xhr.status == 200) {
                            alert("Add stock success!");
                            $("#closeBtn").click(function () {
                                location.reload();
                            });
                            if (sessionStorage.scrollTop != "undefined") {
                                $(window).scrollTop(sessionStorage.scrollTop);
                            }
                        } else {
                            alert("Data processing failed");
                        }
                    }
                });
            } else {
                alert("Please input number!");
            }
        });

        $('.btn_move_stock').click(function () {
            sessionStorage.clear();
            $(window).scroll(function () {
                sessionStorage.scrollTop = $(this).scrollTop();
            });
            var shop = $(this).prev().prev('.shop_id').val();
            var id = $(this).parent().data("id");
            var from_number = $(this).parent().data("from_number");
            var product_id = $(this).parent().data("proid");
            var number = $(this).prev().val();
            var shop_id = $(this).parent().data("shopid");
            if (number != 0 && number != "" && (Math.floor(number) == number && $.isNumeric(number))) {
                $.ajax({
                    url: "goods-manager/move/" + product_id +
                    "/" + shop +
                    "/" + number +
                    "/" + id +
                    "/" + shop_id +
                    "/" + from_number,
                    type: 'post',
                    contentType: "application/json",
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    complete: function (xhr) {
                        if (xhr.status == 200) {
                            alert("Add stock success!");
                            $("#closeBtn").click(function () {
                                location.reload();
                            });
                            if (sessionStorage.scrollTop != "undefined") {
                                $(window).scrollTop(sessionStorage.scrollTop);
                            }
                        } else {
                            alert("Data processing failed");
                        }
                    }
                });
            } else {
                alert("Please input number!");
            }
        });
    });


</script>