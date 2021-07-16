<!DOCTYPE html>
<html lang="en">

<!-- index 19:57:41 GMT -->
@include('layouts.user.style')

<body>
    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="preloader-inner">
                <h3>Nub</h3>
            </div>
        </div>
        <!-- end preloader -->
      
       @yield('head')
       @yield('banner')
        <!-- CONTENT  -->
        @yield('content')
        <!-- END CONTENT -->
    </div>
    <!-- end of page-wrapper -->
    @include('layouts.user.script')
    @include('layouts.user.footer')
</body>

<!-- index 19:57:41 GMT -->
</html>
