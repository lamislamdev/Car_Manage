@extends('layout.app')
@section('content')
    @include('component.MenuBar')
    @include('component.HeroSlider')
    {{--    @include('extra.component.TopCategories')--}}
    {{--    @include('extra.component.ExclusiveProducts')--}}
    {{--    @include('extra.component.TopBrands')--}}
    @include('component.Footer')
    <script>
        (async () => {
            // await Category();
            await Hero();
            // await TopCategory();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
            // await Popular();
            // await New();
            // await Top();
            // await Special();
            // await Trending();
            // await TopBrands();
        })()
    </script>
@endsection

