<?php
/**
* @package BentbreedPlugin
*/
namespace inc\pages;

use \inc\api\settingsApi;
use \inc\base\baseController;
use \inc\api\callbacks\adminCallbacks;

class admin extends baseController
{
  public $settings;
  public $callbacks;
  public $pages = array();
  public $subpages = array();


  public function register()
  {
    $this->settings = new settingsApi();
    $this->callbacks = new adminCallbacks();

    $this->adminPages();
    $this->adminSubPages();

    $this->setSettings();
    $this->setSections();
    $this->setFields();

    $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    //add_action( 'admin_menu', array($this,'add_admin_pages' ) );
  }

  public function adminPages()
  {
      $this->pages = [
        [
        'page_title' => 'Bentbreed plugin',
        'menu_title' => 'Bentbreed',
        'capability' => 'manage_options',
        'menu_slug' => 'bentbreed_plugin',
        'callback' => array($this->callbacks, 'adminDashboard'),
        'icon_url' => 'dashicons-store',
        'position' => 110
      ]
    ];
  }

  public function adminSubPages()
  {
    $this->subpages = [
      [
      'parent_slug' => 'bentbreed_plugin',
      'page_title' => 'Custom Post Types',
      'menu_title' => 'CPT',
      'capability' => 'manage_options',
      'menu_slug' => 'Bentbreed_cpt',
      'callback' => array($this->callbacks, 'adminCptSubPage')
      ],
      [
      'parent_slug' => 'bentbreed_plugin',
      'page_title' => 'Custom Taxonomies',
      'menu_title' => 'Taxonomies',
      'capability' => 'manage_options',
      'menu_slug' => 'Bentbreed_Taxonomies',
      'callback' => array($this->callbacks, 'adminTaxonomiesSubPage')
      ],
      [
      'parent_slug' => 'bentbreed_plugin',
      'page_title' => 'Custom Widget',
      'menu_title' => 'Widget',
      'capability' => 'manage_options',
      'menu_slug' => 'Bentbreed_Widget',
      'callback' => array($this->callbacks, 'adminWidgetSubPage')
      ]

    ];
  }

  public function setSettings()
  {
    $args = array(
      array(
        'option_group'=>'bentbreed_option_group',
        'option_name'=>'text_example',
        'callback'=>array($this->callbacks, 'bentbreedOptionGroup')
      ),
      array(
        'option_group'=>'bentbreed_option_group',
        'option_name'=>'first_name'
      )
    );

    $this->settings->setSettings( $args );
  }

  public function setSections()
  {
    $args = array(
      array(
        'id'=>'bentbreed_admin_index',
        'title'=>'settings',
        'callback'=>array($this->callbacks, 'bentbreedAdminSection'),
        'page'=>'bentbreed_plugin'
      )
    );

    $this->settings->setSections( $args );
  }

  public function setFields()
  {
    $args = array(
      array(
        'id'=>'text_example',
        'title'=>'Text Example',
        'callback'=>array($this->callbacks, 'bentbreedTextExample'),
        'page'=>'bentbreed_plugin',
        'section'=>'bentbreed_admin_index',
        'args'=>array(
          'label_for'=>'text_example',
          'class'=>'example-class'
        )
      ),
        array(
          'id'=>'first_name',
          'title'=>'First Name',
          'callback'=>array($this->callbacks, 'bentbreedFirstName'),
          'page'=>'bentbreed_plugin',
          'section'=>'bentbreed_admin_index',
          'args'=>array(
            'label_for'=>'first_name',
            'class'=>'example-class'
          )
      )
    );

    $this->settings->setFields( $args );
  }

  // public function add_admin_pages()
  // {
  //   add_menu_page('Bentbreed plugin', 'Bentbreed', 'manage_options', 'bentbreed_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
  // }
  //
  // public function admin_index()
  // {
  //   require_once $this->plugin_path . 'templates/admin.php';
  // }
}