@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('shop-manager')}}">Shop manager</a></li>
                <li class="breadcrumb-item active">List Shop</li>
            </ul>
        </div>
    </div>
    <section class="charts">
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">Store listing </h1>
            </header>
            <div class="row">
                <div class="col-md-12">
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
                            <div style="margin-bottom: 1%;"><a class="btn btn-primary"
                                                               href="{{url('shop-manager/create')}}">Add
                                    new</a>
                                <div class="pull-right">
                                    <select id="pagination" class="selectpicker form-control pull-right ml-2"
                                            style="width: 70px;">
                                        <option value="5" @if($items == 5) selected @endif >5</option>
                                        <option value="10" @if($items == 10) selected @endif >10</option>
                                        <option value="25" @if($items == 25) selected @endif >25</option>
                                    </select>
                                    <form class="form-inline mr-auto" action="{{url('shop-manager')}}"
                                          method="get">
                                        <input class="form-control" type="text" placeholder="Search" aria-label="Search"
                                               id="search" name="keyword" value="{{$key}}">
                                    </form>
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr class="title size_td size_text">
                                        <th> #</th>
                                        <th>Store Code</th>
                                        <th>Shop Name</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Employees</th>
                                        <th>Registration Fee</th>
                                        <th>Registration fee for members</th>
                                        <th>Regular membership fee</th>
                                        <th>Store creation date</th>
                                        <th colspan="2" style="text-align: center">Active</th>
                                    </tr>
                                    </tbody>

                                    <tbody>
                                    @if(isset($list))
                                        @foreach($list as $key=>$value)
                                            <tr class="size_td size_text">
                                                <td>{{$key+1}}</td>
                                                <td>{{$value -> shop_code}}</td>
                                                <td>{{$value -> shop_name}}</td>
                                                <td>{{$value -> tel}}</td>
                                                <td>{{$value -> pref['name']}} {{$value -> ward}} {{$value -> addr2}} </td>
                                                <td>{{count($value->staff)}}</td>
                                                <td>{{$value -> register_price}}</td>
                                                <td>{{$value -> second_register_price}}</td>
                                                <td>{{$value -> other_shop_entry_fee}}</td>
                                                <td>{{$value -> created_date}}</td>
                                                <td align="center">
                                                    <a class="btn btn-primary"
                                                       href="shop-manager/{{$value->id}}/edit"><i
                                                                class="fa fa-pencil-square-o"
                                                                aria-hidden="true"></i></a>
                                                </td>
                                                <td align="center">
                                                    <form method="post"
                                                          action="{{action('ShopController@destroy',$value->id)}}"
                                                          class="form-horizontal"
                                                          role="form">
                                                        {{ csrf_field() }}
                                                        <button type="button" class="btn btn-primary"
                                                                data-myid="{{$value -> id}}"
                                                                data-mycode="{{$value -> shop_code}}"
                                                                data-myname="{{$value -> shop_name}}"
                                                                data-mytel="{{$value -> tel}}"
                                                                data-myadd="{{$value -> pref['name']}} {{$value -> ward}} {{$value -> addr2}}"
                                                                data-toggle="modal" data-target="#exampleModalCenter">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
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
                                                                                <th scope="col">Shop code</th>
                                                                                <th scope="col">Shop name</th>
                                                                                <th scope="col">Phone number</th>
                                                                                <th scope="col">Address</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr class="table-light">
                                                                                <th scope="row" id="code"></th>
                                                                                <td id="name"></td>
                                                                                <td id="tel"></td>
                                                                                <td id="add"></td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary"><a
                                                                                    href="" id="id">
                                                                                Delete</a>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
    @include('admin.paginate')
    <script>
        $('#exampleModalCenter').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var code = button.data('mycode');
            var name = button.data('myname');
            var tel = button.data('mytel');
            var add = button.data('myadd');
            var id = button.data('myid');
            var modal = $(this);
            modal.find('.modal-body #code').html(code);
            modal.find('.modal-body #name').html(name);
            modal.find('.modal-body #tel').html(tel);
            modal.find('.modal-body #add').html(add);
            modal.find('.modal-footer #id').attr("href", "shop-manager/" + id + "/delete");
        });
    </script>
@endsection
