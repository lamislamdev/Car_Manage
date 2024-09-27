@extends('layout.app')
@section('content')
        @include('component.MenuBar')
    @include('component.dashboard.CarUpdate')
    {{--    @include('component.TopBrands')--}}
        @include('component.Footer')
    <script>
        (async () => {
            $("#preloader").delay(90).fadeOut(100).addClass('loaded');
        })()
    </script>
@endsection
