<?php
namespace Inc\Pages;

use \Inc\Base\baseController;
use \Inc\Api\SettingsApi;
use Inc\Api\Callbacks\adminCallbacks;
use Inc\Api\Callbacks\managerCallbacks;

//passing to Init
class adminPages extends baseController{

    public $settings;
	public $callback;
	public $callback_mg;
	public $pages = array();
	public $subpages = array();


	public function register() 
	{
		$this->settings = new SettingsApi();
		$this->callback = new adminCallbacks();       //calling class adminCallback (to use their funtion in program)
		$this->callback_mg = new managerCallbacks();
		$this->setPages();
		$this->setSubPages();
		$this->setSettings();
		$this->setSections();
		$this->setFields();
		$this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages( $this->subpages )->register();
	}

	public function setPages(){
		$this->pages = array(
			array(
				'page_title' => 'Basic Plugin', 
				'menu_title' => 'Ruby ADMIN', 
				'capability' => 'manage_options', 
				'menu_slug' => 'basic_plugin', 
				'callback' => array( $this->callback, 'adminDashboard' ), 
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
					'callback' => function() { echo"hello custom"; }, 
				),
				array(
					'parent_slug' => 'basic_plugin', 
					'page_title' => 'Manager Post',
					'menu_title' => 'manager Post', 
					'capability' => 'manage_options', 
					'menu_slug' => 'master_plugin_cpt', 
					'callback' => function() { echo '<h1>Poobri Plugin dot com</h1>';   }, 
					
				)
			);	
	}

	public function setSettings(){
		$args = array(
			array(
				'option_group' => 'admin_options_group',
				'option_name' => 'text_example',
				'callback' => array($this->callback, 'adminOptionGroup')
			),
			array(
				'option_group' => 'admin_options_group',
				'option_name' => 'fname',
				'callback' => array($this->callback, 'fieldFirstName')
			)

		);

		foreach($this->managers as $key => $value){
			$args[]= array(
				'option_group' => 'admin_options_group',
				'option_name' => $key,
				'callback' => array($this->callback_mg, 'checkboxSantize')
			);
		}

		$this->settings->setSettings($args);
	}

	public function setSections(){
		$args = array(
			array(
				'id' => 'admin_index',
				'title' => 'Manage Profile',
				'callback' => array($this->callback_mg, 'adminSectionManager'),
				'page'=> 'basic_plugin'                  
				)
		);
        //page value should be = menu_slug of page
		$this->settings->setSections($args);
	}

	public function setFields(){
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'No.',
				'callback' => array($this->callback, 'adminFieldGroup'),
				'page'=> 'basic_plugin',                
				'section' => 'admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
					)
				),
				array(
					'id' => 'fname',
					'title' => 'First Name',
					'callback' => array($this->callback, 'fieldFirstName'),
					'page'=> 'basic_plugin',                
					'section' => 'admin_index',
					'args' => array(
						'label_for' => 'text_example',
						'class' => 'example-class'
						)
				)	
		);

		foreach($this->managers as $key => $value){
			$args[]= array(
				'id' => $key,
				'title' => $value,
				'callback' => array($this->callback_mg, 'checkboxField'),
				'page'=> 'basic_plugin',                
				'section' => 'admin_index',
				'args' => array(
					'label_for' => $key,
					'class' => 'ui-toggle'
					)
				);
		}
        //id value should be = option_name of page
		$this->settings->setFields($args);
	}

    
}

