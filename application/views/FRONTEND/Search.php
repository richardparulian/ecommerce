<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1><?= $language['title_search_result']; ?></h1>
            <ul>
                <li><a href="<?= base_url(); ?>">Home</a></li>
                <li><?= $language['title_search_result']; ?>: "<?= $search; ?>"</li>
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
                            if ($getResult && $sortBy && $getLang) {
                                $urls = 'frontend_controller/filter_price_for_search?result=' . $getResult . '&sort=' . $sortBy . '&lang=' . $getLang;
                            } elseif ($getResult && $sortBy && !$getLang) {
                                $urls = 'frontend_controller/filter_price_for_search?result=' . $getResult . '&sort=' . $sortBy;
                            } elseif ($getResult && !$sortBy && $getLang) {
                                $urls = 'frontend_controller/filter_price_for_search?result=' . $getResult . '&lang=' . $getLang;
                            } elseif ($getResult && !$sortBy && !$getLang) {
                                $urls = 'frontend_controller/filter_price_for_search?result=' . $getResult;
                            }
                            ?>

                            <?= form_open($urls); ?>
                            <input type="hidden" class="amount1" name="amount1_search">
                            <input type="hidden" class="amount2" name="amount2_search">
                            <button type="submit" class="btn btn-sm btn-outline-dark load-progress">Filter</button>
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
                                    <li class=""><a href="<?= base_url($urls1); ?>" class="load-progress local"><?= $subcat['SubCategoryName']; ?></a></li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-12">
                <div class="drodo-grid-sorting row align-items-center">
                    <div class="col-lg-7 col-md-7 result-count">
                        <?php if ($countresult > 0) : ?>
                            <p><?= $language['title_product_available_1']; ?> <span class="count"><?= $countresult; ?></span> <?= $language['title_product_available_2']; ?></p>
                        <?php else : ?>
                            <p><?= $language['title_product_not_available']; ?></p>
                        <?php endif; ?>
                        <span class="sub-title d-lg-none"><a href="#" data-bs-toggle="modal" data-bs-target="#productsFilterModalSearch"><i class='bx bx-filter-alt'></i> Filter</a></span>
                    </div>

                    <div class="col-lg-5 col-md-5 ordering">
                        <div class="select-box">
                            <label><?= $language['title_sort_by']; ?>:</label>
                            <select id="sort_price_search">
                                <option value="asc" <?= ($sortBy == 'asc' ? "selected = 'selected'" : ""); ?>><?= $language['title_price_low_to_high']; ?></option>
                                <option value="desc" <?= ($sortBy == 'desc' ? "selected = 'selected'" : ""); ?>><?= $language['title_price_high_to_low']; ?></option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php if ($countresult == 0) : ?>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-0">
                                <div class="">
                                    <img src="<?= base_url('@static/img/filter.png'); ?>" class="my-image" alt="filter.png">
                                </div>
                            </div>
                            <div class="post-content text-center">
                                <h3><small>Sorry, no results were found for that query.</small></h3>
                            </div>
                        </div>
                    <?php else : ?>
                        <?php foreach ($getproduct as $product) : ?>
                            <div class="col-lg-4 col-md-4 col-sm-6">
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
                                                        <?php if ($this->session->userdata('r_sess_logged_in') == false) : ?>
                                                            <?php if ($product['ProductStatus'] == 1) : ?>
                                                                <a type="button" disabled>
                                                                    <i class='bx bxs-cart-add'></i>
                                                                    <span class="tooltip-label">Tambah ke keranjang</span>
                                                                </a>
                                                            <?php else : ?>
                                                                <a class="cart-btn-shop" data-goto="<?= base_url('frontend_controller/add_to_cart'); ?>" data-id="<?= $product['ProductID']; ?>" data-image="<?= $product['ProductPic']; ?>" data-slug="<?= $product['Slug']; ?>" data-name="<?= $product['ProductName']; ?>" data-price="<?= $product['ProductPrice']; ?>">
                                                                    <i class='bx bxs-cart-add'></i>
                                                                    <span class="tooltip-label">Tambah ke keranjang</span>
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php else : ?>
                                                            <?php if ($product['ProductStatus'] == 1) : ?>
                                                                <a type="button" disabled>
                                                                    <i class="bx bxs-cart-add"></i>
                                                                    <span class="tooltip-label">Tambahkan ke keranjang</span>
                                                                </a>
                                                            <?php else : ?>
                                                                <a type="button" class="cart-btn-shop-users" data-goto="<?= base_url('add/cart-items'); ?>" data-id="<?= $product['ProductID']; ?>" data-image="<?= $product['ProductPic']; ?>" data-slug="<?= $product['Slug']; ?>" data-name="<?= $product['ProductName']; ?>" data-price="<?= $product['ProductPrice']; ?>">
                                                                    <i class="bx bxs-cart-add"></i>
                                                                    <span class="tooltip-label">Tambahkan ke keranjang</span>
                                                                </a>
                                                            <?php endif; ?>
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
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Products Area -->

<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>