<a href="<?= the_permalink() ?>" class="d-flex p-8 blogs-cart">


    <div class=" text-left | art_thumbnail">
        <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full'); ?>

    </div>

    <div class="d-flex f-column gap-8 article_content">
        <div class="article_item">
            <div class="text-natural fs-caption pb-12 pb-md-4">
                <span class="m-ie-8">
                    <svg class="icon">
                        <use href="#icon-Calendar,Schedule-3" />
                    </svg>
                    <?php echo get_the_date() ?>
                </span>
                <svg class="icon">
                    <use href="#icon-pen-edit-create-3" />
                </svg>
                <?php echo get_the_author_meta('display_name', get_post_field('post_author', get_the_ID())) ?>

            </div>
            <h2 class="title_limit text-primary post_title p-be-4">
                <?php echo the_title(); ?>
            </h2>
            <div class="paragraph text-natural">
                <?= the_excerpt(); ?>
            </div>
        </div>
    </div>
</a>