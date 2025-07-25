<!-- CSS Style for form -->
<style type="text/css">
	/*****New form****/
	.general-hd h3 {
		font-size: 40px;
		margin-top: 30px;
		color: #DA2224;
		text-transform: uppercase;
	}
	.sm-form-control::placeholder {
		color: #666;
		opacity: 1; 
		font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important; 
		letter-spacing: 0.6px; 
	}
	.distributers-login{
		padding: 70px 50px 40px;
		box-shadow: 0 0 5px rgba(0,0,0,0.3);
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

		<section id="full-width" class="full-section white-bg ptlg pblg">

			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
					<h2 class="ColorRed">Dealer corner</h2>
				</div>
				<div class="distributers-login center mx-auto" style="max-width: 450px;">
					<?php
						if (isset($_SESSION['distributer']) && $_SESSION['distributer']['logged_in']) {
							redirect('/dealer-page');
							print_r($_SESSION['distributer']);
						}
						
						//unset($_SESSION['distributer']);
					?>

					<div class="contact-widget customjs general-information">

							<!-- Contact Form
							============================================= -->
							<?= form_open('dealer-login/submit',["class"=>"distributer-login omniform"])?>							
								<div class="clear"></div>

								<div class="col_full hidden">
									<input type="text" id="phone" name="phone" value="" class="sm-form-control"  />
								</div>
								<div class="clear">	</div>

								<div class="col_full">
									<input type="text" id="username" name="username" value="<?= set_value('username');?>" class="sm-form-control required" placeholder='Username' />
								</div>
								<div class="clear">	</div>

								<div class="col_full">
									<input type="password" id="password" name="password" value="<?= set_value('password');?>" class="sm-form-control required" placeholder='Password' />
								</div>

								<div class="clear"></div>


								<div class="col_full">
									<button class="button button-border button-border-thin button-red nomargin" type="submit" id="submit" name="submit" value="submit">Login</button>

									<!--<button class="button button-border button-border-thin button-red nomargin" type="reset" id="reset">Reset</button>-->
								</div>


								<div class="clearfix"></div>


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

			</div>

		</section>

	</div>

</section><!-- #content end -->