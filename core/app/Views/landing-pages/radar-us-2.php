<!--Page Title
============================================= -->
<style>
    .custom-heading-block{margin-bottom: 50px !important;}
	.buyonlinesection{ padding:80px 0; }
	.buyonlinesection .custom-heading-block{margin-bottom: 50px !important;}
	/*Slider*/
	.swiper_wrapper .swiper-container{height:auto!important;}
	.slider-element.swiper_wrapper{height: 75vh !important;background: #000;}
	.swiper-slide{
		height: 75vh !important;
	}
	.swiper-slide{ background-color: #000; background-size:  cover!important; }
	
	.swiper-slide.slide-1{ background-image: url(<?= base_url('assets/img/landing-pages/2/s1.jpg');?>); }
	.swiper-slide.slide-2{ background-image: url(<?= base_url('assets/img/landing-pages/2/s2.jpg');?>); }
	.swiper-slide.slide-3{ background-image: url(<?= base_url('assets/img/landing-pages/2/s3.jpg');?>); }
	.swiper-slide.slide-4{ background-image: url(<?= base_url('assets/img/landing-pages/2/s4.jpg');?>); }
	
	/*Map section*/
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
    
	
	.brand-tabs-section .tirerow { border-bottom: 1px solid #aaa; margin-bottom: 120px; }
	.brand-tabs-section .tirerow:last-child, .brand-tabs-section .tab-container .tab-content .row:last-child { margin-bottom: 0; }
	.main-footer #copyrights{padding: 9px 0 10px !important;}
	.mandatory{margin-top:10px; display:block;}
	.pro-img-bar-link{display:block;}
	.pro-img-bar:hover > img{transform:scale(1);}
	@media screen and (max-width:1240px ) {
	    
		/*Mobile fix Slider*/
		.swiper_wrapper .swiper-container{height:auto!important;}
		.slider-element.swiper_wrapper{height: 70vh !important;background: #000;}
		.swiper-slide{
			height: 70vh !important;
		}
	}
	@media screen and (max-width:991px ) {
        .custom-heading-block{margin-bottom: 30px !important;}
		.buyonlinesection .retailers{ margin-bottom: 25px; }
		.buyonlinesection .retailers:last-child{ margin-bottom: 0; }
	}
	@media screen and (max-width:768px ) {
	    /*Slider height fix*/
	    .swiper_wrapper .swiper-container{height:auto!important;}
		.slider-element.swiper_wrapper{height:40vh !important;background: #000;}
		.swiper-slide{
			height: 40vh !important;
		}
		.product-catalog .product-cat-nav .tab-nav li{margin-left: 0 !important;}
		
		.swiper-slide.slide-1{ background-image: url(<?= base_url('assets/img/landing-pages/2/s1.jpg');?>); }
    	.swiper-slide.slide-2{ background-image: url(<?= base_url('assets/img/landing-pages/2/s2.jpg');?>); }
    	.swiper-slide.slide-3{ background-image: url(<?= base_url('assets/img/landing-pages/2/s3.jpg');?>); }
    	.swiper-slide.slide-4{ background-image: url(<?= base_url('assets/img/landing-pages/2/s4.jpg');?>); }
	}
	@media screen and (max-width: 767px) {
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
		/*Slider height fix*/
		.swiper_wrapper .swiper-container{height:auto!important;}
		.slider-element.swiper_wrapper{height:90vh !important;background: #000;}
		.swiper-slide{ height: 90vh !important; }
		
		.swiper-slide.slide-1{ background-image: url(<?= base_url('assets/img/landing-pages/2/s1-m.jpg');?>); }
    	.swiper-slide.slide-2{ background-image: url(<?= base_url('assets/img/landing-pages/2/s2-m.jpg');?>); }
    	.swiper-slide.slide-3{ background-image: url(<?= base_url('assets/img/landing-pages/2/s3-m.jpg');?>); }
    	.swiper-slide.slide-4{ background-image: url(<?= base_url('assets/img/landing-pages/2/s4-m.jpg');?>); }

		.main-search-bar .form-row .inputs .form-group,.main-search-bar .form-row .buttons .formbutton{margin-right:0;width: 100%;}
		.main-search-bar .form-row .buttons{margin-top: 15px;}
		.main-search-bar .form-row .buttons .button,.main-search-bar .form-row .buttons .text{width: 100%; text-align: center;}
		#side_bar .main-add{width: 100%;margin-right: 0;}
		/*Mobile fix header*/
		#header.transparent-header.full-header.custom-header #header-wrap{height:50px !important;}
		#header.full-header #logo.custom-logo img{height:auto;width:110px;margin-top:0;}
		.custom-logo{top:10px;}
		.main-slider-home .swiper-pagination{bottom:35px !important;}
		.brand-tabs-section ul.brand-tabs li.ui-tabs-tab{width: 33% !important;}
	}
	
	.testimonial-box{
	    display: block;
        height: 410px;
        background: #F1F1F2;
        padding: 120px 40px 40px;
        color: #555555;
        text-align: center;
	}
	
	.testimonial-box:before{
        content: "\e7ae";
        font-family: 'font-icons';
        font-size: 60px;
        text-align: center;
        color: #D1D2D4;
        line-height: 90px;
        margin-top: -100px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        height: 80px;
        width: 80px;
        margin-bottom: 20px;
	}
	
	.testimonial-content{
	    height:100%;
	    width:100%;
	    display:flex;
	    justify-content:space-between;
	    align-items:center;
	    flex-direction: column;
	}
	
	
	#content .testimonial-box p{
	    text-align:center;
	    line-height:1.5em;
	    color:#555;
	}
	.owl-carousel .owl-stage{padding-top:0;}
	.sticky-left-button{display:none;}
	.img-overflow {
        display: flex;
        justify-content: center;
        align-items: flex-end;
        padding: 15px;
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
			<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
			<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
			<!--<div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>-->
			<div class="swiper-pagination"></div>
		    <a href="#" data-scrollto="#content" data-offset="70" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>
			
		</div>
	</div>
</section> <!--#page-title end -->

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
	    
	    <!--Testimonials slider-->
	    <div class="full-section bg-white ptlg clearfix" >
	        <div class="container">
				<div class="heading-block  center custom-heading-block">
					<h2>Hear what our satisfied customers have to say</h2>
				</div>
	            <div class="">
	                <div id="oc-testi" class="owl-carousel carousel-widget" data-margin="20" data-items-sm="1" data-items-md="2" data-items-xl="3">

						<div class="oc-item">
							<div class="testimonial-box">
							    <div class="testimonial-content">
    								<p>I am on my second set now. The Radar Renegades perform great on my truck and offer an aggressive looking tread with a killer sidewall design.</p>
    								<div class="testimonial-meta">
    									John
    								</div>
								</div>
						    </div>
						</div>
						<div class="oc-item">
							<div class="testimonial-box">
							    <div class="testimonial-content">
    								<p>I went for the Radar Dimax eSport as they offered all kinds of warranties on this including a 30-day return guarantee, mileage warranty as well as a Road Hazard. I don't have to worry about these for a long time now.</p>
    								<div class="testimonial-meta">
    									Michael
    								</div>
								</div>
						    </div>
						</div>
						<div class="oc-item">
							<div class="testimonial-box">
							    <div class="testimonial-content">
    								<p>It was only recently that I found out that this brand cares for the environment and makes Carbon Neutral tires. What a great fit for my Tesla.</p>
    								<div class="testimonial-meta">
    									Joshua
    								</div>
								</div>
						    </div>
						</div>
						<div class="oc-item">
							<div class="testimonial-box">
							    <div class="testimonial-content">
    								<p>Totally in love with the great designs, especially the dual sidewall Radar Renegade R/T tires. Amazing performance with an aggressive design that compliments the look of my truck.</p>
    								<div class="testimonial-meta">
    									Simon
    								</div>
								</div>
						    </div>
						</div>
						<div class="oc-item">
							<div class="testimonial-box">
							    <div class="testimonial-content">
    								<p>40,000 miles down and no complaints so far. I have taken these through some of the harshest off-road conditions and they have lived up to their name</p>
    								<div class="testimonial-meta">
    									Peter
    								</div>
								</div>
						    </div>
						</div>

					</div>
	            </div>
	        </div>
	        
	    </div>
	    
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

		<section class="topmargin bottommargin">
			<div class="mx-auto center" style="max-width:600px;">
				<div class="container clearfix">
					<div class="heading-block  center custom-heading-block">
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
							            <input type="hidden" id="current_page" name="current_page" value="<?= current_url(); ?>">
                                        <input type="text" id="g-recaptcha" name="g-recaptcha" value="" />
                                        <input type="text" id="g-recaptcha-action" name="g-recaptcha-action" value="" />
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
		</section>

		<section class="topmargin-lg bottommargin">
			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
					<h2>Write to us</h2>
				</div>
				<div class="row clearfix">
					<div class="col-lg-12">
						<div class="main-form-landing">
							<form name="locatorform" class="omniform" action="<?= base_url('dealerlocatorform/submit');?>" id="locatorform" method="POST">					
								<p class="form-text">
									If you may need any additional information from us on sizes, specifications, warranties or anything else, please drop us a line and we will get back to you as soon as we can.
								</p>
								<div class="col_one_third">
									<input type="text" id="name" name="name" placeholder="Name*" value="" class="sm-form-control required">
								</div>
								<div class="col_one_third">
									<input type="email" id="email" name="email" placeholder="Email*" value="" class="sm-form-control required">
								</div>

								<div class="col_one_third col_last">
									<input type="text" id="location" name="location" placeholder="Location*" value="" class="sm-form-control required">
								</div>
								<div class="clearfix"></div>

								<div class="col_full hidden">
									<input type="text" id="phone" name="phone">
                                    <input type="text" id="g-recaptcha" name="g-recaptcha" value="" />
                                    <input type="text" id="g-recaptcha-action" name="g-recaptcha-action" value="" />
								</div>
								<div class="clearfix"></div>

								<div class="col_full">
									<textarea class="required sm-form-control" id="message" name="message" placeholder="Message" rows="6" ></textarea>
								</div>

								<div class="clearfix"></div>

								<div class="col_full">
									<button class="button nomargin submit" type="submit" name="submit" value="submit">Submit</button><br>
									<small class="mandatory">*Required Fields</small>
								</div>
								<div class="result"></div>
								<div class="error"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="topmargin-lg bottommargin">
			<div class="container clearfix">
				<!--<div class="heading-block  center custom-heading-block">
					<h2>Write to us</h2>
				</div>-->
				<div class="row clearfix">
					<div class="col-lg-6">
					    <div class="heading-block center subheading" style="margin-bottom: 30px !important;">
            				<h2>View our Product Range</h2>
        				</div>
        				<a href="<?= base_url('radar-us') ?>" class="pro-img-bar-link bottommargin">
    						<div class="pro-img-bar">
    							<img src="<?= base_url('assets/img/landing-page-bottom-link1.jpg') ?>" alt="Omni United Group">
    							<div class="img-overflow">
    								<div class="button nomargin">Know More</div>
    							</div>
    						</div>
						</a>
					</div>
					<div class="col-lg-6">
					    <div class="heading-block center subheading" style="margin-bottom: 30px !important;">
            				<h2>View our Warranty Coverage</h2>
        				</div>
        				<a href="<?= base_url('radar-us/limited-warranty') ?>" class="pro-img-bar-link bottommargin">
    						<div class="pro-img-bar">
    							<img src="<?= base_url('assets/img/landing-page-bottom-link2.jpg') ?>" alt="Omni United Group">
    							<div class="img-overflow">
    								<div class="button nomargin">Know More</div>
    							</div>
    						</div>
						</a>
					</div>
				</div>
			</div>
		</section>
		
	</div><!-- content-wrap end -->

</section><!-- content end-->