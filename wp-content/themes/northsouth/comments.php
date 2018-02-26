<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					printf( _x( 'One comment to &ldquo;%s&rdquo;', 'comments title', 'northsouth_comments' ), get_the_title() );
				} else {
					printf(
						_nx(
							'%1$s comment to &ldquo;%2$s&rdquo;',
							'%1$s comments to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'northsouth_comments'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h3>

        <style>
            .screen-reader-text{
                font-size: 16px;
                margin: auto;
            }
            .nav-links{
                margin-bottom: 40px;
                display: flex;
            }
            .nav-links div{
                margin-right: 15px;
            }
        </style>

        <?php the_comments_navigation(array(
            'prev_text'          => 'Prev comments' ,
            'next_text'          => 'Next comments' ,
            'screen_reader_text' =>  'Find your comment!' ,
        )); ?>

        <?php
            function format_comment($comment, $args, $depth) {

                $GLOBALS['comment'] = $comment; ?>

                <div <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
                    <style>
                        .header-comment{
                            display: inline-block;
                            vertical-align: top;
                            margin-right: 10px;
                        }
                        .cont-mes-c{
                            margin-left: 23px;
                            margin-top: 10px;
                            margin-bottom: 20px;
                        }
                        .message-c{
                            padding-left: 35px;
                            font-style: italic;
                        }
                        .reply{
                            margin-top: -15px;
                            padding-left: 35px;
                        }
                        .reply a{
                            text-decoration: none;
                        }
                        .children{
                            margin-left: 45px;
                            margin-top: 20px;
                        }
                    </style>
                    <div>
                        <div class="header-comment">
                            <?php echo get_avatar(get_comment_author_IP(),45) ?>
                        </div>
                        <div class="header-comment">
                            <div><strong><?php echo get_comment_author($comment->comment_ID); ?></strong></div>
                            <div> <?php echo get_comment_date('M-d-Y', $comment->comment_ID) ?></div>
                        </div>
                    </div>

                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><php _e('Your comment is awaiting moderation.') ?></em><br />
                    <?php endif; ?>
                    <div class="cont-mes-c">
                        <div class="message-c">
                            <?php comment_text(); ?>
                        </div>
                        <div class="reply">
                            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                        </div>
                    </div>
                </div>
        <?php } ?>

		<dl class="comment-list">
			<?php
				wp_list_comments('type=comment&callback=format_comment');
			?>
		</dl>

	<?php endif;  ?>

	<?php
		comment_form( array(
            'title_reply' => 'your comment is important!',
			'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h4>',
		) );
	?>

</div>
