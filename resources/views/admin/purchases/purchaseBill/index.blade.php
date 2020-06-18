@extends('admin.layouts.app')

@section('header')
<x-admin.breadcrumb title="purchases">
    <li class="breadcrumb-item"><a href="#">@lang('general.purchases_bills')</a></li>
</x-admin.breadcrumb>
@endsection

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                @can('sale-bills-create')
                    <a class="btn btn-success" href="{{ route('purchasebills.create') }}"><i class="fa fa-plus"></i> @lang('general.Create_New_bill')</a>
                @endcan
            </h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10%">@lang('general.No')</th>
                        <th style="width: 30%;">@lang('general.name')</th>
                        <th style="width: 30%;">@lang('general.name')</th>
                        <th style="width: 30%;">@lang('general.Action')</th>
                        </tr>

                    @foreach ($purchasebills as $key => $value)
                        <tr>

                            <td>{{ ++$i }}</td>
                            <td>{{ $value->bill_number }}</td>
                            <td>{{ $value->supplier->name }}</td>
                            <td>
                                <form class="delete-form" action="{{ route('purchasebills.destroy',$value->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-info btn-sm" href="{{ route('purchasebills.show',$value->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('general.Show')</a>
                                    @can('sale-bills-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('purchasebills.edit',$value->id) }}"><i class="fa fa-edit fa-sm"></i> @lang('general.Edit')</a>
                                    @endcan
                                    @can('sale-bills-delete')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-form')"><i class="fa fa-trash fa-sm"></i> @lang('general.Delete')</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>


    </div>
    {!! $purchasebills->render() !!}
</div>
@endsection
