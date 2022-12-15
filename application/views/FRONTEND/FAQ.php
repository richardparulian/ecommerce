<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1><?= $language['title_help_faq']; ?></h1>
            <ul>
                <?php if ($getLang) : ?>
                    <li><a href="<?= base_url() . '?lang=' . $getLang; ?>">Home</a></li>
                <?php else : ?>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                <?php endif; ?>
                <li><?= $language['title_help_faq']; ?></li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start FAQ Area -->
<section class="faq-area ptb-70">
    <div class="container">
        <div class="tab faq-accordion-tab">
            <div class="tab-content">
                <div class="tabs-item">
                    <div class="faq-accordion">
                        <ul class="accordion">
                            <?php
                            $no = 1;
                            foreach ($getFaq as $value) { ?>
                                <li class="accordion-item">
                                    <a class="accordion-title <?= ($value['FaqTitle'][0]) ? $value['FaqTitle'][0] : 'active'; ?>" href="javascript:void(0)">
                                        <i class='bx bx-chevron-down'></i>
                                        <?php if ($getLang) : ?>
                                            Q<?= $no++; ?>. <?= $value['FaqTitleEn']; ?>
                                        <?php else : ?>
                                            Q<?= $no++; ?>. <?= $value['FaqTitle']; ?>
                                        <?php endif; ?>

                                    </a>

                                    <div class="accordion-content <?= ($value['FaqDesc'][0]) ? $value['FaqDesc'][0] : 'show'; ?>">
                                        <?php if ($getLang) : ?>
                                            <p><?= $value['FaqDescEn']; ?></p>
                                        <?php else : ?>
                                            <p><?= $value['FaqDesc']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End FAQ Area -->

<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>