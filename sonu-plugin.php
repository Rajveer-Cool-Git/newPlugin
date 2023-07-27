<?php 
/*
     *@package sonuplugin
*/
/*
     Plugin Name: sonu plugin
     Plugin URI :
     Description : my first Plugin
     Version : 5.1
     Author URI :
     License :
     Text Domain : sonu plugin 
*/

//checks absolute path
if(!defined ('ABSPATH')){
    die;
}
require_once plugin_dir_path(__FILE__) .'codestar-framework/codestar-framework.php';

require_once plugin_dir_path(__FILE__) .'shortcode-generator.php';
//require_once plugin_dir_path(__FILE__) .'custom-framework.php';






if (file_exists(dirname(__FILE__) .'\vendor\autoload.php')){
    require_once dirname(__FILE__) .'\vendor\autoload.php';
}

define('PLUGIN_PATH',plugin_dir_path(__FILE__));  //storing  D:\xamp\htdocs\sonu\basicplugin\wp-content\plugins\sonu-plugin/   under PLUGINPATH
define('PLUGIN_URL',plugin_dir_url(__FILE__));    //storing URl of file 
define('PLUGIN_BASENAME',plugin_basename (__FILE__));    //storing URl of file 

use Inc\Base\sp_activate;
use Inc\Base\sp_deactivate;

function activate(){
    sp_activate::plugin_activate();
}

function deactivate(){
    sp_deactivate::plugin_deactivate();
}


register_activation_hook(__FILE__,'activate' );
register_deactivation_hook(__FILE__,'deactivate');  


if(class_exists('Inc\Init')){
   Inc\Init::register_services();
   echo"     Hello my Pubriiiiiiii"; 
}

