@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Entry') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('new.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }}" name="product_name" value="{{ old('product_name') }}" required autofocus>

                                @if ($errors->has('product_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_image_url" class="col-md-4 col-form-label text-md-right">{{ __('Product Img Url') }}</label>

                            <div class="col-md-6">
                                <input id="product_image_url" rows="4"  class="form-control{{ $errors->has('product_image_url') ? ' is-invalid' : '' }}" name="product_image_url" value="{{ old('product_image_url') }}" required>


                                @if ($errors->has('product_image_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_image_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="affiliate_url" class="col-md-4 col-form-label text-md-right">{{ __('Affiliate Url') }}</label>

                            <div class="col-md-6">
                                <textarea id="affiliate_url" rows="4"  class="form-control{{ $errors->has('affiliate_url') ? ' is-invalid' : '' }}" name="affiliate_url" value="{{ old('affiliate_url') }}" required>
                                </textarea>

                                @if ($errors->has('affiliate_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('affiliate_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="former_price" class="col-md-4 col-form-label text-md-right">{{ __('Former Price') }}</label>

                            <div class="col-md-6">
                                <input id="former_price" type="text" class="form-control{{ $errors->has('former_price') ? ' is-invalid' : '' }}" name="former_price" value="{{ old('former_price') }}" required autofocus>

                                @if ($errors->has('former_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('former_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="current_price" class="col-md-4 col-form-label text-md-right">{{ __('Current Price') }}</label>

                            <div class="col-md-6">
                                <input id="current_price" type="text" class="form-control{{ $errors->has('current_price') ? ' is-invalid' : '' }}" name="current_price" value="{{ old('current_price') }}" required autofocus>

                                @if ($errors->has('current_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('current_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select id="category_id" type="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" required>
                                    <option value="">Select</option>

                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach



                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subcategory_id" class="col-md-4 col-form-label text-md-right">{{ __('SubCategory') }}</label>

                            <div class="col-md-6">
                                <select id="subcategory_id" type="subcategory_id" class="form-control{{ $errors->has('subcategory_id') ? ' is-invalid' : '' }}" name="subcategory_id" required>
                                    <option value="">Select</option>


                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                                    @endforeach




                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="seller" class="col-md-4 col-form-label text-md-right">{{ __('Seller') }}</label>

                            <div class="col-md-6">
                                <input id="seller" type="text" class="form-control{{ $errors->has('seller') ? ' is-invalid' : '' }}" name="seller" value="{{ old('seller') }}" required autofocus>

                                @if ($errors->has('seller'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('seller') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="visits" class="col-md-4 col-form-label text-md-right">{{ __('Visits') }}</label>

                            <div class="col-md-6">
                                <input id="visits" type="text" class="form-control{{ $errors->has('visits') ? ' is-invalid' : '' }}" name="visits" value="{{ old('visits') }}" required autofocus>

                                @if ($errors->has('visits'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('visits') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand_id" class="col-md-4 col-form-label text-md-right">{{ __('Brand Id') }}</label>

<div class="col-md-6">
                            <select name="brand_id" id="brand_id" type="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" required>
                                <option value="">Select</option>

                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach



                            </select>

                        </div>



                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Publish Post') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
