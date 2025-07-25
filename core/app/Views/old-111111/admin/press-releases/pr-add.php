
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

						<?= form_open('admin/pr/save',['id'=>'pr_form']); ?>

							<div class="col_full">
								<label for="title">Title*:</label>
								<input type="title" class="form-control" id="title" name="title" placeholder="Enter title" value="<?= set_value('title'); ?>">
							</div>

							<div class="col_full">
								<label for="sub_title">Sub Title:</label>
								<input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Enter Sub title" value="<?= set_value('sub_title'); ?>">
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="slug">Slug*:</label>
								<input type="slug" class="form-control slug" id="slug" name="slug" placeholder="Enter slug" value="<?= set_value('slug'); ?>">
							</div>

							<div class="col_half col_last">
								<label for="category">Category*:</label>
								<?php 
								if ($cprs) {
									$cpr_options=array();
									foreach ($cprs as $cpr) {
									 	$cpr_options[$cpr['category_id']]=ucfirst($cpr['category_title']);
									}
									echo form_dropdown('category', $cpr_options, set_value('category') ,["id"=>"category", "class"=>"form-control"]);
								}
								?>
								<small class="help-block">Select a category option you want.</small>
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label for="description">Description*:</label><br>
								<textarea name="description" id="description" rows="6" class="form-control"><?= set_value('description'); ?></textarea>
							</div>

							<div class="col_full">
								<label for="published_on">Published Date</label>
								<div class="form-group">
									<div class="input-group tleft" data-target-input="nearest" data-target=".datetimepicker">
										<input type="text" name="published_on" class="form-control datetimepicker-input datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-target=".datetimepicker" placeholder="" value="<?= set_value('published_on'); ?>" />
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