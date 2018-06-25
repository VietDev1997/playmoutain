@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('rental-listings')}}">Rental Listings</a>
                </li>
                <li class="breadcrumb-item active">Add Rental Listing</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">Create Rental Listing</h1>
            </header>
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Rental Service</h4>
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
                            <form method="post" action="{{action('RentalController@store')}}"
                                  class="form-horizontal"
                                  role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group required">
                                            <label class="control-label">Rental Service Name</label>
                                            <input type="text" name="retal_name"
                                                   class="form-control {{ $errors->has('retal_name') ? 'is-invalid' : '' }}"
                                                   value="{{old('retal_name')}}">
                                            <span class="invalid-feedback">{{ $errors->first('retal_name') }}</span>
                                        </div>
                                        <div class="form-group required">
                                            <label for="mst_service_Store name" class="control-label">Store Name
                                                Availabel</label><br>
                                            <select name="shop_id" id="shop_id"
                                                    class="form-control {{ $errors->has('shop_id') ? 'is-invalid' : '' }}">
                                                <option value="">======Select City======</option>
                                                @foreach($store as $op)
                                                    <option value="{{$op->id}}">{{$op->shop_name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="invalid-feedback">{{ $errors->first('shop_id') }}</span>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label">Rental Service Rate</label>
                                            <input type="text" name="fee"
                                                   class="form-control {{ $errors->has('fee') ? 'is-invalid' : '' }}"
                                                   value="{{old('fee',0)}}">
                                            <span class="invalid-feedback">{{ $errors->first('fee') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <input type="text" name="retal_description" class="form-control"
                                                   value="{{old('retal_description')}}">
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