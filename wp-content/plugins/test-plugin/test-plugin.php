<?php
/**
 * Plugin Name:       Test Plugin
 * Plugin URI:        http://api.wordpress.local/plugins/test-plugin/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Xency
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       test-plugin
 * Domain Path:       /languages
 **/

//security to not let users outside the wordpress to see this file
defined ('ABSPATH') or die("Hey, you can't access this file. You silly human.");

//security to not let user see this file is theme is 
if ( ! function_exists(('add_action')) ) {
	echo "Hey, you can't access this file, you silly human!";
	exit;
}


class samplePlugin {

	//auto run the method once the class is instantiated and called.
	function __construct() {

		add_action('init', array($this, 'custom_post_type'));

	}
	/*enqueue the style once the plugin is activated*/
	function register() {
		//add style sa admin cms
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
		//add style sa frontend 
		/*add_action('wp_enqueue_scripts', array($this, enqueue));*/
	}

	function activate() {

		//generate a custom post type
		$this->custom_post_type();
		
		//flush the rewrite rules
		flush_rewrite_rules();
	
	}

	function deactivate() {
		//flush the rewrite rules

	}

	function uninstall() {
		//Delete custom post type
		//Delete all the plugin data from the db

	}

	function custom_post_type() {
		register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
	}

	// enqueue styles and script for my plugin
	function enqueue() {
		wp_enqueue_style('pluginstyle', plugins_url('/assets/style.css'), __FILE__);
		wp_enqueue_scripts('pluginscript', plugins_url('/assets/script.js'), __FILE__);
	}

}

if (class_exists('samplePlugin')) {
	$testPlugin = new samplePlugin();
	$testPlugin->register();
}

// wordpress plugin 3 default actions

//activation
register_activation_hook(__FILE__, array($testPlugin, 'activate'));

//deactivation
register_deactivation_hook(__FILE__, array($testPlugin, 'deactivate'));	

//uninstall
