<?php
$poster = get_field('home_poster', get_option('page_on_front'));
$poster_mb = get_field('home_poster_mb', get_option('page_on_front'));
$poster_customize = get_field('poster_customize');
?>
<div class="fade-in-down" anim-delay="0.4" id="customization">

    <a class="poster d-lg-none text-natural-100 w-100 radius-8 bg-cart-2" id="customize_button">
        <?= wp_get_attachment_image($poster, 'full w-100'); ?>
    </a>

    <a class="poster d-none d-lg-block text-natural-100 w-100 radius-8 bg-cart-2" id="customize_button_mb">
        <?= wp_get_attachment_image($poster_mb, 'full w-100'); ?>
    </a>

</div>