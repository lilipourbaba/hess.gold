<?php

if (!class_exists('cyn_register')) {
	class cyn_register
	{
		function __construct()
		{

			add_action('init', [$this, 'cyn_register_tax']);
			add_action('init', [$this, 'cyn_post_type_register']);
			add_action('init', [$this, 'cyn_taxonomy_register']);
			add_action('init', [$this, 'cyn_term_register']);
			add_action('init', [$this, 'cyn_page_register']);
			add_action('after_setup_theme', [$this, 'cyn_register_menus']);
		}

		public function cyn_register_menus()
		{

			//for use in theme => wp_nav_menu(['theme_location' => 'header_demo'])
			register_nav_menus([
				'header_demo' => "Menu",
				'mobile_header_demo' => "Mobile Menu",
				'footer_demo' => "Footer  column1",
				'footer_demo2' => "Footer column 2",
			]);
		}

		public function cyn_post_type_register()
		{
			$this->cyn_make_post_type('form', ' فرم تماس با ما ', 'فرم های تماس', 'dashicons-email', ['title', 'thumbnail', 'editor']);
			$this->cyn_make_post_type('customize_form', 'سفارشی سازی', ' سفارشات', 'dashicons-email', ['title']);

		}

		public function cyn_taxonomy_register()
		{

			// $this->cyn_make_taxonomy( 'demo_taxonomy', 'demo', 'demos' , ['demo_post_type'] )
		}

		public function cyn_term_register()
		{
			//This terms can't be removed
			wp_insert_term('تماس با ما', 'Category_Form', ['slug' => 'contact-us']);


		}

		public function cyn_page_register()
		{
			//This pages can't be removed

			if (is_null(get_page_by_path('sample'))) {
				wp_insert_post([
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_title' => 'Sample',
					'post_name' => 'sample',
					'page_template' => 'templates/sample.php'
				]);
			}

		}

		public function cyn_register_tax()
		{
			// -> init cyn_colors taxonomy
			// $cyn_weight_tax_name = $GLOBALS['cyn_weight_tax_name'];
			// $args = array(
			// 	'labels' => array(
			// 		'name' => "وزن طلا",
			// 		'menu_name' => "وزن طلا",
			// 		'all_items' => "همه وزن ها",
			// 		'add_new_item' => "افزودن وزن جدید",
			// 	),
			// 	'hierarchical' => true,
			// 	'public' => true,
			// 	'show_ui' => true,
			// 	'show_admin_column' => true,
			// 	'show_in_nav_menus' => true,
			// 	'show_tagcloud' => true,
			// );
			// register_taxonomy($cyn_weight_tax_name, array('product'), $args);
			// // insert cyn_colors terms
			// $this->cyn_insert_terms(array(), $cyn_weight_tax_name);

			// -> init cyn_min_price taxonomy
			// $cyn_min_price_tax_name = $GLOBALS['cyn_min_price_tax_name'];
			// $args = array(
			// 	'labels' => array(
			// 		'name' => " مینیمم قیمت",
			// 		'menu_name' => " مینیمم قیمت",
			// 		'all_items' => "همه  قیمت  ها",
			// 		'add_new_item' => "افزودن قیمت  جدید",
			// 	),
			// 	'hierarchical' => true,
			// 	'public' => true,
			// 	'show_ui' => true,
			// 	'show_admin_column' => true,
			// 	'show_in_nav_menus' => true,
			// 	'show_tagcloud' => true,
			// );
			// register_taxonomy($cyn_min_price_tax_name, array('product'), $args);
			// // insert cyn_ages terms
			// $this->cyn_insert_terms(array(), $cyn_min_price_tax_name);




			// // -> init cyn_max_price taxonomy
			// $cyn_max_price_tax_name = $GLOBALS['cyn_max_price_tax_name'];
			// $args = array(
			// 	'labels' => array(
			// 		'name' => " ماکزیمم قیمت",
			// 		'menu_name' => " ماکزیمم قیمت",
			// 		'all_items' => "همه  قیمت  ها",
			// 		'add_new_item' => "افزودن قیمت  جدید",
			// 	),
			// 	'hierarchical' => true,
			// 	'public' => true,
			// 	'show_ui' => true,
			// 	'show_admin_column' => true,
			// 	'show_in_nav_menus' => true,
			// 	'show_tagcloud' => true,
			// );
			// register_taxonomy($cyn_max_price_tax_name, array('product'), $args);
			// // insert cyn_ages terms
			// $this->cyn_insert_terms(array(), $cyn_max_price_tax_name);
		}
		private function cyn_insert_terms($new_tags, $taxonomy_name)
		{
			if (count($new_tags) < 1)
				return;

			foreach ($new_tags as $tag => $name) {
				$term_exist = get_term_by('slug', $tag, $taxonomy_name);
				if ($term_exist == false)
					wp_insert_term(
						$name,
						$taxonomy_name,
						array(
							'slug' => $tag
						)
					);
			}
		}

		/**
		 * Summary of cyn_make_post_type
		 * @param string $slug from Globals that defined in cyn-global.php
		 * @param string $singular_name 
		 * @param string $plural_name
		 * @param string $icon
		 * @param string[] $supports 
		 * @return void
		 */
		private function cyn_make_post_type($slug, $singular_name, $plural_name, $icon, $supports = ['title', 'thumbnail'])
		{
			$labels = [
				'name' => $singular_name,
				'singular_name' => $singular_name,
				'menu_name' => $plural_name,
				'name_admin_bar' => $singular_name,
				'add_new' => 'افزودن ' . $singular_name,
				'add_new_item' => 'افزودن ' . $singular_name . ' جدید',
				'new_item' => $singular_name . ' جدید',
				'edit_item' => 'ویرایش ' . $singular_name,
				'view_item' => 'دیدن ' . $singular_name,
				'all_items' => 'همه ' . $plural_name,
				'search_items' => 'جستجو ' . $singular_name,
				'not_found' => $singular_name . '‌ای پیدا نشد',
				'not_found_in_trash' => $singular_name . ' پیدا نشد'
			];

			$args = [
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => ['slug' => $slug],
				'exclude_from_search' => false,
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => null,
				'menu_icon' => $icon,
				'supports' => $supports,

			];

			register_post_type($slug, $args);
		}

		/**
		 * Summary of cyn_make_taxonomy
		 * @param string $slug from Globals that defined in cyn-global.php
		 * @param string $singular_name
		 * @param string $plural_name
		 * @param string[] $post_types 
		 * @param boolean $is_hierarchical
		 * @return void
		 */
		function cyn_make_taxonomy($slug, $singular_name, $plural_name, $post_types, $is_hierarchical = true)
		{

			$args = [
				'labels' => [
					'name' => $plural_name,
					'menu_name' => $plural_name,
					'all_items' => 'همه ' . $plural_name,
					'add_new_item' => 'افزودن ' . $singular_name . 'جدید ',
				],
				'hierarchical' => $is_hierarchical,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
				'query_var' => true,
				'rewrite' => ['slug' => $slug],
			];

			register_taxonomy($slug, $post_types, $args);
		}
	}
}