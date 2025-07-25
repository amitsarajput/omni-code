<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">

			<div class="divcenter topmargin bottommargin" style="max-width: 500px;">

				<div class="card bottommargin topmargin">
					<div class="card-body" style="padding: 40px;">

						<?= form_open() ?>

							<h3>Login to your Account</h3>

							<div class="col_full">
								<label for="username">Username:</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Your username" value="<?= set_value('username'); ?>">
							</div>

							<div class="col_full">
								<label for="password">Password:</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Your password">
							</div>

							<div class="col_full nobottommargin">
								<button type="submit" class="button button-3d button-black nomargin" id="login-form-submit" value="login">Login</button>
								<a href="#" class="fright">Forgot Password?</a>
							</div>

							<?php if (validation_errors()) : ?>
								<div class="col_full topmargin">
									<div class="alert alert-danger" role="alert">
									<?= validation_list_errors() ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if (isset($error)) : ?>
								<div class="col_full topmargin">
									<div class="alert alert-danger" role="alert">
										<?= $error ?>
									</div>
								</div>
							<?php endif; ?>

						</form>
					</div>
				</div>

			</div>

		</div>

	</div>

</section><!-- #content end -->
