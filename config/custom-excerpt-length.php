//functions.php
/// tamano de exctracto
function custom_excerpt_length( $length ) {
   return 18;
}
add_filter( 'excerpt_length', 'custom_excerpt_length');
