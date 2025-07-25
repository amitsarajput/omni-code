

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="elementnotify"></div>

		<section id="full-width" class="bottommargin topmargin">

			<div class="container clearfix">

				<div class="heading-block  center custom-heading-block about-heading">
					<h2  class="pbxs">Press Releases</h2>
				</div>

				<div class="row clearfix">
					<div class="col_full">
						<?php if($prs){ ?>
							<p>Add new tire <a href="<?= base_url('admin/pr/add')?>" class="button button-border button-rounded button-green"><i class="icon-plus"></i>Add New</a></p>
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
										$i=1; $n=count($prs);
										foreach ($prs as $pr) {
										?>
										<tr id="<?= $pr['id']; ?>">
											<td><?= $i; ?></td>
											<td><?= $pr['title']; ?></td>
											<td><?= $pr['category_title']; ?></td>
											<td>
												<a href="<?= base_url('admin/pr/edit/'.$pr['id']); ?>" class="button button-mini button-circle button-blue" >Edit</a>
												<a href="#" data-type="pr" data-action="del" data-id="<?= $pr['id']; ?>" data-url="<?= base_url('admin/pr/pr-delete'); ?>" class="button button-mini button-circle button-red item_delete" >Delete</a>
												<a href="#" data-type="pr" data-action="status" data-id="<?= $pr['id']; ?>" data-url="<?= base_url('admin/pr/pr-status'); ?>" class="button button-mini button-circle <?= $pr['status']==1 ? 'button-green' : 'button-red'; ?> item_updatestatus"><i class="icon-line-<?= $pr['status']==1 ? 'check' : 'cross'; ?> "></i></a>
											</td>
										</tr>
										<?php $i++; } ?>
																	
									</tbody>
								</table>
							</div>
						<?php } else{ ?>
							<p>Add new <a href="<?= base_url('admin/pr/add')?>" class="button button-border button-rounded button-green"><i class="icon-plus"></i>Add New</a></p>
							<div class="table-responsive">No data</div>
						<?php } ?>
					</div>
				</div>

			</div>


		</section>

	</div>

</section><!-- #content end -->