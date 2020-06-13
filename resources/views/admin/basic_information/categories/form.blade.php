{{-- Modal --}}
<div class="modal fade" id="exampleModalCenter" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		  <div class="modal-content">
			<div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-plus-circle"></i> @lang('general.Create_New_category')</h5>

			</div>
			<div class="modal-body">

                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="row">
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">

                            <div class="col form-group">
                                <label>@lang('general.category_code')</label>
                                <input type="text" class="form-control"
                                       name="code" value="{{old('code')}}"
                                       placeholder="@lang('general.category_code')" required>
                                @if($errors->has('code'))
                                <div class="invalid-feedback" style="display:block;">
                                {{ $errors->first('code') }}
                                </div>
                                @endif
                            </div>


                        </div>
                        <div class="mt-4 d-flex justify-content-between">

                            <div class="col form-group">
                                <label>@lang('general.name')</label>
                                <input type="text" class="form-control"
                                       name="name"
                                       value="{{old('name')}}"
                                       placeholder="@lang('general.name')" required>
                                @if($errors->has('name'))
                                <div class="invalid-feedback" style="display:block;">
                                {{ $errors->first('name') }}
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



