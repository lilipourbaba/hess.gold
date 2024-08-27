<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
$order_summery = [

	// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20),
	// add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 30),

];


global $product;
$product_title = get_field('first_product_card');
$product_card = get_field('first_product_card_select');
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
$args = []
	?>
 
<?php cyn_get_component('/form/customize'); ?>
<section id="product-<?php the_ID(); ?>" class=" grid-auto-fit-250 mb-24 gap-16">

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action('woocommerce_before_single_product_summary');
	?>

	<div class="detail d-flex f-column jc-center gap-32 text-primary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */

		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
		// add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 50);
		

		// remove_action('woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20);	
		// add_action('woocommerce_single_product_summary', 'woocommerce_single_variation_add_to_cart_button', 70);
		
		do_action('woocommerce_single_product_summary');
		// apply_filters('woocommerce_single_product_summary', $order_summery,$args);
// 
		?>
	</div>

 </section>
 
<?php
/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
do_action('woocommerce_after_single_product_summary');
?>


<?php

do_action('woocommerce_after_single_product');
cyn_get_component('product', ['query' => $product_card, 'title' => $product_title]);
?>

 
