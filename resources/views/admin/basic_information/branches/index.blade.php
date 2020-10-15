@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.branches')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('general.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('general.branches')</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @can('branch-create')
                    <button type="button" class="btn btn-success addbranch" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus-circle"></i> @lang('general.Create_New_branch')
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
                            <th>@lang('general.address')</th>
							<th>@lang('general.created_at')</th>
                            <th>@lang('general.Action')</th>
                            </tr>
                            @foreach($branches as $branch)
                            <tr>
                                <td>{{$branch->id}}</td>
                                <td>{{$branch->name}}</td>
                                <td>{{$branch->address}}</td>
                                <td>{{$branch->created_at->format('Y/m/d')}}</td>
                                <td>
                                    <form class="delete-form" action="{{ route('branches.destroy',$branch->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-info btn-sm" href="{{ route('branches.show',$branch->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('general.Show')</a>
                                        @can('branch-edit')
                                        <span data-toggle="modal" data-target="#exampleModalCenter">
                                            <a data-url="{{route('branches.update',$branch->id)}}" data-address="{{$branch->address}}" 
                                                data-name="{{$branch->name}}" class="btn btn-primary btn-sm editbranch"
                                                data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-edit fa-sm"></i> @lang('general.Edit')
                                            </a>
                                        </span>
                                        @endcan
                                        @can('branch-delete')
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
        {!! $branches->render() !!}
    </div>
    @include('admin.basic_information.branches.form')
    <button type="button" class="btn btn-primary display-error" data-toggle="modal" data-target="#exampleModalCenter" style="display:none;"></button>
 
    @endsection
@section('js')
<script>

    @if($errors->any())

         if(localStorage.getItem("action") == 'update'){
            $('.modal-body form').append('@method("PUT")');
            $('#ModalLongTitle').text("@lang('general.update')");
          }

            $('.addbranch').click();
            $('.modal-body form').attr('action',localStorage.getItem("prev_url"));

    @endif

    $('.addbranch').click(function(){
    $('#ModalLongTitle').text("@lang('general.create_new')");
    $('.modal-body form').attr('action', "{{route('branches.store')}}");
    $('.modal-body form').find('input[name!="_token"]').val('');
    $('.modal-body form').find('input[name="_method"]').remove();
    localStorage.setItem("action", "create");
    localStorage.setItem("prev_url", "{{route('branches.store')}}");
    });

    // show edit data of company
    $('.editbranch').click(function(e){
         e.preventDefault();
         $('input[name="name"]').val($(this).data('name'));
         $('textarea[name="address"]').val($(this).data('address'));
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
