

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="elementnotify"></div>

		<section id="full-width" class="bottommargin topmargin">

			<div class="container clearfix">

				<div class="heading-block  center custom-heading-block about-heading">
					<h2  class="pbxs">Dealers</h2>
				</div>

				<div class="row clearfix">
					<div class="col_full">
						<?php if($records){ ?>
							<p>Add: <a href="<?= base_url('admin/dealers/add')?>" class="button button-border button-rounded button-green"><i class="icon-plus"></i>Add New</a> <a href="<?= base_url('admin/dealers/add-bulk')?>" class="button button-border button-rounded button-green"><i class="icon-plus"></i>Add in bulk</a></p>
							<div class="table-responsive">
								<table class="dataTable table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th width="20">Sn.</th>
											<th>Dealer</th>
											<th>Title</th>
											<th>Address</th>
											<th>Country</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="20">Sn.</th>
											<th>Dealer</th>
											<th>Title</th>
											<th>Address</th>
											<th>Country</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										<?php 
										$i=1; $n=count($records);
										foreach ($records as $record) {
										    $record_meta=json_decode($record['post_meta'], true);
										?>
										<tr id="<?= $record['id']; ?>">
											<td><?= $i; ?></td>
											<th><?= $record_meta['dealer']; ?></th>
											<th><?= $record_meta['title']; ?></th>
											<th><?= $record_meta['address']; ?></th>
											<th><?= $record_meta['country']; ?></th>
											<th><?= $record['published_on']; ?></th>
											<td>
												<a href="#" data-type="dealer" data-action="del" data-id="<?= $record['id']; ?>" data-url="<?= base_url('admin/dealers/dealer-restore'); ?>" class="button button-mini button-circle button-blue item_delete" >Restore</a>
												<a href="#" data-type="dealer" data-action="del" data-id="<?= $record['id']; ?>" data-url="<?= base_url('admin/dealers/dealer-delete-force'); ?>" class="button button-mini button-circle button-red item_delete" >Delete</a>
											</td>
										</tr>
										<?php $i++; } ?>
																	
									</tbody>
								</table>
							</div>
						<?php } else{ ?>
							<p>Add new <a href="<?= base_url('admin/dealers/add')?>" class="button button-border button-rounded button-green"><i class="icon-plus"></i>Add New</a></p>
							<div class="table-responsive">No data</div>
						<?php } ?>
					</div>
				</div>

			</div>


		</section>

	</div>

</section><!-- #content end -->