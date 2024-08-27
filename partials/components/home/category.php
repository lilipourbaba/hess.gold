<?php

$categories = get_terms([
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
    'number' => 7
]);
?>
<div class="d-grid category gap-8 d-md-flex jc-between f-wrap fs-md-h6">
    <?php foreach ($categories as $i => $cat) {
        $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
        $image_url = wp_get_attachment_url($thumbnail_id) !== false ? wp_get_attachment_url($thumbnail_id) : get_stylesheet_directory_uri() . '/assets/img/404.png';
    ?>
        <div class="fade-in-down cat" anim-delay="<?php echo $i * 0.5 ?>">
            <a href="<?= get_term_link($cat->term_id) ?>" class=" d-flex  ai-end" style="background-image:url('<?= $image_url ?>')">
                <p class="full-width bg-primary-200 pb-4 pi-8 d-flex jc-between">
                    <span class="see-all"><?= $cat->name; ?></span>
                    <span class="see-all">مشاهده </span>
                </p>
            </a>
        </div>

    <?php } ?>

</div>