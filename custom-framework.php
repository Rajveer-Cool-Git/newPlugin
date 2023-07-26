<?php

// Control core classes for avoid errors
if( class_exists( 'CTL' ) ) {

  $prefix = 'my_post_options';
  CTL::createMetabox( $prefix, array(
    'title'     => 'My Post Options',
    'post_type' => 'post',
    'data_type'      => 'unserialize',
  ) );
  CTL::createSection( $prefix, array(
    'title'  => 'Tab Title 1',
    'fields' => array(
      array(
        'id'    => 'opt-text',
        'type'  => 'text',
        'title' => 'Simple Text',
      ),
    )
  ) );
  CTL::createSection( $prefix, array(
    'title'  => 'Tab Title 2',
    'fields' => array(
      array(
        'id'    => 'opt-textarea',
        'type'  => 'textarea',
        'title' => 'Simple Textarea',
      ),
    )
  ) );

}