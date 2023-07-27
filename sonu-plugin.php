<?php 
/*
     *@package sonuplugin
*/
/*
  Plugin Name: sonu plugin
  Plugin URI:  http://localhost/sonu/basicplugin/wp-admin/
  Description: Basic Plugin
  Version : 1.1
  Author: Ruby
  Author URI:   http://localhost/sonu/basicplugin/wp-admin/
  License: 
  License URI: 
 */
/** Configuration * */

//checks absolute path
if(!defined ('ABSPATH')){
    die;
}




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

