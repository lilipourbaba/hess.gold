<?php

/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $product;


$product_id = $product->get_id();


if ($product->is_on_sale()) {
	if ($product->is_type('simple')) {
		$sale_price = $product->get_sale_price();
		$regular_price = $product->get_regular_price();
	} elseif ($product->is_type('variable')) {
		$product_prices = $product->get_variation_prices();

		$sale_price = min($product_prices['sale_price']);
		$regular_price = min($product_prices['regular_price']);
	}
	$sale_price && $discount = round(($sale_price / $regular_price - 1) * -100);
} else {
	if ($product->is_type('simple')) {
		$sale_price = $product->get_regular_price();
	} elseif ($product->is_type('variable')) {
		$product_prices = $product->get_variation_prices();

		$sale_price = min($product_prices['regular_price']);
	}
}
$weight = get_field("product_weight");

if($weight):
?>
<div class="price m-be-12 bg-natural-300 d-flex jc-between pb-8 pi-16 radius-8 product-price">
	<p>وزن: </p>
	<p><?= $weight ?> گرم</p>
</div>
<?php endif; ?>
<div class="price bg-natural-300 d-flex jc-between pb-8 pi-16 radius-8 product-price">

 
</div>