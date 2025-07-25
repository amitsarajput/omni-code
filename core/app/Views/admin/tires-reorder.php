
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

						<h2>Update Images.</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>


						<?= form_open('admin/tire/tire-reorder') ?>


							<div class="col_one_third">
								<label for="brand">Brand*:</label>
								<?php 
								if ($brands) {
									$brand_options=array();
									foreach ($brands as $brand) {
									 	$brand_options[$brand['brand_id']]=$brand['brand_title'];
									}
									echo form_dropdown('brand', $brand_options, set_value('brand'),["id"=>"brand", "class"=>"form-control"]);
								}
								?>
								<small class="help-block">Select a Brand option you want.</small>

								
							</div>

							<div class="col_one_third">
								<label for="search_tag">Search Tag*:</label>
								<?php
									$st_options=array(
										'car/cuv/suv'		=> 'CAR/CUV/SUV	',
										'suv/light-truck'	=> 'SUV/Light Truck',
										'4x4/light-truck'	=> '4X4/Light Truck',
										'trailer'			=> 'TRAILER',
										'car/suv'			=> 'CAR/SUV',
										'van/cargo'			=> 'VAN/CARGO',
										'van/trailer'		=> 'VAN/TRAILER',
										'classic'			=> 'CLASSIC',
										'suv/4X4'			=> 'SUV/4X4'
									);
									echo form_dropdown('search_tag', $st_options, set_value('search_tag'), ["id"=>"search_tag", "class"=>"form-control"]);	
								?>
							</div>
							

							<div class="col_one_third col_last">
								<button type="submit" class="button button-blue topmargin-sm" id="add-new-tyre" name="submit" value="submit">SUBMIT</button>
							</div>

							<div class="clear"></div>

						<?= form_close();?>

						<div class="card bottommargin-sm">							
							<div class="card-body" style="padding: 40px;">
								<h3 class="bottommargin-xs">Manage Tires</h3>
								<div class="sortable-wrapper name-sortable">

									<?php 								
										if (!empty($tires)) :
									?>
									<ul class="sortable">
										<?php foreach ($tires as $tire) : ?>
											<li id="<?= $tire['id'] ?>" class="ui-state-default">
												<span><?= htmlspecialchars_decode($tire['title']); ?></span>
											</li>
										<?php endforeach; ?>
									</ul>
									<a href="#" data-type="tire" data-action="tyre_order_save" data-url="<?= base_url('admin/tire/tire-order-save')?>" class="button button-mini button-blue button-rounded nomargin reorder" >Save Order</a>
									<div class="result"></div>
									<?php else: ?>
										<p>no files.</p>
									<?php endif; ?>
								</div>

							</div>
						</div>

					</div>
				</div>

			</div>

		</div>

	</div>

</section><!-- #content end -->