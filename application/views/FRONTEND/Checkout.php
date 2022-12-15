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

<?= $this->session->flashdata('success'); ?>
<?= $this->session->flashdata('errors'); ?>

<!-- Start Cart Area -->
<section class="cart-area">
    <div class="user-actions page-title-content">
        <div class="container">
            <ul style="margin-top: unset;">
                <li><a href="<?= base_url(); ?>"><small>Home</small></a></li>
                <li><small>Checkout</small></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <?php if ($countItems < 1) : ?>
            <div class="mb-0">
                <img src="<?= base_url('@static/img/start-shopping.png'); ?>" class="my-image-cart">
            </div>
            <div class="post-content text-center">
                <h5><small>your cart is currently empty.</small></h5>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12 col-sm-12 col-md-12 text-center mb-5">
                    <a href="<?= base_url('product-category/zoll-aeds') ?>" class="default-btn"><i class='bx bxs-shopping-bag'></i> Start Shopping</a>
                </div>
            </div>
        <?php else : ?>
            <?= form_open('frontend_controller/update_cart_checkout'); ?>
            <div class="cart-table table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                </div>
                            </th>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getCartForCheckout as $key) : ?>
                            <tr>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="id[]" value="<?= $key['CartID']; ?>" id="flexSwitchCheckDefault">
                                    </div>
                                </td>
                                <td class="product-thumbnail">
                                    <a href="#">
                                        <?php if ($key['ProductPic'] == '') : ?>
                                            <img src="<?= base_url('@static/img/products/Default-Product-Pic.png'); ?>" alt="item">
                                        <?php else : ?>
                                            <img src="<?= base_url('@static/img/products/' . $key['ProductPic']['PicName']); ?>" alt="<?= $key['ProductPic']['PicName']; ?>">
                                        <?php endif; ?>

                                    </a>
                                </td>
                                <td class="product-name">
                                    <a href="#"><?= $key['ProductName']; ?></a>
                                </td>
                                <td class="product-price">
                                    <span class="unit-amount"><?= number_format($key['ProductPrice'], 0, ',', '.'); ?> IDR</span>
                                </td>
                                <td class="product-quantity text-center">
                                    <div class="input-counter">
                                        <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                        <input type="text" min="1" value="<?= $key['ProductQty']; ?>" name="qty_<?= $key['CartID']; ?>">
                                        <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="subtotal-amount"><?= number_format($key['ProductTotal'], 0, ',', '.'); ?> IDR</span>
                                    <a type="button" class="remove" id="delete-cart" data-id="<?= $key['CartID']; ?>" data-name="<?= $key['ProductName']; ?>" data-bs-toggle="modal" data-bs-target="#deleteCart"><i class="bx bx-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="cart-buttons">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-sm-6 col-md-6 text-end">
                        <button type="submit" id="btn-update-checkout" class="default-btn"><i class="flaticon-return-box"></i> Update Cart</button>
                        <button type="submit" id="btn-puc" class="default-btn" disabled style="display: none;"><i class="flaticon-return-box"></i> Updating...</button>
                    </div>
                </div>
            </div>

            <div class="cart-totals mb-5">
                <h3>Cart Totals</h3>
                <ul>
                    <li>Subtotal <span><?= number_format($getSubtotal, 0, ',', '.'); ?> IDR</span></li>
                    <li>Tax <span>0</span></li>
                    <li>Total <span><?= number_format($getSubtotal, 0, ',', '.'); ?> IDR</span></li>
                </ul>
                <a href="<?= base_url('Frontend_controller/send_offer') ?>" id="btn-checkout" class="default-btn"><i class="flaticon-trolley"></i> Proceed to Checkout</a>
                <a type="button" id="btn-pc" class="default-btn" disabled style="display: none;"><i class="flaticon-trolley"></i> Proceed...</a>
            </div>
            <input type="hidden" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <?= form_close(); ?>
        <?php endif; ?>
    </div>
</section>
<!-- End Cart Area -->
<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>