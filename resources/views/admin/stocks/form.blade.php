{{-- Modal --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		  <div class="modal-content">
			<div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-plus-circle"></i> @lang('general.Create_New_stock')</h5>

			</div>
			<div class="modal-body">

                <form action="{{route('stocks.store')}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="row">
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">

                            <div class="col form-group">
                                <label>@lang('general.name')</label>
                                <input type="text" class="form-control"
                                       name="name" value="{{old('name')}}"
                                       placeholder="@lang('general.name')">
                                @if($errors->has('name'))
                                <div class="invalid-feedback" style="display:block;">
                                {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>


                        </div>
                        <div class="mt-4 d-flex justify-content-between">

                            <div class="col form-group">
                                <label>@lang('general.address')</label>
                                <input type="text" class="form-control"
                                       name="address"
                                       value="{{old('address')}}"
                                       placeholder="@lang('general.address')">
                                @if($errors->has('address'))
                                <div class="invalid-feedback" style="display:block;">
                                {{ $errors->first('address') }}
                                </div>
                                @endif
                            </div>

                        </div>
                        <div class="mt-4 d-flex justify-content-between">

                            <div class="col form-group">
                                <label>@lang('general.phone')</label>
                                <input type="text" class="form-control"
                                       name="phone"
                                       value="{{old('phone')}}"
                                       placeholder="@lang('general.phone')">
                                @if($errors->has('phone'))
                                <div class="invalid-feedback" style="display:block;">
                                {{ $errors->first('phone') }}
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>



                </div>

			</div>
			<div class="modal-footer">
                <button type="button" class="ml-2 btn btn-danger close-companymodal" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-success btn-l btn-rounded"> <i class="fa fa-check"></i> @lang('general.save')</button>

            </div>
        </form>
		  </div>
		</div>
</div>



