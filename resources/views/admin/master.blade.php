<!DOCTYPE html>
<html>
  <head>
    @include('admin.layout.style')
    @yield('style')
  </head>
  <body>
   @include('admin.layout.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.layout.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="flex justify-center no-margin-bottom ">@yield('title')</h2>
          </div>
        </div>
           @yield('content')
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               {{-- <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p> --}}
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.layout.script')

    @yield('script')
  </body>


</html>
