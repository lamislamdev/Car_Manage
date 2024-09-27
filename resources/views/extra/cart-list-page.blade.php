@extends('layout.app')
@section('content')
    @include('component.MenuBar')
    @include('extra.component.PaymentMethodList')
    @include('extra.component.CartList')
    @include('extra.component.TopBrands')
    @include('component.Footer')
    <script>
        (async () => {
            await CartList();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })()
    </script>
@endsection





