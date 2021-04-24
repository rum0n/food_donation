<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontEnd/css')}}/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{asset('frontEnd/css')}}/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="{{asset('frontEnd/css')}}/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="{{asset('frontEnd/css')}}/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{asset('frontEnd/css')}}/swiper.min.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('frontEnd/css')}}/style.css">

    @stack('css')

</head>
<body>
    <!-- Header -->
        @include('frontEnd.inc.header')
    <!-- //Header Ends -->

    <!-- .hero-slider -->
        @yield('banner')
    <!-- .hero-slider -->

    <!-- .hero-slider -->
        @yield('content')
    <!-- .hero-slider -->

    <!-- Sign in & Sign up modal -->
        @include('frontEnd.inc.login_sign_up')
    <!-- Sign in & Sign up modal end -->

    <!-- Footer -->
        @include('frontEnd.inc.footer')
    <!-- //Footer Ends -->




    <script type='text/javascript' src="{{asset('frontEnd/js')}}/jquery.js"></script>
    <script type='text/javascript' src="{{asset('frontEnd/js')}}/jquery.collapsible.min.js"></script>
    <script type='text/javascript' src="{{asset('frontEnd/js')}}/swiper.min.js"></script>
    <script type='text/javascript' src="{{asset('frontEnd/js')}}/jquery.countdown.min.js"></script>
    <script type='text/javascript' src="{{asset('frontEnd/js')}}/circle-progress.min.js"></script>
    <script type='text/javascript' src="{{asset('frontEnd/js')}}/jquery.countTo.min.js"></script>
    <script type='text/javascript' src="{{asset('frontEnd/js')}}/jquery.barfiller.js"></script>
    <script type='text/javascript' src="{{asset('frontEnd/js')}}/custom.js"></script>

    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <script>
        @if($errors->any())
            @foreach($errors->all() as $error)
                  toastr.error('{{ $error }}','Error',{
            closeButton:true,
            progressBar:true,
        });
        @endforeach
        @endif
    </script>

    @stack('js')

</body>
</html>