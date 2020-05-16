<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $localization['modal_title'] }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form" enctype="multipart/form-data" method="post" action="{{ route('loads.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="cityFrom">{{ $localization['modal_from_city_title'] }}:</label>
                        <select
                            class="custom-select"
                            id="cityFrom"
                            name="cityFrom"
                            required
                        >
                            @foreach($cities as $city)
                                <option
                                    value="{{ $city['id'] }}"
                                >{{ $city['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cityTo">{{ $localization['modal_to_city_title'] }}:</label>
                        <select
                            class="custom-select"
                            id="cityTo"
                            name="cityTo"
                            required
                        >
                            @foreach($cities as $city)
                                <option
                                    value="{{ $city['id'] }}"
                                >{{ $city['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ukrainian" class="col-form-label">{{ $localization['modal_name_ukrainian'] }}:</label>
                        <input type="text"
                               class="form-control"
                               id="uaName"
                               name="uaName"
                        >
                        <label for="english" class="col-form-label">{{ $localization['modal_name_english'] }}:</label>
                        <input type="text"
                               class="form-control"
                               id="enName"
                               name="enName"
                        >
                    </div>


                    <div class="form-group">
                        <label for="volume" class="col-form-label">{{ $localization['modal_volume'] }}:</label>
                        <input type="text"
                               class="form-control"
                               id="volume"
                               name="volume"
                        >
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo" lang="en">
                        <label class="custom-file-label" for="photo">{{ $localization['modal_photo_label'] }}</label>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ $localization['modal_button_close'] }}</button>
                <button type="submit" form="form" class="btn btn-primary">{{ $localization['modal_button_add'] }}</button>
            </div>
        </div>
    </div>
</div>

