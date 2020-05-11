@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('permission.permission')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">@lang('permission.permission')</a></li>
            <li class="breadcrumb-item active">@lang('permission.show_Role')</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="col-8 offset-2">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">@lang('permission.show_Role')</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">@lang('general.name')</label>

              <div class="col-sm-10">
                <input type="text"   class="form-control" id="name" value="{{ $role->name }}" readonly>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <strong> @lang('permission.permission'):</strong>
                <div class="form-check">
                    <br/>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $value)
                            <input type="checkbox" checked value="{{ $value->id }}" class="form-check-input" id="{{ $value->name }}" disabled>
                            <label class="form-check-label" for="{{ $value->name }}">@lang('permission.'.$value->name)</label>
                            <br/>
                        @endforeach
                    @endif

                </div>
              </div>
            </div>
        </div>
          <!-- /.card-body -->
        <div class="card-footer">
            <a class="float-left btn btn-danger" href="{{ route('roles.index') }}"> @lang('general.back')</a>
        </div>
    </div>
</div>

@endsection

