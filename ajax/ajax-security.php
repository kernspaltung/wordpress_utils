wp_enqueue_script( 'my-ajax-request', '/path/to/ajax-security.js', array( 'jquery' ) );

wp_localize_script( 'my-ajax-request', 'MyAjax', array(
	// URL to wp-admin/admin-ajax.php to process the request
	'ajaxurl'          => admin_url( 'admin-ajax.php' ),

	// generate a nonce with a unique ID "myajax-post-comment-nonce"
	// so that you can check it later when an AJAX request is sent
	'postCommentNonce' => wp_create_nonce( 'myajax-post-comment-nonce' ),
	)
);
