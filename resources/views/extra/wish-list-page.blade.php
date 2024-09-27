@extends('layout.app')
@section('content')
    @include('component.MenuBar')
    @include('extra.component.WishList')
    @include('extra.component.TopBrands')
    @include('component.Footer')
    <script>
        (async () => {
            await WishList();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })()
    </script>
@endsection





