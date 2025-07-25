<!--CSS Style for form-->
<style type="text/css">
	/*****New form****/
	.general-hd h3 {
		font-size: 40px;
		margin-top: 40px;
		color: #DA2224;
	}
	.sm-form-control::placeholder {
		color: #666;
		opacity: 1; 
		font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important; 
		letter-spacing: 0.6px; 
	}
	.download-items{display: flex; flex-wrap: wrap;flex-direction: row; justify-content: center; align-items: flex-start; width: 100%; margin: 0 -15px;}
	.download-items .download-item{ margin: 0 15px; flex: 1 1 150px; max-width: 150px; text-align: center; }
	.download-items .download-item .dn-item-image{ border: 1px solid #ddd; overflow:hidden;text-align: center; margin-bottom: 10px;}
	.download-items .download-item .dn-item-desc{ font-size:12px; font-weight: 600; text-transform: uppercase; color:#333;}
	.download-items .download-item .dn-item-download-button{ font-size: 12px;font-weight: 600;
text-transform: uppercase;color: #fff;background-color: #DA2224;padding: 5px;margin-top: 10px;width: 80%;margin-left: auto;margin-right: auto;}
</style>

<!--Page Title
============================================= -->

<!-- <section id="page-title" class="page-title-dark page-title-right skrollable skrollable-between" style="padding: 300px 0; background-image: url('<?= base_url('assets/img/vehicle-sponsorship.jpg') ?>'); background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 440px;" data-top-bottom="background-position:0px -500px;">

	<div class="container clearfix">
		<h1>&nbsp;</h1>
		<span>&nbsp;</span>
	</div>

</section> -->
<!-- #page-title end -->
<!-- Content
============================================= -->
<section id="content" class="clearfix">

	<div class="content-wrap">
		<div class="elementnotify"></div>
		<div class="section full-section white-bg nomargin" style="padding-bottom: 0;">
			<div class="container clearfix">
				<div class="heading-block  center custom-heading-block">
					<?php
					$distributer=$_SESSION['distributer'];
					$brand='';
					if ( empty($distributer) || !$distributer['logged_in']) {
						redirect('/dealer-login');
					}
					if (!isset($distributer['brand']) || $distributer['brand']==null) {
						redirect('/dealer-login');
					}else{
						$brand=$distributer['brand'];
					}
					//print_r($brand);
					
					//unset($_SESSION['distributer']);
					$text='';
					switch ($brand) {
						case 'radar-na':
							$text='Radar Tires North America';
							break;
						
						default:
							$text='Radar Tires';
							break;
					}
				?>
					<h2>Dealer Corner</h2>
					<p class="center"><?=$text;?></p>
				</div>
			</div>
		</div>

		
        <div class="section full-section white-bg nomargin center" style="">
    		<?php if ($brand==='radar-na'): ?>
				<div class="container clearfix">
					<div class="row">
						<div class="download-items">
							<a href="https://drive.google.com/file/d/15mBbi6n3PNfSu8-K39EHSTmGJhCouM9J/view?usp=sharing" class="download-item" target="_blank" >
								<div class="dn-item-image">
									<img src="<?= base_url('assets/img/dealer-items/Radar-Tires-Logo-Kit.jpg');?>" alt="">
								</div>
								<div class="dn-item-desc">RADAR TIRES LOGO KIT</div>
								<div class="dn-item-download-button">Download</div>
							</a>
							<a href="https://drive.google.com/file/d/1efPyzjXTPy8nFxqN_uHZWLXQFFemwbiC/view?usp=sharing" class="download-item" target="_blank">
								<div class="dn-item-image">
									<img src="<?= base_url('assets/img/dealer-items/Radar-Tires-Pos-Catalogue.jpg');?>" alt="">
								</div>
								<div class="dn-item-desc">POS CATALOGUE</div>
								<div class="dn-item-download-button">Download</div>
							</a>
							<a href="https://drive.google.com/file/d/1NsYy_JSNLxMXgQ5FkOchW3yztBEtdKBp/view?usp=sharing" class="download-item" target="_blank">
								<div class="dn-item-image">
									<img src="<?= base_url('assets/img/dealer-items/Radar-Tires-Pos-Order-Form.jpg');?>" alt="">
								</div>
								<div class="dn-item-desc">POS ORDER FORM</div>
								<div class="dn-item-download-button">Download</div>
							</a>
						</div>
					</div>

				</div>
    		<?php endif; ?>


    		<?php if ($brand==='radar'): ?>
				<div class="container clearfix">
					Radar
				</div>
    		<?php endif; ?>
    
    		
    
    		<?php if ($brand==='patriot'): ?>
				<div class="container clearfix">
					Patriot
				</div>
    		<?php endif; ?>
    
    		
    
    		<?php if ($brand==='tecnica'): ?>
				<div class="container clearfix">
					Tecnica Brand
				</div>
    		<?php endif; ?>
		</div>


	</div>

</section><!-- #content end -->