<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.7.0
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
<?php
$categories = get_terms([
	'taxonomy' => 'product_cat',
	'hide_empty' => false,
	'number' => 7
]);

?>




<div class="d-grid category gap-8 d-md-flex f-wrap">
    <?php foreach ($categories as $cat) {
		$thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
		$image_url = wp_get_attachment_url($thumbnail_id) !== false ? wp_get_attachment_url($thumbnail_id) : get_stylesheet_directory_uri() . '/assets/img/404.png';
		?>
    <div class=" d-flex cat ai-end" style="background-image:url('<?= $image_url ?>')">
        <p class="full-width bg-primary-200 p-12 d-flex jc-between">
            <span><?= $cat->name; ?></span>
            <a href="<?= get_term_link($cat->term_id) ?>">مشاهده همه </a>
        </p>
    </div>
    <?php } ?>

</div>