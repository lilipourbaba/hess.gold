<?php
use Automattic\WooCommerce\Admin\API\Reports\Coupons\Query;

if (!class_exists('cyn_api')) {
    class cyn_api
    {
        function __construct()
        {
            add_action('rest_api_init', [$this, 'contact_form']);
            add_action('rest_api_init', [$this, 'customize_form']);

            add_action('rest_api_init', function () {
                register_rest_route(
                    'cynApi/v1',
                    '/get_posts',
                    [
                        'methods' => 'POST',
                        'callback' => [$this, 'cyn_handle_get_search_posts'],
                        'permission_callback' => '__return_true'

                    ]
                );
            });

        }

        public function contact_form()
        {
            register_rest_route('cynApi/v1', '/form/contact-us', [
                'methods' => 'POST',
                'callback' => [$this, 'cyn_handle_contact_form']
            ]);
        }

        function cyn_handle_contact_form()
        {
            // cyn_verify_nonce($_SERVER['HTTP_X_WP_NONCE']);

            var_dump($_POST);

            $insert_post = wp_insert_post([
                'post_type' => 'form',
                'post_author' => 1,
                'post_title' => sanitize_text_field($_POST['name']),
                'post_content' => sanitize_textarea_field($_POST['describe']),
                'meta_input' => [
                    'email' => sanitize_email($_POST['email']),
                ],
                'tax_input' => [
                    'contact-us' => [get_term_by('slug', 'contact-us', 'Category_Form')->term_id] //@FIXME
                ],
            ]);

            if (is_wp_error($insert_post))
                return wp_send_json_error(['insert_row' => false], 500);



            wp_send_json_success(['post_id' => $insert_post], 200);
        }


        public function customize_form()
        {
            register_rest_route('cynApi/v1', '/form/customize', [
                'methods' => 'POST',
                'callback' => [$this, 'cyn_handle_customize_form']
            ]);
        }

        function cyn_handle_customize_form()
        {






            if (isset($_FILES['file-upload'])) {

                require_once (ABSPATH . 'wp-admin/includes/file.php');

                global $wp_filesystem;
                WP_Filesystem();

                $content_directory = $wp_filesystem->wp_content_dir() . 'uploads/';
                $wp_filesystem->mkdir($content_directory . 'resumes');
                $target_dir_location = $content_directory . 'resumes/';


                $file_type = $_FILES['file-upload']['name'];
                $file_type = explode(".", $file_type);
                $file_type = end($file_type);



                $name_file = strtotime(2000) . '.' . $file_type;
                $tmp_name = $_FILES['file-upload']['tmp_name'];
                move_uploaded_file($tmp_name, $target_dir_location . $name_file);

                $resume_link = site_url() . '/wp-content/uploads/resumes/' . $name_file;
            }

            var_dump($_POST);

            $insert_post = wp_insert_post([
                'post_type' => 'customize_form',
                'post_author' => 1,
                'post_title' => sanitize_textarea_field($_POST['describe']),

                'meta_input' => [
                    'file-upload' => $resume_link,
                ],
            ]);

            if (is_wp_error($insert_post))
                return wp_send_json_error(['insert_row' => false], 500);



            wp_send_json_success(['post_id' => $insert_post], 200);
        }





        public function cyn_handle_get_search_posts()
        {
            cyn_verify_nonce($_SERVER['HTTP_X_WP_NONCE']);
            $all_posts = new WP_Query($_POST);
            $response = $this->render_by_query($all_posts, $_POST['post_type'], ['class' => $_POST['class']]);
            wp_send_json_success(
                [
                    'html' => $response,
                    'posts_count' => $all_posts->found_posts,
                ],
                200
            );
        }


        public function render_by_query($query, $post_type, array $args = [])
        {
            ob_start();
            if ($query->have_posts()) {
                while ($query->have_posts()):
                    $query->the_post();
                    cyn_get_card($post_type, $args);
                endwhile;
            } else {
                get_template_part('/templates/archive/not-found');
            }
            wp_reset_postdata();
            return ob_get_clean();
        }

    }

}