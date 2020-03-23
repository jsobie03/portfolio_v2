<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
if ( have_comments() || comments_open() ) :
    if ( have_comments()){ ?>
    <div class="comments margin-top-100">
        <h4 class="title-com margin-bottom-100" ><?php esc_attr_e('COMMENTS','me-wp'); ?></h4>
        <ul>
            <?php  wp_list_comments(array(
                'type' => 'all',
                'short_ping' => true,
                'callback' => 'me_wp_comment'
            )); ?>
        </ul>
        <div class="clear clearfix"></div>
        <?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h5 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'me-wp' ); ?></h5>
                <div class="nav-previous col-sm-6"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'me-wp' ) ); ?></div>
                <div class="nav-next col-sm-6 text-right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'me-wp' ) ); ?></div>
            </nav>
        <?php endif; ?>
    </div>
    <?php } ?>
    <!-- ADD comments -->
    <div class="add-comments padding-top-100 padding-bottom-100">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-md-8 center-auto">
                <!-- FORM -->
                <?php
                $commenter = wp_get_current_commenter();
                $req = get_option( 'require_name_email' );
                $fields =  array(
                    'author' =>
                    '<li class="col-sm-12">
                        <label>
            <input id="author" placeholder="'.esc_html__('Name','me-wp').'" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'"/>
        </label>
    </li>',
                    'email' =>
                    '<li class="col-sm-6">
                        <label>
            <input id="email" placeholder="'.esc_html__('Email','me-wp').'" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"/>
        </label>
    </li>',
                    'url' =>
                    '<li class="col-sm-6">
                        <label>
            <input id="url" placeholder="'.esc_html__('Website','me-wp').'" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"/>
        </label>
    </li>',
                );
                $args = array(
                    'id_form'           => 'commentform',
                    'class_form'      => '',
                    'id_submit'         => 'submit',
                    'class_submit'      => 'btn-large btn-round',
                    'name_submit'       => 'submit',
                    'title_reply'       => '',
                    'title_reply_to'    => '',
                    'cancel_reply_link' => '',
                    'comment_notes_after' => '',
                    'comment_notes_before' => '',
                    'label_submit'      => esc_html__( 'SEND COMMENT','me-wp' ),
                    'format'            => 'xhtml',
                    'comment_field' =>  '<li class="col-sm-12">
                <label>
                <textarea placeholder="'.esc_html__('COMMENTS','me-wp').'" id="comment" class="form-control" name="comment" aria-required="true">' .
                        '</textarea>
                        </label>
                        </li>',
                    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
                ); ?>
                <?php if ( comments_open() ) : ?>
                <h4 class="title-com margin-bottom-80"><?php esc_attr_e('Post A Comment','me-wp'); ?></h4>
                <ul class="row">
                    <?php comment_form($args); ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>