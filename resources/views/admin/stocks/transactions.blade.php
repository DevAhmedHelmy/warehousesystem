@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.stocks')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('general.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('general.stocks')</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
@if(isset($transactions))
<div class="col-12">
    <div class="card card-outline card-success">
        <div class="card-header">
          <h3 class="card-title">@lang('general.transactions')</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          {{-- /.card-tools --}}
        </div>
        {{-- /.card-header --}}

            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>@lang('general.No')</th>
                            <th>@lang('general.name')</th>
                            <th>@lang('general.first_balance')</th>
                            <th>@lang('general.additions')</th>
                            <th>@lang('general.outgoing')</th>
                            <th>@lang('general.end_balance')</th>
                            <th>@lang('general.controll')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $product)
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