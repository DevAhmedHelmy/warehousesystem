@extends('admin.layouts.app')
@section('header')
@section('header')
<div class="mb-2 row">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">@lang('general.dashboard')</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="#">@lang('general.dashboard')</a></li>
        {{--  <li class="breadcrumb-item active">@lang('general.users')</li>  --}}
        </ol>
    </div>
</div>
@endsection


@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        </div>
    </div>
</div>
@endsection
