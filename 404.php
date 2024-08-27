<?php defined('ABSPATH') || exit; ?>
<?php get_header() ?>
<main class="contaner">
    <div class="text-center mb-80">
        <img src="<?= get_stylesheet_directory_uri() . "/assets/img/404.png" ?>" alt="404">
        <p class="text-primary-400 fs-body mb-8 text-center">متاسفانه صفحه ی مورد نظر یافت نشد </p>
        <button class="btn-secondary p-8 text-primary-100 radius-8 pi-24 mb-8 fs-body-sm">
            <a href="<?= get_home_url(); ?>">
                بازگشت به صفحه اصلی
            </a>
        </button>
    </div>
</main>
<?php get_footer() ?>