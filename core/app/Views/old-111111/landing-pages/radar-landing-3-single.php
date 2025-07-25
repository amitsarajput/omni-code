<?php 
$extra_cols_on=false;
$extra_cols=json_decode( $tyres['sizes_extra_columns'], $assoc_array = false );
if (!empty($extra_cols)){ $extra_cols_on=true; }else{ $extra_cols=array(); }

$images=json_decode( $tyres['image'], $assoc_array = true );
$images=$images['other'];
$tyres['search_tag_url']=str_replace(['/',' ','-'],'',strtolower($tyres['search_tag']));

?>

<!-- Page Title
============================================= -->
<!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

  <div class="content-wrap product-single radar-tires GreenPopUp">

    <section id="full-width" class="full-section clearfix">
      
      <div class="container clearfix">
        <div class="row clearfix">
          <div class="col-lg-12">
             <ol class="breadcrumb product-breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url($landingpage3slug); ?>">Radar</a></li>
              <!--<li class="breadcrumb-item"><i class="icon-angle-right"></i>
                <a href="<?= base_url($tyres['brand_slug']);?>">
                  <?= ucfirst($tyres['brand_title']); ?>
                </a>
              </li>-->
              <li class="breadcrumb-item uppercase"><i class="icon-angle-right"></i>
                <a href="<?= base_url($landingpage3slug.'#tabs-'.$tyres['search_tag_url']);?>">
                  <?= str_replace(['-'],' ',strtolower($tyres['search_tag'])) ?>
                </a>
              </li>
              <li class="breadcrumb-item"><i class="icon-angle-right"></i><?= htmlspecialchars_decode($tyres['title']); ?></li>
             </ol>
          </div>
        </div>

        <div class="row clearfix vertical-align product-details details-again ">
          <div class="col-lg-6 vcenter">
            <h2 class="product-title"><?= htmlspecialchars_decode($tyres['title']); ?></h2>
            <?php 
    			$pmeta=array();
    			if($tyres['tc_id']) {array_push($pmeta, $tyres['tc_title']);}
    			if($tyres['ter_cat_id']){
    			    array_push($pmeta, $tyres['ter_cat_title']);
    			}
			?>
            <h5 class="product-sub-title"><?= implode(" | ", $pmeta); ?></h5>

            <?php if (!empty($images)) { 
              $total_images=count($images);
            ?>
            <div class="fslider customjs bottommargin-sm product-slider for-mobile-pro <?= $total_images==1?'single_slide':'';?>">
              <div class="flexslider" id="slider-flex2">
                <div class="slider-wrap">
                  <?php foreach ($images as $image) { ?>
                      <div class="slide"><img class="lozad" data-src="<?= base_url('uploads/tire_images/other/'.$image);?>" alt="<?= $tyres['title']; ?>"></div>
                  <?php } ?>
                </div>
                <!--<div class="greenicon"></div>-->
              </div>
            </div>
            <?php } ?>


            <div class="product-desc">
              <p><?= $tyres['description']; ?></p>
            </div>
            <?php if (!empty($icons)){ $i=1; $ic=count($icons); ?>
            <div class="product-icons radar-dimax">
              <ul>
                <?php foreach($icons as $icon){ ?>
                <li class="col_one_third <?= $i%3==0?'col_last':''?>"><i class="<?= $icon['icon_class']; ?>"></i><?= $icon['icon_title']; ?></li>
                <?php if($i < $ic && $i%3==0){ ?>
                <div class="clearfix"></div>
                <?php } ?>
                <?php $i++; } ?>
              </ul>
            </div>
          <?php } ?>
          </div>
          <div class="col-lg-6 vcenter for-pc-pro">
            <?php if (!empty($images)) { ?>
            <div class="fslider customjs bottommargin-sm product-slider <?= $total_images==1?'single_slide':'';?>">
              <div class="flexslider" id="slider-flex">
                <div class="slider-wrap">
                  <?php foreach ($images as $image) { ?>
                      <div class="slide"><img class="lozad" data-src="<?= base_url('uploads/tire_images/other/'.$image);?>" alt="<?= $tyres['title']; ?>"></div>
                  <?php } ?>
                </div>
                <!--<div class="greenicon"></div>-->
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </section><!--dimax r8+ end-->

    <?php 
      $features=json_decode( $tyres['features'], $assoc_array = true );
      if (!empty($features)) :       
   ?>
    <section id="full-width" class="full-section product-features product-features2  clearfix" style="background-color: #f7f7f7;">
      <div class="container clearfix">          

        <div class="heading center nobottommargin">
          <h2 class="ColorGray2">features</h2>
        </div>
        <div class="row clearfix product-feature-points  product-feature-gray">
          <div id="oc-posts" class="owl-carousel posts-carousel carousel-widget"  data-autoplay="3000" data-margin="0" data-nav="true" data-loop="true" data-pagi="true" data-items="1" data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="1" >
            <?php foreach ($features as $feature) { ?>
            <div class="oc-item">
              <div class="ipost clearfix">
                <div class="entry-title">
                  <strong><?= htmlspecialchars_decode($feature['title']); ?></strong>
                </div>
                <div class="entry-content">
                  <p><?= htmlspecialchars_decode($feature['description']); ?></p>
                </div>
                <div class="products-image lozad-background" data-background-image="<?= base_url('uploads/features/'.$feature['image']);?>" ><!--<img src="<?= base_url('uploads/features/'.$feature['image']);?>" alt="">--></div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>

      </div>
    </section>
    <?php endif; ?>

    <?php if($sizes=json_decode( $tyres['sizes'], $assoc_array = true )){
      $sizes_nav=array();
      $sized=array(); 
      foreach ($sizes as $key => $value) {
        
        if ($value['size'] !== null ) {
          if (array_key_exists($value['size'], $sized) && in_array($value['size'], $sizes_nav)) {
            array_push($sized[$value['size']], $value);
          }else{
            $sized[$value['size']]=array($value);
            $sizes_nav[]=$value['size'];
          }          
        }
      }
    ?>
    <section id="full-width" class="full-section product-sizes clearfix">
      
      <div class="container clearfix">

        <div class="heading center">
          <h2 class="ColorGray2">sizes</h2>
        </div>
        <div class="row clearfix product-sizes-content brand-sizes-content">
          <div class="col-md-12">               
            <div class="tabs clearfix" id="tab-3">
              <div class="product-sizes-nav">
                <ul class="tab-nav tab-nav2 clearfix">
                  <li><a href="#tabs-all">All</a></li>
                  <?php foreach($sizes_nav as $tabnavs){ ?>
                  <li><a href="#tabs-<?= $tabnavs;?>"><?= $tabnavs;?>"</a></li>
                  <?php }?>
                </ul>
              </div>
              <div class="tab-container product-sizes-tables  
              <?= empty($extra_cols)?'three-cols':'';?> 
              <?= (count($extra_cols)===1)?'four-cols':'';?>" >
                <div class="tab-content clearfix" id="tabs-all">
                  <div class="table-responsive-sm">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>SIZE</th>
                          <th>L.I./S.r.</th>
                          <th>L.R.</th>
                          <?php if ($extra_cols_on==true): ?>
                            <?php if (in_array('s_w', $extra_cols)): ?>
                              <th class="small-cols">S.W.</th>
                            <?php endif; ?>
                            <?php if (in_array('weather', $extra_cols)): ?>
                              <th class="small-cols pt-ico title-min"><span class="tile-bar"><span class="title-bar-wrapper">Wet Grip</span></span><i class="omniicon-cloud-rain"></i></th>
                            <?php endif; ?>
                            <?php if (in_array('fuel', $extra_cols)): ?>
                              <th class="small-cols pt-ico title-min"><span class="tile-bar"><span class="title-bar-wrapper">Fuel Efficiency</span></span><i class="omniicon-fuel"></i></th>
                            <?php endif; ?>
                            <?php if (in_array('noise_db', $extra_cols)): ?>
                              <th class="small-cols pt-ico title-min"><span class="tile-bar"><span class="title-bar-wrapper">External Rolling Noise</span></span><i class="omniicon-volume"></i></th>
                            <?php endif; ?>
                            <?php if (in_array('mark', $extra_cols)): ?>
                              <th class="small-cols medium-col">MARK.</th>
                            <?php endif; ?>
                          <?php endif; ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($sized as $key=>$sizes){ ?>
                          <tr>
                            <td class="pt" colspan="7"><strong class="ColorGray2"><?= $key; ?>"</strong></td>
                          </tr>
                          <?php foreach ($sizes as $size) { ?>
                          <tr>
                            <td><?= $size["rim"]; ?></td>
                            <td><?= $size["li_sr"]; ?></td>
                            <td><?= $size["lr"]; ?></td>
                            
                            <?php if ($extra_cols_on==true): ?>
                              <?php if (in_array('s_w', $extra_cols)): ?>
                              <td><?= $size["s_w"]; ?></td>
                              <?php endif; ?>
                              <?php if (in_array('weather', $extra_cols)): ?>
                                <td><?= $size["weather"]; ?></td>
                              <?php endif; ?>
                              <?php if (in_array('fuel', $extra_cols)): ?>
                                <td><?= $size["fuel"]; ?></td>
                              <?php endif; ?>
                              <?php if (in_array('noise_db', $extra_cols)): ?>
                               <td><?= $size["noise_db"]; ?></td>
                              <?php endif; ?>
                              <?php if (in_array('mark', $extra_cols)): ?>
                               <td><?= $size["mark"]; ?></td>
                              <?php endif; ?>
                            <?php endif; ?>
                            
                          </tr>
                          <?php } ?>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php foreach ($sizes_nav as $tab) { ?>              
                <div class="tab-content clearfix" id="tabs-<?= $tab;?>">
                  <div class="table-responsive-sm">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>SIZE</th>
                          <th>L.I./S.r.</th>
                          <th>L.R.</th>
                          <?php if ($extra_cols_on==true): ?>
                            <?php if (in_array('s_w', $extra_cols)): ?>
                              <th class="small-cols">S.W.</th>
                            <?php endif; ?>
                            <?php if (in_array('weather', $extra_cols)): ?>
                              <th class="small-cols pt-ico title-min"><span class="tile-bar"><span class="title-bar-wrapper">Wet Grip</span></span><i class="omniicon-cloud-rain"></i></th>
                            <?php endif; ?>
                            <?php if (in_array('fuel', $extra_cols)): ?>
                              <th class="small-cols pt-ico title-min"><span class="tile-bar"><span class="title-bar-wrapper">Fuel Efficiency</span></span><i class="omniicon-fuel"></i></th>
                            <?php endif; ?>
                            <?php if (in_array('noise_db', $extra_cols)): ?>
                              <th class="small-cols pt-ico title-min"><span class="tile-bar"><span class="title-bar-wrapper">External Rolling Noise</span></span><i class="omniicon-volume"></i></th>
                            <?php endif; ?>
                            <?php if (in_array('mark', $extra_cols)): ?>
                              <th class="small-cols medium-col">MARK.</th>
                            <?php endif; ?>
                          <?php endif; ?>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="pt" colspan="7"><strong class="ColorGray2"><?= $tab;?>"</strong></td>
                        </tr>
                        <?php foreach ($sized[$tab] as $size) { ?>
                          <tr>
                            <td><?= $size["rim"]; ?></td>
                            <td><?= $size["li_sr"]; ?></td>
                            <td><?= $size["lr"]; ?></td>
                            <?php if ($extra_cols_on==true): ?>
                              <?php if (in_array('s_w', $extra_cols)): ?>
                              <td><?= $size["s_w"]; ?></td>
                              <?php endif; ?>
                              <?php if (in_array('weather', $extra_cols)): ?>
                                <td><?= $size["weather"]; ?></td>
                              <?php endif; ?>
                              <?php if (in_array('fuel', $extra_cols)): ?>
                                <td><?= $size["fuel"]; ?></td>
                              <?php endif; ?>
                              <?php if (in_array('noise_db', $extra_cols)): ?>
                               <td><?= $size["noise_db"]; ?></td>
                              <?php endif; ?>
                              <?php if (in_array('mark', $extra_cols)): ?>
                               <td><?= $size["mark"]; ?></td>
                              <?php endif; ?>
                            <?php endif; ?>
                          </tr>
                        <?php } ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row clearfix product-sizes-buttons 
              <?= empty($extra_cols)?'three-cols':'';?> 
              <?= (count($extra_cols)===1)?'four-cols':'';?>">
          <div class="col-md-3">
            <a href="#" class="redbutton printbutton">Print</a>
          </div>
          <div class="col-md-9 "></div>
          <div class="col-md-12">
              <span  class="meaning">
                  <?php if ($tyres['legend']!==null) { ?>
                      <?= htmlspecialchars_decode($tyres['legend']); ?>
                  <?php } else{ ?>

                    <strong>L.I.</strong> = Load Index, <strong>S.R.</strong> = Speed Rating, <strong>L.R.</strong> = Load Range, <strong>M+S</strong> = Mud and Snow

                      <?php if ($extra_cols_on==true): ?>
                        <?php if (in_array('s_w', $extra_cols)): ?><?php endif; ?>
                        <?php if (in_array('weather', $extra_cols)): ?>
                          , <i class="omniicon-cloud-rain"></i> = Wet Grip
                        <?php endif; ?>
                        <?php if (in_array('fuel', $extra_cols)): ?>
                          , <i class="omniicon-fuel"></i> = Fuel Efficiency
                        <?php endif; ?>
                        <?php if (in_array('noise_db', $extra_cols)): ?>
                          , <i class="omniicon-volume"></i> = External Rolling Noise in Decibels
                        <?php endif; ?>
                      <?php endif; ?>
                      .

                    <br>
                    <strong>Speed Rating:</strong> <strong>H</strong> = 130 mph, <strong>V</strong> = 149 mph, <strong>W</strong> = 168 mph, <strong>Y</strong> = 186 mph | <strong>Load Range: XL</strong> = Extra Load.

                  <?php } ?>
              </span>
          </div>
        </div>

      </div>
    </section><!--RADAR RUN-FLAT TECHNOLOGY end-->
    <?php } ?>
  </div>

</section><!-- #content end -->

<!-- Modal -->
<!--<div class="modal-on-load" data-target="#carbonNeutralPopUp" ></div>-->
<div class="modal1 mfp-hide mfp-align-top" id="carbonNeutralPopUp">
	<div class="block divcenter" style="">
	    <button title="Close (Esc)" type="button" class="mfp-close">×</button>
		<div class="" style="padding-top:10px;">
	        <div class="mp-body center">
			    <div class="heading-block custom-heading-block" >
			        <h3 class="nott">Why Manufactured <div style="display:inline;color: #89c847!important;">Carbon Neutral</div> is Important to You.</h3>
		        </div>
		        <div>
		            <p>Radar Tires is manufactured carbon neutral. When you buy Radar Tires, you are supporting the only tire brand that has a net zero carbon footprint at manufacturing.</p>
		        </div>
		        <div class="d-flex justify-content-center align-items-center">
		            <img class="popuplogoimage" src="<?= base_url('assets/img/radar-logo-dark.png');?>" />  | <img class="popuplogoimage"  src="<?= base_url('assets/img/carbon-neutral-unit.png');?>" />
		        </div>
			</div>
		</div>
	</div>
</div>
<!--<div class="modal-on-load" data-target="#orderNowForm"></div>-->
<div class="modal1 mfp-hide" id="orderNowForm">
	<div class="block divcenter">
	    <button title="Close (Esc)" type="button" class="mfp-close">×</button>
		<div class="" style="padding-top:10px;">
	        <div class="mp-body">
			    <div class="heading-block custom-heading-block" >
			        <h3 class="ColorRed">Order Now</h3>
		        </div>
		        <div class="contact-form-main">
					<form action="<?= base_url('order-inquiry/submit')?>" id="contact-form" method="post" class="omniform" >					
						<!--<span class="form-heding">
							SEND AN ENQUIRY
						</span>-->
						<div class="alert alert-danger error" role="alert">
						</div>
						<div class='clear'></div>
						
						<div class="col_full">
							<input type="text" id="" name="name" placeholder="NAME*" value="<?= set_value('name');?>" class="sm-form-control required" required />
						</div>
						<div class="clear"></div>
						
						<div class="col_full">
							<input type="text" id="" name="companyname" placeholder="COMPANY NAME*" value="<?= set_value('companyname');?>" class="sm-form-control required" required >
						</div>
						<div class="clear"></div>
						
						<div class="col_full">
							<input type="email" id="" name="email" placeholder="EMAIL ID*" value="<?= set_value('email');?>" class="sm-form-control required email" required >
						</div>
						<div class="clear"></div>

						<div class="col_full">
							<input type="text" id="" name="mobile" placeholder="PHONE" value="<?= set_value('mobile');?>" class="sm-form-control">
						</div>
						<div class="clear"></div>
						
						<div class="col_full">
							<textarea class="required sm-form-control" id="" name="message" placeholder="INQUIRY"><?= set_value('message');?></textarea>
						</div>
						<div class="clear"></div>

						<div class="col_full hidden">
							<input type="text" id="phone" name="phone" value="" class="sm-form-control" />
							<input type="hidden" id="current_page" name="current_page" value="<?= current_url(); ?>">
							<input type="text" id="g-recaptcha" name="g-recaptcha" value="" />
                            <input type="text" id="g-recaptcha-action" name="g-recaptcha-action" value="" />
						</div>
						<div class="clear"></div>

						<div class="col_full">
						    <div class="d-flex justify-content-between align-items-center">
							<button class="button nomargin submit" name="submit" type="submit" id="submit" value="Send">Submit</button>
							<span class="required-field"><i>*Required field</i></span>
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="alert alert-success result" role="alert"></div>
					</form>
				</div>
			</div>
		
		</div>
	</div>
</div>
<style>
    .slider-element.swiper_wrapper,.swiper-slide{height:67.6vh !important;}
    .mfp-container .block{
    	background-color: #FFF;
    	max-width: 600px;
    }
    .mfp-container .post-image{
    	background-repeat:no-repeat;
    	background-size:cover;
    	background-position: center center;
    	height:400px;
    	width:100%;
    }
    .mfp-container .heading-block{
    	margin-bottom: 10px !important;
    	padding : 10px 0;
    }
    .mfp-container .mp-body{
    	padding: 20px 50px;
    }
    .mfp-close { color: #000; }
    
    @media only screen and (max-width: 576px){
    	.mfp-container .block{
    		background-color: #FFF;
    		max-width: 350px;
    	}
    	.mfp-container .heading-block{
    		margin-bottom: 0 !important;
    		padding-top: 10px;
    	}
    	.mfp-container .post-image{height:250px;}
    
    	.mfp-container .mp-body{
    		padding: 20px 20px;
    	}
    }
</style>
<a href="#orderNowForm" data-lightbox="inline"  href="#" Class="floating-ordernow"><img src="<?= base_url('assets/img/landing-pages/ordernowbutton.webp')?>" /><!--<span>Click Here to</span>ORDER NOW--></a>
<style>
    .product-single.radar-tires #slider-flex.flexslider::after, .product-single.radar-tires #slider-flex2.flexslider::after {display:none;}
    .product-single.radar-tires #slider-flex.flexslider .greenicon, .product-single.radar-tires #slider-flex2.flexslider .greenicon {
      content: "";
      width: 50px;
      height: 50px;
      background-image: url('https://www.omni-united.com/assets/img/carbon-neutral-icon.png');
      background-size: contain;
      background-repeat: no-repeat;
      position: absolute;
      left: calc(50% - 20px);
      bottom: 9.15%;
      transform: translateX(440%);
      z-index: 1;
    cursor: pointer;
    }

    .floating-ordernow{
        position: fixed;
        bottom: 80px;
        right: 30px;
        background-color: #da2224;
        border-radius: 50%;
        width: 100px;
        height: 100px;
        /*padding: 15px;*/
        color: #fff;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-flow:column wrap;
        z-index:101;
        font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important;
        font-weight: 500 !important;
        line-height: 1.1;
        font-size: 19px;
        text-align: center;
        border: 1px solid rgba(0,0,0,0.12);
    }
    .floating-ordernow span{
        margin-bottom: 4px;
        font-size: 9px;
        font-family: 'Lato',sans-serif;
        border-bottom: 1px solid #fff;
        padding-bottom: 4px;
        text-transform: uppercase;
    }
    .floating-ordernow:hover{
        background-color: #da2224;
        color: #fff;
    }
    
</style>

<style>
    .mfp-wrap.carbonNeutralPopUp{}
    /*.mfp-wrap.carbonNeutralPopUp .mfp-content{vertical-align: top;}*/
    /*.mfp-wrap.carbonNeutralPopUp .block{margin-right:0 !important;margin-top:6px;}*/
    .mfp-container #carbonNeutralPopUp .block{
    	background-color: #FFF;
    	max-width: 300px;
    }
    .mfp-container #carbonNeutralPopUp .mp-body{
    	padding: 15px 20px;
    }
    .mfp-container #carbonNeutralPopUp .mp-body .heading-block h3 {
      font-size: 1.9rem;
    }
    .mfp-container #carbonNeutralPopUp .mp-body .popuplogoimage{
    	height: 38px;
        margin: auto 5px;
    }
    
</style>