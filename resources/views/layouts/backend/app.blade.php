<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset("assets/backend/img/favicon.ico")}}"/>
    <link href="{{asset("assets/backend/css/loader.css")}}" rel="stylesheet" type="text/css" />
    <script src="{{asset("assets/backend/js/loader.js")}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--Theme styles-->


    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="{{asset("assets/backend/css/plugins.css")}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset("assets/backend/plugins/apex/apexcharts.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/backend/css/dashboard/dash_2.css")}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <!--Notification-->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <!--Theme styles-->
    <!--Blade file custom style-->
    @stack('css')
    <!--Blade file custom style-->


</head>
<body>
<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
@include('layouts.backend.inc.header')
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
@include('layouts.backend.inc.navbar')
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    @include('layouts.backend.inc.sidebar')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">

        <!--Content start-->
        @yield('content')
        <!--Content End-->

        <!--Footer-->
        @include('layouts.backend.inc.footer')
        <!--Footer-->
    </div>
    <!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->




<!--Theme Scripts-->
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset("assets/backend/js/libs/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("assets/backend/bootstrap/js/popper.min.js")}}"></script>
<script src="{{asset("assets/backend/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/backend/plugins/perfect-scrollbar/perfect-scrollbar.min.js")}}"></script>
<script src="{{asset("assets/backend/js/app.js")}}"></script>
<script src="{{asset("assets/backend/custom/scripts.js")}}"></script>
<!--Notification-->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{asset("assets/backend/js/custom.js")}}"></script>
<script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<!--Blade file custom script-->
@stack('scripts')
<!--Blade file custom script-->

</body>
</html>
