<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <script>
        window.app = {
            localization: @json($localization),
            languages: @json($languages),
            locale: @json($locale),
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



{{--        @if(session('messages'))--}}
{{--            <div class="alert alert-success">--}}
{{--                {{ session('messages') }}--}}
{{--            </div>--}}
{{--        @endif--}}


    </div>

    @include('modal')


</div>
</body>
</html>
