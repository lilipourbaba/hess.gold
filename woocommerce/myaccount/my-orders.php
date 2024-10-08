<?php
/**
 * My Orders - Deprecated
 *
 * @deprecated 2.6.0 this template file is no longer used. My Account shortcode uses orders.php.
 * @package WooCommerce\Templates
 */

defined( 'ABSPATH' ) || exit;

$my_orders_columns = apply_filters(
	'woocommerce_my_account_my_orders_columns',
	array(
		'order-number'  => esc_html__( 'Order', 'woocommerce' ),
		'order-date'    => esc_html__( 'Date', 'woocommerce' ),
		'order-status'  => esc_html__( 'Status', 'woocommerce' ),
		'order-total'   => esc_html__( 'Total', 'woocommerce' ),
		'order-actions' => '&nbsp;',
	)
);

$customer_orders = get_posts(
	apply_filters(
		'woocommerce_my_account_my_orders_query',
		array(
			'numberposts' => $order_count,
			'meta_key'    => '_customer_user',
			'meta_value'  => get_current_user_id(),
			'post_type'   => wc_get_order_types( 'view-orders' ),
			'post_status' => array_keys( wc_get_order_statuses() ),
		)
	)
);

if ( $customer_orders ) : ?>

	<h2><?php echo apply_filters( 'woocommerce_my_account_my_orders_title', esc_html__( 'Recent orders', 'woocommerce' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>

	<table class="shop_table shop_table_responsive my_account_orders">

		<thead>
			<tr>
				<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
					<th class="<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
			<?php
			foreach ( $customer_orders as $customer_order ) :
				$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$item_count = $order->get_item_count();
				?>
				<tr class="order">
					<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
						<td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

							<?php elseif ( 'order-number' === $column_id ) : ?>
								<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
									<?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</a>

							<?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

							<?php elseif ( 'order-status' === $column_id ) : ?>
								<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>

							<?php elseif ( 'order-total' === $column_id ) : ?>
								<?php
								/* translators: 1: formatted order total 2: total order items */
								printf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								?>

							<?php elseif ( 'order-actions' === $column_id ) : ?>
								<?php
								$actions = wc_get_account_orders_actions( $order );

								if ( ! empty( $actions ) ) {
									foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
										echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
									}
								}
								?>
							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>











<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.5.0
 */

defined('ABSPATH') || exit;
$title = apply_filters(
	'woocommerce_account_orders_columns',
	array(
		'order-number' => __('سفارش کد ', 'woocommerce'),
		'order-date' => __('تاریخ', 'woocommerce'),
		'order-status' => __('وضعیت ', 'woocommerce'),
		// 'order-total' => __('Total', 'woocommerce'),
		// 'order-actions' => __('Actions', 'woocommerce'),
	)
);

do_action('woocommerce_before_account_orders', $has_orders); ?>

<?php if ($has_orders): ?>

	<table
		class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
		<tbody>gggggggg
			<?php
			foreach ($customer_orders->orders as $customer_order) {
				$order = wc_get_order($customer_order); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$item_count = $order->get_item_count() - $order->get_item_count_refunded();
				?>
				<tr
					class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr($order->get_status()); ?> order">
					<?php foreach ($title as $column_id => $column_name): ?>


						<th class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr($column_id); ?>"
							data-title="<?php echo esc_attr($column_name); ?>">
							<div><?php if (has_action('woocommerce_my_account_my_orders_column_' . $column_id)): ?>
									<?php do_action('woocommerce_my_account_my_orders_column_' . $column_id, $order); ?>

								<?php elseif ('order-number' === $column_id): ?>
									سفارش کد <a href="<?php echo esc_url($order->get_view_order_url()); ?>">
										<?php echo esc_html(_x('#', 'hash before order number', 'woocommerce') . $order->get_order_number()); ?>
									</a>

								<?php elseif ('order-date' === $column_id): ?>
									<time datetime="<?php echo esc_attr($order->get_date_created()->date('c')); ?>">تاریخ
										<?php echo esc_html(wc_format_datetime($order->get_date_created())); ?></time>

								<?php elseif ('order-status' === $column_id): ?>
									وضعیت <?php echo esc_html(wc_get_order_status_name($order->get_status())); ?>

								</div>
								<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button<?php echo esc_attr($wp_button_class); ?>"
									href="<?php echo esc_url(wc_get_endpoint_url('orders', $current_page - 1)); ?>">
									مشاهده فاکتور
								</a>
							<?php endif; ?>
						</th>
					<?php endforeach; ?>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>

	<!-- <?php do_action('woocommerce_before_account_orders_pagination'); ?> -->

	<?php if (1 < $customer_orders->max_num_pages): ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if (1 !== $current_page): ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button<?php echo esc_attr($wp_button_class); ?>"
					href="<?php echo esc_url(wc_get_endpoint_url('orders', $current_page - 1)); ?>"><?php esc_html_e('Previous', 'woocommerce'); ?></a>
			<?php endif; ?>

			<?php if (intval($customer_orders->max_num_pages) !== $current_page): ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button<?php echo esc_attr($wp_button_class); ?>"
					href="<?php echo esc_url(wc_get_endpoint_url('orders', $current_page + 1)); ?>"><?php esc_html_e('Next', 'woocommerce'); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else: ?>

	<?php wc_print_notice(esc_html__('No order has been made yet.', 'woocommerce') . ' <a class="woocommerce-Button wc-forward button' . esc_attr($wp_button_class) . '" href="' . esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))) . '">' . esc_html__('Browse products', 'woocommerce') . '</a>', 'notice'); // phpcs:ignore WooCommerce.Commenting.CommentHooks.MissingHookComment ?>

<?php endif; ?>