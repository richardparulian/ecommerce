<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
if ($getLang) {
    $contactUs          = 'contact-us?lang=' . $getLang;
    $privacyPolicy      = 'privacy-policy?lang=' . $getLang;
    $termsConditions    = 'terms-conditions?lang=' . $getLang;
    $aboutUs            = 'about-us?lang=' . $getLang;
    $myAccount          = 'customer/account/login?lang=' . $getLang;
    $myAccountV2        = 'customer/account?lang=' . $getLang;
    $faq                = 'faq?lang=' . $getLang;
    $shippingReturns    = 'shipping-returns?lang=' . $getLang;
} else {
    $contactUs          = 'contact-us';
    $privacyPolicy      = 'privacy-policy';
    $termsConditions    = 'terms-conditions';
    $aboutUs            = 'about-us';
    $myAccount          = 'customer/account/login';
    $myAccountV2        = 'customer/account';
    $faq                = 'faq';
    $shippingReturns    = 'shipping-returns';
}
?>

<!-- Start Footer Area -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <a href="#" class="logo d-inline-block"><img src="<?= base_url('@static/img/' . $getBasicConfiguration['ConfigLogo']); ?>" alt="<?= $getBasicConfiguration['ConfigLogo']; ?>"></a>
                    <ul class="footer-contact-info">
                        <li><span><small><?= $language['title_phone']; ?>: </small></span><small><a href="tel:<?= hp($getBasicConfiguration['ConfigPhone']); ?>"><?= $getBasicConfiguration['ConfigPhone']; ?> Ext. <?= $getBasicConfiguration['ConfigExt']; ?></a></small></li>
                        <li><span><small><?= $language['title_email']; ?>: </small></span><small><a href="mailto:<?= $getBasicConfiguration['ConfigEmail']; ?>"><?= $getBasicConfiguration['ConfigEmail']; ?></a></small></li>
                        <li><span><small><?= $language['title_address']; ?>: </small></span><small><a href="<?= $getBasicConfiguration['ConfigAddressUrl']; ?>" target="_blank"><?= $getBasicConfiguration['ConfigAddress']; ?></a></small></li>
                    </ul>
                    <ul class="social">
                        <?php foreach ($getMediaSocial as $medsoc) : ?>
                            <li><a href="<?= $medsoc['MediaSocialUrl']; ?>" target="_blank"><?= $medsoc['MediaSocialIcon']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3><?= $language['title_information']; ?></h3>

                    <ul class="link-list">
                        <li><a href="<?= base_url($contactUs); ?>" class="local"><?= $language['title_contact_us']; ?></a></li>
                        <li><a href="<?= base_url($privacyPolicy); ?>" class="local"><?= $language['title_privacy_policy']; ?></a></li>
                        <li><a href="<?= base_url($termsConditions); ?>" class="local"><?= $language['title_term_condition']; ?></a></li>
                        <li><a href="<?= base_url($aboutUs); ?>" class="local"><?= $language['title_about_us']; ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3><?= $language['title_customer_service']; ?></h3>

                    <ul class="link-list">
                        <li><a href="<?= base_url($faq); ?>" class="local"><?= $language['title_help_faq']; ?></a></li>
                        <li><a href="<?= base_url($shippingReturns); ?>" class="local"><?= $language['title_shipping_return']; ?></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <p>Copyright @2022 Triquetra. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Area -->

<div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

<!-- Links of JS files -->
<script src="<?= base_url('@static/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/popper.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/magnific-popup.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/fancybox.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/owl.carousel.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/owl.carousel2.thumbs.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/meanmenu.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/nice-select.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/rangeSlider.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/sticky-sidebar.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/wow.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/form-validator.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/contact-form-script.js'); ?>"></script>
<script src="<?= base_url('@static/js/ajaxchimp.min.js'); ?>"></script>
<script src="<?= base_url('@static/js/main.js'); ?>"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
<script>
    /* show active navbar */
    let url = window.location.href

    $('ul.navbar-nav a').filter(function() {
        return this.href == url
    }).addClass('active')

    $('ul.navbar-nav a').filter(function() {
        return this.href == url
    }).last().parents('li').addClass('active')

    $('ul.side a').filter(function() {
        return this.href == url
    }).last().parents('li').addClass('active')

    $('ul.brands-list-row a').filter(function() {
        return this.href == url
    }).last().parents('li').addClass('active')

    $('ul.sidebar-right a').filter(function() {
        return this.href == url
    }).last().parents('li').addClass('active')

    let session = '<?= $this->auth_model->is_logged_in() ?>'
    let elements2 = document.querySelectorAll('[href*="https://elfsight.com"]');
    delete elements2
    let queryString = window.location.search
    let urlParams = new URLSearchParams(queryString)
    let lang = urlParams.get("lang")
    let min_price = urlParams.get("min-price")
    let max_price = urlParams.get("max-price")
    let result = urlParams.get("result")
    let page = urlParams.get("page")
    let products = ''
    let cart = ''
    let getUrl = ''

    function referer() {
        getUrl = JSON.parse(localStorage.getItem("url"))

        if (lang) {
            window.location.href = window.location.origin + '/customer/account/login/referer/' + getUrl + '?lang=' + lang
        } else {
            window.location.href = window.location.origin + '/customer/account/login/referer/' + getUrl
        }
    }

    function checklogin() {
        showCartForGuest()
        addToCartForGuest()
        addToCartForGuestV2()
        removeCartForGuest()
        totalCartItemsForGuest()
        checkoutForGuest()
    }

    // Start for Guest
    function checkoutForGuest() {
        cart = JSON.parse(localStorage.getItem('cart'))
        let tableProductsCheckout = '';
        let tableSubTotal = ''
        let tableVatTotal = ''
        let tableGrandTotal = ''
        let btnCheckout = ''
        let subTotal = 0
        let vat = 0

        if (cart === null) {
            tableProductsCheckout = '<tr>' +
                '<td colspan="3" class="product-name text-center">' +
                '<a href="#">Cart is empty!</a>' +
                '</td>'
        } else {
            let count = cart.length

            if (count === 0) {
                tableProductsCheckout = '<tr>' +
                    '<td colspan="4" class="product-name text-center">' +
                    '<a href="#">Cart is empty!</a>' +
                    '</td>'

                btnCheckout = '<button type="submit" class="default-btn" disabled><i class="flaticon-tick"></i>Send Quotation<span></span></button>'

            } else {

                $(cart).each(function(index, value) {
                    let qty = parseInt(value.qty)
                    let price = parseInt(value.price)
                    total = qty * price
                    subTotal += total
                    grandTotal = subTotal + vat

                    tableProductsCheckout += '<tr>' +
                        '<td class="product-name">' +
                        '<a href="#">' + value.name + '</a>' +
                        '</td>' +
                        '<td class="product-total text-center">' +
                        '<span class="subtotal-amount">' + value.price + '</span>' +
                        '</td>' +
                        '<td class="product-total text-center">' +
                        '<span class="subtotal-amount">' + value.qty + '</span>' +
                        '</td>' +
                        '<td class="product-total">' +
                        '<span class="subtotal-amount">' + new Intl.NumberFormat("id-ID", {
                            currency: "IDR"
                        }).format(total) + ' IDR</span>' +
                        '</td>' +
                        '</tr>'
                })

                tableSubTotal = '<tr>' +
                    '<td colspan="3" class="order-subtotal">' +
                    '<span>Cart Subtotal</span>' +
                    '</td>' +

                    '<td class="order-subtotal-price">' +
                    '<span class="order-subtotal-amount">' + new Intl.NumberFormat("id-ID", {
                        currency: "IDR"
                    }).format(subTotal) + ' IDR</span>' +
                    '</td>' +
                    '</tr>'

                tableVatTotal = '<tr>' +
                    '<td colspan="3" class="order-shipping">' +
                    '<span>Tax</span>' +
                    '</td>' +

                    '<td class="shipping-price">' +
                    '<span>0 IDR</span>' +
                    '</td>' +
                    '</tr>'

                tableGrandTotal = '<tr>' +
                    '<td colspan="3" class="total-price">' +
                    '<span>Order Total</span>' +
                    '</td>' +

                    '<td class="product-subtotal">' +
                    '<span class="subtotal-amount">' + new Intl.NumberFormat("id-ID", {
                        currency: "IDR"
                    }).format(grandTotal) + ' IDR</span>' +
                    '</td>' +
                    '</tr>'

                btnCheckout = '<button type="submit" class="default-btn"><i class="flaticon-tick"></i>Send Quotation<span></span></button>'
            }
        }

        $("#tableCheckout").html(tableProductsCheckout)
        $("#tableSubTotalCheckout").html(tableSubTotal)
        $("#tableTotalVatCheckout").html(tableVatTotal)
        $("#tableGrandTotalCheckout").html(tableGrandTotal)
        $("#btnCheckout").html(btnCheckout)
    }

    function addToCartForGuest() {
        $(document).on("click", ".cart-btn-shop", function(e) {
            e.preventDefault()
            let url = $(this).data('goto')
            let product_id = $(this).data('id')
            let product_image = $(this).data('image')
            let product_name = $(this).data('name')
            let product_slug = $(this).data('slug')
            let product_price = $(this).data('price')
            let quantityName = $('.quantity').attr('name')
            let csrfName = $('.csrfname').attr('name')
            let csrfHash = $('.csrfname').val()
            let product_qty = ''

            if (quantityName == 'quantity_modal') {
                product_qty = parseInt($("input[name='quantity_modal']").val())
            } else if (quantityName == 'quantity_page') {
                product_qty = parseInt($("input[name='quantity_page']").val())
            } else {
                product_qty = parseInt(1)
            }

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    product_id: product_id,
                    product_image: product_image,
                    product_name: product_name,
                    product_slug: product_slug,
                    product_price: product_price,
                    product_qty: product_qty,
                    [csrfName]: csrfHash
                },
                dataType: 'json',
                beforeSend: function() {
                    $('.progress-container').show()
                    $('.' + product_slug).hide()
                    $('.' + product_id).show()
                },
                success: function(response) {
                    // update csrf hash
                    $('.csrfname').val(response.token)
                    $('input[name=quantity_modal').val(1)
                    $('input[name=quantity_page').val(1)

                    localStorage.setItem("products", JSON.stringify(response));
                    if (!localStorage.getItem("cart")) {
                        localStorage.setItem("cart", "[]");
                    }

                    products = JSON.parse(localStorage.getItem("products"));
                    cart = JSON.parse(localStorage.getItem("cart"));

                    if (products.id == product_id) {
                        if (cart.length == 0) {
                            cart.push(products)
                        } else {
                            let res = cart.find(element => element.id == product_id)

                            if (res === undefined) {
                                cart.push(products)
                            } else {
                                res.qty += product_qty
                            }
                        }
                    }

                    localStorage.setItem("cart", JSON.stringify(cart))
                    $('.progress-container').hide()
                    $('.' + product_id).hide()
                    $('.' + product_slug).show()
                    $('.alert-container-add').show()

                    setTimeout(function() {
                        $(".alert-container-add").fadeOut(1500)
                    }, 3000)

                    showCartForGuest()
                    totalCartItemsForGuest()
                },
                error: (error) => {
                    console.log(JSON.stringify(error))
                    $('.alert-container-error').show()
                },
                complete: function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 0, 'smooth')
                    $('#shoppingCartModal').modal('show')
                    $('#productsQuickView').modal('hide')
                }
            })
        })
    }

    function addToCartForGuestV2() {
        $(document).on("click", ".cart-btn-shop-v2", function(e) {
            e.preventDefault()
            let url = $(this).data('goto')
            let product_id = $(this).data('id')
            let product_image = $(this).data('image')
            let product_name = $(this).data('name')
            let product_slug = $(this).data('slug')
            let product_price = $(this).data('price')
            let quantityName = $('.quantity').attr('name')
            let csrfName = $('.csrfname').attr('name')
            let csrfHash = $('.csrfname').val()
            let product_qty = ''

            if (quantityName == 'quantity_modal') {
                product_qty = parseInt($("input[name='quantity_modal']").val())
            } else if (quantityName == 'quantity_page') {
                product_qty = parseInt($("input[name='quantity_page']").val())
            } else {
                product_qty = parseInt(1)
            }

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    product_id: product_id,
                    product_image: product_image,
                    product_name: product_name,
                    product_slug: product_slug,
                    product_price: product_price,
                    product_qty: product_qty,
                    [csrfName]: csrfHash
                },
                dataType: 'json',
                beforeSend: function() {
                    $('.cover-progress').show()
                    $('.' + product_slug).hide()
                    $('.' + product_id).show()
                },
                success: function(response) {
                    // update csrf hash
                    $('.csrfname').val(response.token)
                    $('input[name=quantity_modal').val(1)
                    $('input[name=quantity_page').val(1)

                    localStorage.setItem("products", JSON.stringify(response));
                    if (!localStorage.getItem("cart")) {
                        localStorage.setItem("cart", "[]");
                    }

                    products = JSON.parse(localStorage.getItem("products"));
                    cart = JSON.parse(localStorage.getItem("cart"));

                    if (products.id == product_id) {
                        if (cart.length == 0) {
                            cart.push(products)
                        } else {
                            let res = cart.find(element => element.id == product_id)

                            if (res === undefined) {
                                cart.push(products)
                            } else {
                                res.qty += product_qty
                            }
                        }
                    }

                    localStorage.setItem("cart", JSON.stringify(cart))
                    $('.cover-progress').hide()
                    $('.' + product_id).hide()
                    $('.' + product_slug).show()

                    window.location.href = window.location.origin + '/checkout'

                    showCartForGuest()
                    totalCartItemsForGuest()
                    checkoutForGuest()
                },
                error: (error) => {
                    $('.alert-container-error').show()
                },
                complete: function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 0, 'smooth')
                }
            })
        })
    }

    function showCartForGuest() {
        let cartView = ''
        let totalItems = 0
        let subTotal = 0
        cart = JSON.parse(localStorage.getItem("cart"))
        getUrl = JSON.parse(localStorage.getItem("url"))

        if (cart == null || cart.length < 1) {
            subTotalCartView = '<img src="' + window.location.origin + '/@static/img/cart.png" class="mt-5" alt="cart.png">' +
                '<div class="w-full text-center"><small><?= $language['title_cart_empty']; ?></div>'
            checkoutCartView = '<button type="button" class="default-btn" data-bs-dismiss="modal" aria-label="Close"><?= $language['title_shopping_now']; ?></button>'
        } else {
            $(cart).each(function(key, value) {
                totalItems = parseInt(value.qty) * parseInt(value.price)
                subTotal += totalItems

                cartView += '<div class="row products-cart align-items-center">' +
                    '<div class="col-2 col-lg-2 col-md-2 col-sm-2">' +
                    '<div class="products-image">' +
                    '<a href="' + window.location.origin + '/product/' + value.slug + '"><img src="' + window.location.origin + '/@static/img/products/' + value.image + '" alt="' + value.image + '"></a>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-10 col-lg-10 col-md-10 col-sm-10">' +
                    '<div class="products-content">' +
                    '<h3><a href="' + window.location.origin + '/product/' + value.slug + '">' + value.name + '</a></h3>' +
                    '<div class="products-price">' +
                    '<span>' + value.qty + ' x ' +
                    new Intl.NumberFormat("id-ID", {
                        currency: "IDR"
                    }).format(value.price) +
                    ' IDR</span>' +
                    '</div>' +
                    '</div>' +
                    '<a id="remove-cart-item" data-bs-toggle="modal" data-bs-target="#removeCart" data-id="' + value.id + '" data-name="' + value.name + '" class="remove-btn"><i class="bx bx-trash"></i></a>' +
                    '</div>' +
                    '</div>'
            })

            if (lang) {
                checkoutCartView = '<a href="' + window.location.origin + '/checkout?lang=' + lang + '" class="load-progress local checkout default-btn">Checkout</a>'
            } else {
                checkoutCartView = '<a href="' + window.location.origin + '/checkout" class="load-progress local checkout default-btn">Checkout</a>'
            }

            subTotalCartView = '<span>Subtotal</span>' +
                '<span class="subtotal">' +
                new Intl.NumberFormat("id-ID", {
                    currency: "IDR"
                }).format(subTotal) +
                ' IDR</span>'
        }
        $('#items-cart').html(cartView)
        $('#subtotal-cart').html(subTotalCartView)
        $('#checkout-cart').html(checkoutCartView)
    }

    function removeCartForGuest() {
        $(document).on("click", "#remove-cart-item", function() {
            let id = $(this).data('id')
            let name = $(this).data('name')

            $("[name='product-id']").val(id)
            $(".show-product-name").html(name)
            $('#shoppingCartModal').modal('hide')
        })

        $(document).on("click", "#btn-remove", function(e) {
            e.preventDefault();

            cart = JSON.parse(localStorage.getItem("cart"))
            let url = window.location.origin + "/frontend_controller/remove_cart"
            let product_id = $("[name='product-id']").val()
            let csrfName = $('.csrfname').attr('name')
            let csrfHash = $('.csrfname').val()

            $.ajax({
                url: url,
                method: "POST",
                data: {
                    product_id: product_id,
                    [csrfName]: csrfHash
                },
                dataType: "json",
                beforeSend: function() {
                    $('.cover-progress').show()
                },
                success: function(response) {
                    // update csrf hash
                    $('.csrfname').val(response.token)

                    let temp = Object.values(cart).filter(item => item.id != response.id)
                    localStorage.setItem("cart", JSON.stringify(temp))

                    $('#removeCart').modal('hide')
                    $('.cover-progress').hide()
                    $('.alert-container-remove').show()

                    setTimeout(function() {
                        $(".alert-container-remove").fadeOut(1500)
                    }, 3000)

                    showCartForGuest()
                    totalCartItemsForGuest()
                    checkoutForGuest()
                },
                error: (error) => {
                    $('.alert-container-error').show()
                },
                complete: function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 0, 'smooth')
                }
            })
        })
    }

    function totalCartItemsForGuest() {
        cart = JSON.parse(localStorage.getItem("cart"))

        if (cart == null || cart.length < 1) {
            totalItemsCartView = ''
            modalTotalItemsCartView = ''
        } else {
            let temp = cart.map(function(item) {
                return parseInt(item.qty)
            })

            sumItems = temp.reduce(function(prev, next) {
                return prev + next
            }, 0)

            totalItemsCartView = '<span>' + sumItems + '</span>'
            modalTotalItemsCartView = '(' + sumItems + ')'
        }
        $('#total-items-cart').html(totalItemsCartView)
        $('#modal-total-items-cart').html(modalTotalItemsCartView)
    }
    // End For Guest


    // Start for Users
    function addToCartAfterLogin() {
        let url = window.location.origin + '/users/add/cart-items'
        let csrfName = '<?php echo $this->security->get_csrf_token_name() ?>',
            csrfHash = '<?php echo $this->security->get_csrf_hash() ?>'
        cart = JSON.parse(localStorage.getItem('cart'))

        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'json',
            data: {
                "string": JSON.stringify(cart),
                [csrfName]: csrfHash
            },
            success: function(response) {
                localStorage.setItem("cart", "[]")
                location.reload(showCartForUsers())
                checklogin()
            }
        })
    }

    function addToCartForUsers() {
        $(document).on("click", ".cart-btn-shop-users", function() {
            let url = $(this).data('goto')
            let users_id = $(this).data('session')
            let product_id = $(this).data('id')
            let product_image = $(this).data('image')
            let product_slug = $(this).data('slug')
            let product_name = $(this).data('name')
            let product_price = $(this).data('price')
            let quantityName = $('.quantity').attr('name')
            let product_qty = ''
            let csrfName = $('.csrfname').attr('name')
            let csrfHash = $('.csrfname').val()

            if (quantityName == 'quantity_modal') {
                product_qty = $("input[name='quantity_modal']").val()
            } else if (quantityName == 'quantity_page') {
                product_qty = $("input[name='quantity_page']").val()
            } else {
                product_qty = 1
            }

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    users_id: users_id,
                    product_id: product_id,
                    product_image: product_image,
                    product_name: product_name,
                    product_price: product_price,
                    product_qty: product_qty,
                    [csrfName]: csrfHash
                },
                dataType: 'json',
                beforeSend: function() {
                    $('.progress-container').show()
                    $('.' + product_slug).hide()
                    $('.' + product_id).show()
                },
                success: function(data) {
                    // update csrf hash
                    $('.csrfname').val(data.token)
                    $('input[name=quantity_modal').val(1)
                    $('input[name=quantity_page').val(1)

                    $('.progress-container').hide()
                    $('.' + product_id).hide()
                    $('.' + product_slug).show()
                    $('.alert-container-add').show()

                    setTimeout(function() {
                        $(".alert-container-add").fadeOut(1500)
                    }, 3000)

                    showCartForUsers()
                    totalCartItemsForUsers()
                },
                error: (error) => {
                    $('.alert-container-error').show()
                },
                complete: function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 0, 'smooth')
                    $('#shoppingCartModal').modal('show')
                    $('#productsQuickView').modal('hide')
                }
            })
        })
    }

    function addToCartForUsersV2() {
        $(document).on("click", ".cart-btn-shop-users-v2", function() {
            let url = $(this).data('goto')
            let users_id = $(this).data('session')
            let product_id = $(this).data('id')
            let product_image = $(this).data('image')
            let product_slug = $(this).data('slug')
            let product_name = $(this).data('name')
            let product_price = $(this).data('price')
            let quantityName = $('.quantity').attr('name')
            let product_qty = ''
            let csrfName = $('.csrfname').attr('name')
            let csrfHash = $('.csrfname').val()

            if (quantityName == 'quantity_modal') {
                product_qty = $("input[name='quantity_modal']").val()
            } else if (quantityName == 'quantity_page') {
                product_qty = $("input[name='quantity_page']").val()
            } else {
                product_qty = 1
            }

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    users_id: users_id,
                    product_id: product_id,
                    product_image: product_image,
                    product_name: product_name,
                    product_price: product_price,
                    product_qty: product_qty,
                    [csrfName]: csrfHash
                },
                dataType: 'json',
                beforeSend: function() {
                    $('.cover-progress').show()
                    $('.' + product_slug).hide()
                    $('.' + product_id).show()
                },
                success: function(data) {
                    // update csrf hash
                    $('.csrfname').val(data.token)
                    $('input[name=quantity_modal').val(1)
                    $('input[name=quantity_page').val(1)

                    $('.cover-progress').hide()
                    $('.' + product_id).hide()
                    $('.' + product_slug).show()

                    window.location.href = window.location.origin + '/checkout'

                    showCartForUsers()
                    totalCartItemsForUsers()
                },
                error: (error) => {
                    $('.alert-container-error').show()
                },
                complete: function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 0, 'smooth')
                }
            })
        })
    }

    function showCartForUsers() {
        let cartView = ''
        let url = '<?= site_url('result/cart-items') ?>'

        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            async: true,
            success: function(response) {
                let totalItems = 0
                let subTotal = 0

                if (response.length < 1) {
                    subTotalCartView = '<img src="' + window.location.origin + '/@static/img/cart.png" class="mt-5" alt="cart.png">' +
                        '<div class="w-full text-center"><small><?= $language['title_cart_empty']; ?></small></div>'
                    checkoutCartView = '<button type="button" class="default-btn" data-bs-dismiss="modal" aria-label="Close"><?= $language['title_shopping_now']; ?></button>'
                } else {
                    $(response).each(function(key, value) {

                        totalItems = parseInt(value.ProductQty) * parseInt(value.ProductPrice)
                        subTotal += totalItems

                        if (value.ProductPic == null) {
                            imageProduct = '<a href="' + window.location.origin + '/product/' + value.ProductSlug.Slug + '"><img src="' + window.location.origin + '/@static/img/products/Default-Product-Pic.png" alt="Default-Product-Pic.png"></a>'
                        } else {
                            imageProduct = '<a href="' + window.location.origin + '/product/' + value.ProductSlug.Slug + '"><img src="' + window.location.origin + '/@static/img/products/' + value.ProductPic.PicName + '" alt="' + value.ProductPic.PicName + '"></a>'
                        }

                        cartView += '<div class="row products-cart align-items-center">' +
                            '<div class="col-2 col-lg-2 col-md-2 col-sm-2">' +
                            '<div class="products-image">' +
                            imageProduct +
                            '</div>' +
                            '</div>' +
                            '<div class="col-10 col-lg-10 col-md-10 col-sm-10">' +
                            '<div class="products-content">' +
                            '<h3><a href="' + window.location.origin + '/products/' + value.ProductSlug.Slug + '">' + value.ProductName + '</a></h3>' +
                            '<div class="products-price">' +
                            '<span>' + value.ProductQty + ' x ' +
                            new Intl.NumberFormat("id-ID", {
                                currency: "IDR"
                            }).format(value.ProductPrice) +
                            ' IDR</span>' +
                            '</div>' +
                            '</div>' +
                            '<a id="remove-cart-item" data-bs-toggle="modal" data-bs-target="#removeCart" data-id="' + value.ProductID + '" data-name="' + value.ProductName + '" data-goto="' + window.location.origin + '/remove/cart-items" class="remove-btn"><i class="bx bx-trash"></i></a>' +
                            '</div>' +
                            '</div>'
                    })

                    if (lang) {
                        checkoutCartView = '<a href="' + window.location.origin + '/checkout?lang=' + lang + '" class="default-btn">Checkout</a>'
                    } else {
                        checkoutCartView = '<a href="' + window.location.origin + '/checkout" class="default-btn">Checkout</a>'
                    }

                    subTotalCartView = '<span>Subtotal</span>' +
                        '<span class="subtotal">' +
                        new Intl.NumberFormat("id-ID", {
                            currency: "IDR"
                        }).format(subTotal) +
                        ' IDR</span>'
                }
                $('#items-cart').html(cartView)
                $('#subtotal-cart').html(subTotalCartView)
                $('#checkout-cart').html(checkoutCartView)
            }
        })
    }

    function removeCartForUsers() {
        $(document).on("click", "#remove-cart-item", function() {
            let id = $(this).data('id')
            let name = $(this).data('name')
            let url = $(this).data('goto')

            $("[name='product-id']").val(id)
            $("[name='url']").val(url)
            $(".show-product-name").html(name)
            $('#shoppingCartModal').modal('hide')
        })

        $(document).on("click", "#btn-remove", function(e) {
            e.preventDefault();

            let url = $("[name='url']").val()
            let product_id = $("[name='product-id']").val()
            let csrfName = $('.csrfname').attr('name')
            let csrfHash = $('.csrfname').val()

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    product_id: product_id,
                    [csrfName]: csrfHash
                },
                dataType: "json",
                beforeSend: function() {
                    $('.cover-progress').show()
                    $('#removeCart').modal('hide')
                },
                success: function(response) {
                    // update csrf hash
                    $('.csrfname').val(response.token)
                    $('.cover-progress').hide()
                    $('.alert-container-remove').show()

                    setTimeout(function() {
                        $(".alert-container-remove").fadeOut(1500)
                    }, 3000)

                    showCartForUsers()
                    totalCartItemsForUsers()
                },
                error: (error) => {
                    $('.alert-container-error').show()
                },
                complete: function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 0, 'smooth')
                }
            })
        })
    }

    function totalCartItemsForUsers() {
        let url = '<?= site_url('result/cart-items') ?>'

        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            async: true,
            success: function(response) {
                totalItemsCart = 0

                $(response).each(function(index, value) {
                    productQty = parseInt(value.ProductQty)
                    totalItemsCart += productQty
                })

                if (totalItemsCart < 1) {
                    totalItemsCartView = ''
                    modalTotalItemsCartView = ''
                } else {
                    totalItemsCartView = '<span>' + totalItemsCart + '</span>'
                    modalTotalItemsCartView = '(' + totalItemsCart + ')'
                }
                $('#total-items-cart').html(totalItemsCartView)
                $('#modal-total-items-cart').html(modalTotalItemsCartView)
            }
        })
    }
    // End For Users

    // load content quickview products
    function quickReview(response) {
        let productName = ''
        let productPrice = ''
        let info = ''
        let ket = ''
        let brand = ''
        let stock = ''
        let productImage = ''
        let btn = ''
        let image = ''

        // load content
        if (response.ProductStatus == 1) {
            stock = '<li><span>Ketersediaan: </span>Stok Habis</li>'
        } else {
            stock = '<li><span>Ketersediaan: </span>Stok Tersedia</li>'
        }

        if (response.ProductBrand == '' || response.ProductBrand == undefined) {
            brand = '<li><span>Brand: </span>Tidak ada brand</li>'
        } else {
            brand = '<li><span>Brand: </span><a href="' + response.ProductBrand.BrandUrl + '" target="_blank">' + response.ProductBrand.BrandName + '</a></li>'
        }

        productName = '<h3><a href="#">' + response.ProductName + '</a></h3>'
        productPrice = '<span class="new-price">' +
            new Intl.NumberFormat("id-ID", {
                currency: "IDR"
            }).format(response.ProductPrice) +
            ' IDR</span>'
        info = '<a href="' + window.location.origin + '/product/' + response.ProductSlug + '" class="view-full-info">atau lihat info lengkap</a>'
        ket = brand +
            stock +
            '<li><span>SKU: </span>' + response.ProductSKU + '</li>'

        if (response.ProductPic == null) {
            productImage = '<img src="' + window.location.origin + '/@static/img/products/Default-Product-Pic.png" alt="image">'
        } else {
            productImage = '<img src="' + window.location.origin + '/@static/img/products/' + response.ProductPic.PicName + '" alt="' + response.ProductPic.PicName + '">'
        }

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

        btnManipulate = '<div class="' + response.ProductID + '" style="display: none;">' +
            '<button type="button" class="default-btn" disabled><i class="flaticon-trolley"></i> Adding...</button>' +
            '</div>'

        $('#productname').html(productName)
        $('#productprice').html(productPrice)
        $('#info').html(info)
        $('#ket').html(ket)
        $('#productimage').html(productImage)
        $('#btn-cart-wishlist').html(btn)
        $('#btn-adding').html(btnManipulate)
    }

    // lazy load image
    window.addEventListener('DOMContentLoaded', (event) => {
        //get all images
        var lazyImages = [].slice.call(document.querySelectorAll("img.lazy-load"));
        let active = false;

        const lazyLoad = function() {
            if (active === false) {
                active = true;

                setTimeout(function() {
                    lazyImages.forEach(function(lazyImage) {
                        if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
                            lazyImage.src = lazyImage.dataset.src;

                            let skeleton = lazyImage.parentNode;
                            let cardImage = skeleton.parentNode;
                            let loading = cardImage.parentNode

                            loading.classList.remove("loading");

                            lazyImages = lazyImages.filter(function(image) {
                                return image !== lazyImage;
                            });

                            if (lazyImages.length === 0) {
                                document.removeEventListener("scroll", lazyLoad);
                                window.removeEventListener("resize", lazyLoad);
                                window.removeEventListener("orientationchange", lazyLoad);
                            }
                        }
                    });
                    active = false;
                }, 200);
            }
        };

        document.addEventListener("scroll", lazyLoad);
        window.addEventListener("resize", lazyLoad);
        window.addEventListener("orientationchange", lazyLoad);
    });

    window.addEventListener('DOMContentLoaded', (event) => {
        //get all images
        let lazyImagesBlog = [].slice.call(document.querySelectorAll("img.lazy-load-blog"));
        let active = false;

        const lazyLoadBlog = function() {
            if (active === false) {
                active = true;

                setTimeout(function() {
                    lazyImagesBlog.forEach(function(lazyImageBlog) {
                        if ((lazyImageBlog.getBoundingClientRect().top <= window.innerHeight && lazyImageBlog.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImageBlog).display !== "none") {
                            lazyImageBlog.src = lazyImageBlog.dataset.src;

                            let skeleton = lazyImageBlog.parentNode;
                            let cardImage = skeleton.parentNode;
                            let loading = cardImage.parentNode

                            loading.classList.remove("loading-blog");

                            lazyImagesBlog = lazyImagesBlog.filter(function(imageBlog) {
                                return imageBlog !== lazyImageBlog;
                            });

                            if (lazyImagesBlog.length === 0) {
                                document.removeEventListener("scroll", lazyLoadBlog);
                                window.removeEventListener("resize", lazyLoadBlog);
                                window.removeEventListener("orientationchange", lazyLoadBlog);
                            }
                        }
                    });
                    active = false;
                }, 200);
            }
        };

        document.addEventListener("scroll", lazyLoadBlog);
        window.addEventListener("resize", lazyLoadBlog);
        window.addEventListener("orientationchange", lazyLoadBlog);
    });

    $(function() {
        $("input[name='phone']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });

        $("input[name='postcode']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });

    $(document).ready(function() {
        // call back function
        checklogin()

        $('#example').DataTable({
            responsive: true,
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }]
        });

        $(document).on("click", ".btn-close", function() {
            $('.alert-container-remove').hide()
        })

        // check all cart
        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        // load content quickview products
        $(document).on("click", "#quickview", function() {
            let url = $(this).data('goto')
            let productid = $(this).data('id')
            let csrfName = $('.csrfname').attr('name')
            let csrfHash = $('.csrfname').val()

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    productid: productid,
                    [csrfName]: csrfHash
                },
                dataType: 'json',
                success: function(response) {
                    // update csrf hash
                    $('.csrfname').val(response.token)

                    quickReview(response)
                }
            })
        })

        // referer page to local storage
        $(document).on("click", ".local", function() {
            let href = [btoa(encodeURIComponent($(this).attr('href')))]

            $.each(href, function() {
                localStorage.setItem("url", JSON.stringify(href))
            });

            getUrl = JSON.parse(localStorage.getItem("url"))
        })

        // filter price
        $(document).on("change", "#sort_price", function() {
            let select = $("#sort_price option:selected").val()

            if (min_price && max_price && page && lang) {
                urls = window.location.origin + window.location.pathname + '?min-price=' + min_price + '&max-price=' + max_price + '&page=' + page + '&filter=' + select + '&&lang=' + lang
            } else if (!min_price && !max_price && !page && lang) {
                urls = window.location.origin + window.location.pathname + '?filter=' + select + '&&lang=' + lang
            } else if (min_price && max_price && !page && !lang) {
                urls = window.location.origin + window.location.pathname + '?min-price=' + min_price + '&max-price=' + max_price + '&filter=' + select
            } else if (!min_price && !max_price && page && !lang) {
                urls = window.location.origin + window.location.pathname + '?page=' + page + '&filter=' + select
            } else if (!min_price && !max_price && page && lang) {
                urls = window.location.origin + window.location.pathname + '?page=' + page + '&filter=' + select + '&&lang=' + lang
            } else {
                urls = window.location.origin + window.location.pathname + '?filter=' + select
            }

            location.href = urls
        })

        $(document).on("change", "#sort_price_search", function() {
            let select = $("#sort_price_search option:selected").val()

            if (result && min_price && max_price && lang) {
                location.href = window.location.origin + window.location.pathname + '?result=' + result + '&min-price=' + min_price + '&max-price=' + max_price + '&sort=' + select + '&&lang=' + lang
            } else if (result && min_price && max_price && !lang) {
                location.href = window.location.origin + window.location.pathname + '?result=' + result + '&min-price=' + min_price + '&max-price=' + max_price + '&sort=' + select
            } else if (result && !min_price && !max_price && lang) {
                location.href = window.location.origin + window.location.pathname + '?result=' + result + '&sort=' + select + '&&lang=' + lang
            } else if (result && !min_price && !max_price && !lang) {
                location.href = window.location.origin + window.location.pathname + '?result=' + result + '&sort=' + select
            }
        })

        // see password
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('.form-password').attr('type', 'text');
            } else {
                $('.form-password').attr('type', 'password');
            }
        })

        // modal remove address
        $(document).on("click", "#delete-address", function() {
            let addressId = $(this).data('id')
            let firstName = $(this).data('firstname')
            let lastName = $(this).data('lastname')
            let inputAddressId = $("#address_id").val(addressId)

            $("#show-name").html(firstName + '' + lastName);
        })

        $(document).on("click", "#delete-address-modal", function() {
            $('.cover-progress').show()
            $("#deleteAddress").modal("hide")
        })

        // remove cart
        $(document).on("click", "#delete-cart", function() {
            let cartId = $(this).data('id')
            let name = $(this).data('name')
            let inputCartId = $("#cart_id").val(cartId)

            $("#show-product-name").html(name)
        })

        // progress bar body
        $(document).on("click", ".load-progress", function() {
            $('.cover-progress').show()
        })

        $(document).on("click", "#btn-update-checkout", function() {
            $('.cover-progress').show()
            $('#btn-puc').show()
            $('#btn-update-checkout').hide()
        })

        $(document).on("click", "#btn-delete-checkout", function() {
            $('.cover-progress').show()
            $('#btn-pdc').show()
            $('#btn-delete-checkout').hide()
            $('#deleteCart').modal('hide')
        })

        $(document).on("click", "#btn-checkout", function() {
            $('.cover-progress').show()
            $('#btn-pc').show()
            $('#btn-checkout').hide()
        })

        $("#quotitation").on("submit", function(e) {
            e.preventDefault()

            cart = JSON.parse(localStorage.getItem('cart'))
            let url = window.location.origin + '/frontend_controller/send_offer_for_guest'
            let country = $('[name="country"]').val()
            let first_name = $('[name="first_name"]').val()
            let last_name = $('[name="last_name"]').val()
            let company = $('[name="company"]').val()
            let address = $('[name="address"').val()
            let city = $('[name="city"]').val()
            let state = $('[name="state"]').val()
            let postcode = $('[name="postcode"]').val()
            let email = $('[name="email"]').val()
            let phone = $('[name="phone"]').val()
            let notes = $('[name="notes"]').val()
            let csrfName = $('.csrfname').attr('name')
            let csrfHash = $('.csrfname').val()

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: {
                    country: country,
                    first_name: first_name,
                    last_name: last_name,
                    company: company,
                    address: address,
                    city: city,
                    state: state,
                    postcode: postcode,
                    email: email,
                    phone: phone,
                    notes: notes,
                    [csrfName]: csrfHash,
                    string: JSON.stringify(cart)
                },
                beforeSend: function() {
                    $('.cover-progress').show()
                },
                success: function(response) {
                    console.log(response)
                    // update csrf hash
                    $('.csrfname').val(response.token)

                    $('[name="country"]').val('')
                    $('[name="first_name"]').val('')
                    $('[name="last_name"]').val('')
                    $('[name="company"]').val('')
                    $('[name="address"').val('')
                    $('[name="city"]').val('')
                    $('[name="state"]').val('')
                    $('[name="postcode"]').val('')
                    $('[name="email"]').val('')
                    $('[name="phone"]').val('')
                    $('[name="notes"]').val('')

                    $('.cover-progress').hide()
                    $('.alert-container-quotation').show()

                    localStorage.setItem("cart", "[]")

                    showCartForGuest()
                    totalCartItemsForGuest()
                    checkoutForGuest()
                },
                error: (error) => {
                    console.log(JSON.stringify(error))
                    $('.alert-container-sending-error').show()
                    $('.cover-progress').hide()
                },
                complete: function() {


                    $('html, body').animate({
                        scrollTop: 0
                    }, 0, 'smooth')
                }
            })
        })
    })
</script>

</body>

</html>