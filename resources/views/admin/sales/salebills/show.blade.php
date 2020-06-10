@extends('admin.layouts.app')
@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.permission')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">@lang('general.permission')</a></li>
            <li class="breadcrumb-item active">@lang('general.Create_New_Role')</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="col-12">


    @if(isset($saleBill) && !is_null($saleBill->invoiceSaleBills))
    <div class="card card-outline card-success">
        <div class="card-header">
          <h3 class="card-title">@lang('general.products')</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          {{-- /.card-tools --}}
        </div>
        {{-- /.card-header --}}

            <div class="card-body">
                <div class="row mb-5">


                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.category_name')</h5>
                        <span class="description-text"> </span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.category_code')</h5>
                        <span class="description-text"> </span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.created_at')</h5>
                        <span class="description-text"> </span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.updated_at')</h5>
                        <span class="description-text"> </span>
                        </div>

                    </div>
                    <hr>
                </div>

                <div class="row">


                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('general.No')</th>
                            <th>@lang('general.product_code')</th>
                            <th>@lang('general.name')</th>
                            <th>@lang('general.purchase_price')</th>

                            <th>@lang('general.controll')</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($saleBill->invoiceSaleBills as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>

                            <td>

                                <a href="{{ route('products.show', $item->id) }}" class="btn btn-info btn-sm" data-target='tooltip' title="{{ trans('general.show') }}"><i class="fa fa-eye fa-sm"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>

        {{-- /.card-body --}}
    </div>
    @else
    <div class="card card-outline card-danger">
        <div class="card-header">
          <h3 class="card-title">@lang('general.products')</h3>
        </div>
        <div class="card-body">
            @lang('general.no_data_found')
        </div>
        <!-- /.card-body -->
      </div>

    @endif
</div>
@endsection
