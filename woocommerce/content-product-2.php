<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;
// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>

<?php
$addinitional_class = $args['class'] ?? '';
$product_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$wc_product = wc_get_product($product_id);
$product_sku = $wc_product->get_sku();
$product_price = $wc_product->get_price_html();
?>
<a href="<?= get_permalink($product_id) ?>"
	class="product-card | p-be-20 bg-cart-1 jc-center d-flex f-column gap-8 p-8 <?= $addinitional_class ?>">
	<?= get_the_post_thumbnail($product_id, 'full'); ?>
	<p class="fs-body text-primary"> <?= $product_sku ? "کد " . $product_sku : '</br>'; ?> </p>
	<h4> <?= get_the_title($product_id); ?></h4>
	<h5 class="d-flex gap-12 f-md-column"> <?= $product_price; ?></h5>
</a>