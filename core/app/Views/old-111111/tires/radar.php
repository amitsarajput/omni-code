<?php 
	$car_cuv_suv=array();
	$suv_four_x_four=array();
	$van_trailer=array();
	$classic=array();
	$field_to_filter='search_tag';
	if ($tyres) {
		foreach ($tyres as $tyre) {
			if ($tyre[$field_to_filter]=='car/cuv/suv') {
				array_push($car_cuv_suv, $tyre);
			}elseif ($tyre[$field_to_filter]=='suv/4X4') {
				array_push($suv_four_x_four, $tyre);
			}elseif ($tyre[$field_to_filter]=='van/trailer') {
				array_push($van_trailer, $tyre);
			}elseif ($tyre[$field_to_filter]=='classic') {
				array_push($classic, $tyre);
			}
		}
	}
	$brand_slug="radar/";
	//print_r(array_shift($tyres));
?>


<!-- Page Title
============================================= -->
<section id="slider" class="slider-element swiper_wrapper home-slider main-slider-home full-screen clearfix">
	<div class="slider-parallax-inner">
		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">
			    
						
			    <div  class="swiper-slide dark" style="background-image: url(<?= base_url('assets/img/home-page-banner-premium-collection-tyres.webp') ?>);">
					<div class="container clearfix">
						<div class="slider-caption slider-caption-center">
							<h2>&nbsp;</h2>
							<p class="">&nbsp;</p>
						</div>
					</div>
				</div>
			    
			    <a href="<?= base_url('radar/renegade-at-sport'); ?>" class="swiper-slide  dark lozad-background" data-background-image="<?= base_url('assets/img/radar-row-banner-renegade-at-sport.webp') ?>">
					<div class="container clearfix">
						<div class="slider-caption slider-caption-center">
							<h2>&nbsp;</h2>
							<p class="">&nbsp;</p>
						</div>
					</div>
				</a>
				<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/brand-page-banner.webp');?>">
					<div class="container clearfix"></div>
				</div>
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
					<div class="product-cat-nav product-cat-nav2 non-us-fillter ">
						<div class="container clearfix">
						  <ul class="tab-nav tab-nav2  brand-tabs clearfix radar-brand-list tabswfixed">
							<li><a href="#tabs-carcuvsuv"><i class="omniicon-car-3"></i>CAR/CUV/SUV</a></li>
			                <li><a href="#tabs-suv4x4"><i class="omniicon-suv"></i>SUV/4X4</a></li>
			                <li><a href="#tabs-vantrailer"><i class="omniicon-van-trailer"></i>VAN/TRAILER</a></li>
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
											<h2 class="product-title"><a class="ColorRed" href="<?= base_url($brand_slug.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
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
												<a href="<?= base_url($brand_slug.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													data-src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" 
													alt="Radar Tyre"
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

							<div class="tab-content clearfix" id="tabs-suv4x4">
								
								<?php $totaltyres=count($suv_four_x_four); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($suv_four_x_four as $tyre) { ?>
										<div class="col-md-6">
										<div class="brand-product-item center <?= $tyre['premium_tyre']!==null ?'premium-tyre':'' ?>">
											<h2 class="product-title"><a class="ColorRed" href="<?= base_url($brand_slug.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
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
												<a href="<?= base_url($brand_slug.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													data-src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" 
													alt="Radar Tyre"
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
								
								<?php $totaltyres=count($van_trailer); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($van_trailer as $tyre) { ?>
										<div class="col-md-6">
										<div class="brand-product-item center <?= $tyre['premium_tyre']!==null ?'premium-tyre':'' ?>">
											<h2 class="product-title"><a class="ColorRed" href="<?= base_url($brand_slug.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
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
												<a href="<?= base_url($brand_slug.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													data-src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" 
													alt="Radar Tyre"
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
											<h2 class="product-title"><a class="ColorRed" href="<?= base_url($brand_slug.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
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
												<a href="<?= base_url($brand_slug.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													data-src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" 
													alt="Radar Tyre"
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

		<section class="ptlg limit-space">
		    <div class="container limilt-section bottommargin-sm">
		      <div class="row clearfix center">
		        <div class="col-lg-12">
		          <div class="heading-block about-sub-hd custom-heading-block">
		            <h2 class="ColorBlack font-s30">LIMITED WARRANTY</h2>
		          </div>
		          <p class="center lead18 bottommargin" style="line-height: 24px;"><span class="bottommargin-xs" style="display: block; line-height: 24px;">Radar Tyres offers a Limited Warranty on all its products. <br>
		            Click on the below links to view the complete warranty information:</span>
		            <a class="blue" href="<?= base_url('limited-warranty-radar'); ?>">Passenger and Light Truck Tyres - Rest of the World</a> </p>
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
					<div class="offset-lg-3 col-lg-6"> <a href="<?= base_url('motorsport'); ?>">
						<div class="pro-img-bar"> 
						<img 
						src="<?= base_url('assets/img/products/motorsports.webp');?>" 
						alt="Motorsports" 
						class="lozad" />
							<div class="img-overflow"> <span>Motorsports</span> </div>
						</div>
					</a> </div>
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
						<div class="pro-img-bar lozad"> 
						<img 
						data-src="<?= base_url('assets/img/products/social-responsibility.webp'); ?>" 
						alt="Social Responsibility" 
						class="lozad" />
							<div class="img-overflow"> <span>Social Responsibility</span> </div>
						</div>
					</a> </div>
					<!--<div class="col-lg-6"> <a href="<?= base_url('environmental-responsibility'); ?>">
						<div class="pro-img-bar lozad"> 
						<img 
						data-src="<?= base_url('assets/img/products/environmental-responsibility.webp'); ?>" 
						alt="Environmental Responsibility" 
						class="lozad" />
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