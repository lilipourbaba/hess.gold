<?php

$categories = get_terms([
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
    'number' => 7
]);
?>
<div class="  menu-cat d-grid gap-8 pos-ab" id="submenu">
    <?php foreach ($categories as $cat) {
        $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
        $image_url = wp_get_attachment_url($thumbnail_id) !== false ? wp_get_attachment_url($thumbnail_id) : get_stylesheet_directory_uri() . '/assets/img/404.png';
        ?>
        <a href="<?= get_term_link($cat->term_id) ?>">
            <div class="d-flex gap-12 ai-center"><img src="<?= $image_url; ?>" />
                <span><?= $cat->name; ?></span>
            </div>
        </a>

    <?php } ?>

</div>