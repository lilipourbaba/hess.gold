<?php defined('ABSPATH') || exit;
get_header() ?>
<?php get_template_part('assets/icons/hotdesk') ?>

<?php
global $wp_query;

$tag_args =
    [
        'post_type' => 'post',
        'tag' => 'bests',
    ];

$popular_args = [
    'post_type' => 'post', // Could be `page` or Custom Post Type
    'category_name' => 'popular',
];
$query = [
    'post_type' => 'post',
    'posts_per_page' => 2
];
$showed_blogs = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 14,
    // 'post__not_in' => [get_the_ID()],
]);


?>

<!-- Slider main container -->
<div class="swiper blog_header">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper blog_header_swiper-wrapper">
 
        <!-- Slides -->
        <?php

        // The Query.
        $tag_query = new WP_Query($tag_args);

        // The Loop.
        if ($tag_query->have_posts()) {
            while ($tag_query->have_posts()) {
                $tag_query->the_post();
                // echoesc_html(get_the_title());
                ?>
                <div class="swiper-slide recommended_blog container">
                    <div class="main_img full-width">

                        <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full') ?>
                    </div>
                    <div class="   ">
                        <div class="container">
                            <a href="<?= the_permalink() ?>">
                                <div class="blog_header_box p-24 p-md-16">
                                    <div class="fs-caption text-primary">
                                        <span class="m-ie-16">
                                            <svg class="icon post-icon">
                                                <use href="#icon-Calendar,Schedule-3" />
                                            </svg>
                                            <?php echo get_the_date() ?>

                                        </span>

                                        <svg class="icon post-icon">
                                            <use href="#icon-pen-edit-create-3" />
                                        </svg>
                                        <?php echo get_the_author_meta('display_name', get_post_field('post_author', get_the_ID())) ?>
                                    </div>
                                    <h2 class="text-primary post_title">
                                        <?php echo the_title(); ?>
                                    </h2>
                                    <div class="paragraph text-natural">
                                        <?php echo the_content(); ?>
                                    </div>
                                    <a href="<?= the_permalink() ?>" class="see-all">ادامه مطلب </a>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <div class='btn_handler gap-8'>
            <div class="swiper-button-prev m-4 bg-default swiper-handler-custome">
                <svg class="icon">
                    <use href="#icon-Arrow-22" />
                </svg>
            </div>
            <div class="swiper-button-next m-4 bg-default swiper-handler-custome">
                <svg class="icon">
                    <use href="#icon-Arrow-6" />
                </svg>
            </div>
        </div>

    </div>

</div>



<div class="container | bg-primary">
    <div class="search_cat_box |  p-20 d-flex jc-between gap-8  ai-center">
        <div class="jc-center ac-center blog-cat">

            <ul class="jc-start d-flex ">
                 <li class="category_item  pi-16 pb-4 active">
                    <a href="<?= get_home_url(); ?>">
                        <h4>
همه                        </h4>
                    </a>
                </li>
                <?php
                $categories = get_categories();
                foreach ($categories as $category): ?>
                    <li class="category_item  pi-16 pb-4 <?= get_the_ID(); ?>">
                        <a href="<?= get_category_link($category->term_id) ?>">
                            <h4>
                                <?= $category->name ?>
                            </h4>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>


        <div class="search_container">
            <form action="<?= get_bloginfo('url') ?>">
                <div class="archieve_search">
                    <svg class="icon">
                        <use href="#icon-Search,-Loupe" />
                    </svg>
                    <input name="s" class="m-is-16 p-4 text-natural-100" type="search" placeholder="جستجو کنید"
                        value="<?php the_search_query() ?>">
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<div class="container">
    <?php if (have_posts()): ?>
        <h1 class="m-12">
            <?php if (is_category()) {
                $category_title = single_cat_title('', false);
                echo $category_title;
            } ?>

        </h1>
        <div class=" article m-be-120">
            <div class="box-col-2 box-col-md-1 gap-24 gap-md-16">
                <?php while ($showed_blogs->have_posts()): ?>
                    <?php $showed_blogs->the_post() ?>
                    <?php get_template_part('./partials/cards/blog') ?>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php


echo "<div class='container pagination d-flex jc-end ai-end m-be-16 pi-16 gap-8'>" . paginate_links(
    array(
        'total' => $showed_blogs->max_num_pages,
        'prev_next' => true,
        'mid_size' => 1,
    )
) . "</div>";
?>
<?php get_footer() ?>