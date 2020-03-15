<?php
/**
* @package BentbreedPlugin
*/
namespace inc\base;

class Deactivate{

  function deactivate(){
    flush_rewrite_rules();
  }
}