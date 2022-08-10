<?php
/**
 * Comments Main File.
 *
 * @package SOFTO
 * @author  Themes Flat
 * @version 1.0
 */
?>
<?php
if ( post_password_required() ) {
	return;
}
?>
<?php $count = wp_count_comments(get_the_ID()); ?>

<?php if ( have_comments() ) : ?>
	
<div class="comments-area post-comments" id="comments">
	<div class="comments">
   		<h2 class="title">
			<?php $comments_number = get_comments_number();
            if ( '1' === $comments_number ) {
                /* translators: %s: post title */
                printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'softo' ), get_the_title() );
            } else {
                printf(
                    /* translators: 1: number of comments, 2: post title */
                    _nx(
                        '%1$s Reply to &ldquo;%2$s&rdquo;',
                        '%1$s Replies to &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'softo'
                    ),
                    number_format_i18n( $comments_number ),
                    get_the_title()
                );
            } ?>
    	</h2>
    
		<?php
            wp_list_comments( array(
                'style'       => 'div',
                'short_ping'  => true,
                'avatar_size' => 100,
                'callback'    => 'softo_list_comments',
            ) );
        ?>		
        
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading">
                <?php esc_html_e( 'Comment navigation', 'softo' ); ?>
            </h1>
            <div class="nav-previous">
                <?php previous_comments_link( esc_html__( '&larr; Older Comments', 'softo' ) ); ?>
            </div>
            <div class="nav-next">
                <?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'softo' ) ); ?>
            </div>
        </nav><!-- .comment-navigation -->
        <?php endif; ?>
        
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments">
            <?php esc_html_e( 'Comments are closed.', 'softo' ); ?>
        </p>
        <?php endif; ?>
        
	</div>
</div>
<?php endif; ?>

<?php if(softo_comment_form()): ?>
	<?php softo_comment_form(); ?>
<?php endif; ?>