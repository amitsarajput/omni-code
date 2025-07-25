
<!-- Content
============================================= -->

<?php

if ($tires) {
	$features=json_decode( $tires['features'], true );
}
//print_r($features);

?>
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

						<h2>Update Features.</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

						<?= form_open_multipart('admin/tire/features/'.$tires['id'],['id'=>'form_tire_add']) ?>

							<div class="col_half">
								<label for="title">Title*:</label>
								<p class="lead"><?= htmlspecialchars_decode($tires['title']); ?></p>
							</div>

							<div class="col_half col_last">
								<label for="brand">Brand*:</label>
								<p class="lead"><?= strtoupper($tires['brand_title']); ?></p>
							</div>

							<div class="clear"></div>

							<?php if ($features) : ?>

							<div id="features_section" class="col_full ">
								<label for="features">Features:</label>
								<input type="hidden" class="features_num" value="<?= count($features); ?>">
								<?php $i=1; foreach ($features as $feature) { 
								    $feature_title=htmlspecialchars_decode($feature['title']);
								    $feature_title=str_replace('"', "'", $feature_title);
								
								?>
									
									<div id="feature<?= $i; ?>" class="card bottommargin-xs">
										<div class="card-body">
											<div class="form-group">
												<div class="col_two_third">
													<label for="feature_title">Feature:</label>
													<input type="text" class="form-control bottommargin-xs" id="feature_title" name="feature_title[]" placeholder="Enter Feature Title"  value="<?= $feature_title; ?>" />
													<textarea class="form-control bottommargin-xs" id="feature_desc" name="feature_desc[]" placeholder="Enter Feature Description"><?= htmlspecialchars_decode($feature['description']); ?></textarea>
													<input id="" name="feature_image[]" type="file" class="form-control-file feature-image-upload" value="">
												</div>
												<div class="col_last col_one_third">
													<?php if($i===1){ ?>
													<a href="#" class="button button-border button-rounded button-amber topmargin-sm bottommargin-sm" id="add_feature"><i class="icon-line-plus"></i>Add Features</a>
													<?php } else{ ?>
													<a data-removecard='feature<?= $i; ?>' href='#' class='button button-border button-rounded button-red topmargin-sm bottommargin-sm remove_feature' ><i class='icon-line-cross'></i>Remove</a>
													<?php } ?>
													<?php if (!empty($feature['image'])) { ?>
													<img class="feature-thumb" src="<?= base_url('storage/features/'.$feature['image']); ?>" alt="">
													<?php } else{ ?>
													<img class="feature-thumb" src="<?= base_url('uploads/features/noimage.jpg'); ?>" alt="">
													<?php } ?>
		
												</div>
											</div>
										</div>
									</div>

								<?php $i++;  } ?>
							</div>

							<div class="col_full nobottommargin">
								<button type="submit" class="button button-blue nomargin" id="add-new-tyre" name="submit" value="submit">SUBMIT</button>
								<a href="<?= base_url('admin/tire')?>" class="button button-brown nomargin" id="add-new-tyre" name="Add new tyre" value="Cancel">Cancel</a>
							</div>

							<?php else: ?>

							<div id="features_section" class="col_full ">
								<label for="features">Features:</label>
								<input type="hidden" class="features_num" value="">

									<div id="feature" class="card bottommargin-xs">
										<div class="card-body">
											<div class="form-group">
												<div class="col_two_third">
													<label for="feature_title">Feature:</label>
													<input type="text" class="form-control bottommargin-xs" id="feature_title" name="feature_title[]" placeholder="Enter Feature Title"  value="">
													<textarea class="form-control bottommargin-xs" id="feature_desc" name="feature_desc[]" placeholder="Enter Feature Description"></textarea>
													<input id="" name="feature_image[]" type="file" class="form-control-file feature-image-upload" value="">
												</div>
												<div class="col_last col_one_third">

													<a href="#" class="button button-border button-rounded button-amber topmargin-sm bottommargin-sm" id="add_feature"><i class="icon-line-plus"></i>Add Features</a>

													<img class="feature-thumb" src="<?= base_url('uploads/features/noimage.jpg'); ?>" alt="">
		
												</div>
											</div>
										</div>
									</div>
							</div>
	
							<div class="col_full nobottommargin">
								<button type="submit" class="button button-blue nomargin" id="add-new-tyre" name="submit" value="submit">SUBMIT</button>
								<a href="<?= base_url('admin/tire')?>" class="button button-brown nomargin" id="add-new-tyre" name="Add new tyre" value="Cancel">Cancel</a>
							</div>

							<?php endif; ?>


						<?= form_close(); ?>

					</div>
				</div>

			</div>

		</div>

	</div>

</section><!-- #content end -->