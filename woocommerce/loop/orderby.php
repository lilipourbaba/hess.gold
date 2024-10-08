<?php

/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if (!defined('ABSPATH')) {
	exit;
}
$catalog_orderby_options = apply_filters(
	'woocommerce_catalog_orderby',
	array(
		'price' => 'ارزان ترین',
		'price-desc' => 'گران ترین',
		'date' => 'جدیدترین',
		'popularity' => 'محبوبیت',
	)
);
?>
<form class="" method="get">
	<h3> مرتب سازی براساس</h3>
	<div name="orderby" class="orderby" aria-label="<?php esc_attr_e('Shop order', 'woocommerce'); ?>">
		<?php foreach ($catalog_orderby_options as $id => $name): ?>
			<a class="filters | p-4 d-block w-100 m-4" href="?orderby=<?php echo esc_attr($id); ?>" <?php selected($orderby, $id); ?>>
				<?php echo esc_html($name); ?>
			</a>
		<?php endforeach; ?>
	</div>
	<input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')); ?>
</form>