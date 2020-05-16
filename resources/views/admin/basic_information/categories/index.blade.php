@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.categories')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('general.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('general.categories')</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @can('category-create')
                    <button type="button" class="btn btn-success add" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-plus-circle"></i> @lang('general.Create_New_category')
					</button>
                    @endcan
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 10%">@lang('general.No')</th>
							<th>@lang('general.category_code')</th>
                            <th>@lang('general.name')</th>
							<th>@lang('general.created_at')</th>
                            <th>@lang('general.Action')</th>
                            </tr>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->code}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->created_at->format('Y/m/d')}}</td>
                                <td>
                                    <form class="delete-form" action="{{ route('categories.destroy',$category->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-info btn-sm" href="{{ route('categories.show',$category->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('general.Show')</a>
                                        @can('category-edit')
                                        <span data-toggle="modal" data-target="#exampleModalCenter">
                                            <a data-url="{{route('categories.update',$category->id)}}"
                                                                       data-code="{{$category->code}}" data-name="{{$category->name}}"
                                            href="{{route('categories.edit',$category->id)}}" class="btn btn-primary btn-sm edit"
                                                data-toggle="tooltip" data-placement="top" title="@lang('general.Edit')">
                                                <i class="fa fa-edit fa-sm"></i> @lang('general.Edit')
                                            </a>
                                        </span>
                                        @endcan
                                        @can('category-delete')
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
        {!! $categories->render() !!}
    </div>
    @include('admin.basic_information.categories.form')
    <button type="button" class="btn btn-primary display-error" data-toggle="modal" data-target="#exampleModalCenter" style="display:none;"></button>


    {{--  search  --}}
    @include('admin.basic_information.categories.search')
    @endsection

@section('js')
<script>
    $('.add').click(function(){
    $('#exampleModalLongTitle').text("@lang('general.Create_New_category')");
    $('.modal-body form').attr('action', "{{route('categories.store')}}");
    $('.modal-body form').find('input[name!="_token"]').val('');
    $('.modal-body form').find('input[name="_method"]').remove();
    localStorage.setItem("action", "create");
    localStorage.setItem("prev_url", "{{route('categories.store')}}");

    });

    // show edit data of company
    $('.edit').click(function(e){
         e.preventDefault();
         $('input[name="code"]').val($(this).data('code'));
         $('input[name="name"]').val($(this).data('name'));
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

