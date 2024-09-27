@extends('layout.app')
@section('content')
    @include('component.MenuBar')
    @include('component.carList')
    {{--    @include('extra.component.TopCategories')--}}
    {{--    @include('extra.component.ExclusiveProducts')--}}
    {{--    @include('extra.component.TopBrands')--}}
    @include('component.Footer')
    <script>
        (async () => {
            await all();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');

        })()
    </script>
@endsection
