
<!-- Content
============================================= -->

<?php

// if ($tires) {
// 	$sizes=json_decode( $tires['sizes'], true );
// }
//print_r($sizes);

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

						<h2>Update Sizes.</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

						<?= form_open_multipart('admin/tire/sizes/'.$tires['id'],['id'=>'form_tire_add']) ?>

							<div class="col_half">
								<label for="title">Title*:</label>
								<p class="lead"><?= htmlspecialchars_decode($tires['title']); ?></p>
							</div>


							<div class="col_half col_last">
								<label for="brand">Brand*:</label>
								<p class="lead"><?= strtoupper($tires['brand_title']); ?></p>
							</div>

							<div class="clear"></div>

							<div class="col_full ">
								<label for="features">Sizes:</label>								
								<div class="form-group">
									<div class="col_half">
										<label for="feature_title">Old sizes:</label><br>
										<a href="<?= base_url('xlsx/'.$tires['oldsizes']); ?>" class="button button-rounded button-small button-green tright" download ><span>Download</span><i class="icon-line2-cloud-download"></i></a>
									</div>
									<div class="col_half col_last">
										<label for="feature_title">Upload new sizes:</label>
										<input id="" name="sizes" type="file" class="form-control-file excels" value="">
									</div>
								</div>
								<!-- <small class="help-block">Will be created from title if left blank.</small> -->
							</div>

							<?php $ec=json_decode($tires['sizes_extra_columns']); ?>		
							<div class="col_full ">
								<label for="sizes_extra_columns">Extra Columns:</label><br>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="s_w" name="sizes_extra_columns[]" value="s_w" <?= !empty($ec) && in_array('s_w', $ec)?'checked':'' ?>>
									<label class="form-check-label" for="s_w">
										Sidewall
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="weather" name="sizes_extra_columns[]" value="weather" <?= !empty($ec) && in_array('weather', $ec)?'checked':'' ?>>
									<label class="form-check-label" for="weather">
										Wet Grip
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="fuel" name="sizes_extra_columns[]" value="fuel" <?= !empty($ec) && in_array('fuel', $ec)?'checked':'' ?>>
									<label class="form-check-label" for="fuel">
										Fuel Efficiency
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="noise_db" name="sizes_extra_columns[]" value="noise_db" <?= !empty($ec) && in_array('noise_db', $ec)?'checked':'' ?>>
									<label class="form-check-label" for="noise_db">
										External Rolling Noise in Decibels
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="mark" name="sizes_extra_columns[]" value="mark" <?= !empty($ec) && in_array('mark', $ec)?'checked':'' ?>>
									<label class="form-check-label" for="mark">
										Mark
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="eulabel" name="sizes_extra_columns[]" value="eulabel" <?= !empty($ec) && in_array('eulabel', $ec)?'checked':'' ?>>
									<label class="form-check-label" for="eulabel">
										Labeling Info
									</label>
								</div>
								<small class="help-block">Choose extra columns.</small>
							</div>

							<div class="col_full">
								<label for="legend">Legend:</label>
								<textarea class="form-control" id="legend" name="legend" placeholder="Enter Legend" ><?= htmlspecialchars_decode($tires['legend']) ?></textarea>
								<small class="help-block">Enter legends with html markup. Use [ ' ] instead of [ " ].</small>
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