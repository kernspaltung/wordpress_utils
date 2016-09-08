<?php

function wu_set_post_views($postID) {
    $count_key = 'wu_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wu_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    wu_set_post_views($post_id);
}
add_action( 'wp_head', 'wu_track_post_views');



function wu_get_post_views($postID){
    $count_key = 'wu_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}




function most_viewed( $atts ) {

   $num_posts = 0;
   $num_posts = $atts['num'];

   ob_start();

   $popularposts = new WP_Query( array(
      'posts_per_page' => $num_posts,
      'meta_key' => 'wu_post_views_count',
      'orderby' => 'meta_value_num',
      'order' => 'DESC'
   ) );
   if ( $popularposts->have_posts() ) :
   while ( $popularposts->have_posts() ) : $popularposts->the_post();


   ?>

   <div class="title">
      <?php echo apply_filters( 'the_title', get_the_title() ); ?>
   </div>
   <small>
      Num Views:
      <?php echo wu_get_post_views( get_the_ID() ); ?>
   </small>

   <?php

   endwhile; endif;

   $html = ob_get_contents();
   ob_clean();

   return $html;
}

add_shortcode( 'most_viewed', 'most_viewed' );

?>
