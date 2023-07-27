<?php 
/*
     *@package sonuplugin
*/
namespace Inc\Base;

 class baseController{
  
    public $plugin_path;
    public $plugin_url;
    public $plugin_base;
    public $managers = array();

    public function __construct(){
        $this->plugin_path = plugin_dir_path(dirname(__FILE__,2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__,2));
        $this->plugin_base = plugin_basename(dirname(__FILE__,3));


        $this->managers = array(
            'cpt_manager' => 'Activate Manager',
            'media_widget' => 'Activate Media Widget',
            'gallery_manager' => 'Activate Gallery Manager',
            'template_manager' => 'Activate Template Manager',
            'login_manager' => 'Activate Login Manager',
            'chat_manager'=> 'Activate Chat Manager'
        );

    }
 }