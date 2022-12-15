<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="drodo-responsive-nav">
        <div class="container">
            <div class="drodo-responsive-menu">
                <div class="logo">
                    <?php if ($getLang) : ?>
                        <a href="<?= base_url() . '?lang=' . $getLang; ?>" class="load-progress">
                            <img src="<?= base_url('@static/img/' . $getBasicConfiguration['ConfigLogo']); ?>" alt="logo">
                        </a>
                    <?php else : ?>
                        <a href="<?= base_url(); ?>" class="load-progress">
                            <img src="<?= base_url('@static/img/' . $getBasicConfiguration['ConfigLogo']); ?>" alt="logo">
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="drodo-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <?php if ($getLang) : ?>
                    <a class="load-progress local navbar-brand" href="<?= base_url('?lang=' . $getLang); ?>">
                        <img src="<?= base_url('@static/img/logo.png'); ?>" alt="logo">
                    </a>
                <?php else : ?>
                    <a class="load-progress local navbar-brand" href="<?= base_url(); ?>">
                        <img src="<?= base_url('@static/img/logo.png'); ?>" alt="logo">
                    </a>
                <?php endif; ?>

                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                        <?php foreach ($getallcategory as $cat) : ?>
                            <?php if ($cat['SubCategory']) : ?>
                                <?php if ($getLang) : ?>
                                    <li class="nav-item <?= (($this->uri->segment(1) == '' && $cat['CategoryName'] == 'AED') || $this->uri->segment(2) == $cat['CategoryUrl'] ? 'active' : ''); ?>"><a href="<?= base_url('product-category/' . $cat['SubCategory'][0]['SubUrl'] . '?lang=' . $getLang); ?>" class="load-progress local nav-link"><small><?= $cat['CategoryName'] . " "; ?></small><i class='bx bx-chevron-down'></i></a>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($cat['SubCategory'] as $subcat) : ?>
                                                <li class="nav-item <?= (($this->uri->segment(1) == '' && $subcat['SubUrl'] == 'zoll-aeds') || $this->uri->segment(3) == $subcat['SubUrl'] ? 'active' : ''); ?>"><a href="<?= base_url('product-category/' . $subcat['SubUrl'] . '?lang=' . $getLang); ?>" class="load-progress local nav-link"><small><?= $subcat['SubCategoryName']; ?></small></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php else : ?>
                                    <li class="nav-item <?= (($this->uri->segment(1) == '' && $cat['CategoryName'] == 'AED') || $this->uri->segment(2) == $cat['CategoryUrl'] ? 'active' : ''); ?>"><a href="<?= base_url('product-category/' . $cat['SubCategory'][0]['SubUrl']); ?>" class="load-progress local nav-link"><small><?= $cat['CategoryName'] . " "; ?></small><i class='bx bx-chevron-down'></i></a>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($cat['SubCategory'] as $subcat) : ?>
                                                <li class="nav-item <?= (($this->uri->segment(1) == '' && $subcat['SubUrl'] == 'zoll-aeds') || $this->uri->segment(3) == $subcat['SubUrl'] ? 'active' : ''); ?>"><a href="<?= base_url('product-category/' . $subcat['SubUrl']); ?>" class="load-progress local nav-link"><small><?= $subcat['SubCategoryName']; ?></small></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php if ($getLang) : ?>
                            <li class="nav-item <?= ($this->uri->segment(1) == 'blog' ? 'active' : ''); ?>"><a href="<?= base_url('aed-manual-dan-brochures?lang=' . $getLang); ?>" class="load-progress local nav-link"><small>Resources</small><i class='bx bx-chevron-down'></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= base_url('aed-manual-dan-brochures?lang=' . $getLang); ?>" class="local nav-link"><small>AED Manual & Brochures</small></a></li>
                                    <li class="nav-item"><a href="<?= base_url('helpful-video?lang=' . $getLang); ?>" class="local nav-link"><small>Helpful Video</small></a></li>
                                    <li class="nav-item"><a href="<?= base_url('faq?lang=' . $getLang); ?>" class="local nav-link"><small>FAQ</small></a></li>
                                    <li class="nav-item"><a href="<?= base_url('aed-legislation?lang=' . $getLang); ?>" class="local nav-link"><small>AED Legislation</small></a></li>
                                    <li class="nav-item <?= ($this->uri->segment(1) == 'blog' ? 'active' : ''); ?>"><a href="<?= base_url('blog?lang=' . $getLang); ?>" class="local nav-link <?= ($this->uri->segment(1) == 'blog' ? 'active' : ''); ?>"><small>Blog</small></a></li>
                                </ul>
                            </li>
                        <?php else : ?>
                            <li class="nav-item <?= ($this->uri->segment(1) == 'blog' ? 'active' : ''); ?>"><a href="<?= base_url('aed-manual-dan-brochures'); ?>" class="load-progress local nav-link"><small>Resources</small><i class='bx bx-chevron-down'></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= base_url('aed-manual-dan-brochures'); ?>" class="load-progress local nav-link"><small>AED Manual & Brochures</small></a></li>
                                    <li class="nav-item"><a href="<?= base_url('helpful-video'); ?>" class="load-progressv local nav-link"><small>Helpful Video</small></a></li>
                                    <li class="nav-item"><a href="<?= base_url('faq'); ?>" class="load-progress local nav-link"><small>FAQ</small></a></li>
                                    <li class="nav-item"><a href="<?= base_url('aed-legislation'); ?>" class="load-progress local nav-link"><small>AED Legislation</small></a></li>
                                    <li class="nav-item <?= ($this->uri->segment(1) == 'blog' ? 'active' : ''); ?>"><a href="<?= base_url('blog'); ?>" class="load-progress local nav-link <?= ($this->uri->segment(1) == 'blog' ? 'active' : ''); ?>"><small>Blog</small></a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <div class="others-option">
                        <div class="option-item">
                            <div class="cart-btn">
                                <a href="#" class="mybtn" data-bs-toggle="modal" data-bs-target="#shoppingCartModal">
                                    <i class="bx bx-shopping-bag"></i>
                                    <div id="total-items-cart">

                                    </div>
                                </a>
                                <div class="progress-container mt-2">
                                    <div class="progress">
                                        <div class="progress-bar">
                                            <div class="progress-shadow"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="option-item">
                            <div class="search-btn-box">
                                <i class="search-btn bx bx-search-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->

<!-- Start Search Overlay -->
<div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>

            <div class="search-overlay-close">
                <span class="search-overlay-close-line"></span>
                <span class="search-overlay-close-line"></span>
            </div>

            <div class="search-overlay-form">
                <?php
                if ($getLang) {
                    $urls = 'frontend_controller/search_products?lang=' . $getLang;
                } else {
                    $urls = 'frontend_controller/search_products';
                }
                ?>

                <?= form_open($urls); ?>
                <input type="text" name="search" class="input-search" placeholder="<?= $language['title_search_for_product']; ?>...">
                <button type="submit" class="load-progress"><i class='bx bx-search-alt'></i></button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- End Search Overlay -->