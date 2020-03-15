<?php
/**
* @package BentbreedPlugin
*/
namespace inc\base;
use \inc\base\baseController;

class enqueue extends baseController
{
  public function register(){
    add_action('admin_enqueue_scripts', array($this, 'enqueue'));
  }

  function enqueue(){
    //All script enqueue
    wp_enqueue_style('mypluginstyle', $this->plugin_url . 'asset/mystyle.css' );
    wp_enqueue_script('mypluginscript', $this->plugin_url . 'asset/myscript.js', array('jquery'), NULL, true );
  }
}