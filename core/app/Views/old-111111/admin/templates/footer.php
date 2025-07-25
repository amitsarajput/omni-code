

		<footer id="footer" class="dark main-footer">
			<div class="container">
				<div class="elementnotify"></div>
				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">
					<div class="footer-custom-col">
						<ul>
							<li>
								<strong>ABOUT US</strong>
								<a href="<?= base_url('about-us');?>">Who are we</a>
								<a href="<?= base_url('misson-vision');?>">Our Mission and Vision</a>
								<a href="<?= base_url('our-values');?>">Our Values</a>
								<a href="<?= base_url('leadership');?>">Leadership Team</a>
								<a href="<?= base_url('ceo-messages');?>">Message from the CEO</a>
								<a href="<?= base_url('awards');?>">Awards</a>
								<a href="<?= base_url('our-story');?>">Our Story</a>
							</li>

							<li>
								<strong>BRANDS</strong>
								<a href="<?= base_url('radar');?>">Radar</a>
								<a href="<?= base_url('patriot');?>">Patriot</a>
								<a href="<?= base_url('american-tourer');?>">American Tourer</a>
								<a href="<?= base_url('#');?>">Tecnica Concept</a>
								<a href="<?= base_url('#');?>">Roadlux</a>
							</li>


							<li>
								<strong>RESPONSIBILITY</strong>
								<a href="<?= base_url('social-responsibility');?>">Social</a>
								<a href="<?= base_url('environmental-responsibility');?>">Environmental</a>
							</li>

							<li>
								<strong>MEDIA CENTER</strong>
								<a href="<?= base_url('press-releases');?>">Press Releases</a>
								<a href="<?= base_url('#');?>">Media Coverages</a>
							</li>

							<li>
								<strong>OUR COMPANIES</strong>
								<a href="<?= base_url('#');?>">Omnisource</a>
								<a href="<?= base_url('#');?>">Fit omni</a>
							</li>

							<li>
								<a href="<?= base_url('contact-us');?>"><strong>CONTACT US</strong></a>
							</li>
						</ul>
					</div>

					<div class="footer-socials">
						<ul>
							<li>FOLLOW US</li>
							<li><a href="<?= base_url('#');?>"><i class="icon-facebook"></i></a></li>
							<li><a href="<?= base_url('#');?>"><i class="fa fa-instagram"></i></a></li>
							<li><a href="<?= base_url('#');?>"><i class="icon-twitter"></i></a></li>
						</ul>
					</div>
				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyright 2018. All Rights Reserved with Omni United (S) Pte. Ltd.
					</div>

					<div class="col_half col_last tright">
						<div class="clear"></div>

						<ul class="copyrights-menu">
							<li><a href="<?= base_url('#');?>">Disclaimer</a>  |  </li>
							<li><a href="<?= base_url('#');?>">Privacy Policy</a>  |  </li>
							<li><a href="<?= base_url('#');?>">Cookie Policy</a></li>
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
		$scripts=array('jquery.js','plugins.js','functions.js');
		foreach ($scripts as $script) {
			echo '<script src="'. base_url().'assets/js/'.$script.'"></script>'.PHP_EOL;
		}
	//Extra stylesheet
		if (isset($extra_scripts)) {
			if (is_array($extra_scripts)) {
				foreach ($extra_scripts as $extra_script) {
					echo '<script src="'. base_url().'assets/js/'.$extra_script.'"></script>'.PHP_EOL;
				}
			}else{
				echo '<script src="'. base_url().'assets/js/'.$extra_scripts.'"></script>'.PHP_EOL;				
			}
		}

	?>
	<?php 
	
		$session = session(); // Get session instance 

		if($session->getFlashdata('status')):
		$type=$session->getFlashdata('status');
		$message=$session->getFlashdata('message');
	?>
	<script> 
		$('document').ready(function(){
			var elementnotify=$('.elementnotify');
			elementnotify.attr( 'data-notify-type', '<?= $type;?>' ).attr( 'data-notify-msg', '<?= $message;?>' ).html('')
		    SEMICOLON.widget.notifications( elementnotify );
		});</script>
	<?php endif; ?>

</body>
</html>