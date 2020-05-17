@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.suppliers')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('general.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('general.suppliers')</li>
            </ol>
        </div>
    </div>
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
                        <th>@lang('general.user_type')</th>
                        <th>@lang('general.tax_number')</th>
                        <th>@lang('general.Action')</th>
                        </tr>
                        @foreach ($suppliers as $key => $supplier)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->email }}</td>

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
