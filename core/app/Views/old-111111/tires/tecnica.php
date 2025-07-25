<?php 
	$car_suv=array();
	$van=array();
	$field_to_filter='search_tag';
	if ($tyres) {
		foreach ($tyres as $tyre) {
			if ($tyre[$field_to_filter]=='car/suv') {
				array_push($car_suv, $tyre);
			}elseif ($tyre[$field_to_filter]=='van') {
				array_push($van, $tyre);
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
				<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/tecnica-brand-banner.webp');?>" >
					<div class="container clearfix">
						<div class="slider-caption slider-caption-center custom-slider">
							<h2 data-animate="fadeInUp"><img class="lozad" data-src="<?= base_url('assets/img/tecnica-banner-title.webp');?>" alt="" width="500"></h2>
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

		<!--<section id="full-width" class="full-section  ptlg pblg graycolor text-justify">
			<div class="container clearfix">
				<div class="row">

					<div class="col-lg-6">
						<p class="bottommargin-xs">American Tourer is a dedicated brand of passenger car and SUV tires that has been specifically designed for the needs of the American drivers. This brand offers a variety of fitments that fit popular passenger cars and SUVs.</p>
						<p>The engineers at American Tourer are committed to attaining the highest performance, durability and manufacturing quality standards.</p>
					</div>

					<div class="col-lg-6">
						<p> Our Research and Development team implements its own stringent quality control processes that are audited both internally and externally. The manufacturing locations are amongst the most sophisticated in the world and have been accredited with the following international quality standards: ISO 9001:2016, ISO 14001:2004 and DOT.</p>
					</div>

				</div>
			</div>
		</section>-->

      	<section id="full-width" class="full-section ptlg brand-tabs-section american-tourer-brand">

			<div class="heading-block  center custom-heading-block pro-page-hd brand-fillter">
				<h2 class="ColorBlack">Product Range</h2>
			</div>

			<div class="product-catalog">

				<div class="tabs clearfix" id="tab-3">
					<div class="product-cat-nav product-cat-nav2">
						<div class="container clearfix">
							<ul class="tab-nav tab-nav2 brand-tabs BlueSec american-fillter center clearfix">
								<li style="float: none;"><a href="#tabs-carsuv"><i class="omniicon-car-3"></i>CAR/SUV</a></li>
								<li><a href="#tabs-van"><i class="omniicon-van-trailer"></i>VAN</a></li>
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
											<h2 class="product-title"><a class="ColorBlack" href="<?= base_url('tecnica/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
											<?php 
    										$pmeta=array();
    										if($tyre['tc_id']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['ter_cat_id']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta"><?= implode(" | ", $pmeta); ?></div>
											<div class="product-image">
												<a href="<?= base_url('tecnica/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													class="lozad" 
													data-src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" 
													alt="Tecnica" />
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

							<div class="tab-content clearfix" id="tabs-van">
								
								<?php $totaltyres=count($van); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($van as $tyre) { ?>
									<div class="col-md-6">
										<div class="brand-product-item center">
											<h2 class="product-title"><a class="ColorBlack" href="<?= base_url('tecnica/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
											<?php 
    										$pmeta=array();
    										if($tyre['tc_id']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['ter_cat_id']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta"><?= implode(" | ", $pmeta); ?></div>
											<div class="product-image">
												<a href="<?= base_url('tecnica/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													class="lozad" 
													data-src="<?= base_url('uploads/tire_images/'.$tyre_image['featured']); ?>" 
													alt="Tecnica" />
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
							All Tecnica tyres come with a Limited Warranty.<br> For details <a class="red" href="<?= base_url('limited-warranty-tecnica'); ?>">click here</a>.
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
<style>
	.product-catalog .tabs .tab-container .tab-content {padding-top: 40px; } 
	.brand-tabs-section ul.BlueSec li.ui-state-active a{color: #DA2224 !important;}
</style>