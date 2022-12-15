<!-- Start QuickView Modal Area -->
<div class="modal fade productsQuickView" id="productsQuickView" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>

            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <!-- <div class="card loading" style="border: unset;">
                        <figure class="card-image-modal">
                            <div class="show-image" style="display: none;"> -->
                    <div id="productimage" class="products-image">

                    </div>
                    <!-- </div>
                        </figure>
                    </div> -->
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="products-content">

                        <div id="productname">

                        </div>

                        <div id="productprice" class="price">

                        </div>

                        <ul id="ket" class="products-info mb-5">

                        </ul>

                        <div class="products-add-to-cart">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="input-counter">
                                        <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                        <input type="text" class="quantity" name="quantity_modal" min="1" value="1">
                                        <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div id="btn-cart-wishlist">

                                    </div>
                                    <div id="btn-adding">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="info">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End QuickView Modal Area -->

<!-- Start Shopping Cart Modal -->
<div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>

            <div class="modal-body">
                <h3><?= $language['title_my_cart']; ?><span id="modal-total-items-cart"></span></h3>

                <div id="items-cart" class="products-cart-content">

                </div>
                <div id="subtotal-cart" class="products-cart-subtotal">

                </div>
                <div id="checkout-cart" class="products-cart-btn" data-session="<?= $this->auth_model->is_logged_in(); ?>">

                </div>
                <div id="see-all-cart" class="w-full text-center mt-3">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shopping Cart Modal -->

<!-- Start Products Filter Modal Area -->
<div class="modal left fade productsFilterModal" id="productsFilterModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i> Close</span>
            </button>

            <div class="modal-body">
                <div class="woocommerce-widget-area">
                    <div class="woocommerce-widget price-list-widget">
                        <h5 class="woocommerce-widget-title"><small>Filter By Price</small></h5>

                        <div class="mb-3">
                            <small class="fw-bolder">Harga : <span class="amount"></sp></small>
                        </div>
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
                            <button type="submit" class="btn btn-sm btn-dark">Filter</button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                    <div class="woocommerce-widget brands-list-widget">
                        <h5 class="woocommerce-widget-title"><small>Kategori Produk</small></h5>

                        <ul class="brands-list-row">
                            <?php foreach ($getallcategory as $cat) : ?>
                                <?php foreach ($cat['SubCategory'] as $subcat) : ?>
                                    <li class="<?= ($this->uri->segment(3) == $subcat['SubUrl'] ? 'active' : ''); ?>"><a href=" <?= base_url('products/' . $cat['CategoryUrl'] . '/' . $subcat['SubUrl']); ?>"><?= $subcat['SubCategoryName']; ?></a></li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Products Filter Modal Area -->

<!-- Start Products Filter Modal Area For Search -->
<div class="modal left fade productsFilterModal" id="productsFilterModalSearch" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i> Close</span>
            </button>

            <div class="modal-body">
                <div class="woocommerce-widget-area">
                    <div class="woocommerce-widget price-list-widget">
                        <h5 class="woocommerce-widget-title"><small>Filter By Price</small></h5>

                        <div class="mb-3">
                            <small class="fw-bolder">Harga : <span class="amount"></span></small>
                        </div>
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
                            <button type="submit" class="btn btn-sm btn-dark">Filter</button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                    <div class="woocommerce-widget brands-list-widget">
                        <h5 class="woocommerce-widget-title"><small>Kategori Produk</small></h5>

                        <ul class="brands-list-row">
                            <?php foreach ($getallcategory as $cat) : ?>
                                <?php foreach ($cat['SubCategory'] as $subcat) : ?>
                                    <li class="<?= ($this->uri->segment(3) == $subcat['SubUrl'] ? 'active' : ''); ?>"><a href=" <?= base_url('products/' . $cat['CategoryUrl'] . '/' . $subcat['SubUrl']); ?>"><?= $subcat['SubCategoryName']; ?></a></li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Products Filter Modal Area For Search -->

<!-- Start Delete Address Modal Area -->
<div class="modal fade myModal" id="deleteAddress" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <?php
        if ($getLang) {
            $urls = 'Frontend_controller/delete_address?lang=' . $getLang;
        } else {
            $urls = 'Frontend_controller/delete_address';
        }
        ?>
        <?= form_open($urls); ?>
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>
            <div class="modal-body">
                <div class="align-items-center">
                    <span>Are you sure you would like to remove <span id="show-name" class="fw-bolder"></span> from the address book?</span>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="address_id" id="address_id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="delete-address-modal" class="btn btn-danger">Yes, remove it!</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!-- End Delete Address Modal Area -->

<!-- Start Delete Cart Modal Area -->
<div class="modal fade myModal" id="deleteCart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <?= form_open('Frontend_controller/remove_cart_checkout'); ?>
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>
            <div class="modal-body">
                <div class="align-items-center">
                    <span>Are you sure you would like to remove <span class="show-product-name fw-bolder"></span> from the cart?</span>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="cart_id" id="cart_id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="btn-delete-checkout" class="btn btn-danger">Yes, remove it!</button>
                <button type="submit" id="btn-pdc" class="btn btn-danger" disabled style="display: none;">Removing...</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!-- End Delete Cart Modal Area -->

<!-- Start Delete Cart Modal Area Local Storage -->
<div class="modal fade myModal" id="removeCart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>
            <div class="modal-body">
                <div class="align-items-center">
                    <span>Are you sure you would like to remove <span class="show-product-name fw-bolder"></span> from the cart?</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="btn-remove" class="btn btn-danger">Yes, remove it!</button>
                <input type="hidden" name="product-id" id="product-id">
                <input type="hidden" name="url" id="url">
                <input type="hidden" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            </div>
        </div>
    </div>
</div>
<!-- End Delete Cart Modal Area Local Storage -->

<!-- Modal Cart Empty -->
<div class="modal fade" id="cartEmpty" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="<?= base_url("/@static/img/cart.png"); ?>" />
                <div>
                    <span>Keranjang anda masih kosong!</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?= base_url(); ?>" type="button" class="btn btn-danger">Belanja Sekarang!</a>
            </div>
        </div>
    </div>
</div>