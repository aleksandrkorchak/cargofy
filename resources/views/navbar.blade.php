<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    {{--    <a class="navbar-brand" href="#">{{ $localization['nav_brand'] }}</a>--}}


    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <div class="d-flex w-100">

            <div class="btn-group mr-3">
                <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    {{ $localization['nav_main_menu_title'] }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#" data-toggle="modal"
                       data-target="#exampleModal">{{ $localization['nav_main_menu_add_load'] }}</a>
                </div>
            </div>


            <div>
                <search></search>
            </div>

            {{--            <button type="button" class="btn btn-outline-primary ml-5 ">Добавить</button>--}}


            <div class="ml-auto">
                <languages-list></languages-list>
            </div>

        </div>


    </div>
</nav>
