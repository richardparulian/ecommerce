<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <?php if ($getLang) : ?>
                <h1><?= $getStaticPage['StaticPageTitleEn']; ?></h1>
                <ul>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                    <li><?= $getStaticPage['StaticPageTitleEn']; ?></li>
                </ul>
            <?php else : ?>
                <h1><?= $getStaticPage['StaticPageTitle']; ?></h1>
                <ul>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                    <li><?= $getStaticPage['StaticPageTitle']; ?></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start Categories Area -->
<section class="customer-service-area ptb-70">
    <div class="container">
        <div class="customer-service-content">
            <?php if ($getLang) : ?>
                <h5><?= $getStaticPage['StaticPageTitleEn']; ?></h5>
                <p><?= $getStaticPage['StaticPageDescEn']; ?></p>
            <?php else : ?>
                <h5><?= $getStaticPage['StaticPageTitle']; ?></h5>
                <p><?= $getStaticPage['StaticPageDesc']; ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Categories Area -->

<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>