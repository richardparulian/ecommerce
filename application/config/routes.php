<?php
defined('BASEPATH') or exit('No direct script access allowed');
//get route
function getr($key, $rts)
{
    if (!empty($rts)) {
        if (!empty($rts->$key)) {
            return $rts->$key;
        }
    }
    return $key;
}

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$rts = $this->config->item('routes');

$route['default_controller'] = 'frontend_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$general_settings = $this->config->item('general_settings');
$languages = $this->config->item('languages');

foreach ($languages as $language) {
    if ($language->status == 1) {
        $key = "";
        if ($general_settings->site_lang != $language->id) {
            $key = $language->short_form . '/';
            $route[$language->short_form] = 'frontend_controller/index';
        }

        //your custom route

    }
}

/*
 *
 * BACKEND / ADMIN ROUTES
 *
 */
$route[getr('admin', $rts)] = 'backend_controller/index';
//login
$route[getr('r', $rts) . '/authentication'] = 'auth_controller/admin_login';
//logout
$route[getr('logout', $rts)] = 'auth_controller/logout';

$route[getr('category', $rts)] = 'category_controller';
$route[getr('category/(:any)/(:any)', $rts)] = 'category_controller/$1/$2';
$route[getr('blog-admin', $rts)] = 'blog_controller';
$route[getr('blog-admin/(:any)/(:any)', $rts)] = 'blog_controller/$1/$2';
$route[getr('blog-category', $rts)] = 'blogcategory_controller';
$route[getr('blog-category/(:any)/(:any)', $rts)] = 'blogcategory_controller/$1/$2';
$route[getr('sub-category', $rts)] = 'SubCategory_controller';
$route[getr('sub-category/(:any)/(:any)', $rts)] = 'SubCategory_controller/$1/$2';
$route[getr('tags', $rts)] = 'TagsController';
$route[getr('tags/(:any)/(:any)', $rts)] = 'TagsController/$1/$2';
$route[getr('brand-admin', $rts)] = 'Brand_controller';
$route[getr('brand-admin/(:any)/(:any)', $rts)] = 'Brand_controller/$1/$2';

$route[getr('info-aed', $rts)] = 'Info_controller';
$route[getr('info-aed/(:any)/(:any)', $rts)] = 'Info_controller/$1/$2';

$route[getr('faq-aed', $rts)] = 'Faq_controller';
$route[getr('faq-aed/(:any)/(:any)', $rts)] = 'Faq_controller/$1/$2';

$route[getr('feedback', $rts)] = 'Feedback_controller';
$route[getr('invoice-list', $rts)] = 'Invoice_controller';
//product
$route[getr('product-admin', $rts)] = 'product_controller';
$route[getr('product-admin/add_product', $rts)] = 'product_controller/add_page';
$route[getr('product-admin/(:any)/(:any)', $rts)] = 'product_controller/$1/$2';

/*
 *
 * FRONTEND ROUTES
 *
 */

$route[getr('contact-us', $rts)]                                    = 'frontend_controller/contact';
$route[getr('about-us', $rts)]                                      = 'frontend_controller/about_us';
$route[getr('faq', $rts)]                                           = 'frontend_controller/faqs';
$route[getr('privacy-policy', $rts)]                                = 'frontend_controller/privacy_policy';
$route[getr('terms-conditions', $rts)]                              = 'frontend_controller/terms_of_service';
$route[getr('shipping-returns', $rts)]                              = 'frontend_controller/shipping_returns';
$route[getr('aed-manual-dan-brochures', $rts)]                      = 'frontend_controller/manual_brochures';
$route[getr('helpful-video', $rts)]                                 = 'frontend_controller/helpful_video';

$route[getr('product-category/(:any)', $rts)]                       = 'frontend_controller/product_category/$1';
$route[getr('product/(:any)', $rts)]                                = 'frontend_controller/product/$1';
$route[getr('products', $rts)]                                      = 'frontend_controller/products';
$route[getr('shop', $rts)]                                          = 'frontend_controller/result_products';

$route[getr('result/cart-items', $rts)]                             = 'frontend_controller/get_cart_from_db';
$route[getr('users/add/cart-items', $rts)]                          = 'frontend_controller/insert_cart_after_login';
$route[getr('add/cart-items', $rts)]                                = 'frontend_controller/add_cart_for_users';
$route[getr('remove/cart-items', $rts)]                             = 'frontend_controller/remove_cart_from_db';
$route[getr('checkout', $rts)]                                      = 'frontend_controller/checkout_cart';

$route[getr('customer/account/login/referer/(:any)', $rts)]         = 'frontend_controller/authentication';
$route[getr('customer/account/login', $rts)]                        = 'frontend_controller/authentication';
$route[getr('customer/account/forgot-password', $rts)]              = 'frontend_controller/forgotten_password';
$route[getr('customer/account/reset-password', $rts)]               = 'frontend_controller/reset_password';
$route[getr('customer/account', $rts)]                              = 'frontend_controller/my_account';
$route[getr('customer/account/information', $rts)]                  = 'frontend_controller/edit_account_information';
$route[getr('customer/account/change-password', $rts)]              = 'frontend_controller/change_password';
$route[getr('customer/account/change-email', $rts)]                 = 'frontend_controller/change_email';
$route[getr('customer/account/address', $rts)]                      = 'frontend_controller/my_address';
$route[getr('customer/account/new-address', $rts)]                  = 'frontend_controller/add_account_address';
$route[getr('customer/account/edit-address/(:any)', $rts)]          = 'frontend_controller/edit_account_address/$1';

$route[getr('blog', $rts)]                                          = 'frontend_controller/blog';
$route[getr('blog/q', $rts)]                                        = 'frontend_controller/result_filter';
$route[getr('blog-tags/(:any)', $rts)]                              = 'frontend_controller/blog_tags/$1';
$route[getr('blog-category/(:any)', $rts)]                          = 'frontend_controller/blog_category/$1';
$route[getr('(:any)', $rts)]                                        = 'frontend_controller/blog_detail/$1';

$route[getr('static-page/(:any)', $rts)]                            = 'frontend_controller/static_page/$1';
