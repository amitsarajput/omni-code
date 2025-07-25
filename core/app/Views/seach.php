
<style type="text/css">
	#content p:not(.center){text-align: left!important;}
	#content a{display: block!important;}
	#content .card h4{margin-bottom: 0!important;}
</style>
<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap ">
		<div class="container clearfix ptlg">
			<?php if ($r['q']==null) { ?>
				<p class="center nobottommargin"></p>
				<h1 class="center">Please search somthing.</h1>
			<?php } else { ?>
				<p class="center nobottommargin">Showing results for</p>
				<h1 class="center"><?= ucfirst($r['q']); ?></h1>
			<?php } ?>
		</div>

		<section id="full-width" class="full-section ptlg">
			<?php foreach ($r as $key => $results) { if(!empty($results)){ ?>					
				<div class="container clearfix">
					<?php if($key!=='q'){ ?>					
					<div class="row">
						<div class="col-md-12">
							<h3 class="">
								<?php
								if ($key=='tyre') {
								 	echo 'Tyres';
								 } else if($key=='media'){
								 	echo 'Media Coverages';
								 } else if($key=='press'){
								 	echo 'Press Releases';
								 }
								?>									
							</h3>						
						</div>
					</div>
					<div class="row bottommargin-lg">
					<?php foreach($results as $result){
						if ($key=='tyre') {
							$brandtoshow=[1,8,9]; //Radar,Radar US,Radar EU
							if (!in_array($result['brand'], $brandtoshow)) {
								continue;
							}
							$str='';
							$str.=$result['brand_slug'];
							$str.='/'.$result['slug'];							
						 	$sl=base_url($str);
						} else if($key=='media'){
						 	$sl=$result['hyperlink'];
						} else if($key=='press'){
						 	$sl=base_url('press-releases/'.$result['slug']);
						}
					?>
						<div class="col-md-3 bottommargin-sm">
							<div class="card">
								<div class="card-body col-padding-md">
									<a href="<?= $sl; ?>">
									<h4><?= htmlspecialchars_decode($result['title']); ?></h4>
									<!--<p><?= isset($result['description']) && $result['description']!=null ?substr(htmlspecialchars_decode($result['description']), 0, 50):''; ?></p>-->
									</a>
								</div>
							</div>
						</div>						
					<?php } ?>
					</div>
					<?php } ?>
				</div>
			<?php } } ?>
		</section>		
		
	</div><!-- content-wrap end -->

</section><!-- content end -->