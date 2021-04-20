<!DOCTYPE html>
<html lang="en">
<head>
  <title>Photosen &mdash; Colorlib Website Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css')}}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/magnific-popup.css')}}">
  <link rel="stylesheet" type="text/css"  href="{{ asset('css/front_css/jquery-ui.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/owl.carousel.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/lightgallery.min.css')}}">    

  <link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" type="text/css" href="{{ asset('fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/swiper.css')}}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/aos.css')}}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/style.css')}}">

</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
 
  @include('layouts.front_layout.front_header')


    <div class="container-fluid" data-aos="fade" data-aos-delay="500">
        @yield('content')
    </div>

    @include('layouts.front_layout.front_footer')

    

    
    
  </div>

  <script src="{{ asset('js/front_js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('js/front_js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset('js/front_js/jquery-ui.js')}}"></script>
  <script src="{{ asset('js/front_js/popper.min.js')}}"></script>
  <script src="{{ asset('js/front_js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/front_js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('js/front_js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset('js/front_js/jquery.countdown.min.js')}}"></script>
  <script src="{{ asset('js/front_js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('js/front_js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('js/front_js/swiper.min.js')}}"></script>
  <script src="{{ asset('js/front_js/aos.js')}}"></script>

  <script src="{{ asset('js/front_js/picturefill.min.js')}}"></script>
  <script src="{{ asset('js/front_js/lightgallery-all.min.js')}}"></script>
  <script src="{{ asset('js/front_js/jquery.mousewheel.min.js')}}"></script>

  <script src="{{ asset('js/front_js/main.js')}}"></script>
  
  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>

</body>
</html>