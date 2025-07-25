

		<footer id="footer" class="dark main-footer">

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
		echo '<script src="'. base_url('assets/js/main.js').'" ></script>';
		/*$scripts=array('jquery.js','plugins.js','functions.js');
		foreach ($scripts as $script) {
			echo '<script src="'. base_url('assets/js/'.$script).'"></script>';
		}*/
	//Extra stylesheet
		if (isset($extra_scripts)) {
			if (is_array($extra_scripts)) {
				foreach ($extra_scripts as $extra_script) {
					if (substr($extra_script, 0, 4)==='http') {
						echo '<script src="'.$extra_script.'" ></script>';
					}else{
						echo '<script src="'. base_url().'assets/js/'.$extra_script.'" ></script>';
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

</body>
</html>