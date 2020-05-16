{{-- Modal --}}
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">

            <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-search"></i> @lang('admin.search')</h5>

        </div>
        <div class="modal-body">

            <form action="#" method="get">



            <div class="row">
                <div class="col-12">
                    <div class="mt-4 d-flex justify-content-between">

                        <div class="col form-group">
                            <label>@lang('admin.company_code')</label>
                            <input type="text" class="form-control"
                                   name="code" value="{{old('code')}}"
                                   placeholder="@lang('admin.company_code')">
                        </div>


                    </div>
                    <div class="mt-4 d-flex justify-content-between">

                        <div class="col form-group">
                            <label>@lang('admin.name')</label>
                            <input type="text" class="form-control"
                                   name="name"
                                   value="{{old('name')}}"
                                   placeholder="@lang('admin.name')">

                        </div>

                    </div>
                </div>


                <div class="text-center col-md-12">
                    <button type="submit" class="mt-2 mb-3 btn btn-primary btn-l btn-rounded"> <i class="fa fa-check"></i> @lang('admin.search')</button>
                    </div>
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-companymodal" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
</div>



