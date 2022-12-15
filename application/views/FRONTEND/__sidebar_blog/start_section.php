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

<!-- Start Blog Area -->
<section class="blog-area">
    <div class="container">
        <div class="user-actions page-title-content mb-1">
            <ul style="margin-top: unset;">
                <li><a href="<?= base_url(); ?>"><small>Home</small></a></li>
                <?php if ($this->uri->segment(1) == 'blog-category') : ?>
                    <li><small>Blog Category: <?= $this->uri->segment(2); ?></small></li>
                <?php elseif ($this->uri->segment(1) == 'blog-tags') : ?>
                    <li><small>Blog Tags: <?= $this->uri->segment(2); ?></small></li>
                <?php elseif ($this->uri->segment(2) == 'q') : ?>
                    <li><small>Result: <?= $search; ?></small></li>
                <?php else : ?>
                    <li><small>Blog</small></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <aside class="widget-area widget-left-sidebar">
                    <!-- Search Blog -->
                    <section class="widget widget_search">
                        <h3 class="widget-title"><?= $language['title_search']; ?></h3>
                        <?php
                        if ($getLang) {
                            $urlBlogSearch = 'frontend_controller/filter_blog?lang=' . $getLang;
                        } else {
                            $urlBlogSearch = 'frontend_controller/filter_blog';
                        }
                        ?>
                        <?php echo form_open($urlBlogSearch); ?>
                        <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="search" name="search_blog" class="search-field" placeholder="<?= $language['title_search_for_blog']; ?>...">
                        </label>
                        <button type="submit"><i class="bx bx-search-alt"></i></button>
                        <?php echo form_close(); ?>
                    </section>
                    <!-- End Search Blog -->

                    <!-- Category -->
                    <section class="widget widget_categories">
                        <h3 class="widget-title"><?= $language['title_category']; ?></h3>
                        <?php
                        if ($getLang) {
                            $urlBlog            = 'blog?lang=' . $getLang;
                        } else {
                            $urlBlog = 'blog';
                        }
                        ?>
                        <ul>
                            <li><a href="<?= base_url($urlBlog); ?>">All Category</a></li>
                            <?php foreach ($getAllBlogCategory as $cat) : ?>
                                <?php
                                if ($getLang) {
                                    $urlBlogCategory = 'blog-category/' . $cat['Slug'] . '?lang=' . $getLang;
                                } else {
                                    $urlBlogCategory = 'blog-category/' . $cat['Slug'];
                                }
                                ?>
                                <li><a href="<?= base_url($urlBlogCategory); ?>"><?= $cat['BlogCategoryName']; ?> <span class="post-count">(<?= $cat['TotalCategory']; ?>)</span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </section>
                    <!-- End Category -->

                    <!-- Tags -->
                    <section class="widget widget_tag_cloud">
                        <h3 class="widget-title"><?= $language['title_tags']; ?></h3>
                        <div class="tagcloud">
                            <?php foreach ($getAllTags as $tags) : ?>
                                <?php
                                if ($getLang) {
                                    $urlBlogTags = 'blog-tags/' . $tags['Slug'] . '?lang=' . $getLang;
                                } else {
                                    $urlBlogTags = 'blog-tags/' . $tags['Slug'];
                                }
                                ?>
                                <a href="<?= base_url($urlBlogTags); ?>"><?= $tags['BlogTagsName']; ?> <span class="tag-link-count"> (<?= $tags['TotalTags']; ?>)</span></a>
                            <?php endforeach; ?>
                        </div>
                    </section>
                    <!-- End Tags -->
                </aside>
            </div>