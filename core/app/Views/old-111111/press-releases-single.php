<!-- Page Title
============================================= --> 
<?php if($press_release['featured_image']!==null){ 
    $fimage=base_url('uploads/post_images/'.$press_release['featured_image']);
?>
<section id="page-title" class="page-title-dark page-title-right skrollable skrollable-between" style="padding: 300px 0; background-image: url(<?= $fimage; ?>); background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 440px;" data-top-bottom="background-position:0px -500px;">

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
        <?php if ($press_release) { ?>
        <section class="full-section">
            <div class="container">
                <div class="heading-block  center custom-heading-block ptlg">
                    <h2 class="ColorRed bottommargin-xs"><?= htmlspecialchars_decode($press_release['title']); ?></h2>
                    <?php if ($press_release['sub_title']!=null) { ?>
                    <span class="divcenter"><em><?= htmlspecialchars_decode($press_release['sub_title']); ?></em></span>
                    <?php } ?>
                </div>          
            </div>
        </section>
        <section class="full-section">
            <div class="container clearfix">
                <?= htmlspecialchars_decode($press_release['description']); ?>
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