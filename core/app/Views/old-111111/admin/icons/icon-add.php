
<!-- Content
============================================= -->

<section id="content">
	<div class="content-wrap">
	<div class="elementnotify"></div>
		<div class="container clearfix">

			<div class="divcenter topmargin bottommargin" style="max-width: 700px;">

				<div class="card nobottommargin">
					<div class="card-body" style="padding: 40px;">
						<?php 
							if($error=$this->session->flashdata('status')):
								//echo "<script>jQuery('document').ready(function(){notify(".$error.", ".$this->session->flashdata('message').")});</script>";
								print_r($error.$this->session->flashdata('message'));
							endif;
						?>

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

						<h2>Edit.</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

						<?= form_open('admin/icons/save',['id'=>'icon_form']) ?>

							<div class="col_full">
								<label for="title">Title*:</label>
								<input type="title" class="form-control" id="title" name="title" placeholder="Enter title" value="<?= set_value('title'); ?>">
								<!-- <small class="help-block">A valid email address</small> -->
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label for="class">Class*:</label>
								<input type="class" class="form-control" id="class" name="class" placeholder="Enter class" value="<?= set_value('class'); ?>">
								<!-- <small class="help-block">A valid email address</small> -->
							</div>

							<div class="clear"></div>


							<div class="col_full ">
								<label for="status">Published:</label>
								<input type="checkbox" id="status" name="status" class="" >
								<small class="help-block">Check the box to get it published.</small>
							</div>

							<div class="col_full nobottommargin">
								<button type="submit" class="button button-3d button-black nomargin" id="add-new-tyre" name="Add new tyre" value="add new tyre">Add now</button>
							</div>

						<?= form_close(); ?>

					</div>
				</div>

			</div>

		</div>

	</div>

</section><!-- #content end -->