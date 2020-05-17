@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.suppliers')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">@lang('general.suppliers')</a></li>
                <li class="breadcrumb-item active">@if(!$supplier->id) @lang('general.Create_New_supplier') @else @lang('general.update_supplier') @endif</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')


<div class="col-12">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">@if(!$supplier->id) @lang('general.Create_New_supplier') @else @lang('general.update_supplier') @endif</h3>
        </div>

        @if(!$supplier->id)
            <form class="form-horizontal" method="POST" action="{{ route('suppliers.store') }}">
        @else
            <form class="form-horizontal" method="POST" action="{{ route('suppliers.update',$supplier->id) }}">
            @method('patch')
            <input type="hidden" name="id" value="{{ $supplier->id }}">
        @endif
            @csrf
            <input type="hidden" name="type" value="supplier">
            <div class="card-body">
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">
                            <div class="col form-group">
                                <label for="name" class="col-sm-4 control-label">@lang('general.name')</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name',$supplier->name)}}" placeholder="@lang('general.name')" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="phone" class="col-sm-4 control-label">@lang('general.phone')</label>
                                <input type="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone',$supplier->phone)}}" placeholder="@lang('general.phone')" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">

                            <div class="col form-group">
                                <label for="user_type" class="col-sm-4 control-label">@lang('general.supplier_type')</label>
                                <select name="user_type" id="user_type" class="form-control">
                                    <option value="">Choose</option>
                                    <option @if($supplier->user_type == 'cash') selected @endif value="cash">cash</option>
                                    <option @if($supplier->user_type == 'installment') selected @endif value="installment">installment</option>
                                    <option @if($supplier->user_type == 'checks') selected @endif value="checks">checks</option>
                                </select>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="balance" class="col-sm-4 control-label">@lang('general.balance')</label>
                                <input type="text" name="balance" class="form-control @error('balance') is-invalid @enderror" id="balance" value="{{old('balance',$supplier->balance)}}" placeholder="@lang('general.balance')" required>
                                @error('balance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">
                            <div class="col form-group">
                                <label>@lang('general.companies')</label>
                                <select class="form-control select2" name="company_id">
                                    <option value="">@lang('general.choose')</option>
                                    @foreach($companies as $company)
                                        <option @if($company->id == old('company_id',$supplier->company_id) ) selected @endif value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach

                                </select>
                                @error('company_id')
                                    <span class="invalid-feedback" style="display:block;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="tax_number" class="col-sm-4 control-label">@lang('general.tax_number')</label>
                                <input type="text" name="tax_number" class="form-control @error('tax_number') is-invalid @enderror" id="tax_number" value="{{old('tax_number',$supplier->tax_number)}}" placeholder="@lang('general.tax_number')" required>
                                @error('tax_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">
                            <div class="col form-group">
                                <label for="address" class="col-sm-4 control-label">@lang('general.address')</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="30" rows="3">{{old('address',$supplier->address)}}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">@lang('general.save')</button>
                <a class="float-left btn btn-danger" href="{{ route('suppliers.index') }}"> @lang('general.back')</a>
            </div>
        </form>
    </div>
</div>
@endsection
