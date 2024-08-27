<?php
add_action('add_meta_boxes', 'cyn_form_meta_box');

add_filter('manage_form_posts_columns', 'cyn_form_table_head');
add_action('manage_form_posts_custom_column', 'cyn_form_table_column', 10, 2);

$meta = [

    [
        'name' => 'email',
        'label' => __('email', 'cyn-dm'),
    ],


];

function cyn_form_meta_box()
{
    add_meta_box('information', __('information', 'cyn-dm'), function () {
        global $post, $meta;
        ?>
        <table>


            <?php
            foreach ($meta as $meta_item):
                if (get_post_meta($post->ID, $meta_item['name'], true)):
                    ?>
                    <tr>
                        <td colspan="6"><?= $meta_item['label'] ?></td>
                        <td colspan="6"><?= get_post_meta($post->ID, $meta_item['name'], true) ?></td>
                    </tr>

                    <?php
                endif;
            endforeach;
            ?>


        </table>
        <?php

    }, 'form', 'advanced', 'high');
}

function cyn_form_table_head($columns)
{
    $columns['email'] = __('email', 'cyn-dm');
    return $columns;
}

function cyn_form_table_column($column_name, $post_id)
{
    if ($column_name == 'email') {
        echo get_post_meta($post_id, 'email', true);
    }
}







 
add_action('add_meta_boxes', 'cyn_form_meta_file');

// add_filter('manage_form_posts_columns', 'cyn_form_table_head');
// add_action('manage_form_posts_custom_column', 'cyn_form_table_column', 10, 2);

$meta = [

    [
        'name' => 'file-upload',
        'label' => __('file', 'cyn-dm'),
    ],


];

function cyn_form_meta_file()
{
    add_meta_box('information', __('عکس ارسالی', 'cyn-dm'), function () {
        global $post, $meta;
        ?>
        <table>


            <?php
            foreach ($meta as $meta_item):
                if (get_post_meta($post->ID, $meta_item['name'], true)):
                    ?>
                    <tr>
                         <td colspan="6"><img src="<?= get_post_meta($post->ID, $meta_item['name'], true) ?>" class="w-100"/></td>
                    </tr>

                    <?php
                endif;
            endforeach;
            ?>


        </table>
        <?php

    }, 'customize_form', 'advanced', 'high');
}

// function cyn_form_table_head($columns)
// {
//     $columns['email'] = __('email', 'cyn-dm');
//     return $columns;
// }

// function cyn_form_table_column($column_name, $post_id)
// {
//     if ($column_name == 'email') {
//         echo get_post_meta($post_id, 'email', true);
//     }
// }