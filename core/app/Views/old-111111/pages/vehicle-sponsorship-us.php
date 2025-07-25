<!--CSS Style for form-->
<style type="text/css">
	/*****New form****/
	label{
	display: inline-block;
	font-size: 18px;
	font-family: 'GothamHTF-MediumCondensed', Arial, Helvetica, sans-serif !important;
	font-weight: 500 !important;
	}
	.general-information small {
		font-size: 16px;
	}

	.section.contact-sec2.clearfix {
		padding: 60px 0;
	}
	.general-hd h3 {
		font-size: 40px;
	}
	.multi-form {
		background: #ffffff;
	}
	.general-hd h3 span {
		display: block;
		font-size: 14px;
		color: #666666 !important;
		font-family: lato;
		letter-spacing: 0;
		margin-top: 10px;
	}

	.contact-sec2 .contact-widget.general-information .sm-form-control {
		display: block;
		width: 100%;
		height: 38px;
		padding: 8px 14px;
		font-size: 15px;
		line-height: 1.42857143;
		color: #111 !important;
		background-color: transparent;
		border: 1px solid #ccc;
		border-radius: 0 !important;
		-o-transition: border-color ease-in-out .15s;


	}

	.contact-sec2 .contact-widget.general-information span.small-text {
		font-size: 13px;
		margin-top: 6px;
		display: inline-block;
	}
	.contact-sec2 .contact-widget.general-information textarea.sm-form-control{
		resize: none; 
		height: 100px;
	}
</style>

<!--Page Title
============================================= -->

<section id="page-title" class="page-title-dark page-title-right skrollable skrollable-between" style="padding: 300px 0; background-image: url('<?= base_url('assets/img/vehicle-sponsorship.jpg') ?>'); background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 440px;" data-top-bottom="background-position:0px -500px;">

	<div class="container clearfix">
		<h1>&nbsp;</h1>
		<span>&nbsp;</span>
	</div>

</section>
<!-- #page-title end -->
<!-- Content
============================================= -->
<section id="content" class="clearfix">

	<div class="content-wrap">
		<div class="elementnotify"></div>

		<div class="section full-section white-bg notopmargin">
			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
					<h2>Vehicle Sponsorship</h2>
				</div>
				<p>
					Thank you for your interest in our brands – Radar Tires, Patriot Tires and American Tourer. If you are a car enthusiast looking to enhance your vehicle we offer sponsorships and discounted purchasing programs to selected builders. We are proud to support vehicle enthusiasts who participate in custom builds, tuner, off-road and classic car clubs and events.
				</p>
				<p>
					While we would like to support all of those interested, we have a limited number of sponsorship opportunities available. Please fill out the form below and click submit and our Marketing team will get in touch with you if your submission meets our sponsorship requirements.
				</p>
			</div>
		</div>

		<section id="full-width" class="full-section white-bg multi-form contact-sec2 ptlg pblg">

			<div class="container clearfix">

				<div class="contact-widget general-information">

					<div class="contact-form-result"></div>

						<!-- Contact Form
						============================================= -->
						<?= form_open_multipart('sponsorship/submit', ['class'=>'omniform'])?>

							<div class="general-hd">
								<h3>GENERAL INFORMATION
									<span>Fields marked with* are mandatory</span>
								</h3>
							</div>
							
							<?php if (isset($error) && $error['status']): ?>
								<div class="col_full">
									<div class="alert alert-danger" role="alert">
										<?= $error['message']; ?>
									</div>
								</div>
							<?php endif; ?>
							
							<div class="alert alert-danger error" role="alert"></div>

							<div class="col_half">
								<label for="name">Name <small>*</small></label>
								<input type="text" id="name" name="name" value="<?= set_value('name');?>" class="sm-form-control required" />
								<span class="small-text">Full name of individual making sponsorship request.</span>
							</div>

							<div class="col_half col_last">
								<label for="company">Company <small>*</small></label>
								<input type="text" id="company" name="company" value="<?= set_value('company');?>" class="required sm-form-control" />
								<span class="small-text">Company or organization. If none, type N/A.</span>
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="phone">Phone <small>*</small></label>
								<input type="text" id="phone" name="phone" value="<?= set_value('phone');?>" class="required sm-form-control" />
							</div>

							<div class="col_half col_last">
								<label for="email">Email <small>*</small></label>
								<input type="email" id="email" name="email" value="<?= set_value('email');?>" class="required email sm-form-control" />
							</div>



							<div class="clear"></div>

							<div class="col_full">
								<label for="website">Website </label>
								<input type="text" id="website" name="website" value="<?= set_value('website');?>" class="sm-form-control" />
								<span class="small-text">Enter web address for your company or vehicle. You can enter a social media site, photo site or clear this field and leave blank if you don't have a website. </span>
							</div>

							<div class="col_full">
								<label for="address">Address <small>*</small></label>
								<textarea class="required sm-form-control" id="address" placeholder="Street Address*" name="address"><?= set_value('address');?></textarea>
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<input type="text" id="appartment" name="appartment" value="<?= set_value('appartment');?>" placeholder="Appartment, Suite, Bldg." class="required sm-form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_one_third">
								<input type="text" id="city" name="city" value="<?= set_value('city');?>" placeholder="City*" class="required sm-form-control" />
							</div>

							<div class="col_one_third">
								<input type="text" id="state" name="state" value="<?= set_value('state');?>" placeholder="State/ Province / Region*" class="required sm-form-control" />
							</div>


							<div class="col_one_third col_last">
								<input type="text" id="zipcode" name="zipcode" value="<?= set_value('zipcode');?>" placeholder="Postal / Zip Code*" class="required sm-form-control" />
							</div>
							<div class="clear"></div>

							<div class="general-hd ptlg">
								<h3>VEHICLE INFORMATION
									<span>Fields marked with * are mandatory</span>
								</h3>									
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label for="vehicle-owner-name">Vehicle Owner’s Name <small>*</small></label>
								<input type="text" id="vehicle-owner-name" name="vehicle-owner-name" value="<?= set_value('vehicle-owner-name');?>" class="required sm-form-control" />
							</div>
							<div class="clear"></div>


							<div class="col_one_third">
								<label for="vehicle-year">Year <small>*</small></label>
								<input type="text" id="vehicle-year" name="vehicle-year" value="<?= set_value('vehicle-year');?>" class="required sm-form-control" />
							</div>


							<div class="col_one_third">
								<label for="vehicle-make">Make <small>*</small></label>
								<input type="text" id="vehicle-make" name="vehicle-make" value="<?= set_value('vehicle-make');?>" class="required sm-form-control" />
							</div>

							<div class="col_one_third col_last">
								<label for="vehicle-model">Model <small>*</small></label>
								<input type="text" id="vehicle-model" name="vehicle-model" value="<?= set_value('vehicle-model');?>" class="required sm-form-control" />
							</div>


							<div class="clear"></div>


							<div class="col_one_third">
								<label for="vehicle-applicable-info">Applicable Vehicle Info </label>
								<input type="text" id="vehicle-applicable-info" name="vehicle-applicable-info" value="<?= set_value('vehicle-applicable-info');?>" class="sm-form-control" />
								<span style="text-align: justify;" class="small-text">i.e. engine, transmission, 2WD/4WD, cab/bed configuration, paint color</span>
							</div>


							<div class="col_one_third">
								<label for="vehicle-modifications">Current Modifications</label>
								<input type="text" id="vehicle-modifications" name="vehicle-modifications" value="<?= set_value('vehicle-modifications');?>" class="sm-form-control" />
							</div>

							<div class="col_one_third col_last">
								<label for="vehicle-sponsors">Current Sponsors</label>
								<input type="text" id="vehicle-sponsors" name="vehicle-sponsors" value="<?= set_value('vehicle-sponsors');?>" class="sm-form-control" />
								<span class="small-text">Company name, contact info and list of products</span>
							</div>


							<div class="clear"></div>


							<div class="col_half">
								<label for="vehicle-planned-modifications">Planned Modifications</label>
								<input type="text" id="vehicle-planned-modifications" name="vehicle-planned-modifications" value="<?= set_value('vehicle-planned-modifications');?>" class="sm-form-control" />
								<span class="small-text">List modifications that will be made to vehicle in near future.</span>
							</div>


							<div class="col_half col_last">
								<label for="vehicle-photo">Upload Photo of your Vehicle <small>*</small></label>
								<input type="file" id="vehicle-photo" name="vehicle-photo" value="<?= set_value('vehicle-photo');?>" class="required sm-form-control" />
								<span class="small-text">Upload vehicle photo or proposed rendering of completed project. Allowed File types JPG/PNG. Max file size 10MB.</span>
							</div>

							<div class="clear"></div>

							<div class="general-hd ptlg">
								<h3>SPONSORSHIP REQUEST
									<span>Fields marked with * are mandatory</span>
								</h3>
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label for="sponsorship-request">What are you requesting from Omni United? *</label>
								<input type="text" id="sponsorship-request" name="sponsorship-request" value="<?= set_value('sponsorship-request');?>" class="required sm-form-control" />
								<span class="small-text">Brand, Pattern, Size, Number of tires</span>
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label for="sponsorship-promotions">List off-road shows and events where your vehicle will be promoted during the next 12 months</label>
								<textarea id="sponsorship-promotions" name="sponsorship-promotions" value="" class="sm-form-control" /><?= set_value('sponsorship-promotions');?></textarea> 
								<span class="small-text">Event names, dates, and locations</span>
							</div>



							<div class="clear"></div>

							<div class="col_full">
								<label for="sponsorship-social">Tell us about your personal social media plans</label>
								<textarea type="text" id="sponsorship-social" name="sponsorship-social" class="sm-form-control"><?= set_value('sponsorship-social');?></textarea>
								<span class="small-text">List sites, page names, page following, number/frequency of posts</span>
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label for="sponsorship-promotion-plans">List of promotional plans for the vehicle</label>
								<input type="file" id="sponsorship-promotion-plans" name="sponsorship-promotion-plans" value="<?= set_value('sponsorship-promotion-plans');?>" class="sm-form-control" />
								<span class="small-text">i.e. magazine features, corporate event promotions, tv appearances, etc</span>
							</div>



							<div class="clear"></div>

							<div class="col_full">
								<label for="sponsorship-other-info">Other info you wish to tell us concerning sponsorship request</label>
								<input type="text" id="sponsorship-other-info" name="sponsorship-other-info" value="<?= set_value('sponsorship-other-info');?>" class="sm-form-control" />

							</div>
							<div class="clear"></div>

							<div class="col_full">
								<label for="proposal-submission">Proposal Submission <small>*</small></label>
								<input type="file" id="proposal-submission" name="proposal-submission" value="<?= set_value('proposal-submission');?>" class="required sm-form-control" />
								<span class="small-text">If you have a formal proposal, please upload it here. Allowed File types PDF/DOC. Max file size 10MB.</span>
							</div>

							<div class="clear"></div>


							<div class="col_full hidden">
								<input type="text" id="botcheck" name="botcheck" value="" class="sm-form-control" />
                                <input type="text" id="g-recaptcha" name="g-recaptcha" value="" />
                                <input type="text" id="g-recaptcha-action" name="g-recaptcha-action" value="" />
								
							</div>

							<div class="col_full topmargin-sm">
								<button class="button button-border button-border-thin button-red nomargin submit" type="submit" id="submit" name="submit" value="submit">Send</button>
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

						<?= form_close() ?>
				</div>
			</div>

		</section>

	</div>

</section><!-- #content end -->