<!doctype html>
<html class="no-js" lang="">
@include('partials.head')
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<!-- header-->
		@include("partials.header")
		<!--End header -->

		<!--Content-->
	    @yield('content')

		<!--footer section-->
		@include("partials.footer")
		<!--end footer section-->


        <!--script secction-->
        @include("partials.scripts")

        @yield("secondary_script")
        <!--end script section-->
    </body>
</html>
