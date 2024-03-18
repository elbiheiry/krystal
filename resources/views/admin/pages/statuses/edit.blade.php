<form class="modal-content text-center ajax-form" method="put"
    action="{{ route('admin.statuses.update', ['status' => $status->id]) }}">
    @csrf
    @method('put')
    <div class="modal-body text-center">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Status (EN)</label>
                    <input type="text" class="form-control" name="name_en"
                        value="{{ $status->translate('en')->name }}">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Status (AR)</label>
                    <input type="text" class="form-control" name="name_ar"
                        value="{{ $status->translate('ar')->name }}">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        <button class="custom-btn" type="submit">
            <i class="fa fa-plus"></i> Save change
        </button>
        <button type="button" class="custom-btn red-bc" data-dismiss="modal">
            <i class="fa fa-times"></i> Close
        </button>
    </div>
</form>
