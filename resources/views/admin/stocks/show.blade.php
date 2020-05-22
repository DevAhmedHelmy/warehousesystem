@extends('admin.layouts.app')

@section('header')
<div class="mb-2 row">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">@lang('general.dashboard')</h1>
    </div>{{-- /.col --}}
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{route('stocks.index')}}">@lang('general.stocks')</a></li>
        <li class="breadcrumb-item active">{{$stock->name}}</li>
      </ol>
    </div>{{-- /.col --}}
  </div>{{-- /.row --}}
@endsection
@section('content')
<div class="col-12">

    <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">@lang('general.stock_data')</h3>

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
                        <h5 class="description-header">@lang('general.stock_name')</h5>
                        <span class="description-text">{{$stock->name}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.stock_code')</h5>
                        <span class="description-text">{{$stock->address}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.created_at')</h5>
                        <span class="description-text">{{$stock->created_at->format('Y/m/d')}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.updated_at')</h5>
                        <span class="description-text">{{$stock->updated_at->format('Y/m/d')}}</span>
                        </div>

                    </div>
                </div>



            </div>

        {{-- /.card-body --}}
    </div>
    @if(isset($stock->products))
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
                            <th>@lang('general.name')</th>
                            <th>@lang('general.first_balance')</th>
                            <th>@lang('general.additions')</th>
                            <th>@lang('general.outgoing')</th>
                            <th>@lang('general.end_balance')</th>
                            <th>@lang('general.controll')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stock->products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->pivot->first_balance}}</td>
                            <td>{{$product->pivot->additions}}</td>
                            <td>{{$product->pivot->outgoing}}</td>
                            <td>{{$product->pivot->end_balance}}</td>
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
