

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="elementnotify"></div>

		<section id="full-width" class="bottommargin topmargin">

			<div class="container clearfix">

				<div class="heading-block  center custom-heading-block about-heading">
					<h2  class="pbxs">All Subscribers</h2>
				</div>

				<div class="row clearfix">
					<div class="col_full">

							<p><a href="<?= base_url('xlsx/'.$submissons_filename)?>" class="button button-border button-rounded button-green" download><i class="icon-download"></i>Download All</a></p>
						<?php if($records){ ?>
							<div class="table-responsive">
								<table class="dataTable table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th width="20">Sn.</th>
											<th>Name</th>
											<th>Email</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="20">Sn.</th>
											<th>Name</th>
											<th>Email</th>
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
											<td><?= $post['name']; ?></td>
											<td><?= $post['email']; ?></td>
											<td><?= $post['date']; ?></td>
											<td>
												<!-- <a href="<?= base_url('admin/submisson/edit/'.$record['id']); ?>" class="button button-mini button-circle button-blue" >Edit</a> -->
												<a href="#" data-type="submisson" data-action="del" data-id="<?= $record['id']; ?>" data-url="<?= base_url('admin/subscriber-delete'); ?>" class="button button-mini button-circle button-red item_delete" >Delete</a>
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