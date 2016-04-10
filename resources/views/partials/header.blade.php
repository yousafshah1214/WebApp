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
								<li><a href="{{ url("home") }}">HOME</a></li>
								<li><a href="pricing.html">FEATURES<i class="fa fa-caret-down"></i></a>
									<ul>
										<li><a href="creative-dash.html"> Section 1</a></li>
										<li><a href="dashbord.html">Section 1</a></li>
										<li><a href="">Section 1</a></li>
									</ul>
								</li>
								<li><a href="search.html">DOMAINS</a></li>
								<li><a href="{{ url("login") }}">CLIENT LOGIN</a></li>
								<li><a href="search-notfound.html">SIGN UP</a></li>
								<li><a href="contact.html">CONTACT</a></li>

							  </ul>
							</div><!-- /.navbar-collapse -->
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</nav>

		</div>

		</header>