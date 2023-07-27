<?php
namespace Inc\Api\Callbacks;

use Inc\Base\baseController;

class adminCallbacks extends baseController{
    
    public function adminDashboard(){
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

    public function adminOptionGroup($input){
        return $input;
    }

    public function adminFieldGroup(){
        $value = esc_attr( get_option('text_example') );
        echo '<input type="text" class="regular-text"  name="text_example" value="" placeholder = "Identity Number" ><br>';
    }
    
    public function fieldFirstName(){
        $value = esc_attr( get_option('fname') );
        echo '<input type="text" class="regular-text"  name="fname" value="" placeholder = "Name" ><br>';
    }
}