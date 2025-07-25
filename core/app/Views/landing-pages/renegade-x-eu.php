<!-- Primary Navigation
						============================================= -->


							<!-- <ul class="one-page-menu menu-container" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
								<li class="menu-item">
									<a href="#" class="menu-link" data-href="#slider"><div>Overview</div></a>
								</li>
								<li class="menu-item">
									<a href="#" class="menu-link" data-href="#section-about"><div>Product Intro</div></a>
								</li>
								<li class="menu-item">
									<a href="#" class="menu-link" data-href="#section-features"><div>Features</div></a>
								</li>
								<li class="menu-item">
									<a href="#" class="menu-link" data-href="#section-gallery"><div>Gallery</div></a>
								</li>
								<li class="menu-item">
									<a href="#" class="menu-link" data-href="#section-sizes"><div>Sizes</div></a>
								</li>
								<li class="menu-item">
									<a href="#" class="menu-link" data-href="#section-contact"><div>Contact us</div></a>
								</li>
							</ul> -->



<div class="onepageheader subheader">
	<div class="container">
		<div class="logo">
			<a href="./"><img src="<?= base_url('assets/img/radar-tyres-tyres-logo-white.png');?>"></a>
		</div>
		<div class="nav">
			<ul class="one-page-menu menu-container" data-easing="easeInOutExpo" data-speed="1250" data-offset="80">
				<li><a href="#" class="menu-link" data-href="#slider"><div>Overview</div></a></li>
				<li><a href="#" class="menu-link" data-href="#section-intro"><div>Product Intro</div></a></li>
				<li><a href="#" class="menu-link" data-href="#section-features"><div>Features</div></a></li>
				<li><a href="#" class="menu-link" data-href="#section-gallery"><div>Gallery</div></a></li>
				<li><a href="#" class="menu-link" data-href="#section-sizes"><div>Sizes</div></a></li>
				<li><a href="#" class="menu-link" data-href="#section-360-view"><div>View in 360°</div></a></li>
				<li><a href="#" class="menu-link" data-href="#section-contact"><div>Contact us</div></a></li>
			</ul>
		</div>
	</div>
</div>

<!--Page Title
============================================= -->
<style>
    #section-dealer-locator{background-color: #c00 !important;}
    #section-dealer-locator .heading-block{margin-bottom:0 !important;}
    #section-dealer-locator h2{line-height: 1 !important;letter-spacing: 0 !important;font-size:2rem;}
    #section-dealer-locator h2 .btn.btn-black{
        background-color: #fff;
        color: #000;
        outline: none !important;
        border-radius: 0;
        padding-top: 10px;
        padding-bottom: 10px;
        margin-top: -6px;
        margin-bottom: -5px;
        font-size: 1.2rem;
        font-weight: 600;
        margin-left:20px;
    }
    #section-dealer-locator h2 .btn.btn-black:hover{
        background-color: #000;
        color: #fff;
    }
    .btn:visited,.btn:focus, btn:active{outline:none!important;box-shadow: none!important;}
    @media screen and (max-width:991px ) {
        #section-dealer-locator h2 .btn.btn-black{
            margin-top: 15px;
        margin-left:0;
        } 
    }
    #section-360-view{background-color: #000 !important;}
    sup{font-size:0.6rem;top:-0.8rem;}
    .custom-heading-block{margin-bottom: 50px !important;}
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
		/*#header.transparent-header.full-header.custom-header #header-wrap{height:50px !important;}
		#header.full-header #logo.custom-logo img{height:auto;width:110px;margin-top:0;}*/
		/*.custom-logo{top:10px;}*/
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
    body {font-family: 'Saira Semi Condensed', sans-serif;}
    body, #wrapper, #content, .section {background-color: #000 !important; color: #fff;}
    /*#header.sticky-header {display: none; }*/
    #slider {padding-top: 80px;}
    .custom-header {position: absolute !important; width: 100%;}
    #header.translated{transform: translateY(-80px); height: 0 !important;}
    #header.translated + div.onepageheader {top: 0 !important; }
    .footer-custom-col ul {margin-bottom: 0; }
	.main-footer #copyrights {font-family: 'Lato',sans-serif;}
    #content p {font-family: 'Saira Semi Condensed', sans-serif !important; font-size: 20px;}
    .show-xs {display: none;}
    .form-control {border-radius: 0 !important; font-weight: 600;}
    .justifycenter {text-align: justify !important; text-align-last: center;}
    .onepageheader {position: fixed; width: 100%; z-index: 50; top: 80px !important; transition: all 0.4s ease;}
    .onepageheader {background-color: #c00;}
    .onepageheader .container {width: 90%; display: flex; max-width: none; padding: 10px 30px; align-items: center;}
    .onepageheader .container .nav {margin-left: auto; }
    .onepageheader .container .nav ul {display: flex; margin-bottom: 0px; }
    .onepageheader .container .nav ul li {margin-left: 3.2vw; }
    .onepageheader .container .nav ul li a {color: #fff; font-family: 'Saira Semi Condensed', sans-serif !important; font-size: 15px; text-transform: uppercase;}
    .min-vh-100 {min-height: 100vh !important;}
    .emphasis-title {margin-top: 80px;}
    .emphasis-title > img {max-width: 300px; padding-top: 30px; padding-bottom: 5px;}
    .emphasis-title h1 {font-size: 48px !important; line-height: 1.5 !important; font-family: 'Saira Semi Condensed', sans-serif !important; color: #fff; text-transform: uppercase; margin-bottom: 65px; position: relative; font-weight: 600 !important;}
    .emphasis-title h1:after {content: ''; width: 200px; height: 2px; background-color: #c00; position: absolute; bottom: -25px; left: 50%; margin-left: -100px; }
    .video-sec {position: relative;}
    .video-sec .inline-block {position: absolute; top: 50%; left: 50%; margin-left: -32px; margin-top: -32px;}
    .big-video-button i {padding-left: 5px; }
    .big-video-button {display: inline-block; width: 64px; height: 64px; line-height: 58px; border-radius: 50%; background-color: transparent; color: #F5F5F5 !important; font-size: 24px; text-align: center; text-shadow: 1px 1px 1px rgb(0 0 0 / 10%); opacity: 1; -webkit-transition: opacity .3s ease; -o-transition: opacity .3s ease; transition: opacity .3s ease; border: solid 5px #fff;}
    #section-intro {background-image: url(<?= base_url('assets/img/renegade-x-bg.png');?>); background-repeat:no-repeat; background-position: left 60px; background-size: 350px;}
    .custom-heading-block2 {margin-bottom: 60px !important;}
    .custom-heading-block2 h2 {font-size: 48px; line-height: 1.5 !important; font-family: 'Saira Semi Condensed', sans-serif !important; color: #fff; position: relative;}
    .custom-heading-block2 h2:after {content: ''; width: 200px; height: 2px; background-color: #c00; position: absolute; bottom: -25px; left: 50%; margin-left: -100px; }
    .renegade-x-icons {display:flex; margin-top: 40px; flex-wrap: wrap;}
	.renegade-x-icons > div {width:25%; border-right: solid 1px #444; padding-right: 15px; padding-left: 15px; margin-bottom: 30px;}
	.renegade-x-icons > div:last-child {border-right:none;}
	/*.renegade-x-icons > div:nth-child(2) {border-right: none;}*/
    .renegade-x-icons img {max-height: 80px; margin-bottom: 15px;}
    .renegade-x-icons h4 {font-size: 20px; font-family: 'Saira Semi Condensed', sans-serif !important; color: #fff; }
    .renegade-x-features {margin-top: 20px; }
    .renegade-x-features .col-lg-4 {flex-direction: column; display: flex; align-items:center;}
    .renegade-x-features .col-lg-4:after {content: ''; background-color: #101116; width: 92%; height: 100%; position: absolute; }
    .renegade-x-features img {width: 90%; margin-top: auto; z-index: 1;}
    .renegade-x-features p {text-align: center !important; z-index: 1; padding: 0 10% 5% 10%; line-height: 1.3 !important; font-size: 18px !important;}
    .renegade-x-features h4 {font-size: 22px; font-family: 'Saira Semi Condensed', sans-serif !important; color: #c00; z-index: 1; padding: 10% 10% 0 10%;     line-height: 1.2 !important;}
    #section-sizes ul.tab-nav:not(.tab-nav-lg) li.ui-tabs-active {background-color: #c00; }
    #section-sizes .tab-container {margin-top: 40px; padding: 0 40px 40px 40px;}
    #section-sizes .tab-nav {justify-content: space-between; display: flex; font-family: 'Saira Semi Condensed', sans-serif !important; font-size: 18px; border-bottom: none; margin: 0 40px;}
    #section-sizes ul.tab-nav:not(.tab-nav-lg) li.ui-tabs-active a {background-color: #c00; color: #fff; top: 0;}
    #section-sizes ul.tab-nav:not(.tab-nav-lg) li {border: none;  position: relative; width: 100%;}
    #section-sizes ul.tab-nav:not(.tab-nav-lg) li:first-child {border-left: none; margin-left: 0;}
    ul.tab-nav:not(.tab-nav-lg):before {content: 'RIM'; background-color: #F2F2F2; color: #444; font-size: 18px; line-height: 40px; font-weight: 700; width: 60px; width: 100%; border-top: solid 1px #000;}
    #section-sizes .table {text-align: left; margin-bottom: 0;}
    #section-sizes .table thead th {border-bottom: 0; border-top: 0; white-space: nowrap; text-transform: uppercase; font-size: 16px; line-height: 1.2; }
    #section-sizes .table th,  #section-sizes .table td {border: none;}
    #section-sizes .table tr {border-bottom: solid 1px #444;}
    #section-sizes .table tr:last-child {border: none;}
    #section-sizes .tabs {background-color: #101116; margin-bottom: 10px;}
    .formfooter label {color: #fff; }
    .formfooter .col-7 {padding-top: 16px; }
    .formfooter .col-5 {justify-content: flex-end; display: flex; }
    .formfooter .col-5 label {color: #ccc; text-transform: none; font-weight: 400; }
    .formfooter button {background-color: #c00; border: none; border-radius: 0; font-weight: bold; padding: 10px 20px; }
    .formfooter button:hover {background-color: red !important;}
    #section-legend {background-color: #101116 !important; padding: 30px 0;}
    #section-legend .legend {display: flex; margin-left: 10%; margin-right: 5%;}
    #section-legend .legend .box {border-right: solid 1px #444; padding: 0 1.5em; }
    #section-legend .legend .box:nth-child(1) {width: 20%; padding-left: 0; }
    #section-legend .legend .box:nth-child(2) {width: 43%; }
    #section-legend .legend .box:nth-child(3) {width: 37%; border-right: none; }
    #section-legend h4 {font-family: 'Saira Semi Condensed', sans-serif !important; color: #fff; font-size: 13px; margin-bottom: 20px; }
    #section-legend .container > .row > div:after {content: ''; height: 100%; width: 1px; background-color: #444; right: 5%; position: absolute; top: 0; }
    #section-legend .container > .row > div:last-child:after {display: none;}
    #section-legend .container ul {margin-bottom: 0;}
    #section-legend .col-6 {padding-left: 3%; }
    #section-intro .col-lg-3 {border-right: solid 1px rgba(255,255,255,.2); }
	#section-intro .col-lg-3:last-child {border: none; } 
	#section-features {background-image: url(<?= base_url('assets/img/offroad-bg.png');?>); background-repeat:no-repeat; background-position: right 60px; background-size: 350px;}
	.onepageheader .onepagecollapse {display:none;}
	#collapseNav {background-color: #8a0505; position: fixed; /*top: 105px;*/ width: 100%; z-index: 3; }
	#collapseNav ul {margin-bottom: 0; }
	#collapseNav ul li a div {color: #fff; font-size: 16px; line-height: 40px; width: 100%; padding-left: 20px; }
	.tab-legend {text-align:left;padding-left: 40px; padding-bottom:30px; color: #fff;}
	ul.tab-nav:not(.tab-nav-lg) li a {font-size: 18px; display: block; border-left: 1px solid #000 !important; border-top: 1px solid #000 !important; height: 41px; line-height: 41px;}
	.masonry-thumbs a img {background-color: #101116; border: solid 3px #000; }
	img.mfp-img {padding: 0; background-color: #101116;}
	.bgimg-left {background-image: url(https://www.omni-united.com/assets/img/renegade-x-bg.png) !important; background-repeat: no-repeat !important; background-position: left 60px !important; background-size: 350px !important;}
	.bgimg-right {background-image: url(https://www.omni-united.com/assets/img/offroad-bg.png) !important; background-repeat: no-repeat !important; background-position: right 60px !important; background-size: 350px !important;}
    .image-rotator:after{
      content: "";
      background: url('https://www.omni-united.com/assets/img/drag-helper.png') no-repeat;
      width: 244px;
      height: 40px;
      display: block;
      position: absolute;
      bottom: 15px;
      right: 0;
      left: 0;
      margin: auto;
      z-index: 3000;}

	@media (max-width: 991.98px) {
		#header.translated {transform: translateY(0); height: auto !important;}
		#header.translated + div.onepageheader {top: 80px !important; }
		.onepageheader, #collapseNav {position: relative;}
		.onepageheader .container {padding: 10px 15px 10px 30px !important;}
		/*.onepageheader .container > .nav {display:none;}*/
		.onepageheader .onepagecollapse {display:block; margin-left: auto;}
		.onepageheader .onepagecollapse a {color: #fff; }
		.onepageheader .logo img {height: 36px; }
		.onepageheader .container .nav ul li {display: none;}
		.onepageheader .container .nav ul li:last-child {display: block;}
	}

	@media (max-width: 767px) {
		#content p {line-height: 1.3;}
		.show-xs {display: block;}
		.emphasis-title {margin-top: 0px; }
		.emphasis-title h1 {font-size: 32px !important; margin-bottom: 50px;}
		.emphasis-title h1:after {bottom: -20px;}
		.custom-heading-block2 {margin-bottom: 30px !important;}
		.custom-heading-block2 h2 {font-size: 32px;}
		.custom-heading-block2 h2:after {bottom: 0px;}
		.renegade-x-icons > div {width:50%;}
		.renegade-x-icons > div:nth-child(2) {border-right: none;}
		.renegade-x-features .col-lg-4 {margin-bottom: 30px;}
		#section-sizes .tab-nav {justify-content: space-between; flex-wrap: wrap; margin: 0; }
		#section-sizes .tab-nav:after {content: ''; flex: auto; }
		ul.tab-nav:not(.tab-nav-lg) li {min-width: 20%; /*border: solid 1px #000 !important;*/ width: auto !important; }
		ul.tab-nav:not(.tab-nav-lg) li a {padding: 0 13px; display: block !important;}
		ul.tab-nav:not(.tab-nav-lg) li:first-child {margin-left: 0; border-left: none !important;}
		ul.tab-nav:not(.tab-nav-lg) li:first-child a {min-width: 60px; display: inline-block; /*border-left: solid 3px #444 !important;*/}
		ul.tab-nav:not(.tab-nav-lg) li.ui-tabs-active a {top: 0;}
		ul.tab-nav:not(.tab-nav-lg):before {min-width: 19.7%; margin-left: 0.2%; width: auto; }
		#section-sizes .tab-container {padding: 0;}
		.formfooter {flex-direction: column;}
		.formfooter label {font-size: 10px; margin-bottom: 0;}
		.formfooter .form-inline > div {margin-right: 10px !important; }
		.formfooter > div {max-width: 100%;}
		#section-legend .legend {flex-direction: column; margin: 0;}
		#section-legend .legend .box {border-right: none; padding: 0 0 20px 0 !important; width: 100% !important; border-bottom: solid 1px #444; margin-bottom: 20px; }
		#section-legend .legend .box:last-child {border: none; margin-bottom: 0; padding-bottom: 0 !important;}
		#section-legend .container > .row > div:after {display: none;}
		#section-legend .container > .row > .col-12 {border-bottom: solid 1px #444; margin-bottom: 20px; padding-bottom: 20px; }
		#section-legend .container > .row > .col-12:last-child {border-bottom: none; margin-bottom: 0; padding-bottom: 0;}
	}
	
	@media (max-width: 640px) {
    	#section-dealer-locator h2 {
          font-size: 1.5rem;
          padding-bottom: 5px;
        }
        #section-dealer-locator h2 .btn.btn-black {
            font-size: 1rem;
            display: block;
            width: 170px;
            padding: 8px;
            margin: 15px auto 0 auto;
        }
        #section-360-view > .container{padding: 0 !important;}
        #section-360-view > .container > .row{
            margin-left: -100px;
            margin-right: -75px;
        }
        #section-360-view > .container > .row > div[class^=col]{
            padding: 0;
        }
        .image-rotator:after{
            left: 25px;
            bottom:0;
            width:164px;
            background-size:contain;
            background-position:center;
        }
    }

</style>

<!-- Slider
============================================= -->
<section id="slider" class="slider-element include-header">
	<div class="slider-inner">

		<div class="container text-center">
			<div class="row">
				<div class="emphasis-title nobottommargin mx-auto">
					<img src="<?= base_url('assets/img/renegade-x-gfg.png');?>">
					<h1 class="font-weight-bold ls1" style="font-size: 52px;">Made for <br class="show-xs">Extreme Terrain</h1>
					<div class="video-sec">
					    <video id="player" class="video" poster="<?= base_url('assets/img/renegade-x-video-00.webp');?>" preload="none" style="display: block; width: 100%;">
							<source src='<?= base_url('/assets/img/renegade-x/video/renegade-x.mp4');?>' type='video/mp4' />
						</video>
					</div>
				</div>
			</div>
		</div>

	</div>
</section><!-- #slider end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap py-0">

				<div id="section-intro" class="section center notopmargin nobottommargin pt-lg pb-lg">
					<div class="container clearfix">
						<div class="heading-block  center custom-heading-block2">
							<h2 class="font-weight-bold">RENEGADE-X</h2>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<p class="justifycenter">The Renegade-X is the all new and top-of-the-line extreme terrain tyre range from Radar Tyres. This innovative "stealth" inspired tyre is born out of the partnership between Radar Tyres and leading Italian automotive design house GFG Style. This feature-packed range is designed and engineered for drivers that need extreme off-road performance on mud, rocks, gravel and sand while offering durability and an aggressive aesthetic that enthusiasts crave.</p>
								<p class="justifycenter">Rim Flange protector on all sizes</p>
							</div>
						</div>
						<div class="renegade-x-icons">
							<div>
								<img src="<?= base_url('assets/img/renegade-x-ico1.jpg');?>">
								<h4>ALL <br class="show-xs">SEASON</h4>
							</div>
							<div>
								<img src="<?= base_url('assets/img/renegade-x-ico2.jpg');?>">
								<h4>SUV/4X4</h4>
							</div>
							<div>
								<img src="<?= base_url('assets/img/renegade-x-ico3.jpg');?>">
								<h4>EXTREME TERRAIN</h4>
							</div>
							<div>
								<img src="<?= base_url('assets/img/renegade-x-ico4.jpg');?>">
								<h4>MUD AND SNOW</h4>
							</div>
						</div>
					</div>
				</div>

				<div id="section-features" class="section center notopmargin nobottommargin pt-lg pb-lg">
					<div class="container clearfix">
						<div class="heading-block  center custom-heading-block2">
							<h2 class="font-weight-bold">FEATURES AND BENEFITS</h2>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<!--<p class="justifycenter" style="line-height:1.5">High void-to-lug ratio, deep side blocks and a specially formulated Rock-Crawl tread compound provides exceptional traction and grip on rocks, gravel, mud and soft soil. Mud-rescue shoulder provides additional traction that helps pull the vehicle out of mud.</p>-->
							</div>
						</div>
						<div class="row clearfix renegade-x-features" style="justify-content: center;">
							<div class="col-lg-4 topmargin-sm">
								<h4 class="font-weight-bold">EXTREME OFF-ROAD TRACTION</h4>
								<p>High void-to-lug ratio, deep side blocks and a specially formulated Rock-Crawl tread compound provide exceptional traction and grip on rocks, gravel, mud and soft soil. Mud-rescue shoulder provides additional traction that helps pull the vehicle out of mud.</p>
								<img src="<?= base_url('assets/img/renegade-x/features/FB_1.webp');?>">
							</div>
							<div class="col-lg-4 topmargin-sm">
								<h4 class="font-weight-bold">ENHANCED DURABILITY</h4>
								<p>A unique combination of stone ejectors and serrations on the bottom tread add an additional layer of reinforcement to increase puncture resistance.</p>
								<img src="<?= base_url('assets/img/renegade-x/features/FB_2.webp');?>">
							</div>
							<div class="col-lg-4 topmargin-sm">
								<h4 class="font-weight-bold">TOUGHER SIDEWALLS</h4>
								<p>High turn-up 3-ply sidewall construction combined with aggressive “stealth” shaped sidewall lugs provide biting edges for additional grip and traction, and provide protection from external sidewall damage.</p>
								<img src="<?= base_url('assets/img/renegade-x/features/FB_3.webp');?>">
							</div>
							<div class="col-lg-4 topmargin-sm">
								<h4 class="font-weight-bold">LONG TREAD LIFE</h4>
								<p>Specially formulated tread compound combined with tie bars provide lateral stability, promote even wear and increases longevity.</p>
								<img src="<?= base_url('assets/img/renegade-x/features/FB_4.webp');?>">
							</div>
							<div class="col-lg-4 topmargin-sm">
								<h4 class="font-weight-bold">ON-ROAD COMFORT</h4>
								<p>Optimised tread pattern design reduces noise for a quieter and more comfortable on-road ride.</p>
								<img src="<?= base_url('assets/img/renegade-x/features/FB_5.webp');?>">
							</div>
						</div>
					</div>
				</div>

				<!--<div id="section-features" class="section bgimg-left center notopmargin nobottommargin pt-lg pb-lg">
					<div class="container clearfix">
						<div class="heading-block  center custom-heading-block2">
							<h2 class="font-weight-bold">FEATURES AND BENEFITS</h2>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<p class="justifycenter">The Renegade-X is the all new and top-of-the-line extreme terrain tire range from Radar Tires. Its revolutionary “Stealth” inspired design provides the fine balance between form and function. This feature-packed range is designed and engineered for drivers that need extreme off-road performance on mud, rocks, gravel and sand while offering durability and an aggressive aesthetic that enthusiasts crave. All sizes also feature a Rim Flange protector.</p>
							</div>
						</div>
						<div class="row clearfix renegade-x-features">
							<div class="col-lg-4">
								<h4 class="font-weight-bold">EVEN WEAR THROUGHOUT THE TIRES' TREAD LIFE</h4>
								<p>Balanced tread design with connecting tie bars increase tread block stiffness to promote even wear, longevity and provide on-road lateral stability.</p>
								<img src="<?= base_url('assets/img/renegade-x-5.png');?>">
							</div>
							<div class="col-lg-4">
								<h4 class="font-weight-bold">PROTECTION FROM <br>STONE PENETRATION <br>AND DAMAGE TO<br> CONSTRUCTION</h4>
								<p>Serrations on the bottom tread add an additional layer of protection from stone penetration and subsequent damage.</p>
								<img src="<?= base_url('assets/img/renegade-x-4.png');?>">
							</div>
							<div class="col-lg-4">
								<h4 class="font-weight-bold">SELF-CLEANING <br>TREAD DESIGN</h4>
								<p>High void ratio with an open shoulder design aids in channeling out excess mud and water from the tire grooves.</p>
								<img src="<?= base_url('assets/img/renegade-x-6.png');?>">
							</div>
						</div>
					</div>
				</div>-->

				<div id="section-gallery" class="section center notopmargin nobottommargin pt-lg pb-lg">
					<div class="container clearfix">
						<div class="heading-block  center custom-heading-block2">
							<h2 class="font-weight-bold">IMAGE GALLERY</h2>
						</div>
						<div class="row clearfix">
							<div class="col-lg-12">
								<div class="masonry-thumbs grid-container grid-3" data-big="1,3" data-lightbox="gallery">
									<a class="grid-item" href="<?= base_url('assets/img/renegade-x/renegade-x-img1.webp');?>" data-lightbox="gallery-item"><img src="<?= base_url('assets/img/renegade-x/renegade-x-thumb1.webp');?>"></a>
									<a class="grid-item" href="<?= base_url('assets/img/renegade-x/renegade-x-img2.webp');?>" data-lightbox="gallery-item"><img src="<?= base_url('assets/img/renegade-x/renegade-x-thumb2.webp');?>"></a>
									<a class="grid-item" href="<?= base_url('assets/img/renegade-x/renegade-x-img3.webp');?>" data-lightbox="gallery-item"><img src="<?= base_url('assets/img/renegade-x/renegade-x-thumb3.webp');?>"></a>
									<a class="grid-item" href="<?= base_url('assets/img/renegade-x/renegade-x-img4.webp');?>" data-lightbox="gallery-item"><img src="<?= base_url('assets/img/renegade-x/renegade-x-thumb4.webp');?>"></a>
									<a class="grid-item" href="<?= base_url('assets/img/renegade-x/renegade-x-img5.webp');?>" data-lightbox="gallery-item"><img src="<?= base_url('assets/img/renegade-x/renegade-x-thumb5.webp');?>"></a>
									<a class="grid-item" href="<?= base_url('assets/img/renegade-x/renegade-x-img6.webp');?>" data-lightbox="gallery-item"><img src="<?= base_url('assets/img/renegade-x/renegade-x-thumb6.webp');?>"></a>
									<a class="grid-item" href="<?= base_url('assets/img/renegade-x/renegade-x-img7.webp');?>" data-lightbox="gallery-item"><img src="<?= base_url('assets/img/renegade-x/renegade-x-thumb7.webp');?>"></a>
									<a class="grid-item" href="<?= base_url('assets/img/renegade-x/renegade-x-img8.webp');?>" data-lightbox="gallery-item"><img src="<?= base_url('assets/img/renegade-x/renegade-x-thumb8.webp');?>"></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="section-sizes" class="section center notopmargin nobottommargin nobottompadding pt-lg pb-lg">
					<div class="container clearfix">
						<div class="heading-block  center custom-heading-block2">
							<h2 class="font-weight-bold">SIZES</h2>
						</div>
						<div class="row clearfix">
							<div class="col-lg-12">
								<div class="tabs clearfix" id="tab-1">

								<ul class="tab-nav">
									<!-- <li><a href="">RIM</a></li> -->
									<li><a href="#size-all">ALL</a></li>
									<!-- <li><a href="#size-30">30</a></li>
									<li><a href="#size-28">28</a></li> -->
									<!--<li><a href="#size-26">26</a></li>-->
									<li><a href="#size-24">24</a></li>
									<li><a href="#size-22">22</a></li>
									<li><a href="#size-20">20</a></li>
									<!--<li><a href="#size-18">18</a></li>-->
									<!--<li><a href="#size-17">17</a></li>-->
									 <!--<li><a href="#size-16">16</a></li>-->
									<li><a href="#size-15">15</a></li> 
								</ul>

								<div class="tab-container">
                                    <div class="tab-content" id="size-all">
                                        <div class="table-responsive">
                                            <table border="0" cellpadding="0" cellspacing="0" class="table">
                                              <thead>
                                                <tr>
                                                  <th>Size</th>
                                                  <th>L.I./S.R.</th>
                                                  <th>L.R.</th>
                                                  <th>Rim<br>Protector</th>
                                                  <th>Approved Rim<br>
                                                  Width Range(in.)</th>
                                                  <th align="left">Overall<br>
                                                  Diameter(mm)</th>
                                                  <th align="left">Section<br>
                                                  Width(mm)</th>
                                                  <th align="left">Tread<br>
                                                  Depth(mm)</th>
                                                  <th width="100" align="right"> </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td width="134">37x13.50R24LT
                                                  <label for="eulabel-37x13-50R24LT" class="label-as-link eulabeldetails-toggle-button small-screen-link">Hide EU labels</label>
                                                  </td>
                                                  <td width="60">124K</td>
                                                  <td width="60">F</td>
                                                  <td width="60"><i class="icon-ok"></i></td>
                                                  <td width="100">9.5-(11.0)-12.0</td>
                                                  <td width="100" align="left">937</td>
                                                  <td width="100" align="left">346</td>
                                                  <td width="100" align="left">17</td>
                                                  <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-37x13-50R24LT" class="eulabel-checkbox "><label for="eulabel-37x13-50R24LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>                                                </tr>
                                                  <tr id="eulabel-eulabeldetails-37x13-50R24LT" class="eulabeldetails">
     <td colspan="9">
                                                            <div class="eulabeldetails-wrapper">
                                                                <div class="eulabel-image  ">
                                  <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);">
                                </div>
                              </div>
                                                          </td>
                          </tr>
                                            
                                                  <tr>
                                                    <td>33x12.50R22LT
                                                    <label for="eulabel-33x12-50R22LT" class="label-as-link eulabeldetails-toggle-button small-screen-link">Hide EU labels</label></td>
                                                    <td>114Q</td>
                                                    <td>F</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td>8.5-(10.0)-11.0</td>
                                                    <td align="left">832</td>
                                                    <td align="left">318</td>
                                                    <td align="left">17</td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-33x12-50R22LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-33x12-50R22LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-33x12-50R22LT" class="eulabeldetails">
                                                    <td colspan="9"><div class="eulabeldetails-wrapper">
                                                      <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"> </div>
                                                    </div></td>
                                                  </tr>
                                                  <tr>
                                                    <td>35x12.50R22LT
                                                    <label for="eulabel-35x12-50R22LT" class="label-as-link eulabeldetails-toggle-button small-screen-link">Hide EU labels</label></td>
                                                    <td>121Q</td>
                                                    <td>F</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td>8.5-(10.0)-11.0</td>
                                                    <td align="left">883</td>
                                                    <td align="left">318</td>
                                                    <td align="left">17</td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-35x12-50R22LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-35x12-50R22LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-35x12-50R22LT" class="eulabeldetails">
                                                    <td colspan="9"><div class="eulabeldetails-wrapper">
                                                      <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                    </div></td>
                                                  </tr>
                                                  <tr>
                                                    <td>37x13.50R22LT <label for="eulabel-37x13-50R22LT" class="label-as-link eulabeldetails-toggle-button small-screen-link">Hide EU labels</label></td>
                                                    <td>128K</td>
                                                    <td>F</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td>9.5-(11.0)-12.0</td>
                                                    <td align="left">937</td>
                                                    <td align="left">346</td>
                                                    <td align="left">17</td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-37x13-50R22LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-37x13-50R22LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr> 
                                                
                                                    <tr id="eulabel-eulabeldetails-37x13-50R22LT" class="eulabeldetails">
                                                      <td colspan="9"><div class="eulabeldetails-wrapper">
                                                        <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                      </div></td>
                                                    </tr>
                                                    <tr>
                                                      <td>33x12.50R20LT 
                                                      <label for="eulabel-33x12-50R20LT" class="label-as-link eulabeldetails-toggle-button small-screen-link">Hide EU labels</label></td>
                                                      <td>119Q</td>
                                                      <td>F</td>
                                                      <td><i class="icon-ok"></i></td>
                                                      <td>8.5-(10.0)-11.0</td>
                                                      <td align="left">832</td>
                                                      <td align="left">318</td>
                                                      <td align="left">17</td>
                                                      <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-33x12-50R20LT" class="eulabel-checkbox ">
                                                        <label for="eulabel-33x12-50R20LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-33x12-50R20LT" class="eulabeldetails">
                                                      <td colspan="9"><div class="eulabeldetails-wrapper">
                                                        <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                      </div></td>
                                                </tr>
                                                  <tr>
                                                    <td>35x12.50R20LT
                                                      <label for="eulabel-35x12-50R20LT" class="label-as-link eulabeldetails-toggle-button small-screen-link">Hide EU labels</label></td>
                                                    <td>121Q</td>
                                                    <td>E</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td>8.5-(10.0)-11.0</td>
                                                    <td align="left">883</td>
                                                    <td align="left">318</td>
                                                    <td align="left">17</td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-35x12-50R20LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-35x12-50R20LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-35x12-50R20LT" class="eulabeldetails">
                                                    <td colspan="9"><div class="eulabeldetails-wrapper">
                                                      <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                    </div></td>
                                                  </tr>
                                                  <tr>
                                                    <td>31x10.50R15LT</td>
                                                    <td>109Q</td>
                                                    <td>C</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td> 7.0-(8.5)-9.0 </td>
                                                    <td align="left"> 781 </td>
                                                    <td align="left"> 268 </td>
                                                    <td align="left"> 17 </td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-35x12-50R20LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-35x12-50R20LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-35x12-50R20LT" class="eulabeldetails">
                                                    <td colspan="9"><div class="eulabeldetails-wrapper">
                                                      <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                    </div></td>
                                                </tr>
                                                <tr>
                                                    <td>33x12.50R15LT</td>
                                                    <td>108Q</td>
                                                    <td>C</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td> 8.0-(10.0)-10.5 </td>
                                                    <td align="left">832</td>
                                                    <td align="left">318</td>
                                                    <td align="left">17</td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-35x12-50R20LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-35x12-50R20LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-35x12-50R20LT" class="eulabeldetails">
                                                    <td colspan="9"><div class="eulabeldetails-wrapper">
                                                      <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                    </div></td>
                                                </tr>
                                                <tr>
                                                    <td>35x12.50R15LT</td>
                                                    <td>113Q</td>
                                                    <td>C</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td> 8.0-(10.0)-10.5</td>
                                                    <td align="left">883</td>
                                                    <td align="left">318</td>
                                                    <td align="left">17</td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-35x12-50R20LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-35x12-50R20LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-35x12-50R20LT" class="eulabeldetails">
                                                    <td colspan="9"><div class="eulabeldetails-wrapper">
                                                      <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                    </div></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-content" id="size-30">
                                        <div class="table-responsive">
                                            <table border="0" cellpadding="0" cellspacing="0" class="table">
                                              <thead>
                                                <tr>
                                                  <th>Size</th>
                                                  <th>L.I./S.R.</th>
                                                  <th>L.R.</th>
                                                  <th>Approved Rim<br>
                                                  Width Range(in.)</th>
                                                  <th>Section<br>
                                                  Width(in.)</th>
                                                  <th>Overall<br>
                                                  Diameter(in.)</th>
                                                  <th>Tread<br>
                                                  Depth(1/32")</th>
                                                  <th> </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>42x16.50R30LT</td>
                                                  <td>127Q</td>
                                                  <td>E</td>
                                                  <td>11.0-(13.0)-14.0</td>
                                                  <td>16.5</td>
                                                  <td>41.9</td>
                                                  <td>21.0</td>
                                                  <td>*</td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="size-28">
                                        <div class="table-responsive">
                                            <table border="0" cellpadding="0" cellspacing="0" class="table">
                                              <thead>
                                                <tr>
                                                  <th>Size</th>
                                                  <th>L.I./S.R.</th>
                                                  <th>L.R.</th>
                                                  <th>Approved Rim<br>
                                                  Width Range(in.)</th>
                                                  <th>Section<br>
                                                  Width(in.)</th>
                                                  <th>Overall<br>
                                                  Diameter(in.)</th>
                                                  <th>Tread<br>
                                                  Depth(1/32")</th>
                                                  <th> </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>42x15.50R28LT</td>
                                                  <td>128Q</td>
                                                  <td>E</td>
                                                  <td>11.0-(12.5)-14.0</td>
                                                  <td>15.6</td>
                                                  <td>41.9</td>
                                                  <td>21.0 </td>
                                                  <td>*</td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div> -->
                                    <!--<div class="tab-content" id="size-26">
                                        <div class="table-responsive">
                                            <table border="0" cellpadding="0" cellspacing="0" class="table">
                                              <thead>
                                                <tr>
                                                  <th>Size</th>
                                                  <th>L.I./S.R.</th>
                                                  <th>L.R.</th>
                                                  <th>Approved Rim<br>
                                                  Width Range(in.)</th>
                                                  <th>Section<br>
                                                  Width(in.)</th>
                                                  <th>Overall<br>
                                                  Diameter(in.)</th>
                                                  <th>Tread<br>
                                                  Depth(1/32")</th>
                                                  <th></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                    <td>37x13.50R26LT</td>
                                                    <td>114Q</td>
                                                    <td>E</td>
                                                    <td>9.5-(11.0)-12.0</td>
                                                    <td>13.6220546</td>
                                                    <td>36.88190968</td>
                                                    <td>21</td>
                                                    <td>*</td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>-->
                                    <div class="tab-content" id="size-24">
                                        <div class="table-responsive">
                                            <table border="0" cellpadding="0" cellspacing="0" class="table">
                                              <thead>
                                                <tr>
                                                  <th>Size</th>
                                                  <th>L.I./S.R.</th>
                                                  <th>L.R.</th>
                                                  <th>Rim<br>Protector</th>
                                                  <th>Approved Rim<br>
                                                  Width Range(in.)</th>
                                                  <th align="left">Overall<br>
                                                  Diameter(mm)</th>
                                                  <th align="left">Section<br>
                                                  Width(mm)</th>
                                                  <th align="left">Tread<br>
                                                  Depth(mm)</th>
                                                  <th width="100" align="right"> </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td width="134">37x13.50R24LT
                                                  <label for="eulabel-37x13-50R24LT" class="label-as-link eulabeldetails-toggle-button small-screen-link">Hide EU labels</label>
                                                  </td>
                                                  <td width="60">124K</td>
                                                  <td width="60">F</td>
                                                  <td width="60"><i class="icon-ok"></i></td>
                                                  <td width="100">9.5-(11.0)-12.0</td>
                                                  <td width="100" align="left">937</td>
                                                  <td width="100" align="left">346</td>
                                                  <td width="100" align="left">17</td>
                                                  <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-37x13-50R24LT" class="eulabel-checkbox "><label for="eulabel-37x13-50R24LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>                                                </tr>
                                                  <tr id="eulabel-eulabeldetails-37x13-50R24LT" class="eulabeldetails">
     <td colspan="9">
                                                            <div class="eulabeldetails-wrapper">
                                                                <div class="eulabel-image  ">
                                  <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);">
                                </div>
                              </div>
                                                          </td>
                          </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="size-22">
                                        <div class="table-responsive">
                                            <table border="0" cellpadding="0" cellspacing="0" class="table">
                                              <thead>
                                                <tr>
                                                  <th width="134">Size</th>
                                                  <th width="60">L.I./S.R.</th>
                                                  <th width="60">L.R.</th>
                                                  <th width="60">Rim<br>Protector</th>
                                                  <th width="100">Approved Rim<br>
                                                  Width Range(in.)</th>
                                                  <th width="100" align="left">Overall<br>
                                                  Diameter(mm)</th>
                                                  <th width="100" align="left">Section<br>
                                                  Width(mm)</th>
                                                  <th width="100" align="left">Tread<br>
                                                  Depth(mm)</th>
                                                  <th width="100" align="right"> </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                            
                                                  <tr>
                                                    <td>33x12.50R22LT
                                                    <label for="eulabel-33x12-50R22LT" class="label-as-link eulabeldetails-toggle-button small-screen-link">Hide EU labels</label></td>
                                                    <td>114Q</td>
                                                    <td>F</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td>8.5-(10.0)-11.0</td>
                                                    <td align="left">832</td>
                                                    <td align="left">318</td>
                                                    <td align="left">17</td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-33x12-50R22LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-33x12-50R22LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-33x12-50R22LT" class="eulabeldetails">
                                                    <td colspan="9"><div class="eulabeldetails-wrapper">
                                                      <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"> </div>
                                                    </div></td>
                                                  </tr>
                                                  <tr>
                                                    <td>35x12.50R22LT
                                                    <label for="eulabel-35x12-50R22LT" class="label-as-link eulabeldetails-toggle-button small-screen-link">Hide EU labels</label></td>
                                                    <td>121Q</td>
                                                    <td>F</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td>8.5-(10.0)-11.0</td>
                                                    <td align="left">883</td>
                                                    <td align="left">318</td>
                                                    <td align="left">17</td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-35x12-50R22LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-35x12-50R22LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-35x12-50R22LT" class="eulabeldetails">
                                                    <td colspan="9"><div class="eulabeldetails-wrapper">
                                                      <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                    </div></td>
                                                  </tr>
                                                  <tr>
                                                    <td>37x13.50R22LT <label for="eulabel-37x13-50R22LT" class="label-as-link eulabeldetails-toggle-button small-screen-link">Hide EU labels</label></td>
                                                    <td>128K</td>
                                                    <td>F</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td>9.5-(11.0)-12.0</td>
                                                    <td align="left">937</td>
                                                    <td align="left">346</td>
                                                    <td align="left">17</td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-37x13-50R22LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-37x13-50R22LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr> 
                                                
                                                    <tr id="eulabel-eulabeldetails-37x13-50R22LT" class="eulabeldetails">
                                                      <td colspan="9"><div class="eulabeldetails-wrapper">
                                                        <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                      </div></td>
                                                    </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="size-20">
                                        <div class="table-responsive">
                                            <table border="0" cellpadding="0" cellspacing="0" class="table">
                                              <thead>
                                                <tr>
                                                  <th width="134">Size</th>
                                                  <th width="60">L.I./S.R.</th>
                                                  <th width="60">L.R.</th>
                                                  <th width="60">Rim<br>Protector</th>
                                                  <th width="100">Approved Rim<br>
                                                  Width Range(in.)</th>
                                                  <th width="100" align="left">Overall<br>
                                                  Diameter(mm)</th>
                                                  <th width="100" align="left">Section<br>
                                                  Width(mm)</th>
                                                  <th width="100" align="left">Tread<br>
                                                  Depth(mm)</th>
                                                  <th width="100" align="right"> </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                    <tr>
                                                      <td>33x12.50R20LT 
                                                      <label for="eulabel-33x12-50R20LT" class="label-as-link eulabeldetails-toggle-button small-screen-link">Hide EU labels</label></td>
                                                      <td>114Q</td>
                                                      <td>F</td>
                                                      <td><i class="icon-ok"></i></td>
                                                      <td>8.5-(10.0)-11.0</td>
                                                      <td align="left">832</td>
                                                      <td align="left">318</td>
                                                      <td align="left">17</td>
                                                      <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-33x12-50R20LT" class="eulabel-checkbox ">
                                                        <label for="eulabel-33x12-50R20LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-33x12-50R20LT" class="eulabeldetails">
                                                      <td colspan="9"><div class="eulabeldetails-wrapper">
                                                        <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                      </div></td>
                                                </tr>
                                                  <tr>
                                                    <td>35x12.50R20LT
                                                      <label for="eulabel-35x12-50R20LT" class="label-as-link eulabeldetails-toggle-button small-screen-link">Hide EU labels</label></td>
                                                    <td>121Q</td>
                                                    <td>E</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td>8.5-(10.0)-11.0</td>
                                                    <td align="left">883</td>
                                                    <td align="left">318</td>
                                                    <td align="left">17</td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-35x12-50R20LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-35x12-50R20LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-35x12-50R20LT" class="eulabeldetails">
                                                    <td colspan="9"><div class="eulabeldetails-wrapper">
                                                      <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                    </div></td>
                                                  </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--<div class="tab-content" id="size-18">
                                        <div class="table-responsive">
                                            <table border="0" cellpadding="0" cellspacing="0" class="table">
                                              <thead>
                                                <tr>
                                                  <th>Size</th>
                                                  <th>L.I./S.R.</th>
                                                  <th>L.R.</th>
                                                  <th>Approved Rim<br>
                                                  Width Range(in.)</th>
                                                  <th>Section<br>
                                                  Width(in.)</th>
                                                  <th>Overall<br>
                                                  Diameter(in.)</th>
                                                  <th>Tread<br>
                                                  Depth(1/32")</th>
                                                  <th> </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>35x12.50R18LT</td>
                                                  <td>123Q</td>
                                                  <td>E</td>
                                                  <td>9.5-(11.0)-12.0</td>
                                                  <td>13.6</td>
                                                  <td>36.9</td>
                                                  <td>16.7</td>
                                                    <td>&nbsp; </td>
                                                  </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>-->
                                    <!--<div class="tab-content" id="size-17">
                                        <div class="table-responsive">
                                            <table border="0" cellpadding="0" cellspacing="0" class="table">
                                              <thead>
                                                <tr>
                                                  <th>Size</th>
                                                  <th>L.I./S.R.</th>
                                                  <th>L.R.</th>
                                                  <th>Approved Rim<br>
                                                  Width Range(in.)</th>
                                                  <th>Section<br>
                                                  Width(in.)</th>
                                                  <th>Overall<br>
                                                  Diameter(in.)</th>
                                                  <th>Tread<br>
                                                  Depth(1/32")</th>
                                                  <th> </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>35x12.50R17LT</td>
                                                  <td>121Q</td>
                                                  <td>E</td>
                                                  <td>9.5-(11.0)-12.0</td>
                                                  <td>13.6</td>
                                                  <td>36.9</td>
                                                  <td>16.7</td>
                                                    <td>&nbsp; </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>-->
                                    <!--<div class="tab-content" id="size-16">
                                        <div class="table-responsive">
                                            <table border="0" cellpadding="0" cellspacing="0" class="table">
                                              <thead>
                                                <tr>
                                                  <th>Size</th>
                                                  <th>L.I./S.R.</th>
                                                  <th>L.R.</th>
                                                  <th>Approved Rim<br>
                                                  Width Range(in.)</th>
                                                  <th>Section<br>
                                                  Width(in.)</th>
                                                  <th>Overall<br>
                                                  Diameter(in.)</th>
                                                  <th>Tread<br>
                                                  Depth(1/32")</th>
                                                  <th> </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                    <td>LT265/75R16</td>
                                                    <td>123/120Q</td>
                                                    <td>E</td>
                                                    <td>7.0-(7.5)-9.0</td>
                                                    <td>10.6</td>
                                                    <td>31.7</td>
                                                    <td>19.0</td>
                                                    <td>*</td>
                                                </tr>
                                                <tr>
                                                    <td>LT285/75R16</td>
                                                    <td>126/123Q</td>
                                                    <td>E</td>
                                                    <td>7.5-(8.0)-9.5</td>
                                                    <td>11.4</td>
                                                    <td>32.9</td>
                                                    <td>19.0</td>
                                                    <td>*</td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>-->
                                    <div class="tab-content" id="size-15">
                                        <div class="table-responsive">
                                            <table border="0" cellpadding="0" cellspacing="0" class="table">
                                              <thead>
                                                <tr>
                                                  <th width="134">Size</th>
                                                  <th width="60">L.I./S.R.</th>
                                                  <th width="60">L.R.</th>
                                                  <th width="60">Rim<br>Protector</th>
                                                  <th width="100">Approved Rim<br>
                                                  Width Range(in.)</th>
                                                  <th width="100" align="left">Overall<br>
                                                  Diameter(mm)</th>
                                                  <th width="100" align="left">Section<br>
                                                  Width(mm)</th>
                                                  <th width="100" align="left">Tread<br>
                                                  Depth(mm)</th>
                                                  <th width="100" align="right"> </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                    <td>31x10.50R15LT</td>
                                                    <td>109Q</td>
                                                    <td>C</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td> 7.0-(8.5)-9.0 </td>
                                                    <td> 781 </td>
                                                    <td> 268 </td>
                                                    <td> 17 </td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-35x12-50R20LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-35x12-50R20LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-35x12-50R20LT" class="eulabeldetails">
                                                    <td colspan="9"><div class="eulabeldetails-wrapper">
                                                      <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                    </div></td>
                                                </tr>
                                                <tr>
                                                    <td>33x12.50R15LT</td>
                                                    <td>108Q</td>
                                                    <td>C</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td> 8.0-(10.0)-10.5 </td>
                                                    <td>832</td>
                                                    <td>318</td>
                                                    <td>17</td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-35x12-50R20LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-35x12-50R20LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-35x12-50R20LT" class="eulabeldetails">
                                                    <td colspan="9"><div class="eulabeldetails-wrapper">
                                                      <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                    </div></td>
                                                </tr>
                                                <tr>
                                                    <td>35x12.50R15LT</td>
                                                    <td>113Q</td>
                                                    <td>C</td>
                                                    <td><i class="icon-ok"></i></td>
                                                    <td> 8.0-(10.0)-10.5</td>
                                                    <td>883</td>
                                                    <td>318</td>
                                                    <td>17</td>
                                                    <td width="100" class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-35x12-50R20LT" class="eulabel-checkbox ">
                                                      <label for="eulabel-35x12-50R20LT" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                                                  </tr>
                                                  <tr id="eulabel-eulabeldetails-35x12-50R20LT" class="eulabeldetails">
                                                    <td colspan="9"><div class="eulabeldetails-wrapper">
                                                      <div class="eulabel-image  "> <img class="lozad" data-placeholder-background="#fff" data-src="https://www.omni-united.com/uploads/eu-labels/Renegade X_EU_POR label.webp" alt="" style="background: rgb(255, 255, 255);"></div>
                                                    </div></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div><!-- -->
                                </div>
							</div>
							<!--<div class="tab-legend"><small>* = Sizes in preparation</small></div>-->
							</div>
						</div>
					</div>
				</div>

				<div id="section-360-view" class="section center notopmargin nobottommargin pt-lg pb-lg">
					<div class="container clearfix">
						<div class="heading-block center custom-heading-block2">
							<h2 class="font-weight-bold">VIEW IN 360°</h2>
						</div>
						
						<div class="row clearfix">
							<div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12">
							    <div class="image-rotator">
								<div 
                                  class="cloudimage-360" 
                                  data-folder="https://www.omni-united.com/assets/img/sequence-images/renegade-x/" 
                                  data-filename-x="Omni_renegade_x{index}.jpg" 
                                  data-amount-x="88" 
                                  data-speed="120" 
                                  data-drag-speed="100" 
                                  data-spin-reverse 
                                  data-autoplay 
                                  data-lazyload 
                                  data-lazyload-selector="lozad"
                                ></div>
                                </div>
							</div>
						</div>
					</div>
				</div>
				
				<div id="section-dealer-locator" class="section center notopmargin nobottommargin ptsm pbsm">
					<div class="container clearfix">
						<div class="heading-block center custom-heading-block2">
							<h2 class="font-weight-bold">FIND A RADAR DEALER NEAR YOU <a href="<?= base_url('/north-america-dealer-locator');?>" class="btn btn-black">DEALER LOCATOR</a></h2>
						</div>
					</div>
				</div>

				<div id="section-contact" class="section bgimg-right center notopmargin nobottommargin pt-lg pb-lg">
					<div class="container clearfix">
						<div class="heading-block  center custom-heading-block2">
							<h2 class="font-weight-bold">CONTACT US</h2>
						</div>
						<div class="row clearfix">
							<div class="col-lg-12">
								<p class="justifycenter">If you are looking at setting up a Dealer account with Radar, searching for a dealer near you or looking for any other information, please fill out the below form and we will get back to you as soon as we can.</p>
							</div>
						</div>
						<div class="row clearfix">
							<div class="col-12 col-sm-10 offset-0 offset-sm-1">
							    <form action="<?= base_url('ranegadex-inquiry/submit')?>" id="contact-form" method="post" class="omniform" >
							        <div class="alert alert-danger error" role="alert"></div>
    								<div class="row">
    									<div class="col-12 col-sm-6 form-group">
    										<input type="text" name="name" id="name" class="form-control required" placeholder="NAME*">
    									</div>
    									<div class="col-12 col-sm-6 form-group">
    										<input type="text" name="companyname" id="companyname" class="form-control required" placeholder="COMPANY NAME*">
    									</div>
    									<div class="col-12 col-sm-6 form-group">
    										<input type="email" name="email" id="email" class="form-control required" placeholder="EMAIL*">
    									</div>
    									<div class="col-12 col-sm-6 form-group">
    										<input type="text" name="mobile" id="mobile" class="form-control" placeholder="PHONE">
    									</div>
    									<div class="col-12 form-group">
    										<input type="text" name="addresslocation" id="addresslocation" class="form-control" placeholder="ADDRESS/LOCATION">
    									</div>
    									<div class="col-12 form-group">
    										<textarea name="message" id="message" class="form-control valid" cols="30" rows="4" placeholder="ENQUIRY*"></textarea>
    									</div>
    								</div>
    								<div class="row formfooter clearfix">
    									<div class="col-7">
    										<div class="form-inline">
    											<div class="form-group mb-2">
    												<label>I AM A</label>
    											</div>
    											<div class="form-group mx-sm-3 mb-2">
    												<div class="form-check">
    													<input class="form-check-input" type="checkbox" id="defaultCheck1" name="wholeseller">
    													<label class="form-check-label" for="defaultCheck1">WHOLESELLER</label>
    												</div>
    											</div>
    											<div class="form-group mx-sm-3 mb-2">
    												<div class="form-check">
    													<input class="form-check-input" type="checkbox" value="" id="defaultCheck2" name="retailer">
    													<label class="form-check-label" for="defaultCheck2">RETAILER</label>
    												</div>
    											</div>
    											<div class="form-group mx-sm-3 mb-2">
    												<div class="form-check">
    													<input class="form-check-input" type="checkbox" value="" id="defaultCheck3" name="consumer">
    													<label class="form-check-label" for="defaultCheck3">CONSUMER</label>
    												</div>
    											</div>
    										</div>
    									</div>
    									<div class="col-5">
    										<div class="form-inline">
    											<div class="form-group mx-sm-3 mb-2">
    												<label><i>*Required Fields</i></label>
    											</div>
    											<div class="form-group mb-2">
    												<button type="submit" class="btn btn-primary mb-2 submit">SUBMIT</button>
    											</div>
    										</div>
    									</div>
    								</div>
    								<div class="alert alert-success result" role="alert"></div>
            						<div class="clearfix"></div>
            						<div class="col_full hidden">
            							<input type="text" id="phone" name="phone" value="" class="sm-form-control" />
            							<input type="hidden" id="current_page" name="current_page" value="<?= current_url(); ?>">
                                        <input type="text" id="g-recaptcha" name="g-recaptcha" value="" />
                                        <input type="text" id="g-recaptcha-action" name="g-recaptcha-action" value="" />
            						</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div id="section-legend" class="section notopmargin nobottommargin pt-lg pb-lg">
					<div class="container clearfix">
						<div class="legend">
							<div class="box">
								<h4>LEGEND:</h4>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<ul>
											<li><b>L.I.</b> = LOAD INDEX</li>
											<li><b>S.R.</b> = SPEED RATING</li>
										    <li><b>L.R.</b> = LOAD RANGE</li>
										    <li><b>M+S</b> = MUD & SNOW</li>
										</ul>
									</div>
								</div>
								<div class="row" style="margin-top:0.25rem">
									<div class="col-12">
										<ul>
											<li>Learn more about the EU grades <a class="blue" href="../new-european-tyre-labeling">here</a>.</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="box">
								<h4>SPEED RATING:</h4>
								<div class="row">
									<div class="col-4 col-lg-4 col-md-6 col-sm-12">
										<ul>
											<li><b>M</b> = 130 KM/H</li>
											<li><b>N</b> = 140 KM/H</li>
											<li><b>P</b> = 150 KM/H</li>
											<li><b>Q</b> = 160 KM/H</li>
										</ul>
									</div>
									<div class="col-4 col-lg-4 col-md-6 col-sm-12">
										<ul>
											<li><b>R</b> = 170 KM/H</li>
											<li><b>S</b> = 180 KM/H</li>
											<li><b>T</b> = 190 KM/H</li>
											<li><b>H</b> = 210 KM/H</li>
										</ul>
									</div>
									<div class="col-4 col-lg-4 col-md-6 col-sm-12">
										<ul>
											<li><b>V</b> = 240 KM/H</li>
											<li><b>W</b> = 270 KM/H</li>
											<li><b>Y</b> = 300 KM/H</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="box">
								<h4>LOAD RANGE:</h4>
								<div class="row">
									<div class="col-6  col-lg-6 col-md-6 col-sm-12">
										<ul>
											<li><b>SL</b> = STANDARD LOAD</li>
											<li><b>XL</b> = EXTRA LOAD</li>
											<li><b>C</b> = 6-PLY</li>
											<li><b>D</b> = 8-PLY</li>
										</ul>
									</div>
									<div class="col-6  col-lg-6 col-md-6 col-sm-12">
										<ul>
											<li><b>E</b> = 10-PLY</li>
											<li><b>F</b> = 12-PLY</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
				</div>

			</div>
		</section><!-- #content end -->
<style>
  .eulabeldetails,.eulabel-checkbox{display: none;}
  .eulabeldetails.show{display: table-row;}
  .eulabeldetails > td{border-top:none; border-bottom: none;}
  .label-as-link{margin-bottom: 0;color:#DA2224;font-size: 0.76rem;line-height: 0.8rem;font-weight: 600;text-transform: uppercase;font-family: inherit}
  table tr.border-bottom-transparent{border-bottom-color: rgba(170,170,170,0) !important;}
  .eulabeldetails-wrapper{display: flex;}
  .eulabeldetails-wrapper{font-size: 14px;}
  .eulabeldetails-wrapper .eulabel-image{width: 100%;}
  .eulabeldetails-wrapper .eulabel-image img{max-width: 300px;border: 2px solid #ffffff;margin: 15px;}
  .eulabeldetails-wrapper .eulabel-image.no-border img{border: none;}
  .eulabeldetails-wrapper .eulabel-details-content{display: none;}
  .small-screen-link{display: none;}
  .large-screen-link{display: block;}
  @media only screen and (max-width: 1024px) {
    .hidden-sm{display: none;}
    .small-screen-link{display: block;}
    .large-screen-link{display: none;}
  }
</style>
