<style type="text/css">
    #page-title .page-title-dark{background-position: center center;}
    .si-share{padding-left:0;}.si-share div{float:none;}
    #content p.source_text{font-size:14px;}
    @media (max-width:991.98px) and (min-width:768px){
        #page-title .page-title-dark{background-position: center center;}
    }
	#content p.source_text a.blue:hover{color:#333!important;}
</style>
<!-- Page Title
============================================= --> 
<?php if($news['featured_image']!==null){ 
    $fimage=base_url('uploads/news/'.$news['featured_image']);
?>
<section id="page-title" class="page-title-dark" style="padding: 300px 0; background-image: url(<?= $fimage; ?>); background-size: cover; background-position: <?= $news['featured_image_position']; ?> !important;" data-bottom-top="background-position:0px 440px;" data-top-bottom="background-position:0px -500px;">

	<div class="container clearfix">
		<h1>&nbsp;</h1>
		<span>&nbsp;</span>
	</div>

</section>
<?php } ?>
<!-- #page-title end   -->
  
<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <?php if ($news) { ?>
        <section class="full-section">
            <div class="container">
                <div class="heading-block  center custom-heading-block ptlg mx-auto" style="max-width: 90%;">
                    <h2 class="ColorRed bottommargin-xs"><?= htmlspecialchars_decode($news['title']); ?></h2>
                    <?php if ($news['sub_title']!=null) { ?>
                    <span class="divcenter"><em><?= htmlspecialchars_decode($news['sub_title']); ?></em></span>
                    <?php } ?>
                </div>          
            </div>
        </section>
        <section class="full-section bottommargin-lg">
            <div class="container article-date clearfix">
                <h3><?= mdate('%F %d, %Y', human_to_unix($news['published_on'])); ?></h3>
            </div>
            <div class="container clearfix">
                <?= htmlspecialchars_decode($news['description']); ?>
            </div>
            <?php if(isset($news['source']) && $news['source']!==''):?>
            <div class="container clearfix">
                <?php 
                $links= json_decode($news['source']);
                ?>
                <p  class="source_text">Source: 
                    <?php
                    for($i=0;$i<count($links);$i++)
                    { ?>
                        <a class="blue" href="<?= htmlspecialchars_decode($links[$i]); ?>" target="_blank" style="word-break: break-all;"><?= htmlspecialchars_decode($links[$i]); ?></a>
                    <?php if($i < count($links)-1){ ?>
                    ,
                    <?php } } ?></p>
            </div>
            <?php endif; ?>
            <div class="container clearfix">
                <!-- Post Single - Share
    			============================================= -->
    			<div class="si-share noborder clearfix">
    				<!--<span>Share this Post:</span>-->
    				<div>
    					<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('climate-change/'.$news['slug']); ?>" title="Share on Facebook" class="social-icon si-borderless si-facebook">
    						<i class="icon-facebook"></i>
    						<i class="icon-facebook"></i>
    					</a>
    					<a target="_blank" href="https://twitter.com/intent/tweet?url=<?= base_url('climate-change/'.$news['slug']); ?>&text=" title="Share on Twitter" class="social-icon si-borderless si-twitter">
    						<i class="icon-twitter"></i>
    						<i class="icon-twitter"></i>
    					</a>
    					<!--<a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?= base_url('climate-change/'.$news['slug']); ?>&media=&description=" title="Share on Pinterest" class="social-icon si-borderless si-pinterest">-->
    					<!--	<i class="icon-pinterest"></i>-->
    					<!--	<i class="icon-pinterest"></i>-->
    					<!--</a>-->
    					<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= base_url('climate-change/'.$news['slug']); ?>&title=&summary=&source=" title="Share on LinkedIn" class="social-icon si-borderless si-linkedin">
    						<i class="icon-linkedin"></i>
    						<i class="icon-linkedin"></i>
    					</a>
    					<a target="_blank" href="https://api.whatsapp.com/send?phone=&text=<?= base_url('climate-change/'.$news['slug']); ?>"  target="_blank" title="Share on WhatsApp" class="social-icon si-borderless si-whatsapp">
    						<i class="iconmoon-whatsapp"></i>
    						<i class="iconmoon-whatsapp"></i>
    					</a>
    					<a target="_blank" href="mailto:?&subject=&body=<?= base_url('climate-change/'.$news['slug']); ?>" class="social-icon si-borderless si-email3">
    						<i class="icon-email3"></i>
    						<i class="icon-email3"></i>
    					</a>
    				</div>
    			</div><!-- Post Single - Share End -->
			</div>
        </section>
        <?php }else{ ?>
        <section class="full-section">
            <div class="container">
                <div class="heading-block  center custom-heading-block ptlg">
                    <h2 class="ColorRed bottommargin-xs">Page Not found.</h2>
                </div>          
            </div>
        </section>
        <?php } ?>
    </div><!-- .content-wrap -->
</section><!-- #content end --> 