@extends('admin.layouts.app')

@section('header')
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('general.products')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('general.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('general.products')</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @can('role-create')
                        <a class="btn btn-success" href="{{ route('products.create') }}"><i class="fa fa-plus"></i> @lang('general.Create_New_Product')</a>
                    @endcan
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 10%">@lang('general.No')</th>
							<th>@lang('general.product_code')</th>
                            <th>@lang('general.name')</th>
                            <th>@lang('general.purchase_price')</th>
							<th>@lang('general.created_at')</th>
                            <th>@lang('general.Action')</th>
                            </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->code}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->purchase_price}}</td>
                                <td>{{$product->created_at->format('Y/m/d')}}</td>
                                <td>
                                    <form class="delete-form" action="{{ route('products.destroy',$product->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('general.Show')</a>
                                        @can('role-edit')
                                        <span data-toggle="modal" data-target="#exampleModalCenter">
                                            <a data-url="{{route('products.update',$product->id)}}"
                                                                       data-code="{{$product->code}}" data-name="{{$product->name}}"
                                            href="{{route('products.edit',$product->id)}}" class="btn btn-primary btn-sm edit"
                                                data-toggle="tooltip" data-placement="top" title="@lang('general.Edit')">
                                                <i class="fa fa-edit fa-sm"></i> @lang('general.Edit')
                                            </a>
                                        </span>
                                        @endcan
                                        @can('role-delete')
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
        {!! $products->links() !!}
    </div>

    @endsection


