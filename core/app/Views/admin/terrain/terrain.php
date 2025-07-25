

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="elementnotify"></div>

		<section id="full-width" class="bottommargin topmargin">

			<div class="container clearfix">

				<div class="heading-block  center custom-heading-block about-heading">
					<h2  class="pbxs">Terrains</h2>
				</div>

				<div class="row clearfix">
					<div class="col_full">
						<?php if($terrains){ ?>
							<p>Add new tire <a href="<?= base_url('admin/terrain/add')?>" class="button button-border button-rounded button-green"><i class="icon-plus"></i>Add New</a></p>
							<div class="table-responsive">
								<table class="dataTable table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th width="20">Sn.</th>
											<th>Title</th>
											<th>Slug</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="20">Sn.</th>
											<th>Title</th>
											<th>Slug</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										<?php
											$i=1; $n=count($terrains);
											foreach ($terrains as $terrain) {
										?>
										<tr id="<?= $terrain['ter_cat_id']; ?>">
											<td><?= $i; ?></td>
											<td><?= $terrain['ter_cat_title']; ?></td>
											<td><?= $terrain['ter_cat_slug']; ?></td>
											<td>
												<a href="<?= base_url('admin/terrain/edit/'.$terrain['ter_cat_id']); ?>" class="button button-mini button-circle button-blue" >Edit</a>
												<a href="#" data-type="terrain" data-action="del" data-id="<?= $terrain['ter_cat_id']; ?>" data-url="<?= base_url('admin/terrain/terrain-delete'); ?>" class="button button-mini button-circle button-red item_delete" >Delete</a>
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