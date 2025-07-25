<?php 
	$car_suv=array();
	$suv_light_truck=array();
	$field_to_filter='search_tag';
	if ($tyres) {
		foreach ($tyres as $tyre) {
			if ($tyre[$field_to_filter]=='car/suv') {
				array_push($car_suv, $tyre);
			}elseif ($tyre[$field_to_filter]=='suv/light-truck') {
				array_push($suv_light_truck, $tyre);
			}
		}
	}
?>


<!-- Page Title
============================================= -->
<section id="slider" class="slider-element swiper_wrapper home-slider full-screen clearfix american-tourer-page">
	<div class="slider-parallax-inner">
		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">
				<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/american-tourer-brand-banner.webp');?>">
					<div class="container clearfix">
						<div class="slider-caption slider-caption-center custom-slider">
							<h2 data-animate="fadeInUp"><img class="lozad" data-src="<?= base_url('assets/img/american-tourer-banner-title.webp');?>" alt=""></h2>
						</div>
					</div>
				</div>
				<a href="#" data-scrollto="#content" data-offset="70" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>
			</div>
		</div>
	</div>
</section>
	<!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">

		<section id="full-width" class="full-section  ptlg pblg graycolor text-justify">
			<div class="container clearfix">
				<div class="row">
				    <div class="mx-auto" style="max-width:867px">
				        <div class="col-lg-12 text-center brand-intro-text" >
				            <p>American Tourer is a design driven brand, offering safe, long lasting and affordable performance. </p>
                            <p>We celebrate the great American open road, delivering a versatile collection of all-season fitments for car, CUV, and SUV drivers.</p>
                            <p>Since the beginning, we’ve proudly stood up for things we believe in most: individuality and personal freedom. This is our purpose and we express it in everything we do. While freedom and individuality mean different things to different people, these are the values that bring us together.</p>
                            <p>American Tourer tires are sold in the US exclusively at PepBoys outlets.</p>
				        </div>
				    </div>

					<!--<div class="col-lg-6 hidden">
						<p class="bottommargin-xs">American Tourer is a dedicated brand of passenger car and SUV tires that has been specifically designed for the needs of the American drivers. This brand offers a variety of fitments that fit popular passenger cars and SUVs.</p>
						<p>The engineers at American Tourer are committed to attaining the highest performance, durability and manufacturing quality standards.</p>
					</div>

					<div class="col-lg-6 hidden">
						<p> Our Research and Development team implements its own stringent quality control processes that are audited both internally and externally. The manufacturing locations are amongst the most sophisticated in the world and have been accredited with the following international quality standards: ISO 9001:2016, ISO 14001:2004 and DOT.</p>
					</div>-->

				</div>
			</div>
		</section>

      	<section id="full-width" class="full-section ptlg brand-tabs-section american-tourer-brand">

			<div class="heading-block  center custom-heading-block pro-page-hd brand-fillter">
				<!--<h2 class="ColorBlack">View our range of<br/>passenger CAR and SUV tires</h2>-->
				<h2 class="ColorBlack">Product Range</h2>
			</div>

			<div class="product-catalog">

				<div class="tabs clearfix" id="tab-3">
					<div class="product-cat-nav product-cat-nav2 hidden">
						<div class="container clearfix">
							<ul class="tab-nav tab-nav2 brand-tabs BlueSec american-fillter center clearfix">
								<li style="float: none;"><a href="#tabs-carsuv"><i class="omniicon-car-3"></i>CAR/SUV</a></li>
								<li><a href="#tabs-suvlighttruck"><i class="omniicon-light-truck-2"></i>SUV/Light Truck</a></li>
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
										<div class="brand-product-item center">
											<h2 class="product-title"><a class="ColorBlue" href="<?= base_url('american-tourer/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
											<?php 
    										$pmeta=array();
    										if($tyre['tc_id']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['ter_cat_id']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta"><?= implode(" | ", $pmeta); ?></div>
											<div class="product-image">
												<a href="<?= base_url('american-tourer/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													class="lozad" 
													data-src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" 
													alt="American Tourer Tire" />
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

							<div class="tab-content clearfix hidden" id="tabs-suvlighttruck">
								
								<?php $totaltyres=count($suv_light_truck); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($suv_light_truck as $tyre) { ?>
									<div class="col-md-6">
										<div class="brand-product-item center">
											<h2 class="product-title"><a class="ColorBlue" href="<?= base_url('american-tourer/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
											<?php 
    										$pmeta=array();
    										if($tyre['tc_id']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['ter_cat_id']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta"><?= implode(" | ", $pmeta); ?></div>
											<div class="product-image">
												<a href="<?= base_url('american-tourer/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													class="lozad" 
													data-src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" 
													alt="American Tourer Tire" />
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

			<!--<div class="container limilt-section bottommargin-sm">
				<div class="row clearfix center">
					<div class="col-lg-12">
						<div class="heading-block about-sub-hd custom-heading-block">
							<h2 class="ColorBlack font-s30">LIMITED WARRANTY</h2>
						</div>
						<p class="center">
							All American Tourer tires come with a Limited Warranty.<br> For details <a class="blue" href="<?= base_url('american-tourer-us/limited-warranty'); ?>">click here</a>.
						</p>

					</div>
				</div>
			</div>-->

		</section>

		<section id="full-width" class="full-section clearfix social-bar social-bar2">
			<div class="container clearfix custom-social-bar custom-social-bar2">
				<div class="row clearfix">
					<div class="footer-social-icons">
						<h3> FOLLOW AMERICAN TOURER </h3>
						<ul class="main-icons main-icons-2">
							<li><a target="_blank" href="https://www.youtube.com/@AmericanTourer"><i class="icon-youtube-play"></i></a></li>
							<!--<li><a target="_blank" href="https://www.instagram.com/radartires/"><i class="fa fa-instagram"></i></a></li>
							<li><a target="_blank" href="https://www.facebook.com/radartiresoffi.social-bar2 .custom-social-bar2 .footer-social-icons h3cial/"><i class="icon-facebook"></i></a></li>
							<li><a target="_blank" href="https://twitter.com/RadarTires"><i class="icon-twitter-x"></i></a></li>-->
						</ul>
					</div>
				</div>
			</div>
		</section>

		<!-- <section id="full-width" class="full-section clearfix social-bar social-bar2">
			<div class="container clearfix custom-social-bar custom-social-bar2">
				<div class="row clearfix">
					<div class="footer-social-icons">
						<h3> Follow Patriot Tires </h3>
						<ul class="main-icons main-icons-2">
							<li><a target="_blank" href="https://www.facebook.com/PatriotTiresOfficial/"><i class="icon-facebook"></i></a></li>
							<li><a target="_blank" href="https://www.instagram.com/patriottires/?hl=en"><i style="font-size: 23px !important;" class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</section> -->
		
	</div><!-- content-wrap end -->

</section><!-- content end -->
<style>
	.product-catalog .tabs .tab-container .tab-content {padding-top: 40px; } 
	.brand-intro-text p{
	    text-align: center !important;
        margin-bottom: 10px !important;
        line-height: 1.4em !important;
	}
	.social-bar2 .custom-social-bar2 {
      max-width: 420px !important;
    }
	.social-bar2 .custom-social-bar2 .footer-social-icons h3 {
      width: 66%;
    }
    .social-bar2 .custom-social-bar2 .footer-social-icons .main-icons {
      width: 15%;
    }
</style>