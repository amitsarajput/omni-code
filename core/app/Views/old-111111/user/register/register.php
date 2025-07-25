
<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">

			<div class="divcenter topmargin bottommargin" style="max-width: 700px;">

				<div class="card nobottommargin">
					<div class="card-body" style="padding: 40px;">

						<?php if (validation_errors()) : ?>
							<div class="col_full">
								<div class="alert alert-danger" role="alert">
									<?= validation_errors() ?>
								</div>
							</div>
						<?php endif; ?>
						<?php if (isset($error)) : ?>
							<div class="col_full">
								<div class="alert alert-danger" role="alert">
									<?= $error ?>
								</div>
							</div>
						<?php endif; ?>

						<h2>Don't have an Account? Register Now.</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

						<?= form_open() ?>

							<div class="col_half">
								<label for="name">Name*:</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?= set_value('name'); ?>">
							</div>

							<div class="col_half col_last">
								<label for="email">Email Address*:</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?= set_value('email'); ?>">
								<small class="help-block">A valid email address</small>
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="register-form-username">Choose a Username*:</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Enter a username" value="<?= set_value('username'); ?>">
								<small class="help-block">At least 4 characters, letters or numbers only</small>
							</div>

							<div class="col_half col_last">
								<label for="phone">Phone:</label>
								<input type="text" id="phone" name="phone" value="<?= set_value('username'); ?>" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="password">Choose Password*:</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
								<small class="help-block">At least 6 characters</small>
							</div>

							<div class="col_half col_last">
								<label for="register-form-repassword">Re-enter Password*:</label>
								<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
								<small class="help-block">Must match your password</small>
							</div>

							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button type="submit" class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
							</div>

						</form>

					</div>
				</div>

			</div>

		</div>

	</div>

</section><!-- #content end -->