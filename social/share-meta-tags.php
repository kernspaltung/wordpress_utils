<?php

$twitter_user = '@twitter_user';

$name = get_bloginfo('name');

$description = "...";
$url = get_bloginfo('url');
$image = "http://image.source/";
$date = '';
$time = '';

if( is_singular() ) {

   $name = $name . " | " . get_the_title();
   $description = get_the_excerpt();
   $url = get_the_permalink( get_the_ID() );
   $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail_size' );   $thumb_url = $thumb[0];
   $image = $thumb[0];
}

?>


<meta name="description" content="<?php echo $description; ?>" />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<?php echo $name; ?>">
<meta itemprop="description" content="<?php echo $description; ?>">
<meta itemprop="image" content="<?php echo $image; ?>">

<!-- Twitter Card data -->
<meta name="twitter:card" content="<?php echo $image; ?>">
<meta name="twitter:site" content="<?php echo $twitter_user; ?>">
<meta name="twitter:title" content="<?php echo $name; ?>">
<meta name="twitter:description" content="<?php echo $description; ?>">
<!-- <meta name="twitter:creator" content="@author_handle"> -->
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image:src" content="<?php echo $image; ?>">

<!-- Open Graph data -->
<meta property="og:title" content="<?php echo $name; ?>"/>
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:image" content="<?php echo $image; ?>" />
<meta property="og:description" content="<?php echo $description; ?>" />
<meta property="og:site_name" content="<?php echo $name; ?>" />
<meta property="article:published_time" content="<?php echo $date; ?>" />
<meta property="article:modified_time" content="<?php echo $time; ?>" />
<!-- <meta property="article:section" content="Artget_numberic ID" /> -->


<?php
#insert before wp_head:
#wp_head();
?>
