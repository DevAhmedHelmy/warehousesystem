<div class="modal fade" id="exampleModal" tabindex="-1" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLongTitle"></h5>
               
            </div>
            <div class="modal-body">
              <form action="{{ route('units.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="nameInput">@lang('general.name')</label>
                    <input type="text" class="form-control" name="name" id="nameInput" value="{{ old('name') }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback" style="display:block;">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                 

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm ml-2" data-dismiss="modal"><i class="fa fa-times fa-sm"></i> @lang('general.close')</button>
              <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save fa-sm"></i> @lang('general.save')</button>
            </div>
        </form>
        </div>
    </div>
</div>
