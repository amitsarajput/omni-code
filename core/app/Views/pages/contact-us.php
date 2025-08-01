
<!-- Content
============================================= -->
<section id="content" class="clearfix contact-us-page">

	<div class="content-wrap">
		

		<section id="full-width" class="full-section ptlg pblg">

			<div class="container clearfix">

				<div class="heading-block  center custom-heading-block about-heading">
					<h2>Contact US</h2>
				</div>

			</div>

			<section class="contact-sec clearfix">
				<div class="container clearfix marginTBS">

					<div class="row clearfix">
						<div class="col-lg-8">
							<p class="intro">If you are interested in distributing any of our brands, looking for a dealer near you or have any other query you can contact us via the below form or you can write to us at <span style="white-space:nowrap;"><a class="blue" href="mailto:info@omni-united.com">info@omni-united.com</a></span> and we will get back to you as soon as we can.</p>

							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="adress-bar">
										<div class="adreess-name">SINGAPORE (HQ)</div>
										<p class="main-add">
										    <b>Omni United (S) Pte Ltd</b>
    										<br>2 Central Boulevard, 
    										<br>#08-04A West Tower, 
    										<br>IOI Central Boulevard,
    										<br>Singapore 018916
										</p>
										<div class="cont-bar">
											T: +65 6423 1431
											<br>F: +65 6423 0938
										</div>
										<div class="open-status">Business Hrs: 0900 – 1800 (UTC+8)<br>
										Monday – Friday</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="adress-bar">
										<div class="adreess-name">UNITED STATES</div>
										<p class="main-add">
										    <b>Omnisource United, Inc</b>
    										<br>3750 S. Watson Rd.,
    										<br>Suite 100,
    										<br>Arlington, TX 76014
										</p>
										<div class="cont-bar">
											Phone: 800-725-1482
										</div>
										<div class="open-status">
											Business Hrs: 0900 – 1800 (UTC−6 / UTC−5 DST)<br>
											Monday - Friday
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="adress-bar">
										<div class="adreess-name">United Arab Emirates</div>
										<p class="main-add">
										    <b>Omni MEA Tyres Trading DMCC</b>
    										<br>1705, Mazaya Business Avenue BB2, 
    										<br>JLTE-PH2-BB2, 
    										<br>Jumeirah Lakes Towers,
    										<br>Dubai, UAE
										</p>
										<div class="cont-bar">
											T: +971 4 457 1666
											<!--<br>F: +65 6423 0938-->
										</div>
										<div class="open-status">Business Hrs: 0900 – 1800 (UTC+4)<br>
										Monday – Friday</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="adress-bar">
										<div class="adreess-name">ITALY</div>
										<p class="main-add">
										    <b>Omni United (Italy) S.r.l.</b>
    										<br>Via Durini, 18,
    										<br>Milano (MI) 20122,
    										<br>Italy
										</p>
									</div>
								</div>
							</div>

							
							

						</div> <!--.col-lg-8 end-->

						<div class="col-lg-4">
							<div class="contact-form-main">
								
								<form action="<?= base_url('contact/submit')?>" id="contact-form" method="post" class="omniform" >					
									<span class="form-heding">
										SEND AN ENQUIRY
									</span>
									<?php if (isset($error) && $error['status']): ?>
										<div class="col_full">
											<div class="alert alert-danger" role="alert">
												<?php $error['message']; ?>
											</div>
										</div>
									<?php endif; ?>
									
									<div class="alert alert-danger error" role="alert">
									</div>
									
									<div class='clear'></div>	
									<div class="col_ful">
										<input type="text" id="" name="name" placeholder="NAME*" value="<?= (isset($result) && $result['status'])?'':set_value('name');?>" class="sm-form-control required" required />
									</div>
									<div class="col_ful">
										<input type="email" id="" name="email" placeholder="EMAIL*" value="<?= (isset($result) && $result['status'])?'':set_value('email');?>" class="sm-form-control required email" required >
									</div>
									<div class="col_ful">
									    <?php
									    $options = array(
                                                ''         => 'REGION*',
                                                'NorthAmerica'         => 'North America',
                                                'SouthAmerica'         => 'South America',
                                                'Europe'         => 'Europe',
                                                'Asia'         => 'Asia',
                                                'MiddleEastandAfrica'         => 'Middle East and Africa',
                                        );
                                        echo form_dropdown('region', $options, set_value('region'), ['class'=>'sm-form-control required']);
									    ?>
									</div>

									<div class="col_full">
										<input type="text" id="" name="country" placeholder="COUNTRY*" value="<?= (isset($result) && $result['status'])?'':set_value('country');?>" class="sm-form-control required" required>
									</div>
									<div class="col_full">
										<textarea class="required sm-form-control" id="" name="message" placeholder="MESSAGE"><?= (isset($result) && $result['status'])?'':set_value('message');?></textarea>
									</div>

        							<div class="clear"></div>
        
        							<div class="col_full hidden">
        								<input type="text" id="phone" name="phone" value="" class="sm-form-control" />
        								<input type="text" id="g-recaptcha" name="g-recaptcha" value="" />
        								<input type="text" id="g-recaptcha-action" name="g-recaptcha-action" value="" />
        							</div>

									<div class="col_full">
										<button class="button nomargin submit" name="submit" type="submit" id="submit" value="Send">Send</button>
										<span class="required-field"><i>*Required field</i></span>
									</div>

									<div class="clearfix"></div>
									
									<div class="alert alert-success result" role="alert"></div>
									
									<?php if (isset($result) && $result['status']): ?>
										<div class="col_full">
											<div class="alert alert-success" role="alert">
												<?= $result['message']; ?>
											</div>
										</div>
									<?php endif; ?>


								</form>
							</div>
						</div> <!--.col-lg-4 end-->


					</div>
				</div>
			</section>

		</section>

	</div>

</section><!-- #content end -->