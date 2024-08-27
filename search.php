<?php
defined('ABSPATH') || exit;
get_header(); ?>
<?php get_template_part('assets/icons/hotdesk'); ?>
<?php if (function_exists('rank_math_the_breadcrumbs')) {
    rank_math_the_breadcrumbs();
}
$searchQuery = get_search_query();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

if (isset($_GET['section']) && $_GET['section'] == 'blog') {
    $section = "blog";
} elseif (isset($_GET['section']) && $_GET['section'] == 'product') {
    $section = "product";
} else {
    $section = "all";
}

$productQuery = new WP_Query(
    array(
        'post_type' => 'product',
        's' => $searchQuery,
        'paged' => $paged,
        'posts_per_page' => 8,
    )
);

$postQuery = new WP_Query(
    array(
        'post_type' => 'post',
        's' => $searchQuery,
        'paged' => $paged,
        'posts_per_page' => 8,
    )
);
?>


<main role="main">
    <div class="search_cat | bg-primary-100 p-24 d-flex jc-between  m-be-24">
        <div class="search-title d-flex gap-8">
                جستجو در :
                <button class="search_category fs-h1 text-secondary " id="product_tab">
                    محصولات
                </button>
                <button class="posts fs-h1 btn blog_tab" id="blog_tab">مقالات</button>
            </div>
            <div class="result text-left col-span-6 col-span-md-12">
                <span id="foundPosts"><?= $wp_query->found_posts ?>نتیجه</span>

            </div>
        </div>

        <section class="container p-8" id="product_result">
            <?php if ($section != "blog"): ?>

            <div class="result-loop">
                <?php if ($productQuery->have_posts()): ?>
                    <div id="searchPostsWrapper" class="searchPostsWrapper mb-32">
                        <?php
                        while ($productQuery->have_posts()):
                            $productQuery->the_post();
                            wc_get_template_part('content', 'product-2');
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <nav class='archive-pagination'>
                        <?=
                            paginate_links(
                                array(
                                    'total' => $productQuery->max_num_pages,
                                    'add_args' => false,
                                    'prev_text' => is_rtl() ? '<i class="iconsax" icon-name="arrow-right"></i>' : '<i class="iconsax" icon-name="arrow-left"></i>',
                                    'next_text' => is_rtl() ? '<i class="iconsax" icon-name="arrow-left"></i>' : '<i class="iconsax" icon-name="arrow-right"></i>',
                                    'type' => 'list',
                                    'end_size' => 3,
                                    'mid_size' => 3,
                                )
                            )
                            ?>
                    </nav>
                <?php else: ?>
                    <h4 class="no-found">هیچ موردی یافت نشد.</h4>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </section>
        <div class="clearfix s-11"></div>
    <?php endif; ?>
    <div class=" ">

        <?php if ($section != "product"): ?>



            <section class="search-result container m-be-24 d-none " id="blog_result">


                <div class="result-loop">
                    <?php if ($postQuery->have_posts()): ?>
                        <div class="blog-cart f-row c-4 c-lg-2">
                            <?php
                            while ($postQuery->have_posts()):
                                $postQuery->the_post();
                                get_template_part('./partials/cards/blog');
                            endwhile;
                            ?>
                        </div>
                        <div class="clearfix s-8"></div>

                        <nav class='archive-pagination'>
                            <?=
                                paginate_links(
                                    array(
                                        'total' => $postQuery->max_num_pages,
                                        'add_args' => false,
                                        'prev_text' => is_rtl() ? '<i class="iconsax" icon-name="arrow-right"></i>' : '<i class="iconsax" icon-name="arrow-left"></i>',
                                        'next_text' => is_rtl() ? '<i class="iconsax" icon-name="arrow-left"></i>' : '<i class="iconsax" icon-name="arrow-right"></i>',
                                        'type' => 'list',
                                        'end_size' => 3,
                                        'mid_size' => 3,
                                    )
                                )
                                ?>
                        </nav> <?php else: ?>
                        <h4 class="no-found">هیچ موردی یافت نشد.</h4>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </section>
            <div class="clearfix s-11"></div>
        <?php endif; ?>
</main>

<?php get_footer(); ?>