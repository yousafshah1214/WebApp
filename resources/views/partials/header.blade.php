	<header>
		<!--top bar-->
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<p>Create a FREE CMS Website instantly preview now!</p>
							<button><a href="">Create My FREE Website</a></button>
						</div>
					</div>
				</div>
			</div>

		<!--nav bar-->

		<div class="top-nav-menu">
			<nav class="navbar navbar-default">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<!--Brand and toggle get grouped for better mobile display-->
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
							  <a class="navbar-brand" href="{{ url("/") }}"><img class="img-responsive" src="{{ asset("build/img/logo.png") }}" alt="logo"/></a>
							</div>

							<!--Collect the nav links, forms, and other content for toggling-->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

							  <ul class="nav navbar-nav navbar-right">

                                  @if(! Auth::check())
                                      <li><a href="{{ url("home") }}">HOME</a></li>
                                      <li><a href="#">FEATURES<i class="fa fa-caret-down"></i></a>
                                          <ul>
                                              <li><a href="creative-dash.html"> Section 1</a></li>
                                              <li><a href="dashbord.html">Section 1</a></li>
                                              <li><a href="">Section 1</a></li>
                                          </ul>
                                      </li>
                                      <li><a href="{{ url("pricing") }}">Pricing</a></li>
                                  @endif

                                  <li><a href="{{ url("search") }}">Search</a></li>

                                  @if(Auth::check())

                                      <li><a href="{{ url("dashboard") }}">Dashboard</a></li>
                                      <li><a href="{{ url("account/".Auth::user()->id) }}">My Account</a></li>
                                  @endif

                                  @if(! Auth::check())
                                      <li><a href="{{ url("login") }}">CLIENT LOGIN</a></li>
                                      <li><a href="{{ url("signup") }}">SIGN UP</a></li>
                                  @endif

                                      <li><a href="{{ url("contact") }}">CONTACT</a></li>
                                  @if(Auth::check())
                                      <li><a href="{{ url("logout") }}">Logout</a></li>
                                  @endif

							  </ul>
							</div><!-- /.navbar-collapse -->
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</nav>

		</div>

		</header>

    @if(Auth::check())
        @include('partials.userMenu')
    @endif