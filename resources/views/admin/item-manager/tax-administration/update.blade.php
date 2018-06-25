@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('tax')}}">Tax Administration</a></li>
                <li class="breadcrumb-item active">Tax Update</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="col-lg-6 section-padding offset-sm-3">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h2 class="h2 display">Tax Update</h2>
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
                    <form class="form-inline" action="{{action('TaxController@postTax')}}" method="post">
                        @csrf
                        @foreach($update as $value)
                            <div class="form-group col-sm mt-3 ml-1">
                                @if($value->name == 'tax')
                                    <lable class="mr-4 col-4">Tax(%)</lable>
                                    <input type="text" name="tax" class="form-control col-7" value="{{old('tax',isset($update)? $value->value : null)}}">
                                    <input type="hidden" name="tax_id" value="{{$value->id}}">
                                    <span class="text-danger">{{ $errors->first('tax') }}</span>
                                @elseif($value->name=='member_tax')
                                    <lable class="mr-4 col-4">Member tax(%)</lable>
                                    <input type="text" name="member_tax" class="form-control col-7"
                                           value="{{old('member_tax',isset($update) ? $value->value : null)}}">
                                    <input type="hidden" name="member_tax_id" value="{{$value->id}}">
                                    <span class="text-danger">{{ $errors->first('member_tax') }}</span>
                                @endif
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary center-block mb-2 mt-5 ml-4">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
