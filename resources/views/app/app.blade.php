<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Karolina i Maciek</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />
    <link rel="icon" type="image/x-icon" href="/images/favico.png">
    <script src="https://kit.fontawesome.com/d10fe5dbd3.js" crossorigin="anonymous"></script>

    <!--
      //////////////////////////////////////////////////////

      FREE HTML5 TEMPLATE
      DESIGNED & DEVELOPED by FREEHTML5.CO

      Website: 		http://freehtml5.co/
      Email: 			info@freehtml5.co
      Twitter: 		http://twitter.com/fh5co
      Facebook: 		https://www.facebook.com/fh5co

      //////////////////////////////////////////////////////
       -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Modernizr JS -->
    <script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body>

<div class="fh5co-loader"></div>

<div id="page">
    <nav class="fh5co-nav" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div id="fh5co-logo"><a style="font-size: 60px" href="index.html">Wesele<strong>.</strong></a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
{{--                        <li class="active"><a href="index.html">Home</a></li>--}}
{{--                        <li><a href="about.html">Story</a></li>--}}
{{--                        <li class="has-dropdown">--}}
{{--                            <a href="services.html">Services</a>--}}
{{--                            <ul class="dropdown">--}}
{{--                                <li><a href="#">Web Design</a></li>--}}
{{--                                <li><a href="#">eCommerce</a></li>--}}
{{--                                <li><a href="#">Branding</a></li>--}}
{{--                                <li><a href="#">API</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="has-dropdown">--}}
{{--                            <a href="gallery.html">Gallery</a>--}}
{{--                            <ul class="dropdown">--}}
{{--                                <li><a href="#">HTML5</a></li>--}}
{{--                                <li><a href="#">CSS3</a></li>--}}
{{--                                <li><a href="#">Sass</a></li>--}}
{{--                                <li><a href="#">jQuery</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li><a href="{{ route('admin') }}">Panel</a></li>--}}
                        <li><a href="#confirm" class="mobile-rsvp"><b>Potwierdź swoja obecność</b></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>
{{-- CONTENT START HERE --}}
        @yield('content')
{{-- CONTENT END HERE --}}

    <footer id="fh5co-footer" role="contentinfo">
        <div class="container">
            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block"><a href=mailto:"michal3085@gmail.com">Programmed by: Michał Broszkiewicz</a></small>
                        <small class="block">Template made by:</small>
                        <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
                        <small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
                    </p>
                    <p>
                    <ul class="fh5co-social-icons">
                        <li><a href="https://www.facebook.com/michal.broszkiewicz"><i class="icon-facebook"></i></a></li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<!-- Carousel -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<!-- countTo -->
<script src="{{asset('js/jquery.countTo.js')}}"></script>

<!-- Stellar -->
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/magnific-popup-options.js')}}"></script>

<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
<script src="{{asset('js/simplyCountdown.js')}}"></script>
<!-- Main -->
<script src="{{asset('js/main.js')}}"></script>

<script>
    var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false,
        haurs: 16,
        minutes: 0,
        seconds: 0
    });
</script>

</body>
</html>

