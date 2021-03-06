@extends('admin.layouts.app')

@section('header')
<div class="mb-2 row">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">@lang('general.dashboard')</h1>
    </div>{{-- /.col --}}
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{route('clients.index')}}">@lang('general.clients')</a></li>
        <li class="breadcrumb-item active">{{$client->name}}</li>
      </ol>
    </div>{{-- /.col --}}
  </div>{{-- /.row --}}
@endsection
@section('content')
<div class="col-12">

    <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">@lang('general.client')</h3>

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
                        <span class="description-text">{{$client->name}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.email')</h5>
                        <span class="description-text">{{$client->email}}</span>
                        </div>

                    </div>

                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.job')</h5>
                        <span class="description-text">{{$client->job}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.hire_date')</h5>
                        <span class="description-text">{{$client->hire_date}}</span>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.address')</h5>
                        <span class="description-text">{{$client->address}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.phone')</h5>
                        <span class="description-text">{{$client->phone}}</span>
                        </div>

                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                        <h5 class="description-header">@lang('general.salary')</h5>
                        {{-- <span class="description-text">{{$client->salary}}</span> --}}
                        </div>

                    </div>
                </div>
                <hr>

            </div>

        {{-- /.card-body --}}
    </div>

</div>

@endsection
