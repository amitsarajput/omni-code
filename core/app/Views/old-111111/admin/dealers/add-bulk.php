
<!-- Content
============================================= -->

<section id="content">
	<div class="content-wrap">
	<div class="elementnotify"></div>

		<div class="container clearfix">

			<div class="divcenter topmargin bottommargin" style="max-width: 700px;">

				<div class="card nobottommargin">
					<div class="card-body" style="padding: 40px;">	
										
						<?php if (isset($error) && $error['status']): ?>
							<div class="col_full">
								<div class="alert alert-danger" role="alert">
									<?= $error['message']; ?>
								</div>
							</div>						
						<?php endif; ?>

						<h2>Press Release Add.</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

						<?= form_open_multipart('admin/dealers/add-bulk'); ?>
						    

							<div class="clear"></div>

							<div class="col_full ">
								<label for="features">Sizes:</label>								
								<div class="form-group">
									<div class="col_half">
										<label for="feature_title">Old Dealers:</label><br>
										<a href="#" class="button button-rounded button-small button-green tright" download ><span>Download</span><i class="icon-line2-cloud-download"></i></a>
									</div>
									<div class="col_half col_last">
										<label for="feature_title">Upload Dealers:</label><br>
										<input id="" name="dealers" type="file" class="form-control-file dealers" value="">
									</div>
								</div>
								<!-- <small class="help-block">Will be created from title if left blank.</small> -->
							</div>

							<div class="clear"></div>							

							<div class="col_full nobottommargin">
								<button type="submit" class="button button-3d button-black nomargin" id="add-news" name="submit">Submit</button>
								<a href="<?= base_url('admin/dealers')?>" class="button button-brown nomargin" id="add-news" name="Add news" value="Cancel">Cancel</a>
							</div>

						<?= form_close(); ?>

					</div>
				</div>

			</div>

		</div>

	</div>

</section><!-- #content end -->