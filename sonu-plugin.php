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

/*
use Inc\Base\sp_activate;
use Inc\Base\sp_deactivate;
use Inc\Pages\adminPages;


// class
class sonuPlugin{
    public $plugin;

    function __construct($b){
        echo $b;
        $this->create_post_type();      //calling protected method
        $this->plugin = plugin_basename(__FILE__);
        
    }

    protected function create_post_type(){     //call in constructor
        add_action( 'init', array($this, 'create_custom_post_type' ));
    }
// <!-- hello -->
    function enqueue_register(){
        add_action('admin_enqueue_scripts',array($this,'enqueue'));   // to show files to admin
        add_action( 'wp_enqueue_scripts', array($this,'enqueue') );   // to show files to user

        // $objAP = new adminPages();   //admin pages register function
        // add_action( 'admin_menu', array($objAP,'add_admin_pages') );   
        add_filter("plugin_action_links_$this->plugin",array ($this,'settings_link'));
    }

    public function settings_link($links){
        $settings_link = '<a href = "admin.php?page=menu_slug">Settings</a>';
        array_push($links,$settings_link);
        return $links;
    }



    function create_custom_post_type() {
        $labels = array(
            'name' => 'Books',
            'singular_name' => 'Book',
        );
    
        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'books' ),
        );
         
        //pass in the below function
        register_post_type( 'book', $args );           // to create a new content_type(customPost) with its own set of attributes and behaviors.
    }
 




    function enqueue(){
        wp_enqueue_style('mypluginstyle',plugins_url('assets/mystyle.css',__FILE__));      //to add style,script files in wordpress wp_enqueue(function)
        wp_enqueue_script('myplugiscript',plugins_url('assets/myscript.js',__FILE__));
    }

    public  function activate(){
        //flush_rewrite_rules();
        sp_activate::plugin_activate();
    }

    public  function deactivate(){
        flush_rewrite_rules();
    }

}

$obj_sp= new sonuPlugin("hello my pubri");
$obj_sp->enqueue_register();

//activation
//require_once plugin_dir_path(__FILE__). 'inc/sp_activate.php'; 
register_activation_hook(__FILE__, array($obj_sp,'activate'));


//deactivation
//require_once plugin_dir_path(__FILE__). 'inc/sp_deactivate.php';  
register_deactivation_hook(__FILE__,array('Inc\Base\sp_deactivate','plugin_deactivate'));  

//uninstall


?>

*/