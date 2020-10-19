@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.clients')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">@lang('general.sales')</a></li>
            <li class="breadcrumb-item active">@lang('general.clients_account')</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                 @lang('general.clients_account')
            </h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10%">@lang('general.No')</th>
                        <th>@lang('general.account_number')</th>
                        <th>@lang('general.name')</th>

                        <th>@lang('general.Action')</th>
                    </tr>
                        @foreach ($accounts as $key => $account)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $account->client->id }}</td>
                                <td>{{ $account->client->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('clients_account.show',$account->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('general.Show')</a>
                                </td>
                            </tr>
                       @endforeach
                </tbody>
            </table>
        </div>
        <div class="clearfix card-footer">
            {{ $accounts->links() }}
        </div>
    </div>
</div>
@endsection
