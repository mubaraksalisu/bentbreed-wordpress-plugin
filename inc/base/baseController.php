<?php
/**
* @package BentbreedPlugin
*/
namespace inc\base;
/**
 *
 */
class baseController
{
  public $plugin_path;
  public $plugin_url;
  public $plugin;

  public function __construct(){
    $this->plugin_path = plugin_dir_path( dirname(__file__, 2) );
    $this->plugin_url = plugin_dir_url( dirname(__file__, 2) );
    $this->plugin = plugin_basename( dirname(__file__, 3) ) . '/bentbreed-plugin.php';
  }
}