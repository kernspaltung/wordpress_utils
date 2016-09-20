
<?php
$tag_ids = array();
$tags = get_the_tags();
?>

<?php foreach ($tags as $tag) {
   array_push( $tag_ids, $tag->term_id );
}

?>

<?php
$args = array( 'tag__in' => $tag_ids, 'posts_per_page'=> 6);
$q = new WP_Query($args);
if( $q->have_posts() ) :
   
   ?>
   <h3>Entradas Relacionadas:</h3>
   <?php
   
   while ( $q->have_posts() ) :
      $q->the_post();
      ?>
      
      <div class="w-whole-sm w-half-md w-third-lg related_post">
         <a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="wh-full">
            
            <div class="image h-half imgLiquid imgLiquidFill">
               <?php echo get_the_post_thumbnail(); ?>
            </div>
            
            <div class="text h-half v-center">
               
               <div class="m0">
                  <?php echo get_the_title(); ?>
               </div>
               
            </div>
         </a>
      </div>
      
      
      
      <?php
      
   endwhile;
endif;


?>
