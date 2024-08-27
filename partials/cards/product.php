<?php
$addinitional_class = $args['class'] ?? '';
$product_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$product_anim_delay = isset($args['product_anim_delay']) ? $args['product_anim_delay'] : "";
$wc_product = wc_get_product($product_id);
$product_sku = $wc_product->get_sku();
$product_price = $wc_product->get_price_html();
$attachment_ids = $wc_product->get_gallery_image_ids();

?>
<div class="fade-in-down" anim-delay="<?php echo $product_anim_delay * 0.3 ?>">
    <a href="<?= get_permalink($product_id) ?>" class="product-card | p-be-20 bg-cart-1 jc-center d-flex f-column gap-8 text-primary <?= $addinitional_class ?>">
        <?= get_the_post_thumbnail($product_id, 'full p-4'); ?>
        <?php if (!empty($attachment_ids)) {
            echo wp_get_attachment_image($attachment_ids[0], 'full');
        } ?>
        <div class="pi-16">
            <p class="fs-body-sm  text-natural"> <?= $product_sku ? "کد " . $product_sku : '</br>'; ?> </p>
            <h4 class="product_title"> <?= get_the_title($product_id); ?></h4>
            <h5 class="d-flex gap-12 f-md-column"> <?= $product_price; ?></h5>
        </div>
    </a>
</div>