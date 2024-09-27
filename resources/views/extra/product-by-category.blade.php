@extends('layout.app')
@section('content')
    @include('component.MenuBar')
    @include('extra.component.ByCategoryList')
    @include('extra.component.TopBrands')
    @include('component.Footer')
    <script>
        (async () => {
            await Category();
            await ByCategory();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');

            await TopBrands();
        })()
    </script>
@endsection





