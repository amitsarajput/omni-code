
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

						<h2>Add.</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

						<?= form_open('admin/mc/edit/'.$mc['id'],['id'=>'form']); ?>

							<div class="col_full">
								<label for="title">Title*:</label>
								<input type="title" class="form-control" id="title" name="title" placeholder="Enter title" value="<?= $mc['title']; ?>">
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="slug">Slug*:</label>
								<input type="slug" class="form-control slug" id="slug" name="slug" placeholder="Enter slug" value="<?= $mc['slug']; ?>">
							</div>

							<div class="col_half">
								<label for="media_house">Media House*:</label>
								<input type="text" class="form-control" id="media_house" name="media_house" placeholder="Media House" value="<?= $mc['media_house']; ?>">
							</div>
							<div class="col_half col_last">
								<label for="hyperlink">Link*:</label>
								<input type="text" class="form-control" id="hyperlink" name="hyperlink" placeholder="Enter Hyperlink" value="<?= $mc['hyperlink']; ?>">
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="category">Category*:</label>
								<?php 
								if ($cs) {
									$c_options=array();
									foreach ($cs as $c) {
									 	$c_options[$c['category_id']]=ucfirst($c['category_title']);
									}
									echo form_dropdown('category', $c_options, $mc['category'] ,["id"=>"category", "class"=>"form-control"]);
								}
								?>
								<small class="help-block">Select a category option you want.</small>
							</div>

							<div class="col_half col_last">
								<label for="published_on">Published Date</label>
								<div class="form-group">
									<div class="input-group tleft" data-target-input="nearest" data-target=".datetimepicker">
										<input type="text" name="published_on" class="form-control datetimepicker-input datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-target=".datetimepicker" placeholder="" value="<?= $mc['published_on']; ?>" />
										<div class="input-group-append" data-target=".datetimepicker" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="icon-calendar"></i></div>
										</div>
									</div>
								</div>
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label for="description">Description*:</label><br>
								<textarea name="description" id="description" rows="6" class="form-control"><?= $mc['description']; ?></textarea>
							</div>			

							<div class="clear"></div>				

							<div class="col_full nobottommargin">
								<button type="submit" class="button button-3d button-black nomargin" id="add-new-tyre" name="submit" value="submit">Submit</button>
								<a href="<?= base_url('admin/mc')?>" class="button button-brown nomargin" id="add-new-tyre" name="" value="Cancel">Cancel</a>
							</div>

						<?= form_close(); ?>

					</div>
				</div>

			</div>

		</div>

	</div>

</section><!-- #content end -->