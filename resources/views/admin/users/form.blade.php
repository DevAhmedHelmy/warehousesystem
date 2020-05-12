@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.users')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">@lang('permission.permission')</a></li>
            <li class="breadcrumb-item active">@if(!$user->id) @lang('general.Create_New_user') @else @lang('general.update_user') @endif</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')


<div class="col-12">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">@if(!$user->id) @lang('general.Create_New_user') @else @lang('general.update_user') @endif</h3>
        </div>

        @if(!$user->id)
            <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
        @else
            <form class="form-horizontal" method="POST" action="{{ route('users.update',$user->id) }}">
            @method('patch')
        @endif
            @csrf
            <div class="card-body">
                <div class="col-8 offset-2">
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">@lang('general.name')</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name',$user->name)}}" placeholder="@lang('general.name')" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">@lang('general.Email')</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email',$user->email)}}" placeholder="@lang('general.Email')" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-4 control-label">@lang('general.password')</label>


                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" @if(!$user->id) required @endif autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="col-sm-4 control-label">@lang('general.password_confirmation')</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" @if(!$user->id) required @endif autocomplete="new-password">

                    </div>
                    <div class="form-group">
                        <label> @lang('general.Roles') </label>
                        <select multiple name="roles[]" class="form-control">

                            @foreach($roles as $role)
                                @if(isset($userRole) && array_key_exists($role, $userRole))
                                    <option value="{{ $role }}" @if($userRole[$role]) selected @endif>{{ $role }}</option>
                                @else
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endif
                            @endforeach


                        </select>
                    </div>
                </div>
            </div>




            <div class="card-footer">
                <div class="col-8 offset-2">
                    <button type="submit" class="btn btn-info">@lang('general.save')</button>

                    <a class="float-left btn btn-danger" href="{{ route('users.index') }}"> @lang('general.back')</a>
                </div>
            </div>

        </form>
    </div>
</div>


@endsection
