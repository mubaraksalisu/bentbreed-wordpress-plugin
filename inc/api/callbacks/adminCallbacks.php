<?php
/**
* @package BentbreedPlugin
*/
namespace inc\api\callbacks;

use inc\base\baseController;

class adminCallbacks extends baseController
{
  public function adminDashboard()
  {
    return require_once("$this->plugin_path/templates/admin.php");
  }

  public function adminCptSubPage()
  {
    return require_once("$this->plugin_path/templates/subpage_cpt.php");
  }

  public function adminTaxonomiesSubPage()
  {
    return require_once("$this->plugin_path/templates/subpage_taxonomies.php");
  }

  public function adminWidgetSubPage()
  {
    return require_once("$this->plugin_path/templates/subpage_widget.php");
  }

  public function bentbreedOptionGroup( $input )
  {
    return $input;
  }

  public function bentbreedAdminSection()
  {
    echo 'Check out this generated section';
  }

  public function bentbreedTextExample()
  {
    $value = esc_attr(get_option('text_example'));
    echo '<input type="text" class="regular-text" name="text_example" value="'. $value .'" placeholder="Write something here!">';
  }

  public function bentbreedFirstName()
  {
    $value = esc_attr(get_option('first_name'));
    echo '<input type="text" class="regular-text" name="first_name" value="'. $value .'" placeholder="First name here!">';
  }
}