<!-- Page Title
============================================= --> 

<!-- #page-title end   -->
  
<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <?php if ($coverages) { ?>
        <section class="full-section">
            <div class="container">
                <div class="heading-block  center custom-heading-block ptlg">
                    <h2 class="ColorRed bottommargin-xs"><?= htmlspecialchars_decode($coverages['title']); ?></h2>
                </div>          
            </div>
        </section>
        <section class="full-section bottommargin-sm">
            <div class="container clearfix">
                <?= htmlspecialchars_decode($coverages['description']); ?>
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