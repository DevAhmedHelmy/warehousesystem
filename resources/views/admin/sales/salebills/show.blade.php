@extends('admin.layouts.app')
@section('header')
    <x-admin.breadcrumb title="sales">
        <li class="breadcrumb-item"><a href="{{route('salebills.index')}}">@lang('general.sales_bills')</a></li>
        <li class="breadcrumb-item active">{{ $saleBill->bill_number }}</li>
    </x-admin.breadcrumb>
@endsection
@section('content')
<div class="col-12">
    @if(isset($saleBill) && !is_null($saleBill->invoiceSaleBills))
        <div class="card card-outline card-success">
            {{--  <div class="card-header">
            <h3 class="card-title"></h3>
            </div>  --}}
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.name')</h5>
                        <span class="description-text"> {{ $saleBill->client->name }} </span>
                        </div>
                    </div>
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.bill_number')</h5>
                        <span class="description-text"> {{ $saleBill->bill_number }} </span>
                        </div>

                    </div>

                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.created_at')</h5>
                        <span class="description-text"> {{ $saleBill->created_at->format('Y/m/d') }} </span>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>@lang('general.No')</th>
                                <th>@lang('general.product_code')</th>
                                <th>@lang('general.name')</th>
                                <th>@lang('general.purchase_price')</th>
                                <th>@lang('general.quantity')</th>
                                <th>@lang('general.discount')</th>
                                <th>@lang('general.tax')</th>
                                <th>@lang('general.total')</th>

                                <th>@lang('general.controll')</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($saleBill->invoiceSaleBills as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <th>{{$item->product->code}}</th>
                                <th>{{$item->product->name}}</th>
                                <th>{{$item->product->purchase_price}}</th>
                                <th scope="row">{{$item->quantity}}</th>
                                <th scope="row">{{$item->discount}}</th>
                                <th scope="row">{{$item->tax}}</th>
                                <th scope="row">{{$item->total}}</th>
                                <td>

                                    <a href="{{ route('products.show', $item->id) }}" class="btn btn-info btn-sm" data-target='tooltip' title="{{ trans('general.show') }}"><i class="fa fa-eye fa-sm"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">@lang('general.total')</td>
                                <td>{{$saleBill->discount}}</td>
                                <td>{{$saleBill->tax}}</td>
                                <td colspan="2">{{$saleBill->total}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="card card-outline card-danger">
            <div class="card-header">
            <h3 class="card-title">@lang('general.products')</h3>
            </div>
            <div class="card-body">
                @lang('general.no_data_found')
            </div>
        </div>

    @endif
</div>
@endsection
