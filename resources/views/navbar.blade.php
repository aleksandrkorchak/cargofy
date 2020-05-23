<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">

    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <div class="d-flex w-100">

            <div>
                <main-menu></main-menu>
            </div>


            <div>
                <search
                    :cities='@json($cities)'
                    :locale='@json(app()->getLocale())'
                ></search>
            </div>


            <div class="ml-auto">
                <languages-list
                    :languages='@json($languages)'
                ></languages-list>
            </div>

        </div>

    </div>
</nav>
