@extends('admin.layouts.app')

@section('header')
    <x-admin.breadcrumb title="companies">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('general.dashboard')</a></li>
        <li class="breadcrumb-item active">@lang('general.companies')</li>
    </x-admin.breadcrumb>
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @can('company-create')
                    <button type="button" class="bg-green-600 text-white rounded py-2 px-3 addcompany" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-plus"></i> @lang('general.Create_New_company')
					</button>
                    @endcan
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 10%">@lang('general.No')</th>
							<th>@lang('general.company_code')</th>
                            <th>@lang('general.name')</th>
							<th>@lang('general.created_at')</th>
                            <th>@lang('general.Action')</th>
                            </tr>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->code}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->created_at->format('Y/m/d')}}</td>
                                <td>
                                    <form class="delete-form" action="{{ route('companies.destroy',$company->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-info btn-sm" href="{{ route('companies.show',$company->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('general.Show')</a>
                                        @can('company-edit')
                                        <span data-toggle="modal" data-target="#exampleModalCenter">
                                            <a data-url="{{route('companies.update',$company->id)}}"
                                                data-code="{{$company->code}}" data-name="{{$company->name}}" data-phone="{{$company->phone}}" data-email="{{$company->email}}" data-tax="{{$company->tax_number}}"
                                            href="{{route('companies.edit',$company->id)}}" class="btn btn-primary btn-sm editcompany"
                                                data-toggle="tooltip" data-placement="top" title="@lang('general.Edit')">
                                                <i class="fa fa-edit fa-sm"></i> @lang('general.Edit')
                                            </a>
                                        </span>
                                        @endcan
                                        @can('company-delete')
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
        {!! $companies->render() !!}
    </div>
    @include('admin.basic_information.companies.form')
    <button type="button" class="btn btn-primary display-error" data-toggle="modal" data-target="#exampleModalCenter" style="display:none;"></button>


    {{--  search  --}}
    @include('admin.basic_information.companies.search')
    @endsection

@section('js')
<script>
    $('.addcompany').click(function(){
    $('#exampleModalLongTitle').text("@lang('general.Create_New_company')");
    $('.modal-body form').attr('action', "{{route('companies.store')}}");
    $('.modal-body form').find('input[name!="_token"]').val('');
    $('.modal-body form').find('input[name="_method"]').remove();
    localStorage.setItem("action", "create");
    localStorage.setItem("prev_url", "{{route('companies.store')}}");

    });

    // show edit data of company
    $('.editcompany').click(function(e){
         e.preventDefault();
         $('input[name="code"]').val($(this).data('code'));
         $('input[name="name"]').val($(this).data('name'));
         $('input[name="email"]').val($(this).data('email'));
         $('input[name="phone"]').val($(this).data('phone'));
         $('input[name="tax"]').val($(this).data('tax_number'));
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

