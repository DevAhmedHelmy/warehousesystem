@extends('admin.layouts.app')
@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.products')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">@lang('general.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('general.products')</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-md-12 col-sm-12 ">

        <div class="card">
            <div class="mb-3 text-white card-header bg-info">
                <h5> @if(!$product->id)<i class="fa fa-plus-circle"></i> @lang('general.Create_New_Product') @else <i class="fa fa-refresh" aria-hidden="true"></i> @lang('general.update_product') @endif</h5>
            </div>
            <div class="card-body">
                <p> <i class="fa fa-user"></i> @lang('general.product_data')</p>
                <hr>
                @if(!$product->id)
                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @else
                    <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    <input type="hidden" name="id" value="{{ $product->id }}">
                @endif
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">

                                <div class="col-4 form-group">
                                    <label>@lang('general.product_code')</label>
                                    <input type="text" class="form-control"
                                           name="code" value="{{old('code',$product->code)}}"
                                           placeholder="@lang('general.product_code')">
                                    @error('code')
                                        <span class="invalid-feedback" style="display:block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-4 form-group">
                                    <label>@lang('general.categories')</label>
                                    <select class="form-control select2" name="category_id">
                                        <option value="">@lang('general.choose')</option>
                                        @foreach($categories as $category)
                                            <option @if($category->id == old('category_id',$product->category_id)) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" style="display:block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-4 form-group">
                                    <label>@lang('general.companies')</label>
                                    <select class="form-control select2" name="company_id">
                                        <option value="">@lang('general.choose')</option>
                                        @foreach($companies as $company)
                                            <option @if($company->id == old('company_id',$product->company_id) ) selected @endif value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach

                                    </select>
                                    @error('company_id')
                                        <span class="invalid-feedback" style="display:block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>




                            </div>
                        </div>
                        <div class="col-12">

                            <div class="mt-4 d-flex justify-content-between">

                                <div class="col form-group">
                                    <label>@lang('general.name')</label>
                                    <input type="text" class="form-control"
                                        name="name" value="{{ old('name',$product->name) }}"
                                           placeholder="@lang('general.name')">
                                    @error('name')
                                        <span class="invalid-feedback" style="display:block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">

                                <div class="col form-group">
                                    <label>@lang('general.purchase_price')</label>
                                    <input type="number" name="purchase_price" step="0.01" class="form-control" value="{{ old('purchase_price',$product->purchase_price) }}">
                                    @error('purchase_price')
                                        <span class="invalid-feedback" style="display:block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <label>@lang('general.sale_price')</label>
                                    <input type="number" name="sale_price" step="0.01" class="form-control" value="{{ old('sale_price',$product->sale_price) }}">
                                    @error('sale_price')
                                        <span class="invalid-feedback" style="display:block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">@lang('general.save')</button>
                <a class="float-left btn btn-danger" href="{{ route('products.index') }}"> @lang('general.back')</a>
              </div>
            </form>
        </div>
    </div>




@endsection
