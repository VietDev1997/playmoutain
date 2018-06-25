@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('staff')}}">Staff Management</a></li>
                <li class="breadcrumb-item active">Create Staff</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">Create Staff </h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Staff</h4>
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
                            <form method="post" action="{{action('StaffController@addStaff')}}" class="form-horizontal"
                                  role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">User Name</label>
                                            <input type="text" name="username" class="form-control"
                                                   value="{{old('username')}}">
                                            <span class="text-danger">{{ $errors->first('username') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Staff name</label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{old('name')}}">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                   value="{{old('password')}}">
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label">Store Name</label>
                                            <select name="shop_id"
                                                    class="form-control {{ $errors->has('shop_id') ? 'is-invalid' : '' }}">
                                                <option value="">======Select Shop======</option>
                                                @foreach( $shop as $value)
                                                    <option value="{{$value->id}}">{{$value->shop_name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('shop_id') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Phone Number</label>
                                            <input type="text" name="tel" class="form-control"
                                                   value="{{old('tel')}}">
                                            <span class="text-danger">{{ $errors->first('tel') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Part-Time Work</label>
                                            <br>
                                            Yes<input type="radio" value="1" name="is_parttime" style="margin: 10px"
                                                      checked>
                                            No<input type="radio" value="2" name="is_parttime" class=""
                                                     style="margin: 10px"
                                                     @if(old('is_parttime')==2) checked
                                                    @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">ZipCode</label>
                                            <input type="text" name="zipcode" class="form-control"
                                                   value="{{old('zipcode')}}" id="staff_zipcode">
                                            <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">City</label>
                                            <select name="pref_id" class="form-control" id="pref_id">
                                                <option value="">======Select City======</option>
                                                @foreach($list as $key)
                                                    <option value="{{$key->id}}">{{$key->name}}</option>
                                                @endforeach
                                                <span class="text-danger">{{ $errors->first('pref_id') }}</span>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">District</label>
                                            <input type="text" name="ward"
                                                   class="form-control" readonly="readonly"
                                                   value="{{old('ward')}}" id="staff_ward">
                                            <span class="text-danger">{{ $errors->first('ward') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Under District</label>
                                            <input type="text" name="addr1"
                                                   class="form-control" readonly="readonly"
                                                   value="{{old('addr1')}}" id="staff_addr1">
                                            <span class="text-danger">{{ $errors->first('addr1') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Home Address</label>
                                            <input type="text" name="addr2"
                                                   class="form-control"
                                                   value="{{old('addr2')}}" id="staff_addr2">
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
            callEvent();
            $("#staff_zipcode").change(function () {
                callEvent();
            });
        });

        function callEvent() {
            $.ajax({
                url: "/api/postcode/" + $("#staff_zipcode").val(),
                type: 'get',
                contentType: "application/json",
                dataType: "json",
                success: function (data) {
                    $("#staff_zipcode").val(data[0].zipcode),
                        $("#pref_id").val(data[0].pref_id),
                        $("#staff_ward").val(data[0].ward),
                        $("#staff_addr1").val(data[0].addr1),
                        $("#staff_addr2").val(data[0].addr2)
                },
            });
        }
    </script>
@endsection