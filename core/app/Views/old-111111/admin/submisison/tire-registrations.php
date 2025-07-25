

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="elementnotify"></div>

		<section id="full-width" class="bottommargin topmargin">

			<div class="container clearfix">

				<div class="heading-block  center custom-heading-block about-heading">
					<h2  class="pbxs">Tire Registrations</h2>
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
											<th>City</th>
											<th>Purchase Date</th>
											<th>Dealer</th>
											<th>QUANTITY</th>
											<th>DOT#</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="20">Sn.</th>
											<th>Name</th>
											<th>City</th>
											<th>Purchase Date</th>
											<th>Dealer</th>
											<th>QUANTITY</th>
											<th>DOT#</th>
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
											<td><?= $post['customer-information']['first-name'].' '.$post['customer-information']['last-name']; ?></td>
											<td><?= $post['customer-information']['city']; ?></td>
											<td><?= $post['tyre-information']['purchase-date']; ?></td>
											<td><?= $post['dealer-information']['name']; ?></td>
											<td><?= implode(", ", $post['tyre-information']['quantity']); ?></td>
											<td><?= implode(", ", $post['tyre-information']['dot']); ?></td>
											<td>
												<!-- <a href="<?= base_url('admin/submisson/edit/'.$record['id']); ?>" class="button button-mini button-circle button-blue" >Edit</a> -->
												<a href="#" data-type="submisson" data-action="del" data-id="<?= $record['id']; ?>" data-url="<?= base_url('admin/tire-registration-delete'); ?>" class="button button-mini button-circle button-red item_delete" >Delete</a>
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