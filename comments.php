<?php
/**
 * @author madars.bitenieks
 * @copyright 2016
 */

?>

<?php if ( post_password_required() ): ?>  
     <p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view and post comments.' , 'builder69' ); ?></p>  
 
<?php  
        return;  
      endif;  
?>  

<?php if ( have_comments() ) : ?>
<div id="coment-line-space"><!--<span class="line"></span><div class="clear"></div>--></div>

			<h5><?php
			printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'builder69' ),
			number_format_i18n( get_comments_number() ), '' . get_the_title() . '' );
			?></h5>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? 
	
	 $builder69_allowed_html_array = array('a' => array( 'href' => array(), 'title' => array() ), 'br' => array(), 'i' => array('class' => array()),  'em' => array(), 'strong' => array(), 'div' => array('class' => array()), 'span' => array('class' => array()));
	
?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( wp_kses(__( '<span class="meta-nav">&larr;</span> Older Comments', 'builder69' ), $builder69_allowed_html_array )); ?></div>
				<div class="nav-next"><?php next_comments_link( wp_kses(__( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'builder69' ) , $builder69_allowed_html_array )); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					wp_list_comments( array( 'callback' => 'builder69_comment' ) );
				?>
			</ol>
            <div class="line-comment"></div>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? 
	
	
	 $builder69_allowed_html_array = array('a' => array( 'href' => array(), 'title' => array() ), 'br' => array(), 'i' => array('class' => array()),  'em' => array(), 'strong' => array(), 'div' => array('class' => array()), 'span' => array('class' => array()));
?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( wp_kses(__( '<span class="meta-nav">&larr;</span> Older Comments', 'builder69' ) , $builder69_allowed_html_array )); ?></div>
				<div class="nav-next"><?php next_comments_link( wp_kses(__( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'builder69' ) , $builder69_allowed_html_array )); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	if ( ! comments_open() ) :
?>
	
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ? ?>
<!--<div><span class="line"></span></div>-->

<?php
$leavcoment = ot_get_option('blog_comment_description');
$fields =  array(
	
	'author' => '<div class="row"><div class="comment-input col-md-4 mt_comment_i_1"><input id="author" placeholder="'. esc_html__( 'Name', 'builder69' ) .'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></div>',
	           
	'email'  => '<div class="comment-input col-md-4 mt_comment_i_2"><input id="email" name="email" type="text"  placeholder="'. esc_html__( 'Email', 'builder69' ) .'" value="' . esc_html(  $commenter['comment_author_email'] ) . '" size="30" /></div>',
	'url'    => '<div class="comment-input col-md-4 mt_comment_i_3"><input class="input" id="url" name="url"  placeholder="'. esc_html__( 'Website', 'builder69' ) .'" type="text" value="' . esc_url( $commenter['comment_author_url'] ) . '" size="30" /></div></div>',
);

 $defaults = array(
	
	'comment_field'        => '<p class="comment-textarea"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" ></textarea></p>',
	'must_log_in'          => '<p class="must-log-in">' .  sprintf( wp_kses(__( 'You must be <a href="%s">logged in</a> to post a comment.', 'builder69' ), array(
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
    'br' => array(),
    'i' => array(
        'class' => array()
    ),
    'em' => array(),
    'strong' => array(),
    'div' => array(
        'class' => array()
    ),
    'span' => array(
        'class' => array()
    ),
) ), wp_login_url( apply_filters( 'the_permalink', get_permalink( get_the_ID()) ) ) ) . '</p>',
	'logged_in_as'         => '<p class="logged-in-as">' . sprintf( wp_kses(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'builder69' ), array(
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
    'br' => array(),
    'i' => array(
        'class' => array()
    ),
    'em' => array(),
    'strong' => array(),
    'div' => array(
        'class' => array()
    ),
    'span' => array(
        'class' => array()
    ),
) ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</p>',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'title_reply'          => esc_html__( 'Leave a Comment', 'builder69' ),
	'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'builder69' ),
	'cancel_reply_link'    => esc_html__( 'Cancel reply', 'builder69' ),
	'label_submit'         => esc_html__( 'Submit Comment', 'builder69' ),
	'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
);

 comment_form($defaults); ?>

<!-- #comments -->
