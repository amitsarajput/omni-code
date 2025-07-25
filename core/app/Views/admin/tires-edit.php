
<!-- Content
============================================= -->

<?php


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

						<?= form_open('admin/tire/update/'.$tires['id'],['id'=>'form_tire_add']) ?>

							<div class="col_full ">
								<label for="region_us">Region*:</label>
								<?php 
								if ($countries) {
									$country_options=array();
									foreach ($countries as $country) {
									 	$country_options[$country['country_id']]=$country['country_name'];
									}
									echo form_dropdown('country', $country_options, $tires['country'],["id"=>"country", "class"=>"form-control"]);
								}
								?>
								<small class="help-block">Check the box if tyre is for US.</small>
							</div>

							<div class="clear"></div>

							<div class="col_one_third">
								<label for="title">Title*:</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="<?= $tires['title']; ?>">
							</div>

							<div class="col_one_third">
								<label for="slug">Slug:</label>
								<input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug" value="<?= $tires['slug']; ?>">
								<small class="help-block">Will be created from title if left blank.</small>								
							</div>

							<div class="col_one_third col_last">
								<label for="slug">External link(If any):</label>
								<input type="text" class="form-control" id="external_link" name="external_link" placeholder="External Link" value="<?= $tires['external_link']; ?>">							
							</div>

							<div class="clear"></div>

							<div class="col_half ">
								<label for="search_tag">Search Tag*:</label>
								<?php
									$st_options=array(
										'car/cuv/suv'		=> 'CAR/CUV/SUV	',
										'suv/light-truck'	=> 'SUV/Light Truck',
										'4x4/light-truck'	=> '4X4/Light Truck',
										'trailer'			=> 'TRAILER',
										'car/suv'			=> 'CAR/SUV',
										'van'			    => 'VAN',
										'van/cargo'			=> 'VAN/CARGO',
										'van/trailer'		=> 'VAN/TRAILER',
										'classic'			=> 'CLASSIC',
										'suv/4X4'			=> 'SUV/4X4',
										'ev/evc'			=> 'EV/EVC',
										'light-truck/van'			=> 'LIGHT TRUCK/VAN',
										'premiumcollection'			=> 'PREMIUM COLLECTION',
										'spare'			=> 'SPARE'
									);
									echo form_dropdown('search_tag', $st_options, $tires['search_tag'], ["id"=>"search_tag", "class"=>"form-control"]);	
								?>
							</div>

							<div class="col_half col_last">
								<label for="brand">Brand*:</label>
								<?php if ($brands) { ?>
								<select name="brand" id="brand" class="form-control">
									<?php foreach ($brands as $brand) { ?>
										<option value="<?= $brand['brand_id']; ?>" <?= $brand['brand_id']==$tires['brand']?"selected":""; ?>><?= $brand['brand_title']; ?></option>

									<?php } ?>
								</select>
								<?php } ?>
								<small class="help-block">Select a Brand option you want.</small>
							</div>

							<div class="clear"></div>

							<div class="col_half">							
								<label for="category">Category*:</label>
								<?php if ($tyre_categories) { ?>
								<select name="category" id="category" class="form-control">
									<?php foreach ($tyre_categories as $tyre_category) { ?>
										<option value="<?= $tyre_category['tc_id']; ?>" <?= $tyre_category['tc_id']==$tires['category']?"selected":""; ?>><?= $tyre_category['tc_title']; ?></option>

									<?php } ?>
								</select>
								<?php } ?>
								<!-- <small class="help-block">At least 4 characters, letters or numbers only</small> -->
							</div>
							<div class="col_half col_last">
								<label for="terrain_category">Terrain Category*:</label>
								<?php
									$trnc_options=array();
									foreach ($terrains as $terrain) {
									 	$trnc_options[$terrain['ter_cat_id']]=$terrain['ter_cat_title'];
									}
									echo form_dropdown('terrain_category', $trnc_options, $tires['terrain_category'],["id"=>"terrain_category", "class"=>"form-control"]);								 
								?>
							</div>

							<div class="clear"></div>

							<div class="col_half ">
								<label for="vehicle_type">Vehicle Type*:</label>
								<?php
									$vtoptions= array(
										"car"=>"CAR",
										"cuv"=>"CUV",
										"suv"=>"SUV",										
										"light-truck"=>"LIGHT TRUCK",
										"classic"=>"CLASSIC",
										"trailer"=>"TRAILER",
										"van"=>"VAN"
									);
									$vehicle_type=$tires['vehicle_type'];
									$vehicle_type_selected=  explode('/', $vehicle_type) ;
								?>
								<?= form_multiselect('vehicle_type[]', $vtoptions , $vehicle_type_selected , array('class'=> 'form-control') );?>

								<small class="help-block">Select mutiple types.</small>
							</div>

							<div class="col_half col_last">
								<?php 
									if ($icons) :
										$options= array();
										foreach ($icons as $icon) {
											$options[$icon['icon_id']]=$icon['icon_title'];
										}
									endif; 
								?>
								<?php if(set_value('icons') || !empty($tires['icons'])): 
									if (empty(set_value('icons'))) {
										$selected=$tires['icons'];
									}else{
										$selected=json_encode(set_value('icons'));
									}
									//print_r($selected);
									//$selected=json_encode( $selected ); 
								?>
									<script type="text/javascript"> 
										var selected_icon_options= <?= $selected ?> ;
										var icon_options= <?= json_encode($options) ?> ;
									</script>
								<?php else: ?>
									<script type="text/javascript"> 
										var selected_icon_options= '';
										var icon_options= <?= json_encode($options) ?> ;
									</script>
								<?php endif; ?>
								<label for="icons">Icons:</label>
								<?php if ($icons) { ?>
									<?= form_multiselect('icons[]', $options , json_decode( $tires['icons']) , array('class'=> 'form-control icons-selector') );?>
								
								<?php } ?>
								<small class="help-block">Select multiple icons for tyre.</small>
							</div>

							<div class="col_half col_last">
								
							</div>

							<div class="clear"></div>


							<div class="col_full">
								<label for="description">Description:</label>
								<textarea class="form-control" id="description" name="description" placeholder="Enter description" ><?= $tires['description']; ?></textarea>
								<!-- <small class="help-block">Will be created from title if left blank.</small> -->
							</div>

							<div class="clear"></div>


							<div class="col_full ">
								<label for="status">Premium:</label>
								<input type="checkbox" id="status" name="premium_tyre" class="" <?= $tires['premium_tyre']!==null?'checked':''; ?> >
								<small class="help-block">Check the box if it's a premium tyre.</small>
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