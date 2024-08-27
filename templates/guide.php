<?php get_header() /* Template name: Guide */ ?>
<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$banner = get_the_post_thumbnail_url($post_id, 'full');
?>
<main class="container">
    <section class="  d-xl-flex f-column gap-24 mb-24 ">
        <div class="breadcrumb text-primary fs-caption">

            <?php if (function_exists('rank_math_the_breadcrumbs'))
                echo rank_math_the_breadcrumbs(); ?>

        </div>
        <div class="m-be-20">
            <p class=" text-primary">
                <?= get_field('guide_page_subtitle'); ?>
            </p>
            <h1><?= get_field('guide_page_title'); ?></h1>
        </div>
        <div class="guide_banner bg-primary w-100 d-flex jc-between f-md-column-reverse ai-center p-24">
            <div class="text-natural-100 w-100">
                <p class="fs-title fs-md-h2">راهنمای انتخاب سایز انگشتر</p>
                <p class="fs-title-sm fs-md-h3">برای بانوان و آقایان</p>
            </div>
            <?php echo get_the_post_thumbnail(); ?>
        </div>
    </section>
    <h2><?php echo get_field('guide_first_section_title'); ?></h2>
    <p class="">
        <?= get_field('guide_first_section_text'); ?>
    </p>
    <table class=" text-natural">
        <tr>
            <th>
                <?php echo get_field('measure_table_title'); ?>
            </th>
            <th>
                <?php echo get_field('size_table_title'); ?>
            </th>
        </tr>
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <tr>
                <td>
                    <p>
                        <?=
                            isset(get_field("size_guide_table_$i")["measure_$i"]) ? get_field("size_guide_table_$i")["measure_$i"] : "";
                        ?>
                    </p>
                    <p class="fs-caption"> <?= isset(get_field("size_guide_table_$i")["measure_cm_$i"]) ? get_field("size_guide_table_$i")["measure_cm_$i"] : '';
                    ?> </p>
                </td>

                <td>
                    <?= isset(get_field("size_guide_table_$i")["size_$i"]) ? get_field("size_guide_table_$i")["size_$i"] : ""; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <h2><?= get_field('guide_second_section_title'); ?></h2>
    <p class="">
        <?= get_field('guide_second_section_text'); ?>
    </p>
    <?= wp_get_attachment_image(get_field('guide_poster'), 'full home-hero w-100'); ?>
    <h2><?= get_field('guide_third_section_title'); ?></h2>
    <p class="">
        <?= get_field('guide_third_section_text'); ?>
    </p>
    <?= wp_get_attachment_image(get_field('second_guide_poster'), 'full home-hero fs-caption text-primary'); ?>
    <span class="">
        <?= get_field('second_guide_poster_subtitle'); ?>
    </span>
    <table class=" text-natural">
        <tr>
            <th>
                <?= get_field('measure_table_title2'); ?>
            </th>
            <th>
                <?= get_field('size_table_title2'); ?>
            </th>
        </tr>
        <?php for ($i = 10; $i < 14; $i++) { ?>
            <tr>
                <td>
                    <p> <?= isset(get_field("size_guide_table_$i")["measure_cm_$i"]) ? get_field("size_guide_table_$i")["measure_cm_$i"] : ''; ?>
                    </p>
                </td>
                <td>
                    <?= isset(get_field("size_guide_table_$i")["size_$i"]) ? get_field("size_guide_table_$i")["size_$i"] : ""; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <p class="">
        <?= get_field('guide_third_section_text_2'); ?>
    </p>
    <div>
        <h2><?= get_field('guide_fourth_section_title'); ?></h2>
        <p class="  text-primary">
            <?= get_field('guide_fourth_section_subtitle'); ?>
        </p>
        <p class="">
            <?= get_field('guide_fourth_section_text'); ?>
        </p>
    </div>
    <table class=" text-natural">
        <tr>
            <th>
                <?= get_field('measure_table_title3'); ?>
            </th>
            <th>
                <?= get_field('size_table_title3'); ?>
            </th>
        </tr>
        <?php for ($i = 10; $i <= 14; $i++) { ?>
            <tr>
                <td>
                    <p>
                        <?=
                            isset(get_field("size_guide_table_$i")["measure_$i"]) ? get_field("size_guide_table_$i")["measure_$i"] : "";
                        ?>
                    </p>
                </td>
                <td>
                    <?= isset(get_field("size_guide_table_$i")["size_$i"]) ? get_field("size_guide_table_$i")["size_$i"] : ""; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
</main>
<?php get_footer() ?>