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

do_action('woocommerce_before_customer_login_form'); ?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')): ?>
	<div class="u-columns col2-set" id="customer_login">
	<?php endif; ?>
	<div class="pb-48">
		<div class="full-width contact-hero jc-center  d-flex ai-center | login-page">
			<div class="container bg-natural-100  jc-center ai-center">
<p class="d-flex gap-16"> <span>ورود با شماره</span> <span>ثبت نام با ایمیل</span></p>

				<form class="text-primary  login-" method="post">
					<?php do_action('woocommerce_login_form_start'); ?>
					<h4 class="m-be-16 m-bs-36">شماره و رمز عبور خود را وارد کنید</h4>
					<p class="text-right text-primary ">
						<i class="iconsax" icon-name="phone"></i>
						<input pattern="[0]{1}[9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" class=" data" type="tel" name="user_tel"
							placeholder="شماره موبایل" required>
					</p>
			
					<p class=" d-flex ai-center gap-8">
					 						<i class="iconsax" icon-name="lock-1"></i>

						<input class="woocommerce-Input woocommerce-Input--text input-text" type="password"
							name="password" id="password" autocomplete="current-password" placeholder="رمز عبور"/>
					</p>

					<?php do_action('woocommerce_login_form'); ?>
	<p class="woocommerce-LostPassword lost_password text-accent">
		<a href="<?php echo esc_url(wp_lostpassword_url()); ?>">رمز عبورتو فراموش کردی؟</a>
	</p>
					<p class="form-row">
					
						<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
						<button type="submit"
							class="buttons w-100"
							name="login"
							value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
					</p>
				

					

					<?php do_action('woocommerce_login_form_end'); ?>

				</form>
				<span>حساب کاربری نداری؟<a href="" class="text-accent">ثبت نام کن</a></span>

				<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')): ?>
					          <div class="loader" id="login-form-loader" style="display: none;"></div>

					<form method="post" class="d-none woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

						<?php do_action('woocommerce_register_form_start'); ?>

						<?php if ('no' === get_option('woocommerce_registration_generate_username')): ?>

							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span
										class="required">*</span></label>
								<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username"
									id="reg_username" autocomplete="username"
									value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
							</p>

						<?php endif; ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="reg_email">شماره موبایل<span class="required">*</span></label>
							<input type="tel" class="woocommerce-Input woocommerce-Input--text input-text" name="tel"
								id="reg_email" autocomplete="tel"
								value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
						</p>

						<?php if ('no' === get_option('woocommerce_registration_generate_password')): ?>

							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span
										class="required">*</span></label>
								<input type="password" class="woocommerce-Input woocommerce-Input--text input-text"
									name="password" id="reg_password" autocomplete="new-password" />
							</p>

						<?php else: ?>

							<p>لطفا شماره ی خود را وارد کنید ما به این شماره یک کد 4 رقمی ارسال خواهیم کرد
							</p>

						<?php endif; ?>


						<p class="woocommerce-form-row form-row">
							<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
							<button type="submit"
								class="woocommerce-Button woocommerce-button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> woocommerce-form-register__submit"
								name="register"
								value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
						</p>

						<?php do_action('woocommerce_register_form_end'); ?>

					</form>
      <form action="./" method="POST" class="login-form" id="login-get-otp" style="display: none;">
            <div class="input-label">
              <label for="otp_pass">
                <span>لطفا کد ارسال شده را وارد کنید:</span>
                <input type="text" name="otp_pass" id="otp_pass" class="form-control" pattern="[0-9]{4}" placeholder="X-X-X-X" minlength="4" maxlength="4" required />
              </label>
            </div>

            <div class="btns">
              <button type="submit" class="btn" variant="primary">تایید</button>
            </div>
          </form>
        </div>
				</div>
			</div>
		</div>

	</div>

<?php endif; ?>
<?php do_action('woocommerce_after_customer_login_form'); ?>