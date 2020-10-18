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
                        @foreach ($clients as $key => $client)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $client->name }}</td>
                            <td>@if(!is_null($client->address)){{ $client->address }}@else @lang('general.no_data_found')@endif</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->user_type }}</td>
                            <td>
                                <form class="delete-form" action="{{ route('clients.destroy',$client->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-info btn-sm" href="{{ route('clients.show',$client->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('general.Show')</a>
                                    @can('client-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('clients.edit',$client->id) }}"><i class="fa fa-edit fa-sm"></i> @lang('general.Edit')</a>
                                    @endcan
                                    @can('client-delete')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-form')"><i class="fa fa-trash fa-sm"></i> @lang('general.Delete')</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                       @endforeach
                </tbody>
            </table>
        </div>
        <div class="clearfix card-footer">
            {{ $clients->links() }}
        </div>
    </div>
</div>
@endsection
