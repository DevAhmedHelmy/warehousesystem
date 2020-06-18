@extends('admin.layouts.app')

@section('header')

    <x-admin.breadcrumb title="suppliers">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('general.dashboard')</a></li>
        <li class="breadcrumb-item active">@lang('general.suppliers')</li>
    </x-admin.breadcrumb>
@endsection

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                @can('supplier-create')
                    <a class="btn btn-success" href="{{ route('suppliers.create') }}"><i class="fa fa-plus"></i> @lang('general.Create_New_supplier')</a>
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
                        <th>@lang('general.supplier_type')</th>

                        <th>@lang('general.Action')</th>
                    </tr>
                        @foreach ($suppliers as $key => $supplier)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>@if(!is_null($supplier->address)){{ $supplier->address }}@else @lang('general.no_data_found')@endif</td>
                            <td>{{ $supplier->phone }}</td>
                            <td>{{ $supplier->user_type }}</td>
                            <td>
                                <form class="delete-form" action="{{ route('suppliers.destroy',$supplier->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-info btn-sm" href="{{ route('suppliers.show',$supplier->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('general.Show')</a>
                                    @can('supplier-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('suppliers.edit',$supplier->id) }}"><i class="fa fa-edit fa-sm"></i> @lang('general.Edit')</a>
                                    @endcan
                                    @can('supplier-delete')
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
            {{ $suppliers->links() }}
        </div>
    </div>
</div>
@endsection
