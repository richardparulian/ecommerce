<?php
if ($getLang) {
    $contactUs          = 'contact-us?lang=' . $getLang;
    $privacyPolicy      = 'privacy-policy?lang=' . $getLang;
    $termsConditions    = 'terms-conditions?lang=' . $getLang;
    $aboutUs            = 'about-us?lang=' . $getLang;
    $faq                = 'faq?lang=' . $getLang;
    $shippingReturns    = 'shipping-returns?lang=' . $getLang;
} else {
    $contactUs          = 'contact-us';
    $privacyPolicy      = 'privacy-policy';
    $termsConditions    = 'terms-conditions';
    $aboutUs            = 'about-us';
    $faq                = 'faq';
    $shippingReturns    = 'shipping-returns';
}
?>
<div class="col-lg-4 col-md-12">
    <aside class="widget-area">
        <section class="widget widget_insight">
            <ul class="sidebar-right">
                <li><a href="<?= base_url($faq) ?>"><?= $language['title_help_faq']; ?></a></li>
                <li><a href="<?= base_url($contactUs); ?>"><?= $language['title_contact_us']; ?></a></li>
                <li><a href="<?= base_url($privacyPolicy); ?>"><?= $language['title_privacy_policy']; ?></a></li>
                <li><a href="<?= base_url($shippingReturns); ?>"><?= $language['title_shipping_return']; ?></a></li>
                <li><a href="<?= base_url($termsConditions); ?>"><?= $language['title_term_condition']; ?></a></li>
                <li><a href="<?= base_url($aboutUs); ?>"><?= $language['title_about_us']; ?></a></li>
            </ul>
        </section>
    </aside>
</div>
</div>
</div>
</section>
<!-- End Shipping & Returns -->

<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>