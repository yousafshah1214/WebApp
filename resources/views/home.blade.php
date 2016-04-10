@extends('layouts.app')

@section('content')

		<!--Banner Section-->
		<section id="banner">
		<div class="container-fluid">
		<div class="row">
		<div class="col-sm-12">
		
		
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>

			  <!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
					  <img src="{{ asset('build/img/b1.jpg') }}" alt="slider1">
					  <div class="carousel-caption">
						<h2>Could Storage</h2>
						<p>Manage Your Website From Facebook</p>
						<a href=""><button>LEARN MORE</button></a>
					  </div>
					</div>
					<div class="item">
					  <img src="{{ asset('build/img/b2.jpg') }}" alt="slid2">
					  <div class="carousel-caption">
						<h2>Could Storage</h2>
						<p>Manage Your Website From Facebook</p>
						<a href=""><button>LEARN MORE</button></a>
					  </div>
					</div>
				
				</div>

				  <!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			
			
			</div>
			</div>
			</div>
		</section><!--End Banner Section-->
		
		<!--Ultimate CMS-->
		<section id="cms-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2>The Ultimate CMS Website</h2>
						<p>Yes! manage your website content your way, you can even manage<br> your content remotely from Facebook.</p>
						<img src="{{ asset('build/img/mob.png') }}" alt="phone" />
					</div>
				</div>
			</div>
		</section><!-- End Ultimate CMS-->
		
		<!--Feature Section-->
		<section id="feature">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2>Built In Features</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="single-feature">
							<a href=""><i class="fa fa-television"></i></a>
							<h3>Responsive Design</h3>
							<p>
								Mobile and tablet web design that looks
								great on any device. Fast loading, simple
								navigation lets users find our business and
								contact you with ease.
							</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="single-feature">
							<a href=""><i class="fa fa-tripadvisor"></i></a>
							<h3>seo</h3>
							<p>
								Optimise your website easily with built in
								SEO so your website can be an online
								success with high rankings optimised for
								local search results.
							</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="single-feature">
							<a href=""><i class="fa fa-pencil"></i></a>
							<h3>cms</h3>
							<p>
								Content Management System allows you toupdate your website easily 24/7. Connectwith Facebook and remotely manage your content.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section><!--End Feature Section-->
		
		<!--Sample web section-->
		<section id="sample-web">
		<h2>Sample Websites</h2>
			<div class="web-sample ">
				<ul id="owl-demo">
					<li class="item"><a href=""><img class="img-responsive" src="{{ asset('build/img/web2.jpg') }}" alt="image" /></a></li>
					<li class="item"><a href=""><img class="img-responsive" src="{{ asset('build/img/web1.jpg') }}" alt="image" /></a></li>
					<li class="item"><a href=""><img class="img-responsive" src="{{ asset('build/img/web4.jpg') }}" alt="image" /></a></li>
					<li class="item"><a href=""><img class="img-responsive" src="{{ asset('build/img/web3.jpg') }}" alt="image" /></a></li>
					<li class="item"><a href=""><img class="img-responsive" src="{{ asset('build/img/web3.jpg') }}" alt="image" /></a></li>
				</ul>
			</div>
			
			<div class="get-started">
					<p> Ready? Get started today!</p>
					<a href=""><button>START NOW</button></a>
			</div>
		
		</section><!--End Sample web section-->
		
		<!--Get Creative-->
		<section id="creative">
			<div class="section-desc">
				<h2>Get Creative</h2>
				<p>Create a visual masterpiece! Change colors, textures, fonts and images.</p>
			</div>
			<div class="mixitup-box">
				<ul class="mix-tab">
					<li class="filter" data-filter="all">All</li>
					<li class="filter" data-filter=".category-1">Releases</li>
					<li class="filter" data-filter=".category-2">Logo</li>
					<li class="filter" data-filter=".category-2">Interface</li>
					<li class="filter" data-filter=".category-2">Development</li>
				</ul>
				
				<ul id="Container-box" >
					<li class="mix item category-1" data-myorder="2">
					<img class="img-responsive" src="{{ asset('build/img/s1.jpg') }}" alt="image" />
					</li>
					<li class="mix item category-2" data-myorder="4">
					<img class="img-responsive" src="{{ asset('build/img/s3.jpg') }}" alt="image" />
					</li>
					<li class="mix item category-1" data-myorder="1">
					<img class="img-responsive" src="{{ asset('build/img/s5.jpg') }}" alt="image" />
					</li>
				
					<li class="mix item category-2" data-myorder="8">
					<img class="img-responsive" src="{{ asset('build/img/s4.jpg') }}" alt="image" />
					</li>
					<li class="mix item category-2" data-myorder="8">
					<img class="img-responsive" src="{{ asset('build/img/s5.jpg') }}" alt="image" />
					</li>
				</ul>
			
			</div>
		</section><!--End Get Creative-->
		
		<!--Smart Websites-->
		<section id="smart-web">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="section-desc">
							<h2>Smarter Website </h2>
							<p>Smarter Website, Smarter Business</p>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<div class="smart-content">
						  <!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<div class=" row ">						  
										<div class="col-sm-6">
											<div class="feature-caption">
												<h4> Next Features</h4>
												<p>
												This is Photoshop’s version of Lorem Ipsum.<br>
												Proin gravida nibh vel velit auctor aliquet.
												</p>
												<a href="">READ MORE <i class="fa fa-long-arrow-right"></i></a>
											</div>
										</div>
										<div class="col-sm-6">
										  <img class="img-responsive" src="{{ asset('build/img/m1.png') }}" alt="image">
										</div>
									</div>
								
								</div>
								<div role="tabpanel" class="tab-pane" id="profile">
									<div class=" row">					 
										<div class="col-sm-6">
											<div class="feature-caption">
												<h4> Useful Features</h4>
												<span>
												This is Photoshop’s version of Lorem Ipsum.<br>
												Proin gravida nibh vel velit auctor aliquet.
												</span>
												<a href="">READ MORE <i class="fa fa-long-arrow-right"></i></a>
											</div>
										</div>
									  
										<div class="col-sm-6">
											<img class="img-responsive" src="{{ asset('build/img/m1.png') }}" alt="image">
										</div>
									</div>
								
								</div>
								<div role="tabpanel" class="tab-pane" id="messages">...</div>
								<div role="tabpanel" class="tab-pane" id="settings">...</div>
							</div>
						  
						  
							<!-- Nav tabs -->
						  <ul  class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">
							<i class="fa fa-life-ring"></i>
							</a><span class="tab-title"> Useful Feature</span></li>
							<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
							<i class="fa fa-lightbulb-o"></i>
							</a><span class="tab-title"> Useful Feature</span></li>
							<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
							<i class="fa fa-flag-o"></i>
							</a><span class="tab-title"> Useful Feature</span></li>
							<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
							<i class="fa fa-microphone"></i>
							</a><span class="tab-title"> Web Feature</span></li>
							<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
							<i class="fa fa-pencil"></i>
							</a><span class="tab-title">Feature</span></li>
						  </ul>
						  
						  

						</div>
		
					</div>
				</div>
				
			</div>
			
		</section><!--End Smart Websites-->
		
		<!--coding-->
		<section id="coding">
			<div class="container">	
				<div class="row">
					<div class="col-sm-12">
						<div class="accordionContainer">
						  <ul>
							<li>
							  <h1 class="title"><i class="fa fa-mobile"></i>Slide One</h1>
							  <div class="content">
									<div class="coding-content">
										<h3>Coding</h3>
										<p>Nam liber tempor cum soluta nobis eleifend option congue nihil </p>
										<a href="">Red more</a>
									</div>
									<div class="coding-image">
										<img src="{{ asset('build/img/phonei.png') }}" alt="image" />
									</div>
							  </div>
							</li>

							<li>
							  <h1 class="title new-color"><i class="fa fa-comments"></i>Slide Two</h1>
								<div class="content">
									<div class="coding-content">
										<h3>Coding</h3>
										<p>Nam liber tempor cum soluta nobis eleifend option congue nihil </p>
										<a href="">Red more</a>
									</div>
									<div class="coding-image">
										<img src="{{ asset('build/img/phonei.png') }}" alt="image" />
									</div>

								</div>
							</li>

						  </ul>
						</div>

				
					</div>
				</div>
			</div>
		</section> <!-- End coding-->
		
		<!-- Newsletter -->
		<section id="newsletter-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="newsletter">
							<p>Sign Up for our Newsletter</p>
							<form>
								<input type="text" name="" placeholder="sonia@launchwebsites.com"/>
								<button><i class="fa fa-check"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>	
		</section> <!-- Newsletter -->
		
		
		<!-- Testimonial -->
		<section id="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div id="carousel-example-generic-testi" class="carousel slide" data-ride="carousel">
							  <!-- Indicators -->
							  <ol class="carousel-indicators">
								<li data-target="#carousel-example-generic-testi" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic-testi" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic-testi" data-slide-to="2"></li>
							  </ol>

							  <!-- Wrapper for slides -->
							  <div class="carousel-inner testimonial" role="listbox">
								<div class="item active">
								  <img src="{{ asset('build/img/client1.jpg') }}" alt="client1">
								  <div class="client-content">
									<div class="client-meta">
										<span>Carlyle lrvin,</span>
										<span>Designer,</span>
										<span>BGS Company</span>
									</div>
									<h3>This is Photoshop’s version of Lorem Ipsum. Proin
									<br>gravida nibh vel velit auctor aliquet. Aenean…</h3>
								  </div>
								</div>
								<div class="item">
								  <img src="{{ asset('build/img/client2.jpg') }}" alt="client2">
									<div class="client-content">
										<div class="client-meta">
											<span>Carlyle lrvin,</span>
											<span>Designer,</span>
											<span>BGS Company</span>
										</div>
									<h3>This is Photoshop’s version of Lorem Ipsum. Proin
									<br>gravida nibh vel velit auctor aliquet. Aenean…</h3>
								  </div>
								</div>
								
								<div class="item">
								  <img src="img/client3.jpg" alt="client3">
									  <div class="client-content">
										<div class="client-meta">
											<span>Carlyle lrvin,</span>
											<span>Designer,</span>
											<span>BGS Company</span>
										</div>
										<h3>This is Photoshop’s version of Lorem Ipsum. Proin<br>
										gravida nibh vel velit auctor aliquet. Aenean…</h3>
									  </div>								
								</div>
								
							
							  </div>

						</div>
					</div>
				</div>
			</div>
		</section> <!-- End Testimonial -->
		
		<!-- Blog Section -->
		<section id="blog-section">
			<div class="container">
				<div class="row">
				<h2>from the Blog</h2>
					<div class="col-sm-4">
						<div class="single-blog">
							<div class="blog-feature-img">
								<img src="{{ asset('build/img/bl1.jpg') }}" alt="blog-image" />
							</div>
							<div class="blog-meta">
								<a href="">No-IP regains control of
								some domains seized
								by Microsoft.</a>
								<div class="date-meta">
									<span><i class="fa fa-calendar"></i> Jul 07th</span>
									<span><i class="fa fa-user"></i> Super User</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="single-blog">
							<div class="blog-feature-img">
							<img src="{{ asset('build/img/bl1.jpg') }}" alt="blog-image" />
							</div>
							<div class="blog-meta">
								<a href="">No-IP regains control of
								some domains seized
								by Microsoft.</a>
								<div class="date-meta">
									<span><i class="fa fa-calendar"></i> Jul 07th</span>
									<span><i class="fa fa-user"></i> Super User</span>
								</div>
							</div>
						</div>
					</div>
					
						<div class="col-sm-4">
						<div class="single-blog">
							<div class="blog-feature-img">
							<img src="{{ asset('build/img/bl1.jpg') }}" alt="blog-image" />
							</div>
							<div class="blog-meta">
								<a href="">No-IP regains control of
								some domains seized
								by Microsoft.</a>
								<div class="date-meta">
									<span><i class="fa fa-calendar"></i> Jul 07th</span>
									<span><i class="fa fa-user"></i> Super User</span>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</section><!--End Blog Section-->
@endsection
