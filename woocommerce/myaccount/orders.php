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

	<?php
	foreach ($customer_orders->orders as $customer_order):
		$order = wc_get_order($customer_order); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		$item_count = $order->get_item_count() - $order->get_item_count_refunded();
		?>
		<div class="orders m-be-16">
			<div class="d-flex jc-between status-<?php echo esc_attr($order->get_status()); ?>">
				<p class="fs-body-sm">
					<?php foreach ($title as $column_id => $column_name): ?>


						<?php if (has_action('woocommerce_my_account_my_orders_column_' . $column_id)): ?>
							<?php do_action('woocommerce_my_account_my_orders_column_' . $column_id, $order); ?>

						<?php elseif ('order-number' === $column_id): ?>
							<span> سفارش کد <a href="<?php echo esc_url($order->get_view_order_url()); ?>">
									<?php echo esc_html(_x('#', 'hash before order number', 'woocommerce') . $order->get_order_number()); ?>
								</a>
							</span>
						<?php elseif ('order-date' === $column_id): ?>
							<span><time datetime="<?php echo esc_attr($order->get_date_created()->date('c')); ?>">تاریخ
									<?php echo esc_html(wc_format_datetime($order->get_date_created())); ?></time></span>

						<?php elseif ('order-status' === $column_id): ?>
							<span>
								وضعیت [<?php echo esc_html(wc_get_order_status_name($order->get_status())); ?>]
							</span>
						<?php endif; endforeach; ?>

				</p>
				<a class="factor text-natural-100 radius-8 pi-12 fs-caption pb-4"
					href="<?php echo esc_url($order->get_view_order_url()); ?>">
					مشاهده فاکتور
				</a>
			</div>
			<table class="w-100 fs-h6 ">
				<tbody>
					<tr>
						<th>محصول</th>
						<!-- <th>وزن به گرم</th> -->
						<th> تعداد</th>
						<th><?php esc_html_e('Total', 'woocommerce'); ?></th>
					</tr>
					<?php
					// do_action( 'woocommerce_order_details_before_order_table_items', $order );
					$order_id = $order->get_id(); // Get the order ID
			
					$order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					if (!$order) {
						return;
					}

					$order_items = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));
					$show_purchase_note = $order->has_status(apply_filters('woocommerce_purchase_note_order_statuses', array('completed', 'processing')));
					$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
					foreach ($order_items as $item_id => $item) {
						$product = $item->get_product();

						wc_get_template(
							'order/order-details-item.php',
							array(
								'order' => $order,
								'item_id' => $item_id,
								'item' => $item,
								'show_purchase_note' => $show_purchase_note,
								'purchase_note' => $product ? $product->get_purchase_note() : '',
								'product' => $product,
							)
						);
					}

					// do_action( 'woocommerce_order_details_after_order_table_items', $order );
					?>

				</tbody>
			</table>

		</div>
	<?php endforeach; endif; ?>
