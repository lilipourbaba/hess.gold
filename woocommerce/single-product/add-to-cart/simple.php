<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}


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
echo wc_get_stock_html( $product ); // WPCS: XSS ok.
$weight = get_field("product_weight");

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);

		do_action( 'woocommerce_after_add_to_cart_quantity' );

		if ($weight):
			?>
	<div class="price m-be-12 bg-natural-300 d-flex jc-between pb-8 pi-16 radius-8 product-price">
		<p>وزن: </p>
		<p><?= $weight ?> گرم</p>
	</div>
<?php endif; ?>
<div class="price  m-be-12 bg-natural-300 d-flex jc-between pb-8 pi-16 radius-8 product-price">
	<p>قیمت: </p>

	<p>
		<?php if ($product->is_in_stock()): ?>
			<?php if ($product->is_on_sale()): ?>
				<span class="regular-price">
					<?= wc_price($regular_price) ?>
				</span>
			<?php endif; ?>

			<span class="sale-price h3">
				<?php echo (wc_price($sale_price)) ?>
			</span>
		<?php else: ?>
			<span class="out-of-stock h3">ناموجود</span>
		<?php endif; ?>
	</p>
</div>
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





		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
