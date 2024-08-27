<?php














///////////customize
// add_action('wp_ajax_send_CustomizeForm', 'cyn_CustomizeForm');
// add_action('wp_ajax_nopriv_CustomizeForm', 'cyn_CustomizeForm');

// function cyn_CustomizeForm()
// {

//     list(
//         'upload' => $upload,
//          'describe' => $describe,
//         '_nonce' => $_nonce,

//     ) = $_POST;
//     // $data = $_POST['data'];
//     // foreach ($_POST as $key => $value) {
//     //     if (in_array($key, ['action', 'email', 'name', 'mail', '_nonce']))
//     //         continue;
//     //     $meta[$key] = $value;
//     // }

//     $created_form = wp_insert_post([
//         'post_type' => $GLOBALS["form"],
//         'post_title' => $_POST['upload'],
//         'post_describe' => $_POST['describe'],
//         'post_status' => 'private',
//         'tax_input' => [
//             'Category_Form' => [
//                 get_term_by('slug', 'contact-us', 'Category_Form')->term_id
//             ]
//         ]
//         // 'meta_input' => $meta,
//     ]);
//      add_post_meta($created_form, 'name', sanitize_text_field($upload));
//     add_post_meta($created_form, 'describe', sanitize_textarea_field($describe));
// }

