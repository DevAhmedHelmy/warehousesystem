@extends('admin.layouts.app')
@section('header')
    <x-admin.breadcrumb title="users">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ trans('general.users') }}</a></li>
        <li class="breadcrumb-item active">@if(!$user->id) @lang('general.Create_New_user') @else @lang('general.update_user') @endif</li>
    </x-admin.breadcrumb>
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
            <input type="hidden" name="id" value="{{ $user->id }}">
        @endif
            @csrf
            <div class="card-body">
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">
                            <div class="col form-group">
                                <label for="name" class="col-sm-4 control-label">@lang('general.name') <span class="text-red-500">&nbsp;*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name',$user->name)}}" placeholder="@lang('general.name')" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="email" class="col-sm-4 control-label">@lang('general.Email') <span class="text-red-500">&nbsp;*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email',$user->email)}}" placeholder="@lang('general.Email')" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">
                            <div class="col form-group">
                                <label for="password" class="col-sm-4 control-label">@lang('general.password') @if(!$user->id)<span class="text-red-500">&nbsp;*</span>@endif</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" @if(!$user->id) required @endif autocomplete="new-password" placeholder="@lang('general.password')">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col form-group">
                                <label for="password-confirm" class="col-sm-4 control-label">@lang('general.password_confirmation') @if(!$user->id)<span class="text-red-500">&nbsp;*</span>@endif</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" @if(!$user->id) required @endif autocomplete="new-password" placeholder="@lang('general.password_confirmation')">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">
                            <div class="col form-group">
                                <label for="job" class="col-sm-4 control-label">@lang('general.job') <span class="text-red-500">&nbsp;*</span></label>
                                <input type="text" name="job" class="form-control @error('job') is-invalid @enderror" id="job" value="{{old('job',$user->job)}}" placeholder="@lang('general.job')" required>
                                @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="phone" class="col-sm-4 control-label">@lang('general.phone') <span class="text-red-500">&nbsp;*</span></label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone',$user->phone)}}" placeholder="@lang('general.phone')" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">
                            <div class="col form-group">
                                <label for="address" class="col-sm-4 control-label">@lang('general.address')</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="30" rows="3" placeholder="@lang('general.address')">{{old('address',$user->address)}}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">
                            <div class="col form-group">
                                <label> @lang('general.Roles') <span class="text-red-500">&nbsp;*</span></label>
                                <select multiple name="roles[]" class="form-control select2" required>
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
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">@lang('general.save')</button>
                <a class="float-left btn btn-danger" href="{{ route('users.index') }}"> @lang('general.back')</a>
            </div>
        </form>
    </div>
</div>
@endsection

