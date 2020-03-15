<?php
/**
* @package BentbreedPlugin
*/
namespace inc\base;
use \inc\base\baseController;

class settingsLink extends baseController
{

  public function register(){
    add_filter("plugin_action_links_$this->plugin", array($this, 'setting_link'));
  }

  public function setting_link($link){
    $setting_link = '<a href="admin.php?page=bentbreed_plugin">Settings</a>';
    array_push($link, $setting_link);
    return $link;
  }
}