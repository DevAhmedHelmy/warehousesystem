@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('permission.permission')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('general.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('permission.permission')</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

<div class="col-8 offset-2">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> @lang('permission.Create_New_Role')</a>
                @endcan
            </h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10%">@lang('general.No')</th>
                        <th style="width: 45%;">@lang('general.name')</th>
                        <th style="width: 45%;">@lang('general.Action')</th>
                        </tr>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <form class="delete-form" action="{{ route('roles.destroy',$role->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('general.Show')</a>
                                    @can('role-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit fa-sm"></i> @lang('general.Edit')</a>
                                    @endcan
                                    @can('role-delete')
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
    {!! $roles->render() !!}
</div>
@endsection
