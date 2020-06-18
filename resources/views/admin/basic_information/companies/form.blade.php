{{-- Modal --}}
<div class="modal fade" id="exampleModalCenter" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		  <div class="modal-content">
			<div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-plus-circle"></i> @lang('general.Create_New_company')</h5>

			</div>
			<div class="modal-body">

                <form action="{{route('companies.store')}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="row">
                    <div class="col-12">
                        <div class="mt-4 d-flex justify-content-between">

                            <div class="col form-group">
                                <label>@lang('general.company_code') <span class="text-red-500">&nbsp;*</span></label>
                                <input type="text" class="form-control"
                                       name="code" value="{{old('code')}}"
                                       placeholder="@lang('general.company_code')"
                                       required>
                                @if($errors->has('code'))
                                <div class="invalid-feedback" style="display:block;">
                                {{ $errors->first('code') }}
                                </div>
                                @endif
                            </div>


                        </div>
                        <div class="mt-4 d-flex justify-content-between">

                            <div class="col form-group">
                                <label>@lang('general.name') <span class="text-red-500">&nbsp;*</span></label>
                                <input type="text" class="form-control"
                                       name="name"
                                       value="{{old('name')}}"
                                       placeholder="@lang('general.name')"
                                       required>
                                @if($errors->has('name'))
                                <div class="invalid-feedback" style="display:block;">
                                {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>

                        </div>
                        <div class="mt-4 d-flex justify-content-between">

                            <div class="col form-group">
                                <label>@lang('general.phone') <span class="text-red-500">&nbsp;*</span></label>
                                <input type="text" class="form-control"
                                       name="phone"
                                       value="{{old('phone')}}"
                                       placeholder="@lang('general.phone')"
                                       required>
                                @if($errors->has('phone'))
                                <div class="invalid-feedback" style="display:block;">
                                {{ $errors->first('phone') }}
                                </div>
                                @endif
                            </div>

                        </div>
                        <div class="mt-4 d-flex justify-content-between">

                            <div class="col form-group">
                                <label>@lang('general.email')</label>
                                <input type="email" class="form-control"
                                       name="email"
                                       value="{{old('email')}}"
                                       placeholder="@lang('general.email')">
                                @if($errors->has('email'))
                                <div class="invalid-feedback" style="display:block;">
                                {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>

                        </div>
                        <div class="mt-4 d-flex justify-content-between">

                            <div class="col form-group">
                                <label>@lang('general.tax_number')</label>
                                <input type="text" class="form-control"
                                       name="tax_number"
                                       value="{{old('tax_number')}}"
                                       placeholder="@lang('general.tax_number')">
                                @if($errors->has('tax_number'))
                                <div class="invalid-feedback" style="display:block;">
                                {{ $errors->first('tax_number') }}
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



