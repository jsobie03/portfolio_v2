<?php
/**
 * Theme Comments
 * @ ME WP
 * @ Me WP 1.0
 **/
// load comment scripts only on single pages
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
?>