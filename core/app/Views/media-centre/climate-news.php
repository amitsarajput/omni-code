<style>

	@media only screen and (min-width:768px) and (max-width: 992px){
		.news-items .news-item{flex-basis: calc(50% - 30px);}
	}

	@media only screen and (max-width: 767px){
		.news-items .news-item{flex-basis: calc(100% - 30px);}
	}
	#page-title{display:flex; justify-content:center;align-items:center;}
	#page-title h1{font-size:3rem;}
</style>

<!-- Page Title
============================================= -->
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-dark page-title-center skrollable skrollable-between lozad-background" data-background-image="<?= base_url('assets/img/climate-change-banner.webp') ?>" style="padding: 300px 0; background-size: cover!important; background-position: center center;" data-bottom-top="background-position:0px 440px;" data-top-bottom="background-position:0px -500px;">

	<div class="container clearfix">
		<h1>#CLIMATECHANGE</h1>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content" class="clearfix">

	<div class="content-wrap">

		<section id="full-width" class="full-section">
			<div class="section notopmargin nobottommargin" style="background-color:#f7f7f7;">
				<div class="container clearfix">
					<div class="heading-block  center custom-heading-block">
						<h2>CLIMATE CHANGE</h2>
					</div>
					<p>Climate change continues to impact all regions of the world and all segments of society. Right from shifting weather patterns that threaten food production, to rising sea levels that increase the risk of catastrophic flooding, to the recent forest fires in Australia and California, hurricanes in the US, the impacts of climate change are global in scope and unprecedented in scale. These catastrophic events not only threaten the global economy but also cause severe damage to property and loss of life. If we don't take drastic action today, adapting to these impacts in the future will be more difficult and costly to both the present and future generations. Omni United is committed and doing its part to help save the world’s climate for today’s and tomorrow’s generations.</p>
					<p>Our commitment to climate change dates back to 2012 when we first engaged EY(Ernst & Young) to conduct a twelve-month assessment on Radar Tyres’ total greenhouse gas emissions between April 2011 and March 2012. EY’s study involved a rigorous and independent assessment that examined and quantified the amount of greenhouse gases (primarily carbon dioxide) produced from procuring raw materials to manufacturing, distribution, and energy used in the company’s offices and employees' travel. Based on the study recommendations, we undertook a number of changes to our business processes and actions geared to offset the carbon footprint, such as investing in projects that removed or reduced carbon dioxide from the environment. As a result, Radar Tyres became the first tyre brand to be 100% carbon neutral by late 2013 and we have maintained this certification to date.</p>
					<p>Our work continues in this direction and we are currently defining new sustainability goals in line with the UNGC’s Sustainable Development Goals (SDGs) for beyond 2021. The goals will be inclusive of the entire value chain right from raw material technology and procurement to the end of tyre life. We aim to make a positive impact across each of these stages in our value chain.</p>
				</div>
			</div>
			
			<div class="section notopmargin nobottommargin bg-white">
				<div class="container clearfix ptlg">
					<div class="heading-block  center custom-heading-block">
						<h2>NEWS</h2>
					</div>
					<div class="news-wrapper">
						<div class="news-items">
							<?php if(!empty($news)){ ?>
								<?php foreach ($news as $item) { ?>
								<div class="news-item">
									<a href="<?= base_url('climate-change/'.$item['slug']); ?>" class="news-item-link"></a>
									<div class="news-item-header">
										<div class="news-item-featured-image">
											<img class="lozad" src="<?= base_url('storage/news/'.$item['featured_image']); ?>" alt="<?= htmlspecialchars_decode($item['title']); ?>">
										</div>
									</div>
									<div class="news-item-body">
										<h3 class="news-item-title uppercase t500">
											<?= htmlspecialchars_decode($item['title']); ?>
										</h3>
										<div class="news-item-excerpt">
											<?= htmlspecialchars_decode($item['excerpt']); ?>
										</div>
										<div class="news-item-date">
											<?= date('F d, Y', strtotime($item['published_on'])); ?>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php }else{ ?>
								<div class="uppercase t500">
									<h4>News not available now, please try after some time.</h4>
								</div>
							<?php } ?>
						</div>
						<div class="omni-pagination">
							<?= $pager->Links('','bs_full'); ?>
						</div>
					</div>
					
				</div>
			</div>
			</div>
		</section>

	</div><!-- .content-wrap end -->

</section><!-- #content end -->