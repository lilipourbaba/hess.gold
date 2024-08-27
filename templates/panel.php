<?php 
 /*Template Name: panel */
defined( 'ABSPATH' ) || exit;
 get_header();


?>
<main>
	<?php if (!is_user_logged_in()) : ?>

	<h2 class="bg-primary-300 d-flex gap-16"> <i class="iconsax close-pop" icon-name="x"></i>ورود به گالری حس</h2>
		<section class="container">
			<?php the_content() ?>
		</section>


		<?php endif;
		 if (is_user_logged_in()):
		?>
		<div class="p-16">
    <?php if (function_exists('rank_math_the_breadcrumbs')) {
				rank_math_the_breadcrumbs();
			}
			?>
		</div>
		<section class="container mb-36">
			
		<?php the_content() ?>
	</section>

				<?php endif;  ?>

</main>
<?php get_footer() ?>