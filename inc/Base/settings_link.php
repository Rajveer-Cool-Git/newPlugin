<?php 
/*
     *@package sonuplugin
*/
namespace Inc\Base;
  

//passing to Init
class settings_link{
    
    function register(){
        add_filter("plugin_action_links_". PLUGIN_BASENAME,array ($this,'settings_link'));
    }

    public function settings_link($links){
        $settings_link = '<a href = "admin.php?page=menu_slug">Settings</a>';
        array_push($links,$settings_link);
        return $links;
    }

}