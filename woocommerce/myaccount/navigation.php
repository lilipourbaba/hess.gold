<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */
if (!defined('ABSPATH')) {
	exit;
}
$endpoints = array(
	'orders' => get_option('woocommerce_myaccount_orders_endpoint', 'orders'),
	'edit-address' => get_option('woocommerce_myaccount_edit_address_endpoint', 'edit-address'),
	'payment-methods' => get_option('woocommerce_myaccount_payment_methods_endpoint', 'payment-methods'),
	'edit-account' => get_option('woocommerce_myaccount_edit_account_endpoint', 'edit-account'),
	'customer-logout' => get_option('woocommerce_logout_endpoint', 'customer-logout'),
);
$items = array(
	'edit-account' => "اطلاعات کاربری",
	'edit-address' => _n('Address', 'Addresses', (1 + (int) wc_shipping_enabled()), 'woocommerce'),
	'orders' => __('Orders', 'woocommerce'),
	'customer-logout' => 'خروج'
);
$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
$current_user = wp_get_current_user();


do_action('woocommerce_before_account_navigation');
?>
<nav class="woocommerce-MyAccount-navigation">
	<p>
	<h1>
		<?php the_title() ?>
	</h1>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses(__(' %1$s  به گالری حس خوش اومدی', 'woocommerce'), $allowed_html),
		'<strong>' . esc_html($current_user->display_name) . '</strong>',
		esc_url(wc_logout_url())
	);
	?>
	</p>
	<ul class="d-lg-flex">
		<?php foreach (apply_filters('woocommerce_account_menu_items', $items, $endpoints) as $endpoint => $label): ?>
			<li>
				<a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"
					class="w-100 d-flex jc-between mb-8 ai-center radius-8 <?php echo wc_get_account_menu_item_classes($endpoint); ?>"><?php echo esc_html($label); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>
<?php do_action('woocommerce_after_account_navigation'); ?>