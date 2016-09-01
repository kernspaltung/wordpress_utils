<?php
$menu_name = 'primario';
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>
<nav id="menu-large" class="medium-12 columns m-t-2 p0 ">

   <ul class="h-60-v p-2 ">

      <?php
      $count = 0;
      $submenu = false;


      foreach( $menuitems as $item ):

         $link = $item->url;
         $title = $item->title;


         $current_item = false;

         // item does not have a parent so menu_item_parent equals 0 (false)
         if ( !$item->menu_item_parent ):
            // save this id for later comparison with sub-menu items
            $parent_id = $item->ID;

            $item_page_id =  (int)get_post_meta( $item->ID, '_menu_item_object_id', true );

            if( get_post_meta( $item->ID, '_menu_item_type', true) == "taxonomy" ) {

               $taxonomy = get_queried_object();
               $taxonomy_id = $taxonomy->term_id;

               if( $taxonomy_id == $item_page_id ) {
                  $current_item = true;
               }

            } else {


            if( $item_page_id == get_the_ID() )
               $current_item = true;
            }

            ?>
            <li class="item <?php echo $current_item ? 'current-menu-item' : ''; ?>">
               <a href="<?php echo $link; ?>" class="title">
                  <?php echo $title; ?>
               </a>
            <?php endif; ?>
            <?php if ( $parent_id == $item->menu_item_parent ): ?>
               <?php if ( !$submenu ): $submenu = true; ?>
                  <ul class="sub-menu">
                  <?php endif; ?>
                  <li class="item sub-item">
                     <a href="<?php echo $link; ?>" class="title"><?php echo $title; ?></a>
                  </li>
                  <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
                  </ul>
                  <?php $submenu = false; endif; ?>
               <?php endif; ?>
               <?php if ( count($menuitems) >= $count + 1 ) if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
               </li>
               <?php $submenu = false; endif; ?>
               <?php $count++; endforeach; ?>
            </ul>
         </nav>
