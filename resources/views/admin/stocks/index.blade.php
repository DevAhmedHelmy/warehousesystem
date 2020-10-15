@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.stocks')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('general.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('general.stocks')</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                @can('stock-create')

                    <button type="button" class="btn btn-success add" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-plus-circle"></i> @lang('general.Create_New_stock')
					</button>
                @endcan
            </h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10%">@lang('general.No')</th>
                        <th>@lang('general.name')</th>
                        <th>@lang('general.address')</th>
                        <th>@lang('general.phone')</th>
                        <th>@lang('general.Action')</th>
                    </tr>
                        @foreach ($stocks as $key => $stock)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $stock->name }}</td>
                            <td>@if(!is_null($stock->address)){{ $stock->address }}@else @lang('general.no_data_found')@endif</td>
                            <td>{{ $stock->phone }}</td>
                            <td>
                                <form class="delete-form" action="{{ route('stocks.destroy',$stock->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-info btn-sm" href="{{ route('stocks.show',$stock->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('general.Show')</a>

                                    @can('stock-edit')
                                        <span data-toggle="modal" data-target="#exampleModalCenter">
                                            <a data-url="{{route('stocks.update',$stock->id)}}"
                                               data-name="{{$stock->name}}" data-phone="{{$stock->phone}}" data-branch="{{$stock->branch_id}}" data-address="{{$stock->address}}"
                                                href="{{route('stocks.edit',$stock->id)}}" class="btn btn-primary btn-sm edit"
                                                data-toggle="tooltip" data-placement="top" title="@lang('general.Edit')">
                                                <i class="fa fa-edit fa-sm"></i> @lang('general.Edit')
                                            </a>
                                        </span>
                                        @endcan
                                    @can('stock-delete')
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

        </div>
    </div>
</div>
@include('admin.stocks.form')
@endsection
@section('js')
<script>
    $('.add').click(function(){
    $('#exampleModalLongTitle').text("@lang('general.Create_New_stock')");
    $('.modal-body form').attr('action', "{{route('stocks.store')}}");
    $('.modal-body form').find('input[name!="_token"]').val('');
    $('.modal-body form').find('input[name="_method"]').remove();
    localStorage.setItem("action", "create");
    localStorage.setItem("prev_url", "{{route('stocks.store')}}");

    });

    // show edit data of stock
    $('.edit').click(function(e){
         e.preventDefault();
         $('input[name="address"]').val($(this).data('address'));
         $('input[name="name"]').val($(this).data('name'));
         $('input[name="phone"]').val($(this).data('phone'));
         $('select[name="branch_id"]').val($(this).data('branch'));
         $('#exampleModalLongTitle').text("@lang('general.update')");
         $('.modal-body form').attr('action',$(this).data('url'));
         localStorage.setItem("prev_url", $(this).data('url'));
         $('.modal-body form').append('@method("PUT")');
         localStorage.setItem("action", "update");
    });

    //diplay errors to user
    @if($errors->any())

         if(localStorage.getItem("action") == 'update'){
            $('.modal-body form').append('@method("PUT")');
            $('#exampleModalLongTitle').text("@lang('general.update')");
          }

            $('.display-error').click();
            $('.modal-body form').attr('action',localStorage.getItem("prev_url"));

    @endif

    $('#exampleModalCenter').on('hidden.bs.modal', function () {
        $('.modal-body form').find('.invalid-feedback,input[name="_method"]').remove();
    })
</script>
@endsection
