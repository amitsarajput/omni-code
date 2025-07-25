

		<footer id="footer" class="dark main-footer">
			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">
					<div class="footer-custom-col">
						<ul class="ul-custom">
							<li>
								<strong>ABOUT US</strong>
								<a href="<?= base_url('who-we-are');?>">Who are we</a>
								<a href="<?= base_url('misson-vision');?>">Our Mission and Vision</a>
								<a href="<?= base_url('our-values');?>">Our Values</a>
								<a href="<?= base_url('leadership');?>">Leadership Team</a>
								<!--<a href="<?= base_url('ceo-messages');?>">Message from the CEO</a>-->
								<a href="<?= base_url('awards');?>">Awards</a>
								<a href="<?= base_url('our-story');?>">Our Story</a>
								<a href="<?= base_url('real-people-group');?>">REAL PEOPLE, REAL PERFORMANCE</a>
							</li>

							<li>
								<strong>BRANDS</strong>
								<a href="<?= base_url('radar-ca');?>" class="radar_link" >Radar</a>
								<a href="<?= base_url('radar-tbr');?>" class="radar_link" >Radar TBR</a>
								 <a href="<?= base_url('patriot');?>">Patriot</a> 
								 <a href="<?= base_url('american-tourer');?>">American Tourer</a> 
								<a href="<?= base_url('tecnica');?>">Tecnica</a>
								<!--<a href="<?= base_url('agora');?>">Agora</a>-->
								<a href="<?= base_url('roadlux');?>">Roadlux</a>
								<a href="https://radartires.com/us#dealer-locator">Dealer Locator - North America</a>
								<a href="https://radartyres.com/eu#dealer-locator">Dealer Locator - Europe</a>
								<a href="<?= base_url('radar/rpx-800-test-results');?>">Radar Test Results</a>
								<!--<a href="<?= base_url('dealer-login');?>">Dealer Corner</a>-->
							</li>

							<li>
								<strong>Warranty</strong>
								<a href="<?= base_url('radar-us/limited-warranty');?>">Radar - North America</a>
								<a href="https://radartyres.com/eu/warranty">Radar – Europe</a>
								<a href="<?= base_url('limited-warranty-radar');?>">Radar – Rest of the world</a>
								<a href="<?= base_url('patriot-us/limited-warranty');?>">Patriot - North America</a>
								<!--<a href="<?= base_url('american-tourer-us/limited-warranty');?>">American Tourer - North America</a>-->
								<!--<a href="<?= base_url('limited-warranty-american-tourer');?>">American Tourer</a>-->
							</li>
							<li>
							    <strong>Renegade Program</strong>
							    <!--<a target="_blank" href="https://omnisync.omni-united.com/">Omnisync</a>-->
							    <a href="<?= base_url('motorsport');?>">Radar Motorsport</a>
							</li>
							<li>
							    <strong>Distributors</strong>
							    <!--<a target="_blank" href="https://omnisync.omni-united.com/">Omnisync</a>-->
							    <a href="<?= base_url('omni-sync');?>">Omnisync</a>
							</li>


							<li>
								<strong>RESPONSIBILITY</strong>
								<a href="<?= base_url('social-responsibility');?>">Social</a>
								<!--<a href="<?= base_url('environmental-responsibility');?>">Environmental</a>-->
							    <!--<a href="<?= base_url('climate-change');?>">Climate Change</a>-->
							    <a href="<?= base_url('relief-efforts');?>">Relief Efforts</a>
								<!--<a href="<?= base_url('covid-assistance');?>">COVID-19 ASSISTANCE</a>-->
							</li>

							<li>
								<strong>MEDIA CENTRE</strong>
								<a href="<?= base_url('press-releases');?>">Press Releases</a>
								<a href="<?= base_url('media-coverage');?>">Media Coverage</a>
							</li>

							<li>
								<strong>OUR COMPANIES</strong>
								<a target="_blank" href="https://www.omnisourceusa.com/">Omnisource</a>
								<!--<a target="_blank" href="https://fitomni.com/">Fit omni</a>-->
								<strong>&nbsp;</strong>
								<a href="<?= base_url('contact-us');?>"><strong>CONTACT US</strong></a>
							</li>
						</ul>
					</div>

					<div class="footer-socials">
						<ul>
							<li>FOLLOW OMNI UNITED</li>
							<li><a target="_blank" href="https://www.youtube.com/@omni-united"><i class="icon-youtube-play"></i></a></li>
							<li><a target="_blank" href="https://www.linkedin.com/company/omni-united/"><i class="icon-linkedin"></i></a></li>
							<li><a target="_blank" href="https://www.instagram.com/omni_united/?hl=en"><i class="fa fa-instagram"></i></a></li>
							<li><a target="_blank" href="https://www.facebook.com/omniunited/"><i class="icon-facebook"></i></a></li>
							<li><a target="_blank" href="https://twitter.com/Omni_United"><i class="icon-twitter-x"></i></a></li>
						</ul>
					</div>
				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyright <?= date("Y");?>. All Rights Reserved with Omni United (S) Pte. Ltd.
					</div>

					<div class="col_half col_last tright">
						<div class="clear"></div>
                       
						<ul class="copyrights-menu">
							<li><a href="<?= base_url('privacy-policy');?>">Privacy Policy</a></li>
							 <!--<li><a href="<?= base_url('#');?>">Disclaimer</a>  |  </li>
							<li><a href="<?= base_url('#');?>">Cookie Policy</a></li>	-->
						</ul>
					

				</div>

			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>
	
	<!-- External JavaScripts
	============================================= -->
	<?php
	//Addition of scripts
	    echo '<script src="'. base_url('assets/js/jquery.js').'" ></script>';
		echo '<script defer  src="'. base_url('assets/js/main.js').'" async></script>';
		//echo '<script defer  src="'. base_url('assets/js/cookie-consent.js').'" async></script>';
		echo '<script src="'. base_url('assets/js/newcookie.js').'" ></script>';
		/*$scripts=array('jquery.js','plugins.js','functions.js');
		foreach ($scripts as $script) {
			echo '<script src="'. base_url('assets/js/'.$script).'"></script>';
		}*/
	//Extra stylesheet
		if (isset($extra_scripts)) {
			if (is_array($extra_scripts)) {
				foreach ($extra_scripts as $extra_script) {
				    if (is_array($extra_script)) {
						echo '<script src="'. base_url().'assets/js/'.$extra_script['name'].'" '.$extra_script['attr'].'></script>';
					}else{
    					if (substr($extra_script, 0, 4)==='http') {
    						echo '<script src="'.$extra_script.'" ></script>';
    					}else{
    						echo '<script src="'. base_url().'assets/js/'.$extra_script.'" ></script>';
    					}
					}
				}
			}else{
				if (substr($extra_scripts, 0, 4)==='http') {
						echo '<script src="'.$extra_scripts.'" ></script>';
					}else{
						echo '<script src="'. base_url().'assets/js/'.$extra_scripts.'" ></script>';
					}	
			}
		}

	?>
	<script>
        var cookieConsent = new CookieConsent({privacyPolicyUrl: "https://www.omni-united.com/privacy-policy"})
    </script>

	<!--<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		 ga('create', 'UA-69363310-1', 'auto');
		 ga('send', 'pageview');
	</script>-->
	<!--New google analytics tag-->
	<!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163822869-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-163822869-1');
    </script>
    
    <script>
  window.addEventListener('load',function(){
    jQuery('#submitbutt').click(function(){
       gtag('event', 'conversion', {'send_to': 'AW-633962775/psdhCKel5uwBEJeCpq4C'});
    })
    jQuery('[href="https://simpletire.com/brands/radar-tires"]').click(function(){
      gtag('event', 'conversion', {'send_to': 'AW-633962775/cAmvCJSAxOwBEJeCpq4C'});
    })
    jQuery('[href*="https://www.walmart.com/browse/]').click(function(){
      gtag('event', 'conversion', {'send_to': 'AW-633962775/U7UVCPaI1ewBEJeCpq4C'});
    })
    var x = 0;
    var timer = setInterval(function(){
      if(jQuery('.result:contains(successfully)').is(":visible")){
        if(x==0){
           gtag('event', 'conversion', {'send_to': 'AW-633962775/baMCCPSG1ewBEJeCpq4C'});
          x=1;
        }
        clearInterval(timer);
      }
    })

    })
</script>
<script src="<?= base_url('assets/js/lozad.min.js')?>"></script>
<script>
    // ... Image lazy
    const observer = lozad(); // lazy loads elements with default selector as '.lozad'
    observer.observe();
    // ... Bckground image lazy
    var backgroundObserver = lozad('.lozad-background', {
        threshold: 0.1
    });
    backgroundObserver.observe();
    // ... trigger the load of a image before it appears on the viewport
    if(document.querySelector('.lozad-first')){
        const coolImage = document.querySelector('.lozad-first');
        if(coolImage.length) {observer.triggerLoad(coolImage);}
    }
</script>
<style>
    .footer-custom-col ul.ul-custom li a + strong {
        margin-top:15px;
    }
	@media only screen and (min-width: 768px) and (max-width: 1099px) {
      .footer-custom-col ul.ul-custom li {
        flex: 1 1 25% !important;
        width: 25%;
      }
    }
	@media (max-width: 767.98px) {
      .footer-custom-col ul.ul-custom li {
        width: 33% !important;
        flex: 0 1 33% !important;
      }
    }
</style>

</body>
</html>