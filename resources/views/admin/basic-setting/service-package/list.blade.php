@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('list-of-service-packages')}}">List Of Service Packages</a>
                </li>
                <li class="breadcrumb-item">List Service</li>
            </ul>
        </div>
    </div>
    <section class="charts">
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">List Of Service Packages</h1>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header d-flex align-items-center m-0 p-0">
                                <h2 class="h2 display col-sm-5">{{$store['shop_name']}}</h2>
                                <select id="shopChange" name="shopChange"
                                        class="selectpicker form-control offset-lg-6">
                                    <option value="">Select Store</option>
                                    @foreach($option as $op)
                                        <option value="{{$op->id}}"
                                                @if($shop == $op->id) selected @endif>{{$op->shop_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
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
                            @if (\Session::has('success'))
                                <div class="alert alert-success alert-fadeout">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            @if (\Session::has('error'))
                                <div class="alert alert-danger alert-fadeout">
                                    <ul>
                                        <li>{!! \Session::get('error') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            <div style="margin-bottom: 1%;"><a class="btn btn-primary"
                                                               href="{{url('list-of-service-packages/create')}}">Add
                                    new</a>
                                <div class="pull-right">
                                    <select id="pagination" class="selectpicker form-control pull-right ml-2"
                                            style="width: 70px;">
                                        <option value="5" @if($items == 5) selected @endif >5</option>
                                        <option value="10" @if($items == 10) selected @endif >10</option>
                                        <option value="25" @if($items == 25) selected @endif >25</option>
                                    </select>
                                    <form class="form-inline mr-auto" action="{{url('list-of-service-packages')}}"
                                          method="get" id="search-form">
                                        <input class="form-control" type="text" placeholder="Search" aria-label="Search"
                                               id="search" name="keyword" value="{{$key}}">
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr class="title size_td size_text">
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Service Name</th>
                                        <th>Style</th>
                                        <th>Price</th>
                                        <th>Service Description</th>
                                        <th colspan="2" style="text-align: center">Active</th>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    @if(isset($list))
                                        @foreach($list as $key=>$value)
                                            <tr class="size_td size_text">
                                                <td>{{$key+1}}</td>
                                                <td>{{$value -> id}}</td>
                                                <td>{{$value -> service_name}}</td>
                                                <td>{{$value -> customertype['customer_type']}}</td>
                                                <td>{{$value -> fee}}</td>
                                                <td>{{$value -> service_description}}</td>
                                                <td align="center">
                                                    <a class="btn btn-primary"
                                                       href="list-of-service-packages/{{$value->id}}/edit"><i
                                                                class="fa fa-pencil-square-o"
                                                                aria-hidden="true"></i></a>
                                                </td>
                                                <td align="center" style="width: 50px;">
                                                    <form method="post"
                                                          action="{{action('ListServiceController@destroy',$value->id)}}"
                                                          class="form-horizontal" id="row-{{$value -> id}}"
                                                          role="form">
                                                        {{ csrf_field() }}
                                                        <button type="button" class="btn btn-primary"
                                                                data-myid="{{$value -> id}}"
                                                                data-myname="{{$value -> service_name}}"
                                                                data-myfee="{{$value -> fee}}"
                                                                data-mydes="{{$value -> service_description}}"
                                                                data-toggle="modal" data-target="#exampleModalCenter">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="page"
                     class="text-center pagination_content">{{ $list->appends(request()->query())->links() }}</div>
            </div>
            <br><br>
        </div>
    </section>
    <div class="modal fade bs-example-modal-lg"
         id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-danger text-center"
                        id="exampleModalLongTitle">Do you want to
                        delete ?</h1>
                    <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="table-active">
                            <th scope="col">id</th>
                            <th scope="col">Service name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Service Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-light">
                            <th scope="row" id="id"></th>
                            <td id="service_name"></td>
                            <td id="price"></td>
                            <td id="service_description"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-primary" onclick="">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var url = window.location.href.split('?')[0];
        document.getElementById('pagination').onchange = function () {
            url = updateQueryStringParameter(window.location.href, 'items', this.value);
            window.location = url;
        };

        document.getElementById('shopChange').onchange = function () {
            url = updateQueryStringParameter(window.location.href, 'shop', this.value);
            window.location = url;
        };

        $('#search-form').on('keyup keypress', function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                url = updateQueryStringParameter(window.location.href, 'keyword', $("input[name='keyword']").val());
                url = updateQueryStringParameter(url, 'page', 1);
                window.location = url;
            }
        });

        function updateQueryStringParameter(uri, key, value) {
            var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
            var separator = uri.indexOf('?') !== -1 ? "&" : "?";
            if (uri.match(re)) {
                return uri.replace(re, '$1' + key + "=" + value + '$2');
            }
            else {
                return uri + separator + key + "=" + value;
            }
        }

        $('#exampleModalCenter').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('myid');
            var name = button.data('myname');
            var fee = button.data('myfee');
            var des = button.data('mydes');
            var modal = $(this);
            modal.find('.modal-body #id').html(id);
            modal.find('.modal-body #service_name').html(name);
            modal.find('.modal-body #price').html(fee);
            modal.find('.modal-body #service_description').html(des);
            modal.find('.modal-footer  .btn-primary').attr('onclick', 'submitForm(' + id + ')');
        });

        function submitForm(id) {
            if ($('#row-' + id)) $('#row-' + id).submit();
        }
    </script>
@endsection