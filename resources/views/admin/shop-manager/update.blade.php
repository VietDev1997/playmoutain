@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('shop-manager/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('shop-manager')}}">Shop manager</a></li>
                <li class="breadcrumb-item active">Edit Shop</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <header>
                <h1 class="h3 display"> Edit Shop</h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Edit Shop</h4>
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
                            <form method="post" action="{{action('ShopController@update',$shop->id)}}"
                                  class="form-horizontal"
                                  role="form">
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Store code</label>
                                            <input type="text" name="shop_code" class="form-control"
                                                   value="{{$shop->shop_code}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Store name</label>
                                            <input type="text" name="shop_name" class="form-control"
                                                   value="{{$shop->shop_name}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Phone number</label>
                                            <input type="text" name="tel" class="form-control" value="{{$shop->tel}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Post code</label>
                                            <input type="text" name="zip_code" class="form-control"
                                                   value="{{$shop->zip_code}}">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">City</label>

                                            <select name="pref_id" class="form-control">
                                                <option value="">======Select City======</option>

                                                @foreach( $list as $value)

                                                    <option
                                                            @if($shop->pref_id == $value->id)
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
                                            <label class="control-label">District</label>
                                            <input type="text" name="ward" class="form-control" value="{{$shop->ward}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Town</label>
                                            <input type="text" name="addr1" class="form-control"
                                                   value="{{$shop->addr1}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Detailed address</label>
                                            <input type="text" name="addr2" class="form-control"
                                                   value="{{$shop->addr2}}">
                                            <span class="text-danger">{{ $errors->first('addr2') }}</span>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label">Registration fee</label>
                                            <input type="text" name="register_price"
                                                   class="form-control {{ $errors->has('register_price') ? 'is-invalid' : '' }}"
                                                   value="{{$shop->register_price}}">
                                            <span class="invalid-feedback">{{ $errors->first('register_price') }}</span>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label">Registration fee for members</label>
                                            <input type="text" name="second_register_price"
                                                   class="form-control {{ $errors->has('second_register_price') ? 'is-invalid' : '' }}"
                                                   value="{{$shop->second_register_price}}">
                                            <span class="invalid-feedback">{{ $errors->first('second_register_price') }}</span>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label">Regular membership fee</label>
                                            <input type="text" name="other_shop_entry_fee"
                                                   class="form-control {{ $errors->has('other_shop_entry_fee') ? 'is-invalid' : '' }}"
                                                   value="{{$shop->other_shop_entry_fee}}">
                                            <span class="invalid-feedback">{{ $errors->first('other_shop_entry_fee') }}</span>
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
@endsection