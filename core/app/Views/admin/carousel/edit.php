
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
						<?php $post=json_decode( $record['post_meta'], true ); ?>
						
						<?= form_open_multipart('admin/carousel/edit/'.$record['id'], ['id'=>'uploadform'], ['post_type'=>'carousel'] ) ?>

							<div class="col_full bottommargin-sm">
								<label for="ima">Select Images:</label><br>
								<input id="ima" class="image_upload" name="items[]" type="file" class="file" multiple data-show-upload="false"  value=""  data-show-preview="false">
								<small class="help-block">To add more images upload here.</small>
								<div id="errorBlock" class="form-text"></div>
							</div>
							<div class="clear"></div>

							<div class="col_full bottommargin-sm">
								<label for="rep">Replace</label><br>
								<input type="checkbox" name="replace" id="rep">
								<small class="help-block">To Replace all images with new check this.</small>
								<div id="errorBlock" class="form-text"></div>
							</div>

							<div class="col_full nobottommargin">
								<button type="submit" class="button button-border button-sm button-rounded button-pink nomargin" id="add-record" name="upload" value="upload">Upload Images</button>
							</div>

						<?= form_close(); ?>

						<?= form_open('admin/carousel/edit/'.$record['id'], ['id'=>'dataform'], ['post_type'=>'carousel','images'=>json_encode( $post['images'] )] ) ?>

							<div class="col_full">
								<label for="title">Title*:</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?= set_value('title')?set_value('title'):$post['title']; ?>">
							</div>

							<div class="col_full">
								<label for="attached_to">Page Slug*:</label>
								<input type="text" class="form-control slug" id="attached_to" name="attached_to" placeholder="Enter Page Slug" value="<?= set_value('attached_to')?set_value('attached_to'):$record['attached_to']; ?>">
							</div>
							<div class="clear"></div>

							<div class="sortable-wrapper image-sortable">
								<?php 								
									if (!empty($post['images'])) :
								?>
								<ul class="sortable">
									<?php foreach ($post['images'] as $key => $value) : ?>
										<li id="<?= $value ?>" class="ui-state-default"><img src="<?= base_url('uploads/carousel_images/'.$value); ?>" alt="">
											<span><?= $value; ?></span>
											<a href="#" class="remove">x</a>
										</li>
									<?php endforeach; ?>
								</ul>
								<a href="#" data-field="images" class="button button-mini button-blue button-rounded nomargin save-order" >Save Order</a>
								<div class="result"></div>
								<?php else: ?>
									<p>Please upload images.</p>
								<?php endif; ?>
							</div>

							<div class="clear"></div>


							<div class="col_full nobottommargin  topmargin-sm">
								<button type="submit" class="button button-3d button-black nomargin" id="add-record" name="submit" value="submit">Submit</button>
								<a href="<?= base_url('admin/carousels')?>" class="button button-brown nomargin">Cancel</a>
							</div>

						<?= form_close(); ?>

					</div>
				</div>

			</div>

		</div>

	</div>

</section><!-- #content end -->