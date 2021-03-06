@extends('admin.layouts.app')

@section('header')

  <x-admin.breadcrumb title="companies">
    <li class="breadcrumb-item"><a href="{{route('companies.index')}}">@lang('general.companies')</a></li>
    <li class="breadcrumb-item active">{{$company->name}}</li>
</x-admin.breadcrumb>
@endsection
@section('content')
<div class="col-12">

    <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">@lang('general.company_data')</h3>

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
                        <h5 class="description-header">@lang('general.company_name')</h5>
                        <span class="description-text">{{$company->name}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.company_code')</h5>
                        <span class="description-text">{{$company->code}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.created_at')</h5>
                        <span class="description-text">{{$company->created_at->format('Y/m/d')}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.updated_at')</h5>
                        <span class="description-text">{{$company->updated_at->format('Y/m/d')}}</span>
                        </div>

                    </div>
                </div>



            </div>

        {{-- /.card-body --}}
    </div>
    @if(isset($company->products))
    <div class="card card-outline card-success collapsed-card">
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('general.id')</th>
                            <th>@lang('general.product_code')</th>
                            <th>@lang('general.name')</th>
                            <th>@lang('general.purchase_price')</th>

                            <th>@lang('general.controll')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($company->products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->code}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->purchase_price}}</td>
                            <td>

                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm" data-target='tooltip' title="{{ trans('general.show') }}"><i class="fa fa-eye fa-sm"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
