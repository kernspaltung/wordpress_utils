add_action( 'init', 'add_excerpts_to_pages' );
function add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
