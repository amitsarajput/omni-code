<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    
<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-M6JQM9V');</script>

<!-- End Google Tag Manager -->

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
<!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i&display=swap" rel="stylesheet" type="text/css" />-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Crete+Round&family=Lato:ital,wght@0,300;0,400;0,700;1,400&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
<!--[if IE]>
    <!--<link href="<?= base_url('assets/css/main.css')?>" rel="stylesheet">-->
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
<style> 
.sticky-left-button {
display:none;
    position: fixed;
    top: 50%;
    background-color: #DA2224;
    font-size: 1rem;
    color: #fff;
    transform: rotate(-90deg) translateY(-100%) translateX(50%);
    right: 0;
    z-index: 999;
    padding: 2px 15px 5px;
    transform-origin: 100% 0%;
    left: auto;
}
/*.sticky-left-button{ position: fixed; top: 50%; background-color: #DA2224; font-size: 1rem; color: #fff; transform: rotate(-90deg) translateX(-50%); left: 0; z-index: 999; padding: 2px 15px 5px; transform-origin: 0% 0%; } */
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

<!--Main css-->
<?php 
    // $css = file_get_contents(base_url('assets/css/main.css'));
    // echo "<style>"; 
    // echo $css;
    // echo "</style>"; 
    echo link_tag('assets/css/main.css', 'stylesheet','text/css');
?>


</head>

<body class="stretched side-push-panel" data-loader-html="<img src='../assets/img/loader.gif' with='100' />">
    
    
<!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M6JQM9V"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->
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
	
	
	<?php if(!($menu==2 && $submenu==7)){ ?>
	<a href="<?= base_url('north-america-dealer-locator');?>" class="sticky-left-button" >North America Dealer Locator</a>
	<?php } ?>
	
	<!--Sidepanel-->
	<?php require_once(APPPATH.'Views/templates/sidenav.php'); ?>

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
	    <!--Region Notification-->
	    <div class="region-notification-wrapper">
        	<div class="region-notification-close">X</div>
        	<div class="region-notification-inner">
        		<div class="region-notificaiton-col col-text">You are currently viewing the Radar USA website. To view the products in your location, select the desired region from the drop-down list.</div>
        		<div class="region-notificaiton-col col-select">
        			<select class="selectpicker"  data-style="">
        			  <option data-icon="omniicon-location-pin" value="US">UNITED STATES</option>
        			  <option data-icon="omniicon-location-pin" value="CA">CANADA</option>
        			  <option data-icon="omniicon-location-pin" value="EU">EUROPE</option>
        			  <option data-icon="omniicon-location-pin" value="ROW">ASIA</option>
        			  <option data-icon="omniicon-location-pin" value="ROW">MIDDLE EAST AND AFRICA</option>
        			  <option data-icon="omniicon-location-pin" value="ROW">REST OF THE WORLD</option>
        			</select>
        		</div>
        		<div class="region-notificaiton-col col-button">
        			<a href="#" class="button button-dark btn-block">Continue</a>		
        		</div>
        	</div>
        </div>
<style>
	.region-notification-wrapper{width: 100%;height: 0;opacity: 0;background-color: #da2224;position: relative;z-index: 200;;transition: height opacity .3s ease-in-out;overflow:inherit;display:none;}
	.region-notification-close{
		position: absolute;
		top: 0;
		right: 0;
		height: 30px;
		width: 30px;
		font-size: 20px;
		color: white;
		background-color: transparent;
		cursor: pointer;
	}
	.region-notification-inner{
		width: 100%;
		height: 100%;
		padding: 25px;
		display: flex;
		justify-content: center;
		align-content: center;
		flex-direction: row;
		flex-wrap: wrap;
	}
	.region-notificaiton-col{padding: 5px;}
	.region-notificaiton-col {
      display: flex;
      justify-content: center;
      align-content: center;
      flex-direction: row;
      flex-wrap: wrap;
    }
	.col-text{
		color: #fff;
		font-size: 110%;
		line-height: 1.2;
	}
	.col-button button{font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important; font-weight: 600 !important;font-size: 16px;
letter-spacing: 3px;}

    .col-select .bootstrap-select{width:100% !important;}
    
    .col-select .bootstrap-select .dropdown-toggle{
        font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important; font-weight: 600 !important;font-size: 16px;
letter-spacing: 3px;color:#000;background-color: #fff; border:none;padding-top: 7px; padding-bottom: 7px;
    }
    .col-select .bootstrap-select .btn.dropdown-toggle:focus,
    .col-select .bootstrap-select .btn.dropdown-toggle:visited,
    .col-select .bootstrap-select .btn.dropdown-toggle:active
    {outline:none!important;box-shadow:none;background-color:#fff;color:#000;border:none;}
    .col-select .bootstrap-select .btn.dropdown-toggle i{
        font-size: 1.8rem;
        width: 23px;
        height: 23px;
        overflow: hidden;
        margin-bottom: -3px;
        margin-top: -6px;
    }
    .col-select .bootstrap-select .dropdown-menu{
        background-color: #fff;
        border-color: #f7f7f7;
    }
    .col-select .bootstrap-select .dropdown-menu a.dropdown-item {
        color: #000;
        font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important;
        font-weight: 500 !important;
        font-size: 16px;
        letter-spacing: 1px;
        text-shadow: none;
        word-spacing: -2px;
        padding-left: 0.6rem;
        padding-right: 0.6rem;
    }
    .col-select .bootstrap-select.btn-group .dropdown-toggle .filter-option{
        overflow:hidden;
    }
	.col-button .button{margin: 0;background-color: #fff;color:#da2224;opacity: 1;}
	.col-button .button:hover{background-color: #fff;color:#000;opacity: 1;}
	
    .col-select, .col-button, .col-text{ flex:1 1 25%; }
    .col-text{ min-width: 50%; }
	.col-select, .col-button{min-width:25%;}
	
	@media only screen and (max-width:768px){
	    .col-text{
    		min-width: 100%;
    		font-size:1rem;
    	}
    	.col-select, .col-button{min-width:25%;}
	}
	@media only screen and (max-width:600px){
	    .col-text{
    		min-width: 100%;
    		font-size:1rem;
    	}
    	.col-select, .col-button{min-width:50%;}
	}
	@media only screen and (max-width:450px){
	    .region-notification-inner {
          align-content: center;
        }
	    .col-text,.col-select,.col-button{
    		min-width: 100%;
    	}
    	
	    .col-text{
    		font-size:0.8rem;
    	}
	}
</style>
	    <!--Region Notification-->
	    <!--<div class="header-top small-screen">
	        <div class="container clearfix">
            	<div class="radar-region-dropdown">
        			  <select class="selectpicker"  data-style="">
        			      <option data-icon="omniicon-location-pin" value="US">UNITED STATES</option>
        			  <option data-icon="omniicon-location-pin" value="CA">CANADA</option>
        			  <option data-icon="omniicon-location-pin" value="EU">EUROPE</option>
        			  <option data-icon="omniicon-location-pin" value="ROW">ASIA</option>
        			  <option data-icon="omniicon-location-pin" value="ROW">MIDDLE EAST AND AFRICA</option>
        			  <option data-icon="omniicon-location-pin" value="ROW">REST OF THE WORLD</option>
    				</select>
    			</div>
			</div>
	    </div>-->
		<header id="header" class="transparent-header full-header custom-header" data-sticky-class="not-dark">
			<div id="header-wrap">
				<div class="container clearfix">
					<!-- <div id="primary-menu-trigger"><i class="icon-reorder"></i></div> -->
					<!--Region Notification-->
            	    <div class="header-top small-screen">
                    	<div class="radar-region-dropdown">
                			  <select class="selectpicker"  data-style="" data-dropdown-align-right="auto">
                			      <option data-icon="omniicon-location-pin" value="US">UNITED STATES</option>
                			  <option data-icon="omniicon-location-pin" value="CA">CANADA</option>
                			  <option data-icon="omniicon-location-pin" value="EU">EUROPE</option>
                			  <option data-icon="omniicon-location-pin" value="ROW">ASIA</option>
                			  <option data-icon="omniicon-location-pin" value="ROW">MIDDLE EAST AND AFRICA</option>
                			  <option data-icon="omniicon-location-pin" value="ROW">REST OF THE WORLD</option>
            				</select>
            			</div>
            	    </div>

					<!-- Logo
					============================================= -->
					<div id="logo" class="custom-logo">
						<a href="<?= base_url() ?>" class="standard-logo main-logo"><img src="<?= base_url('assets/img/radar-logo.png');?>"  alt="Omni"></a>
						<a href="<?= base_url() ?>" class="retina-logo" data-dark-logo="<?= base_url('assets/img/radar-logo.png');?>"><img src="<?= base_url('assets/img/radar-logo.png');?>" alt="Omni"></a>
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
						<div class="home-link">
							<a href="<?= base_url() ?>">Home</a>
						</div>


						<!-- Top Search
						============================================= -->
						<div id="top-search" class="custom-top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="<?= base_url('search');?>" method="post">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->
						
						
						<div class="header-custom-link with-dropdown for-small-too" >
							<a href="#">Dealer Locator</a>
							<ul class="hcl--dropdown">
							   <li><a href="<?= base_url('uk-europe-dealer-locator') ?>">Europe</a></li>
							   <li><a href="<?= base_url('north-america-dealer-locator') ?>">North America</a></li>
							</ul>
						</div>
						<!--<div class="radar-region-dropdown large-screen">
            			  <select class="selectpicker"  data-style="">
            			      <option data-icon="omniicon-location-pin" value="US">UNITED STATES</option>
                			  <option data-icon="omniicon-location-pin" value="CA">CANADA</option>
                			  <option data-icon="omniicon-location-pin" value="EU">EUROPE</option>
                			  <option data-icon="omniicon-location-pin" value="ROW">ASIA</option>
                			  <option data-icon="omniicon-location-pin" value="ROW">MIDDLE EAST AND AFRICA</option>
                			  <option data-icon="omniicon-location-pin" value="ROW">REST OF THE WORLD</option>
							</select>
						</div>-->
						

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
		
<style>
    .header-top {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        background-color: #000;
        padding-top: 0;
        margin-bottom: -25px;
        padding-top: 5px;
    }
    .radar-region-dropdown{float:right;margin-top:0;margin-right:0;background-color: #da2224; border-radius:4px;}
    .header-top .radar-region-dropdown{background-color: transparent;}
    .header-top .radar-region-dropdown .bootstrap-select.btn-group{ width:auto;}
    
    .radar-region-dropdown .bootstrap-select button{outline:none;background-color:#da2224;color:#fff;border:none;
        font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important;
        font-weight: 600 !important;
        font-size: 16px;
        letter-spacing: 2px;
        text-shadow: none;
        word-spacing: -2px;
        line-height:1.2rem;
    }
    .header-top .radar-region-dropdown .bootstrap-select button{background-color:transparent;}
    
    .radar-region-dropdown .bootstrap-select .btn.dropdown-toggle:focus,
    .radar-region-dropdown .bootstrap-select .btn.dropdown-toggle:visited,
    .radar-region-dropdown .bootstrap-select .btn.dropdown-toggle:active
    {outline:none!important;box-shadow:none;background-color:#da2224;color:#fff;border:none;}
    
    .header-top .radar-region-dropdown .bootstrap-select .btn.dropdown-toggle:focus,
    .header-top .radar-region-dropdown .bootstrap-select .btn.dropdown-toggle:visited,
    .header-top .radar-region-dropdown .bootstrap-select .btn.dropdown-toggle:active{background-color:transparent;}
    
    .radar-region-dropdown .bootstrap-select .btn.dropdown-toggle i{
        font-size: 1.8rem;
        width: 23px;
        height: 23px;
        overflow: hidden;
        margin-bottom: -3px;
        margin-top: -6px;
    }
    .radar-region-dropdown .bootstrap-select .dropdown-menu{
        background-color: #fff;
        border-color: #f7f7f7;
    }
    .radar-region-dropdown  .bootstrap-select .dropdown-menu a.dropdown-item {
        color: #000;
        font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important;
        font-weight: 500 !important;
        font-size: 16px;
        letter-spacing: 1px;
        text-shadow: none;
        word-spacing: -2px;
        padding-left: 0.6rem;
        padding-right: 0.6rem;
    }
    .radar-region-dropdown  .bootstrap-select.btn-group .dropdown-toggle .filter-option{
        overflow:hidden;
    }
    .small-screen {display:none;}
    .large-screen {display:block;}
    /*
    .radar-region-dropdown select{
        color: #fff;
        background-color: transparent;
        border: none;
        font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important;
        font-weight: 600 !important;
        font-size: 16px;
        letter-spacing: 2px;
        text-shadow: none;
        word-spacing: -2px;
    }
    .radar-region-dropdown select:focus{
        color: #fff;
        background-color: transparent;
        border: none;
    }
    
    .radar-region-dropdown select > option{
        color: #444;
        background-color: #fff;
    }*/
    @media only screen and (max-width: 991.98px){
        .radar-region-dropdown {
            margin-top: 0;
            margin-right: 0;
            position: relative;
        }
        /*.radar-region-dropdown .bootstrap-select{ width:150px !important;}*/
        .radar-region-dropdown .bootstrap-select button{
            font-size: 0.9rem;
            padding-left: 0;
        }
        
        .radar-region-dropdown .bootstrap-select .btn.dropdown-toggle i{
            font-size: 1.7rem;
        }
        /*
        .radar-region-dropdown select {
          font-size: 0.9rem;
          letter-spacing: 2px;
          padding: 5px;
          height: 1.8rem;
        }*/
    }
    @media only screen and (max-width: 767px){
        .radar-region-dropdown .bootstrap-select .dropdown-menu{
            /*left: auto !important;
            right: -6px;*/
        }
    }
    @media only screen and (max-width: 450px){
        .large-screen {display:none;}
        .small-screen {display:block;}
        .small-screen .radar-region-dropdown {
            margin-bottom: -17px;
            margin-top: 0;
        }
        /*.radar-region-dropdown .bootstrap-select{ width:150px !important;}*/
        .radar-region-dropdown .bootstrap-select button{
            font-size: 0.9rem;
            padding-left: 0;
        }
        
        .radar-region-dropdown .bootstrap-select .btn.dropdown-toggle i{
            font-size: 1.7rem;
        }
        
        .header-top {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background-color: #000;
            margin-bottom: -8px;
            padding-top: 5px;
        }
    }
</style>
<style>

#header.transparent-header.full-header.custom-header,
#header.transparent-header.full-header.custom-header #header-wrap{height:90px!important;}
@media only screen and (max-width: 991.98px){
    #header.transparent-header.full-header.custom-header,
    #header.transparent-header.full-header.custom-header #header-wrap{height:85px!important;}
    .custom-menu #side-panel-trigger {
      margin: 39px 12px !important;
    }
    #top-search a {
      margin-top: 36px !important;
    }
}
</style>