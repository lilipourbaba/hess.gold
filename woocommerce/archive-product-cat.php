<?php

$categories = get_terms([
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
    'number' => 7
]);
?>
<div class="category gap-8 f-wrap box-col-3 gap-md-28 m-bs-4">
    <?php foreach ($categories as $cat) {
        $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
        $image_url = wp_get_attachment_url($thumbnail_id) !== false ? wp_get_attachment_url($thumbnail_id) : get_stylesheet_directory_uri() . '/assets/img/404.png';
        ?>
    <a href="<?= get_term_link($cat->term_id) ?>">
        <img src="<?= $image_url ?>" class="col-span-1 w-100" />
    </a>
    <?php } ?>

</div>