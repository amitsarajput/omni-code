 <?php 
	$car_suv=array();
	$suv4x4=array(); 
	$van_cargo=array();
	$classic=array();
	$field_to_filter='search_tag';
	if ($tyres) {
		foreach ($tyres as $tyre) {
			if ($tyre[$field_to_filter]=='car/suv') {
				array_push($car_suv, $tyre);
			}elseif ($tyre[$field_to_filter]=='suv/4X4') {
				array_push($suv4x4, $tyre);
			}elseif ($tyre[$field_to_filter]=='van/cargo') {
				array_push($van_cargo, $tyre);
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
	
	.buyonlinesection{ padding:80px 0; }
	.buyonlinesection .custom-heading-block{margin-bottom: 50px !important;}
	.retailers{display: flex; justify-content: center; align-items: flex-start;flex-direction: row; flex-wrap: wrap;margin-left: -15px; margin-right: -15px;}
	.retailer{max-width:calc( 23% - 20px);min-width: 210px; margin-bottom: 2.75em;margin-left: 10px; margin-right:10px;}
	.retailer img{}
	
	@media screen and (max-width:991px ) {
        .buyonlinesection .retailers{ margin-bottom: -25px; }
		.buyonlinesection .retailers .retailer{ margin-bottom: 25px; }
	}
	@media screen and (max-width: 768px) {
    	.buyonlinesection{ padding:50px 0; }
    	.buyonlinesection .custom-heading-block{margin-bottom: 30px !important;}
        .buyonlinesection .retailers{ margin-bottom: -20px; }
		.buyonlinesection .retailers .retailer{ margin-bottom: 20px; }
	}
</style>


<!-- Page Title
============================================= -->
<section id="slider" class="slider-element swiper_wrapper home-slider main-slider-home full-screen clearfix">
	<div class="slider-parallax-inner">
		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">
			    <div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/radar-eu-banner--premium-collection.webp');?>" >
					<div class="container clearfix"></div>
				</div>
			    <div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/radar-eu-banner--dimax-all-season-winter.webp');?>" >
					<div class="container clearfix"></div>
				</div>
			    <div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/radar-eu-banner--dimax-sport-sprint.webp');?>" >
					<div class="container clearfix"></div>
				</div>
				
				
			    
				<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/radar-eu-banner--carbon-neutral.webp');?>" >
					<div class="container clearfix"></div>
				</div>
				
				
				<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/RadarEU_BCRF-Banner_1920x950.webp');?>" >
					<div class="container clearfix"></div>
				</div>
				
				
			    <!--1<a href="<?= base_url('radar-eu/eu-renegade-at-sport'); ?>" class="swiper-slide  dark lozad-background" data-background-image="<?= base_url('assets/img/radar-eu-banner-renegade-at-sport.webp') ?>">
					<div class="container clearfix">
						<div class="slider-caption slider-caption-center">
							<h2>&nbsp;</h2>
							<p class="">&nbsp;</p>
						</div>
					</div>
				</a>-->
				<!--0<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/RadarEU_Performance-Collection-banner_R8+R8RPX800_1920x950.webp');?>" >
					<div class="container clearfix"></div>
				</div>-->
				<!--1<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/RadarEU_Renegade-Collection-banner_1920x950.webp');?>" >
					<div class="container clearfix"></div>
				</div>-->
				<!--0<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/RadarEU_Winter-Collection-banner_1920x950.webp');?>" >
					<div class="container clearfix"></div>
				</div>-->
				<!--1<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/RadarEU_Classic-Collection-banner_1920x950.webp');?>" >
					<div class="container clearfix"></div>
				</div>-->
				<!--0<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/brand-page-banner.webp');?>" >
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
		              <p>Radar Tyres is a design-driven brand, offering safety, performance and sustainability for all. Our mission is to make premium vehicle ownership accessible to all, by offering fitments with a unique combination of technology and sustainability, designed and engineered without compromise.</p>
		              
		              <p>Distributed in over 80 countries, Radar Tyres offers a wide selection of patterns, fitments and performance attributes. This unique range of choices allows any driver, in collaboration with our skilled global dealer network, to select the perfect fitment for their vehicle and their unique driving requirements.</p>
		            </div>
					<div class="col-lg-6">
		              <p>As part of the Omni United group we have deep rooted values of giving back to society. Radar Tyres has been an active supporter of the Breast Cancer Research Foundation since 2011. Sustainability is another key value and part of our heritage. Radar Tyres has been Manufactured Carbon Neutral since 2013, being ahead of the curve and playing an active role in combating climate change as well as inspiring others to do so.</p>
		            </div>
				</div>
			</div>
		</section>

      	<section id="full-width" class="full-section ptlg brand-tabs-section radar-brand-page non-us-radar-brand">

			<div class="heading-block  center custom-heading-block pro-page-hd brand-fillter">
				<h2 class="ColorBlack">Search by</h2>
			</div>

			<div class="product-catalog">

				<div class="tabs clearfix" id="tab-3">
					<div class="product-cat-nav product-cat-nav2 non-us-fillter eu-fillter">
						<div class="container clearfix">
						  <ul class="tab-nav tab-nav2  brand-tabs clearfix radar-brand-list">
							<li><a href="#tabs-carsuv"><i class="omniicon-car-3"></i>CAR/SUV</a></li>
			                <li><a href="#tabs-suv4x4"><i class="omniicon-suv"></i>SUV/4X4</a></li>
			                <li><a href="#tabs-vancargo"><i class="omniicon-van-trailer"></i>VAN/CARGO</a></li>
			                <li><a href="#tabs-classic"><i class="omniicon-classic-mini"></i>CLASSIC</a></li>
						  </ul>
						</div>
				  	</div>

					<div class="tab-container">
						<div class="container clearfix">

							<div class="tab-content clearfix" id="tabs-carsuv">
								<?php $totaltyres=count($car_suv); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($car_suv as $tyre) { ?>
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
													class="lozad" 
													alt="Radar Tyre" />
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

							<div class="tab-content clearfix" id="tabs-suv4x4">
								
								<?php $totaltyres=count($suv4x4); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($suv4x4 as $tyre) { ?>
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
													class="lozad" 
													alt="Radar Tyre" />
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

							<div class="tab-content clearfix" id="tabs-vancargo">
								
								<?php $totaltyres=count($van_cargo); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($van_cargo as $tyre) { ?>
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
													class="lozad" 
													alt="Radar Tyre" />
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
													class="lozad" 
													alt="Radar Tyre" />
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

		<section class="ptlg limit-space bg-gray">
		    <div class="container limilt-section bottommargin-sm">
		      <div class="row clearfix center">
		        <div class="col-lg-12">
				<div class="heading-block  center custom-heading-block">
					<h2 class="ColorBlack">LIMITED WARRANTY</h2>
				</div>
		          <!--<div class="heading-block about-sub-hd custom-heading-block">
		            <h2 class="ColorBlack font-s30">LIMITED WARRANTY</h2>
		          </div>-->
		          <p class="center lead18 bottommargin" style="line-height: 24px;"><span class="bottommargin-xs" style="display: block; line-height: 24px;">Radar Tyres offers a Limited Warranty on all its products. <br>
		            Click on the below links to view the complete warranty information:</span>
		            <a class="blue" href="<?= base_url('radar-eu/limited-warranty'); ?>">Passenger and Light Truck Tyres - Europe</a> </p>
		        </div>
		      </div>
		    </div>
		</section>
		
	    
		<section class="whitebg bottommargin">

			<div class="fillter-bar ptlg">
				<div class="container clearfix">
					<div class="heading-block  center custom-heading-block">
						<h2 class="ColorBlack">Dealer Locator - Europe</h2>
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
												     <option value="5">5 kilometre radius</option>
												     <option value="10" >10 kilometre radius</option>
												     <option value="25" selected="selected">25 kilometre radius</option>
												     <option value="50">50 kilometre radius</option>
												     <option value="100">100 kilometre radius</option>
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

		<!--<section id="full-width" class="full-section clearfix buyonlinesection bg-gray ptlg pblg">
			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
    				<h2 class="ColorBlack">Buy Radar Tyres Online</h2>
				</div>
				<div class="mx-auto" style="max-width: 880px;">
					<div class="retailers clearfix">
						<div class="retailer">
							<a target="_blank" href="https://lovetyres.com/brand/Radar">
									<img class="lozad" data-src="<?= base_url('assets/img/retailerslogo/love-tyres.webp');?>" alt="" width="250">
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>-->
		
		<section class="buyonlinesection ">
			<div class="container clearfix">
				<!--<div class="heading-block  center custom-heading-block">
					<h2>Still Can’t Find Us?</h2>
				</div>-->
				<div class="heading-block  center custom-heading-block">
						<h2 class="ColorBlack">Still Can’t Find Us?</h2>
					</div>
				
				<!--<div class="heading-block center subheading">
    				<h2>Still Can’t Find Us?</h2>
				</div>-->
				<div class="row clearfix">
					<div class="col-lg-12">
						<div class="main-form-landing">
						<form name="dealerform" class="omniform" action="<?= base_url('dealerlocatorformeurope/submit');?>" id="dealerform" method="POST">					
						<p class="form-text">
							If you still can’t find a dealer near you or if you may need any additional information from us on sizes, specifications or anything else, please get in touch with us via the below form and we will get back to you as soon as we can. 
						</p>
						<div class="col_one_third">
							<input type="text" id="name" name="name" placeholder="Name*" value="" class="sm-form-control required">
						</div>
						<div class="col_one_third">
							<input type="email" id="email" name="email" placeholder="Email*" value="" class="sm-form-control required email">
						</div>

						<div class="col_one_third col_last">
							<input type="text" id="location" name="location" placeholder="Location*" value="" class="sm-form-control required">
						</div>
						<div class="clearfix"></div>

						<div class="col_full hidden">
							<input type="text" id="phone" name="phone">
							<input type="hidden" id="current_page" name="current_page" value="<?= current_url(); ?>">
                            <input type="text" id="g-recaptcha" name="g-recaptcha" value="" />
                            <input type="text" id="g-recaptcha-action" name="g-recaptcha-action" value="" />
						</div>
						<div class="clearfix"></div>

						<div class="col_full">
							<textarea class="required sm-form-control" id="message" name="message" placeholder="Message" rows="6" ></textarea>
						</div>

						<div class="clearfix"></div>

						<div class="col_full">
							<button class="button nomargin submit" type="submit" id="submit" name="submit" value="submit">Submit</button><br>
							<small class="mandatory">*Required Fields</small>
						</div>
						<div class="result"></div>
						<div class="error"></div>
						</form>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</section>
		
		

		<div class="ptlg pblg notopmargin nobottommargin pt-lg pb-lg  graycolor">
			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
					<h2 class="ColorBlack">Responsibility</h2>
				</div>
				<div class="row clearfix featured-responsibilities">
					<div class="col-lg-6"> <a href="<?= base_url('social-responsibility'); ?>">
						<div class="pro-img-bar"> 
						<img 
						data-src="<?= base_url('assets/img/products/social-responsibility.webp'); ?>" 
						alt="Social Responsibility" 
						class="lozad" />
							<div class="img-overflow"> <span>Social Responsibility</span> </div>
						</div>
					</a> </div>
					<div class="col-lg-6"> <a href="<?= base_url('environmental-responsibility'); ?>">
						<div class="pro-img-bar"> 
						<img 
						data-src="<?= base_url('assets/img/products/environmental-responsibility.webp'); ?>" 
						alt="Environmental Responsibility" 
						class="lozad" />
							<div class="img-overflow"> <span>Environmental Responsibility</span> </div>
						</div>
					</a> </div>
				</div>
			</div>
		</div>
		

		<!--<section id="full-width" class="full-section clearfix three-product ptlg pblg">
			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
					<h2 class="ColorBlack">renegade program</h2>
				</div>
				<div class="row clearfix  custom-product">
					<div class="offset-lg-3 col-lg-6"> <a href="<?= base_url('motorsport'); ?>">
						<div class="pro-img-bar"> 
						<img 
						data-src="<?= base_url('assets/img/products/motorsports.webp');?>" 
						alt="Motorsports" 
						class="lozad" />
							<div class="img-overflow"> <span>Motorsports</span> </div>
						</div>
					</a> </div>
					
				</div>
			</div>
		</section>-->

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