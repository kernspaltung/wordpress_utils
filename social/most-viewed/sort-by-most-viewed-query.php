<?php
$popularposts = new WP_Query( array(
   'posts_per_page' => -1,
   'meta_key' => 'wu_post_views_count',
   'orderby' => 'meta_value_num',
   'order' => 'DESC'
) );
while ( $popularposts->have_posts() ) : $popularposts->the_post();

// the post

endwhile;
?>
