<!--CSS Style for form-->
<style type="text/css">
	/*****New form****/
	.general-hd h3 {
		font-size: 40px;
		margin-top: 40px;
		color: #DA2224;
	}
	/*.button.button-border{
		color: #DA2224;
		border-color: #DA2224;
		letter-spacing: 2px;
		text-shadow: none !important;
	}*/
	.sm-form-control::placeholder {
		color: #666;
		opacity: 1; 
		font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important; 
		letter-spacing: 0.6px; 
	}
</style>

<!--Page Title
============================================= -->

<!-- <section id="page-title" class="page-title-dark page-title-right skrollable skrollable-between" style="padding: 300px 0; background-image: url('<?= base_url('assets/img/vehicle-sponsorship.jpg') ?>'); background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 440px;" data-top-bottom="background-position:0px -500px;">

	<div class="container clearfix">
		<h1>&nbsp;</h1>
		<span>&nbsp;</span>
	</div>

</section> -->
<!-- #page-title end -->
<!-- Content
============================================= -->
<section id="content" class="clearfix">

	<div class="content-wrap">
		<div class="elementnotify"></div>

		<div class="section full-section white-bg notopmargin">
			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
					<h2>Tire Registration</h2>
				</div>
				<p>
					Please fill out the below form to register your tires with Omni United USA, Inc. Registering your tires enables us to contact you in the event of a safety recall or replacement campaign. Please note that this is not a warranty registration. Omni United will be keeping your information private and will not be sharing with any third party. We will also not be contacting you for any promotional purposes and this information will solely be used to contact you in the event of a recall/replacement. For any questions you can reach out to us at <a href="mailto:info@omni-united.com">info@omni-united.com</a>.
				</p>
			</div>
		</div>

		<section id="full-width" class="full-section white-bg ptlg pblg">

			<div class="container clearfix">

				<div class="contact-widget customjs general-information">

						<!-- Contact Form
						============================================= -->
						<?= form_open('tire-registration/submit',["class"=>"tire-registration omniform"])?>

							<div class="col_one_third">
								<input type="text" id="purchase_date" name="purchase_date" value="<?= set_value('purchase_date');?>" class="date_picker purchase-date sm-form-control required" placeholder="DATE OF PURCHASE (MM/DD/YY)*" />
							</div>
							<div class="clear"></div>

							<div class="general-hd">
								<h3>CUSTOMER INFORMATION</h3>
							</div>							
							<div class="clear"></div>

							<div class="col_one_third">
								<input type="text" id="first_name" name="first_name" value="<?= set_value('first_name');?>" class="sm-form-control required" placeholder='FIRST NAME*' />
							</div>

							<div class="col_one_third">
								<input type="text" id="last_name" name="last_name" value="<?= set_value('last_name');?>" class="sm-form-control required" placeholder='LAST NAME*' />
							</div>

							<div class="col_one_third col_last">
								<input type="email" id="email" name="email" value="<?= set_value('email');?>" class="sm-form-control email required" placeholder='EMAIL*' />
							</div>

							<div class="clear"></div>

							<div class="col_one_third">
								<input type="text" id="address_1" name="address_1" value="<?= set_value('address_1');?>" class="sm-form-control required" placeholder='STREET ADDRESS 1' />
							</div>

							<div class="col_one_third">
								<input type="text" id="address_2" name="address_2" value="<?= set_value('address_2');?>" class="sm-form-control required" placeholder='STREET ADDRESS 2' />
							</div>
							<div class="col_one_third col_last">
								<input type="text" id="city" name="city" value="<?= set_value('city');?>" class="sm-form-control required" placeholder='CITY*' />
							</div>
							<div class="clear"></div>


							<div class="col_one_third">
								<input type="text" id="state" name="state" value="<?= set_value('state');?>" class="sm-form-control required" placeholder='STATE*' />
							</div>

							<div class="col_one_third ">
								<input type="text" id="zipcode" name="zipcode" value="<?= set_value('zipcode');?>" class="sm-form-control required" placeholder='ZIP*' />
							</div>
							<div class="clear"></div>

							<div class="general-hd">
								<h3>DEALER INFORMATION</h3>									
							</div>
							<div class="clear"></div>

							<div class="col_one_third">
								<input type="text" id="dealer_name" name="dealer_name" value="<?= set_value('dealer_name');?>" class="sm-form-control required" placeholder='NAME*' />
							</div>
							<div class="clear"></div>

							<div class="col_one_third">
								<input type="text" id="dealer_address_1" name="dealer_address_1" value="<?= set_value('dealer_address_1');?>" class="sm-form-control required" placeholder='STREET ADDRESS 1' />
							</div>
							<div class="col_one_third">
								<input type="text" id="dealer_address_2" name="dealer_address_2" value="<?= set_value('dealer_address_2');?>" class="sm-form-control required" placeholder='STREET ADDRESS 2' />
							</div>
							<div class="col_one_third col_last">
								<input type="text" id="dealer_city" name="dealer_city" value="<?= set_value('dealer_city');?>" class="sm-form-control required" placeholder='CITY*' />
							</div>
							<div class="clear"></div>


							<div class="col_one_third">
								<input type="text" id="dealer_state" name="dealer_state" value="<?= set_value('dealer_state');?>" class="sm-form-control required" placeholder='STATE*' />
							</div>

							<div class="col_one_third ">
								<input type="text" id="dealer_zipcode" name="dealer_zipcode" value="<?= set_value('dealer_zipcode');?>" class="sm-form-control required" placeholder='ZIP*' />
							</div>
							<div class="clear"></div>

							<div class="general-hd">
								<h3>TIRE INFORMATION</h3>									
							</div>
							<div class="clear"></div>

							<div class="col_three_fourth">
								The DOT number is located on the lower sidewall on one side of the tire following the word DOT. Here is an example, in this photo the DOT number is 01R 7EP6RA 4219.
							</div>
							<div class="col_one_fourth col_last">
								<img src="<?= base_url('assets/img/tire-dot-number.jpg')?>" alt="">
							</div>
							<div class="clear"></div>
								
							<div class="col_one_third">
								<input type="text" id="brand" name="brand" value="<?= set_value('brand');?>" class="sm-form-control required" placeholder='Brand*' />
							</div>

							<div class="col_one_third">
								<input type="text" id="pattern" name="pattern" value="<?= set_value('pattern');?>" class="sm-form-control required" placeholder='Pattern*' />
							</div>

							<div class="clear"></div>

							<div class="tireregisection">
								<div class="regifields">
									<div class="col_one_third">
										<h4 class="bottommargin-xs">QUANTITY</h4>
										<input type="text" id="quantity_1" name="quantity[]" value="<?= set_value('quantity_1');?>" class="sm-form-control required" placeholder='QUANTITY*' />
									</div>
									<div class="col_one_third">
										<h4 class="bottommargin-xs">DOT#</h4>
										<input type="text" id="dot_1" name="dot[]" value="<?= set_value('dot_1');?>" class="sm-form-control required" placeholder='DOT#*' />
									</div>
									<div class="clear"></div>
								</div>
							</div>
							<a href="#" class="addmore" style="margin-bottom: 20px; display: inline-block;">Add more tires</a>
							<div class="col_full hidden">
								<input type="text" id="phone" name="phone" value="" class="sm-form-control" />
                                <input type="text" id="g-recaptcha" name="g-recaptcha" value="" />
                                <input type="text" id="g-recaptcha-action" name="g-recaptcha-action" value="" />
							</div>

							<div class="col_full">
								<button class="button button-border button-border-thin button-red nomargin submit" type="submit" id="submit" name="submit" value="submit">Register</button>

								<button class="button button-border button-border-thin button-red nomargin" type="reset" id="reset">Reset</button>
							</div>


							<div class="clearfix"></div>
							
							<div class="alert alert-success result" role="alert"></div>
							<div class="alert alert-danger error" role="alert"></div>
							<?php if (isset($error) && $error['status']): ?>
								<div class="col_full">
									<div class="alert alert-danger" role="alert">
										<?= $error['message']; ?>
									</div>
								</div>
							<?php endif; ?>

							<?php if (isset($result) && $result['status']): ?>
								<div class="col_full">
									<div class="alert alert-success" role="alert">
										<?= $result['message']; ?>
									</div>
								</div>
							<?php endif; ?>


						<?= form_close() ?>
				</div>
			</div>

		</section>

	</div>

</section><!-- #content end -->