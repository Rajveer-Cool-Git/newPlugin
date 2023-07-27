<?php
namespace Inc\Api\Callbacks;

use Inc\Base\baseController;

class managerCallbacks extends baseController{

    public function checkboxSantize($input){
        //return filter_var($input,FILTER_SANTIZE_NUMBER_INT);
        return (isset($input) ? true : false);
    }

    public function adminSectionManager(){
        echo "hellos";
    }

    public function checkboxField($args){

        $name = $args['label_for'];
        $classes = $args['class'];
        $checkbox = get_option($args['label_for']);
        echo '<input type="checkbox" name= "'.$name.'" value= "1" class="'.$classes.'" '.($checkbox ? 'checked' : '').'></input>';

    }
}