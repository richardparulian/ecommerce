<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
    .alert-container-add {
        display: none;
    }

    .alert-container-remove {
        display: none;
    }

    .alert-container-error {
        display: none;
    }
</style>

<div class="alert-container-add">
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <div>Items has been successfully added to cart</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

<div class="alert-container-remove">
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <div>Items removed successfully from cart</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

<div class="alert-container-error">
    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <div>This process failed, please klik <a href="javascript:window.location.reload()">here</a> for refresh this page!</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

<!-- Start Home Slides Area -->
<section class="home-slides owl-carousel owl-theme">
    <?php foreach ($slider as $banner) : ?>
        <div class="single-banner-item">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-12">
                                <div class="banner-content">
                                    <h1><?= $language['slider_banner']; ?></h1>
                                    <div class="btn-box">
                                        <div class="d-flex align-items-center">
                                            <a href="<?= $banner['BannerUrl']; ?>" class="load-progress local default-btn"><i class="flaticon-trolley"></i> <?= $language['btn_banner']; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-12">
                                <div class="banner-image text-center">
                                    <img src="<?= base_url('@static/img/banner-slider/' . $banner['BannerImage']); ?>" class="main-image owl-lazy" alt="<?= $banner['BannerImage']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>
<!-- End Home Slides Area -->

<!-- Start Products Area -->
<section class="products-area pt-70 pb-40">
    <div class="container">
        <div class="section-title" style="margin-bottom: 50px;">
            <h5><?= $language['title_best']; ?></h5>
        </div>
        <div class="row align-items-center mb-3">
            <div class="col-lg-6 col-md-6">
                <div class="contact-form">
                    <h6>ZOLL AED Plus with Real CPR Help Technology</h6>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="top-header-menu">
                    <h6><?= $language['content_best']; ?></h6>
                </div>
            </div>
        </div>
        <div class="products-slides owl-carousel owl-theme">
            <?php foreach ($getBestProduct as $product) : ?>
                <div class="single-products-box">
                    <div class="image">

                        <?php if ($getLang) : ?>
                            <a href="<?= base_url('product/' . $product['Slug'] . '?lang=' . $getLang); ?>" class="load-progress local d-block">
                                <img src="<?= base_url('@static/img/loading-screen.png'); ?>" data-src="<?= base_url('@static/img/products/' . $product['ProductPic']); ?>" alt="<?= $product['ProductName']; ?>" class="owl-lazy">
                            </a>
                        <?php else : ?>
                            <a href="<?= base_url('product/' . $product['Slug']); ?>" class="load-progress local d-block">
                                <img src="<?= base_url('@static/img/loading-screen.png'); ?>" data-src="<?= base_url('@static/img/products/' . $product['ProductPic']); ?>" alt="<?= $product['ProductName']; ?>" class="owl-lazy">
                            </a>
                        <?php endif; ?>


                        <?php if ($product['ProductStatus'] == 1) : ?>
                            <div class="sale">Habis</div>
                        <?php elseif ($product['ProductStatus'] == 2) : ?>
                            <div class="new">Promo</div>
                        <?php else : ?>
                            <div></div>
                        <?php endif; ?>

                        <div class="buttons-list">
                            <ul>
                                <li>
                                    <div class="<?= $product['Slug']; ?> cart-btn">

                                        <?php if ($product['ProductStatus'] == 1) : ?>
                                            <a type="button" disabled>
                                                <i class="bx bxs-cart-add"></i>
                                                <span class="tooltip-label">Tambahkan ke keranjang</span>
                                            </a>
                                        <?php else : ?>
                                            <a type="button" class="cart-btn-shop" data-goto="<?= base_url('frontend_controller/add_to_cart'); ?>" data-id="<?= $product['ProductID']; ?>" data-image="<?= isset($product['ProductPic']) ? $product['ProductPic'] : 'Default-Product-Pic.png'; ?>" data-slug="<?= $product['Slug']; ?>" data-name="<?= $product['ProductName']; ?>" data-price="<?= $product['ProductPrice']; ?>">
                                                <i class="bx bxs-cart-add"></i>
                                                <span class="tooltip-label">Tambahkan ke keranjang</span>
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                </li>
                                <li>
                                    <div class="<?= $product['Slug']; ?> quick-view-btn">
                                        <a href="#" data-bs-toggle="modal" id="quickview" data-goto="<?= base_url('frontend_controller/quickview_product'); ?>" data-id="<?= $product['ProductID']; ?>" data-bs-target="#productsQuickView">
                                            <i class='bx bx-search-alt'></i>
                                            <span class="tooltip-label">Lihat sekilas</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <div class="<?= $product['ProductID'] ?>" style="display: none;">
                                        <button class="default-btn" disabled>
                                            <i class="flaticon-trolley"></i>
                                            <span> Adding...</span>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="content">
                        <?php if ($getLang) : ?>
                            <h6><a href="<?= base_url('product/' . $product['Slug'] . '?lang=' . $getLang); ?>" class="load-progress local"><?= $product['ProductName']; ?></a></h6>
                        <?php else : ?>
                            <h6><a href="<?= base_url('product/' . $product['Slug']); ?>" class="load-progress local"><?= $product['ProductName']; ?></a></h6>
                        <?php endif; ?>

                        <div class="price">
                            <?php if ($product['ProductStatus'] == 2) : ?>
                                <span class="old-price"><?= number_format($product['ProductPriceOld'], 0, ',', '.'); ?> IDR</span>
                                <span class="new-price"><?= number_format($product['ProductPrice'], 0, ',', '.'); ?> IDR</span>
                            <?php else : ?>
                                <span class="new-price"><?= number_format($product['ProductPrice'], 0, ',', '.'); ?> IDR</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <input type="hidden" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Products Area -->

<!-- Start Products Area -->
<section class="products-area pb-40">
    <div class="container">
        <div class="section-title">
            <h5><?= $language['title_client']; ?></h5>
        </div>

        <div class="row align-items-center">
            <?php foreach ($getclients as $clients) : ?>
                <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                    <div class="single-brands-item">
                        <a href="<?= $clients['ClientUrl']; ?>" class="d-block" target="_blank"><img src="<?= base_url('@static/img/brands/' . $clients['ClientImage']); ?>" alt="<?= $clients['ClientImage']; ?>" style="border-radius: 10px"></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Products Area -->

<!-- Start Brands Area -->
<!-- <section class="brands-area bg-f7f8fa pb-40">
    <div class="container">

    </div>
</section> -->
<!-- End Brands Area -->

<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>