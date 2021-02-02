<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Voicer
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area comments-wrap">
    <div class="comments-block">
        <?php
        if ( have_comments() ) :
            function theme_comment($comment, $args, $depth) {
                if ( 'div' === $args['style'] ) {
                    $tag       = 'div';
                    $add_below = 'comment';
                } else {
                    $tag       = 'li';
                    $add_below = 'div-comment';
                }
                ?>
                <<?php echo wp_kses($tag, voicer_tags()); ?> <?php comment_class( empty($args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
                <?php if ( 'div' != $args['style'] ) : ?>
                <div id="div-comment-<?php comment_ID() ?>" class="comment-body7 ch-single-comment">
            <?php endif; ?>

                    <?php
                    if ( $args['avatar_size'] != 0 ) {
                        echo '<div class="comment-author7 vcard7 userpic">'.get_avatar($comment, 90).'</div>';
                    }
                    ?>
                <div class="text">
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                    <div class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'voicer' ); ?></div>
                    <?php endif; ?>
                    <ul class="post-meta">
                        <?php  if (get_comment_type() == 'comment') { ?>
                        <li class="post-author">
                            <?php echo do_shortcode('[voicer_icon icon="icon-user"]'); ?>
                            <?php printf( ( '<span class="fn">%s</span>' ), get_comment_author_link() ); ?>
                        </li>
                            <li class="post-meta-date">
                                <?php
                                echo do_shortcode('[voicer_icon icon="icon-time"]').'<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><span>'. get_comment_date( ).'</span></a>';  ?>
                                <?php edit_comment_link( esc_html__( '(Edit)','voicer'), '  ', '' ); ?>
                            </li>
                        <?php } else { ?>
                        <li class="post-author">
                            <?php printf( ( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
                        </li>
                        <li class="post-meta-date">
                            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                                <?php  echo get_comment_date(); ?>
                            </a>
                            <?php edit_comment_link( esc_html__( '(Edit)','voicer'), '  ', '' ); ?>
                        </li>
                        <?php } ?>
                        <li class="reply">
                            <?php comment_reply_link( array_merge( $args, array( 'add_below' => esc_attr($add_below), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                        </li>
                    </ul>
                    <?php comment_text(); ?>

                </div>
                <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
                <?php
            }
            ?>
            <ul class="comments-block">
                <h4><?php esc_html_e('Comments','voicer'); ?> (<span class="theme-color"><?php echo get_comments_number(); ?></span>)</h4>
                <?php wp_list_comments('type=all&callback=theme_comment'); ?>
            </ul>
            <?php the_comments_pagination();
        endif;

        if (!comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'voicer' ); ?></p>
            <?php
        endif;
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
            'class_form'           => 'contact-form comment-form',
            'class_submit'         => 'btn btn--border1 btn--sm mb-0',
            'label_submit'         => esc_html__( 'leave comment', 'voicer'),
            'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s"><svg class="icon icon-mail" width="18" height="14" viewBox="0 0 18 14" xmlns="http://www.w3.org/2000/svg"><path d="M17.7363 0.734375H0.423828V13.2656H17.7363V0.734375ZM1.61133 1.92188H16.5488V2.6875L9.37695 7.29688L1.61133 2.64062V1.92188ZM12.2832 7.15625L16.5488 4.3125V10.9531L12.2832 7.15625ZM1.61133 4.3125L6.0332 7.03125L1.61133 10.9531V4.3125ZM7.12695 7.70312L9.37695 9.09375L11.2051 7.875L15.877 12.0781H2.2832L7.12695 7.70312Z"/></svg>%4$s</button>',
            'submit_field'         => '%1$s %2$s',
            'fields' => array(
                'author' => '
            <div class="inputs-col">
            <div class="row"><div class="col-md-9"><div class="input-wrapper">
            <input class="input-custom input-full" placeholder="'. esc_html__('First name', 'voicer').( $req ? '*' : '' ).'" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .'" ' . $aria_req . ' />
            </div></div></div>',
                'email'  => '
            <div class="row"><div class="col-md-9"><div class="input-wrapper">
            <input class="input-custom input-full" placeholder="'. esc_html__('Email', 'voicer').( $req ? '*' : '' ).'" id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']).'" ' . $aria_req . ' />
            </div></div></div>',
                'url'    => '
            <div class="row"><div class="col-md-9"><div class="input-wrapper">
            <input class="input-custom input-full" placeholder="'. esc_html__('Website', 'voicer').'" id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url'] ) . '" />
            </div></div></div>
            </div>',
            ),
            'comment_field' => '<div class="row"><div class="col-md-9"><div class="input-wrapper"><textarea placeholder="' . wp_kses(__('Comment', 'voicer'),'post') . '" id="comment" class="textarea-custom input-full" name="comment" cols="45" rows="8" aria-required="true"></textarea></div></div></div>',
            'comment_notes_after' => '',
            'comment_notes_before' => '',
            'title_reply'          => esc_html__('Leave a Comment','voicer'),
            'cancel_reply_link'    => esc_html__('cancel reply','voicer')
        );
        add_filter('comment_form_fields', 'voicer_reorder_comment_fields' );
        function voicer_reorder_comment_fields( $fields ){
            $new_fields = array();
            $myorder = array('author','email','url','comment');
            foreach( $myorder as $key ){
                $new_fields[ $key ] = $fields[ $key ];
                unset( $fields[ $key ] );
            }
            if( $fields )
                foreach( $fields as $key => $val )
                    $new_fields[ $key ] = $val;
            return $new_fields;
        }
        comment_form($comment_args); ?>
    </div>
</div>
