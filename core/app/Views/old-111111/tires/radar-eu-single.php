<?php 
$extra_cols_on=false;
$extra_cols=json_decode( $tyres['sizes_extra_columns'], $assoc_array = false );
if (!empty($extra_cols)){ $extra_cols_on=true; }else{ $extra_cols=array(); }
 
$images=json_decode( $tyres['image'], $assoc_array = true );
$images=$images['other'];

$features=json_decode( $tyres['features'], $assoc_array = true );
$tyres['search_tag_url']=str_replace(['/',' ','-'],'',strtolower($tyres['search_tag']));
?>
<!-- Page Title
============================================= -->
<!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

  <div class="content-wrap product-single radar-tires">

    <section id="full-width" class="full-section clearfix">
      
      <div class="container clearfix">
        
        <div class="row clearfix">
          <div class="col-lg-12">
            <ol class="breadcrumb product-breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><i class="icon-angle-right"></i>
                  <a href="<?= base_url($tyres['brand_slug']);?>">
                    <?= ucfirst($tyres['brand_title']); ?>
                  </a>
                </li>
              <li class="breadcrumb-item uppercase"><i class="icon-angle-right"></i>
                <a href="<?= base_url($tyres['brand_slug'].'#tabs-'.$tyres['search_tag_url']);?>">
                  <?= str_replace(['-'],' ',strtolower($tyres['search_tag'])) ?>
                </a>
              </li>
              <li class="breadcrumb-item"><i class="icon-angle-right"></i><?= htmlspecialchars_decode($tyres['title']); ?></li>
            </ol>
          </div>
        </div>
        
        <div class="row clearfix">
          <div class="col-lg-6">
            <?php if($tyres['premium_tyre']!==null){ ?>
			    <div class="premium-tyre--badge">PREMIUM COLLECTION</div>
			<?php } ?>
          </div>
        </div>
        


        <div class="row clearfix vertical-align product-details details-again ">
          <div class="col-lg-6">
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
                <li class="col_one_third  <?= $i%3==0?'col_last':''?>"><i class="<?= $icon['icon_class']; ?>"></i><?= $icon['icon_title']; ?></li>
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
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </section><!--dimax r8+ end-->

    <?php if (!empty($features)) : ?>
    <section id="full-width" class="full-section product-features  product-features2  clearfix" style="background-color: #f7f7f7;">
      <div class="container clearfix">          

        <div class="heading center nobottommargin">
          <h2 class="ColorGray2">features</h2>
        </div>
        <div class="row clearfix product-feature-points  product-feature-gray ">
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
    
    

    <?php if (!empty($tyre_vs_section['content'])) :  $cont=htmlspecialchars_decode($tyre_vs_section['content']);?>
    <section id="full-width" class="full-section topmargin bottommargin  clearfix" style="background-color: #fff;">
      <div class="container clearfix">          

        <div class="heading center nobottommargin">
          <h2 class="ColorGray2">Video</h2>
        </div>
        <div class="row clearfix product-feature-points  product-feature-gray ">
            <?php echo $cont;?>
        </div>

      </div>
    </section>
    <hr/>
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
                              <th class="">S.W.</th>
                            <?php endif; ?>
                            <?php if (in_array('eulabel', $extra_cols)): ?>
                              <th class="small-cols medium-col hidden-sm"></th>
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
                            <td><?= $size["rim"]; ?>
                              <?php if ($extra_cols_on && in_array('eulabel', $extra_cols)): ?>
                                <label for="eulabel-<?= $size['rim']; ?>" class="label-as-link eulabeldetails-toggle-button small-screen-link">Show EU labels</label>
                              <?php endif; ?>
                            </td>
                            <td><?= $size["li_sr"]; ?></td>
                            <td><?= $size["lr"]; ?></td>
                            
                            <?php if ($extra_cols_on==true): ?>
                                <?php if (in_array('s_w', $extra_cols)): ?>
                                <td><?= $size["s_w"]; ?></td>
                                <?php endif; ?>
                              <?php if (in_array('eulabel', $extra_cols)): ?>
                               <td class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-<?= $size['rim']; ?>" class="eulabel-checkbox "><label for="eulabel-<?= $size['rim']; ?>" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                              <?php endif; ?>
                            <?php endif; ?>
                            
                          </tr>
                          <?php if ($extra_cols_on && in_array('eulabel', $extra_cols)): ?>
                          <tr id="eulabel-eulabeldetails-<?= $size['rim']; ?>" class="eulabeldetails">
                            <td colspan="4">
                              <?php if(isset($size["eulabel"]) && $size["eulabel"] !== null):
                                $exempted=false; 
                                if(isset($size["exempted"]) && $size["exempted"] == 1){ $exempted=$size["exempted"]; }
                              ?>
                              <div class="eulabeldetails-wrapper">
                                <?php $eulabel=$size["eulabel"]; ?>
                                <div class="eulabel-image <?= $exempted; ?> <?= $exempted?'no-border':''; ?>">
                                  <img class="lozad" data-placeholder-background="#fff" data-src="<?= base_url('uploads/eu-labels/Label_'.$eulabel.'.webp') ?>" alt="">
                                </div>
                              </div>
                              <?php else:?>
                              <div class="eulabeldetails-wrapper">
                                EU Label details not available.
                              </div>
                              <?php endif;?>
                            </td>
                          </tr>
                          <?php endif; ?>
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
                              <th class="">S.W.</th>
                            <?php endif; ?>
                            <?php if (in_array('eulabel', $extra_cols)): ?>
                              <th class="small-cols medium-col hidden-sm"></th>
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
                            <td><?= $size["rim"]; ?>
                              <?php if ($extra_cols_on && in_array('eulabel', $extra_cols)): ?>
                                <label for="eulabel-<?= $size['rim']; ?>" class="label-as-link eulabeldetails-toggle-button small-screen-link">Show EU labels</label>
                              <?php endif; ?>
                            </td>
                            <td><?= $size["li_sr"]; ?></td>
                            <td><?= $size["lr"]; ?></td>
                            <?php if ($extra_cols_on==true): ?>
                                <?php if (in_array('s_w', $extra_cols)): ?>
                                 <td><?= $size["s_w"]; ?></td>
                                <?php endif; ?>
                              <?php if (in_array('eulabel', $extra_cols)): ?>
                               <td class="hidden-sm" style="line-height:17px;font-size: 14px;vertical-align: middle;"><input type="checkbox" id="eulabel-<?= $size['rim']; ?>" class="eulabel-checkbox"><label for="eulabel-<?= $size['rim']; ?>" class="label-as-link eulabeldetails-toggle-button">Show EU labels</label></td>
                              <?php endif; ?>
                            <?php endif; ?>
                          </tr>
                          <?php if ($extra_cols_on && in_array('eulabel', $extra_cols)): ?>
                          <tr id="eulabel-eulabeldetails-<?= $size['rim']; ?>" class="eulabeldetails">
                            <td colspan="4">
                              <?php if(isset($size["eulabel"]) && $size["eulabel"] !== null):
                                $exempted=false; 
                                if(isset($size["exempted"]) && $size["exempted"] == 1){ $exempted=true; }
                              ?>
                              <div class="eulabeldetails-wrapper">
                                <?php $eulabel=$size["eulabel"]; ?>
                                <div class="eulabel-image <?= $exempted?'no-border':'';?>">
                                  <img class="lozad" data-src="<?= base_url('uploads/eu-labels/Label_'.$eulabel.'.webp') ?>" alt="">
                                </div>
                              </div>
                              <?php else:?>
                              <div class="eulabeldetails-wrapper">
                                EU Label details not available.
                              </div>
                              <?php endif;?>
                            </td>
                          </tr>
                          <?php endif; ?>
                        <?php } ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php } ?>
                <?php if(strpos($tyres['sizes'] , '*')): ?>
                <!--<div style="margin-top: 25px;"><span class="color">*</span> On selected sizes only.</div>-->
                <?php endif; ?>
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
                  <?php 
                  if ($tyres['legend']!==null) { 
                    $tyres_legend= htmlspecialchars_decode($tyres['legend']);
                    echo $tyres_legend;
                  } else{ ?>

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
<style>
  .eulabeldetails,.eulabel-checkbox{display: none;}
  .eulabeldetails.show{display: table-row;}
  .eulabeldetails > td{border-top:none; border-bottom: none;}
  .label-as-link{margin-bottom: 0;color:#DA2224;font-size:14px;font-weight: 600;text-transform: none;font-family: 'Lato',sans-serif;}
  table tr.border-bottom-transparent{border-bottom-color: rgba(170,170,170,0) !important;}
  .eulabeldetails-wrapper{display: flex;}
  .eulabeldetails-wrapper{font-size: 14px;}
  .eulabeldetails-wrapper .eulabel-image{width: 100%;}
  .eulabeldetails-wrapper .eulabel-image img{max-width: 300px;border: 2px solid #034da2;margin: 15px;}
  .eulabeldetails-wrapper .eulabel-image.no-border img{border: none;}
  .eulabeldetails-wrapper .eulabel-details-content{display: none;}
  .small-screen-link{display: none;}
  .large-screen-link{display: block;}
  @media only screen and (max-width: 1024px) {
    .hidden-sm{display: none;}
    .small-screen-link{display: block;}
    .large-screen-link{display: none;}
  }
</style>