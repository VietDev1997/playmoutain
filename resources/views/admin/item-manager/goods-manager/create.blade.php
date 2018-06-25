@extends('admin.master')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('goods-manager')}}">Goods Management</a></li>
                <li class="breadcrumb-item active">Create Product</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">Create Product</h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Product</h4>
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
                            <form method="post" action="{{action('GoodsManagerController@storeProduct')}}"
                                  class="form-horizontal"
                                  role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Product code</label>
                                            <input type="text" name="product_code"
                                                   class="form-control {{ $errors->has('product_code') ? 'is-invalid' : '' }}"
                                                   value="{{old('product_code')}}">
                                            <span class="invalid-feedback">{{ $errors->first('product_code') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Product name</label>
                                            <input type="text" name="product_name"
                                                   class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}"
                                                   value="{{old('product_name')}}">
                                            <span class="invalid-feedback">{{ $errors->first('product_name') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Purchase price</label>
                                            <input type="text" name="stock_price"
                                                   class="form-control {{ $errors->has('stock_price') ? 'is-invalid' : '' }}"
                                                   value="{{old('stock_price')}}">
                                            <span class="invalid-feedback">{{ $errors->first('stock_price') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Prices do not include taxes</label>
                                            <input id="notax_price" type="text" name="notax_price" class="form-control"
                                                   value="{{old('notax_price')}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tax inclusive price</label>
                                            <input id="tax_price" type="text" name="tax_price" class="form-control"
                                                   value="{{old('tax_price')}}">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label">Member price</label>
                                            <input id="member_price" type="text" name="member_price"
                                                   class="form-control {{ $errors->has('member_price') ? 'is-invalid' : '' }}"
                                                   value="{{old('member_price')}}">
                                            <span class="invalid-feedback">{{ $errors->first('member_price') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group required">
                                            <label class="control-label">Shop</label>
                                            <select name="shop_id"
                                                    class="form-control {{ $errors->has('shop_id') ? 'is-invalid' : '' }}">
                                                <option value="">======Select Shop======</option>
                                                @foreach( $store as $item)
                                                    <option value="{{$item->id}}">{{$item->shop_name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="invalid-feedback">{{ $errors->first('shop_id') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Size</label>
                                            <select name="size_id" class="form-control">
                                                <option value="">======Select Size======</option>
                                                @foreach( $size as $item)
                                                    <option value="{{$item->id}}">{{$item->size_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Color</label>
                                            <select name="color_id" class="form-control">
                                                <option value="">======Select Color======</option>
                                                @foreach( $color as $item)
                                                    <option value="{{$item->id}}">{{$item->color_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label">Manufacturer</label>
                                            <select name="maker_id"
                                                    class="form-control {{ $errors->has('maker_id') ? 'is-invalid' : '' }}">
                                                <option value="">======Manufacturer======</option>
                                                @foreach( $maker as $item)
                                                    <option value="{{$item->id}}">{{$item->maker_name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="invalid-feedback">{{ $errors->first('maker_id') }}</span>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label">Supplier</label>
                                            <select name="supplier_id"
                                                    class="form-control {{ $errors->has('supplier_id') ? 'is-invalid' : '' }}">
                                                <option value="">======Select Supplier======</option>
                                                @foreach( $supplier as $item)
                                                    <option value="{{$item->id}}">{{$item->supplier_name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="invalid-feedback">{{ $errors->first('supplier_id') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Note</label>
                                            <input type="text" name="notes"
                                                   class="form-control"
                                                   value="{{old('notes')}}">
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
            $('#notax_price').keyup(function () {
                getPrice();
            });
        });

        function getPrice() {
            var tax_price = {{$tax}};
            var member_tax = {{$membertax}};
            var price = $('#notax_price').val();

            if (isNaN(price) || !price || price < 0 || Math.floor(price) != price) {
                $('#notax_price').val("");
                $('#member_price').val("");
                $('#tax_price').val("");
            } else {
                var tax_price = Math.round(parseFloat(price) + parseFloat(price * tax_price) / 100);
                var member_tax_price = Math.round(parseFloat(price) + parseFloat(price * member_tax) / 100);
                if (!isNaN(tax_price) && !isNaN(member_tax_price)) {
                    $('#tax_price').val(tax_price);
                    $('#member_price').val(member_tax_price);
                }
            }
        }
    </script>
@endsection