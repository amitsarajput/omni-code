
<!-- Content
============================================= -->

<?php
//print_r($tires);
//print_r($video_section);

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

						<?= form_open_multipart('admin/tire/video-section/'.$tires['id'],['id'=>'form_tire_add', 'class'=>'repeater-default']) ?>
						<input name="tyre_id" type="hidden" value="<?= $tires['id'] ?>">
						<div class="col_half">
							<label for="title">Title*:</label>
							<p class="lead"><?= htmlspecialchars_decode($tires['title']); ?></p>
						</div>

						<div class="col_half col_last">
							<label for="brand">Brand*:</label>
							<p class="lead"><?= strtoupper($tires['brand_title']); ?></p>
						</div>
						
						<div class="clear"></div>
						
						<div class="col_full">
							<label for="content">Description:</label>
							<textarea class="form-control" id="content" name="content" placeholder="Enter content" rows="8" ><?= htmlspecialchars_decode($video_section['content']); ?></textarea>
							<input name="id" type="hidden" value="<?= $video_section['id'] ?>">
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


