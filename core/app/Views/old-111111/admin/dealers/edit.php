
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

						<?= form_open('admin/dealers/edit/'.$record['id']); ?>
							<div class="col_full">
								<label for="title">Dealer*:</label>
								<input type="text" class="form-control" id="dealer" name="dealer" placeholder="Dealer" value="<?= $record['dealer']; ?>">
							</div>

							<div class="col_full">
								<label for="title">Title*:</label>
								<input type="title" class="form-control" id="title" name="title" placeholder="Title" value="<?= $record['title']; ?>">
							</div>

							<div class="col_full">
								<label for="sub_title">Address:</label>
								<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?= $record['address']; ?>">
							</div>

							<div class="clear"></div>

							<div class="col_one_fourth">
								<label for="sub_title">City:</label>
								<input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?= $record['city']; ?>">
							</div>

							<div class="col_one_fourth">
								<label for="sub_title">State:</label>
								<input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?= $record['state']; ?>">
							</div>

							<div class="col_one_fourth">
								<label for="sub_title">Country:</label>
								<input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?= $record['country']; ?>">
							</div>

							<div class="col_one_fourth col_last">
								<label for="sub_title">Country Code:</label>
								<input type="text" class="form-control" id="country_code" name="country_code" placeholder="Country Code" value="<?= $record['country_code']; ?>">
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="sub_title">Postal:</label>
								<input type="text" class="form-control" id="postal" name="postal" placeholder="Postal" value="<?= $record['postal']; ?>">
							</div>

							<div class="col_half col_last">
								<label for="sub_title">Phone:</label>
								<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?= $record['phone']; ?>">
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="sub_title">Lat:</label>
								<input type="text" class="form-control" id="lat" name="lat" placeholder="Enter Lat" value="<?= $record['lat']; ?>">
							</div>

							<div class="col_half col_last">
								<label for="sub_title">Lng:</label>
								<input type="text" class="form-control" id="lng" name="lng" placeholder="Enter Lng" value="<?= $record['lng']; ?>">
							</div>

							<div class="col_full">
								<label for="sub_title">Direction:</label>
								<input type="text" class="form-control" id="direction" name="direction" placeholder="Enter Direction" value="<?= $record['direction']; ?>">
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