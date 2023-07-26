<?php
// Control core classes for avoid errors
if( class_exists( 'CTL' ) ) {
    //
    // Set a unique slug-like ID
    $prefix = 'my_shortcodes';
    // CTL::createOptions( $prefix, array(
    //     'menu_title' => 'My Framework',
    //     'menu_slug'  => 'my-framework',
    //   ) );
    //
    // Create a shortcoder
    CTL::createShortcoder( $prefix, array(
      'button_title' => 'Add your short code here',
    ) );
    //
    // A basic shortcode
    CTL::createSection( $prefix, array(
      'title'     => 'Shortcode Basic 1',
      'view'      => 'group',
    'shortcode' => 'tabs',
      'fields'    => array(
        array(
          'id'    => 'title',
          'type'  => 'text',
          'title' => 'Title',
        ),
        array(
          'id'    => 'color',
          'type'  => 'color',
          'title' => 'Color',
        ),
      )
    ) );
    //
    // Another basic shortcode
    CTL::createSection( $prefix, array(
      'title'     => 'Shortcode Basic 2',
      'view'      => 'group', // View model of the shortcode. `normal` `contents` `group` `repeater`
      'shortcode' => 'my_shortcode', // Set a unique slug-like name of shortcode.
      'fields'    => array(
        array(
          'id'    => 'title',
          'type'  => 'text',
          'title' => 'Titlte',
        ),
        array(
          'id'    => 'switcher',
          'type'  => 'switcher',
          'title' => 'Switcher',
        ),
        array(
          'id'    => 'content',
          'type'  => 'textarea',
          'title' => 'Content',
        ),
      )
    ) );
  }
