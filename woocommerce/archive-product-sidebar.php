<?php
defined('ABSPATH') || exit;
get_template_part('assets/icons/hotdesk');
$cynPriceMin = 100;
$cynPriceMax = 30000000;
$weightTerms = get_terms([
    'taxonomy' => 'cyn_weight',
]);
$priceTerms = get_terms([
    'taxonomy' => 'cyn_price',
]);
?>
<?php

function add_to_meta_query($item_name, $meta_key, $meta_type, $meta_compare, $is_array = false, &$meta_query, $filters)
{
    if ($is_array === false) {
        $item =
            (isset($filters[$item_name]) && $filters[$item_name] !== '') ?
            $filters[$item_name] : null;
    }

    if ($is_array === true) {
        $item_min = (isset($filters[$item_name[0]]) && $filters[$item_name[0]] !== '') ?
            $filters[$item_name[0]] : 0;

        $item_max = (isset($filters[$item_name[1]]) && $filters[$item_name[1]] !== '') ?
            $filters[$item_name[1]] : 1000000000000;
    }


    if ($is_array === true) {
        array_push(
            $meta_query,
            [
                'key' => $meta_key,
                'value' => [$item_min, $item_max],
                'type' => $meta_type,
                'compare' => $meta_compare
            ],
        );
        return;
    }

    if ($item === null || $item === 'null')
        return;

    array_push(
        $meta_query,
        [
            'key' => $meta_key,
            'value' => $item,
            'type' => $meta_type,
            'compare' => $meta_compare
        ],
    );
}



add_filter('pre_get_posts', 'cyn_filter_products');
function cyn_filter_products($query)
{
    if (
        is_admin() ||
        !$query->is_main_query() ||
        !$query->is_archive() ||
        !$query->is_post_type_archive('house')
    )
        return;


    $filters = cyn_get_filters();


    if ($filters === false)
        return;

    $meta_query = [];


    add_to_meta_query('weight', 'weight', 'numeric', '=', false, $meta_query, $filters);
    add_to_meta_query(['priceMin', 'priceMax'], 'price', 'numeric', 'between', true, $meta_query, $filters);

    $query->set('meta_query', $meta_query);


    if ($filters['orderby'] === 'price') {
        $query->set('orderby', [
            "post_type" => "product",
            'orderby' => 'meta_value_num',
            'meta_key' => '_price',
            'order' => 'ASC',
        ]);
    }

    if ($filters['orderby'] === 'price-desc') {
        $query->set('orderby', [
            "post_type" => "product",
            'orderby' => 'meta_value_num',
            'meta_key' => '_price',
            'order' => 'DESC',
        ]);
    }



    if ($filters['orderby'] === 'date') {
        $query->set('orderby', [
            "post_type" => "product",
            'orderby' => 'date',
            'order' => 'DESC',
        ]);
    }


    if ($filters['orderby'] === 'popularity') {
        $query->set('orderby', [
            "post_type" => "product",
            'orderby' => 'meta_value_num',
            'meta_key' => 'total_sales',
            'order' => 'DESC',
        ]);
    }
}
function cyn_get_filters()
{
    $filters = $_GET;
    return $filters;
}




$order_items = [
    'price' => 'ارزان ترین',
    'price-desc' => 'گران ترین',
    'date' => 'جدیدترین',
    'popularity' => 'محبوبیت',
];


$price_args = array(
    "post_type" => "product",
    'orderby' => 'price',
    'order' => 'DESC',
);
$date_args = array(
    "post_type" => "product",
    'orderby' => 'date',
    'order' => 'DESC',
);



$query = new WP_Query($args);
$query->set('orderby', $query);
// var_dump($query);
?>
<div class="archive-product-sidebar">
    <div class="mobile_view d-none">
        <div class=" d-flex jc-between ai-center">
            <button class="filters mobile_filter p-4 m-4 w-100">
                <svg class="icon">
                    <use href="#icon-Filter,-Sort-3" />
                </svg>
                فیلترها
            </button>
        </div>
    </div>
    <div class="backdrop"></div>
    <div class="mobile_res p-16 pb-32 m-bs-32">
        <button class="close_filter filters pi-8 mb-16">
            <svg class="icon">
                <use href="#icon-Arrow,-Forward" />
            </svg>
        </button>
        <div class="mobile_res_content">
        </div>
    </div>
    <div id="filter_box" class=" d-md-none">
        <form id="archive-product-filter-form" class="b-is-8 " action="#" method="GET">
            <div class="d-flex f-column gap-32">
                <div>
                    <h3 class="m-be-16">دسته بندی ها</h3>
                    <?php get_template_part('/woocommerce/archive', 'product-cat', []); ?>
                </div>
                <?php /* cyn_price_tax_name */ ?>
                <!-- <h3 class="">رنج قیمت </h3>
                <div class="d-flex f-column text-natural">
                    از
                    <?php echo $cynPriceMin ?>
                    هزار تومان
                    <br>
                    تا
                    <?php echo $cynPriceMax / 1000000 ?>
                    تومان
                    <div class="clr-fix-16 s-0"></div>
                    <div class="middle">
                        <div class="multi-range-slider">
                            <input type="range" step="500" id="input-left" class="price_range" name="min_price"
                                min="<?php echo $cynPriceMin ?>" max="<?php echo $cynPriceMax ?>"
                                value="<?php echo $cynPriceMin ?>" />
                            <input type="range" step="500" id="input-right" class="price_range" name="max_price"
                                min="<?php echo $cynPriceMin ?>" max="<?php echo $cynPriceMax ?>"
                                value="<?php echo $cynPriceMax ?>" />
                            <div class="slider">
                                <div class="track"></div>
                                <div class="range"></div>
                                <div class="thumb left"></div>
                                <div class="thumb right"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex jc-between ai-center m-bs-16">
                        <button class="filters price | fs-body-sm p-4">
                            <span class="max_price">
                                <?= $cynPriceMax / 1000000 ?>
                            </span>
                            <span class="d-block">
                                میلیون تومان
                            </span>
                        </button>
                        <button class="filters price | fs-body-sm p-4">
                            <span class="min_price">
                                <?= $cynPriceMin ?>
                            </span>
                            <span class="d-block">
                                هزار تومان
                            </span>
                        </button>
                    </div>
                </div> -->
                <!-- <h3>وزن طلا</h3>
                <div class="filter-container">
                   <div class="clearfix s-0"></div>
                    <?php 
                    // foreach ($weightTerms as $index => $termObject): ?>
                        <div class="weight_item filters | p-4 d-block w-100 m-4"><?= $termObject->name ?></div>
                    <?php
                //  endforeach; ?>
                    <input type="text" name="weight" class="weight_item_input d-none" id="" value="">
                </div>
               




                <?php
                $products = get_posts(
                    array(
                        'post_type' => 'product',
                        'post_status' => 'publish',
                        'orderby' => 'meta_value_num',
                        'meta_key' => '_price',
                        'posts_per_page' => -1,
                    )
                );

                $highest = $products[array_key_first($products)];
                $lowest = $products[array_key_last($products)];

                $highest_price = get_post_meta($highest->ID, '_price', true);
                $lowest_price = get_post_meta($lowest->ID, '_price', true);
                ?>


                <div class="toggle-tab">
                    <div class="flex justify-between items-center px-2 | toggle-opener cursor-pointer">
                        <span class="text-lg">
                            <?php printf('بر اساس %s', 'قیمت') ?>
                        </span>
                        <svg class="icon">
                            <use href="#icon-plus" />
                        </svg>
                    </div>


                    <div class=" toggle-opening grid grid-rows-[0fr] transition-all">

                        <div class="overflow-hidden">
                            <div class=" space-y-4 my-3 px-2s">
                                <div class="">
                                    <div class="flex justify-between">
                                        <label for="minPrice" class="text-sm">حداقل قیمت</label>

                                        <span id="minPriceText" class="text-sm">
                                            <?php echo wc_price($_GET['minPrice'] ?? $lowest_price) ?>
                                        </span>
                                    </div>
                                    <input id="minPrice" dir="ltr" min="<?php echo $lowest_price ?>"
                                        max="<?php echo $highest_price ?>" step="1000" name="minPrice"
                                        value="<?php echo $_GET['minPrice'] ?? $lowest_price ?>" type="range"
                                        class="w-100 text-h1 bg-gray-200 rounded-lg appearance-none cursor-pointer form-range">

                                </div>

                                <div class="">
                                    <div class="flex justify-between items-center">

                                        <label for="maxPrice" class="text-sm">حداکثر قیمت</label>
                                        <span id="maxPriceText" class="text-sm">
                                            <?php echo wc_price($_GET['maxPrice'] ?? $highest_price) ?>
                                        </span>
                                    </div>
                                    <input id="maxPrice" step="1000" min="<?php echo $lowest_price ?>"
                                        max="<?php echo $highest_price ?>" dir="ltr" name="maxPrice" type="range"
                                        value="<?php echo $_GET['maxPrice'] ?? $highest_price ?>"
                                        class="w-100 h-1 bg-gray-200 rounded-lg appearance-none cursor-pointer form-range">

                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->
 <div>
                    <h3>ترتیب بر اساس</h3>
                    <div>
                   <?php
         foreach ($order_items as $index => $item): ?>
        <div orderby="<?php echo $index ?>" class="orderbyItem filters | p-4 d-block w-100 m-4">
            <?= $item ?>
        </div>
        <?php
        endforeach; ?>
        <input type="text" name="orderby" class="d-none orderby_input" id="" value="">
    </div>
</div>


                <input class="apply_filter | btn-secondary d-flex p-4 w-100 text-natural-100 ai-center jc-center"
                    value="اعمال فیلتر" type="submit" />

            </div>
        </form>
    </div>
</div>