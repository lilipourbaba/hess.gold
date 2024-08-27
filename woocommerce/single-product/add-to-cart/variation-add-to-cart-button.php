<?php
/**
 * Single variation cart button
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */
defined('ABSPATH') || exit;
get_template_part('assets/icons/hotdesk');
global $product;
?>
<div class=" gap-12 text-natural-100 d-flex text-center add-to-cart">
	<!-- <?php do_action('woocommerce_before_add_to_cart_button'); ?> -->

	<?php
	// do_action('woocommerce_before_add_to_cart_quantity');
	
	woocommerce_quantity_input(
		array(
			'min_value' => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
			'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
			'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		)
	);

	do_action('woocommerce_after_add_to_cart_quantity');
	?>
	<button type="submit" class="btn-secondary"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
	<span class="btn-secondary" id="customize_button"> سفارشی سازی </span>
	<span class="share d-flex ai-center">
	
		<?php custom_share_buttons(); ?></span>
	<input type="hidden" name="add-to-cart" value="<?php echo absint($product->get_id()); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint($product->get_id()); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>

 