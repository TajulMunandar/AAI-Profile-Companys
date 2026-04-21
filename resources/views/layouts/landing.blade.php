<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Industrial Construction HTML5 Template')">
    <meta name="author" content="ThemeEaster">

    <title>@yield('title', 'Atlantic Alam Industri')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    @include('partials.landing-head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        /* WhatsApp Floating Button */
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 100px;
            right: 20px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .whatsapp-float:hover {
            background-color: #128C7E;
            color: #FFF;
            transform: scale(1.1);
            box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.4);
        }

        /* Scroll to top button adjustment */
        #scrollup {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 1000;
        }

        /* Slider Category Tag */
        .slider-category {
            display: inline-block;
            background: #fdb900;
            color: #222;
            padding: 8px 20px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Fix Blog Card Image Size */
        .blog-thumb {
            height: 220px;
            overflow: hidden;
        }

        .blog-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Fix Blog Title 2 Lines Max */
        .blog-content h3 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.4;
            min-height: 2.8em;
        }
    </style>

    @stack('css')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    @include('partials.landing-preloader')

    @include('partials.landing-header')

    <div id="dl-popup-search-box">
        <div class="box-inner-wrap d-flex align-items-center">
            <form id="form" action="#" method="get" role="search">
                <input id="popup-search" type="text" name="s" placeholder="Type keywords here..." />
                <button id="popup-search-button" type="submit" name="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div><!-- /#dl-popup-search-box -->

    @yield('content')

    @include('partials.landing-footer')

    {{-- Floating Buttons --}}
    <a href="https://wa.me/6285277801778" target="_blank" rel="noopener noreferrer" class="whatsapp-float"
        title="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <div id="scrollup">
        <button id="scroll-top" class="scroll-to-top"><i class="las la-arrow-up"></i></button>
    </div>

    @include('partials.landing-scripts')

    @stack('js')
</body>

</html>
