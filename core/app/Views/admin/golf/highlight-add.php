
<!-- Content
============================================= -->

<section id="content">
	<div class="content-wrap">
	<div class="elementnotify"></div>
		<div class="container clearfix">

			<div class="divcenter topmargin bottommargin" style="max-width: 700px;">

				<div class="card nobottommargin">
					<div class="card-body" style="padding: 40px;">

						<?php if (isset($error) && $error['status']) : ?>
							<div class="col_full">
								<div class="alert alert-danger" role="alert">
									<?= $error['message']; ?>
								</div>
							</div>
						<?php endif; ?>

						<h2>Add.</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

						<?= form_open('admin/golf-highlight/add', [], ['post_type'=>'highlight'] ) ?>
							<div class="col_full">
								<label for="title">Title*:</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="Enter Category Title" value="<?= set_value('title'); ?>">
								<!-- <small class="help-block">A valid email address</small> -->
							</div>

							<div class="col_full">
								<label for="location">Location*:</label>
								<input type="text" class="form-control location" id="location" name="location" placeholder="Enter Location" value="<?= set_value('location'); ?>">
							</div>
							<div class="clear"></div>

							<div class="col_half">
								<label for="pos">POS*:</label>
								<input type="text" class="form-control pos" id="pos" name="pos" placeholder="Enter Position" value="<?= set_value('pos'); ?>">
							</div>

							<div class="col_half col_last">
								<label for="end_date">End Date*:</label>
								<input type="text" class="form-control date_picker end_date" id="end_date" name="end_date" placeholder="Enter End Date" value="<?= set_value('end_date'); ?>">
							</div>
							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button type="submit" class="button button-3d button-black nomargin" id="add-record" name="submit" value="submit">Submit</button>
								<a href="<?= base_url('admin/golf-tournaments')?>" class="button button-brown nomargin">Cancel</a>
							</div>

						<?= form_close(); ?>

					</div>
				</div>

			</div>

		</div>

	</div>

</section><!-- #content end -->