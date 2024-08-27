<?php get_header() /* Template name: home */ ?>
<?php
$product_card_title = [
    get_field('first_product_card'),
    get_field('second_product_card'),
    get_field('third_product_card'),
    get_field('fourth_product_card'),
    get_field('fifth_product_card')
];
$product_card = [
    get_field('first_product_card_select'),
    get_field('second_product_card_select'),
    get_field('third_product_card_select'),
    get_field('fourth_product_card_select'),
    get_field('fifth_product_card_select')
];
?>
<main class="container gap-40 home">
    <?php

    cyn_get_component('/home/bar');
    get_template_part('/woocommerce/content-product', '', []);

    cyn_get_component('product', ['query' => $product_card[0], 'title' => $product_card_title[0]]);
    cyn_get_component('/home/category');
    cyn_get_component('product', ['query' => $product_card[1], 'title' => $product_card_title[1]]);
    cyn_get_component('/home/poster');
    cyn_get_component('product', ['query' => $product_card[2], 'title' => $product_card_title[2]]);
    cyn_get_component('/home/minimal');
    cyn_get_component('product', ['query' => $product_card[3], 'title' => $product_card_title[3]]);
    cyn_get_component('product', ['query' => $product_card[4], 'title' => $product_card_title[4]]);  
       cyn_get_component('/form/customize');  

    cyn_get_component('/home/faq');
    ?>
</main>
<?php get_footer() ?>