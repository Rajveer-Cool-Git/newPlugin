<?php
namespace Inc\Pages;

use \Inc\Base\baseController;
use \Inc\Api\SettingsApi;

//passing to Init

class adminPages extends baseController{

    public $settings;
	public $pages = array();
	public $subpages = array();


	public function register() 
	{
		$this->settings = new SettingsApi();
		$this->setPages();
		$this->setSubPages();
		$this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages( $this->subpages )->register();
	}

	public function setPages(){
		$this->pages = array(
			array(
				'page_title' => 'Basic Plugin', 
				'menu_title' => 'Ruby M', 
				'capability' => 'manage_options', 
				'menu_slug' => 'basic_plugin', 
				'callback' => function() { echo '<h1>Poobri Plugin dot com</h1>'; }, 
				'icon_url' => 'dashicons-businesswoman', 
				'position' => 20
			)
		);  //end of page

	}

	public function setSubPages(){

			//parent slug value should be same as menu_slug
			$this->subpages = array(
				array(
					'parent_slug' => 'basic_plugin', 
					'page_title' => 'Custom Post',
					'menu_title' => 'custom Post', 
					'capability' => 'manage_options', 
					'menu_slug' => 'basic_plugin_cpt', 
					'callback' => function() { return require_once("$this->plugin_path/templates/admin.php"); }, 
				),
				array(
					'parent_slug' => 'basic_plugin', 
					'page_title' => 'Manager Post',
					'menu_title' => 'manager', 
					'capability' => 'manage_options', 
					'menu_slug' => 'cpt_other', 
					'callback' => function() { return require_once("$this->plugin_path/templates/admin.php"); }, 
					
				)
			);
		
	}


    //  public function admin_index(){
    //      //called inside the add-admin-pages function
    //     require_once $this->plugin_path. '/templates/admin.php';
	// }
}

