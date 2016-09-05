#use in wp-config.php
##Takes out the admin toolbar on front

add_filter( 'show_admin_bar', '__return_false' );
