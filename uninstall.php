<?php
/*
        *@package sonuplugin

*/

if(!defined ('WP_UNINSTALL_PLUGIN'))
{
    die();
}

//Clear Database stored data 

$books =get_posts(array('post-type'=>'book','numberposts'=>-1));

foreach($books as $book){
 wp_delete_post($book->ID,true);

}

global $wpdb;
$wpdb->query("Delete from b_posts where post_type = 'book'");
$wpdb->query("Delete from b_postmeta where post_id NOT IN (select id from b_posts)");
$wpdb->query("Delete from b_term_relationships where object_id NOT IN (select id from b_posts)");



?>