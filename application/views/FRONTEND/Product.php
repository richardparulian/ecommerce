<div class="alert-container-add">
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <div>Items has been successfully added to cart</div>
    </div>
</div>

<div class="alert-container-remove">
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <div>Items removed successfully from cart</div>
    </div>
</div>

<div class="alert-container-error">
    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <div>This process failed, please klik <a href="javascript:window.location.reload()">here</a> for refresh this page!</div>
    </div>
</div>

<?= $this->session->flashdata('success'); ?>
<?= $this->session->flashdata('errors'); ?>

<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1><?= $getProduct['ProductName']; ?></h1>
            <ul>
                <li><a href="<?= base_url(); ?>">Home</a></li>
                <li><a href="<?= base_url('product-category/' . $getSubCategory['SubUrl']); ?>"><?= $getSubCategory['SubCategoryName']; ?></a></li>
                <li><?= $getProduct['ProductName']; ?></li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start Product Details Area -->
<section class="product-details-area pt-70 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="products-details-image">
                    <ul class="products-details-image-slides owl-theme owl-carousel" data-slider-id="1">
                        <li><img src="<?= base_url('@static/img/products/' . $getProductPicArr); ?>" alt="<?= $getProduct['ProductName']; ?>"></li>
                    </ul>

                    <!-- Carousel Thumbs -->
                    <div class="owl-thumbs products-details-image-slides-owl-thumbs" data-slider-id="1">
                        <?php foreach ($getProductPic as $picture) : ?>
                            <div class="owl-thumb-item">
                                <img src="<?= base_url('@static/img/products/' . $picture['PicName']); ?>" alt="<?= $getProduct['ProductName']; ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-12">
                <div class="products-details-desc">
                    <h5><?= $getProduct['ProductName']; ?></h5>

                    <div class="price">
                        <?php if ($getProduct['ProductStatus'] == 2) : ?>
                            <span class="new-price"><?= number_format($getProduct['ProductPrice'], 0, ',', '.'); ?> IDR</span>
                            <span class="old-price"><?= number_format($getProduct['ProductPriceOld'], 0, ',', '.'); ?> IDR</span>
                        <?php else : ?>
                            <span class="new-price"><?= number_format($getProduct['ProductPrice'], 0, ',', '.'); ?> IDR</span>
                        <?php endif; ?>
                    </div>

                    <div class="products-review">

                    </div>

                    <ul class="products-info mb-5">
                        <li>Brand: <span class="fw-bolder"><?= isset($getBrand['BrandName']) ? $getBrand['BrandName'] : 'Tidak ada brand'; ?></span></li>

                        <?php if ($getProduct['ProductStatus'] == 1) : ?>
                            <li>Ketersediaan: <span class="fw-bolder">Stok Habis</span></li>
                        <?php else : ?>
                            <li>Ketersediaan: <span class="fw-bolder">Stok Tersedia</span></li>
                        <?php endif; ?>
                        <li>SKU: <span class="fw-bolder"><?= $getProduct['ProductSKU']; ?></span></li>
                    </ul>

                    <div class="products-color-switch">

                    </div>

                    <div class="products-size-wrapper">

                    </div>

                    <div class="products-info-btn">
                        <?php if ($getLang) : ?>
                            <a href="<?= base_url('shipping-returns?lang=' . $getLang); ?>"><i class='bx bxs-truck'></i> Shipping</a>
                            <a href="<?= base_url('contact-us?lang=' . $getLang); ?>"><i class='bx bx-envelope'></i> Tanyakan tentang produk ini</a>
                        <?php else : ?>
                            <a href="<?= base_url('shipping-returns'); ?>"><i class='bx bxs-truck'></i> Shipping</a>
                            <a href="<?= base_url('contact-us'); ?>"><i class='bx bx-envelope'></i> Tanyakan tentang produk ini</a>
                        <?php endif; ?>
                    </div>

                    <div class="products-add-to-cart mb-5">
                        <div class="input-counter">
                            <span class="minus-btn"><i class='bx bx-minus'></i></span>
                            <input type="text" class="quantity" name="quantity_page" value="1" min="1">
                            <span class="plus-btn"><i class='bx bx-plus'></i></span>
                        </div>

                        <?php if ($getProduct['ProductStatus'] == 1) : ?>
                            <button type="button" class="default-btn" disabled>
                                <i class="flaticon-trolley"></i>
                                Tambah ke keranjang
                            </button>
                        <?php else : ?>
                            <button type="button" class="cart-btn-shop default-btn <?= $getProduct['Slug']; ?>" data-goto="<?= base_url('frontend_controller/add_to_cart'); ?>" data-id="<?= $getProduct['ProductID']; ?>" data-image="<?= $getProductPicArr; ?>" data-slug="<?= $getProduct['Slug']; ?>" data-name="<?= $getProduct['ProductName']; ?>" data-price="<?= $getProduct['ProductPrice']; ?>">
                                <i class="flaticon-trolley"></i>
                                Tambah ke keranjang
                            </button>
                        <?php endif; ?>

                        <button type="button" class="default-btn <?= $getProduct['ProductID']; ?>" disabled style="display: none;"><i class="flaticon-trolley"></i> Adding...</button>
                        <input type="hidden" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    </div>

                    <div class="wishlist-btn">

                    </div>

                    <div class="buy-checkbox-btn">
                        <div class="item">
                            <?php if ($getProduct['ProductStatus'] == 1) : ?>
                                <a type="button" class="default-btn" disabled>
                                    Beli Sekarang!
                                </a>
                            <?php else : ?>
                                <a href="#" class="cart-btn-shop-v2 local default-btn <?= $getProduct['Slug']; ?>" data-goto="<?= base_url('frontend_controller/add_to_cart'); ?>" data-id="<?= $getProduct['ProductID']; ?>" data-image="<?= $getProductPicArr; ?>" data-slug="<?= $getProduct['Slug']; ?>" data-name="<?= $getProduct['ProductName']; ?>" data-price="<?= $getProduct['ProductPrice']; ?>">Beli Sekarang!</a>
                            <?php endif; ?>
                            <a type="button" class="default-btn <?= $getProduct['ProductID']; ?>" disabled style="display: none;"> Adding...</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="products-details-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description">Deskripsi</a></li>
                        <li class="nav-item"><a class="nav-link" id="shipping-tab" data-bs-toggle="tab" href="#specification" role="tab" aria-controls="shipping">Spesifikasi</a></li>
                        <li class="nav-item"><a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#includes" role="tab" aria-controls="reviews">Include</a></li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <p><?= $getProduct['ProductDescription']; ?></p>
                        </div>

                        <div class="tab-pane fade" id="specification" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive-sm">
                                    <tbody>
                                        <?php foreach ($getProductSpec as $prodspec) : ?>
                                            <tr>
                                                <td><?= $prodspec['SpecTitle']; ?></td>
                                                <td><?= $prodspec['SpecDescription']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="includes" role="tabpanel">
                            <table class="table table-bordered table-responsive-sm">
                                <tbody>
                                    <?php foreach ($getIncludes as $include) : ?>
                                        <tr>
                                            <td><?= $include['IncludeName']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="related-products">
        <div class="container">
            <div class="section-title">
                <h5>Produk Terkait</h5>
            </div>

            <div class="products-slides owl-carousel owl-theme">
                <?php foreach ($getProductRelated as $product) : ?>

                    <div class="single-products-box">
                        <div class="image">

                            <?php if ($getLang) : ?>
                                <a href="<?= base_url('product/' . $product['Slug'] . '?lang=' . $getLang); ?>" class="load-progress local d-block"><img src="<?= base_url('@static/img/products/' . $product['ProductPic']); ?>" alt="<?= $product['ProductName']; ?>"></a>
                            <?php else : ?>
                                <a href="<?= base_url('product/' . $product['Slug']); ?>" class="load-progress local d-block"><img src="<?= base_url('@static/img/products/' . $product['ProductPic']); ?>" alt="<?= $product['ProductName']; ?>"></a>
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
                                                <a class="cart-btn-shop" data-goto="<?= base_url('frontend_controller/add_to_cart'); ?>" data-id="<?= $product['ProductID']; ?>" data-image="<?= isset($product['ProductPic']['PicName']) ? $product['ProductPic']['PicName'] : 'Default-Product-Pic.png'; ?>" data-slug="<?= $product['Slug']; ?>" data-name="<?= $product['ProductName']; ?>" data-price="<?= $product['ProductPrice']; ?>">
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
    </div>
</section>
<!-- End Product Details Area -->

<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>