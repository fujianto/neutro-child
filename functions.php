<?php
/**
 * This is child themes functions.php file. All modifications should be made in this file.
 *
 * All style changes should be in child themes style.css file.
 *
 * @package    Neutro Child
 * @version    1.0
 */

/* Adds the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'neutro_child_theme_setup', 11 );

/**
 * Setup function.  All child themes should run their setup within this function.  The idea is to add/remove 
 * filters and actions after the parent theme has been set up.  This function provides you that opportunity.
 *
 * @since  1.0
 * @access public
 * @return void
 */
function neutro_child_theme_setup() {
	/* Add custom menus. */
	add_action( 'init', 'neutro_child_register_menus', 11 ); 
	/* Add additional body classes */
	add_filter( 'body_class', 'neutro_child_additional_body_classes' );  
}

/**
 * Add custom class on post_class
 * 
 * @since 1.0
 * @param type $classes 
 * @return string filter class
 */
function neutro_child_post_class($classes){	
	/*	Don't add .item on singular post type */
	if(get_post_type() && is_page() ){
		$classes[] = 'item';
	}

	return  $classes;
}

add_filter( 'post_class', 'neutro_child_post_class');

/**
 * Add full width class for Archive and Page template taxonomy (Portfolio)
 * @param  Array String $classes 
 * @return Array String  additional body class
 */
function neutro_child_additional_body_classes($classes){
	if(is_post_type_archive() || is_tax() ){
		$classes[] = 'layout-1c';
	}

	return  $classes;
}

/**
 * Registers custom nav menus for this theme.  The only extra menu is the 'Portfolio' menu.  It is only 
 * added if the 'portfolio_item' post type exists.  This is to be used with the 'CPT: Portfolio' plugin.
 *
 * @since  1.0
 * @access public
 * @return void
 */
function neutro_child_register_menus() {

	if ( post_type_exists( 'portfolio_item' ) )
		register_nav_menu( 'portfolio', esc_html__( 'Portfolio', 'neutro-child' ) );
}
?>