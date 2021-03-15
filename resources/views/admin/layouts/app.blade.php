<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  @include('admin.layouts.partials.head')
  @yield('css')

  <body class="app">
      @include('admin.layouts.partials.header')

        @yield('content')

      <!--//app-wrapper-->
      @include('admin.layouts.partials.footer')
      <!-- Javascript -->
      <script src="{{ asset('portal/assets/plugins/popper.min.js') }}"></script>
      <script src="{{ asset('portal/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
      <!-- Page Specific JS -->
      <script src="{{ asset('portal/assets/js/app.js') }}"></script>
      @yield('javascritp')
  </body>

</html>