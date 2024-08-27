<?php
if (!class_exists('cyn_products')) {
    class cyn_products
    {

        function __construct()
        {
            add_action('rest_api_init', [$this, 'filter_product']);
            add_filter('woocommerce_default_address_fields', [$this, 'cyn_edit_address_fields']);

        }
        function filter_product()
        {
            register_rest_route('cynApi/v1', '/get_product', [
                'methods' => 'GET',
                'callback' => [$this, 'cyn_handle_filter_product']
            ]);

        }


        function cyn_handle_filter_product()
        {
            cyn_verify_nonce($_SERVER['HTTP_X_WP_NONCE']);



            $filtered_products = new WP_Query($_GET);
            $response = $this->render_by_query($filtered_products, $_GET['post_type'], ['class' => $_GET['class']]);

            wp_send_json_success(
                [
                    'html' => $response,
                    'product_count' => $filtered_products->found_posts,
                ],
                200
            );
        }
        function render_by_query($query, $post_type, array $args = [])
        {
            ob_start();
            if ($query->have_posts()) {
                while ($query->have_posts()):
                    $query->the_post();
                    cyn_get_card($post_type, $args);
                endwhile;
            } else {
                get_template_part('/templates/components/archive/not-found');
            }
            wp_reset_postdata();
            return ob_get_clean();
        }
  








 








   /** custom edit address page fields **/
      function cyn_edit_address_fields($address)
    {
      $address['company']['class'] = ['hidden'];
      $address['country']['class'] = ['hidden'];
      $address['address_2']['class'] = ['hidden'];

      $address['first_name']['class'] = [];
      $address['last_name']['class'] = [];
      $address['state']['class'] = [];
      $address['city']['class'] = [];
      $address['address_1']['class'] = ['w-100'];
      $address['postcode']['class'] = [];

      $address['first_name']['input_class'] = ['form-control'];
      $address['last_name']['input_class'] = ['form-control'];
      $address['address_1']['input_class'] = ['form-control'];
      $address['city']['input_class'] = ['form-control'];
      $address['state']['input_class'] = ['form-control'];
      $address['postcode']['input_class'] = ['form-control'];

      // $address['postcode']['required'] = false;

      return $address;
    }

    }
}
// function cyn_get_all_product()
// {
//     cyn_verify_nonce($_SERVER['HTTP_X_WP_NONCE']);
//     $all_products = new WP_Query($_GET);
//     var_dump($all_products);
//     $response = $this->filter_by_query($all_products, $_GET['post_type'], ['class' => $_GET['class']]);
//     wp_send_json_success(
//         [
//             'html' => $response,
//             'product_count' => $all_products->found_posts,
//         ],
//         200
//     );
// }
// function filter_by_query($query, $post_type, array $args = [])
// {
//     ob_start();
//     if ($query->have_posts()) {
//         while ($query->have_posts()):
//             $query->the_post();
//             cyn_get_product($post_type, $args);
//         endwhile;
//     } else {
//         get_template_part('/templates/components/archive/not-found');
//     }
//     wp_reset_postdata();
//     return ob_get_clean();
// }