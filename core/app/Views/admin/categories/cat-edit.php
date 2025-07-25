
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

						<h2>Edit.</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

						<?= form_open('admin/cat/edit/'.$cat['category_id'],['id'=>'category_form']) ?>
							<div class="col_full">
								<label for="title">Title*:</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="Enter Category Title" value="<?= $cat['category_title'] ?>">
								<!-- <small class="help-block">A valid email address</small> -->
							</div>

							<div class="col_full">
								<label for="slug">Slug*:</label>
								<input type="text" class="form-control slug" id="slug" name="slug" placeholder="Enter Category Slug" value="<?= $cat['category_slug']; ?>">
							</div>
							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button type="submit" class="button button-3d button-black nomargin" id="add-new-tyre" name="submit" value="submit">Submit</button>
								<a href="<?= base_url('admin/cat')?>" class="button button-brown nomargin" id="add-new-tyre" name="" value="Cancel">Cancel</a>
							</div>

						<?= form_close(); ?>

					</div>
				</div>

			</div>

		</div>

	</div>

</section><!-- #content end -->