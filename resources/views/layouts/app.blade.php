<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>


    <script>
        window.app = {
            localization: @json($localization),
            errors: @json($errors->all()),
            messages: @json(session('messages'))

        }
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app">
    <div class="container">

        @include('navbar')

        @yield('content')
    </div>


    <modal
        :cities='@json($cities)'
        :old='@json(Session::getOldInput())'
    ></modal>


</div>
</body>
</html>
