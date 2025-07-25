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
            <!--<div id="testfreaks-badge"></div>
            <div><a href="#" data-scrollto="#video-reviews" data-easing='easeOutQuad' data-speed="750" data-offset="70" >Watch Video Reviews</a></div>-->

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
    
    <!--Video Reviews-->
    <!--<?php if($tyre_reviews!=null): 
        $video_reviews=json_decode($tyre_reviews['video_reviews'],true);
        $i=1;
    ?>
    <section id="video-reviews" class="full-section section-dark ptlg clearfix">
        <div class="container clearfix">
            <div class="row" style="justify-content: center;">
                <div class="heading center nobottommargin">
                  <h2 class="ColorGray2">Video reviews</h2>
                </div>
            </div>
            <div class="row">
                <div class="vid-reviews"  data-lightbox="gallery">
                    <?php foreach($video_reviews as $review): if($review['poster']==null){$review['poster']='noimage.webp';}?>
                        <a class="vid-review lozad-background mfp-iframe" href="<?php echo $review['url']; ?>" data-lightbox="gallery-item"  data-background-image="<?= base_url('uploads/video-reviews-posters/'.$review['poster']);?>"></a>
                    <?php $i++; endforeach; ?>
                </div>
            </div>
        </div>
        
    </section>
    <?php endif; ?>-->
    
    <!--Test Freaks Reviews-->
    
    <!--<section id="full-width" class="full-section section-dark clearfix">
        <div class="container clearfix">
            <div class="row" style="display:block;">
                <div id="testfreaks-reviews"></div>
            </div>
        </div>
    </section>-->

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

<script>
  testFreaks = window.testFreaks || [];
  testFreaks.push(["setProductId", "<?php echo $tyres['slug']?>"]);
  testFreaks.push(["load", ["badge", "reviews"]]);
</script>

<style type="text/css">
    .vid-reviews{
        display: flex;
        flex-direction:row;
        justify-content: center;
        align-items: center;
        align-self: center;
        flex-wrap:wrap;
        
        margin: auto;
    }
    .vid-review{
      display:flex;
      justify-content:center;
      align-items:center;
      width: 250px;
      height: 200px;
      margin: 0 10px 25px;
      background-size: cover;
      background-position: center center;
      border-radius: 25px;
    }
    .vid-review::after{
      content: " ";
      width: 70px;
      height: 50px;
      opacity: 0.5;
      background-image: url(https://www.omni-united.com/assets/img/yt-play-button.webp);
      background-size: cover;
      background-position: center center;
      transition: all 0.3s;
      -webkit-transition: all 0.3s;
      -o-transition: all 0.3s;
      -moz-transition: all 0.3s;
    }
    .vid-review:hover:after{
        opacity:0.8;
        transform:scale(1.2);
    }
    .mfp-close {
        right: -44px!important;
        top: -44px!important;
    }
    
    /*Modal Navs*/
    .mfp-arrow.mfp-arrow-left:before, .mfp-arrow.mfp-arrow-right:before{display: none;}
    .mfp-arrow.mfp-arrow-left:after,
    .mfp-arrow.mfp-arrow-right:after{
          display: inline-block;
          font-family: 'font-icons';
          speak: none;
          font-style: normal;
          font-weight: normal;
          font-variant: normal;
          text-transform: none;
          line-height: inherit;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
          color: white;
          font-size: 3rem;
          border: none;
          margin: 0;
          width: 90px;
          height: 110px;
          line-height: 1em;
    }
    .mfp-arrow.mfp-arrow-left:after{
        content: "\e7a4";
    }
    .mfp-arrow-right::after{
          content: "\e7a5";
    }
    /*.mfp-content .navigation{
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 72.4px;
      color: white;
    }
    .mfp-content .navigation.left{
      left: -40px;
    }
    .mfp-content .navigation.right{
      right: -40px;
    }*/
    
    @media only screen and (min-width:769px) and (max-width:992px){
        .vid-review{
            width: 250px;
            height: 200px;
            margin-bottom: 20px;
        }
        .vid-review::after{}
        
        .mfp-close {
            right: 0px!important;
            top: -44px!important;
        }
    }
    @media only screen and (max-width:768px){
        .vid-review{
            width: 225px;
            height: 180px;
        }
        .vid-review::after{}
        
        .mfp-close {
            right: 0px!important;
            top: -44px!important;
        }
    }
    @media only screen and (max-width:540px){
        .vid-review{
            width: 160px;
            height: 128px;
            margin-bottom: 20px;
        }
        .vid-review::after{
            width: 60px;
            height: 40px;}
        
        .mfp-close {
            right: 0px!important;
            top: -44px!important;
        }
    }
</style>