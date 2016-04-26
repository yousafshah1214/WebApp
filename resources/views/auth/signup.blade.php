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
	
		<!--Login-->
		<section id="login-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="login-box">
							<img src="{{ asset("build/img/logo.png") }}" alt="logo" />
							<div class="social-log" >
								<ul>
									<li>
                                        <a class="btn btn-block btn-lg btn-social btn-facebook" href="{{ route('signup.facebook') }}">
                                            <span class="fa fa-facebook-official"></span> Sign up with Facebook
                                        </a>
									</li>
									<li>
                                        <a class="btn btn-block btn-lg btn-social btn-twitter" href="{{ route('signup.twitter') }}">
                                            <span class="fa fa-twitter"></span> Sign up with Twitter
                                        </a>
                                    </li>
								</ul>
							</div>
							<div class="or"><span>or</span></div>
					    </div>
					</div>
					<div class="col-sm-4 col-sm-offset-4">
							<div class="login-form">
								{!! Form::open(array('url' => 'signup/process')) !!}
									<div class="input-group">
									  <input type="text" class="form-control uname-control" placeholder="Username" aria-describedby="sizing-addon2" name="username">
										<span class="input-group-addon log-icon-one" id="sizing-addon2"><i class="fa fa-user"></i>
										</span>
                                        <span id="username_error" class="error"
                                            @if($errors->has('username'))
                                                  style="display:block"
                                            @endif>
                                            <i class="fa fa-times"></i>
                                            @if($errors->has('username'))
                                                {{ $errors->first('username') }}
                                            @endif
                                        </span>
									</div>
                                    <div class="input-group">
                                        <input type="email" class="form-control uname-control" placeholder="Email" aria-describedby="sizing-addon3" name="email">
                                        <span class="input-group-addon log-icon-one" id="sizing-addon3">
                                            <i class="fa fa-at"></i>
                                        </span>
                                        <span id="email_error" class="error"
                                            @if($errors->has('email'))
                                               style="display:block"
                                            @endif>
                                            <i class="fa fa-times"></i>
                                            @if($errors->has('email'))
                                                {{ $errors->first('email') }}
                                            @endif
                                        </span>
                                    </div>
									<div class="input-group pass-box">
									  <input type="password" class="form-control uname-control" placeholder="Password" aria-describedby="sizing-addon2" name="password">
										<span class="input-group-addon log-icon-one" id="sizing-addon2"><i class="fa fa-lock"></i>
										</span>
                                        <span id="pass_error" class="error"
                                        @if($errors->has('pass'))
                                            style="display:block"
                                        @endif>
                                        <i class="fa fa-times"></i>
                                        @if($errors->has('pass'))
                                            {{ $errors->first('pass') }}
                                        @endif
                                        </span>
									</div>
									<input class="log-btn" type="submit" name="signup" value="Sign up" />
								{!! Form::close() !!}
								<span class="singnup-now"> Signed up before?<a href="{{ url('login') }}"> Login now!</a> </span>
							</div>
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

		<script type="text/javascript">
			@if(Session::has("successMessage"))
                sweetAlert( "{!! Session::get('successMessage') !!}");
			@endif
			@if(Session::has("failureMessage"))
				sweetAlert("Oops...","{!! Session::get('failureMessage') !!}","error");
			@endif
		</script>
    </body>
</html>
