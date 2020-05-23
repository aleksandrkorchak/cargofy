@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center pt-4">
        <div class="col-md-7">
            <errors></errors>

            <messages></messages>

            <loads-list :loads="{{$loads}}"></loads-list>
        </div>
    </div>
@endsection
