

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="elementnotify"></div>

		<section id="full-width" class="bottommargin topmargin">

			<div class="container clearfix">

				<div class="heading-block  center custom-heading-block about-heading">
					<h2  class="pbxs">Tire Category</h2>
				</div>

				<div class="row clearfix">
					<div class="col_full">
						<?php if($tyre_categories){ ?>
							<p>Add new tire <a href="<?= base_url('admin/tire-category/add')?>" class="button button-border button-rounded button-green"><i class="icon-plus"></i>Add New</a></p>
							<div class="table-responsive">
								<table class="dataTable table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th width="20">Sn.</th>
											<th>Category</th>
											<th>Tire Count</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="20">Sn.</th>
											<th>Category</th>
											<th>Tire Count</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										<?php 
										$i=1; $n=count($tyre_categories);
										foreach ($tyre_categories as $tyre_category) {
										?>
										<tr id="<?= $tyre_category['tc_id']; ?>">
											<td><?= $i; ?></td>
											<td><?= $tyre_category['tc_title']; ?></td>

											<td><?= $tyre_category['tire_count']; ?></td>
											<td>
												<a href="<?= base_url('admin/tire-category/edit/'.$tyre_category['tc_id']); ?>" class="button button-mini button-circle button-blue" >Edit</a>
												<a href="#" data-type="tire-category" data-action="del" data-id="<?= $tyre_category['tc_id']; ?>" data-url="<?= base_url('admin/tire-category/tc-delete'); ?>" class="button button-mini button-circle button-red item_delete" >Delete</a>
												<a href="#" data-type="tire-category" data-action="status" data-id="<?= $tyre_category['tc_id']; ?>" data-url="<?= base_url('admin/tire-category/tc-status'); ?>" class="button button-mini button-circle <?= $tyre_category['tc_status']==1 ? 'button-green' : 'button-red'; ?> item_updatestatus"><i class="icon-line-<?= $tyre_category['tc_status']==1 ? 'check' : 'cross'; ?> "></i></a>
											</td>
										</tr>
										<?php $i++; } ?>
																	
									</tbody>
								</table>
							</div>
						<?php } else{ ?>
							<div class="table-responsive">No data</div>
						<?php } ?>
					</div>
				</div>

			</div>


		</section>

	</div>

</section><!-- #content end -->