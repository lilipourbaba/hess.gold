<?php
/* The Template for displaying product archives, including the main shop page which is a post type archive * 
This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php. * * HOWEVER, on occasion
WooCommerce will need to update template files and you * (the theme developer) will need to copy the new files to
your theme to * maintain compatibility. We try to do this as little as possible, but it does * happen. When this
occurs the version of the template file will be bumped and * the readme will list any important changes. * * @see
https://woocommerce.com/document/template-structure/ * @package WooCommerce\Templates * @version 8.6.0 */
defined('ABSPATH') || exit;
get_header('');
$product_card_title =
	get_field('first_product_card');
$product_card =
	get_field('first_product_card_select')
	?>


<div class="container ">

	<div class="d-flex f-lg-column gap-12 ai-start jc-center container m-bs-24 m-be-120">

		<?php
		/**
		 * Hook: woocommerce_sidebar.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		?>
		<div class="d-none d-lg-flex filter-tab">
			<h3 class="m-be-16">دسته بندی ها</h3>
		</div>
		<?php
		get_template_part('/woocommerce/archive', 'product-sidebar', []);
		echo '<div class="archive-product-main">';
		?>
		<div class="filtered_box d-flex gap-4 ai-center m-be-20">

		</div>

		<?php
		/**
		 * Hook: woocommerce_shop_loop_header.
		 *
		 * @since 8.6.0
		 *
		 * @hooked woocommerce_product_taxonomy_archive_header - 10
		 */

		if (woocommerce_product_loop()) {

			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			// do_action('woocommerce_before_shop_loop');
		
			woocommerce_product_loop_start();

			if (wc_get_loop_prop('total')) {
				while (have_posts()) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action('woocommerce_shop_loop');

					wc_get_template_part('content', 'product');
					// get_template_part('./partials/cards/product', "",['query' => $product_card, 'title' => $product_card_title]);
		
				}
			}

			woocommerce_product_loop_end();

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */


			do_action('woocommerce_after_shop_loop');
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action('woocommerce_no_products_found');
		}

		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');

		get_template_part('/woocommerce', '/pagination');

		?>
	</div>
	
	    <div class="content">
        <?php echo term_description()?>
    </div>
</div>
</div>
<?php
get_footer('');
