@extends('layout.adminDashboard')
@section('manu')
    @include('component.MenuBar')
@endsection

@section('content')

    @include('component.dashboard.Dashboard')
    @include('component.dashboard.MyCar')
    @include('component.dashboard.AddCar')
    @include('component.dashboard.AccountDetails')
    @include('component.dashboard.MyUser')
    {{--    @include('component.TopBrands')--}}
{{--        @include('component.Footer')--}}
    <script>
        (async () => {
            $("#preloader").delay(90).fadeOut(100).addClass('loaded');
        })()
    </script>
@endsection
