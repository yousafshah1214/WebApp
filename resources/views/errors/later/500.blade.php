<!doctype html>
<html class="no-js" lang="">
@include('...partials.head')
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- header-->
@include("...partials.header")
        <!--End header -->

<section id="error">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-4">
                <div class="error-section">
                    <h2 class="error-message">500 - Server Error!!</h2>
                    <br>
                    <p>
                        We have informed the developer. Soon the issue will be solved. Please try a bit later. Thanks
                        <br>
                        <br>
                        <a href="{{ route("home.index") }}"><button class="btn btn-primary btn-lg"><i class="fa fa-home"></i> Lets get back to Home! </button></a>.
                    </p>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>

<!--footer section-->
@include("...partials.footer")
        <!--end footer section-->


<!--script secction-->
@include("...partials.scripts")
        <!--end script section-->
</body>
</html>
