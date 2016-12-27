<?php

/**
 * WordPress External Database Connection
 *
 * @link              http://www.vineetverma.me
 * @since             1.0.0
 * @package           Wp_ext_db
 *
 * @wordpress-plugin
 * Plugin Name:       WP External DB Login
 * Plugin URI:        http://www.wordpressbeast.com/wordpress_external_db_login
 * Description:       Connects to an remote WordPress Database and provide you with a Global $new_wpdb instance of wpdb Class.
 * Version:           1.0.0
 * Author:            Vineet Verma
 * Author URI:        http://www.vineetverma.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp_ext_db
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp_ext_db-activator.php
 */
function activate_wp_ext_db() {
	
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp_ext_db-deactivator.php
 */
function deactivate_wp_ext_db() {
	
}

register_activation_hook( __FILE__, 'activate_wp_ext_db' );
register_deactivation_hook( __FILE__, 'deactivate_wp_ext_db' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp_ext_db.php';

/**
 * Begins execution of the plugin.
 *
 * Creates a new global var $new_wpdb; which is an instance of WPDB Class but with connection to a remote WordPress Database
 * that you want to use in the current wordpress installation.
 *
 * @since    1.0.0
 */
function run_wp_ext_db() {

	// NEW WPDB Object which can be used to query remote WordPress Database
	global $new_wpdb;
	$obj = new Wp_ext_db( 'REMOTE-DATABASE-USER', 'REMOTE-DATABASE-PASSWORD', 'REMOTE-DATABASE-NAME', 'REMOTE-DATABASE-HOST', 'REMOTE-WORDPRESS-TABLE-PREFIX' );
	$new_wpdb = $obj->get_instance();
 
}
run_wp_ext_db();

// Example Usage:
// To Query all posts from remote DB
// 
// global $new_wpdb;
// $results = $new_wpdb->get_results( "SELECT * FROM wp_posts WHERE post_status = 'publish'", OBJECT );

