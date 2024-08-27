<?php defined('ABSPATH') || exit; ?>
<?php
$GLOBALS['cyn_min_price_tax_name'] = "cyn_min_price";
$GLOBALS['cyn_max_price_tax_name'] = "cyn_max_price";
$GLOBALS['cyn_weight_tax_name'] = "cyn_weight";
// /****************************** Required Files */
//globals
require_once (__DIR__ . '/inc/cyn-global.php');

// //classes
require_once (__DIR__ . '/inc/classes/cyn-theme-init.php');
require_once (__DIR__ . '/inc/classes/cyn-customize.php');
require_once (__DIR__ . '/inc/classes/cyn-register.php');
require_once (__DIR__ . '/inc/classes/cyn-query.php');
require_once (__DIR__ . '/inc/classes/cyn-api.php');
require_once (__DIR__ . '/inc/classes/cyn-products.php');
require_once (__DIR__ . '/inc/classes/cyn-woocommerce.php');

// //functions
require_once (__DIR__ . '/inc/functions/cyn-general.php');
require_once (__DIR__ . '/inc/functions/cyn-update-checker.php');
require_once (__DIR__ . '/inc/functions/cyn-form.php');
require_once (__DIR__ . '/inc/functions/cyn-metabox.php');

// //acf
include_once (CYN_ACF_PATH . 'acf.php');
require_once (__DIR__ . '/inc/functions/cyn-acf-fields.php');
require_once (__DIR__ . '/inc/functions/cyn-acf.php');

// //instance classes
new cyn_theme_init(false, '0.0.0');
new cyn_register();
new cyn_customize();
new cyn_query();
new cyn_products();
new cyn_api();
