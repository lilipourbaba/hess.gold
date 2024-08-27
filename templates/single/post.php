<?php defined('ABSPATH') || exit; ?>



<?php get_header() ?>
<?php
$author_name = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));
?>

<?php


$popular_args = [
    'post_type' => 'post', // Could be `page` or Custom Post Type
    'category_name' => 'popular',
];
?>
<main class="default-page | container mb-36">
    <div>
        <?php //rank_math_the_breadcrumbs(); 
        ?>
    </div>
    <div class=" d-flex   f-md-column">

        <!-- sidebar -->
        <div class="blog-sidebar p-16    ">

<div>
 <div class="search_single">
                <form action="<?= get_bloginfo('url') ?>">
                    <div class="tab d-flex f-row-reverse text-natural">
                        <input type="text" name="s" class="p-4 | tab_content text-natural" placeholder="جستجو کنید"
                            value="<?php the_search_query() ?>">
                        <i class="iconsax m-bs-16" icon-name="search-normal-2"></i>
                    </div>
                </form>
            </div>



            <!-- TOC  -->
            <div class=" m-bs-40" id="toc_div">
                <h3 class="text-default">جدول محتوایی</h3>



                <div id="toc-container" class="category_single ">

                    <ul class=" toc grid gap-3 border border-gray-200 rounded-md p-2 divide-y [&_>_*]:pt-4"></ul>

                </div>
            </div>



            <div class="d-sm-none m-bs-40">
                <h3 class="text-default">دسته بندی ها</h3>
                <div class="text-natural">
                    <div class="category_single text-natural">
                        <?php
                        $categories = get_categories();
                        foreach ($categories as $category): ?>
                            <button class="category_item d-block w-100  m-4 text-natural">
                                <a href="<?= get_category_link($category->term_id) ?>"><?= $category->name ?></a>
                            </button>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="cat_md_ctn d-none d-sm-block">
                <div class="d-flex ai-between jc-between ">
                    <p class="text-default">دسته بندی ها</p>
                    <svg class="icon icon-down d-block">
                        <use href="#icon-chevron-down" />
                    </svg>
                    <svg class="icon icon-up d-none">
                        <use href="#icon-chevron-up" />
                    </svg>

                </div>
                <div class="cat_md d-none">
                    <div class="pb-8 category_single ">
                        <?php
                        $categories = get_categories();
                        foreach ($categories as $category): ?>
                            <button class="category_item d-block w-100 p-4 m-4 text-natural">
                                <a href="<?= get_category_link($category->term_id) ?>"><?= $category->name ?></a>
                            </button>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>








</div>


           


        </div>





        <!-- end of sidebar -->


        <div class="blog-main p-16 text-primary ">
            <?php
            $class = $args['class'] ?? '';

            ?>

            <!-- TOC  -->
            <div class="d-none <?php echo $class ?>">
                <div class="text-2xl pb-2 font-medium">
                    <?php _e('جدول محتوایی', 'cyn-dm') ?>
                </div>

                <div id="toc-container">

                    <ul class=" toc grid gap-3 border border-gray-200 rounded-md p-2 divide-y [&_>_*]:pt-4"></ul>

                </div>
            </div>

            <p class="text-natural">
                <?php the_excerpt() ?>
            </p>
            <h1 class="fs-md-h2">
                <?php the_title() ?>
            </h1>
            <div class="text-natural ">

                <svg class="icon post-icon">
                    <use href="#icon-pen-edit-create-3" />
                </svg>
                <?php echo $author_name ?><span class="m-is-16">
                    <svg class="icon post-icon">
                        <use href="#icon-Calendar,Schedule-3" />
                    </svg>
                    <?php echo get_the_date() ?>
                </span>
            </div>
            <div class="pb-20 pi-12 bg-text-default jc-between d-flex m-bs-16 m-be-24 shadow-box fs-body-sm">
                <div>
                    <span class="author-single-blog meta">

                        <?php custom_share_buttons(); ?></span>
                </div>
                <div>
                    <?php echo get_comments_number(get_the_ID()); ?>
                    <svg class="icon">
                        <use href="#icon-Messages,-Chat-2" />
                    </svg>
                </div>
            </div>
            <div class="img-wrapper-single mb-8">
                <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full'); ?>
            </div>
            <div class="clr-fix-24"></div>
            <section>

                <div class="text-natural blog-content">
                    <?php the_content() ?>
                </div>
            </section>
            <div class="blog-comments">
                <div>
                    <span><?php echo get_comments_number(get_the_ID()); ?> </span><?= 'دیدگاه' ?>
                </div>
                <?php echo comments_template(); ?>
            </div>
        </div>
    </div>


    </div>
</main>


<?php get_footer() ?>