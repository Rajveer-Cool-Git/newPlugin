<?php

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'rubyFramework';
  
    
    // Create options on DASHBOARD 
    CSF::createOptions( $prefix, array(
      'framework_title' =>'frame Settings',
      'menu_title' => 'Ruby Framework',
      'menu_slug'  => 'my-framework',
      //'menu_type' =>'submenu',
      'menu_parent' => 'cool-plugins-timeline-addon',
      //'menu_capability' => 'manage_options', // The capability needed to view the page 
      'menu_icon'=>  'dashicons-businesswoman',
      'menu_position' => 6,
      //'nav'=>'inline',
      //'show_reset_section'=>false,
      //'show_reset_all'=>false,		
      //'show_bar_menu'=>false,
    ) );
  
    
    // Create a section
    CSF::createSection( $prefix, array(
      'title'  => 'sonu',
      'fields' => array(
  
        //
        // A text field
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'Simple Text',
        ),
  
      )
    ) );

    
    // Create a section
    CSF::createSection( $prefix, array(
      'title'  => 'Poobri',
      'fields' => array(
  
        // A textarea field
        array(
          'id'    => 'opt-textarea',
          'type'  => 'textarea',
          'title' => 'Simple Textarea',
        ),
  
      )
    ) );

}



// // A Custom function for get an option
// if ( ! function_exists( 'prefix_get_option' ) ) {
//     function prefix_get_option( $option = '', $default = null ) {
//       $options = get_option( 'my_framework' ); // Attention: Set your unique id of the framework
//       return ( isset( $options[$option] ) ) ? $options[$option] : $default;
//     }
//   }
  
//   echo prefix_get_option( 'opt-text' );
//   echo prefix_get_option( 'opt-text', 'default value' );
  
  //require_once plugin_dir_path(__FILE__) .'codestar-framework\fields\accordion\accordion.php';



  