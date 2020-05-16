@extends('admin.layouts.app')

@section('header')
<div class="mb-2 row">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">@lang('general.dashboard')</h1>
    </div>{{-- /.col --}}
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{route('products.index')}}">@lang('general.products')</a></li>
        <li class="breadcrumb-item active">{{$product->name}}</li>
      </ol>
    </div>{{-- /.col --}}
  </div>{{-- /.row --}}
@endsection
@section('content')
<div class="col-12">

    <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">@lang('general.product_data')</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          {{-- /.card-tools --}}
        </div>
        {{-- /.card-header --}}

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.No')</h5>
                        <span class="description-text">{{$product->id}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.product_code')</h5>
                        <span class="description-text">{{$product->code}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.name')</h5>
                        <span class="description-text">{{$product->name}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.purchase_price')</h5>
                        <span class="description-text">{{$product->purchase_price}}</span>
                        </div>

                    </div>

                </div>
                <hr>
                <div class="row">
                    @if(!is_null($product->category))

                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                            <h5 class="description-header">@lang('general.category_name')</h5>
                            <span class="description-text">{{$product->category->name}}</span>
                            </div>

                        </div>
                    @endif
                    @if(!is_null($product->company))

                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                            <h5 class="description-header">@lang('general.company_name')</h5>
                            <span class="description-text">{{$product->company->name}}</span>
                            </div>

                        </div>
                    @endif
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.created_at')</h5>
                        <span class="description-text">{{$product->created_at->format('Y/m/d')}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.updated_at')</h5>
                        <span class="description-text">{{$product->updated_at->format('Y/m/d')}}</span>
                        </div>

                    </div>
                </div>



            </div>

        {{-- /.card-body --}}
    </div>

</div>

@endsection
