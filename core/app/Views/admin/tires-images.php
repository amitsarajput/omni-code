
<!-- Content
============================================= -->

<?php

if ($tires) {
	$image=json_decode( $tires['image'], true );
}

?>
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

						<h2>Update Images.</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>


						<div class="col_half">
							<label for="title">Title*:</label>
							<p class="lead"><?= htmlspecialchars_decode($tires['title']); ?></p>
						</div>

						<div class="col_half col_last">
							<label for="brand">Brand*:</label>
							<p class="lead"><?= strtoupper($tires['brand_title']); ?></p>
						</div>

						<div class="card bottommargin-sm">							
							<div class="card-body" style="padding: 40px;">
								<h3 class="bottommargin-xs">Manage Images</h3>
								<div class="sortable-wrapper image-sortable">

									<?php 								
										if (!empty($image['other'])) :
									?>
									<ul class="sortable">
										<?php foreach ($image['other'] as $key => $value) : ?>
											<li id="<?= $value ?>" class="ui-state-default"><img src="<?= base_url('storage/tire_images/other/'.$value); ?>" alt="">
												<span><?= $value; ?></span>
												<a data-url="<?= base_url('admin/tire/image-delete'); ?>" data-image="<?= $value; ?>"  href="#" class="remove">x</a>
											</li>
										<?php endforeach; ?>
									</ul>
									<a href="#" data-url="<?= base_url('admin/tire/images-reorder'); ?>" data-id="<?= $tires['id']; ?>" data-type="tire" data-action="reorder" data-elements="image" class="button button-mini button-blue button-rounded nomargin reorder" name="reorder" >Save Order</a>
									<div class="result"></div>
									<?php else: ?>
										<p>no files.</p>
									<?php endif; ?>
								</div>

							</div>
						</div>

						<?= form_open_multipart('admin/tire/images/'.$tires['id'],['id'=>'form_tire']) ?>

							<div class="col_full bottommargin">
								<label>Featured Image for Tyre</label><br>
								<input id="featured-image" name="featured" type="file" class="file-loading image_upload" value="<?= $image['featured'];?>" data-show-upload="false" data-show-preview="false">
								<small class="help-block">Replace existing featured image.</small>
								<div id="errorBlock" class="form-text"></div>
							</div>

							<div class="col_full bottommargin">
								<label>Select Tyre Images:</label><br>
								<input id="tyre-image" class="image_upload" name="other[]" type="file" class="file" multiple data-show-upload="false"  value=""  data-show-preview="true">
								<small class="help-block">To add more images upload here.</small>
								<div id="errorBlock" class="form-text"></div>
							</div>


							<div class="col_full bottommargin">
								<label>Replace</label><br>
								<input type="checkbox" name="replace">
								<small class="help-block">To Replace all images with new check this.</small>
								<div id="errorBlock" class="form-text"></div>
							</div>

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