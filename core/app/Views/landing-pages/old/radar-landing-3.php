<?php 
	$car_cuv_suv=array();
	$suv_light_truck=array();
	$trailer=array();
	$classic=array();
	$field_to_filter='search_tag';
	if ($tyres) {
		foreach ($tyres as $tyre) {
			if ($tyre[$field_to_filter]=='car/cuv/suv') {
				array_push($car_cuv_suv, $tyre);
			}elseif ($tyre[$field_to_filter]=='suv/light-truck') {
				array_push($suv_light_truck, $tyre);
			}elseif ($tyre[$field_to_filter]=='van/trailer') {
				array_push($trailer, $tyre);
			}elseif ($tyre[$field_to_filter]=='classic') {
				array_push($classic, $tyre);
			}
		//	array_push($car_cuv_suv, $tyre);
		}
	}
?>
<!--Page Title
============================================= -->
<style>
    .custom-heading-block{margin-bottom: 50px !important;}
	.buyonlinesection{ padding:80px 0; }
	.buyonlinesection .custom-heading-block{margin-bottom: 50px !important;}
	/*Slider Styles*/
	.slider-element.swiper_wrapper, .swiper_wrapper .swiper-slide{height:67.6vh !important;}
	.swiper-slide{ background-color: #fff;background-size: contain !important;}
	.swiper-slide.slide-1{ background-image: url(<?= base_url('assets/img/landing-pages/RadarMicrosite3Banner_1280x700.jpg');?>); }
	
	/*Page Title*/
	    /*background-image: url(<?= base_url('assets/img/landing-pages/RadarMicrosite3Banner_1280x700.jpg');?>); */
	#page-title{ 
	    background-color: #000;
	    background-repeat:no-repeat; 
	    background-position:center bottom;
	    background-size: contain !important;
	    height:67.6vh !important; 
	    background-image: url(<?= base_url('assets/img/landing-pages/RadarMicrosite3Banner_1280x700.jpg_Renegade-X.webp');?>); 
	}
	#page-title::before {
      content: '';
      position: absolute;
      background-color: rgba(0,0,0,.1);
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
    }
	
	.brand-tabs-section .tirerow { border-bottom: 1px solid #aaa; margin-bottom: 120px; }
	.brand-tabs-section .tirerow:last-child, .brand-tabs-section .tab-container .tab-content .row:last-child { margin-bottom: 60px; }

	.main-footer #copyrights{padding: 9px 0 10px !important;}
	.mandatory{margin-top:10px; display:block;}
	/*Form label I AM A Wholesaler and Reailer*/
	.iamalabel-wrapper{display: flex; justify-content: space-evenly; align-items: center;}
	.iamalabel{}
	.iamalabel:last-child{}
	
	.radar-brand-page .brand-product-item::after {
      cursor: pointer;
    }
    
    /**/
    .radar-brand-page .brand-product-item::after {display:none;}
    .radar-brand-page .brand-product-item .greenicon {
      content: "";
      width: 40px;
      height: 40px;
      /*background-image: url('https://www.omni-united.com/assets/img/carbon-neutral-icon.png');*/
      background-size: contain;
      background-repeat: no-repeat;
      position: absolute;
      left: calc(50% - 20px);
      bottom: 2%;
      transform: translateX(400%);
      cursor: pointer;
    }
	
	@media screen and (max-width:991px ) {
	    .slider-element.swiper_wrapper, .swiper_wrapper .swiper-slide{height:67.6vh !important;}
	    .swiper-slide.slide-1{ background-image: url(<?= base_url('assets/img/landing-pages/RadarMicrosite3Banner_768x693.jpg');?>); }
    	/*Page Title*/
    	#page-title{ height:60vh !important;background-image: url(<?= base_url('assets/img/landing-pages/RadarMicrosite3Banner_768x693.jpg');?>); }
        .custom-heading-block{margin-bottom: 30px !important;}
		.buyonlinesection .retailers{ margin-bottom: 25px; }
		.buyonlinesection .retailers:last-child{ margin-bottom: 0; }
	}
	
	@media screen and (max-width:768px ) {
	    
	    .swiper_wrapper:not(.force-full-screen), 
	    .swiper_wrapper:not(.force-full-screen):not(.canvas-slider-grid) .swiper-slide,
	    .slider-element.swiper_wrapper, 
	    .swiper_wrapper .swiper-slide{height:60vh !important;}
	    .swiper-slide{background-size: contain!important; background-position: center bottom !important;}
		.slider-element.swiper_wrapper { border-top: 1px solid #555;}
		.swiper-slide.slide-1{ background-image: url(<?= base_url('assets/img/landing-pages/RadarMicrosite3Banner_768x693.jpg');?>); }
		
    	/*Page Title*/
    	#page-title{ height:60vh !important;background-image: url(<?= base_url('assets/img/landing-pages/RadarMicrosite3Banner_768x693.jpg');?>); }
	}
	
	@media screen and (max-width: 768px) {
		.brand-tabs-section .tirerow{
			border-bottom: none;
		    margin-bottom: 0;}
		.brand-tabs-section .tirecolumn {
		    /*border-bottom: 1px solid #aaa;
		    margin-bottom: 120px;*/
		}
    	.buyonlinesection{ padding:50px 0; }
    	.buyonlinesection .custom-heading-block{margin-bottom: 30px !important;}
		.buyonlinesection .retailers{ margin-bottom: 20px; }
		.buyonlinesection .retailers:last-child{ margin-bottom: 0; }
		.product-catalog .product-cat-nav .tab-nav li{margin-left: 0 !important;}
    	/*Form label I AM A Wholesaler and Reailer*/
    	.iamalabel-wrapper{}
    	.iamalabel{}
    	.iamalabel:last-child{}
	}
	@media screen and (max-width: 576px) {
	    .brand-tabs-section .tab-container .tab-content .row:last-child .col-md-6:last-child{margin-bottom:20px;}
	    .slider-element.swiper_wrapper, .swiper_wrapper .swiper-slide{height:60vh !important;}
	    .swiper-slide{ background-position: center bottom;}
		.swiper-slide.slide-1{ background-image: url(<?= base_url('assets/img/landing-pages/RadarMicrosite3Banner_375x450.jpg');?>); }
		/*Mobile fix header*/
		#header.transparent-header.full-header.custom-header #header-wrap{height:50px !important;}
		#header.full-header #logo.custom-logo img{height:auto;width:110px;margin-top:0;}
		.custom-logo{top:10px;}
		/*Mobile fix Slider*/
		/*.slider-element.swiper_wrapper, {height: 330px !important;background: #000;}*/
		.main-slider-home .swiper-pagination{bottom:35px !important;}
		.brand-tabs-section ul.brand-tabs li.ui-tabs-tab{width: 33% !important;}
		/*Page Title*/
    	#page-title{ height:60vh !important;background-image: url(<?= base_url('assets/img/landing-pages/RadarMicrosite3Banner_375x450.jpg');?>); }
	}
</style>

<section id="page-title">
    <div class="container">
        
    </div>
</section>
<!--<section id="slider" class="slider-element swiper_wrapper home-slider main-slider-home full-screen clearfix" data-autoplay="false" data-speed="false" data-loop="false">
	<div class="slider-parallax-inner">
		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">
				<div class="swiper-slide dark slide-1" >
					<div class="container clearfix"></div>
				</div>
			</div>
			
		</div>
	</div>
</section>--><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">

      	

      	<section id="full-width" class="full-section ptlg brand-tabs-section radar-brand-page us-radar-brand">
      	    <div class="container">
    	      	<div class="heading-block  center custom-heading-block pro-page-hd brand-fillter">
    	        	<h2 class="ColorBlack">REASONS WHY IT’S A GREAT TIME <br>TO BE A RADAR DEALER</h2>
    	      	</div>
    	      	<div><!--<ul style="text-align:center;list-syle:disc">
	<li style="list-style: disc;list-style-position: inside;">Radar has immediate inventory domestically to meet your needs.</li>
	<li style="list-style: disc;list-style-position: inside;">Radar uses 3<sup>rd</sup> party testing to validate product quality. </li>
	<li style="list-style: disc;list-style-position: inside;">Radar offers a competitive warranty and road hazard to consumers.</li>
	<li style="list-style: disc;list-style-position: inside;">Radar provides co-op funds for better marketing support.</li>
	<li style="list-style: disc;list-style-position: inside;">Radar partners with iconic automotive designer GFG Style to offer one-of-a-kind product designs.</li>
	<li style="list-style: disc;list-style-position: inside;">Radar is the only tire to have been manufactured “Carbon Neutral” since 2013.</li>
</ul>--><ul style="text-align:center;list-syle:disc">
	<li style="list-style: disc;list-style-position: inside;">Immediate inventory domestically to meet your needs</li>
	<li style="list-style: disc;list-style-position: inside;">3<sup>rd</sup> party testing to validate product  safety and  performance </li>
	<li style="list-style: disc;list-style-position: inside;">Comprehensive warranty coverage</li>
	<li style="list-style: disc;list-style-position: inside;">Co-op funds for marketing support</li>
	<li style="list-style: disc;list-style-position: inside;">Partnership with iconic automotive designer GFG Style to offer one-of-a-kind product designs</li>
	<li style="list-style: disc;list-style-position: inside;">The  only tire brand to have been manufactured “Carbon Neutral” since 2013.</li>
</ul>

<h4 style="text-align:center;">Radar = GREAT VALUE for your customer</h4></div>
	      	</div>

			<div class="product-catalog GreenPopUp">

				<div class="tabs clearfix" id="tab-3">
					<div class="product-cat-nav product-cat-nav2 us-fillter">
						<div class="container clearfix">
						  <ul class="tab-nav tab-nav2  brand-tabs clearfix radar-brand-list">
							<li><a href="#tabs-suvlighttruck"><i class="omniicon-light-truck-2"></i>SUV/Light Truck</a></li>
							<li><a href="#tabs-carcuvsuv"><i class="omniicon-car-3"></i>CAR/CUV/SUV</a></li>
							<li><a href="#tabs-vantrailer"><i class="omniicon-van-trailer"></i><span class="">VAN/TRAILER</span></a></li>
			                <!--<li><a href="#tabs-classic"><i class="omniicon-classic-mini"></i>CLASSIC</a></li>-->
						  </ul>
						</div>
				  	</div>

					<div class="tab-container">
						<div class="container clearfix">

							<div class="tab-content clearfix" id="tabs-suvlighttruck">
								
								<?php $totaltyres=count($suv_light_truck); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($suv_light_truck as $tyre) { ?>
										<div class="col-md-6">
										<div class="brand-product-item center">
											<h2 class="product-title"><a class="ColorRed" href="<?= base_url($landingpage3slug.'/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
										<?php
    										$pmeta=array();
    										if($tyre['category']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['terrain_category']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta ColorBlack"><?= implode(" | ", $pmeta); ?></div>
											<div class="product-image">
												<a href="<?= base_url($landingpage3slug.'/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													data-src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" 
													alt="Radar Tire" 
													class="lozad" />
												</a>
											</div>
											<div class="greenicon"></div>
										</div>
									</div>
								<?php if($i%2==0 && $i < $totaltyres){ ?>
								</div>
								<div class="row clearfix">
								<?php } ?>
								<?php $i++; } ?>
								</div>
								<?php }else{ ?>
								<div class="row clearfix">
									<div class="col-md-12 center">
										Currently there is no tire in this category.
									</div>
								</div>
								<?php } ?>

							</div>

							<div class="tab-content clearfix" id="tabs-carcuvsuv">
								<?php $totaltyres=count($car_cuv_suv); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($car_cuv_suv as $tyre) { ?>
									<div class="col-md-6">
										<div class="brand-product-item center">
											<h2 class="product-title"><a class="ColorRed" href="<?= base_url($landingpage3slug.'/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
											<?php
    										$pmeta=array();
    										if($tyre['category']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['terrain_category']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta ColorBlack"><?= implode(" | ", $pmeta); ?></div>
											<div class="product-image">
												<a href="<?= base_url($landingpage3slug.'/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													data-src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" 
													alt="Radar Tire" 
													class="lozad" />
												</a>
											</div>
											<div class="greenicon"></div>
										</div>
									</div>
								<?php if($i%2==0 && $i < $totaltyres){ ?>
								</div>
								<div class="row clearfix">
								<?php } ?>
								<?php $i++; } ?>
								</div>
								<?php }else{ ?>
								<div class="row clearfix">
									<div class="col-md-12 center">
										Currently there is no tire in this category.
									</div>
								</div>
								<?php } ?>

							</div>

							<div class="tab-content clearfix" id="tabs-vantrailer">
								
								<?php $totaltyres=count($trailer); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($trailer as $tyre) { ?>
										<div class="col-md-6">
										<div class="brand-product-item center">
											<h2 class="product-title"><a class="ColorRed" href="<?= base_url($landingpage3slug.'/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
											<?php
    										$pmeta=array();
    										if($tyre['category']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['terrain_category']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta ColorBlack"><?= implode(" | ", $pmeta); ?></div>
											<div class="product-image">
												<a href="<?= base_url($landingpage3slug.'/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													data-src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" 
													alt="Radar Tire" 
													class="lozad" />
												</a>
											</div>
											<div class="greenicon"></div>
										</div>
									</div>
								<?php if($i%2==0 && $i < $totaltyres){ ?>
								</div>
								<div class="row clearfix">
								<?php } ?>
								<?php $i++; } ?>
								</div>
								<?php }else{ ?>
								<div class="row clearfix">
									<div class="col-md-12 center">
										Currently there is no tire in this category.
									</div>
								</div>
								<?php } ?>

							</div>

							<div class="tab-content clearfix hidden" id="tabs-classic">
								
								<?php $totaltyres=count($classic); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($classic as $tyre) { ?>
										<div class="col-md-6">
										<div class="brand-product-item center">
											<h2 class="product-title"><a class="ColorRed" href="<?= base_url($landingpage3slug.'/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
											<?php
    										$pmeta=array();
    										if($tyre['category']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['terrain_category']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta ColorBlack"><?= implode(" | ", $pmeta); ?></div>
											<div class="product-image">
												<a href="<?= base_url($landingpage3slug.'/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													data-src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" 
													alt="Radar Tire" 
													class="lozad" />
												</a>
											</div>
										</div>
									</div>
								<?php if($i%2==0 && $i < $totaltyres){ ?>
								</div>
								<div class="row clearfix">
								<?php } ?>
								<?php $i++; } ?>
								</div>
								<?php }else{ ?>
								<div class="row clearfix">
									<div class="col-md-12 center">
										Currently there is no tire in this category.
									</div>
								</div>
								<?php } ?>

							</div>

						</div>
					</div>

				</div>

			</div>

		</section>

		<!--<section class="pt pb" style="background-color: #fbfbfb !important;">
			<div class="container limilt-section">
				<div class="row clearfix center">
					<div class="col-lg-12">
						<div class="heading-block custom-heading-block">
							<h2 class="ColorBlack">View our Range of <br>Factory Direct Products</h2>
						</div>
						<a target="_blank" href="<?= base_url('radar-us'); ?>" class="button">Click Here</a>
					</div>
				</div>
			</div>
		</section>-->

		<section class="pt graycolor">
			<div class="container limilt-section">
				<div class="row clearfix center">
					<div class="col-lg-12">
						<div class="heading-block custom-heading-block">
							<h2 class="ColorBlack">LIMITED WARRANTY</h2>
						</div>
						<p class="center lead18 bottommargin" style="line-height: 24px;"><span class="bottommargin-xs" style="display: block; line-height: 24px;">Radar Tires offers a Limited Warranty on all its products. <br>Click on the below links to view the complete warranty information:</span> <a class="blue" target="_blank" href="<?= base_url('radar-us/limited-warranty'); ?>">Passenger and Light Truck tires - North America</a></p>
					</div>
				</div>
			</div>
		</section>
        <!--
		<section class="full-width whitebg topmargin-lg bottommargin-lg">
			<div class="container">
				<div class="row clearfix" style="">
					<div class="col-md-12">
            	      	<div class="heading-block  center custom-heading-block pro-page-hd">
            	        	<h2 class="ColorBlack">RADAR TIRES</h2>
            	      	</div>
						<p>Radar Tires offers an exciting selection of passenger car, SUV and Light Truck tires that are made for different applications and performance needs of drivers. We also offer a comprehensive warranty program which includes Treadwear Mileage Warranty, Road Hazard Warranty and a 30-Day Satisfaction Guarantee*.</p>
						<small>*offered on selected ranges</small>
					</div>
				</div>
			</div>
		</section>

		<section id="full-width" class="full-section clearfix three-product graycolor buyonlinesection">
			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
					<h2 class="ColorRed">Buy Radar Tires Online</h2>
				</div>
				<div class="mx-auto" style="max-width: 550px;">
					<div class="row clearfix  custom-product">
						<div class="col-lg-6 retailers">
							<a href="https://simpletire.com/brands/radar-tires">
								<div class="center"> 
									<img src="<?= base_url('assets/img/retailerslogo/simpletire.png');?>" alt="" width="220">
								</div>
							</a>
						</div>
						<div class="col-lg-6 retailers">
							<a href="https://www.walmart.com/browse/auto-tires/radar-tires/91083_1077064_6083160_2937973?&adid=22222222254421113917&wmlspartner=wmtlabs&wl0=b&wl1=g&wl2=c&wl3=311995544828&wl4=aud-393207457166:dsa-759506286232&wl5=9062538&wl6=&wl7=2840&wl8=&veh=sem&gclid=Cj0KCQjw59n8BRD2ARIsAAmgPmKpW_kWUeh9gOubTFDwXQzbCq9dydeMHaaVyd91A74kX4YX3S5ejw4aAmSVEALw_wcB">
								<div class="center"> 
									<img src="<?= base_url('assets/img/retailerslogo/walmart.png');?>" alt="" width="220">
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="whitebg bottommargin">

			<div class="fillter-bar ptlg">
				<div class="container clearfix">
					<div class="heading-block  center custom-heading-block">
						<h2>find a dealer near you</h2>
					</div>

					<div class="main-search-bar">
						<div class="container clearfix">
							<form id="mapsearchform" action="#" onsubmit="formsubmission(event, this)">
								<div class="form-row row">
									<div class="col-lg-7">
										<div class="inputs">
											<div class="form-group">
												<label>Enter Zipcode or Location</label>
												<input id="autocomplete" type="text" name="postal" placeholder="enter zip code here" class="sm-form-control">
											</div>

											<div class="form-group">
												<label>choose search radius</label>
												<select name="selectcity" id="selectcity" onchange="" class="form-control">
												     <option value="25">25 mile radius</option>
												     <option value="50" selected="selected">50 mile radius</option>
												     <option value="100">100 mile radius</option>
											    </select>
											</div>
										</div>
									</div>
									<div class="col-lg-5">
										<div class="buttons">
											<div class="formbutton">
												<input type="submit" id="submitbutt" class="button nomargin" value="search" />
											</div>
											<div class="formbutton text">
												<label class=" ortext">or</label>
											</div>
											<div class="formbutton">
												<button  type="button" class="button nomargin"  onclick="geolocate();">use my location</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>


					<div class="fillter-location">
						<div class="container clearfix">
							<div class="row clearfix">
								<div id="side_bar" class="col-lg-12"></div>
								<div class="col-lg-12">
									<div id="map" style="min-width: 100%; min-height: 450px;">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>
        -->
		<section class="pt pb"  style="background-color: #fbfbfb !important;">
			<div class="container clearfix">
				<div class="heading-block center custom-heading-block" >
			        <h2 class="ColorBlack">Order Now</h2>
		        </div>
				<div class="row clearfix">
					<div class="col-lg-12">
						<div class="contact-form-main center">
        					<form action="<?= base_url('order-inquiry/submit')?>" id="contact-form-2" method="post" class="omniform mx-auto" style="max-width:500px;" >					
        						<!--<span class="form-heding">
        							SEND AN ENQUIRY
        						</span>-->
        						<div class="alert alert-danger error" role="alert">
        						</div>
        						<div class='clear'></div>
        						
        						<div class="col_full">
        							<input type="text" id="" name="name" placeholder="NAME*" value="<?= set_value('name');?>" class="sm-form-control required" required />
        						</div>
        						<div class="clear"></div>
        						
        						<div class="col_full">
        							<input type="text" id="" name="companyname" placeholder="COMPANY NAME*" value="<?= set_value('companyname');?>" class="sm-form-control required" required >
        						</div>
        						<div class="clear"></div>
        						
        						<div class="col_full">
        							<input type="email" id="" name="email" placeholder="EMAIL*" value="<?= set_value('email');?>" class="sm-form-control required email" required >
        						</div>
        						<div class="clear"></div>
        
        						<div class="col_full">
        							<input type="text" id="" name="mobile" placeholder="PHONE" value="<?= set_value('mobile');?>" class="sm-form-control">
        						</div>
        						<div class="clear"></div>
        
        						<div class="col_full">
        							<input type="text" id="" name="addresslocation" placeholder="ADDRESS/LOCATION" value="<?= set_value('addresslocation');?>" class="sm-form-control">
        						</div>
        						<div class="clear"></div>
        						
        						<div class="col_full">
        							<textarea class="required sm-form-control" id="" name="message" placeholder="INQUIRY"><?= set_value('message');?></textarea>
        						</div>
        						<div class="clear"></div>
    						
        						<div class="col_full">
        						    <div class="iamalabel-wrapper">
            						    <label class="iamalabel">I am a</label>
            							<label class="iamalabel" for='wholesaler'>Wholesaler <input type="checkbox" id="wholesaler" name="wholesaler" class=""></label>
            							<label class="iamalabel" for='retailer'>Retailer <input type="checkbox" id="retailer" name="retailer" class=""></label>
        							</div>
        						</div>
        						<div class="clearfix"></div>
        
        						<div class="col_full hidden">
        							<input type="text" id="phone" name="phone" value="" class="sm-form-control" />
        							<input type="hidden" id="current_page" name="current_page" value="<?= current_url(); ?>">
                                    <input type="text" id="g-recaptcha" name="g-recaptcha" value="" />
                                    <input type="text" id="g-recaptcha-action" name="g-recaptcha-action" value="" />
        						</div>
        						<div class="clear"></div>
        
        						<div class="col_full">
        						    <div class="d-flex justify-content-between align-items-center">
        							<button class="button nomargin submit" name="submit" type="submit" id="submit" value="Send">Submit</button>
        							<span class="required-field"><i>*Required fields</i></span>
        							</div>
        						</div>
        						<div class="clearfix"></div>
        						
        						<div class="alert alert-success result" role="alert"></div>
        					</form>
    				    </div>
					</div>
				</div>
			</div>
		</section>
		<section class="pt pb graycolor">
			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
					<h3>Sign Up for Radar TNT (Total News and Tools)</h3>
					<p class="center" style="margin-top: 4px;">News &bull; Promotions &bull; Trends &bull; Special Offers</p>
				</div>
				<div class="row clearfix">
					<div class="col-lg-12">
						<div class="main-form-landing">
    						<form id="contact-form-1" name="" class="omniform mx-auto" style="max-width:500px;" action="<?= base_url('subscription-tnt/submit');?>" method="POST">
    					    <div class="alert alert-danger error" role="alert"></div>
    						<div class="col_full">
    							<input type="text" id="name" name="name" placeholder="Name*" value="" class="sm-form-control required" required>
    						</div>
    						<div class="clearfix"></div>
    						
    						<div class="col_full">
    							<input type="email" id="email" name="email" placeholder="Email*" value="" class="sm-form-control required" required>
    						</div>
    						<div class="clearfix"></div>
    						
    						<div class="col_full">
    						    <div class="iamalabel-wrapper">
        						    <label class="iamalabel">I am a</label>
        							<label class="iamalabel" for='wholesaler'>Wholesaler <input type="checkbox" id="wholesaler" name="wholesaler" class=""></label>
        							<label class="iamalabel" for='retailer'>Retailer <input type="checkbox" id="retailer" name="retailer" class=""></label>
    							</div>
    						</div>
    						<div class="clearfix"></div>
    						
    						<div class="col_full center">
    							<button class="button nomargin submit" type="submit" id="submit" name="submit" value="submit">Submit</button><br>
    							<small class="mandatory">*Required Fields</small>
    						</div>
    						
    						<div class="clearfix"></div>
    
    						<div class="col_full hidden">
    							<input type="text" id="phone" name="phone">
    							<input type="hidden" id="current_page" name="current_page" value="<?= current_url(); ?>">
    							
                                <input type="text" id="g-recaptcha" name="g-recaptcha" value="" />
                                <input type="text" id="g-recaptcha-action" name="g-recaptcha-action" value="" />
    						</div>
									
							<div class="alert alert-success result" role="alert"></div>
    						</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		
	</div><!-- content-wrap end -->

</section><!-- content end-->

<!-- Modal -->
<!--<div class="modal-on-load" data-target="#carbonNeutralPopUp" ></div>-->
<div class="modal1 mfp-hide mfp-align-top" id="carbonNeutralPopUp">
	<div class="block divcenter" style="">
	    <button title="Close (Esc)" type="button" class="mfp-close">×</button>
		<div class="" style="padding-top:10px;">
	        <div class="mp-body center">
			    <div class="heading-block custom-heading-block" >
			        <h3 class="nott">Why Manufactured <div style="display:inline;color: #89c847!important;">Carbon Neutral</div> is Important to You.</h3>
		        </div>
		        <div>
		            <p>Radar Tires is manufactured carbon neutral. When you buy Radar Tires, you are supporting the only tire brand that has a net zero carbon footprint at manufacturing.</p>
		        </div>
		        <div class="d-flex justify-content-center align-items-center">
		            <img class="popuplogoimage" src="<?= base_url('assets/img/radar-logo-dark.png');?>" />  | <img class="popuplogoimage"  src="<?= base_url('assets/img/carbon-neutral-unit.png');?>" />
		        </div>
			</div>
		</div>
	</div>
</div>
<!--<div class="modal-on-load" data-target="#orderNowForm"></div>-->
<div class="modal1 mfp-hide" id="orderNowForm">
	<div class="block divcenter">
	    <button title="Close (Esc)" type="button" class="mfp-close">×</button>
		<div class="" style="padding-top:10px;">
	        <div class="mp-body">
			    <div class="heading-block custom-heading-block" >
			        <h3 class="ColorRed">Order Now</h3>
		        </div>
		        <div class="contact-form-main">
					<form action="<?= base_url('order-inquiry/submit')?>" id="contact-form" method="post" class="omniform" >					
						<!--<span class="form-heding">
							SEND AN ENQUIRY
						</span>-->
						<div class="alert alert-danger error" role="alert">
						</div>
						<div class='clear'></div>
						
						<div class="col_full">
							<input type="text" id="" name="name" placeholder="NAME*" value="<?= set_value('name');?>" class="sm-form-control required" required />
						</div>
						<div class="clear"></div>
						
						<div class="col_full">
							<input type="text" id="" name="companyname" placeholder="COMPANY NAME*" value="<?= set_value('companyname');?>" class="sm-form-control required" required >
						</div>
						<div class="clear"></div>
						
						<div class="col_full">
							<input type="email" id="" name="email" placeholder="EMAIL*" value="<?= set_value('email');?>" class="sm-form-control required email" required >
						</div>
						<div class="clear"></div>

						<div class="col_full">
							<input type="text" id="" name="mobile" placeholder="PHONE" value="<?= set_value('mobile');?>" class="sm-form-control">
						</div>
						<div class="clear"></div>
        
						<div class="col_full">
							<input type="text" id="" name="addresslocation" placeholder="ADDRESS/LOCATION" value="<?= set_value('addresslocation');?>" class="sm-form-control">
						</div>
						<div class="clear"></div>
						
						<div class="col_full">
							<textarea class="required sm-form-control" id="" name="message" placeholder="INQUIRY"><?= set_value('message');?></textarea>
						</div>
						<div class="clear"></div>
					
						<div class="col_full">
						    <div class="iamalabel-wrapper">
    						    <label class="iamalabel">I am a</label>
    							<label class="iamalabel" for='wholesaler'>Wholesaler <input type="checkbox" id="wholesaler" name="wholesaler" class=""></label>
    							<label class="iamalabel" for='retailer'>Retailer <input type="checkbox" id="retailer" name="retailer" class=""></label>
							</div>
						</div>
						<div class="clearfix"></div>

						<div class="col_full hidden">
							<input type="text" id="phone" name="phone" value="" class="sm-form-control" />
							<input type="hidden" id="current_page" name="current_page" value="<?= current_url(); ?>">
							
                            <input type="text" id="g-recaptcha" name="g-recaptcha" value="" />
                            <input type="text" id="g-recaptcha-action" name="g-recaptcha-action" value="" />
						</div>
						<div class="clear"></div>

						<div class="col_full">
						    <div class="d-flex justify-content-between align-items-center">
							<button class="button nomargin submit" name="submit" type="submit" id="submit" value="Send">Submit</button>
							<span class="required-field"><i>*Required field</i></span>
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="alert alert-success result" role="alert"></div>
					</form>
				</div>
			</div>
		
		</div>
	</div>
</div>
<style>
    
    .mfp-container .block{
    	background-color: #FFF;
    	max-width: 600px;
    }
    .mfp-container .post-image{
    	background-repeat:no-repeat;
    	background-size:cover;
    	background-position: center center;
    	height:400px;
    	width:100%;
    }
    .mfp-container .heading-block{
    	margin-bottom: 10px !important;
    	padding : 10px 0;
    }
    .mfp-container .mp-body{
    	padding: 20px 50px;
    }
    .mfp-close { color: #000; }
    
    @media only screen and (max-width: 576px){
    	.mfp-container .block{
    		background-color: #FFF;
    		max-width: 350px;
    	}
    	.mfp-container .heading-block{
    		margin-bottom: 0 !important;
    		padding-top: 10px;
    	}
    	.mfp-container .post-image{height:250px;}
    
    	.mfp-container .mp-body{
    		padding: 20px 20px;
    	}
    }
</style>
<style>
    .mfp-wrap.carbonNeutralPopUp{}
    /*.mfp-wrap.carbonNeutralPopUp .mfp-content{vertical-align: top;}*/
    /*.mfp-wrap.carbonNeutralPopUp .block{margin-right:0 !important;margin-top:6px;}*/
    .mfp-container #carbonNeutralPopUp .block{
    	background-color: #FFF;
    	max-width: 300px;
    }
    .mfp-container #carbonNeutralPopUp .mp-body{
    	padding: 15px 20px;
    }
    .mfp-container #carbonNeutralPopUp .mp-body .heading-block h3 {
      font-size: 1.9rem;
    }
    .mfp-container #carbonNeutralPopUp .mp-body .popuplogoimage{
    	height: 38px;
        margin: auto 5px;
    }
    
</style>
<a href="#orderNowForm" data-lightbox="inline"  href="#" Class="floating-ordernow"><img src="<?= base_url('assets/img/landing-pages/ordernowbutton.webp')?>" /><!--<span>Click Here to</span>ORDER NOW--></a>
<style>
    .floating-ordernow{
        position: fixed;
        bottom: 80px;
        right: 30px;
        background-color: #da2224;
        border-radius: 50%;
        width: 100px;
        height: 100px;
        /*padding: 15px;*/
        color: #fff;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-flow:column wrap;
        z-index:101;
        font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important;
        font-weight: 500 !important;
        line-height: 1.1;
        font-size: 19px;
        text-align: center;
        border: 1px solid rgba(0,0,0,0.12);
    }
    .floating-ordernow span{
        margin-bottom: 4px;
        font-size: 9px;
        font-family: 'Lato',sans-serif;
        border-bottom: 1px solid #fff;
        padding-bottom: 4px;
        text-transform: uppercase;
    }
    .floating-ordernow:hover{
        background-color: #da2224;
        color: #fff;
    }
</style>