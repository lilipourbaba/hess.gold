<?php
/**
 * "Order received" message.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/order-received.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.8.0
 *
 * @var WC_Order|false $order
 */

defined('ABSPATH') || exit;
?>

<div class=" thankyou-order-received text-center">
	<img src="<?= get_stylesheet_directory_uri() . "/assets/img/received.png" ?>" />
	<p class="text-">ممنون از خریدتون</p>
	<p>سفارش شما با موفقیت ثبت شد</p>
	<button class="btn-secondary PrintFactor" onclick=" print()"> مشاهده فاکتور</button>
</div>
<?php $print = print '' ?>
<div class="factor d-none">
	<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

		<li class="woocommerce-order-overview__order order">
			محصول
			<strong><?php echo $order->get_order_number(); ?></strong>
		</li>

		<li class="woocommerce-order-overview__date date">
			تاریخ
			<strong><?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
		</li>

		<?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()): ?>
			<li class="woocommerce-order-overview__email email">
				ایمیل
				<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
			</li>
		<?php endif; ?>

		<li class="woocommerce-order-overview__total total">
			مجموع
			<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
		</li>

		<?php if ($order->get_payment_method_title()): ?>
			<li class="woocommerce-order-overview__payment-method method">
				روش پرداخت <strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
			</li>
		<?php endif; ?>

	</ul>
	<?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
	<?php do_action('woocommerce_thankyou', $order->get_id()); ?>
</div>