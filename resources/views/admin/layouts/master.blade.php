<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.head')
    @yield('secondaryHead')
</head>
<body>
<!-- Start Page Loading -->
<div class="loading"><img src="{{ asset('build/adminAssets/img/loading.gif') }}" alt="loading-img"></div>
<!-- End Page Loading -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START TOP -->
@include('admin.partials.top')
<!-- END TOP -->
<!-- //////////////////////////////////////////////////////////////////////////// -->


<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START SIDEBAR -->
@include('admin.partials.sidebar')
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTENT -->
<div class="content">

    <!-- Start Page Header -->
    @include('admin.partials.header')
    <!-- End Page Header -->


    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START CONTAINER -->
    <div class="container-widget">

        <!-- Start Top Stats -->
        @include('admin.partials.stats')
        <!-- End Top Stats -->

        <!-- Start Row -->
        @yield('content')
        <!-- End Row -->

    </div>
    <!-- END CONTAINER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- Start Footer -->
    @include('admin.partials.footer')
    <!-- End Footer -->


</div>
<!-- End Content -->
<!-- //////////////////////////////////////////////////////////////////////////// -->


<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START SIDEPANEL -->
@include('admin.partials.sidepanel')
<!-- END SIDEPANEL -->
<!-- //////////////////////////////////////////////////////////////////////////// -->

@include('admin.partials.scripts')

<script type="text/javascript" src="{{ asset('build/adminAssets/js/mainSliderScript.js') }}"></script>

@yield('secondaryScript')

<script type="text/javascript" src="{{ asset('build/adminAssets/js/sweet-alert/sweet-alert.min.js') }}"></script>

@include('././partials.sweetAlert')

</body>
</html>