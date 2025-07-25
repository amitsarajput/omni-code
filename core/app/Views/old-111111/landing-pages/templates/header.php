<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Meta Start -->
<meta name="Author" content="Omni United | Radar Tires, Timberland Tires and many more" />

<meta name="Description" content="<?= @(isset($meta_d) && $meta_d!=null)?$meta_d:'Omni United is a Singapore based tire designer, manufacturer and distributor. Founded by GS Sareen in 2003 it owns the Radar brand and distributes many others.';?>" />

<meta name="keywords" content="<?= @(isset($meta_k) && $meta_k!=null)?$meta_k:'american tourer, awards, birla, car, car, discover the road, featured news, goodride, home page, light truck, media, news, patriot, press releases, radar, roadlux, speedways, suv, suv, tbr, van';?>" />
<!-- Meta End -->

<link rel="icon" href="<?= base_url('assets/img/favicon-32x32.png');?>" type="image/x-icon" />

<!-- Stylesheets
============================================= -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Saira:wght@600&display=swap" rel="stylesheet">
<!--[if IE]>
    <link href="<?= base_url('assets/css/main.css')?>" rel="stylesheet">
<![endif]-->


<?php 
//Addition of stylesheets
	//echo link_tag('assets/css/main.css');
	/*$stylesheets=array('bootstrap.css','style.css','swiper.css','dark.css','font-icons.css','animate.css','magnific-popup.css','responsive.css');
	foreach ($stylesheets as $stylesheet) {
		echo link_tag('assets/css/'.$stylesheet); 
	}*/
//Extra stylesheet
	if (isset($extra_stylesheets)) {
		if (is_array($extra_stylesheets)) {
			foreach ($extra_stylesheets as $extra_stylesheet) {
				if ($extra_stylesheet=='print.css') {
					echo link_tag('assets/css/'.$extra_stylesheet, 'stylesheet','text/css', 'print', 'print');
				}else{
				echo link_tag('assets/css/'.$extra_stylesheet, 'stylesheet','text/css');
				} 
			}
		}else{
			echo link_tag('assets/css/'.$extra_stylesheets); 				
		}
	}
?>
<style> .sticky-left-button{ position: fixed; top: 50%; background-color: #DA2224; font-size: 1.2rem; color: #fff; transform: rotate(-90deg) translateX(-50%); left: 0; z-index: 999; padding: 2px 15px 5px; transform-origin: 0% 0%; } 
 .sticky-left-button:hover{color:#ffffff;}
 </style>
<!-- Document Title
============================================= -->
<title><?= isset($page_title)?$page_title.' | ':'';?>Omni United</title>

<!-- Global site tag (gtag.js) - Google Ads: 633962775 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-633962775"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-633962775');
</script>

</head>

<body class="stretched side-push-panel" data-loader-html="<img src='../assets/img/loader.gif' with='100' />">
    <!--[if !IE]> -->
        <link href="<?= base_url('assets/css/main.css')?>" rel="stylesheet" lazyload>
  <!-- <![endif]-->
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
						<a href="<?= base_url('radar-us') ?>" class="standard-logo main-logo"><img src="<?= base_url('assets/img/radar-logo.png');?>"  alt="Omni"></a>
						<a href="<?= base_url('radar-us') ?>" class="retina-logo" data-dark-logo="<?= base_url('assets/img/radar-logo.png');?>"><img src="<?= base_url('assets/img/radar-logo.png');?>" alt="Omni"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" class="dark custom-menu">


						<!-- Top menu
						============================================= -->
						<!-- <div id="top-bar-menu" class="top-menu">
							<a href="#"><i class="icon-reorder"></i></a>
						</div> -->
						<!-- <div id="side-panel-trigger" class="side-panel-trigger top-menu"><a href="#"><i class="icon-reorder"></i></a></div> -->
						
						<!-- #top-menu end -->
						<!-- <div class="home-link">
							<a href="<?= base_url() ?>">Home</a>
						</div> -->


						<!-- Top Search
						============================================= -->
						<!-- <div id="top-search" class="custom-top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="<?= base_url('search');?>" method="post">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div> --><!-- #top-search end -->

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