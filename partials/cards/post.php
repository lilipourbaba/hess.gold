<?php get_template_part('assets/icons/hotdesk') ?>

<div class="col-span-6 col-span-md-12 p-8">
    <a href="<?= the_permalink() ?>">
        <div class="box-col-12">
            <div class="col-span-4 text-left | art_thumbnail">
                <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full'); ?>

            </div>
            <div class="col-span-8 article_content">
                <div class="article_item">
                    <div>
                        <span class="m-ie-16">
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
                    <h2 class="title_limit text-primary post_title">
                        <?php echo the_title(); ?>
                    </h2>
                    <div class="fs-body-sm paragraph text-natural">
                        <?php echo get_the_content() ?>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>