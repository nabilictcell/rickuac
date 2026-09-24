<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        @include('frontend.head')
    </head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- Header -->
  <header id="header" class="header">
    @include('frontend.header')
  </header>
  <!-- Start main-content -->
  <div class="main-content">
    @yield('main_content')
  </div>
  <!-- Footer Start-->
  @include('frontend.footer')
<!-- Footer End-->
</body>
</html>
