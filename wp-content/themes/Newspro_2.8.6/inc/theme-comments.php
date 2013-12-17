<?php
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own gab_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function gab_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 36 ); ?>
			<?php printf( __( '%s '), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'newspro' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s - %2$s' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '#' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'newspro' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('#'), ' ' ); ?></p>
	<?php
		break;
	endswitch;
}

// Comment Form - since WP 3.0
$fields =  array(
	'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Nombre' , 'newspro' ) . '</label> <span class="required">*</span> 
	            <input id="author" class="text" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' /></p>',
	'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' , 'newspro' ) . '</label> <span class="required">*</span>
	            <input id="email" class="text" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' /></p>',
	'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' , 'newspro' ) . '</label>' .
	            '<input id="url" class="text" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></p>',
); 

$arguments = array(
    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __( 'Comentar', 'newspro' ) . '</label><textarea id="comment" class="text" name="comment" ' . $aria_req . ' cols="45" rows="8"></textarea>		</p>',
	'id_form'              => 'comment-write',
	'id_submit'            => 'submit',
	'title_reply'          => __( 'Comparte tu opinion' , 'newspro' ),
	'title_reply_to'       => __( 'Responder a %s' , 'newspro'),
	'cancel_reply_link'    => __( 'Cancelar respuesta' , 'newspro'),
	'label_submit'         => __( 'Comentar' , 'newspro' ),
);