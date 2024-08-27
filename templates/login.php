<?php /* Template Name: Login */ ?>

<?php
$userLink = get_permalink(get_option('woocommerce_myaccount_page_id'));
if (is_user_logged_in()) {
    wp_redirect($userLink);
    exit();
}
$background = get_stylesheet_directory_uri() . "/assets/img/login.png";

?>

<?php get_header(); ?>
<main class="main-body login">
    <h2 class="bg-primary-300 d-flex ai-center gap-16  pi-40 pb-12"> <a href="<?= get_home_url(); ?>"><i
                class="iconsax login-title p-8" icon-name="arrow-right"></i></a> ورود به گالری حس</h2>

    <div class="clearfix s-11"></div>

    <div class="u-columns col2-set d-flex jc-center w-100 pos-absolute ai-center  container"
        id="customer_login" <?php printf("style=\"background-image:url('%s')\"", $background) ?>>
        <div class="full-width contact-hero jc-center  d-flex ai-center | login-page">
            <div class="container bg-natural-100 p-24 radius-12 jc-center ai-center">

                <div class="loader" id="login-form-loader"></div>

                <form action="./" method="POST" class="login-form d-flex gap-16 f-column" id="login-get-phone">

                    <p class="d-flex gap-16 fs-h3">
                        ورود
                    </p>
                    <div class="input-label">
                        <label for="nickname">
                            <div class="text-right text-primary form-input">
                                <i class="iconsax" icon-name="phone"></i>
                                <input type="text" name="phone" class="data" variant="search"
                                    pattern="[9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" minlength="11" maxlength="11"
                                    placeholder="شماره موبایل" required />
                            </div>
                            <p class=" d-flex ai-center gap-8 form-input">
                                <i class="iconsax" icon-name="lock-1"></i>

                                <input class="woocommerce-Input woocommerce-Input--text input-text" type="password"
                                    name="password" id="password" autocomplete="current-password"
                                    placeholder="رمز عبور" />
                            </p>
                        </label>
                    </div>

                    <div class="text-center m-bs-8">
                        <button type="submit" class="btn-secondary w-100" variant="primary">مرحله بعد</button>
                        <div class="link-register">حساب کاربری داری؟ <a href="<?= get_home_url() . '/register'; ?>"
                                class="text-accent login_btn">وارد
                                شو</a></div>

                    </div>
                </form>

                <form action="./" method="POST" class="login-form d-none" id="login-get-otp">
                    <p class="d-flex gap-16 fs-h3">
                        ثبت نام
                    </p>
                    <div class="input-label">
                        <label for="otp_pass">
                            <p>لطفا کد ارسال شده را وارد کنید:</p>
                            <input type="text" name="otp_pass" id="otp_pass" class="fs-title" pattern="[0-9]{4}"
                                placeholder="__ __ __ __" minlength="4" maxlength="4" required />
                        </label>
                    </div>

                    <div class="btns">
                        <button type="submit" class="btn-secondary w-100" variant="primary">تایید</button>
                        <div class="link-register">حساب کاربری داری؟ <a href="<?= get_home_url() . '/register'; ?>"
                                class="text-accent login_btn">وارد
                                شو</a></div>
                    </div>
                </form>



            </div>
        </div>
    </div>

    <div class="clearfix s-11"></div>
</main>

<footer></footer>
<div class="wp-scripts">
    <?php wp_footer() ?>
</div>
</body>

</html>