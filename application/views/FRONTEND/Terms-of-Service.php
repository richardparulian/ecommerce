<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1><?= $language['title_term_condition']; ?></h1>
            <ul>
                <?php if ($getLang) : ?>
                    <li><a href="<?= base_url() . '?lang=' . $getLang; ?>">Home</a></li>
                <?php else : ?>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                <?php endif; ?>
                <li><?= $language['title_term_condition']; ?></li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start Privacy Policy Area -->
<section class="privacy-policy-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="privacy-policy-content">
                    <?php if ($getLang) : ?>
                        <?= $getTermsConditions->TnCEn; ?>
                    <?php else : ?>
                        <?= $getTermsConditions->TnC; ?>
                    <?php endif; ?>

                </div>
            </div>