<style>
    .tags {
        display: inline-block;
        background: #fff;
        padding: 7px 15px;
        border: none;
        border-radius: 3px;
        font-weight: 600;
        font-size: 14px !important;
        margin-top: 8px;
        margin-right: 4px
    }
</style>
<!-- Start Blog Details Area -->
<div class="col-lg-8 col-md-12">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="blog-details-desc">
                <div class="article-image">
                    <img src="<?= base_url('@static/img/blog/' . $getBlog['BlogImage']); ?>" alt="<?= $getBlog['BlogImage']; ?>">
                </div>

                <div class="article-content">
                    <div class="entry-meta">
                        <ul>
                            <li>
                                <i class='bx bx-folder-open'></i>
                                <span><?= $language['title_category']; ?></span>
                                <a href="#"><?= $getBlogCategory['BlogCategoryName']; ?></a>
                            </li>
                            <li>
                                <i class='bx bx-user'></i>
                                <span><?= $language['title_author']; ?></span>
                                <?= $getBlog['BlogAuthor']; ?>
                            </li>
                            <li>
                                <i class='bx bx-calendar'></i>
                                <span><?= $language['title_last_update']; ?></span>
                                <?= format_indo($getBlog['updated_at']); ?>
                            </li>
                        </ul>
                    </div>

                    <h3><?= $getBlog['BlogTitle']; ?></h3>

                    <p><?= $getBlog['BlogDesc']; ?></p>

                </div>

                <div class="article-footer">
                    <div class="article-tags">

                        <?php if ($getBlog["BlogTags"] != "") : ?>
                            <span><i class='bx bx-purchase-tag'></i></span>
                            <?php $tags = explode(',', $getBlog["BlogTags"], 10); ?>
                            <?php foreach ($tags as $tg) : ?>
                                <span class="tags" style="top: 0"><?= $tg; ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <!-- <?php $num = 0; ?>
                        <?php foreach ($getAllBlogTags as $tags) : ?>
                            <?php $num++; ?>
                            <a href="#"><?= $tags['BlogTagsName']; ?>
                                <?= ($num < $count ? ',' : ''); ?>
                            </a>
                        <?php endforeach; ?> -->
                    </div>

                    <div class="article-share">
                        <ul class="social">
                            <li><span><?= $language['title_share']; ?>:</span></li>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" class="facebook" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                            <li><a href="https://twitter.com/share?url=<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>&text=<?= $getBlog['BlogTitle']; ?>" class="twitter" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                            <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=https://demo.aed.co.id/blog/detail/<?= $getBlog['Slug']; ?>" class="linkedin" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?text=<?= $getBlog['BlogTitle'] . " - " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" class="whatsapp" target="_blank"><i class='bx bxl-whatsapp'></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="drodo-post-navigation" style="border-bottom: unset;">
                    <div class="prev-link-wrapper">
                        <?php
                        if ($getLang) {
                            $urlsPrev = isset($getBlogPrev['Slug']) ? $getBlogPrev['Slug'] . '?lang=' . $getLang : '';
                        } else {
                            $urlsPrev = isset($getBlogPrev['Slug']) ? $getBlogPrev['Slug'] : '';
                        }
                        ?>
                        <div class="info-prev-link-wrapper">
                            <a href="<?= isset($urlsPrev) ?  base_url($urlsPrev) : ''; ?>">
                                <span class="image-prev">
                                    <img src="<?= isset($getBlogPrev['BlogImage']) ? base_url('@static/img/blog/' . $getBlogPrev['BlogImage']) : ''; ?>" alt="<?= isset($getBlogPrev['BlogImage']) ? $getBlogPrev['BlogImage'] : ''; ?>">
                                    <span class="post-nav-title">Prev</span>
                                </span>
                                <span class="prev-link-info-wrapper">
                                    <span class="prev-title"><small><?= isset($getBlogPrev['BlogTitle']) ? $this->M_Blog->cut_words($getBlogPrev['BlogTitle'], 6) : ''; ?></small></span>
                                    <span class="meta-wrapper">
                                        <span class="date-post"><?= isset($getBlogPrev['BlogPublish']) ?  format_indo($getBlogPrev['BlogPublish']) : ''; ?></span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="next-link-wrapper">
                        <div class="info-next-link-wrapper">
                            <?php
                            if ($getLang) {
                                $urlsNext = isset($getBlogNext['Slug']) ? $getBlogNext['Slug'] . '?lang=' . $getLang : '';
                            } else {
                                $urlsNext = isset($getBlogNext['Slug']) ? $getBlogNext['Slug'] : '';
                            }
                            ?>
                            <a href="<?= isset($urlsNext) ? base_url($urlsNext) : ''; ?>">
                                <span class="next-link-info-wrapper">
                                    <span class="next-title"><small><?= isset($getBlogNext['BlogTitle']) ? $this->M_Blog->cut_words($getBlogNext['BlogTitle'], 6) : ''; ?></small></span>
                                    <span class="meta-wrapper">
                                        <span class="date-post"><?= isset($getBlogNext['BlogPublish']) ? format_indo($getBlogNext['BlogPublish']) : ''; ?></span>
                                    </span>
                                </span>

                                <span class="image-next">
                                    <img src="<?= isset($getBlogNext['BlogImage']) ? base_url('@static/img/blog/' . $getBlogNext['BlogImage']) : ''; ?>" alt="<?= isset($getBlogNext['BlogImage']) ? $getBlogNext['BlogImage'] : null; ?>">
                                    <span class="post-nav-title">Next</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Details Area -->