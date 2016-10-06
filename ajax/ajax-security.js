jQuery.post(
	MyAjax.ajaxurl,
	{
		action : 'myajax-submit',
		postID : MyAjax.postID,

		// send the nonce along with the request
		postCommentNonce : MyAjax.postCommentNonce
	},
	function( response ) {
		alert( response );
	}
);
