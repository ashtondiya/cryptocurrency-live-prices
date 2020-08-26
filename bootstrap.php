<?php
/**
 * Plugin Name:  Crypto Currency Live Prices
 * Description:  Executium api manager for websockets integration
 * Version:      Beta
 * Author:
 * Author URI:
 * PHP Version:  7.1
 *
 * @category Symbols
 * @package  cryptocurrency-live-prices
 * @author
 * @license  GPLv2 http://www.gnu.org/licenses/gpl-2.0.txt
 * @link
 */



if ( ! defined( 'ABSPATH' ) ) {
  die( 'Access denied.' );
}

define( 'WPPS_NAME',                 'Crypto Currency Live Prices' );
define( 'CLP_REQUIRED_PHP_VERSION', '7.1' );                          // because of get_called_class()
define( 'CLP_REQUIRED_WP_VERSION',  '3.1' );                          // because of esc_textarea()

/**
 * Checks if the system requirements are met
 *
 * @return bool True if system requirements are met, false if not
 */
function clp_requirements_met() {
  global $wp_version;

  if ( version_compare( PHP_VERSION, CLP_REQUIRED_PHP_VERSION, '<' ) ) {
    return false;
  }

  if ( version_compare( $wp_version, CLP_REQUIRED_WP_VERSION, '<' ) ) {
    return false;
  }

  return true;
}

/**
 * Prints an error that the system requirements weren't met.
 */
function clp_requirements_error() {
  global $wp_version;

  require_once( __DIR__ . '/views/requirements-error.php' );
}

function clp_view_helper($view, $params = array(), $path = null) {
  include_once( dirname( __DIR__ ) . "/cryptocurrency-live-prices/views/{$view}.php" );
}

/*
 *
 * Check requirements and load main class
 *
 * The main program needs to be in a separate file that only gets loaded if the plugin requirements are met.
 * Otherwise older PHP installations could crash when trying to parse it.
 *
 */
if ( clp_requirements_met() ) {
  include_once ('controllers/admin.php');

	updateDatabase();

  add_action( 'wp_enqueue_scripts', 'clp_scripts_basic' );
  include_once ('controllers/front.php');

} else {
  add_action( 'admin_notices', 'clp_requirements_error' );
}


function updateDatabase()
{
	global $wpdb;

	$origin = $wpdb->prefix . 'clp_origin';
	$symbols = $wpdb->prefix . 'clp_symbols';

	$charset_collate = $wpdb->get_charset_collate();
	$origin_table = "CREATE TABLE IF NOT EXISTS $origin (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
		origin_slug varchar(100) NOT NULL,
		origin_name varchar(100) NOT NULL,
		origin_active TINYINT(1) DEFAULT 1,
		origin_default TINYINT(1) DEFAULT 0,
        created_at datetime NOT NULL,
        UNIQUE (id)
        ) $charset_collate;";

	include_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta($origin_table);

	$symbols_table = "CREATE TABLE IF NOT EXISTS $symbols (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
        origin_id int(11) NOT NULL,
        symbol_slug varchar(100) NOT NULL,
        UNIQUE (origin_id, symbol_slug)
        ) $charset_collate;";

	dbDelta($symbols_table);
}

function clp_scripts_basic()
{
  // Register the script like this for a plugin:
  wp_register_script( 'custom-script', plugins_url( '/assets/js/bootstrap.js', __FILE__ ) , array( 'jquery' ));
  wp_register_script( 'numeral', plugins_url( '/assets/js/numeral.js', __FILE__ ) , array( 'jquery' ));
  wp_register_script( 'popper', plugins_url( '/assets/js/popper.js', __FILE__ ) , array( 'jquery' ));
  wp_register_script( 'socket', plugins_url( '/assets/js/socket.io.js', __FILE__ ) , array( 'jquery' ));
  wp_register_script( 'app', plugins_url( '/assets/js/app.js', __FILE__ ) , array( 'jquery' ));
  // or
  // Register the script like this for a theme:
  wp_register_script( 'custom-script', get_template_directory_uri() . '/assets/js/bootstrap.js' , array( 'jquery' ) );
  wp_register_script( 'numeral', get_template_directory_uri() . '/assets/js/numeral.js' , array( 'jquery' ) );
  wp_register_script( 'popper', get_template_directory_uri() . '/assets/js/popper.js' , array( 'jquery' ) );
  wp_register_script( 'socket', get_template_directory_uri() . '/assets/js/socket.io.js' , array( 'jquery' ) );
  wp_register_script( 'app', get_template_directory_uri() . '/assets/js/app.js' , array( 'jquery' ) );

  // For either a plugin or a theme, you can then enqueue the script:
  wp_enqueue_script( 'custom-script' );
  wp_enqueue_script( 'numeral' );
  wp_enqueue_script( 'popper' );
  wp_enqueue_script( 'socket' );
  wp_enqueue_script( 'app' );
}


function clp_styles_bootstrap()
{
  // Register the style like this for a plugin:
  wp_register_style( 'custom-style', plugins_url( '/assets/css/bootstrap.css', __FILE__ ), array(), '20120208', 'all' );
  // or
  // Register the style like this for a theme:
  wp_register_style( 'custom-style', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '20120208', 'all' );

  // For either a plugin or a theme, you can then enqueue the style:
  wp_enqueue_style( 'custom-style' );
}

add_action( 'wp_enqueue_scripts', 'clp_styles_bootstrap' );


