<?php
add_theme_support( 'post-thumbnails' ); // Add opstion post-thumbnails

//remove_menus for Admin Panel
function remove_menus(){
   // remove_menu_page( 'index.php' );                  //Dashboard
   // remove_menu_page( 'edit.php' );                   //Posts
   // remove_menu_page( 'upload.php' );                 //Media
   // remove_menu_page( 'edit.php?post_type=page' );    //Pages
   // remove_menu_page( 'edit-comments.php' );          //Comments
   // remove_menu_page( 'themes.php' );                 //Appearance
   // remove_menu_page( 'plugins.php' );                //Plugins
   // remove_menu_page( 'users.php' );                  //Users
   // remove_menu_page( 'tools.php' );                  //Tools
   // remove_menu_page( 'options-general.php' );        //Settings
  }
add_action( 'admin_menu', 'remove_menus' );
 function remove_acf_menu() {
    remove_menu_page('edit.php?post_type=acf'); // remove acf admin
 }
//add_action( 'admin_menu', 'remove_acf_menu', 999); // remove acf admin

add_action( 'wp_head', 'add_meta_tags' , 2 ); //Add meta_tags keywords from tags
function add_meta_tags() { 
    global $post;
    if ( is_single() ) {
        $keywords = get_the_tags( $post->ID );
        $metakeywords = '';
        foreach ( $keywords as $keyword ) {
            $metakeywords .= $keyword->cat_name . ", ";
        }
        echo '<meta name="keywords" content="' . $metakeywords . '" />' . "\n";
    }
}
?>