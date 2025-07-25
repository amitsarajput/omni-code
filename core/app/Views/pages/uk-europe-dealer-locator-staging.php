<!--Page Title
============================================= -->
<style>

	#page-title{display:flex; justify-content:center;align-items:center;}
	#page-title h1{font-size:3rem;}
	.custom-heading-block{margin-top:30px;margin-bottom: 70px !important;}
	.heading-block{margin-bottom: 70px !important;}
	.buyonlinesection{ padding:80px 0; }
	.buyonlinesection .custom-heading-block{margin-bottom: 50px !important;}
	.retailers{display: flex; justify-content: center; align-items: center;flex-direction: row; flex-wrap: wrap;margin-left: -15px; margin-right: -15px;}
	.retailer{max-width:calc( 23% - 20px);min-width: 210px; margin-bottom: 2.75em;margin-left: 10px; margin-right:10px;}
	.retailer img{}
	.swiper-slide{ background-color: #000; background-size:  contain!important; }
	.swiper-slide.slide-1{ background-image: url(<?= base_url('assets/img/landing-pages/radar-landing-banner-image-1-laptop.jpg');?>); }
	.swiper-slide.slide-2{ background-image: url(<?= base_url('assets/img/landing-pages/radar-landing-banner-image-2-laptop.jpg');?>); }
	.swiper-slide.slide-3{ background-image: url(<?= base_url('assets/img/landing-pages/radar-landing-banner-image-3-laptop.jpg');?>); }
	.swiper-slide.slide-4{ background-image: url(<?= base_url('assets/img/landing-pages/radar-landing-banner-image-4-laptop.jpg');?>); }
	.brand-tabs-section .tirerow { border-bottom: 1px solid #aaa; margin-bottom: 120px; }
	.brand-tabs-section .tirerow:last-child, .brand-tabs-section .tab-container .tab-content .row:last-child { margin-bottom: 0; }
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

	.main-footer #copyrights{padding: 9px 0 10px !important;}
	.mandatory{margin-top:10px; display:block;}
	@media screen and (max-width:991px ) {
        .custom-heading-block,.heading-block.subheading{margin-bottom: 30px !important;}
        .buyonlinesection .retailers{ margin-bottom: -25px; }
		.buyonlinesection .retailers .retailer{ margin-bottom: 25px; }
	}
	@media screen and (max-width:768px ) {
		.swiper-slide{
			background-size: contain!important;
		}
		.swiper-slide.slide-1{ background-image: url(<?= base_url('assets/img/landing-pages/radar-landing-banner-image-1-ipad.jpg');?>); }
		.swiper-slide.slide-2{ background-image: url(<?= base_url('assets/img/landing-pages/radar-landing-banner-image-2-ipad.jpg');?>); }
		.swiper-slide.slide-3{ background-image: url(<?= base_url('assets/img/landing-pages/radar-landing-banner-image-3-ipad.jpg');?>); }
		.swiper-slide.slide-4{ background-image: url(<?= base_url('assets/img/landing-pages/radar-landing-banner-image-4-ipad.jpg');?>); }
		.product-catalog .product-cat-nav .tab-nav li{margin-left: 0 !important;}
	}
	@media screen and (max-width: 767px) {
		.swiper-slide{
			background-size: contain!important;
		}
		.swiper-slide.slide-1{ background-image: url(<?= base_url('assets/img/landing-pages/radar-landing-banner-image-1-mobile.jpg');?>); }
		.swiper-slide.slide-2{ background-image: url(<?= base_url('assets/img/landing-pages/radar-landing-banner-image-2-mobile.jpg');?>); }
		.swiper-slide.slide-3{ background-image: url(<?= base_url('assets/img/landing-pages/radar-landing-banner-image-3-mobile.jpg');?>); }
		.swiper-slide.slide-4{ background-image: url(<?= base_url('assets/img/landing-pages/radar-landing-banner-image-4-mobile.jpg');?>); }
		.brand-tabs-section .tab-container .tab-content .row:last-child .col-md-6:last-child{margin-bottom:0;}
		
	}
	@media screen and (max-width: 768px) {
		.slider-element.swiper_wrapper { border-top: 1px solid #555;}
		.brand-tabs-section .tirerow{
			border-bottom: none;
		    margin-bottom: 0;}
		.brand-tabs-section .tirecolumn {
		    /*border-bottom: 1px solid #aaa;
		    margin-bottom: 120px;*/
		}
    	.buyonlinesection{ padding:50px 0; }
    	.buyonlinesection .custom-heading-block{margin-bottom: 30px !important;}
        .buyonlinesection .retailers{ margin-bottom: -20px; }
		.buyonlinesection .retailers .retailer{ margin-bottom: 20px; }
	}
	@media screen and (max-width: 576px) {
		.swiper-slide{
			height: 300px!important;
		}

		.main-search-bar .form-row .inputs .form-group,.main-search-bar .form-row .buttons .formbutton{margin-right:0;width: 100%;}
		.main-search-bar .form-row .buttons{margin-top: 15px;}
		.main-search-bar .form-row .buttons .button,.main-search-bar .form-row .buttons .text{width: 100%; text-align: center;}
		#side_bar .main-add{width: 100%;margin-right: 0;}
		/*Mobile fix header*/
		#header.transparent-header.full-header.custom-header #header-wrap{height:50px !important;}
		#header.full-header #logo.custom-logo img{height:auto;width:110px;margin-top:0;}
		.custom-logo{top:10px;}
		/*Mobile fix Slider*/
		.slider-element.swiper_wrapper{height: 330px !important;background: #000;}
		.main-slider-home .swiper-pagination{bottom:35px !important;}
		.brand-tabs-section ul.brand-tabs li.ui-tabs-tab{width: 33% !important;}
	}
	
	.img-overflow {
        display: flex;
        justify-content: center;
        align-items: flex-end;
        padding: 15px;
    }
</style>
<!-- <section id="slider" class="slider-element swiper_wrapper home-slider main-slider-home full-screen clearfix" data-autoplay="7000" data-speed="650" data-loop="true">
	<div class="slider-parallax-inner">
		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">
				<div class="swiper-slide dark slide-1" >
					<div class="container clearfix"></div>
				</div>
				<div class="swiper-slide dark slide-2" >
					<div class="container clearfix"></div>
				</div>
				<div class="swiper-slide dark slide-3" >
					<div class="container clearfix"></div>
				</div>
				<div class="swiper-slide dark slide-4" >
					<div class="container clearfix"></div>
				</div>
			</div>
			<div class="swiper-pagination"></div>
		    <a href="#" data-scrollto="#content" data-offset="70" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>
			
		</div>
	</div>
</section> --><!-- #page-title end -->
<!-- Page Title
============================================= -->
<!--<section id="page-title" class="page-title-dark page-title-center skrollable skrollable-between" style="padding: 300px 0; background-image: url(<?= base_url('assets/img/climate-change-banner.jpg') ?>); background-size: cover!important; background-position: center center;" data-bottom-top="background-position:0px 440px;" data-top-bottom="background-position:0px -500px;">

	<div class="container clearfix">
		<h1>Dealer Locator - North America</h1>
	</div>

</section> #page-title end -->

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
	
	    <section class="whitebg bottommargin">

			<div class="fillter-bar ptlg">
				<div class="container clearfix">
					<div class="heading-block  center custom-heading-block">
						<h2>Dealer Locator - Europe</h2>
					</div>
					
					<div class="heading-block center subheading">
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
												     <option value="5">5 kilometre radius</option>
												     <option value="10">10 kilometre radius</option>
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

		<!--<section id="full-width" class="full-section clearfix three-product  buyonlinesection bg-gray">
			<div class="container clearfix">
				<div class="heading-block center subheading">
    				<h2>Buy Radar Tyres Online</h2>
				</div>
				<div class="mx-auto" style="max-width: 880px;">
					<div class="retailers clearfix">
						<div class="retailer">
							<a target="_blank" href="https://www.edentyres.com/radar-tyres/">
									<img class="lozad" data-src="<?= base_url('assets/img/retailerslogo/eden-tyres-servicing.webp');?>" alt="" width="250">
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>-->

		<!--<section class="topmargin bottommargin">
			<div class="mx-auto center" style="max-width:600px;">
				<div class="container clearfix">
					<div class="heading-block  center subheading">
						<h2>Subscribe to our latest updates and offers</h2>
					</div>
					
					<div class="row clearfix">
						<div class="col-lg-12">
							<div class="main-form-landing">
								<form name="subsform" class="omniform" action="<?= base_url('subscribe/submit');?>" id="subsform" method="POST">
									<div class="col_full">
										<input type="text" id="name" name="name" placeholder="Name" value="" class="sm-form-control">
									</div>
									<div class="col_full">
										<input type="email" id="email" name="email" placeholder="Email" value="" class="sm-form-control">
									</div>

									<div class="clearfix"></div>

									<div class="col_full hidden">
										<input type="text" id="phone" name="phone">
									</div>
									<div class="clearfix"></div>

									<div class="col_full">
										<button class="button nomargin submit" type="submit" name="submit" value="submit">Submit</button>
									</div>
									<div class="result"></div>
									<div class="error"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>-->

		<section class="topmargin bottommargin buyonlinesection bg-gray">
			<div class="container clearfix">
				<!--<div class="heading-block  center custom-heading-block">
					<h2>Still Can’t Find Us?</h2>
				</div>-->
				
				<div class="heading-block center subheading">
    				<h2>Still Can’t Find Us?</h2>
				</div>
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

		<section class="" style="padding: 80px 0">
			<div class="container clearfix">
				<!--<div class="heading-block  center custom-heading-block">
					<h2>Write to us</h2>
				</div>-->
				<div class="row clearfix">
					<div class="col-lg-6 offset-lg-3">
					    <div class="heading-block center subheading" style="margin-bottom: 30px !important;">
            				<h2>View our Product Range</h2>
        				</div>
						<div class="pro-img-bar">
							<img class="lozad" data-src="<?= base_url('assets/img/RT+R8+RPX800-Banner.webp') ?>" alt="Omni United Group">
							<div class="img-overflow">
								<a href="<?= base_url('radar-eu') ?>" class="button nomargin">Know More</a>
							</div>
						</div>
					</div>
					<!--<div class="col-lg-6">
					    <div class="heading-block center subheading" style="margin-bottom: 30px !important;">
            				<h2>View our Warranty Coverage</h2>
        				</div>
						<div class="pro-img-bar">
							<img class="lozad" data-src="<?= base_url('assets/img/landing-page-bottom-link2.webp') ?>" alt="Omni United Group">
							<div class="img-overflow">
								<a href="<?= base_url('radar-us/limited-warranty') ?>" class="button nomargin">Know More</a>
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</section>
		
	</div><!-- content-wrap end -->

</section><!-- content end-->