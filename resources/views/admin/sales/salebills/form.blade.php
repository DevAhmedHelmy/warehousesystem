@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.permission')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">@lang('general.permission')</a></li>
            <li class="breadcrumb-item active">@if(!$saleBill->id) @lang('general.Create_New_Role') @else @lang('general.update_Role') @endif</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

<div class="col-12">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">@if(!$saleBill->id) @lang('general.Create_New_Role') @else @lang('general.update_Role') @endif</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if(!$saleBill->id)
            <form class="form-horizontal main_form" method="POST" action="{{ route('salebills.store') }}">
        @else
            <form class="form-horizontal main_form" method="POST" action="{{ route('salebills.update',$saleBill->id) }}">
                @method('patch')

        @endif
            @csrf
          <div class="card-body">
            <div class="col-12">
                <div class="mt-4 d-flex justify-content-between">
                    <div class="col form-group">
                        <label for="bill_number" class="control-label">@lang('general.bill_number')</label>
                        <input type="text" name="bill_number" class="form-control @error('bill_number') is-invalid @enderror" id="bill_number" value="{{old('bill_number',$saleBill->bill_number)}}" placeholder="@lang('general.bill_number')" required>

                        @error('bill_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label>@lang('general.clients')</label>
                        <select class="form-control select2" name="client_id">
                            <option value="">@lang('general.choose')</option>
                            @foreach($clients as $client)
                                <option @if($client->id == old('client_id',$client->client_id) ) selected @endif value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach

                        </select>
                        @error('client_id')
                            <span class="invalid-feedback" style="display:block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 test">
                <div class="mt-4 d-flex justify-content-between">

                    <div class="col form-group">
                        <label>@lang('general.products')</label>
                        <select class="form-control select2" name="product_id[]">
                            <option value="">@lang('general.choose')</option>
                            @foreach($products as $product)
                                <option @if($product->id == old('product_id',$product->product_id) ) selected @endif value="{{$product->id}}">
                                    {{$product->code}} - {{$product->name}}</option>
                            @endforeach

                        </select>
                        @error('product_id')
                            <span class="invalid-feedback" style="display:block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="quantity" class="control-label">@lang('general.quantity')</label>
                        <input type="number" name="quantity[]" class="form-control @error('quantity') is-invalid @enderror" id="quantity" value="{{old('name',$saleBill->quantity)}}" placeholder="@lang('general.quantity')" required>

                        @error('bill_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="tax" class="control-label">@lang('general.tax')</label>
                        <input type="number" name="tax[]" class="form-control @error('tax') is-invalid @enderror" id="tax" value="{{old('name',$saleBill->tax)}}" placeholder="@lang('general.tax')">

                        @error('tax')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="dicount" class="control-label">@lang('general.dicount')</label>
                        <input type="number" name="dicount[]" class="form-control @error('dicount') is-invalid @enderror" id="dicount" value="{{old('name',$saleBill->dicount)}}" placeholder="@lang('general.dicount')">

                        @error('dicount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="col form-group">
                <button class="btn btn-primary" id="add_product">add</button>
           </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info">@lang('general.save')</button>

            <a class="float-left btn btn-danger" href="{{ route('salebills.index') }}"> @lang('general.back')</a>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
</div>

@endsection
@section('js')
    <script>


        var counter = 1;
        var content = `<div id="${counter}">
            <div class="mt-4 d-flex justify-content-between">

                <div class="col form-group">
                    <label>@lang('general.products')</label>
                    <select class="form-control select2" name="product_id[]">
                        <option value="">@lang('general.choose')</option>
                        @foreach($products as $product)
                            <option @if($product->id == old('product_id',$product->product_id) ) selected @endif value="{{$product->id}}">
                                {{$product->code}} - {{$product->name}}</option>
                        @endforeach

                    </select>
                    @error('product_id')
                        <span class="invalid-feedback" style="display:block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col form-group">
                    <label for="quantity" class="control-label">@lang('general.quantity')</label>
                    <input type="number" name="quantity[]" class="form-control @error('quantity') is-invalid @enderror" id="quantity" value="{{old('name',$saleBill->quantity)}}" placeholder="@lang('general.quantity')" required>

                    @error('bill_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col form-group">
                    <label for="tax" class="control-label">@lang('general.tax')</label>
                    <input type="number" name="tax[]" class="form-control @error('tax') is-invalid @enderror" id="tax" value="{{old('name',$saleBill->tax)}}" placeholder="@lang('general.tax')">

                    @error('tax')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col form-group">
                    <label for="dicount" class="control-label">@lang('general.dicount')</label>
                    <input type="number" name="dicount[]" class="form-control @error('dicount') is-invalid @enderror" id="dicount" value="{{old('name',$saleBill->dicount)}}" placeholder="@lang('general.dicount')">

                    @error('dicount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col form-group">
                    <button class="btn btn-primary remove_product" data-id="${counter}">add</button>
               </div>
            </div>
        </div>`;

        $('#add_product').click(function(e){

            e.preventDefault();

            $(content).insertAfter('.test');

        });
        $(document).on('click','.remove_product',function(e){
            e.preventDefault();
            $('#'+$(this).data('id')).remove();
        });

    </script>
@endsection
