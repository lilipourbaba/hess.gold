<?php
add_action('acf/include_fields', 'cyn_register_acf');

function cyn_register_acf()
{
	if (!function_exists('acf_add_local_field_group')) {
		return;
	}
	cyn_register_acf_homepage_settings();
	cyn_register_acf_homepage_FAQ();
	cyn_register_acf_single_product_cards();
	cyn_register_acf_about_us();
	cyn_register_acf_contact_us();
	cyn_register_guide_page();
	cyn_register_size_guide();
	cyn_register_single_product();
}

// function cyn_register_acf_company_settings() {
// 	$fields = [ 
// 		cyn_acf_add_number( 'established_year', 'Established Year' ),
// 		cyn_acf_add_text( 'country', 'country' ),
// 		cyn_acf_add_text( 'location', 'location' ),
// 		cyn_acf_add_text( 'phone', 'phone' ),
// 		cyn_acf_add_image( 'flag', 'Flag' ),
// 		cyn_acf_add_image( 'logo', 'Logo' ),
// 		cyn_acf_add_options( 'verified_type', 'Verified Type', [ 'star-supplier', 'supplier' ] ),
// 		cyn_acf_add_url( 'website', 'website' ),
// 		cyn_acf_add_color( 'color', 'Color' ),

// 	];
// 	$location = [ 
// 		[ 
// 			[ 
// 				'param' => 'post_type',
// 				'operator' => '==',
// 				'value' => 'post',
// 			],
// 		],
// 	];

// 	cyn_register_acf_group( 'Company Settings', $fields, $location );
// }
// function cyn_register_acf_product_category()
// {
// 	$fields = [
// 		cyn_acf_add_image('custom-thumbnail', 'تصویر شاخص')

// 	];
// 	$location = [
// 		[
// 			[
// 				'param' => 'taxonomy',
// 				'operator' => '==',
// 				'value' => 'product_cat',
// 			],
// 		],
// 	];
// 	cyn_register_acf_group('دسته بندی', $fields, $location);
// }


function cyn_register_acf_homepage_settings()
{
	$fields = [
		cyn_acf_add_tab(' بنر ها'),
		cyn_acf_add_image('home_hero', 'بنر'),
		cyn_acf_add_image('home_hero_mobile', ' بنر موبایل'),
		cyn_acf_add_image('home_poster', 'پوستر'),

		cyn_acf_add_image('home_poster_mb', 'پوستر موبایل'),
		cyn_acf_add_url('poster_customize', 'لینک سفارش سازی پوستر ', '', '30'),
		cyn_acf_add_tab(' مینیمال ها '),
		cyn_acf_add_image('minimal_img_1', 'مینیمال اول '),
		cyn_acf_add_text('minimal_title_1', 'تیتر مینیمال اول ', '', '30'),
		cyn_acf_add_text('minimal_text_1', 'متن مینیمال اول '),
		cyn_acf_add_url('minimal_link_1', 'لینک مینیمال اول '),
		cyn_acf_add_image('minimal_img_2', 'مینیمال دوم '),
		cyn_acf_add_text('minimal_title_2', 'تیتر مینیمال دوم ', '', '30'),
		cyn_acf_add_text('minimal_text_2', 'متن مینیمال دوم '),
		cyn_acf_add_url('minimal_link_2', 'لینک مینیمال دوم '),
		cyn_acf_add_tab('  کارت محصولات '),
		cyn_acf_add_text('first_product_card', 'تیتر اولین کارت محصولات', '', '30'),
		cyn_acf_add_post_object('first_product_card_select', 'انتخاب محصولات اولین کارت ', 'product', '', '1'),
		cyn_acf_add_text('second_product_card', 'تیتر دومین کارت محصولات', '', '30'),
		cyn_acf_add_post_object('second_product_card_select', 'انتخاب محصولات دومین کارت ', 'product', '', '1'),
		cyn_acf_add_text('third_product_card', 'تیتر سومین کارت محصولات', '', '30'),
		cyn_acf_add_post_object('third_product_card_select', 'انتخاب محصولات سومین کارت ', 'product', '', '1'),
		cyn_acf_add_text('fourth_product_card', 'تیتر چهارمین کارت محصولات', '', '30'),
		cyn_acf_add_post_object('fourth_product_card_select', 'انتخاب محصولات چهارمین کارت ', 'product', '', '1'),
		cyn_acf_add_text('fifth_product_card', 'تیتر پنجمین کارت محصولات', '', '30'),
		cyn_acf_add_post_object('fifth_product_card_select', 'انتخاب محصولات پنجمین کارت ', 'product', '', '1'),
		cyn_acf_add_tab(' سوالات متداول '),
		cyn_acf_add_tab(' ویژگی ها '),
	];
	$array = [];
	for ($i = 1; $i < 15; $i++) {
		array_push(
			$array,
			cyn_acf_add_text("attr_$i", 'ویژگی ', '', '30'),


		);
	}
	$fields = array_merge($fields, $array);

	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/homepage.php',
			],
		],
	];
	cyn_register_acf_group('تنظیمات صفحه اصلی', $fields, $location);
}
function cyn_register_acf_homepage_FAQ()
{
	$fields = [

		cyn_acf_add_tab(' سوالات متداول '),
	];
	$FAQ = [];
	for ($i = 0; $i < 6; $i++) {
		array_push(
			$FAQ,
			cyn_acf_add_group("FAQ_$i", ' ', [
				cyn_acf_add_text("FAQ_ask", '  سوال', '', '30'),
				cyn_acf_add_text("FAQ_answer", ' پاسخ', '', '30'),
				cyn_acf_add_text("FAQ_link", ' لینک', '', '30'),
				cyn_acf_add_text("FAQ_text", ' متن دکمه', '', '30'),

			]),
		);
	}
	$fields = array_merge($fields, $FAQ);

	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/homepage.php',
			],
		],
	];
	cyn_register_acf_group('سوالات  متداول', $fields, $location);
}


function cyn_register_acf_about_us()
{
	$fields = [
		cyn_acf_add_tab('بنر صفحه  '),
		cyn_acf_add_image('about_hero', 'بنر صفحه درباره ما '),
		cyn_acf_add_text('about_title', 'تیتر صفحه درباره ما '),
		cyn_acf_add_tab('گالری صفحه درباره ما  '),
		cyn_acf_add_image('gallery_pic1', 'عکس گالری اول'),
		cyn_acf_add_image('gallery_pic2', 'عکس گالری دوم'),
		cyn_acf_add_image('gallery_pic3', 'عکس گالری سوم'),
		cyn_acf_add_image('gallery_pic4', 'عکس گالری چهار'),
		cyn_acf_add_image('gallery_pic5', 'عکس گالری پنج'),
		cyn_acf_add_image('gallery_pic6', 'عکس گالری شش'),
	];
	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/about-us.php',
			],
		],
	];
	cyn_register_acf_group('  اطلاعات صفحه درباره ما', $fields, $location);
}
function cyn_register_acf_single_product_cards()
{
	$fields = [
		cyn_acf_add_text('single_product_parts', 'تیتر کارت محصولات'),
		cyn_acf_add_post_object('single_product_part_select', 'انتخاب محصولات کارت ', 'product', '', '1'),
	];
	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/single/product.php',
			],
		],
	];
	cyn_register_acf_group(' انتخاب اجزا', $fields, $location);
}
function cyn_register_acf_contact_us()
{

	$fields = [
		cyn_acf_add_text('contact_us_form_title', 'تیتر فرم تماس با ما '),
		cyn_acf_add_google_map('contact_us_map', '  آدرس گوگل مپ'),


	];
	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/contact-us.php',
			],
		],
	];
	cyn_register_acf_group('   صفحه تماس با ما', $fields, $location);
}

function cyn_register_guide_page()
{
	$fields = [
		cyn_acf_add_tab('تیتر صفحه  '),
		cyn_acf_add_text('guide_page_title', 'تیتر صفحه راهنما ', '1', '20'),
		cyn_acf_add_text('guide_page_subtitle', 'بالای تیتر صفحه راهنما ', '', '20'),
		cyn_acf_add_tab(' سکشن اول '),
		cyn_acf_add_text('guide_first_section_title', 'تیتر اول ', '', ' 20'),
		cyn_acf_add_text('guide_first_section_text', 'متن بخش اول '),
		cyn_acf_add_text('guide_second_section_title', 'تیتر دوم ', '', ' 20'),
		cyn_acf_add_text('guide_second_section_text', 'متن بخش دوم '),
		cyn_acf_add_tab(' پوستر'),
		cyn_acf_add_image('guide_poster', 'پوستر'),
		cyn_acf_add_tab(' سکشن دوم '),
		cyn_acf_add_text('guide_third_section_title', 'تیتر بخش اول ', '', ' 20'),
		cyn_acf_add_text('guide_third_section_text', 'متن بخش اول '),
		cyn_acf_add_text('guide_third_section_text_2', 'متن بخش اول - قسمت دوم '),
		cyn_acf_add_text('guide_fourth_section_title', 'تیتر بخش دوم ', '', ' 20'),
		cyn_acf_add_text('guide_fourth_section_subtitle', 'پایین تیتر بخش دوم ', '', '20'),
		cyn_acf_add_text('guide_fourth_section_text', 'متن بخش دوم '),
		cyn_acf_add_tab(' پوستر'),
		cyn_acf_add_image('second_guide_poster', 'پوستر'),
		cyn_acf_add_text('second_guide_poster_subtitle', 'کپشن ', '', '30'),
	];

	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/guide.php',
			],
		],
	];
	cyn_register_acf_group('تنظیمات صفحه راهنما', $fields, $location);
}

function cyn_register_size_guide()
{
	$fields = [
		cyn_acf_add_tab(' تیتر جداول'),

		cyn_acf_add_text("measure_table_title", 'تیتر ستون اول   ', '', ' 50'),
		cyn_acf_add_text('size_table_title', 'تیتر ستون دوم   ', '', ' 50'),
		cyn_acf_add_text("measure_table_title2", 'تیتر ستون اول   ', '', '50'),
		cyn_acf_add_text('size_table_title2', 'تیتر ستون دوم   ', '', ' 50'),
		cyn_acf_add_text("measure_table_title3", 'تیتر ستون سوم   ', '', '50'),
		cyn_acf_add_text('size_table_title3', 'تیتر ستون سوم   ', '', ' 50'),
	];
	$arr = [];
	for ($i = 0; $i < 14; $i++) {
		array_push(
			$arr,
			cyn_acf_add_group("size_guide_table_$i", ' ', [
				cyn_acf_add_text("measure_$i", 'اندازه به میلیمتر', '', '30'),
				cyn_acf_add_text("measure_cm_$i", 'اندازه به سانتیمتر', '', '30'),
				cyn_acf_add_number("size_$i", 'سایز', '', '30'),

			]),
		);
	}
	$fields = array_merge($fields, $arr);
	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/guide.php',
			],
		],
	];
	cyn_register_acf_group('   راهنمای انتخاب سایز ', $fields, $location);
}




function cyn_register_single_product()
{

	$fields = [
		// cyn_acf_add_tab(' وزن محصول '),

		// cyn_acf_add_text('product_weight', 'وزن محصول', '', '50'),

		cyn_acf_add_tab(' محصولات '),
		cyn_acf_add_text('product_details_title', 'تیتر', '', '50'),
		cyn_acf_add_post_object('product_details', 'انتخاب محصولات  ', 'product', '50', '50'),
		cyn_acf_add_tab(' محصولات مرتبط '),
		cyn_acf_add_text('product_related_title', 'تیتر ', '', '50'),
		cyn_acf_add_post_object('product_related', 'انتخاب محصولات  ', 'product', '50', '50'),
		// cyn_acf_add_tab(' سنگ ها '),

	];
	// $array = [];
	// for ($i = 0; $i < 6; $i++) {
	// 	array_push(
	// 		$array,
	// 		cyn_acf_add_text("tablename_$i", 'دسته بندی سنگ ها', '', '30'),
	// 		cyn_acf_add_text("name_$i", 'نام', '', '30'),
	// 		cyn_acf_add_number("numbers_$i", 'تعداد', '', '20'),
	// 		cyn_acf_add_number("weight_$i", 'مجموع وزن(قیراط)', '', '20'),
	// 	);
	// }
	// $fields = array_merge($fields, $array);
	$location = [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'product',
			],
		],
	];
	cyn_register_acf_group(' تنظیمات محصول', $fields, $location);
}
