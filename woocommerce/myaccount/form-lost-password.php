<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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

defined('ABSPATH') || exit;
$background = get_stylesheet_directory_uri() . "/assets/img/login.png";

do_action('woocommerce_before_lost_password_form');
?>
<div class="u-columns col2-set container" id="customer_login" <?php printf("style=\"background-image:url('%s')\"", $background) ?>>

	<div class="full-width contact-hero jc-center  d-flex ai-center | login-page">
		<div class="container bg-natural-100  jc-center ai-center radius-8">
			<form method="post" class="woocommerce-ResetPassword lost_reset_password text-primary p-16">

				<h3>فراموشی رمز عبور</h3>
				 
					<p for="user_login" class=" m-bs-16">ما برای ایمیل شما یک کدارسال میکنیم لطفا مطمئن شوید که صحیح است </p>
					<p class="d-flex gap-8 ai-center form-input mb-36"><i class="iconsax" icon-name="user-2"></i>
<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login"
						id="user_login" autocomplete="username" placeholder="  ایمیل خود را وارد کنید" /></p>
				

				<div class="clear"></div>

				<?php do_action('woocommerce_lostpassword_form'); ?>

				<p class="woocommerce-form-row form-row">
					<input type="hidden" name="wc_reset_password" value="true" />
					<button type="submit"
						class="btn-secondary w-100"
						value="<?php esc_attr_e('Reset password', 'woocommerce'); ?>"><?php esc_html_e('Reset password', 'woocommerce'); ?></button>
				</p>

				<?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>

			</form>
		</div>
	</div>
</div>
<?php
do_action('woocommerce_after_lost_password_form');
