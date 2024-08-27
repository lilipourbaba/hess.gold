<?php /* Template name: home */ ?>
<?php $render_template = $args['render_template'] ?? true;
$accountPermalink = get_permalink(get_option('woocommerce_myaccount_page_id')) . 'orders';
?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
    <?php wp_body_open() ?>
    <?php if ($render_template): ?>
        <header>
            <div class="d-flex jc-start  bg-primary w-100 gap-14 fs-body text-natural-100 p-16">
                <ul class=" box-col-2 d-md-flex jc-between gap-24 | price">
                    <li class="col-span-1"> طلای 18 عیار / 750 </li>
                    <li class="col-span-1">نرخ فعلی :
                        <?php get_field('goldـprice'); ?>
                    </li>
                </ul>
                <div class="tab price-unit">
                    <span class="d-none  d-md-block"></span>
                    <ul class=" d-flex jc-between gap-16 d-md-none">
                        <li class=" col-span-1">واحد پولی : ریال </li>
                        <li class="col-span-1">واحد حجم : گرم</li>
                        <li class="col-span-1">نوع بازار : بازار داخلی</li>
                    </ul>
                </div>
            </div>
        </header>


        <?php cyn_get_component('header-category');
        ?>

    <?php endif; ?>