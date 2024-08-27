<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if (!defined('ABSPATH')) {
	exit;
}


/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters('woocommerce_product_tabs', array());

$Gemstone = get_field("tablename_0");
  if($Gemstone) :
 
?>

<section class="m-be-24">
	<p class="fs-h1">سنگ ها </p>
	<div class="d-flex f-wrap gap-8">
		<?php
			$Gemstones = get_field("Gemstone");
 
 		for ($i = 0; $i < 6; $i++):
				$Gem_tablename = get_field("tablename_$i");
				$Gem_name = get_field("name_$i");
				$Gem_numbers = get_field("numbers_$i");
				$Gem_weight = get_field("weight_$i");


				if( get_field("tablename_$i")): ?>
				<table class=" Gemstone-tables m-be-24 gap-12">
					<tbody>
						<tr>
							<th class="fs-h4 p-be-12"><?= isset($Gem_tablename) ? $Gem_tablename : '' ?>
							</th>
						</tr>
						<tr class=" radius-8 | Gemstone">
							<td><span>نام
								</span></td>
							<td><span>تعداد
								</span></td>
							<td> <span>مجموع وزن (قیراط)
								</span></td>
						</tr>
						<tr class=" radius-8 | Gemstone">
						 <td><span><?= $Gem_name ? $Gem_name : '' ?></span></td>
						 <td><span><?= $Gem_numbers ? $Gem_numbers : '' ?></span></td>
						 <td><span><?= $Gem_weight ? $Gem_weight : '' ?></span></td>
						</tr>
					</tbody>
				</table>
			<?php endif; endfor;?>
	</div>
</section>
			<?php endif;?>
