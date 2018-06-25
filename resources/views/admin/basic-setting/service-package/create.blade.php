@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('list-of-service-packages')}}">List of package service</a>
                </li>
                <li class="breadcrumb-item active">Add Service</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">Create Service</h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Service</h4>
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
                            <form method="post" action="{{action('ListServiceController@store')}}"
                                  class="form-horizontal"
                                  role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group required">
                                            <label class="control-label">Service Name</label>
                                            <input type="text" name="service_name"
                                                   class="form-control {{ $errors->has('service_name') ? 'is-invalid' : '' }}"
                                                   value="{{old('service_name')}}">
                                            <span class="invalid-feedback">{{ $errors->first('service_name') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="mst_service_Service type">Service type</label><br>
                                                <select name="customer_type_id" id="mst_customer_type_id"
                                                        class="form-control">
                                                    @foreach($style as $item)
                                                        <option value="{{$item->id}}">{{$item->customer_type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Service introduction</label>
                                                <input type="text" name="service_description" class="form-control"
                                                       value="{{old('service_description')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Service rate</label>
                                            <input type="text" name="fee"
                                                   class="form-control {{ $errors->has('fee') ? 'is-invalid' : '' }}"
                                                   value="{{old('fee',0)}}">
                                            <span class="invalid-feedback">{{ $errors->first('fee') }}</span>
                                        </div>
                                        <div class="form-group ">
                                            <label for="mst_service_Store name">Store name</label><br>
                                            <select name="shop_id" id="shop_id" class="form-control">
                                                @foreach($store as $op)
                                                    <option value="{{$op->id}}">{{$op->shop_name}}</option>
                                                @endforeach
                                            </select>
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