
<!DOCTYPE html>
<html lang="fr">
<head>
    @include('frontend.layouts.partials.head')
<body>
  <!-- ======= Header ======= -->
  @include('frontend.layouts.partials.header')
  <!-- End Header -->
  {{-- content --}}
  @yield('content')
  {{-- endcontent --}}
  @include('frontend.layouts.partials.preloader')
  <!-- ======= Footer ======= -->
  @include('frontend.layouts.partials.footer')
  <!-- End Footer -->
   <!-- Resources Component --->
   @include('frontend.layouts.partials.scripts')
   <!-- End Resources Component  --->
</body>
</html>
