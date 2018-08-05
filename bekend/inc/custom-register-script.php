<?php

add_action('wp_enqueue_scripts', 'enqueue_my_scripts');
function enqueue_my_scripts(){
    //remove  jquery default
    wp_deregister_script( 'jquery' );
    //Add Angular dist scripts
    foreach( glob( get_template_directory(). '/dist/*.js' ) as $file ) {
        $filename = substr($file, strrpos($file, '/') + 1);
        wp_enqueue_script( $filename, get_template_directory_uri().'/dist/'.$filename);
    }
}
// Add Css Files
add_action('wp_enqueue_scripts', 'wp_adding_styles');

function wp_adding_styles()
{
    foreach( glob( get_template_directory(). '/dist/*.css' ) as $file ) {
        $filename = substr($file, strrpos($file, '/') + 1);
        wp_enqueue_style( $filename, get_template_directory_uri().'/dist/'.$filename);
    }
}