
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('frontEndAsset')}}/assets/css/maicons.css">

    <link rel="stylesheet" href="{{asset('frontEndAsset')}}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{asset('frontEndAsset')}}/assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="{{asset('frontEndAsset')}}/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="{{asset('frontEndAsset')}}/assets/css/theme.css">
</head>
<body>

<!-- Back to top button -->
<div class="back-to-top"></div>

@include('frontEnd.include.header')

@yield('content')
@include('frontEnd.include.footer')

<script src="{{asset('frontEndAsset')}}/assets/js/jquery-3.5.1.min.js"></script>

<script src="{{asset('frontEndAsset')}}/assets/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('frontEndAsset')}}/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="{{asset('frontEndAsset')}}/assets/vendor/wow/wow.min.js"></script>

<script src="{{asset('frontEndAsset')}}/assets/js/theme.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>

</body>
</html>
