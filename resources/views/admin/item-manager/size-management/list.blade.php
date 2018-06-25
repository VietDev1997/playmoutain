@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('size-management')}}">Size management</a></li>
                <li class="breadcrumb-item active">Size List</li>
            </ul>
        </div>
    </div>
    <section class="charts">
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">Size List</h1>
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
                                                               href="{{url('size-management/create')}}">Add
                                    new</a>
                                <div class="pull-right">
                                    <select id="pagination" class="selectpicker form-control pull-right ml-2"
                                            style="width: 70px;">
                                        <option value="5" @if($items == 5) selected @endif >5</option>
                                        <option value="10" @if($items == 10) selected @endif>10</option>
                                        <option value="25" @if($items == 25) selected @endif>25</option>
                                    </select>
                                    <form class="form-inline mr-auto" action="{{url('size-management')}}"
                                          method="get">
                                        <input class="form-control" type="text" placeholder="Search" aria-label="Search"
                                               id="search-form" name="keyword" value="{{$key}}">
                                    </form>
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr class="title size_td size_text">
                                        <th>Id</th>
                                        <th>TService Name</th>
                                        <th>Service Description</th>
                                        <th colspan="2" style="text-align: center;">Active</th>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    @foreach($list as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->size_name}}</td>
                                            <td>{{$item->size_description}}</td>
                                            <td align="center" style="width: 50px;">
                                                <a class="btn btn-primary"
                                                   href="size-management/{{$item->id}}/edit"><i
                                                            class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i></a>
                                            </td>
                                            <td align="center" style="width: 50px;">
                                                <form method="post"
                                                      action="{{action('SizeController@destroy',$item->id)}}"
                                                      class="form-horizontal" id="row-{{$item -> id}}"
                                                      role="form">
                                                    {{ csrf_field() }}
                                                    <button type="button" class="btn btn-primary"
                                                            data-myid="{{$item -> id}}"
                                                            data-myname="{{$item -> size_name}}"
                                                            data-mydes="{{$item -> size_description}}"
                                                            data-toggle="modal" data-target="#exampleModalCenter">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
                            <th scope="col">TService Name</th>
                            <th scope="col">Service Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-light">
                            <th scope="row" id="id"></th>
                            <td id="size_name"></td>
                            <td id="des"></td>
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
    @include('admin.paginate')
    <script>
        $('#exampleModalCenter').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('myid');
            var name = button.data('myname');
            var des = button.data('mydes');
            var modal = $(this);
            modal.find('.modal-body #id').html(id);
            modal.find('.modal-body #size_name').html(name);
            modal.find('.modal-body #des').html(des);
            modal.find('.modal-footer  .btn-primary').attr('onclick', 'submitForm(' + id + ')');
        });

        function submitForm(id) {
            if ($('#row-' + id)) $('#row-' + id).submit();
        }
    </script>
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
    </script>
@endsection
