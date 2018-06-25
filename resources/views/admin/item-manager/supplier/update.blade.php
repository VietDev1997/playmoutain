@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('supplier')}}">Supplier List</a></li>
                <li class="breadcrumb-item active">Update Supplier</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">Update Supplier </h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Update Store</h4>
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
                            <form method="post" action="{{action('SuppliersController@update',$supplier->id)}}"
                                  class="form-horizontal"
                                  role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Provide Code</label>
                                            <input type="text" name="supplier_code" class="form-control"
                                                   value="{{old('supplier_code', isset($supplier) ? $supplier->supplier_code : null)}}">
                                            <span class="text-danger">{{ $errors->first('supplier_code') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Provider Name</label>
                                            <input type="text" name="supplier_name" class="form-control"
                                                   value="{{old('supplier_name', isset($supplier) ? $supplier->supplier_name : null)}}">
                                            <span class="text-danger">{{ $errors->first('supplier_name') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Store Name</label>
                                            <select name="pref_id" class="form-control">

                                                <option value="">======Select Store Name======</option>
                                                @foreach( $shop as $value)
                                                    <option
                                                            @if($supplier->shop_id == $value->id)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$value->id}}"
                                                    >
                                                        {{$value->shop_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('pref_id') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Post Number</label>
                                            <input type="text" name="tel" class="form-control"
                                                   value="{{old('tel', isset($supplier) ? $supplier->tel : null)}}">
                                            <span class="text-danger">{{ $errors->first('tel') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Post Code</label>
                                            <input type="text" name="zipcode" class="form-control" id="supplier_zipcode"
                                                   value="{{old('zipcode', isset($supplier) ? $supplier->zipcode : null)}}">
                                            <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">City</label>
                                            <select name="pref_id" class="form-control" id="pref_id">
                                                <option value="">======Select City======</option>
                                                @foreach( $list as $key)
                                                    <option
                                                            @if($supplier->pref_id == $key->id)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$key->id}}"
                                                    >
                                                        {{$key->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">District</label>
                                            <input type="text" name="ward" id="supplier_ward" readonly="readonly"
                                                   class="form-control"
                                                   value="{{old('ward', isset($supplier) ? $supplier->ward : null)}}">
                                            <span class="text-danger">{{ $errors->first('ward') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Town</label>
                                            <input type="text" name="addr1" id="supplier_addr1" readonly="readonly"
                                                   class="form-control"
                                                   value="{{old('addr1', isset($supplier) ? $supplier->addr1 : null)}}">
                                            <span class="text-danger">{{ $errors->first('addr1') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Detailed address</label>
                                            <input type="text" name="addr2" id="supplier_addr2"
                                                   class="form-control"
                                                   value="{{old('addr2', isset($supplier) ? $supplier->addr2 : null)}}">
                                            <span class="text-danger">{{ $errors->first('addr2') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-sm-10 text-center">
                                    <button type="submit" class="btn btn-success col-md-2"><i class="fa fa-plus"
                                                                                              aria-hidden="true"></i>
                                        Update
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