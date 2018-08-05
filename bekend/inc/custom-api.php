<?php
function getPosts() {
        $posts = get_posts( array(
            'post_type' => 'post',
            'posts_per_page' => '-1',
          ));
    if ( empty( $posts ) ) {
      return null;
    }
    return $posts;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'posts', '/all', array(
      'methods' => 'GET',
      'callback' => 'getPosts',
      ));     
});
?>