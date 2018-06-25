@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{url('supplier')}}">Supplier</a></li>
                <li class="breadcrumb-item active">Supplier List</li>
            </ul>
        </div>
    </div>
    <section class="charts">
        <div class="container-fluid">

            <div class="charts">
                <div class="container-fluid">
                    <header>
                        <h1 class="h3 display">List of suppliers</h1>
                    </header>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-12 container-fluid">
                <div class="card">
                    <div class="card-body">
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
                        <div style="margin-bottom: 1%;"><a class="btn btn-primary" href="{{ url('supplier/create') }}">Add
                                new</a>
                            <div class="pull-right">
                                <select id="pagination" class="selectpicker form-control pull-right ml-2"
                                        style="width: 70px;">
                                    <option value="5" @if($items == 5) selected @endif >5</option>
                                    <option value="10" @if($items == 10) selected @endif >10</option>
                                    <option value="25" @if($items == 25) selected @endif >25</option>
                                </select>
                                <form class="form-inline mr-auto" action="{{url('supplier')}}"
                                      method="get" id="search-form">
                                    <input class="form-control" type="text" placeholder="Search" aria-label="Search"
                                           id="search" name="keyword" value="{{$key}}">
                                </form>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr>
                                <th>Provider Code</th>
                                <th>Provider Name</th>
                                <th>Store Name</th>
                                <th>Phone Number</th>
                                <th>Postcode</th>
                                <th>Address</th>
                                <th colspan="2" style="text-align: center">Active</th>
                            </tr>
                            @foreach($list as $value)
                                <tr>
                                    <td>{{$value->supplier_code}}</td>
                                    <td>{{ $value->supplier_name }}</td>
                                    <td>{{$value->shop['shop_name']}}</td>
                                    <td>{{$value->tel}}</td>
                                    <td>{{$value->zipcode}}</td>
                                    <td>{{$value->pref['name']}} {{$value -> ward}} {{$value -> addr2}}</td>
                                    <td align="center">
                                        <a class="btn btn-primary"
                                           href="supplier/edit/{{$value->id}}"><i
                                                    class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <form method="post"
                                              action="{{action('SuppliersController@delete',$value->id)}}"
                                              class="form-horizontal" id="row-{{$value->id}}"
                                              role="form">
                                            {{ csrf_field() }}
                                            <button type="button" class="btn btn-primary"
                                                    data-myid="{{$value -> supplier_code}}"
                                                    data-myname="{{$value -> supplier_name}}"
                                                    data-mytel="{{$value -> tel}}"
                                                    data-toggle="modal" data-target="#exampleModalCenter">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-1 offset-sm-3">
                            <nav role="navigation">
                                <ul class="cd-pagination">
                                    <li class="currentPosition2"></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div id="page"
                 class="text-center pagination_content">{{ $list->appends(request()->query())->links() }}</div>
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
                            <th scope="col">Provide code</th>
                            <th scope="col">Provide name</th>
                            <th scope="col">Phone Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-light">
                            <th scope="row" id="id"></th>
                            <td id="name"></td>
                            <td id="tel"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-primary">
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
            var name = button.data('myname');
            var tel = button.data('mytel');
            var id = button.data('myid');
            var modal = $(this);
            modal.find('.modal-body #id').html(id);
            modal.find('.modal-body #name').html(name);
            modal.find('.modal-body #tel').html(tel);
            modal.find('.modal-footer  .btn-primary').attr('onclick', 'submitForm(' + id + ')');
        });

        function submitForm(id) {
            if ($('#row-' + id)) $('#row-' + id).submit();
        }
    </script>
    @include('admin.paginate')
@endsection