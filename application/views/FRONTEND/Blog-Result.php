<style>
    .page-numbers a:hover {
        color: #fff;
    }

    .my-image {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .spinner-center {
        align-items: center;
        justify-content: center;
        display: flex;
    }
</style>
<div class="col-lg-8 col-md-12">
    <div class="row">
        <?php if ($countResult < 1) : ?>
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
            <?php foreach ($getAllBlog as $blog) : ?>
                <?php
                if ($getLang) {
                    $urls = $blog['Slug'] . '?lang=' . $getLang;
                } else {
                    $urls = $blog['Slug'];
                }
                ?>
                <div class="col-lg-6 col-md-6">
                    <div class="single-blog-post">
                        <div class="post-image">
                            <div class="card loading-blog">
                                <figure class="card-image-blog spinner-center">
                                    <a href="<?= base_url($urls); ?>" class="d-block">
                                        <img src="<?= base_url('@static/img/spinner.gif'); ?>" data-src="<?= base_url('@static/img/blog/' . $blog['BlogImage']); ?>" alt="<?= $blog['BlogImage']; ?>" class="lazy-load-blog">
                                    </a>
                                </figure>
                            </div>
                        </div>

                        <div class="post-content">
                            <h3><a href="<?= base_url($urls); ?>"><small><?= $blog['BlogTitle']; ?></small></a></h3>
                            <ul class="post-meta align-items-center d-flex">
                                <li>
                                    <div class="flex align-items-center">
                                        <img src="<?= base_url('@static/img/user1.png'); ?>" alt="image">
                                        <a href="#"><?= $blog['BlogAuthor']; ?></a>
                                    </div>
                                </li>
                                <li><?= format_indo($blog['BlogPublish']); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- pagination -->
        <div class="col-lg-12 col-md-12">
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>