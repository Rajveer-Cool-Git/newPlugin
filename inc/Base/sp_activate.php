<?php 
/*
     *@package sonuplugin
*/
namespace Inc\Base;

class sp_activate{

    public static function plugin_activate(){
        flush_rewrite_rules();
    }
}