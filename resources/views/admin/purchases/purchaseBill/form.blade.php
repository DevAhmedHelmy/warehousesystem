@extends('admin.layouts.app')

@section('header')

    <x-admin.breadcrumb title="sales">
        <li class="breadcrumb-item"><a href="{{ route('purchasebills.index') }}">@lang('general.purchases_bills')</a></li>
        <li class="breadcrumb-item active">@isset($purchasebill->id) @lang('general.update_sale_bill') @endisset @lang('general.Create_New_bill')</li>
    </x-admin.breadcrumb>
@endsection

@section('content')

<div class="col-12">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">@isset($purchasebill->id) @lang('general.update_sale_bill') @endisset @lang('general.Create_New_bill')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if(!isset($purchasebill->id))
            <form class="form-horizontal main_form" method="POST" action="{{ route('purchasebills.store') }}">
        @else
            <form class="form-horizontal main_form" method="POST" action="{{ route('purchasebills.update',$purchasebill->id) }}">
                @method('patch')

        @endif
            @csrf
          <div class="card-body">
            <div class="col-12">
                <div class="mt-4 d-flex justify-content-between">
                    <div class="col form-group">
                        <label for="bill_number" class="control-label">@lang('general.bill_number')</label>
                        <input type="text" name="bill_number" class="form-control @error('bill_number') is-invalid @enderror" id="bill_number" value="{{old('bill_number',$purchasebill->bill_number)}}" placeholder="@lang('general.bill_number')">

                        @error('bill_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label>@lang('general.suppliers')</label>
                        <select class="form-control select2" name="client_id">
                            <option value="">@lang('general.choose')</option>
                            @foreach($suppliers as $supplier)
                                <option @if($supplier->id == old('supplier_id',$supplier->supplier_id) ) selected @endif value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach

                        </select>
                        @error('client_id')
                            <span class="invalid-feedback" style="display:block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col form-group">
                        <label>@lang('general.stocks')</label>
                        <select class="form-control select2" name="stock_id">
                            <option value="">@lang('general.choose')</option>
                            @foreach($stocks as $stock)
                                <option data-products="{{ json_encode($stock->products) }}"
                                 @if($stock->id == old('stock_id',$purchasebill->stock_id) ) selected @endif value="{{$stock->id}}">{{$stock->name}}</option>
                            @endforeach

                        </select>
                        @error('stock_id')
                            <span class="invalid-feedback" style="display:block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                </div>
            </div>
            <div class="main_product">
                <div class="col-12 products">
                    <div class="mt-4 d-flex justify-content-between">

                        <div class="col form-group">
                            <label>@lang('general.products')</label>
                            <select class="form-control select2 change_price" name="product_id[]">
                                <option value="">@lang('general.choose')</option>
                                @foreach($products as $product)
                                    <option data-price="{{ $product->sale_price }}"
                                    @if($product->id == old('product_id',$product->product_id) ) selected @endif value="{{$product->id}}">
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
                            <label for="price" class="control-label">@lang('general.price')</label>
                            <input type="number" name="price[]" class="form-control @error('price') is-invalid @enderror price" id="price" value="" placeholder="@lang('general.price')">

                            @error('bill_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col form-group">
                            <label for="quantity" class="control-label">@lang('general.quantity')</label>
                            <input type="number" name="quantity[]" class="form-control @error('quantity') is-invalid @enderror quantity" id="quantity" value="{{old('name',$purchasebill->quantity)}}" placeholder="@lang('general.quantity')">

                            @error('bill_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col form-group">
                            <label for="tax" class="control-label">@lang('general.tax')</label>
                            <input type="number" name="tax[]" class="form-control @error('tax') is-invalid @enderror tax" id="tax" value="{{old('name',$purchasebill->tax)}}" placeholder="@lang('general.tax')">

                            @error('tax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col form-group">
                            <label for="discount" class="control-label">@lang('general.discount')</label>
                            <input type="number" name="discount[]" class="form-control @error('discount') is-invalid @enderror discount" id="discount" value="{{old('name',$purchasebill->discount)}}" placeholder="@lang('general.discount')">

                            @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col form-group">
                            <label for="price" class="control-label">@lang('general.total')</label>
                            <input type="number" name="total[]" class="form-control @error('total') is-invalid @enderror total" id="total" value="" placeholder="@lang('general.total')">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col form-group">
                <button class="btn btn-primary btn-sm" id="add_product"><i class="fa fa-plus fa-sm"></i> @lang('general.add')</button>
           </div>
            <div class="col-12">
                <div class="col form-group">
                    <label for="bill_discount" class="control-label">@lang('general.bill_discount')</label>
                    <input type="number" name="bill_discount" class="form-control bill_discount" id="total" value="" placeholder="@lang('general.bill_discount')">
                </div>
                <div class="col form-group">
                    <label for="bill_tax" class="control-label">@lang('general.bill_tax')</label>
                    <input type="number" name="bill_tax" class="form-control bill_tax" id="total" value="" placeholder="@lang('general.bill_tax')">
                </div>
                <div class="col form-group">
                    <label for="price" class="control-label">@lang('general.bill_total')</label>
                    <input type="number" name="bill_total" class="form-control bill_total" id="total" value="" placeholder="@lang('general.bill_total')">
                </div>
            </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info">@lang('general.save')</button>

            <a class="float-left btn btn-danger" href="{{ route('purchasebills.index') }}"> @lang('general.back')</a>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
</div>

@endsection
@section('js')
    <script>
        var counter = 1;
        var stock_product_content='';

        $('#add_product').click(function(e){
            e.preventDefault();

            var content = `<div class="col-12 products" id="${counter}">
                <div class="mt-4 d-flex justify-content-between">
                    <div class="col form-group">
                        <label>@lang('general.products')</label>
                        <select class="form-control select2 change_price" name="product_id[]">
                            ${stock_product_content}
                        </select>
                        @error('product_id')
                            <span class="invalid-feedback" style="display:block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="price" class="control-label">@lang('general.price')</label>
                        <input type="number" name="price[]" class="form-control price @error('price') is-invalid @enderror price" id="price" value="" placeholder="@lang('general.price')" required>
                        @error('bill_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="quantity" class="control-label">@lang('general.quantity')</label>
                        <input type="number" name="quantity[]" class="form-control @error('quantity') is-invalid @enderror quantity" id="quantity" value="{{old('name',$purchasebill->quantity)}}" placeholder="@lang('general.quantity')" required>
                        @error('bill_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="tax" class="control-label">@lang('general.tax')</label>
                        <input type="number" name="tax[]" class="form-control @error('tax') is-invalid @enderror tax" id="tax" value="{{old('name',$purchasebill->tax)}}" placeholder="@lang('general.tax')">
                        @error('tax')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="discount" class="control-label">@lang('general.discount')</label>
                        <input type="number" name="discount[]" class="form-control @error('discount') is-invalid @enderror discount" id="discount" value="{{old('name',$purchasebill->discount)}}" placeholder="@lang('general.discount')">
                        @error('discount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="total" class="control-label">@lang('general.total')</label>
                        <input type="number" name="total[]" class="form-control @error('total') is-invalid @enderror total" id="total" value="" placeholder="@lang('general.total')" required>
                    </div>
                    <div class="col form-group">
                        <label for="remove" class="control-label"></label>
                        <button class="btn btn-danger btn-sm remove_product" data-id="${counter}"><i class="fa fa-window-close fa-sm"></i> @lang('general.remove')</button>
                   </div>
                </div>
            </div>`;
            $(content).insertAfter('.main_product');

        });
        $(document).on('click','.remove_product',function(e){
            e.preventDefault();
            $('#'+$(this).data('id')).remove();
        });

        $(document).on('change','.change_price',function(e){
            var price = $(this).find(":selected").data('price');
            $(this).closest('.products').find('.price').val(price);
        });
        $(document).on('change','.quantity',function(){
            var price = $(this).closest('.products').find('.price').val();
            var quantity = $('.quantity').val();
            var total = price * quantity;
            $(this).closest('.products').find('.total').val(total);
        });
        $(document).on('change','.tax',function(){
            var price = $(this).closest('.products').find('.price').val();
            var quantity = $(this).closest('.products').find('.quantity').val();
            var tax = $('.tax').val();
            var total = price * quantity;
            var total_after_tax =  total + (total * tax);
            $(this).closest('.products').find('.total').val(total_after_tax);
        });
        $(document).on('change','.discount',function(){
            var price = $(this).closest('.products').find('.price').val();
            var discount = $('.discount').val();
            var total =  total - (total * discount);
            $(this).closest('.products').find('.total').val(total);
        });

        $('.quantity').on('change', function(){
            var bill_total = 0;
            // on every keyup, loop all the elements and add all the results
            $(this).closest('.products').find('.total').each(function(index, element) {
                var val = parseFloat($(element).val());
                console.log($(element).val());
                if( !isNaN( val )){
                    bill_total += val;
                }
            });
            console.log(bill_total);
        });

        $('select[name="stock_id"]').change(function(){
            var stock_products = $(this).find(":selected").data('products');

            let content = '<option value="">@lang('general.choose')</option>';

            $.each(stock_products,function(key,item){
             content = content +`<option data-price="${item.sale_price}" value="${item.id}">${item.code} - ${item.name}</option>`;
            });

            stock_product_content = content;

            $('.change_price').html(content);

        });
    </script>
@endsection
