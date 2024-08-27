<?php

/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_edit_account_form'); ?>

<form class="woocommerce-EditAccountForm edit-account " action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?>>

	<?php do_action('woocommerce_edit_account_form_start'); ?>
	<div class="d-flex gap-12 name-edit">
		<p class="woocommerce-form-row woocommerce-form-row--first  d-flex gap-16 account_field f-w">
			<i class="iconsax" icon-name="user-2"></i>

			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text " name="account_first_name"
				id="account_first_name" autocomplete="given-name" placeholder="نام"
				value="<?php echo esc_attr($user->first_name); ?>" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--last   d-flex   account_field gap-16">
			<i class="iconsax" icon-name="user-2"></i>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name"
				id="account_last_name" autocomplete="family-name" placeholder="نام خانوادگی"
				value="<?php echo esc_attr($user->last_name); ?>" />
		</p>
	</div>
	<div class="clearfix mb-16"></div>

	<p class="woocommerce-form-row woocommerce-form-row--first gap-16  w-100 account_field">
		<i class="iconsax" icon-name="phone"></i>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name"
			id="account_display_name" placeholder="نام نمایشی" value="<?php echo esc_attr($user->display_name); ?>" />
	</p>
	<div class="clearfix mb-16"></div>

	<p class="woocommerce-form-row woocommerce-form-row--last d-flex w-100 w-md-100 account_field gap-16">
		<i class="iconsax" icon-name="mail"></i>

		<input type="email" class=" woocommerce-Input woocommerce-Input--email input-text" name="account_email"
			id="account_email" autocomplete="email" placeholder="ایمیل"
			value="<?php echo esc_attr($user->user_email); ?>" />
	</p>
 
	<div class="clearfix mb-16"></div>
	<!-- <fieldset class="w-100 pb-16">
		<h3 class="text-accent fs-h6">تغییر رمز عبور</h2>
			<div class="clearfix mb-16"></div>	
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row account_field gap-16">
		<i class="iconsax" icon-name="lock-1"></i>

		<input type="password" class="woocommerce-Input woocommerce-Input--password " name="password_current"
			id="password_current" autocomplete="off" placeholder="رمز عبور فعلی" />
	</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide account_field gap-16">
				<i class="iconsax" icon-name="lock-1"></i>
				<input type="password" class="  woocommerce-Input woocommerce-Input--password " name="password_1"
					id="password_1" autocomplete="off" placeholder="رمز عبور جدید" />
			</p>
			<div class="clearfix mb-16"></div>

			<p class="woocommerce-form-row woocommerce-form-row--wide account_field gap-16">
				<i class="iconsax" icon-name="lock-1"></i>
				<input type="password" class="  woocommerce-Input woocommerce-Input--password " name="password_2"
					id="password_2" autocomplete="off" placeholder="تکرار رمز عبور جدید" />
			</p>
	</fieldset> -->
	<p class="text-left">
		<?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
		<button type="submit" variant="primary" class="woocommerce-Button btn-secondary" name="save_account_details"
			value="<?php esc_attr_e('Save changes', 'woocommerce'); ?>"><?php esc_html_e('Save changes', 'woocommerce'); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>
	<?php do_action('woocommerce_edit_account_form_end'); ?>
</form>

<?php do_action('woocommerce_after_edit_account_form'); ?>