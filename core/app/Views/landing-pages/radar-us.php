<!--Page Title
============================================= -->
<style>
    .custom-heading-block{margin-bottom: 50px !important;}
	.buyonlinesection{ padding:80px 0; }
	.buyonlinesection .custom-heading-block{margin-bottom: 50px !important;}
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
	#side_bar{ margin-bottom: 25px;}
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
        .custom-heading-block{margin-bottom: 30px !important;}
		.buyonlinesection .retailers{ margin-bottom: 25px; }
		.buyonlinesection .retailers:last-child{ margin-bottom: 0; }
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
		.buyonlinesection .retailers{ margin-bottom: 20px; }
		.buyonlinesection .retailers:last-child{ margin-bottom: 0; }
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
</style>
<section id="slider" class="slider-element swiper_wrapper home-slider main-slider-home full-screen clearfix" data-autoplay="7000" data-speed="650" data-loop="true">
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
</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">

      	<section id="full-width" class="full-section ptlg brand-tabs-section radar-brand-page us-radar-brand">
	      	<div class="heading-block  center custom-heading-block pro-page-hd">
	        	<h2 class="ColorBlack">VIEW OUR TIRE RANGE</h2>
	      	</div>

			<div class="product-catalog landing-page">
				<div class="tabs clearfix" id="tab-3">
					<div class="product-cat-nav product-cat-nav2 us-fillter">
						<div class="container clearfix">
						  <ul class="tab-nav tab-nav2  brand-tabs clearfix radar-brand-list">
							<li><a href="#tabs-carcuvsuv"><i class="omniicon-car-3"></i>CAR/CUV/SUV</a></li>
							<li><a href="#tabs-suvlighttruck"><i class="omniicon-light-truck-2"></i>SUV/Light Truck</a></li>
							<li><a href="#tabs-classic"><i class="omniicon-classic-mini"></i><span class="">CLASSIC</span></a></li>
						  </ul>
						</div>
				  	</div>
					<div class="tab-container">
						<div class="container clearfix">
							<div class="tab-content clearfix" id="tabs-carcuvsuv">
								<div class="row tirerow clearfix">
									<div class="col-md-6 tirecolumn">
										<div class="brand-product-item center">
											<h2 class="product-title ColorRed">Dimax<sup class="deffont">®</sup> AS-8</h2>
											<div class="product-meta ColorBlack">ALL SEASON | SPORT TOURING</div>
											<div class="product-image">
													<img src="<?= base_url('assets/img/landing-pages/tire-images/Dimax_AS8-us.jpg'); ?>" alt="" width="260">
											</div>
										</div>
									</div>
									<div class="col-md-6 tirecolumn">
										<div class="brand-product-item center">
											<h2 class="product-title ColorRed">Dimax<sup class="deffont">®</sup> AS-6</h2>
											<div class="product-meta ColorBlack">ALL SEASON | TOURING</div>
											<div class="product-image">
													<img src="<?= base_url('assets/img/landing-pages/tire-images/Dimax_AS6-us.jpg'); ?>" alt="" width="260">
											</div>
										</div>
									</div>
								</div>
								<div class="row tirerow clearfix">
									<div class="col-md-6 tirecolumn">
										<div class="brand-product-item center">
											<h2 class="product-title ColorRed">Dimax eSport 1</h2>
											<div class="product-meta ColorBlack">SUMMER | SPORT TOURING</div>
											<div class="product-image">
													<img src="<?= base_url('assets/img/landing-pages/tire-images/Dimax_eSport-US.jpg'); ?>" alt="" width="260">
											</div>
										</div>
									</div>
									<div class="col-md-6 tirecolumn">
										<div class="brand-product-item center">
											<h2 class="product-title ColorRed">Dimax eSport 2</h2>
											<div class="product-meta ColorBlack">SUMMER | SPORT TOURING</div>
											<div class="product-image">
													<img src="<?= base_url('assets/img/landing-pages/tire-images/Dimax_eSport_2-US.jpg'); ?>" alt="" width="260">
												
											</div>
										</div>
									</div>
								</div>
								<div class="row tirerow clearfix">
									<div class="col-md-6 tirecolumn">
										<div class="brand-product-item center">
											<h2 class="product-title ColorRed">Dimax eSport 3</h2>
											<div class="product-meta ColorBlack">SUMMER | SPORT TOURING</div>
											<div class="product-image">
													<img src="<?= base_url('assets/img/landing-pages/tire-images/Dimax_eSport_3-US.jpg'); ?>" alt="" width="238" height="207.117">
											</div>
										</div>
									</div>
									<div class="col-md-6 tirecolumn">
										<div class="brand-product-item center">
											<h2 class="product-title ColorRed">Dimax eTouring 1</h2>
											<div class="product-meta ColorBlack">SUMMER | TOURING</div>
											<div class="product-image">
													<img src="<?= base_url('assets/img/landing-pages/tire-images/Dimax_eTouring_1-US.jpg'); ?>" alt=""  width="238" height="207.117">
												
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-content clearfix" id="tabs-suvlighttruck">
								<div class="row tirerow clearfix">
									<div class="col-md-6 tirecolumn">
										<div class="brand-product-item center">
											<h2 class="product-title ColorRed">Renegade<sup class="deffont">®</sup> A/T Pro</h2>
											<div class="product-meta ColorBlack">ALL SEASON | ALL TERRAIN</div>
											<div class="product-image">
													<img src="<?= base_url('assets/img/landing-pages/tire-images/Renegade_AT-pro-us.jpg'); ?>" alt="" width="238" height="207.117">
											</div>
										</div>
									</div>
									<div class="col-md-6 tirecolumn">
										<div class="brand-product-item center">
											<h2 class="product-title ColorRed">Renegade<sup class="deffont">®</sup> A/T5</h2>
											<div class="product-meta ColorBlack">ALL SEASON | ALL TERRAIN</div>
											<div class="product-image">
													<img src="<?= base_url('assets/img/landing-pages/tire-images/Renegade_AT5-us.jpg'); ?>" alt="" width="238" height="207.117">
											</div>
										</div>
									</div>
								</div>
								<div class="row tirerow clearfix">
									<div class="col-md-6 tirecolumn">
										<div class="brand-product-item center">
											<h2 class="product-title ColorRed">Renegade<sup class="deffont">®</sup> R/T</h2>
											<div class="product-meta ColorBlack">ALL SEASON | RUGGED TERRAIN</div>
											<div class="product-image">
													<img src="<?= base_url('assets/img/landing-pages/tire-images/Renegade_RT-PLUS-us.jpg'); ?>" alt="" width="238" height="207.117">
											</div>
										</div>
									</div>
									<div class="col-md-6 tirecolumn">
										<div class="brand-product-item center">
											<h2 class="product-title ColorRed">Renegade<sup class="deffont">®</sup> R/T</h2>
											<div class="product-meta ColorBlack">ALL SEASON | RUGGED TERRAIN</div>
											<div class="product-image">
													<img src="<?= base_url('assets/img/landing-pages/tire-images/Renegade_RT-PLUS-us.jpg'); ?>" alt="" width="238" height="207.117">
											</div>
										</div>
									</div>
								</div>
								<div class="row tirerow clearfix">
									<div class="col-md-6 tirecolumn">
										<div class="brand-product-item center">
											<h2 class="product-title ColorRed">Renegade<sup class="deffont">®</sup> R7 M/T</h2>
											<div class="product-meta ColorBlack">ALL SEASON | MUD TERRAIN</div>
											<div class="product-image">
													<img src="<?= base_url('assets/img/landing-pages/tire-images/Renegade_R7-us.jpg'); ?>" alt="" width="238" height="207.117">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-content clearfix" id="tabs-classic">
								<div class="row tirerow clearfix">
									<div class="col-md-6 tirecolumn">
										<div class="brand-product-item center">
											<h2 class="product-title ColorRed">Dimax<sup class="deffont">®</sup> Classic</h2>
											<div class="product-meta ColorBlack">SPORT TOURING | CAR</div>
											<div class="product-image">
													<img src="<?= base_url('assets/img/landing-pages/tire-images/Dimax_Classic.jpg'); ?>" alt="" width="238" height="207.117">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>

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

		<section class="topmargin bottommargin">
			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
					<h2>Still Can’t Find Us?</h2>
				</div>
				<div class="row clearfix">
					<div class="col-lg-12">
						<div class="main-form-landing">
						<form name="dealerform" class="omniform" action="<?= base_url('dealerlocatorform/submit');?>" id="dealerform" method="POST">					
						<p class="form-text">
							Fill out the form below and we will get back to you with a retailer near you.
						</p>
						<div class="col_one_third">
							<input type="text" id="name" name="name" placeholder="Name*" value="" class="sm-form-control required">
						</div>
						<div class="col_one_third">
							<input type="email" id="email" name="email" placeholder="Email id*" value="" class="sm-form-control required">
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
		
	</div><!-- content-wrap end -->

</section><!-- content end-->