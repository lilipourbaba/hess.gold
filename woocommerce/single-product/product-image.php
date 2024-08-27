<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
	return;
}
global $product;
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$thumbnail_id = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids();
// $image_gallery = get_field("product_gallery");
array_unshift($attachment_ids, (int) $thumbnail_id);


$columns = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ($post_thumbnail_id ? 'with-images' : 'without-images'),
		'woocommerce-product-gallery--columns-' . absint($columns),
		'images',
	)
);
?>
<div class="gallery-slider">
	<div class="swiper product_gallery">
		<div class="swiper-wrapper">
			<?php
			// get_the_post_thumbnail($post_id, 'full swiper-slide');
			if ($attachment_ids && $thumbnail_id) {
				foreach ($attachment_ids as $attachment_id) { ?>
					<div class="swiper-slide"><img src="<?= wp_get_attachment_image_url($attachment_id,"full") ?>"/></div>
					<?php
				}
			} ?>
	<div class="swiper-button-next"></div>
		<div class="swiper-button-prev ttr"></div>
		</div>
	
	</div>
	<div thumbsSlider class="swiper thumbSwiper">
			<div class="swiper-wrapper">
			<?php
				// get_the_post_thumbnail($post_id, 'full swiper-slide');
				if ($attachment_ids && $thumbnail_id) {
					foreach ($attachment_ids as $attachment_id) { ?>
							<div class="swiper-slide"><?= wp_get_attachment_image($attachment_id) ?></div>
						<?php
					}
				} ?>
			
			</div>
	</div>
</div>