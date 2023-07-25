<?php 
/*
     *@package sonuplugin
*/
namespace Inc;

final class Init{

    public static function get_services(){
        return [
            Pages\adminPages::class,      //returning array of class adminpage
            Base\enqueue::class,         //returning array of class enqueue
            Base\settings_link::class
        ];
    }


    public static function register_services(){
       foreach(self::get_services() as $cls){        //which class return by getservice()
            $service = self::instantiate($cls);   //calls the instantiate() method, passing the class name $cls

            if(method_exists ($service, 'register')){
                $service->register();
            }

       }
    }

    
    public static function instantiate($cls){
        $service = new $cls();
        return $service;
    }

}


