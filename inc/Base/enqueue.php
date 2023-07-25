<?php 
/*
     *@package sonuplugin
*/
namespace Inc\Base;
  


//passing to Init
class enqueue{
 
    public function register(){
        add_action('admin_enqueue_scripts',array($this,'enqueue'));   // to show files to admin
        add_action('wp_enqueue_scripts', array($this,'enqueue'));   // to show files to user
    }

    public function enqueue(){
        wp_enqueue_style('mypluginstyle',PLUGIN_URL.'assets/mystyle.css');      //to add style,script files in wordpress wp_enqueue(function)
        wp_enqueue_script('myplugiscript',PLUGIN_URL.'assets/myscript.js');
    }

}