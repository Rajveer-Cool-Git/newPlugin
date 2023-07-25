<?php 
/*
     *@package sonuplugin
*/
namespace Inc\Base;

class sp_deactivate{

    public static function plugin_deactivate(){
        flush_rewrite_rules();
    }
}


