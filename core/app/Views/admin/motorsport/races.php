

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="elementnotify"></div>

		<section id="full-width" class="bottommargin topmargin">

			<div class="container clearfix">

				<div class="heading-block  center custom-heading-block about-heading">
					<h2  class="pbxs">Races</h2>
				</div>

				<div class="row clearfix">
					<div class="col_full">
						<?php if($records){ ?>
							<p>Add new tire <a href="<?= base_url('admin/race/add')?>" class="button button-border button-rounded button-green"><i class="icon-plus"></i>Add New</a></p>
							<div class="table-responsive">
								<table class="dataTable table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th width="20">Sn.</th>
											<th>Title</th>
											<th>Location</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="20">Sn.</th>
											<th>Title</th>
											<th>Location</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										<?php
											$i=1; $n=count($records);
											foreach ($records as $record) {
												$post=json_decode($record['post_meta'], true);
										?>
										<tr id="<?= $record['id']; ?>">
											<td><?= $i; ?></td>
											<td><?= $post['title']; ?></td>
											<td><?= $post['location']; ?></td>
											<td><?= date('jS M, Y',strtotime($post['start_date'])); ?></td>
											<td>
												<a href="<?= base_url('admin/race/edit/'.$record['id']); ?>" class="button button-mini button-circle button-blue" >Edit</a>
												<a href="#" data-type="motor" data-action="del" data-id="<?= $record['id']; ?>" data-url="<?= base_url('admin/motersport-delete'); ?>" class="button button-mini button-circle button-red item_delete" >Delete</a>
												<a href="#" data-type="motor" data-action="status" data-id="<?= $record['id']; ?>" data-url="<?= base_url('admin/motersport-status'); ?>" class="button button-mini button-circle <?= $record['status']==1 ? 'button-green' : 'button-red'; ?> item_updatestatus"><i class="icon-line-<?= $record['status']==1 ? 'check' : 'cross'; ?> "></i></a>
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