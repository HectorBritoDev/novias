<div class="owl-carousel owl-theme">
    <div class="item">
        <img src="https://pbs.twimg.com/profile_images/1040293424207847424/dG3jwPML.jpg" alt="">
    </div>
    <div class="item">
        <img src="https://pbs.twimg.com/profile_images/1040293424207847424/dG3jwPML.jpg" alt="">
    </div>
    <div class="item">
        <img src="https://pbs.twimg.com/profile_images/1040293424207847424/dG3jwPML.jpg" alt="">
    </div>
    <div class="item">
        <img src="https://pbs.twimg.com/profile_images/1040293424207847424/dG3jwPML.jpg" alt="">
    </div>

</div>

<script>
    $('.owl-carousel').owlCarousel({
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items: 1,
        margin: 30,
        stagePadding: 30,
        smartSpeed: 450
    });

</script>


@section('bae')
<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
@endsection

@section('aditional_scripts')
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
@endsection
