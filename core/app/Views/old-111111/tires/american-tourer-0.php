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
				<div class="swiper-slide dark" style="background-image: url(<?= base_url('assets/img/american-tourer-brand-banner.jpg');?>);">
					<div class="container clearfix">
						<div class="slider-caption slider-caption-center custom-slider">
							<h2 data-animate="fadeInUp"><img src="<?= base_url('assets/img/american-tourer-banner-title.png');?>" alt=""></h2>
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

					<div class="col-lg-6">
						<p>American Tourer is a passenger and light truck tire brand from the house of Omni United. These tires have been engineered for the specific needs of the American driver and offer a wide variety of fitments that fit popular cars, CUVs, SUVs and light trucks. The engineers at American Tourer are committed to attaining the highest performance, durability and manufacturing quality standards.</p>
					</div>

					<div class="col-lg-6">
						<p>Our R&D team implements its own stringent quality control processes that are audited both internally and externally. The manufacturing location is amongst the most sophisticated in the world and has been accredited with international quality standards including ISO 9001:2016, ISO 14001:2004 and DOT.</p>
					</div>

				</div>
			</div>
		</section>

      	<section id="full-width" class="full-section ptlg brand-tabs-section american-tourer-brand">

			<div class="heading-block  center custom-heading-block pro-page-hd brand-fillter">
				<h2 class="ColorBlack">Search by Vehicle Type</h2>
			</div>

			<div class="product-catalog">

				<div class="tabs clearfix" id="tab-3">
					<div class="product-cat-nav product-cat-nav2">
						<div class="container clearfix">
							<ul class="tab-nav tab-nav2 brand-tabs BlueSec american-fillter clearfix">
								<li><a href="#tabs-carsuv"><i class="omniicon-car-3"></i>CAR/SUV</a></li>
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
													<img src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" alt="">
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
													<img src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" alt="">
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

			<div class="container limilt-section bottommargin-sm">
				<div class="row clearfix center">
					<div class="col-lg-12">
						<div class="heading-block about-sub-hd custom-heading-block">
							<h2 class="ColorBlack font-s30">LIMITED WARRANTY</h2>
						</div>
						<p class="center">
							All American Tourer tires come with a Limited Warranty.<br> For details <a class="blue" href="<?= base_url('limited-warranty'); ?>">click here</a>.
						</p>

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