

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="elementnotify"></div>

		<section id="full-width" class="bottommargin topmargin">

			<div class="container clearfix">

				<div class="heading-block  center custom-heading-block about-heading">
					<h2  class="pbxs">Media Coverages</h2>
				</div>

				<div class="row clearfix">
					<div class="col_full">
						<?php if($mcs){ ?>
							<p>Add new tire <a href="<?= base_url('admin/mc/add')?>" class="button button-border button-rounded button-green"><i class="icon-plus"></i>Add New</a></p>
							<div class="table-responsive">
								<table class="dataTable table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th width="20">Sn.</th>
											<th>Title</th>
											<th>Category</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="20">Sn.</th>
											<th>Title</th>
											<th>Category</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										<?php 
										$i=1; $n=count($mcs);
										foreach ($mcs as $mc) {
										?>
										<tr id="<?= $mc['id']; ?>">
											<td><?= $i; ?></td>
											<td><?= $mc['title']; ?></td>
											<td><?= $mc['category_title']; ?></td>
											<td>
												<a href="<?= base_url('admin/mc/edit/'.$mc['id']); ?>" class="button button-mini button-circle button-blue" >Edit</a>
												<a href="#" data-type="mc" data-action="del" data-id="<?= $mc['id']; ?>" data-url="<?= base_url('admin/mc/mc-delete'); ?>" class="button button-mini button-circle button-red item_delete" >Delete</a>
												<a href="#" data-type="mc" data-action="status" data-id="<?= $mc['id']; ?>" data-url="<?= base_url('admin/mc/mc-status'); ?>" class="button button-mini button-circle <?= $mc['status']==1 ? 'button-green' : 'button-red'; ?> item_updatestatus"><i class="icon-line-<?= $mc['status']==1 ? 'check' : 'cross'; ?> "></i></a>
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