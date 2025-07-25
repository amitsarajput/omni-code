
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

						<?= form_open_multipart('admin/tire/reviews/'.$tires['id'],['id'=>'form_tire_add', 'class'=>'repeater-default']) ?>
						
						<div class="col_half">
							<label for="title">Title*:</label>
							<p class="lead"><?= htmlspecialchars_decode($tires['title']); ?></p>
						</div>

						<div class="col_half col_last">
							<label for="brand">Brand*:</label>
							<p class="lead"><?= strtoupper($tires['brand_title']); ?></p>
						</div>
						

							<div class="clear"></div>
						<div class="js-repeater"  data-repeater-list="review">
                            <div data-repeater-list="group-a">
                                
                                <?php $v_reviews=json_decode($reviews['video_reviews'], true);
                                if(!empty($v_reviews)):
                                foreach($v_reviews as $key=>$review): ?>
                                <div data-repeater-item>
            						<div class="row justify-content-between">
                                        <div class="col-md-3 col-sm-12 form-group">
                                            <label for="review[plateform]">Plateform</label>
                                            <?php
            									$st_options=array(
            										'youtube'		=> 'Youtube',
            										'vemio'	=> 'Vemio',
            										'other'	=> 'Other',
            									);
            									echo form_dropdown('review'.$key.'[plateform]', $st_options, $review['plateform'],["id"=>"search_tag", "class"=>"form-control"]);								 
            								?>
                                        </div>
                                        <div class="col-md-3 col-sm-12 form-group">
                                            <label for="review[url]">Url </label>
                                            <input type="text" class="form-control" name="review<?=$key;?>[url]" id="review[url]" value="<?= $review['url']?>" placeholder="Enter url">
                                        </div>
                                        <div class="col-md-3 col-sm-12 form-group">
                                            <label for="poster">Poster Image </label>
                                            <input id="poster" name="review<?=$key;?>[poster]" type="file" class="form-control-file feature-image-upload" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-12 form-group d-flex align-items-center pt-2">
                                            <button class="btn btn-danger text-nowrap px-1" data-repeater-delete type="button"> <i class="bx bx-x"></i>
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <?php endforeach;  
                                        else: 
                                ?>
                                
                                <div data-repeater-item>
                                    <div class="row justify-content-between">
                                        <div class="col-md-3 col-sm-12 form-group">
                                            <label for="review[plateform]">Plateform</label>
                                            <select name="review[plateform]" id="review[plateform]" class="form-control">
                                                <option value="">Select</option>
                                                <option value="Yotube">Yotube</option>
                                                <option value="Vemio">Vemio</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-12 form-group">
                                            <label for="review[url]">Url </label>
                                            <input type="text" class="form-control" name="review[url]" id="review[url]" placeholder="Enter url">
                                        </div>
                                        <div class="col-md-3 col-sm-12 form-group">
                                            <label for="poster">Poster Image </label>
                                            <input id="poster" name="review[poster]" type="file" class="form-control-file feature-image-upload" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-12 form-group d-flex align-items-center pt-2">
                                            <button class="btn btn-danger text-nowrap px-1" data-repeater-delete type="button"> <i class="bx bx-x"></i>
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <div class="col p-0">
                                    <button class="btn btn-primary" data-repeater-create type="button"><i class="bx bx-plus"></i>
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
						

							<div class="clear"></div>

						
						<div class="col_full col_last">
							<label for="description">Source:URL*</label>
							<textarea class="form-control" id="description" name="description" rows=8 placeholder="Enter description" ><?= htmlspecialchars_decode($reviews['video_reviews']); ?></textarea>
							<!-- <small class="help-block">Will be created from title if left blank.</small> -->
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


