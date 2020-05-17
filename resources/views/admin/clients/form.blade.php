@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.clients')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">@lang('general.clients')</a></li>
                <li class="breadcrumb-item active">@if(!$client->id) @lang('general.Create_New_client') @else @lang('general.update_client') @endif</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')


<div class="col-12">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">@if(!$client->id) @lang('general.Create_New_client') @else @lang('general.update_client') @endif</h3>
        </div>

        @if(!$client->id)
            <form class="form-horizontal" method="POST" action="{{ route('clients.store') }}">
        @else
            <form class="form-horizontal" method="POST" action="{{ route('clients.update',$client->id) }}">
            @method('patch')
            <input type="hidden" name="id" value="{{ $client->id }}">
        @endif
            @csrf
            <div class="card-body">
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">
                            <div class="col form-group">
                                <label for="name" class="col-sm-4 control-label">@lang('general.name')</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name',$client->name)}}" placeholder="@lang('general.name')" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="email" class="col-sm-4 control-label">@lang('general.Email')</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email',$client->email)}}" placeholder="@lang('general.Email')" required>
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
                                <label for="password" class="col-sm-4 control-label">@lang('general.password')</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" @if(!$client->id) required @endif autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col form-group">
                                <label for="password-confirm" class="col-sm-4 control-label">@lang('general.password_confirmation')</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" @if(!$client->id) required @endif autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">
                            <div class="col form-group">
                                <label for="job" class="col-sm-4 control-label">@lang('general.job')</label>
                                <input type="text" name="job" class="form-control @error('job') is-invalid @enderror" id="job" value="{{old('job',$client->job)}}" placeholder="@lang('general.job')" required>
                                @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="phone" class="col-sm-4 control-label">@lang('general.phone')</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone',$client->phone)}}" placeholder="@lang('general.phone')" required>
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
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="30" rows="3">{{old('address',$client->address)}}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

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
