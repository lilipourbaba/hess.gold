<?php /* Template name: home */ ?>
<?php $render_template = $args['render_template'] ?? true;
// $accountPermalink = get_permalink(get_option('woocommerce_myaccount_page_id')) . 'edit-account';
?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="enamad" content="10265921" />
    <script>
        var cyn_head_script = {
            url: "<?= admin_url('admin-ajax.php') ?>",
            nonce: "<?= wp_create_nonce('ajax-nonce') ?>",
            site_url: "<?= site_url() ?>"
        }
    </script>
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
    <?php wp_body_open() ?>
    <!-- <span id="g-pointer-1"></span> -->
    <!-- <span id="mouse"></span> -->
     <div class="preloader-div">
					  <div class="preloader"></div> 

		</div>
    <?php if ($render_template): ?>
        <?php get_template_part('assets/icons/hotdesk'); ?>
        <header>
            <div class="top-header box-col-2 bg-primary w-100 gap-14 fs-body text-natural-100 p-16">
                <ul class="box-col-2 d-md-flex jc-between gap-24 | price">
                    <li class="col-span-1"> طلای 18 عیار / 750 </li>
                    <li class="col-span-1 gold-price">نرخ فعلی :
                        <?= do_shortcode("[show_webhesab_pay_tala]"); ?>
                        <i class="iconsax" icon-name="chevron-down" id="icontab"></i>
                    </li>
                </ul>
                <div class="price-tab price-unit w-100">
                    <!-- <span class="d-none  d-md-block"></span> -->
                    <ul class=" d-flex jc-between gap-16  ">
                        <li class=" col-span-1">واحد پولی : ریال </li>
                        <li class="col-span-1">واحد حجم : گرم</li>
                        <li class="col-span-1">نوع بازار : بازار داخلی</li>
                    </ul>
                </div>
            </div>
            <div class="main_header | pos-relative text-primary container d-flex jc-between  ai-center p-lg-16"
                id="second_header">
                <div class="container">
                    <div class="d-lg-none d-flex ai-center gap-24">
                        <?php the_custom_logo() ?>
                        <?php wp_nav_menu([
                            'theme_location' => 'header_demo'
                        ]) ?>
                    </div>
                    <div class="headertab d-none d-lg-block">
                        <i class="iconsax open-pop" onclick="openLink(event, 'Right')" icon-name="hamburger-menu"></i>

                    </div>
                </div>

                <div class="col-span-1 ac-left">
                    <div class="d-flex gap-12 jc-end ai-center p-ie-40 pi-md-8">
                        <form action="<?= get_bloginfo('url') ?>" id="search-container">
                            <div class=" d-flex f-row ai-center">
                                <i class="iconsax searchtab d-lg-none fs-h6" icon-name="search-normal-2"></i>
                                <input type="text" name="s" class="p-4   search " id="search" placeholder="اینجا تایپ کنید"
                                    value="<?php the_search_query() ?>">
                            </div>
                        </form>
                        <i class="iconsax searchtab_mobile d-none d-lg-block" icon-name="search-normal-2">
                        </i>
                        <a href="<?= get_home_url() . '/register'; ?>" class="btn d-flex" variant="text-primary">

                            <?= !is_user_logged_in() ? ' <i class="iconsax" icon-name="user-2"></i>' :
                                ' <div class=" user-link d-flex p-8  radius-8">
                                <i class="iconsax" icon-name="user-2"></i><i class="iconsax chevron" icon-name="chevron-down"></i></div>' ?>
                        </a>
                    </div>
                </div>

            </div>
            <div class="pos-fixed d-none  bg-natural-100 w-100   container | mobile-hamburger fade-in-down"
                id="mobile_hamburger" anim-delay="0.4">
                <div class="bg-natural-100">
                    <button class="close-pop  ">
                        <svg class="icon">
                            <use href="#icon-Arrow,-Forward" />
                        </svg>
                    </button>
                    <div class="p-20 mobile-icon "> <?php the_custom_logo() ?>
                    </div>
                    <div class="container">
                        <?php wp_nav_menu([
                            'theme_location' => 'mobile_header_demo',
                            'menu_class' => 'mobile-menu'
                        ]) ?>
                    </div>

                    <div class="p-20 d-flex f-column gap-8 jc-center ai-center mobile-logo m-24 ">
                        <?php
                        $social_1 = get_option('social_1');
                        $social_2 = get_option('social_2');
                        $social_3 = get_option('social_3');
                        $social_logo_1 = get_option('social_color_logo_1');
                        $social_logo_2 = get_option('social_color_logo_2');
                        $social_logo_3 = get_option('social_color_logo_3');
                        $head_logo = get_option('logo');
                        ?>
                        <img src="<?= $head_logo ?>" alt="">
                        <div class="footer_social   w-5 d-flex  f-column f-md-row jc-center  gap-8 m-4">
                            <?php
                            if ($social_1): ?>

                                <a href="<?= $social_1; ?>" class="social-icon">
                                    <img src="<?= $social_logo_1 ?>" alt="">
                                </a>
                            <?php endif; ?>
                            <?php
                            if ($social_2): ?>

                                <a href="<?= $social_2; ?>" class="social-icon">
                                    <img src="<?= $social_logo_2; ?>" alt="">
                                </a>
                            <?php endif; ?>
                            <?php
                            if ($social_3): ?>

                                <a href="<?= $social_3; ?>" class="social-icon">
                                    <img src="<?= $social_logo_3; ?>" alt="">
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="pi-20 bg-cart-2">
                <form action="<?= get_bloginfo('url') ?>" class=" container d-none jc-between  ai-center p-8 text-primary  "
                    id="search_form">
                    <i class="iconsax" icon-name="search-normal-2"> </i>
                    <input type="text" name="s" class="p-4  mobile-search w-100" id="search" placeholder="اینجا تایپ کنید"
                        value="<?php the_search_query() ?>">
                    <i class="iconsax search_close" icon-name="x">
                    </i>
                </form>
            </div>


            <div class="pos-fixed left-8 shop-icone"> <a href="<?= wc_get_cart_url() ?>"
                    class="btn radius-52 p-12 d-  ai-center" variant="default">
                    <i class="iconsax" icon-name="shopping-cart"></i>
                    <span>
                        <?= WC()->cart->get_cart_contents_count() ?>

                    </span>
                </a></div>
        </header>
        <?php cyn_get_component('header-category'); ?>
    <?php endif; ?>