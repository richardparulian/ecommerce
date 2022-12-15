<!-- backup code if fitur login on -->

<!-- product page -->
<!-- <?php if ($this->session->userdata('r_sess_logged_in') == true) : ?>
    <?php if ($getProduct['ProductStatus'] == 1) : ?>
        <button type="button" class="default-btn" disabled>
            <i class="flaticon-trolley"></i>
            Tambah ke keranjang
        </button>
    <?php else : ?>
        <button type="button" class="cart-btn-shop-users default-btn <?= $getProduct['Slug']; ?>" data-goto="<?= base_url('add/cart-items'); ?>" data-id="<?= $getProduct['ProductID']; ?>" data-image="<?= $getProductPicArr; ?>" data-slug="<?= $getProduct['Slug']; ?>" data-name="<?= $getProduct['ProductName']; ?>" data-price="<?= $getProduct['ProductPrice']; ?>">
            <i class="flaticon-trolley"></i>
            Tambah ke keranjang
        </button>
    <?php endif; ?>
<?php else : ?>
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
<?php endif; ?> -->

<!-- <?php if ($this->session->userdata('r_sess_logged_in') == true) : ?>
    <?php if ($getProduct['ProductStatus'] == 1) : ?>
                <a type="button" class="default-btn" disabled>
                    Beli Ssekarang!
                </a>
            <?php else : ?>
                <a href="#" class="cart-btn-shop-users-v2 local default-btn <?= $getProduct['Slug']; ?>" data-goto="<?= base_url('frontend_controller/add_to_cart'); ?>" data-id="<?= $getProduct['ProductID']; ?>" data-image="<?= $getProductPicArr; ?>" data-slug="<?= $getProduct['Slug']; ?>" data-name="<?= $getProduct['ProductName']; ?>" data-price="<?= $getProduct['ProductPrice']; ?>">Beli Sekarang!</a>
            <?php endif; ?>
        <?php else : ?>
            <?php if ($getProduct['ProductStatus'] == 1) : ?>
                <a type="button" class="default-btn" disabled>
                    Beli Ssekarang!
                </a>
            <?php else : ?>
                <a href="#" class="cart-btn-shop-v2 local default-btn <?= $getProduct['Slug']; ?>" data-goto="<?= base_url('frontend_controller/add_to_cart'); ?>" data-id="<?= $getProduct['ProductID']; ?>" data-image="<?= $getProductPicArr; ?>" data-slug="<?= $getProduct['Slug']; ?>" data-name="<?= $getProduct['ProductName']; ?>" data-price="<?= $getProduct['ProductPrice']; ?>">Beli Sekarang!</a>
        <?php endif; ?>
<?php endif; ?> -->

<!-- product related -->

<!-- <?php if ($this->session->userdata('r_sess_logged_in') == true) : ?>
    <?php if ($product['ProductStatus'] == 1) : ?>
        <a type="button" disabled>
            <i class="bx bxs-cart-add"></i>
            <span class="tooltip-label">Tambahkan ke keranjang</span>
        </a>
    <?php else : ?>
        <a type="button" class="cart-btn-shop-users" data-session="<?= $this->session->userdata('r_sess_user_id'); ?>" data-goto="<?= base_url('add/cart-items'); ?>" data-id="<?= $product['ProductID']; ?>" data-image="<?= isset($product['ProductPic']['PicName']) ? $product['ProductPic']['PicName'] : 'Default-Product-Pic.png'; ?>" data-slug="<?= $product['Slug']; ?>" data-name="<?= $product['ProductName']; ?>" data-price="<?= $product['ProductPrice']; ?>">
            <i class="bx bxs-cart-add"></i>
            <span class="tooltip-label">Tambahkan ke keranjang</span>
        </a>
    <?php endif; ?>
<?php else : ?>
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
<?php endif; ?> -->

<!-- shop page -->
<!-- <?php if ($this->session->userdata('r_sess_logged_in') == true) : ?>
    <?php if ($product['ProductStatus'] == 1) : ?>
        <a type="button" disabled>
            <i class="bx bxs-cart-add"></i>
            <span class="tooltip-label">Tambahkan ke keranjang</span>
        </a>
    <?php else : ?>
        <a type="button" class="cart-btn-shop-users" data-session="<?= $this->session->userdata('r_sess_user_id'); ?>" data-goto="<?= base_url('add/cart-items'); ?>" data-id="<?= $product['ProductID']; ?>" data-image="<?= $product['ProductImage']; ?>" data-slug="<?= $product['Slug']; ?>" data-name="<?= $product['ProductName']; ?>" data-price="<?= $product['ProductPrice']; ?>">
            <i class="bx bxs-cart-add"></i>
            <span class="tooltip-label">Tambahkan ke keranjang</span>
        </a>
    <?php endif; ?>
<?php else : ?>
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
<?php endif; ?> -->

<!-- quickview modal product in script -->
if (session == true) {
if (response.ProductStatus == 1) {
btn = '<button type="button" class="default-btn" disabled><i class="flaticon-trolley"></i> Tambah ke keranjang</button>'
} else {
if (response.ProductPic == null) {
image = 'Default-Product-Pic.png'
} else {
image = response.ProductPic.PicName
}
btn = '<div class="' + response.ProductSlug + '">' +
    '<button type="button" class="' + response.Slug + ' cart-btn-shop-users default-btn" data-goto="' + window.location.origin + '/add/cart-items" data-id="' + response.ProductID + '" data-image="' + image + '" data-slug="' + response.ProductSlug + '" data-name="' + response.ProductName + '" data-price="' + response.ProductPrice + '" style=""><i class="flaticon-trolley"></i> Tambah ke keranjang</button>' +
    '</div>'
}
} else {
if (response.ProductStatus == 1) {
btn = '<button type="button" class="default-btn" disabled><i class="flaticon-trolley"></i> Tambah ke keranjang</button>'
} else {
if (response.ProductPic == null) {
image = 'Default-Product-Pic.png'
} else {
image = response.ProductPic.PicName
}
btn = '<div class="' + response.ProductSlug + '">' +
    '<button type="button" class="cart-btn-shop default-btn" data-goto="' + window.location.origin + '/frontend_controller/add_to_cart" data-id="' + response.ProductID + '" data-image="' + image + '" data-slug="' + response.ProductSlug + '" data-name="' + response.ProductName + '" data-price="' + response.ProductPrice + '" style=""><i class="flaticon-trolley"></i> Tambah ke keranjang</button>' +
    '</div>'
}
}

<!-- login topbar -->

<?php if ($this->session->userdata('r_sess_user_role') == 'customer') : ?>
    <li class="nav-item">
        <div class="dropdown currency-switcher d-inline-block">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?= base_url('@static/img/user1.png'); ?>" style="width: 25px; height: 25px; border-radius: 22px" />
                <small><?= $this->session->userdata('r_sess_user_first_name'); ?></small>
            </button>

            <div class="dropdown-menu" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px">
                <?php
                if ($getLang) {
                    $urlsAccount    = 'customer/account?lang=' . $getLang;
                } else {
                    $urlsAccount    = 'customer/account';
                }
                ?>
                <a href="<?= base_url($urlsAccount); ?>" class="dropdown-item d-flex align-items-center">
                    <small style="margin-right: 10px"><?= $language['title_my_account']; ?></small></i>
                </a>
                <a href="<?= base_url('auth_controller/logout'); ?>" class="dropdown-item d-flex align-items-center" style="margin-top: 50px">
                    <small style="margin-right: 10px"><?= $language['title_auth']; ?> </small><i class="bx bx-log-out-circle"></i>
                </a>
            </div>
        </div>
    </li>
<?php else : ?>
    <li><a href="javascript:referer();" id="referer"><small><?= $language['title_account']; ?></small></a></li>
<?php endif; ?>

<!-- login footer -->
<?php if ($this->session->userdata('r_sess_logged_in')) : ?>
    <li><a href="<?= base_url($myAccountV2); ?>"><?= $language['title_my_account']; ?></a></li>
<?php else : ?>
    <li><a href="<?= base_url($myAccount); ?>"><?= $language['title_my_account']; ?></a></li>
<?php endif; ?>

<!-- products page -->
<?php if ($this->session->userdata('r_sess_logged_in') == true) : ?>
    <?php if ($product['ProductStatus'] == 1) : ?>
        <a type="button" disabled>
            <i class="bx bxs-cart-add"></i>
            <span class="tooltip-label">Tambahkan ke keranjang</span>
        </a>
    <?php else : ?>
        <a type="button" class="cart-btn-shop-users" data-session="<?= $this->session->userdata('r_sess_user_id'); ?>" data-goto="<?= base_url('add/cart-items'); ?>" data-id="<?= $product['ProductID']; ?>" data-image="<?= $product['ProductImage']; ?>" data-slug="<?= $product['Slug']; ?>" data-name="<?= $product['ProductName']; ?>" data-price="<?= $product['ProductPrice']; ?>">
            <i class="bx bxs-cart-add"></i>
            <span class="tooltip-label">Tambahkan ke keranjang</span>
        </a>
    <?php endif; ?>
<?php else : ?>
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
<?php endif; ?>

<!-- controller checkout cart -->
if (!$this->auth_model->is_logged_in()) {
content
} else {
$usersId = $this->session->userdata('r_sess_user_id');
$getCart = $this->M_Global->getmultiparam("Cart", "UsersID = '$usersId'")->result_array();
$checkout = [];
$data['getSubtotal'] = 0;

foreach ($getCart as $cart) {
$productId = $cart['ProductID'];
$productPrice = $cart['ProductPrice'];
$productQty = $cart['ProductQty'];
$total = $productPrice * $productQty;
$data['getSubtotal'] += $total;
$array = (array)$productId;

foreach ($array as $arr) {
$getPic = $this->M_Global->getmultiparam("ProductPic", "PicArr = 1 AND ProductID = '$arr' ")->row_array();
}

$checkout[] = array(
'CartID' => $cart['CartID'],
'UsersID' => $cart['UsersID'],
'ProductID' => $cart['ProductID'],
'ProductName' => $cart['ProductName'],
'ProductPrice' => $cart['ProductPrice'],
'ProductQty' => $cart['ProductQty'],
'ProductTotal' => $total,
'ProductPic' => $getPic
);
}
$data['getCartForCheckout'] = $checkout;
$data['countItems'] = $this->M_Global->count("Cart", "UsersID = '$usersId'");

$this->load->view('FRONTEND/__components/header', $data);
$this->load->view('FRONTEND/__components/nav', $data);
$this->load->view('FRONTEND/Checkout', $data);
$this->load->view('FRONTEND/__components/modal');
$this->load->view('FRONTEND/__components/footer');
}

// if (session == false) {
// showCartForGuest()
// addToCartForGuest()
// addToCartForGuestV2()
// removeCartForGuest()
// totalCartItemsForGuest()
// checkoutForGuest()
// } else {
// totalCartItemsForUsers()
// showCartForUsers()
// addToCartForUsers()
// addToCartForUsersV2()
// addToCartAfterLogin()
// removeCartForUsers()
// }