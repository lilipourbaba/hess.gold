<?php $render_template = $args['render_template'] ?? true ?>
<?php
$front_page_id = get_option('page_on_front');
$social_1 = get_option('social_1');
$social_2 = get_option('social_2');
$social_3 = get_option('social_3');
$social_logo_1 = get_option('social_logo_1');
$social_logo_2 = get_option('social_logo_2');
$social_logo_3 = get_option('social_logo_3');
$address = get_option('address');
$address_link = get_option('address_link');

$number1 = get_option('phone_number');
$number2 = get_option('phone_number2');
$footer_logo = get_option('logo');
$enemad_link = get_option('enemad_link');
?>
<?php if ($render_template): ?>
	<footer class="bg-primary text-primary-100 d-flex f-column gap-8 f-lg-column jc-between pi-40 p-bs-24 p-be-12">
		<div class="    d-flex gap-8 f-lg-column jc-between ">
			<div class="footer-nav d-md-none box-col-4 gap-64 ">
				<?php wp_nav_menu([
					'theme_location' => 'footer_demo',
				]) ?>
				<?php wp_nav_menu([
					'theme_location' => 'footer_demo2',
				]) ?>
				<ul>
					<li>اطلاعات تماس</li>
					<a href="tel:<?= $number1; ?>">
						<li><?= $number1; ?></li>
					</a>
					<a href="tel:<?= $number2; ?>">
						<li><?= $number2; ?></li>
					</a>
				</ul>
				<ul>
					<li> آدرس</li>
					<li><a href="<?= $address_link; ?>"><?= $address; ?></li> </a>
				</ul>
			</div>
			<div class="d-none d-md-flex f-column p-20">
				<div class="tab p-be-12 ">
					<span class=" w-100 d-flex jc-between"> خدمات مشتریان </span>
					<div class="tab_content">
						<?php wp_nav_menu([
							'theme_location' => 'footer_demo',
							'menu_class' => 'p-bs-12'

						]) ?>
					</div>
				</div>
				<hr>
				<div class="tab p-be-12 ">
					<span class=" w-100 d-flex jc-between">درباره گالری حس
					</span>
					<div class="tab_content">
						<?php wp_nav_menu([
							'theme_location' => 'footer_demo2',
							'menu_class' => 'p-bs-12'
						]) ?>
					</div>
				</div>
				<hr>
				<div class="tab p-be-12">
					<span class=" w-100 d-flex jc-between">اطلاعات تماس
					</span>
					<div class="tab_content">
						<div>
							<ul>
								<a href="tel:<?= $number1; ?>">
									<li><?= $number1; ?></li>
								</a>
								<a href="tel:<?= $number2; ?>">
									<li><?= $number2; ?></li>
								</a>
							</ul>
						</div>
					</div>
				</div>
				<hr>
				<div class="tab p-be-12">
					<span class=" w-100 d-flex jc-between"> آدرس
					</span>
					<div class="tab_content">
						<div>
							<ul>
								<li><a href="<?= $address_link; ?>"><?= $address; ?></li> </a>

							</ul>
						</div>
					</div>
				</div>
				<hr>

			</div>
			<div class="d-flex jc-center pos-absoloute ai-center f-md-column">

				<div class="d-flex gap-16 p-8">
					<!-- <img class=" enemad" src="<?= $footer_logo; ?>" /> -->

					<div class="enemad"><?= $enemad_link ?></div>
				</div>
				<div class="footer_social   w-5 d-flex  f-column f-md-row jc-center  gap-8 m-24">
					<?php
					if ($social_1): ?>

						<a href="<?= $social_1; ?>" class="social-icon">
							<img src="<?= $social_logo_1 ?>" alt="">
						</a>
					<?php endif; ?>
					<?php
					if ($social_2): ?>

						<a href="<?= $social_2; ?>" class="social-icon">
							<img src="<?= $social_logo_2; ?>" alt="">
						</a>
					<?php endif; ?>
					<?php
					if ($social_3): ?>

						<a href="<?= $social_3; ?>" class="social-icon">
							<img src="<?= $social_logo_3; ?>" alt="">
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
<div class=" w-100 d-flex jc-center">
		<a class="cyan" rel="nofollow" href="https://cyandm.com/">
<p class="fs-h6 text-center p-bs-12 text-primary-400"> توسعه و طراحی توسط تیم سایان</p></a>

</div>

	</footer>
<?php endif; ?>
<div class="wp-scripts">
	<?php wp_footer() ?>
</div>
</body>

</html>