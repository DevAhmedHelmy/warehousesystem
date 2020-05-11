@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('permission.permission')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">@lang('general.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('permission.permission')</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')



@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif




<div class="col-8 offset-2">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">@lang('permission.Create_New_Role')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{ route('roles.store') }}">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">@lang('general.name')</label>

              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" placeholder="@lang('general.name')">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <strong> @lang('permission.permission'):</strong>
                <div class="form-check">
                    <br/>
                    @foreach($permission as $value)


                        <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="form-check-input" id="{{ $value->name }}">
                        <label class="form-check-label" for="{{ $value->name }}">@lang('permission.'.$value->name)</label>
                        <br/>
                    @endforeach

                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info">@lang('general.save')</button>

            <a class="float-left btn btn-danger" href="{{ route('roles.index') }}"> @lang('general.back')</a>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
</div>

@endsection
