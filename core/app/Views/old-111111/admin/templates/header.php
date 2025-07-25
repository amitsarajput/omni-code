
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php 
	//Addition of stylesheets
		$stylesheets=array('bootstrap.css','style.css','custom.css','mystyle.css','swiper.css','dark.css','font-icons.css','animate.css','magnific-popup.css','responsive.css');
		foreach ($stylesheets as $stylesheet) {
			echo link_tag('assets/css/'.$stylesheet); 
		}
	//Extra stylesheet
		if (isset($extra_stylesheets)) {
			if (is_array($extra_stylesheets)) {
				foreach ($extra_stylesheets as $extra_stylesheet) {
					echo link_tag('assets/css/'.$extra_stylesheet); 
				}
			}else{
				echo link_tag('assets/css/'.$extra_stylesheets); 				
			}
		}
		

	?>
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Omni | New</title>
	

</head>

<body class="stretched side-push-panel">

	<div class="body-overlay"></div>
	<?php
		if (isset($sidepanel)) {	
			foreach ($sidepanel as $key => $value) {
				$$key=$value;
			}
		}else{
			$menu='';
			$submenu='';
		}
	?>
	<!-- Sidepanel
	============================================= -->
	<div id="side-panel" class="dark">

		<div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a></div>

		<div class="side-panel-wrap">
			<div class="widget clearfix">
				<a class="side-panel-logo" href="index.php"><img src="<?= base_url('assets/img/main-logo.png');?>"></a>
				<nav class="nav-tree nobottommargin">
					<ul>
					<li class="<?= $menu==1 ? 'active' : ''; ?>"><a href="#">About Us</a>
						<ul>
							<li class="<?= $menu==1 && $submenu==1 ? 'active' : ''; ?>"><a href="<?= base_url('about-us');?>">Who Are We</a></li>
							<li class="<?= $menu==1 && $submenu==2 ? 'active' : ''; ?>"><a href="<?= base_url('misson-vision');?>">Our Mission and Vision</a></li>
							<li class="<?= $menu==1 && $submenu==3 ? 'active' : ''; ?>"><a href="<?= base_url('our-values');?>">Our Values</a></li>
							<li class="<?= $menu==1 && $submenu==4 ? 'active' : ''; ?>"><a href="<?= base_url('ceo-messages');?>">Message from the CEO</a></li>
							<li class="<?= $menu==1 && $submenu==5 ? 'active' : ''; ?>"><a href="<?= base_url('leadership');?>">Leadership Team</a></li>
							<li class="<?= $menu==1 && $submenu==6 ? 'active' : ''; ?>"><a href="<?= base_url('awards');?>">Awards</a></li>
							<li class="<?= $menu==1 && $submenu==7 ? 'active' : ''; ?>"><a href="<?= base_url('our-story');?>">Our Story</a></li>
						</ul>
					</li>
					<li class="<?= $menu==2 ? 'active' : ''; ?>"><a href="#">Our Brands</a>
						<ul>
							<li class="<?= $menu==2 && $submenu==1 ? 'active' : ''; ?>"><a href="<?= base_url('radar');?>">Radar</a></li>
							<li class="<?= $menu==2 && $submenu==2 ? 'active' : ''; ?>"><a href="<?= base_url('patriot');?>">Patriot</a></li>
							<li class="<?= $menu==2 && $submenu==3 ? 'active' : ''; ?>"><a href="<?= base_url('american-tourer');?>">American Tourer</a></li>
							<li class="<?= $menu==2 && $submenu==4 ? 'active' : ''; ?>"><a href="<?= base_url('#');?>">Tecnica Concept</a></li>
							<li class="<?= $menu==2 && $submenu==5 ? 'active' : ''; ?>"><a href="<?= base_url('#');?>">Roadlux</a></li>
						</ul>
					</li>
					<li class="<?= $menu==3 ? 'active' : ''; ?>"><a href="#">Renegade Program</a>
						<ul>
							<li class="<?= $menu==3 && $submenu==1 ? 'active' : ''; ?>"><a href="<?= base_url('#');?>">Motorsports</a></li>
							<li class="<?= $menu==3 && $submenu==2 ? 'active' : ''; ?>"><a href="<?= base_url('golf');?>">Golf</a></li>
						</ul>
					</li>
					<li class="<?= $menu==4 ? 'active' : ''; ?>"><a href="#">Responsibility</a>
						<ul>
							<li class="<?= $menu==4 && $submenu==1 ? 'active' : ''; ?>"><a href="<?= base_url('social-responsibility');?>">Social</a></li>
							<li class="<?= $menu==4 && $submenu==2 ? 'active' : ''; ?>"><a href="<?= base_url('environmental-responsibility');?>">Environmental</a></li>
						</ul>
					</li>
					<li class="<?= $menu==5 ? 'active' : ''; ?>"><a href="#">Media Center</a>
						<ul>
							<li class="<?= $menu==5 && $submenu==1 ? 'active' : ''; ?>"><a href="<?= base_url('press-releases');?>">Press Releases</a></li>
							<li class="<?= $menu==5 && $submenu==2 ? 'active' : ''; ?>"><a href="<?= base_url('media-coverages');?>">Media Coverages</a></li>
						</ul>
					</li>
					<li class="<?= $menu==6 ? 'active' : ''; ?>"><a href="<?= base_url('contact-us');?>">Contact Us</a></li>
				</ul>
				</nav>
			</div>
		</div>

	</div>

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<header id="header" class="transparent-header full-header custom-header" data-sticky-class="not-dark">
			<div id="header-wrap">
				<div class="container clearfix">
					<!-- <div id="primary-menu-trigger"><i class="icon-reorder"></i></div> -->

					<!-- Logo
					============================================= -->
					<div id="logo" class="custom-logo">
						<a href="<?= base_url('home') ?>" class="standard-logo main-logo"><img src="<?= base_url('assets/img/main-logo.png');?>"  alt="Omni"></a>
						<a href="<?= base_url('home') ?>" class="retina-logo" data-dark-logo="<?= base_url('assets/img/main-logo.png');?>"><img src="<?= base_url('assets/img/main-logo.png');?>" alt="Omni"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" class="dark custom-menu">


						<!-- Top menu
						============================================= -->
						<!-- <div id="top-bar-menu" class="top-menu">
							<a href="#"><i class="icon-reorder"></i></a>
						</div> -->
						<div id="side-panel-trigger" class="side-panel-trigger top-menu"><a href="#"><i class="icon-reorder"></i></a></div>
						
						<!-- #top-menu end -->


						<!-- Top Search
						============================================= -->
						<div id="top-search" class="custom-top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.php" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->

						<!-- Top Search
						============================================= -->
						<!-- <div id="home-menu" class="home-menu">
							<a href="#">Home</a>
						</div> -->

						<!-- #top-menu end -->

					</nav><!-- #primary-menu end -->
				</div>
			</div>
		</header><!-- #header end -->