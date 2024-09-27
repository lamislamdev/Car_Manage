@extends('layout.app')
@section('content')
    @include('component.MenuBar')
    @include('extra.component.ProductDetails')
    @include('extra.component.ProductSpecification')
    @include('extra.component.TopBrands')
    @include('component.Footer')
    <script>
        (async () => {
            await productDetails();
            await productReview();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })()
    </script>
@endsection

