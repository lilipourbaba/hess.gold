<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
$background = get_stylesheet_directory_uri() . "/assets/img/login.png";
do_action('woocommerce_before_customer_login_form'); ?>

 	<div class="u-columns col2-set container" id="customer_login" <?php printf("style=\"background-image:url('%s')\"", $background) ?>>

		<div class="full-width contact-hero jc-center  d-flex ai-center | login-page">
			<div class="container bg-natural-100  jc-center ai-center radius-8">
				<form class="text-primary p-16" method="post" id="login_form">
			 
			 
					<div class="d-none" id="mail_input">
						<h4 class="m-be-16 m-bs-36">ایمیل و رمز عبور خود را وارد کنید</h4>

					
					</div>	<p class="text-right text-primary form-input">
							<i class="iconsax" icon-name="mail"></i>
							<input class=" data" type="email" name="user_mail" placeholder=" ایمیل" required>
						</p>
					<p class=" d-flex ai-center gap-8 form-input">
						<i class="iconsax" icon-name="lock-1"></i>

						<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password"
							id="password" autocomplete="current-password" placeholder="رمز عبور" />
					</p>

					<?php do_action('woocommerce_login_form'); ?>
					<p class="woocommerce-LostPassword lost_password text-accent">
						<a href="<?php echo esc_url(wp_lostpassword_url()); ?>">رمز عبورتو فراموش کردی؟</a>
					</p>
					<p class="form-row">
						<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
						<button type="submit" class="buttons w-100" name="login"
							value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
					</p>

					<div class=" gap-16 d-flex">حساب کاربری نداری؟ <a href="<?= get_home_url() . '/register'; ?>" class="btn d-flex text-accent register_btn" variant="text-primary">ثبت نام کن</a></div>
				</form>
			</div>
			 

		</div>
	</div>
	<?php do_action('woocommerce_after_customer_login_form'); ?>

	</div>

 