

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="elementnotify"></div>

		<section id="full-width" class="bottommargin topmargin">

			<div class="container clearfix">

				<div class="heading-block  center custom-heading-block about-heading">
					<h2  class="pbxs">Icons</h2>
				</div>

				<div class="row clearfix">
					<div class="col_full">
						<?php if($icons){ ?>
							<p>Add new tire <a href="<?= base_url('admin/icons/add')?>" class="button button-border button-rounded button-green"><i class="icon-plus"></i>Add New</a></p>
							<div class="table-responsive">
								<table class="dataTable table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th width="20">Sn.</th>
											<th>Title</th>
											<th>Class</th>
											<th>View</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="20">Sn.</th>
											<th>Title</th>
											<th>Class</th>
											<th>View</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										<?php 
										$i=1; $n=count($icons);
										foreach ($icons as $icon) {
										?>
										<tr id="<?= $icon['icon_id']; ?>">
											<td><?= $i; ?></td>
											<td><?= $icon['icon_title']; ?></td>
											<td><?= $icon['icon_class']; ?></td>
											<td><i class="icon-3x <?= $icon['icon_class']; ?>"></i></td>
											<td>
												<a href="<?= base_url('admin/icons/edit/'.$icon['icon_id']); ?>" class="button button-mini button-circle button-blue" >Edit</a>
												<a href="#" data-type="icon" data-action="del" data-id="<?= $icon['icon_id']; ?>" data-url="<?= base_url('admin/icons/icon-delete'); ?>" class="button button-mini button-circle button-red item_delete" >Delete</a>
												<a href="#" data-type="icon" data-action="status" data-id="<?= $icon['icon_id']; ?>" data-url="<?= base_url('admin/icons/icon-status'); ?>" class="button button-mini button-circle <?= $icon['icon_status']==1 ? 'button-green' : 'button-red'; ?> item_updatestatus"><i class="icon-line-<?= $icon['icon_status']==1 ? 'check' : 'cross'; ?> "></i></a>
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