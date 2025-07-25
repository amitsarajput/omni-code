<!-- Page Title
============================================= -->
<!-- <section id="page-title" class="page-title-dark page-title-right skrollable skrollable-between" style="padding: 250px 0; background-image: url('img/social-responsibility-topbanner.jpg'); background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 440px;" data-top-bottom="background-position:0px -500px;">

	<div class="container clearfix">
		<h1>&nbsp;</h1>
		<span>&nbsp;</span>
	</div>

</section> --><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content" class="clearfix">

	<div class="content-wrap">

		<section id="full-width" class="full-section">
			<div class="section notopmargin nobottommargin bg-white">
				<div class="container clearfix">
					<div class="heading-block  center custom-heading-block pblg">
						<h2>Media Coverage</h2>
					</div>

					<div class="press-releases-wrapper">
						<div class="press-releases">
							<div class="press-releases-data">
								<?php if (!empty($coverages)) { ?>
									<?php foreach ($coverages as $coverage) { ?>
									<a <?php if($coverage['hyperlink']!=='#'): ?>target="_blank"<?php endif; ?> href="<?= $coverage['hyperlink']==='#'?base_url($page_url.'/'.$coverage['slug']):$coverage['hyperlink']; ?>" class="press-release">
										<div class="press-release-header">
											<div class="press-release-date">
											<?= date('F d, Y', strtotime($coverage['published_on'])); ?> <div class="black-color"> | <?= $coverage['media_house'] ?></div>
											</div>
										</div>
										<div class="press-release-content">
											<div class="press-release-title uppercase t500">
												<?= $coverage['title']; ?>
											</div>
											
											
										</div>
									</a>
									<?php } ?>
									<?php }else{ ?>
										<div class="uppercase t500">
											<p>Data not found.</p>
										</div>
									<?php } ?>
																
							</div>
							<div class="omni-pagination">
								<?= $pager->Links('','bs_full'); ?>
							</div>

						</div>
						<div class="press-releases-sidebar">
							<div class="widget widget-categories">
								<h4 class="widget-title">
									categories
								</h4>
								<div class="widget-content">
									<?php if(!empty($categories)){ ?>
										<a href="<?= base_url('media-coverages');?>">All</a>
										<?php foreach ($categories as $category) { ?>
												<a href="<?= base_url('media-coverages/category/'.$category['category_slug']); ?>"><?= $category['category_title']; ?></a>
										<?php } ?>
									<?php }else{ ?>
										<div class="uppercase t500">
											<p>Data not found.</p>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="widget widget-media-contacts">
								<h4 class="widget-title">
									media contact
								</h4>
								<div class="widget-content">
									<div class="media-contact">
										<div class="media-contact-title">
											Omni United (HQ)
										</div>
										<div class="media-contact-content">
											<b>Manav Suri</b>
											<br>Marketing Manager 
											<br><b>E:</b> manavsuri@omni-united.com
											<!--<br><b>T:</b> +65 9661 5314-->
										</div>
									</div>
									<!--<div class="media-contact">
										<div class="media-contact-title">
											Omni United usa
										</div>
										<div class="media-contact-content">
											<b>Casey Robinson</b>
											<br>Marketing and Communications Manager
											<br><b>E:</b> caseyrobinson@omni-united.com
											<br><b>T:</b> (231)-645-6452
										</div>
									</div>-->
								</div>
							</div>
							<!--<div class="widget widget-media-contacts">
								<h4 class="widget-title">
									media contacts
								</h4>
								<div class="widget-content">
									<div class="media-contact">
										<div class="media-contact-title">
											Omni United (HQ)
										</div>
										<div class="media-contact-content">
											<b>Manav Suri</b>
											<br>Marketing and Communications Manager
											<br><b>E:</b> manavsuri@omni-united.com
											<br><b>T:</b> +65 9661 5314
										</div>
									</div>
									<div class="media-contact">
										<div class="media-contact-title">
											Omni United usa
										</div>
										<div class="media-contact-content">
											<b>Casey Robinson</b>
											<br>Marketing and Communications Manager
											<br><b>E:</b> caseyrobinson@omni-united.com
											<br><b>T:</b> (231)-645-6452
										</div>
									</div>
								</div>
							</div>-->
						</div>
					</div>
					
				</div>
			</div>
		</section>

	</div><!-- .content-wrap end -->

</section><!-- #content end -->