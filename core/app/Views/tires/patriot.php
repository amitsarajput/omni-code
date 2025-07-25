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
	//print_r($car_suv);
?>


<!-- Page Title
============================================= -->

<section id="slider" class="slider-element swiper_wrapper home-slider full-screen clearfix">
	<div class="slider-parallax-inner">

		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">
				<div class="swiper-slide dark lozad-background" data-background-image="<?= base_url('assets/img/patriot-brand-banner.webp');?>" >
					<div class="container clearfix">
						<div class="slider-caption slider-caption-center custom-slider">
							<h2 data-animate="fadeInUp"><img class="lozad" data-src="<?= base_url('assets/img/patriot-brand-banner-title.webp');?>" alt=""></h2>
							
						</div>
					</div>
				</div>
				
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
				    <div class="mx-auto" style="max-width:1000px">
				        <div class="col-lg-12 text-center brand-intro-text">
				            <p class="" >Patriot Tires is a function driven brand, offering reliability, functionality and affordability.</p>
                            <p class="" >Our mission is to create a unique range of all-wheel drive fitments suited for extreme and demanding conditions.</p>
                            <p class="" >We have drawn our inspiration from the history of the military and its distinct elements. Nothing frivolous, nothing unnecessary, thus, every detail in our tires has its purpose, its function.</p>
                            <p class="" >Patriot Tires are tested in demanding conditions where tires must withstand extreme temperatures, endure harsh and challenging terrains, and sustain heavy impacts and heavy loads. These extreme events are analysed with professionals who are constantly seeking a reliable product for their everyday adventure.</p>
                            <p class="" >Patriot tires are available at select retail outlets and e-commerce stores across the US, Europe and Asia</p>
				        </div>
				    </div>

					<!--<div class="col-lg-6 hidden">
					    <p>Patriot Tires is a function driven brand, offering reliability, functionality and affordability.</p>
					    <p>Our mission is to create a unique range of all-wheel drive fitments suited for extreme and demanding conditions.</p>
					    <p>We have drawn our inspiration from the history of the military and its distinct elements. Nothing frivolous, nothing unnecessary, thus, every detail in our tires has its purpose, its function.</p>
						<p>Patriot Tires was born when a team of tire designers and car enthusiasts joined forces with one mission in mind: To develop a range of tires that are functional, reliable yet affordable. The core of our design philosophy has been based on functionality and we have drawn our inspiration from the distinct elements of the military.</p>
					</div>

					<div class="col-lg-6 hidden">
					    <p>Patriot Tires are tested in demanding conditions where tires must withstand extreme temperatures, endure harsh and challenging terrains, and sustain heavy impacts and heavy loads. These extreme events are analysed with professionals who are constantly seeking a reliable product for their everyday adventure.</p>
					    <p>Patriot tires are available at select retail outlets and e-commerce stores across the US, Europe and Asia</p>
						<p>This brand is designed for enthusiasts that crave a rugged and dependable set of tires they can count on, for both their daily use as well as their adventures. Patriot Tires are manufactured in state-of-the-art factories in Thailand and Taiwan and offer a wide range of passenger and light trucks fitments in multiple applications.</p>
					</div>-->

				</div>
			</div>
		</section>


      	<section id="full-width" class="full-section ptlg brand-tabs-section patriot-brand">

			<div class="heading-block  center custom-heading-block pro-page-hd brand-fillter">
				<!--<h2 class="ColorBlackhidden">View our range of<br/>SUV and Light Truck Tires</h2>-->
				<h2 class="ColorBlack">Product Range</h2>
			</div>

			<div class="product-catalog">

				

				<div class="tabs clearfix" id="tab-3">
					<div class="product-cat-nav product-cat-nav2 hidden">
						<div class="container clearfix">
							<ul class="tab-nav tab-nav2  brand-tabs patriot-fillter clearfix">
								<li><a href="#tabs-suvlighttruck"><i class="omniicon-light-truck-2"></i>SUV/Light Truck</a></li>
								<li><a href="#tabs-carsuv"><i class="omniicon-car-3"></i>CAR/SUV</a></li>
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
											<h2 class="product-title"><a class="ColorGreen" href="<?= base_url('patriot/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
											<?php 
    										$pmeta=array();
    										if($tyre['tc_id']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['ter_cat_id']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta"><?= implode(" | ", $pmeta); ?></div>
											<div class="product-image">
												<a href="<?= base_url('patriot/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													class="lozad" 
													data-src="<?= base_url('storage/tire_images/'.$tyre_image['featured']); ?>" 
													alt="Patriot Tyres" />
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

							<div class="tab-content clearfix" id="tabs-carsuv">
								<?php $totaltyres=count($car_suv); if ($totaltyres > 0) { ?>
								<div class="row clearfix">
								<?php $i=1; foreach ($car_suv as $tyre) { ?>
									<div class="col-md-6">
										<div class="brand-product-item center">
											<h2 class="product-title "><a class="ColorGreen" href="<?= base_url('patriot/'.$tyre['slug']); ?>"><?= htmlspecialchars_decode($tyre['title']); ?></a></h2>
											<?php 
    										$pmeta=array();
    										if($tyre['tc_id']) {array_push($pmeta, $tyre['tc_title']);}
    										if($tyre['ter_cat_id']){
    										    array_push($pmeta, $tyre['ter_cat_title']);
    										}
    										?>
											<div class="product-meta"><?= implode(" | ", $pmeta); ?></div>
											<div class="product-image">
												<a href="<?= base_url('patriot/'.$tyre['slug']); ?>">
													<?php $tyre_image=json_decode( $tyre['image'], $assoc_array = true ) ?>
													<img 
													class="lozad" 
													data-src="<?= base_url('storage/tire_images/'.$tyre_image['featured']); ?>" 
													alt="Patriot Tyres" />
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
							All Patriot tires come with a Limited Warranty.<br> For details <a class="blue" href="<?= base_url('patriot-us/limited-warranty'); ?>">click here</a>.
						</p>

					</div>
				</div>
			</div>

		</section>

		<section id="full-width" class="full-section clearfix social-bar social-bar2">
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
		</section>
		
	</div><!-- content-wrap end -->

</section><!-- content end -->
<style>
	.product-catalog .tabs .tab-container .tab-content {padding-top: 40px; } 
	.brand-intro-text p{
	    text-align: center !important;
        margin-bottom: 10px !important;
        line-height: 1.4em !important;
	}
</style>