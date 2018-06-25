@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('color-management')}}">Color management</a></li>
                <li class="breadcrumb-item active">Color Create</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">Color Create</h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Store</h4>
                        </div>
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
                            <form method="post" action="{{action('ColorController@addColor')}}" class="form-horizontal"
                                  role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Color name</label>
                                            <input type="text" name="color_name" class="form-control"
                                                   value="{{old('color_name')}}">
                                            <span class="text-danger">{{ $errors->first('color_name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Rgb color name</label>
                                            <input type="text" name="rgb" class="form-control"
                                                   value="{{old('rgb')}}">
                                            <span class="text-danger">{{ $errors->first('rgb') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-sm-10 text-center">
                                    <button type="submit" class="btn btn-success col-md-2"><i class="fa fa-plus"
                                                                                              aria-hidden="true"></i>
                                        Add
                                    </button>
                                    <button type="reset" class="btn btn-warning col-md-2"><i
                                                class="fa fa-refresh fa-spin"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection