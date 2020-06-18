@extends('admin.layouts.app')

@section('header')
    <x-admin.breadcrumb title="users">
        <li class="breadcrumb-item"><a href="{{route('users.index')}}">@lang('general.users')</a></li>
        <li class="breadcrumb-item active">{{$user->name}}</li>
    </x-admin.breadcrumb>
@endsection
@section('content')
<div class="col-12">

    <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">@lang('general.user')</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          {{-- /.card-tools --}}
        </div>
        {{-- /.card-header --}}

            <div class="card-body">
                <div class="row">


                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.name')</h5>
                        <span class="description-text">{{$user->name}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.email')</h5>
                        <span class="description-text">{{$user->email}}</span>
                        </div>

                    </div>

                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.job')</h5>
                        <span class="description-text">{{$user->job}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.hire_date')</h5>
                        <span class="description-text">{{$user->hire_date}}</span>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.address')</h5>
                        <span class="description-text">{{$user->address}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.phone')</h5>
                        <span class="description-text">{{$user->phone}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.salary')</h5>
                        {{-- <span class="description-text">{{$user->salary}}</span> --}}
                        </div>

                    </div>
                </div>
                <hr>

            </div>

        {{-- /.card-body --}}
    </div>

</div>

@endsection
