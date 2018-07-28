<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'chld_thm_cfg_parent','hemingway-rewritten-style','hemingway_rewritten-wpcom' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css' );

// END ENQUEUE PARENT ACTION

//add_theme_support( 'amp' );

function hemingway_is_amp() {
	return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();
}


/**
 * Dequeue scripts that aren't relevant in AMP.
 */
function hemingway_rewritten_scripts_child() {

	if ( hemingway_is_amp() ) {
		wp_dequeue_script( 'hemingway-rewritten-script' );
		wp_dequeue_script( 'hemingway-rewritten-navigation' );
		wp_dequeue_script( 'hemingway-rewritten-skip-link-focus-fix' );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_dequeue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'hemingway_rewritten_scripts_child', 11 );
