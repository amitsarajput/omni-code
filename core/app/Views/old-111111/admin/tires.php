

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="elementnotify"></div>

		<section id="full-width" class="bottommargin topmargin">

			<div class="container clearfix">

				<div class="heading-block  center custom-heading-block about-heading">
					<h2  class="pbxs">Tires</h2>
				</div>

				<div class="row clearfix">
					<div class="col_full">
						<?php if($tires){ ?>
							<p>Add new tire <a href="<?= base_url('admin/tire/new')?>" class="button button-border button-rounded button-green"><i class="icon-plus"></i>Add New</a></p>
							<div class="table-responsive">
								<table class="dataTable table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th width="20">Sn.</th>
											<th>State</th>
											<th>Name</th>
											<th>Brand</th>
											<th>Vehicle Type</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="20">Sn.</th>
											<th>State</th>
											<th>Name</th>
											<th>Brand</th>
											<th>Vehicle Type</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										<?php 
										$i=1; $n=count($tires);
										foreach ($tires as $tire) {
										?>
										<tr id="<?= $tire['id']; ?>">
											<td><?= $i; ?></td>
											<td><?= $tire['country_code']; ?></td>
											<td><?= htmlspecialchars_decode($tire['title']); ?></td>
											<td><?= ucfirst($tire['brand_title']); ?></td>
											<td><?= $tire['vehicle_type']; ?></td>
											<td>
												<a href="<?= base_url('admin/preview/'.$tire['brand_slug'].'/'.$tire['slug']); ?>" class="button button-mini button-circle button-blue" target="_blank">Preview</a>
												<a href="<?= base_url('admin/tire/edit/'.$tire['id']); ?>" class="button button-mini button-circle button-blue button-disabled" >Edit</a>
												<a href="<?= base_url('admin/tire/images/'.$tire['id']); ?>" class="button button-mini button-circle button-purple button-disabled" ><i class="icon-line-image nomargin"></i></a>
												<a href="<?= base_url('admin/tire/features/'.$tire['id']); ?>" class="button button-mini button-circle button-amber button-disabled" ><i class="icon-line2-list nomargin"></i></a>
												<a href="<?= base_url('admin/tire/sizes/'.$tire['id']); ?>" class="button button-mini button-circle button-teal button-disabled"  alt="Tire Sizes"><i class="icon-table nomargin"></i></a>
												<a href="<?= base_url('admin/tire/reviews/'.$tire['id']);?>" class="button button-mini button-circle button-aqua button-disabled" ><i class="icon-chat nomargin"></i></a>
												<a href="<?= base_url('admin/tire/clone/'.$tire['id']);?>" class="button button-mini button-circle button-aqua button-disabled" ><i class="icon-copy nomargin"></i></a>

												<a href="<?= base_url('admin/tire/export/'.$tire['id']);?>" class="button button-mini button-circle button-aqua button-disabled " ><i class="icon-signout nomargin"></i></a>

												<a href="<?= base_url('admin/tire/import/'.$tire['id']);?>" class="button button-mini button-circle button-aqua button-disabled " ><i class="icon-signin nomargin"></i></a>

												<a href="<?= base_url('admin/tire/video-section/'.$tire['id']);?>" class="button button-mini button-circle button-aqua button-disabled " ><i class="icon-youtube nomargin"></i></a>

												<a href="#" data-type="tire" data-action="del" data-id="<?= $tire['id']; ?>" data-url="<?= base_url('admin/tire-delete'); ?>" class="button button-mini button-circle button-red item_delete button-disabled" >Delete</a>
												<a href="#" data-type="tire" data-action="status" data-id="<?= $tire['id']; ?>" data-url="<?= base_url('admin/tire-status'); ?>" class="button button-mini button-circle button-disabled <?= $tire['status']==1 ? 'button-green' : 'button-red'; ?> item_updatestatus"><i class="icon-line-<?= $tire['status']==1 ? 'check' : 'cross'; ?> nomargin"></i></a>
											</td>
										</tr>
										<?php $i++; } ?>
																	
									</tbody>
								</table>
							</div>
						<?php } else{ ?>

							<p>Add new tire <a href="<?= base_url('admin/tire/new')?>" class="button button-border button-rounded button-green"><i class="icon-plus"></i>Add New</a></p>
							<div class="table-responsive">No data</div>
						<?php } ?>
					</div>
				</div>

			</div>


		</section>

	</div>

</section><!-- #content end -->
<style>
    /*.button.button-disabled{pointer-events:none;opacity: 0.3;}*/
</style>