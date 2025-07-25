<!--Page Title
============================================= -->

<section id="page-title" class="page-title-dark page-title-right skrollable skrollable-between lozad-background" data-background-image="<?= base_url('assets/img/radar-motorsport_banner.webp');?>" style="padding: 300px 0; background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 440px;" data-top-bottom="background-position:0px -500px;">

	<div class="container clearfix">
		<h1>&nbsp;</h1>
		<span>&nbsp;</span>
	</div>

</section>
<!-- #page-title end -->
		

<!-- Content
============================================= -->
<section id="content" class="golf-page">

	<div class="content-wrap">
		
		<section id="full-width" class="full-section ptlg pb">

					<div class="container clearfix">

						<div class="heading-block  center custom-heading-block about-heading">
							<h2  class="pbxs">Radar Motorsports</h2>
						</div>

						<div class="row clearfix">
							<div class="col-lg-12 center">
								<p>Radar Tires entered the world of motorsport in 2013 with its first set of tires designed for extreme off-road desert racing. Following its success in the BAJA desert races, Radar Tires quickly became a sought-after brand in desert and short course racing. Over the years, the Radar Renegade ranges have achieved multiple wins across off-road and short course series and classes. In 2024 Radar has sponsored off-road racing team Milhausen Motorsports. This is part of Radar's ongoing efforts to promote upcoming talent in the communities we operate in.</p>
							</div>
							<!--<div class="col-lg-12 center">
								<span class="environmental-qoute"><span class="quotemark start">“ </span><i>Radar Tire’s continued success against some of the top tier tire brands in the world, further reassures the quality and brand commitment to our customers, reinforcing our promise to provide robust products at a reasonable price point.</i><span class="quotemark end"> ”</span></span>
								<span class="qoute-name">G.S.Sareen, President and CEO, Omni United </span>
							</div>-->

						</div>

					</div>

		
			
					<div class="container clearfix topmargin-lg">

							<div class="heading-block about-sub-hd">
								<h2 class="">Milhausen Motorsports</h2>
							</div>

							<div class="row clearfix">
								<div class="col-lg-12">
									<p>In 2024 Radar Tires is excited to sponsored Minnesota based, Milhausen Motorsport to compete in the AMSOIL Off-Road Championship 2024. The team will represent Radar in a total of 8 races in the 2024 season.</p>

									<p> <b>Driver name:</b> Travis Milhausen Jr. 
                                        <br><b>Race categories:</b> Pro Lite (3400 lbs) and Pro 2 (4100 lbs)
                                        <br><b>Tires used:</b> Radar Renegade A/T5, Renegade R/T, Renegade R7 M/T</p>
								</div>
							</div>
					</div>

				</section>

				<!--2019 Tournaments start-->
				<section id="full-width" class="full-section clearfix topmargin pbsm list-tab-sec">						
					<div class="container clearfix">

						<div class="heading-block about-sub-hd ptsm">
							<h2 class="pbxs"><?= date('Y');?> Race Calendar</h2>
						</div>

						<?php if (!empty($races)): $racekeys=['upcoming'];//array_keys($races);?> 
						<div class="tabs clearfix" id="tab-3">
							<div class="row clearfix">
								<div class="col-md-12">	
									<div class="list-tab">
										<ul class="tab-nav tab-nav2 clearfix">
											<?php foreach($racekeys as $key):?>
											<li><a href="#tabs-<?= $key; ?>"><!--<?= ucfirst($key); ?>-->Completed</a></li>
											<?php endforeach;?>
										</ul>
									</div>
								</div>
							</div>
							<div class="tab-container tournaments-content">
								<?php foreach($racekeys as $key):?>
								<div class="tab-content clearfix" id="tabs-<?= $key; ?>">
									<div class="row clearfix">
										<div class="col-lg-12">
											<?php if(!empty($races[$key])):?>
							                  <div class="table-responsive-sm">
							                    <table class="table golf-table motorsport-table">
							                      <thead>
							                        <tr>
							                          <th width="20%">Dates</th>
							                          <th width="25%">Tournament</th>
							                          <th width="25%">Category</th>
							                          <th width="25%">Location</th>
							                        </tr>
							                      </thead>
							                      <tbody>
													<?php foreach($races[$key] as $record):?>
							                          <tr>
							                            <td width="20%"><?= htmlspecialchars_decode($record['date']); ?></td>
							                            <td width="35%"><?= htmlspecialchars_decode($record['title']); ?></td>
							                            <td width="25%"><?= htmlspecialchars_decode($record['category']); ?></td>
							                            <td width="20%"><?= htmlspecialchars_decode($record['location']); ?></td>
							                          </tr>
													<?php endforeach;?>
													</tbody>
							                    </table>
							                  </div>
											<?php else:?>
												<h3><?= $key==='upcoming'?'Coming Soon':'No Race utill now.'; ?></h3>
											<?php endif;?>

    
										</div>
									</div>
								</div>
								<?php endforeach;?>
							</div>
						</div>
						<?php else:?>
							<h3>Coming Soon</h3>
						<?php endif;?>

					</div>
				</section>
				<!--2019 Tournaments end-->

				<!--CAREER HIGHLIGHTS start-->
				<section id="full-width" class="full-section clearfix list-tab-sec pb ptlg">						
					<div class="container clearfix">

						<div class="heading-block about-sub-hd">
							<h2  class="pbxs">Race Wins</h2>
						</div>
							
						<?php if (!empty($wins)): $winkeys=array_keys($wins);?>
						<div class="tabs clearfix" id="tab-3">
							<div class="row clearfix">
								<div class="col-md-12">	
									<div class="list-tab">
										<ul class="tab-nav tab-nav2 clearfix">
											<?php foreach($winkeys as $key):?>
											<li><a href="#tabs-<?= $key; ?>"><?= ucfirst($key); ?></a></li>
											<?php endforeach;?>
										</ul>
									</div>
								</div>
							</div>
							<div class="tab-container list-content motor-content">
								<?php foreach($winkeys as $key):?>
								<div class="tab-content clearfix" id="tabs-<?= $key; ?>">
									<?php if(!empty($wins[$key])):?>
				                  	<div class="table-responsive-sm">

					                    <table class="table motorsports-table">
					                      	<thead>
						                        <tr>
						                          <th>POS</th>
						                          <th>RACE</th>
						                          <th>MONTH/YEAR</th>
						                          <th>DRIVER & TEAM</th>
						                        </tr>
					                      	</thead>
					                      	<tbody>
					                       	<?php foreach($wins[$key] as $record):?>
					                          <tr>
					                            <td><?= htmlspecialchars_decode($record['pos']); ?></td>
					                            <td><?= htmlspecialchars_decode($record['title']); ?></td>
					                            <td><?= htmlspecialchars_decode($record['date']); ?></td>
					                            <td><?= htmlspecialchars_decode($record['driver']); ?></td>
					                          </tr>
					                        <?php endforeach;?>
					                      	</tbody>
					                    </table>

				                  	</div>
				                  	<?php else:?>
										<h3><?= 'No data for '.$key.'.'; ?></h3>
									<?php endif;?>
				                </div>
				                <?php endforeach;?>
							</div>
						</div>
						<?php else:?>
							<h3>Coming Soon</h3>
						<?php endif;?>
					</div>
				</section>
				<!--CAREER HIGHLIGHTS end-->

				<!--<section class="brand-tabs-section ptlg pblg ">
					<div class="container clearfix">
						<div class="heading-block about-sub-hd">
							<h2 class="pbxs bottommargin">Racing Tires</h2>
						</div>
						<div class="row motorsport-tire clearfix">
		                 <div class="col-md-6">
		                    <div class="brand-product-item center">
		                      <h2 class="product-title"><a class="ColorRed" href="<?= base_url('radar/renegade-a-t5');?>">Renegade<sup class="deffont">®</sup> A/T5</a></h2>
		                      <div class="product-meta ColorBlack">All Season | All Terrain</div>
		                      <div class="product-image"> <a href="<?= base_url('radar/renegade-a-t5');?>"><img class="lozad" data-src="<?= base_url('assets/img/brand-products/Radar/Renegade AT5-19.webp') ?>" alt="Renegade AT5-19"></a> </div>
		                    </div>
		                  </div>

		                   <div class="col-md-6">
		                    <div class="brand-product-item center">
		                      <h2 class="product-title"><a class="ColorRed" href="<?= base_url('radar/renegade-rt');?>">Renegade<sup class="deffont">®</sup> R/T</a></h2>
		                      <div class="product-meta ColorBlack">All Season | Rugged Terrain</div>
		                      <div class="product-image"> <a href="<?= base_url('radar/renegade-rt');?>"><img class="lozad" data-src="<?= base_url('assets/img/brand-products/Radar/Renegade_RT (RT+)-19.webp') ?>" alt="Renegade_RT (RT+)-19"></a> </div>
		                    </div>
		                  </div>
	                	</div>

	                	<div class="row motorsport-tire clearfix topmargin-lg">
		                  <div class="col-md-6">
		                    <div class="brand-product-item center">
		                      <h2 class="product-title"><a class="ColorRed" href="<?= base_url('radar/renegade-r5');?>">Renegade<sup class="deffont">®</sup> R5 M/T</a></h2>
		                      <div class="product-meta ColorBlack">All Season | Mud Terrain</div>
		                      <div class="product-image"> <a href="<?= base_url('radar/renegade-r5');?>"><img class="lozad" data-src="<?= base_url('assets/img/brand-products/Radar/Renegade R5.webp') ?>" alt="Renegade R5"></a> </div>
		                    </div>
		                  </div>

		                  <div class="col-md-6">
		                    <div class="brand-product-item center">
		                      <h2 class="product-title"><a class="ColorRed" href="<?= base_url('radar/renegade-r7-mt');?>">Renegade<sup class="deffont">®</sup> R7 M/T</a></h2>
		                      <div class="product-meta ColorBlack">All Season | Mud Terrain</div>
		                      <div class="product-image"> <a href="<?= base_url('radar/renegade-r7-mt');?>"><img class="lozad" data-src="<?= base_url('assets/img/brand-products/Radar/Renegade R7-19.webp') ?>" alt="Renegade R7-19"></a> </div>
		                    </div>
		                  </div>
	                	</div>
					</div>
				</section>-->

				<?php if(!empty($slider)):?>
				<section id="slider" class="slider-element boxed-slider bottommargin pblg ptlg">


					<div class="container clearfix">
						<div class="heading-block about-sub-hd ptsm">
								<h2 class="pbxs center">Gallery</h2>
							</div>
						<div class="fslider golf-gallery" data-animation="fade" data-thumbs="true" data-arrows="ture" data-speed="1200" data-pause="7000">
							<div class="flexslider">
								<div class="slider-wrap">
									
									<?php $slide_count=count($slider['images']); $i=1; foreach($slider['images'] as $image):?>
									<div class="slide" data-thumb="<?= base_url('storage/carousel_images/'.$image); ?>">
										<a href="#">
											<img <?= $i >= 1 ? 'class="" ':''; ?> src="<?= base_url('storage/carousel_images/'.$image); ?>" alt="<?= $image; ?>">
										</a>
									</div>
									<?php $i++; endforeach;?>
								</div>
							</div>
						</div>

					</div>

				</section>
				<?php endif;?>


				<section id="full-width" class="full-section  pbxs">
			
					<div class="container clearfix marginTBS">

							<div class="heading-block about-sub-hd">
								<h2  class="">Renegade Program</h2>
							</div>

							<div class="row clearfix">
								<div class="col-lg-12">
									<p>The Renegade Program is about sharing our underdog spirit with drivers, athletes and sports persons across different fields. This program was launched in 2012 and it nurtures those who have world-class talent and a burning desire to achieve their ambitions. Through this program Radar Tires provides a helping hand to those who dare to push the boundaries and undertake feats that others wouldn’t dare to think of.</p>
								</div>
							</div>
					</div>

				</section>
	</div>

</section><!-- #content end -->