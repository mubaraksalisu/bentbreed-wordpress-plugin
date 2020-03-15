<?php
/**
* @package BentbreedPlugin
*/
/*
Plugin Name:  bentbreed-plugin
Plugin URI:   https://developer.wordpress.org/plugins/bentbreed-plugin/
Description:  This is my first attempt to write a plugin using this tutorial.
Version:      1.0.0
Author:       bentbreed
Author URI:   https://bentbreed.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  bentbreed-plugin
*/
// If this file is called firectly, abort!!!
defined('ABSPATH') or die('you cannot access this file');

if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
  require_once dirname(__FILE__) . '/vendor/autoload.php';
}

//Define CONSTANT
// define( 'PLUGIN_PATH',plugin_dir_path(__FILE__) );
// define( 'PLUGIN_URL',plugin_dir_url(__FILE__) );
// define( 'PLUGIN',plugin_basename(__FILE__) );

use inc\base\Activate;
use inc\base\Deactivate;

// The code that run during activation
function activate_bentbreed_plugin(){
  Activate::Activate();
}

// The code that run during deactivation
function deactivate_bentbreed_plugin(){
  Deactivate::Deactivate();
}

register_activation_hook(__FILE__, 'activate_bentbreed_plugin');
register_deactivation_hook(__FILE__, 'deactivate_bentbreed_plugin');

// Initialize all core classes of the plugin.
if(class_exists('inc\\init')){
  inc\Init::register_services();
}