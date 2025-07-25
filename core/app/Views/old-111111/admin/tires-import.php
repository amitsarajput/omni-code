
<!-- Content
============================================= -->

<?php


?>
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">

			<div class="divcenter topmargin bottommargin" style="max-width: 800px;">

				<div class="card nobottommargin">
					<div class="card-body" style="padding: 40px;">

						<?php if (isset($error) && $error['status']): ?>
							<div class="col_full">
								<div class="alert alert-danger" role="alert">
									<?= $error['message']; ?>
								</div>
							</div>						
						<?php endif; ?>

						<h2>Edit Tyre.</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>


						<div class="col_half nobottommargin">
							<label for="title">Title*:</label>
							<p class="lead"><?= htmlspecialchars_decode($tires['title']); ?></p>
						</div>

						<div class="col_half col_last nobottommargin">
							<label for="brand">Brand*:</label>
							<p class="lead"><?= strtoupper($tires['brand_title']); ?></p>
						</div>

						<div class="clear"></div>

						<?= form_open_multipart('admin/tire/import/'.$id); ?>					

							<div class="col_full">
								<label for="tyre-import">Import Tyre <small>*</small></label>
								<input type="file" id="tyre-import" name="tyre-import" value="<?= set_value('tyre-import');?>" class="required sm-form-control" />
								<span class="small-text">File upload.</span>
							</div>

							<div class="col_full hidden">
								<input type="hidden" id="botcheck" name="botcheck" value="" class="sm-form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button type="submit" class="button button-blue nomargin" id="add-new-tyre" name="submit" value="submit">SUBMIT</button>
								<a href="<?= base_url('admin/tire')?>" class="button button-brown nomargin" id="add-new-tyre" name="Add new tyre" value="Cancel">Cancel</a>
							</div>

						<?= form_close(); ?>

					</div>
				</div>

			</div>

		</div>

	</div>

</section><!-- #content end -->