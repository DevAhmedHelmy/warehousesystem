@extends('admin.layouts.app')

@section('header')
<div class="mb-2 row">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">@lang('general.dashboard')</h1>
    </div>{{-- /.col --}}
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{route('clients.index')}}">@lang('general.clients')</a></li>
        <li class="breadcrumb-item active">dddd</li>
      </ol>
    </div>{{-- /.col --}}
  </div>{{-- /.row --}}
@endsection
@section('content')
<div class="col-12">

    <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">@lang('general.client')</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          {{-- /.card-tools --}}
        </div>
        {{-- /.card-header --}}

            <div class="card-body">


            </div>

        {{-- /.card-body --}}
    </div>


    @if(isset($clients_account->accounts))

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
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>@lang('general.No')</th>
                            <th>@lang('general.bill_number')</th>
                            <th>@lang('general.transaction_type')</th>
                            <th>@lang('general.bill_type')</th>
                            <th>@lang('general.total')</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients_account->accounts as $account)
                        <tr>
                            <th scope="row">{{$account->id}}</th>
                            <th> {{ isset($account->saleBill->bill_number) ? $account->saleBill->bill_number : $account->purchasBill->bill_number}}</th>
                            <th> {{ isset($account->saleBill->transaction_type) ? $account->saleBill->transaction_type : $account->purchasBill->transaction_type}}</th>
                            <th> {{ isset($account->saleBill->bill_type) ? $account->saleBill->bill_type : $account->purchasBill->bill_type}}</th>
                            <td>{{$account->total}}</td>
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
          <h3 class="card-title">@lang('general.clients_account')</h3>
        </div>
        <div class="card-body">
            @lang('general.no_data_found')
        </div>

      </div>

    @endif
</div>

@endsection
