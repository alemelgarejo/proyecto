
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Agentes | Inmodata</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FREEHTML5.CO

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="{{asset('favicon.ico')}}">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<!-- Superfish -->
	<link rel="stylesheet" href="{{asset('css/superfish.css')}}">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('css/flexslider.css')}}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
	<!-- CS Select -->
	<link rel="stylesheet" href="{{asset('css/cs-select.css')}}">
	<link rel="stylesheet" href="{{asset('css/cs-skin-border.css')}}">

	<link rel="stylesheet" href="{{asset('css/style.css')}}">


	<!-- Modernizr JS -->
	<script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="{{ route('vista.index') }}"><i class="icon-home"></i>Inmo<span>data</span></a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li><a href="{{ route('vista.index') }}">Inmodata</a></li>
							<li><a href="{{ route('vista.propiedades') }}" class="fh5co-sub-ddown">Propiedades</a></li>
							<li class="active"><a href="{{ route('vista.agentes') }}">Agentes</a></li>
							<li><a href="{{ route('vista.contacto') }}">Contacto</a></li>
                            @guest
                                <li><a href="{{ route('vista.login') }}">Login</a></li>
                                <li><a href="{{ route('vista.register') }}">Registro</a></li>
                            @endguest
                            @auth
                                <li>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        @method('post')
                                        <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </x-jet-responsive-nav-link>
                                    </form>
                                </li>
                            @endauth
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<!-- end:header-top -->

		<aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
			   	<li style="background-image: url({{asset('images/img_bg_3.jpg')}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
		   						<h2 class="heading-title">Nuestros Agentes</h2>
		   						<p class="fh5co-lead">Designed with <i class="icon-heart3"></i> by the fine folks at <a href="http://freehtml5.co" target="_blank">FreeHTML5.co</a></p>
			   				</div>
			   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="fh5co-about">
			<div class="container">
				<div class="row">
					@foreach($users as $user)
						<div class="col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
							<div class="fh5co-staff">
								<img class="img-responsive" src="{{asset('images/user-1.jpg')}}" alt="Free HTML5 Templates by freeHTML5.co">
								<h3>{{$user->name}} {{$user->surname}}</h3>
								<span class="list-prop">Property List: 5</span>
								<p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat</p>
								<p>Email: {{$user->email}}</p>
								<p>Tel: {{$user->telefono}}</p>
								<p><a class="btn btn-primary btn-outline" href="#">Ver Propiedades</a></p>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>

		<footer>
			<div id="footer">
				<div class="container">
					<div class="row row-bottom-padded-md">
						<div class="col-md-3">
							<h3 class="section-title">Sobre Inmodata</h3>
							<p>Aplicaciรณn web desarrollada por Alejandro Melgarejo Curbelo, se compone de un apartado de administraciรณn para la propia inmobiliaria y un apartado para que los clientes puedan acceder a las propiedades desde la web.</p>
						</div>

						<div class="col-md-3 col-md-push-1">
							<h3 class="section-title">Links</h3>
							<ul>
								<li><a href="{{route('vista.index')}}">Inmodata</a></li>
								<li><a href="{{route('vista.propiedades')}}">Propiedades</a></li>
								<li><a href="{{route('vista.agentes')}}">Agentes</a></li>
								<li><a href="{{route('vista.contacto')}}">FAQ / Contacto</a></li>
							</ul>
						</div>

						<div class="col-md-3">
							<h3 class="section-title">Information</h3>
							<ul>
								<li><a href="#">Terms &amp; Condition</a></li>
								<li><a href="#">License</a></li>
								<li><a href="#">Privacy &amp; Policy</a></li>
								<li><a href="{{route('vista.contacto')}}">Contรกctanos</a></li>
							</ul>
						</div>
						<div class="col-md-3">
							<h3 class="section-title">Newsletter</h3>
							<p>Subscribe for our newsletter</p>
							<form class="form-inline" id="fh5co-header-subscribe">
								<div class="row">
									<div class="col-md-12 col-md-offset-0">
										<div class="form-group">
											<input type="text" class="form-control" id="email" placeholder="Enter your email">
											<button type="submit" class="btn btn-default"><i class="icon-paper-plane"></i></button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							<p>Copyright 2021 <a href="https://github.com/alemelgarejo" target="_blank">alemelgarejo</a>. <br>Hecho por <a href="https://github.com/alemelgarejo" target="_blank">Alejandro Melgarejo</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>



	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


	<script src="{{asset('js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('js/sticky.js')}}"></script>
	<!-- Superfish -->
	<script src="{{asset('js/hoverIntent.js')}}"></script>
	<script src="{{asset('js/superfish.js')}}"></script>
	<!-- Flexslider -->
	<script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
	<!-- Date Picker -->
	<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
	<!-- CS Select -->
	<script src="{{asset('js/classie.js')}}"></script>
	<script src="{{asset('js/selectFx.js')}}"></script>


	<!-- Main JS -->
	<script src="{{asset('js/main.js')}}"></script>

	</body>
</html>

