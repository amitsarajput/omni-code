
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

						<h2>Press Release Edit.</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

						<?= form_open_multipart('admin/news/edit/'.$record['id'],['id'=>'news_form']); ?>

							<div class="col_full bottommargin-sm">
								<label for="ima">Featured Image:</label><br>
								<input id="ima" class="image_upload" name="featured_image[]" type="file" class="file" data-show-upload="false"  value=""  data-show-preview="true">
								<small class="help-block">Upload Featured image here.</small>
								<div id="errorBlock" class="form-text"></div>
							</div>

                            <div class="col_full">
								<label for="featured_image_position">Image Position*:</label>
								<input type="featured_image_position" class="form-control" id="featured_image_position" name="featured_image_position" placeholder="Enter featured_image_position" value="<?= $record['featured_image_position']; ?>">
							</div>
							

							<div class="col_full">
								<label for="title">Title*:</label>
								<input type="title" class="form-control" id="title" name="title" placeholder="Enter title" value="<?= $record['title']; ?>">
							</div>

							<div class="col_full">
								<label for="sub_title">Sub Title:</label>
								<input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Enter Sub title" value="<?= $record['sub_title']; ?>">
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="slug">Slug*:</label>
								<input type="slug" class="form-control slug" id="slug" name="slug" placeholder="Enter slug" value="<?= $record['slug']; ?>">
							</div>

							<div class="col_half col_last">
								<label for="source">Source*:</label>
								<?php 
								$source=json_decode($record['source']);
								$source_string="";
								foreach ($source as $key => $value) {
									$source_string.=$value.PHP_EOL;
								}
								?>
								<textarea name="source" id="source" class="form-control " rows="3"><?= $source_string; ?></textarea>
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label for="excerpt">Excerpt*:</label><br>
								<textarea name="excerpt" id="excerpt" rows="3" class="form-control"><?= $record['excerpt']; ?></textarea>
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label for="description">Description*:</label><br>
								<textarea name="description" id="description" rows="6" class="form-control"><?= $record['description']; ?></textarea>
							</div>

							<div class="col_full">
								<label for="published_on">Published Date</label>
								<div class="form-group">
									<div class="input-group tleft" data-target-input="nearest" data-target=".datetimepicker">
										<input type="text" name="published_on" class="form-control datetimepicker-input datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-target=".datetimepicker" placeholder="" value="<?= $record['published_on']; ?>" />
										<div class="input-group-append" data-target=".datetimepicker" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="icon-calendar"></i></div>
										</div>
									</div>
								</div>
							</div>

							<div class="clear"></div>								

							<div class="col_full nobottommargin">
								<button type="submit" class="button button-3d button-black nomargin" id="add-new-tyre" name="submit">Submit</button>
								<a href="<?= base_url('admin/pr')?>" class="button button-brown nomargin" id="add-new-tyre" name="Add new tyre" value="Cancel">Cancel</a>
							</div>

						<?= form_close(); ?>

					</div>
				</div>

			</div>

		</div>

	</div>

</section><!-- #content end -->