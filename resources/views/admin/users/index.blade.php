@extends('admin.layouts.app')

@section('header')
    <x-admin.breadcrumb title="users">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('general.dashboard')</a></li>
        <li class="breadcrumb-item active">@lang('general.users')</li>
    </x-admin.breadcrumb>
@endsection

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                @can('user-create')
                <x-admin.actions.add_new url="users.create" class="bg-green-600 text-white rounded py-2 px-3">
                      @lang('general.Create_New_user')
                </x-admin.actions.add_new>
                @endcan
            </h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10%">@lang('general.No')</th>
                        <th>@lang('general.name')</th>
                        <th>@lang('general.Email')</th>
                        <th>@lang('general.Roles')</th>

                        <th>@lang('general.Action')</th>
                        </tr>
                        @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                <form class="delete-form" action="{{ route('users.destroy',$user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('general.Show')</a>
                                    @can('user-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit fa-sm"></i> @lang('general.Edit')</a>
                                    @endcan
                                    @can('user-delete')
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
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
