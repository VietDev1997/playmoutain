@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('item-manager/producer')}}">Producer</a></li>
                <li class="breadcrumb-item active">Update Producer</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">Update Producer </h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Update Producer</h4>
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
                            <form method="post" action="{{action('ProducerController@update',$producer->id)}}"
                                  class="form-horizontal"
                                  role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group required">
                                            <label class="control-label">Producer code</label>
                                            <input type="text" name="maker_code" class="form-control"
                                                   class="form-control {{ $errors->has('maker_code') ? 'is-invalid' : '' }}"
                                                   value="{{old('maker_code',isset($producer)?$producer->maker_code:null)}}">
                                            <span class="text-danger">{{ $errors->first('maker_code') }}</span>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label">Manufacturer name</label>
                                            <input type="text" name="maker_name" class="form-control"
                                                   class="form-control {{ $errors->has('maker_name') ? 'is-invalid' : '' }}"
                                                   value="{{old('maker_name',$producer->maker_name)}}">
                                            <span class="text-danger">{{ $errors->first('maker_name') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Store name</label>
                                            <select name="shop_id" class="form-control">
                                                <option value="">======Select Store Name======</option>
                                                @foreach( $shop as $value)
                                                    <option
                                                            @if($producer->shop_id == $value->id)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$value->id}}"
                                                    >
                                                        {{$value -> shop_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Phone number</label>
                                            <input type="text" name="tel" class="form-control" value="{{old('tel')}}">
                                            <span class="text-danger">{{ $errors->first('tel') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Postcode</label>
                                            <input type="text" name="zipcode" class="form-control"
                                                   value="{{old('zipcode')}}">
                                            <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">City</label>
                                            <select name="pref_id" class="form-control">
                                                <option value="">======Select City======</option>
                                                @foreach( $list as $value)
                                                    <option
                                                            @if($producer->pref_id == $value->id)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$value->id}}"
                                                    >
                                                        {{$value -> name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"> District</label>
                                            <input type="text" name="ward" class="form-control"
                                                   value="{{old('ward',$producer->ward)}}">
                                            <span class="text-danger">{{ $errors->first('ward') }}</span>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label">Town</label>
                                            <input type="text" name="addr1" class="form-control"
                                                   value="{{old('addr1',$producer->addr1)}}">
                                            <span class="text-danger">{{ $errors->first('addr1') }}</span>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label">Detail address</label>
                                            <input type="text" name="addr2" class="form-control"
                                                   value="{{old('addr2',$producer->addr2)}}">
                                            <span class="text-danger">{{ $errors->first('addr2') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-sm-10 text-center">
                                    <button type="submit" class="btn btn-success col-md-2"><i class="fa fa-plus"
                                                                                              aria-hidden="true"></i>
                                        update
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