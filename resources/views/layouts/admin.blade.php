<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.admin.head')
    @yield('secondaryHead')
</head>
<body>
<!-- Start Page Loading -->
<div class="loading"><img src="{{ asset('build/adminAssets/img/loading.gif') }}" alt="loading-img"></div>
<!-- End Page Loading -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START TOP -->
@include('partials.admin.top')
        <!-- END TOP -->
<!-- //////////////////////////////////////////////////////////////////////////// -->


<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START SIDEBAR -->
@include('partials.admin.sidebar')
        <!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTENT -->
<div class="content">

    <!-- Start Page Header -->
    @include('partials.admin.header')
            <!-- End Page Header -->


    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START CONTAINER -->
    <div class="container-widget">

        <!-- Start Top Stats -->
        @include('partials.admin.stats')
                <!-- End Top Stats -->

        <!-- Start Row -->
        @yield('content')
                <!-- End Row -->

    </div>
    <!-- END CONTAINER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- Start Footer -->
    @include('partials.admin.footer')
            <!-- End Footer -->


</div>
<!-- End Content -->
<!-- //////////////////////////////////////////////////////////////////////////// -->


<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START SIDEPANEL -->
@include('partials.admin.sidepanel')
        <!-- END SIDEPANEL -->
<!-- //////////////////////////////////////////////////////////////////////////// -->

@include('partials.admin.scripts')

<script type="text/javascript" src="{{ asset('build/adminAssets/js/mainSliderScript.js') }}"></script>

@yield('secondaryScript')

<script type="text/javascript" src="{{ asset('build/adminAssets/js/sweet-alert/sweet-alert.min.js') }}"></script>

@include('partials.sweetAlert')

</body>
</html>