@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('supplier')}}">Supplier List</a></li>
                <li class="breadcrumb-item active">Create Supplier</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">Create Supplier </h1>
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
                            <form method="post" action="{{action('SuppliersController@AddSupplier')}}"
                                  class="form-horizontal"
                                  role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Provide Code</label>
                                            <input type="text" name="supplier_code" class="form-control"
                                                   value="{{old('supplier_code')}}">
                                            <span class="text-danger">{{ $errors->first('supplier_code') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Provider Name</label>
                                            <input type="text" name="supplier_name" class="form-control"
                                                   value="{{old('supplier_name')}}">
                                            <span class="text-danger">{{ $errors->first('supplier_name') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Store Name</label>
                                            <select name="pref_id" class="form-control">

                                                <option value="">======Select Store Name======</option>
                                                @foreach( $shop as $value)
                                                    <option value="{{$value->id}}">{{$value->shop_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Post Number</label>
                                            <input type="text" name="tel" class="form-control"
                                                   value="{{old('tel')}}" >
                                            <span class="text-danger">{{ $errors->first('tel') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Post Code</label>
                                            <input type="text" name="zip_code" class="form-control"
                                                   value="{{old('zip_code')}}" id="supplier_zipcode">
                                            <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">City</label>
                                            <select name="pref_id" class="form-control" id="pref_id">
                                                <option value="">======Select City======</option>
                                                @foreach( $list as $key)
                                                    <option value="{{$key->id}}">{{$key->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">District</label>
                                            <input type="text" name="ward" readonly="readonly"
                                                   class="form-control"
                                                   value="{{old('ward')}}" id="supplier_ward">
                                            <span class="text-danger">{{ $errors->first('ward') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Town</label>
                                            <input type="text" name="addr1" readonly="readonly"
                                                   class="form-control"
                                                   value="{{old('addr1')}}" id="supplier_addr1">
                                            <span class="text-danger">{{ $errors->first('addr1') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Detailed address</label>
                                            <input type="text" name="addr2"
                                                   class="form-control"
                                                   value="{{old('addr2')}}" id="supplier_addr2">
                                            <span class="text-danger">{{ $errors->first('addr2') }}</span>
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
    <script>
        $(document).ready(function () {
            $("#supplier_zipcode").change(function () {
                callEvent();
            });
        });

        function callEvent() {
            $.ajax({
                url: "/api/zipcode/" + $("#supplier_zipcode").val(),
                type: 'get',
                contentType: "application/json",
                dataType: "json",
                success: function (data) {
                    $("#supplier_zipcode").val(data[0].zipcode),
                    $("#pref_id").val(data[0].pref_id),
                    $("#supplier_ward").val(data[0].ward),
                    $("#supplier_addr1").val(data[0].addr1),
                    $("#supplier_addr2").val(data[0].addr2)
                },
            });
        }
    </script>
@endsection