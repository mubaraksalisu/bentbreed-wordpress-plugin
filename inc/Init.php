<?php
/**
* @package BentbreedPlugin
*/
namespace inc;

final class Init {

  public static function get_services(){

    return array( pages\admin::class, base\enqueue::class, base\settingsLink::class );
  }

  public static function register_services(){
    foreach (self::get_services() as $class) {
      $service = self::instantiate($class);

      if(method_exists($service, 'register') ){
        $service->register();
      }
    }
  }

  private static function instantiate( $class ){
    $service = new $class();

    return $service;
  }
}

/*use inc\base\Activate;
use inc\base\Dactivate;
use inc\pages\admin;

if(!class_exists('BentBreed')){

  class BentBreed
  {
    public $plugin_name;

    function __construct(){
      add_action( 'init',array( $this,'custom_post_type' ) );
      $this->plugin_name = plugin_basename(__FILE__);

    }

    function register(){

      add_action('admin_enqueue_scripts', array($this, 'enqueue'));
      add_action( 'admin_menu', array($this,'add_admin_pages' ) );

      add_filter("plugin_action_links_$this->plugin_name", array($this, 'setting_link'));
    }

    public function setting_link($link){
      $setting_link = '<a href="admin.php?page=bentbreed_plugin">Settings</a>';
      array_push($link, $setting_link);
      return $link;
    }

    public function add_admin_pages(){
      add_menu_page('Bentbreed plugin', 'Bentbreed', 'manage_options', 'bentbreed_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
    }

    public function admin_index(){
      require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
    }

    function activate(){
      Activate::active();
    }

    function custom_post_type(){
      register_post_type('book',['public'=>true,'label'=>'Books']);
    }

    function enqueue(){
      //All script enqueue
      wp_enqueue_style('mypluginstyle', plugins_url('/asset/my_style.css', __FILE__) );
      wp_enqueue_script('mypluginscript', plugins_url('/asset/my_script.js', __FILE__) );
    }
  }



    $bentBreed = new BentBreed();
    $bentBreed->register();

  //Activation

  register_activation_hook(__FILE__,array('BentBreedPluginActivate','activate'));

  //Deactivation
  //require_once plugin_dir_path(__FILE__) . 'inc/bentbreed_plugin_deactivate.php';
  register_deactivation_hook(__FILE__,array('Deactivate','deactivate'));
}*/