@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.clients')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('general.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('general.clients')</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                @can('client-create')
                    <a class="btn btn-success" href="{{ route('clients.create') }}"><i class="fa fa-plus"></i> @lang('general.Create_New_client')</a>
                @endcan
            </h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10%">@lang('general.No')</th>
                        <th>@lang('general.name')</th>
                        <th>@lang('general.address')</th>
                        <th>@lang('general.phone')</th>
                        <th>@lang('general.client_type')</th>

                        <th>@lang('general.Action')</th>
                    </tr>
                        @foreach ($accounts as $key => $account)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $account->client->name }}</td>
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
