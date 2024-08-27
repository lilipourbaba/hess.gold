<?php get_header() /*Template Name: contact */ ?>
<?php
$front_page_id = get_option('page_on_front');
$social_1 = get_option('social_1');
$social_2 = get_option('social_2');
$social_3 = get_option('social_3');
$social_logo_1 = get_option('social_color_logo_1');
$social_logo_2 = get_option('social_color_logo_2');
$social_logo_3 = get_option('social_color_logo_3');
$address = get_option('address');
$number1 = get_option('phone_number');
$number2 = get_option('phone_number2');
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$banner = get_the_post_thumbnail_url($post_id, 'full');
?>
<div class="d-flex hero jc-around ">
    <div class="d-flex f-column gap-12 jc-center">
        <!-- <h1 class="fs-title fs-lg-h1"><?= get_field("about_title"); ?></h1> -->
        <h1 class="pi-40 fs-title fs-lg-h1"> راه های <span class="text-secondary">ارتباط </span> با گالری </h1>

    </div>
    <?php echo get_the_post_thumbnail(); ?>

</div>
<main class="container m-be-120" id="contactUsPage">

    <div class=" m-bs-24  m-be-36">
        <h3 class="p-be-20"><?= the_title(); ?></h3>
        <p class="text-primary p-be-20"><?= get_field('contact_us_form_title'); ?></p>
        <?php cyn_get_component('/form/contact-us'); ?>
    </div>
    <div class="contact-information">
        <h3>اطلاعات تماس</h3>
        <div class="back">
            <h4>شماره تماس</h4>
            <ul>
                <li class="text-accent"><?= $number1; ?></li>
                <li class="text-accent"><?= $number2; ?></li>
            </ul>
        </div>
        <div class="back">
            <h4>آدرس گالری </h4>
            <ul>
                <li><?= $address; ?></li>
            </ul>
        </div>
        <div class="back">
            <h4>پلتفرم های دیگه </h4>
            <div class="social   w-5 d-flex    gap-8 m-24">
                <?php
                if ($social_1): ?>

                    <a href="<?= $social_1; ?>" class="social-icon">
                        <img src="<?= $social_logo_1 ?>" alt="">
                    </a>
                <?php endif; ?>
                <?php
                if ($social_2): ?>

                    <a href="<?= $social_2; ?>" class="social-icon">
                        <img src="<?= $social_logo_2; ?>" alt="">
                    </a>
                <?php endif; ?>
                <?php
                if ($social_3): ?>

                    <a href="<?= $social_3; ?>" class="social-icon">
                        <img src="<?= $social_logo_3; ?>" alt="">
                    </a>
                <?php endif; ?>
            </div>
        </div>
                <?php if (get_field("contact_us_map")): ?>

        <div class="back">
            <h4>پلتفرم های دیگه </h4>
            <?= get_field("contact_us_map"); ?>
        </div>
        <? endif; ?>
    </div>
</main>
<?php get_footer() ?>