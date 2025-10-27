<div class="section">

    <div class="container">

        <div class="row">
            <?php foreach ($features as $row): ?>
                <div class="col-md-6">
                    <div class="post post-thumb">
                        <a class="post-img" href="<?= site_url('post-detail/' . $row->slug) ?>"><img
                                src="<?= site_url('public/assets/img/posts/' . $row->postImage) ?>"
                                alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-<?= $row->category_color ?>"
                                    href="<?= site_url('posts-by-category/' . $row->category_slug) ?>"><?= $row->name ?></a>
                                <span class="post-date"><?= date('M d, Y', strtotime($row->created_at)) ?></span>
                            </div>
                            <h3 class="post-title"><a
                                    href="<?= site_url('post-detail/' . $row->slug) ?>"><?= $row->title ?></a>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Nouvelles actualités</h2>
                </div>
            </div>
            <?php foreach ($recent as $row): ?>
                <div class="col-md-4">
                    <div class="post">
                        <a class="post-img" href="<?= site_url('post-detail/' . $row->slug) ?>"><img
                                src="<?= site_url() ?>public/assets/img/posts/<?= $row->postImage ?>"
                                alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-<?= $row->category_color ?>"
                                    href="<?= site_url('posts-by-category/' . $row->category_slug) ?>"><?= $row->name ?></a>
                                <span class="post-date"><?= date('M d, Y', strtotime($row->created_at)) ?></span>
                            </div>
                            <h3 class="post-title"><a
                                    href="<?= site_url('post-detail/' . $row->slug) ?>"><?= $row->title ?></a>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="clearfix visible-md visible-lg"></div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <?php if (isset($most_format)): ?>
                        <div class="col-md-12">
                            <div class="post post-thumb">
                                <a class="post-img" href="<?= site_url('post-detail/' . $most_format->slug) ?>"><img
                                        src="<?= site_url() ?>public/assets/img/posts/<?= $most_format->postImage ?>"
                                        alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-3"
                                            href="<?= site_url('posts-by-category/' . $most_format->category_slug) ?>"><?= $most_format->name ?></a>
                                        <span class="post-date"><?= date('M d, Y', strtotime($most_format->created_at)) ?></span>
                                    </div>
                                    <h3 class="post-title"><a
                                            href="<?= site_url('post-detail/' . $most_format->slug) ?>"><?= $most_format->title ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php foreach ($one_post_by_category as $item): ?>
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="<?= site_url('post-detail/' . $item->slug) ?>"><img
                                        src="<?= site_url() ?>public/assets/imsg/posts/<?= $item->postImage ?>"
                                        alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-<?= $item->category_color ?>"
                                            href="<?= site_url('posts-by-category/' . $item->category_slug) ?>"><?= $item->name ?></a>
                                        <span class="post-date"><?= date('M d, Y', strtotime($item->created_at)) ?></span>
                                    </div>
                                    <h3 class="post-title"><a
                                            href="<?= site_url('post-detail/' . $item->slug) ?>"><?= $item->title ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-4">

                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Les plus lues</h2>
                    </div>
                    <?php foreach ($most_reads as $item): ?>
                        <div class="post post-widget">
                            <a class="post-img" href="<?= site_url('post-detail/' . $item->slug) ?>"><img
                                    src="<?= site_url() ?>public/assets/img/posts/<?= $item->postImage ?>"
                                    alt=""></a>
                            <div class="post-body">
                                <h3 class="post-title"><a
                                        href="<?= site_url('post-detail/' . $item->slug) ?>"><?= $item->title ?></a>
                                </h3>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="<?= site_url() ?>public/assets/img/ad-1.jpg" alt="">
                    </a>
                </div>

            </div>
        </div>

    </div>

</div>

<div class="section section-grey">

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Autres actualités</h2>
                </div>
            </div>
            <?php foreach ($most_reads as $item): ?>
                <div class="col-md-4">
                    <div class="post">
                        <a class="post-img" href="<?= site_url('post-detail/' . $item->slug) ?>"><img
                                src="<?= site_url() ?>public/assets/img/posts/<?= $item->postImage ?>"
                                alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-<?= $item->category_color ?>"
                                    href="<?= site_url('posts-by-category/' . $item->category_slug) ?>"><?= $item->name ?></a>
                                <span class="post-date"><?= date('M d, Y', strtotime($item->created_at)) ?></span>
                            </div>
                            <h3 class="post-title"><a href="<?= site_url('post-detail/' . $item->slug) ?>">Chrome
                                    <?= $item->title ?></a></h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>

</div>


<div class="section">

    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Toutes les actualités</h2>
                        </div>
                    </div>
                    <?php foreach ($posts as $item): ?>
                        <div class="col-md-12">
                            <div class="post post-row">
                                <a class="post-img" href="<?= site_url('post-detail/' . $item->slug) ?>"><img
                                        src="<?= site_url() ?>public/assets/img/posts/<?= $item->postImage ?>"
                                        alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-<?= $item->category_color ?>"
                                            href="<?= site_url('posts-by-category/' . $item->category_slug) ?>"><?= $item->name ?></a>
                                        <span class="post-date"><?= date('M d, Y', strtotime($item->created_at)) ?></span>
                                    </div>
                                    <h3 class="post-title"><a href="<?= site_url('post-detail/' . $item->slug) ?>">
                                            <?= $item->title ?></a></h3>
                                    <p> <?= character_limiter($item->description, 100) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                    <div class="col-md-12">
                        <div class="section-row">
                            <button class="primary-button center-block">Plus
                                d'actualités
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="<?= site_url() ?>public/assets/img/ad-1.jpg" alt="">
                    </a>
                </div>


                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Catégories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            <?php foreach ($categories as $category): ?>
                                <li><a href="<?= site_url('posts-by-category/' . $category->category_slug) ?>"
                                        class="cat-<?= $category->category_color ?>"><?= $category->name ?>
                                        <span><?= $category->nb_categories ?></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>