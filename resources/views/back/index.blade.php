<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link href="{{url('back/js/bootstrap.css')}}" rel="stylesheet">
    <script src="{{url('back/js/bootstrap.min.js')}}"></script>


    {{-- *********************** Scroll bar ************************** --}}

    <script src="{{url('front/js/scroll/jquery.mCustomScrollbar.js')}}"></script>
    <link href="{{url('front/js/scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">

    {{-- *********************** Admin ************************** --}}

    <link rel="stylesheet" href="{{url('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/iconfonts/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/iconfonts/typicons/src/font/typicons.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/css/vendor.bundle.addons.css')}}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('assets/css/demo_1/style.css')}}">

    {{-- *********************** tiny MCE ********************************--}}
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
    <script src="{{url('ckeditor/config.js')}}"></script>

    {{--*********************** chosen selected **************--}}
    <link href="{{url('chosen/chosen.css')}}" rel="stylesheet">
    <script src="{{url('back/js/jquery-3.0.0.min.js')}}"></script>

{{-- ***********************color picker   --}}

{{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">--}}

{{--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}

{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.min.css" rel="stylesheet">--}}

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.min.js"></script>--}}


    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body style="direction: rtl;text-align: right">

<div class="container-scroller">

    @include('back.header')
    <div class="container-fluid page-body-wrapper">
        @include('back.sidebar')
        <div class="main-panel">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{url('chosen/chosen.jquery.js')}}"></script>
<script src="{{url('back/docsupport/prism.js')}}"></script>
<script src="{{url('back/docsupport/init.js')}}"></script>



{{--    //admin******************************--}}
<script src="{{url('back/js/admin/vendor.bundle.base.js')}}"></script>
<script src="{{url('back/js/admin/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<script src="{{url('back/js/admin/shared/off-canvas.js')}}"></script>
<!-- Custom js for this page-->
<script src="{{url('back/js/admin/demo_1/dashboard.js')}}"></script>
<!-- End custom js for this page-->




</body>
</html>
