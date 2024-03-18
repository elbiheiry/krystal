<form class="modal-content text-center ajax-form" method="put"
    action="{{ route('admin.locations.update', ['location' => $location->slug]) }}">
    @csrf
    @method('put')
    <div class="modal-body text-center">
        <div class="row">
            <div class="col-sm-12">
                <img src="{{ get_image($location->image, 'locations') }}" width="150">
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Location name (EN)</label>
                    <input type="text" class="form-control" name="name_en"
                        value="{{ $location->translate('en')->name }}">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Location name (AR)</label>
                    <input type="text" class="form-control" name="name_ar"
                        value="{{ $location->translate('ar')->name }}">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Location image </label>
                    <div class="uplaod-wrap">
                        <input type='file' name="image">
                        <span class='path'></span>
                        <span class='button'>Select File</span>
                    </div>
                </div>
                <span class="text-danger">Image dimensions should be : 280 * 140
                </span>
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
