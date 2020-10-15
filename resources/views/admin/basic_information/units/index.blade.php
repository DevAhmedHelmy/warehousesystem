@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.units')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('general.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('general.units')</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @can('unit-create')
                    <button type="button" class="btn btn-success addunit" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus-circle"></i> @lang('general.Create_New_unit')
					</button>
                    @endcan
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 10%">#</th>
							<th>@lang('general.name')</th> 
							<th>@lang('general.created_at')</th>
                            <th>@lang('general.Action')</th>
                            </tr>
                            @foreach($units as $unit)
                            <tr>
                                <td>{{$unit->id}}</td>
                                <td>{{$unit->name}}</td> 
                                <td>{{$unit->created_at->format('Y/m/d')}}</td>
                                <td>
                                    <form class="delete-form" action="{{ route('units.destroy',$unit->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-info btn-sm" href="{{ route('units.show',$unit->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('general.Show')</a>
                                        @can('unit-edit')
                                        <span data-toggle="modal" data-target="#exampleModalCenter">
                                            <a data-url="{{route('units.update',$unit->id)}}" 
                                                data-name="{{$unit->name}}" class="btn btn-primary btn-sm editunit"
                                                data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-edit fa-sm"></i> @lang('general.Edit')
                                            </a>
                                        </span>
                                        @endcan
                                        @can('unit-delete')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-form')"><i class="fa fa-trash fa-sm"></i> @lang('general.Delete')</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>


        </div>
        {!! $units->render() !!}
    </div>
    @include('admin.basic_information.units.form')
    
 
    @endsection
@section('js')
<script>

    @if($errors->any())

         if(localStorage.getItem("action") == 'update'){
            $('.modal-body form').append('@method("PUT")');
            $('#ModalLongTitle').text("@lang('general.update')");
          }

            $('.addunit').click();
            $('.modal-body form').attr('action',localStorage.getItem("prev_url"));

    @endif

    $('.addunit').click(function(){
    $('#ModalLongTitle').text("@lang('general.create_new')");
    $('.modal-body form').attr('action', "{{route('units.store')}}");
    $('.modal-body form').find('input[name!="_token"]').val('');
    $('.modal-body form').find('input[name="_method"]').remove();
    localStorage.setItem("action", "create");
    localStorage.setItem("prev_url", "{{route('units.store')}}");
    });

    // show edit data of company
    $('.editunit').click(function(e){
         e.preventDefault();
         $('input[name="name"]').val($(this).data('name')); 
         $('#ModalLongTitle').text("@lang('admin.update')");
         $('.modal-body form').attr('action',$(this).data('url'));
         localStorage.setItem("prev_url", $(this).data('url'));
         $('.modal-body form').append('@method("PUT")');
         localStorage.setItem("action", "update");
    });


    $('#exampleModal').on('hidden.bs.modal', function () {
        $('.modal-body form').find('.invalid-feedback,input[name="_method"]').remove();
    })
</script>
@endsection
