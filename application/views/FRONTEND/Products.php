<style>
    .page-numbers a:hover {
        color: #fff;
    }

    .spinner-center {
        align-items: center;
        justify-content: center;
        display: flex;
    }
</style>
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

<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Products</h1>
            <ul>
                <?php if ($getLang) : ?>
                    <li><a href="<?= base_url() . '?lang=' . $getLang; ?>">Home</a></li>
                <?php else : ?>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                <?php endif; ?>
                <li>Products</li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start Products Area -->
<section class="products-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="woocommerce-widget-area">
                    <div class="woocommerce-widget price-list-widget">
                        <h5 class="woocommerce-widget-title"><small><?= $language['title_filter_by_price']; ?></small></h5>

                        <div class="collection-filter-by-price mb-3">
                            <input class="js-range-of-price" type="text" name="filter_by_price" data-step="10">
                        </div>
                        <div>
                            <?php
                            if ($getFilter && $getLang) {
                                $urls = 'frontend_controller/filter_price?lang=' . $getLang . '&filter=' . $getFilter;
                            } elseif (!$getFilter && $getLang) {
                                $urls = 'frontend_controller/filter_price?lang=' . $getLang;
                            } elseif ($getFilter && !$getLang) {
                                $urls = 'frontend_controller/filter_price?filter=' . $getFilter;
                            } else {
                                $urls = 'frontend_controller/filter_price';
                            }
                            ?>

                            <?= form_open($urls); ?>
                            <input type="hidden" class="amount1" name="amount1">
                            <input type="hidden" class="amount2" name="amount2">
                            <button type="submit" class="load-progress btn btn-sm btn-outline-dark">Filter</button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                    <div class="woocommerce-widget brands-list-widget">
                        <h5 class="woocommerce-widget-title"><small><?= $language['title_category_product']; ?></small></h5>

                        <ul class="brands-list-row">
                            <?php foreach ($getallcategory as $cat) : ?>
                                <?php foreach ($cat['SubCategory'] as $subcat) : ?>
                                    <?php
                                    if ($getLang) {
                                        $urls1 = 'product-category/' . $subcat['SubUrl'] . '?lang=' . $getLang;
                                    } else {
                                        $urls1 = 'product-category/' . $subcat['SubUrl'];
                                    }
                                    ?>
                                    <li class="<?= ($this->uri->segment(3) == $subcat['SubUrl'] ? 'active' : ''); ?>"><a href="<?= base_url($urls1); ?>" class="load-progress local"><?= $subcat['SubCategoryName']; ?></a></li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-12">
                <div class="drodo-grid-sorting row align-items-center">
                    <div class="col-lg-6 col-md-6 result-count">
                        <?php if ($countProduct > 0) : ?>
                            <p><?= $language['title_product_available_1']; ?> <span class="count"><?= $countProduct; ?></span> <?= $language['title_product_available_2']; ?></p>
                        <?php else : ?>
                            <p><?= $language['title_product_not_available']; ?></p>
                        <?php endif; ?>
                        <span class="sub-title d-lg-none"><a href="#" data-bs-toggle="modal" data-bs-target="#productsFilterModal"><i class='bx bx-filter-alt'></i> Filter</a></span>
                    </div>

                    <div class="col-lg-6 col-md-6 ordering">
                        <div class="select-box">
                            <label><?= $language['title_sort_by']; ?>:</label>
                            <select id="sort_price">
                                <option value="asc" <?= $filter == 'asc' ? "selected = 'selected'" : ""; ?>><small><?= $language['title_price_low_to_high']; ?></small></option>
                                <option value="desc" <?= $filter == 'desc' ? "selected = 'selected'" : ""; ?>><small><?= $language['title_price_high_to_low']; ?></small></option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($getProducts as $product) : ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-products-box">
                                <div class="image">
                                    <div class="card loading" style="border: unset;">
                                        <?php if ($getLang) : ?>
                                            <figure class="spinner-center">
                                                <a href="<?= base_url('product/' . $product['Slug'] . '?lang=' . $getLang); ?>" class="load-progress local d-block">
                                                    <img src="<?= base_url('@static/img/spinner.gif'); ?>" data-src="<?= base_url('@static/img/products/' . $product['ProductImage']); ?>" alt="<?= $product['ProductName']; ?>" class="lazy-load">
                                                </a>
                                            </figure>
                                        <?php else : ?>
                                            <figure class="card-image spinner-center">
                                                <a href="<?= base_url('product/' . $product['Slug']); ?>" class="load-progress local d-block">
                                                    <img src="<?= base_url('@static/img/spinner.gif'); ?>" data-src="<?= base_url('@static/img/products/' . $product['ProductImage']); ?>" alt="<?= $product['ProductName']; ?>" class="lazy-load">
                                                </a>
                                            </figure>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ($product['ProductStatus'] == 1) : ?>
                                        <div class="sale">Habis</div>
                                    <?php elseif ($product['ProductStatus'] == 2) : ?>
                                        <div class="new">Promo</div>
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
                                                        <a class="cart-btn-shop" data-goto="<?= base_url('frontend_controller/add_to_cart'); ?>" data-id="<?= $product['ProductID']; ?>" data-image="<?= $product['ProductImage']; ?>" data-slug="<?= $product['Slug']; ?>" data-name="<?= $product['ProductName']; ?>" data-price="<?= $product['ProductPrice']; ?>">
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
                                                <div class="<?= $product['ProductID']; ?>" style="display: none;">
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
                        </div>
                    <?php endforeach; ?>
                    <div class="col-lg-12 col-md-12">
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Products Area -->

<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>