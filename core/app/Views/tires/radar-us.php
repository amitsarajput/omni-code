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
		}
	}
?>

<style>
    .fillter-bar .container .main-search-bar {max-width: 100%;}
	form#mapsearchform{}
	.main-search-bar .form-row .inputs, .main-search-bar .form-row .buttons{ display: flex; justify-content: flex-start; flex-direction: row; flex-wrap: wrap;}
	.main-search-bar .form-row .inputs .form-group{margin-right:10px;width: 48%;}
	.main-search-bar .form-row .inputs .form-group:last-child{margin-right: 0;}
	.main-search-bar .form-row .buttons{margin-top: 30px;}
	.main-search-bar .form-row .buttons .formbutton.text .ortext{text-transform: uppercase; margin-top: 10px; }
	.main-search-bar .form-row .buttons .formbutton{margin-right:10px;}
	#side_bar{ display: -webkit-flex;	display: -ms-flex;	display: flex;	-webkit-flex-wrap: wrap;	-moz-flex-wrap: wrap;	-ms-flex-wrap: wrap;	-o-flex-wrap: wrap; flex-wrap: wrap;	justify-content: left;}
	#side_bar{ margin-top: 25px; max-height: 350px; overflow: hidden; overflow-y: hidden; overflow-y: auto;}
	#side_bar .main-add{ margin-right: 15px; margin-bottom: 15px; border: 1px solid #eee; padding: 15px; border-radius: 0;max-width: 300px;}
	#side_bar .main-add ul{ margin-bottom: 0;}
	.info-row-withicon{padding-left: 20px;line-height: 18px;display: flex;margin-bottom: 3px;font-weight: 400;}
	.info-row-withicon.direction-row{margin-top:2px; margin-bottom: 0;}
	.info-row-withicon.link-onmap-row{margin-top:5px;}
	.info-row-withicon.direction-row .direction-distance{margin-left:auto;}
	.info-row-withicon:last-child{margin-bottom: 0;}
	.info-row-withicon i{margin-left: -20px;font-size: 16px; color: #DA2224;min-width: 18px;width: 18px;max-width: 18px;margin-right: 2px;}
	
	@media screen and (max-width: 576px) {
		.main-search-bar .form-row .inputs .form-group,.main-search-bar .form-row .buttons .formbutton{margin-right:0;width: 100%;}
		.main-search-bar .form-row .buttons{margin-top: 15px;}
		.main-search-bar .form-row .buttons .button,.main-search-bar .form-row .buttons .text{width: 100%; text-align: center;}
		#side_bar .main-add{width: 100%;margin-right: 0;}
	}
</style>
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


<!-- Page Title
============================================= -->

<section id="slider" class="slider-element swiper_wrapper home-slider main-slider-home full-screen clearfix" data-autoplay="7000" data-speed="650" data-loop="false">
	<div class="slider-parallax-inner">
		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">
			    
				<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/radar-us-banner-premium-collection-1.webp');?>" >
					<div class="container clearfix">
						<div class="slider-caption slider-caption-center">
							<h2>&nbsp;</h2>
							<p class="">&nbsp;</p>
						</div>
					</div>
				</div>
			    
			    <a href="<?= base_url('radar-us/us-renegade-x');?>" class="swiper-slide  dark lozad-background" data-background-image="<?= base_url('assets/img/radar-us-banner-renegade-x.webp') ?>">
					<div class="container clearfix">
						<div class="slider-caption slider-caption-center">
							<h2>&nbsp;</h2>
							<p class="">&nbsp;</p>
						</div>
					</div>
				</a>
			    
			    <a href="<?= base_url('radar-us/us-all-season-ev');?>" class="swiper-slide  dark lozad-background" data-background-image="<?= base_url('assets/img/radar-us-banner-all-season-ev-1.webp') ?>">
					<div class="container clearfix">
						<div class="slider-caption slider-caption-center">
							<h2>&nbsp;</h2>
							<p class="">&nbsp;</p>
						</div>
					</div>
				</a>
			    
			    <!--<a href="<?= base_url('radar-us/us-dimax-as9'); ?>" class="swiper-slide  dark lozad-background" data-background-image="<?= base_url('assets/img/radar-us-dimax-as9-us-banner.webp') ?>">
					<div class="container clearfix">
						<div class="slider-caption slider-caption-center">
							<h2>&nbsp;</h2>
							<p class="">&nbsp;</p>
						</div>
					</div>
				</a>-->
				<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/homepage-banner-tire.webp')?>" >
					<div class="container clearfix">
						<div class="slider-caption slider-caption-center">
							<h2>Radar Tires</h2>
							<p class="">View Our Product Range</p>
							<!--<a class="btn radar-button" href="<?= base_url('north-america-dealer-locator')?>">Click Here</a>-->
						</div>
					</div>
				</div>
				<!--<div class="swiper-slide dark" style="background-image: url(<?= base_url('assets/img/radarus-banner-meangreen.jpg');?>);">
					<div class="container clearfix"></div>
				</div>
				<div class="swiper-slide dark" style="background-image: url(<?= base_url('assets/img/radarus-banner-green-treadmark.jpg');?>);">
					<div class="container clearfix"></div>
				</div>
				<div class="swiper-slide dark" style="background-image: url(<?= base_url('assets/img/radarus-banner-jodicarbonneutral.jpg');?>);">
					<div class="container clearfix"></div>
				</div>
				<div class="swiper-slide dark" style="background-image: url(<?= base_url('assets/img/Warranty-Banner.jpg');?>);">
					<div class="container clearfix"></div>
				</div>-->
			</div>
			<div class="swiper-pagination"></div>
		    <a href="#" data-scrollto="#content" data-offset="70" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>
			
		</div>
	</div>
</section><!-- #page-title end -->


<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">

		<section id="full-width" class="full-section  ptlg pblg graycolor text-justify">
			<div class="container clearfix">
				<div class="row">
					<div class="col-lg-6">
					    <p>Radar Tires is the flagship brand of Omni United and offers a unique value proposition in its segment. In the passenger and light truck segment the brand offers a vast and varied range of tires that are made for all seasons, applications and different types of vehicles that cater to different requirements and interests of drivers.</p>
					    <p>Radar Tires are designed in Singapore by our in-house design team and utilize the latest equipment, materials and manufacturing processes. This makes our fitments universal, so drivers can choose the right set of tires for their unique driving styles and requirements, knowing that these choices are backed by world-class engineering and manufacturing capabilities.</p>
						<!--<p>Radar Tires is the flagship brand of Omni United and offers a unique value proposition in its segment. In the passenger and light truck segment the brand offers a vast and varied range of tires that are made for all seasons, applications and different types of vehicles that cater to different requirements and interests of drivers.</p>
						<p>Radar Tires are designed in Singapore by our in-house design team and utilize the latest equipment, materials and manufacturing processes. This makes our fitments universal, so drivers can choose the right set of tires for their unique driving styles and requirements, knowing that these choices are backed by world-class engineering and manufacturing capabilities.</p>-->
					</div>
					<div class="col-lg-6">
					    <p>Being one of the most reliable brands in the market, Radar Tires are manufactured in compliance with the highest regulatory certifications and utilize PAH-free oils in their compounds to comply with stringent European standards. In addition to this, the brand has always been committed to being socially responsible and has been manufactured carbon neutral since 2013. Radar Tires has also supported the Breast Cancer Research Foundation (BCRF) since 2011 and to date has donated close to $1.4 million, funding close to 28,000 hours of critical life-saving research.</p>
						<!--<p>Being one of the most reliable brands in the market, Radar Tires are manufactured in compliance with the highest regulatory certifications and utilize PAH-free oils in their compounds to comply with stringent European standards. In addition to this, the brand has always been committed to being socially responsible and has been manufactured carbon neutral since 2013. Radar Tires has also supported the Breast Cancer Research Foundation (BCRF) since 2011 and to date has donated over $1.15 million, funding over 23,000 hours of critical life-saving research.</p>-->
					</div>
				</div>
			</div>
		</section>

      	<section id="full-width" class="full-section ptlg brand-tabs-section radar-brand-page us-radar-brand">
	      	<div class="heading-block  center custom-heading-block pro-page-hd brand-fillter">
	        	<h2 class="ColorBlack">Search by</h2>
	      	</div>

			<div class="product-catalog">

				<div class="tabs clearfix" id="tab-3">
					<div class="product-cat-nav product-cat-nav2 non-us-fillter ">
						<div class="container clearfix">
						  <ul class="tab-nav tab-nav2  brand-tabs clearfix radar-brand-list">
							<li><a href="#tabs-carcuvsuv"><i class="omniicon-car-3"></i>CAR/CUV/SUV</a></li>
							<li><a href="#tabs-suvlighttruck"><i class="omniicon-light-truck-2"></i>SUV/Light Truck</a></li>
							<li><a href="#tabs-vantrailer"><i class="omniicon-van-trailer"></i><span class="">VAN/TRAILER</span></a></li>
			                <li><a href="#tabs-classic"><i class="omniicon-classic-mini"></i>CLASSIC</a></li>
						  </ul>
						</div>
				  	</div>

					<div class="tab-container">
						<div class="container clearfix">

							<div class="tab-content clearfix" id="tabs-carcuvsuv">
								<?php $totaltyres=count($car_cuv_suv); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($car_cuv_suv as $tyre) { ?>
									<div class="col-md-6">
										<div class="brand-product-item center <?= $tyre['premium_tyre']!==null ?'premium-tyre':'' ?>">
											<h2 class="product-title"><a class="ColorRed" href="<?php echo base_url($tyre['brand_slug'].'/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
											<?php
    										$pmeta=array();
    										if($tyre['category']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['terrain_category']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta ColorBlack"><?= implode(" | ", $pmeta); ?></div>
											
											
											<div class="testfreaks-item" data-product-id="<?php echo $tyre['slug'];?>"></div>
											
											<?php if($tyre['premium_tyre']!==null){ ?>
											    <div class="premium-tyre--badge">PREMIUM COLLECTION</div>
											<?php } ?>
											
											<div class="product-image">
												<a href="<?= base_url($tyre['brand_slug'].'/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													data-src="<?= base_url('storage/tire_images/'.$tyre_image['featured']); ?>" 
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

							<div class="tab-content clearfix" id="tabs-suvlighttruck">
								
								<?php $totaltyres=count($suv_light_truck); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($suv_light_truck as $tyre) {  ?>
										<div class="col-md-6">
										<div class="brand-product-item center  <?= $tyre['premium_tyre']!==null ?'premium-tyre':'' ?>">
											<h2 class="product-title"><a class="ColorRed" href="<?= ($tyre['external_link']===null || $tyre['external_link']==="")?base_url($tyre['brand_slug'].'/'.$tyre['slug']):base_url($tyre['external_link']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
										<?php
    										$pmeta=array();
    										if($tyre['category']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['terrain_category']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta ColorBlack"><?= implode(" | ", $pmeta); ?></div>
											
											<div class="testfreaks-item" data-product-id="<?php echo $tyre['slug'];?>"></div>
											
											<?php if($tyre['premium_tyre']!==null){ ?>
											    <div class="premium-tyre--badge">PREMIUM COLLECTION</div>
											<?php } ?>
											
											<div class="product-image">
												<a href="<?= ($tyre['external_link']===null || $tyre['external_link']==="")?base_url($tyre['brand_slug'].'/'.$tyre['slug']):base_url($tyre['external_link']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													data-src="<?= base_url('storage/tire_images/'.$tyre_image['featured']); ?>" 
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

							<div class="tab-content clearfix" id="tabs-vantrailer">
								
								<?php $totaltyres=count($trailer); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($trailer as $tyre) { ?>
										<div class="col-md-6">
										<div class="brand-product-item center <?= $tyre['premium_tyre']!==null ?'premium-tyre':'' ?>">
											<h2 class="product-title"><a class="ColorRed" href="<?= base_url($tyre['brand_slug'].'/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
											<?php
    										$pmeta=array();
    										if($tyre['category']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['terrain_category']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta ColorBlack"><?= implode(" | ", $pmeta); ?></div>
											
											<div class="testfreaks-item" data-product-id="<?php echo $tyre['slug'];?>"></div>
											
											<?php if($tyre['premium_tyre']!==null){ ?>
											    <div class="premium-tyre--badge">PREMIUM COLLECTION</div>
											<?php } ?>
											
											<div class="product-image">
												<a href="<?= base_url($tyre['brand_slug'].'/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													data-src="<?= base_url('storage/tire_images/'.$tyre_image['featured']); ?>" 
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

							<div class="tab-content clearfix" id="tabs-classic">
								
								<?php $totaltyres=count($classic); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($classic as $tyre) { ?>
										<div class="col-md-6">
										<div class="brand-product-item center <?= $tyre['premium_tyre']!==null ?'premium-tyre':'' ?>">
											<h2 class="product-title"><a class="ColorRed" href="<?= base_url($tyre['brand_slug'].'/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
											<?php
    										$pmeta=array();
    										if($tyre['category']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['terrain_category']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta ColorBlack"><?= implode(" | ", $pmeta); ?></div>
											
											<?php if($tyre['premium_tyre']!==null){ ?>
											    <div class="premium-tyre--badge">PREMIUM COLLECTION</div>
											<?php } ?>
											<div class="product-image">
												<a href="<?= base_url($tyre['brand_slug'].'/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													data-src="<?= base_url('storage/tire_images/'.$tyre_image['featured']); ?>" 
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

		<section class="ptlg graycolor">
			<div class="container limilt-section bottommargin-sm">
				<div class="row clearfix center">
					<div class="col-lg-12">
						<div class="heading-block custom-heading-block">
							<h2 class="ColorBlack">LIMITED WARRANTY</h2>
						</div>
						<p class="center lead18 bottommargin" style="line-height: 24px;"><span class="bottommargin-xs" style="display: block; line-height: 24px;">Radar Tires offers a Limited Warranty on all its products. <br>Click on the below links to view the complete warranty information:</span> <a class="blue" href="<?= base_url('radar-us/limited-warranty'); ?>">Passenger and Light Truck tires - North America</a></p>
					</div>
				</div>
			</div>
		</section>
		
	    
		<section class="whitebg bottommargin">

			<div class="fillter-bar ptlg">
				<div class="container clearfix">
					<div class="heading-block  center custom-heading-block">
						<h2 class="ColorBlack">Dealer Locator – North America</h2>
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
												     <option value="5">5 mile radius</option>
												     <option value="10" selected="selected">10 mile radius</option>
												     <option value="25">25 mile radius</option>
												     <option value="50">50 mile radius</option>
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
								<div class="col-lg-12">
									<div id="map" style="min-width: 100%; min-height: 450px;">
										
									</div>
								</div>
								
								<div id="side_bar" class="col-lg-12"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>

		<!--<section id="full-width" class="full-section clearfix three-product ptlg pblg graycolor">
			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
					<h2 class="ColorBlack">renegade program</h2>
				</div>
				<div class="row clearfix  custom-product">
					<div class="col-lg-6">
						<a href="<?= base_url('motorsport'); ?>">
							<div class="pro-img-bar"> 
								<img 
								data-src="<?= base_url('assets/img/products/motorsports.webp');?>"
								alt="Motorsports"
								class="lozad"  />
								<div class="img-overflow"> <span>Motorsports</span></div>
							</div>
						</a>
					</div>
					<div class="col-lg-6"> 
						<a href="<?= base_url('vehicle-sponsorship-us'); ?>">
							<div class="pro-img-bar">
    							<img 
    							data-src="<?= base_url('assets/img/products/vehicle-sponsorship-radar-us.webp');?>"  
    							alt="Vehicle Sponsorship US"
    							class="lozad"  />
								<div class="img-overflow"> <span>Vehicle Sponsorship</span> </div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>-->

		<div class="ptlg pblg notopmargin nobottommargin pt-lg pb-lg">
			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
					<h2 class="ColorBlack">Responsibility</h2>
				</div>
				<div class="row clearfix featured-responsibilities">
					<div class="offset-lg-3 col-lg-6"> <a href="<?= base_url('social-responsibility'); ?>">
						<div class="pro-img-bar"> 
							<img 
							data-src="<?= base_url('assets/img/products/social-responsibility.webp');?>"  
							alt="Social Responsibility"
							class="lozad"  />
							<div class="img-overflow"> <span>Social Responsibility</span> </div>
						</div>
					</a> </div>
					<!--<div class="col-lg-6"> <a href="<?= base_url('environmental-responsibility'); ?>">
						<div class="pro-img-bar">
							<img 
							data-src="<?= base_url('assets/img/products/environmental-responsibility.webp');?>"  
							alt="Environmental Responsibility"
							class="lozad"  />
							<div class="img-overflow"> <span>Environmental Responsibility</span> </div>
						</div>
					</a> </div>-->
				</div>
			</div>
		</div>

		<section id="full-width" class="full-section clearfix social-bar social-bar2">
			<div class="container clearfix custom-social-bar custom-social-bar2">
				<div class="row clearfix">
					<div class="footer-social-icons">
						<h3> Follow Radar Tires </h3>
						<ul class="main-icons main-icons-2">
						    <li><a target="_blank" href="https://www.youtube.com/@Radartires"><i class="icon-youtube-play"></i></a></li>
							<li><a target="_blank" href="https://www.instagram.com/radartires/"><i class="fa fa-instagram"></i></a></li>
							<li><a target="_blank" href="https://www.facebook.com/radartiresofficial/"><i class="icon-facebook"></i></a></li>
							<li><a target="_blank" href="https://twitter.com/RadarTires"><i class="icon-twitter-x"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		
	</div><!-- content-wrap end -->

</section><!-- content end -->
<a href="https://www.omni-united.com/north-america-dealer-locator" Class="floating-ordernow"><img src="<?= base_url('assets/img/FindADealerNearyouButton.png')?>" /></a>
