<?php
/**
 * Custom Functions.
 *
 * @package Aquila Features.
 */

/**
 * Get plugin template.
 *
 * @param string $template  Name or path of the template within /templates folder without php extension.
 * @param array  $variables pass an array of variables you want to use in template.
 * @param bool   $echo      Whether to echo out the template content or not.
 *
 * @return string|void Template markup.
 */
function aquila_features_get_template( string $template, array $variables = [], bool $echo = false ) {

	$template_file = sprintf( '%1$s/templates/%2$s.php', AQUILA_FEATURES_PLUGIN_PATH, $template );

	if ( ! file_exists( $template_file ) ) {
		return '';
	}

	if ( ! empty( $variables ) && is_array( $variables ) ) {
		extract( $variables, EXTR_SKIP ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract -- Used as an exception as there is no better alternative.
	}

	ob_start();

	include $template_file; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable

	$markup = ob_get_clean();

	if ( ! $echo ) {
		return $markup;
	}

	echo $markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Output escaped already in template.

}

if ( ! function_exists( 'course' ) ) {
    function course() {
 
        $labels = array(
            'name'                => _x( 'Course', 'Post Type General Name', 'course' ),
            'singular_name'       => _x( 'Course', 'Post Type Singular Name', 'course' ),
            'menu_name'           => __( 'Course', 'course' ),
            'parent_item_colon'   => __( 'Parent course', 'course' ),
            'all_items'           => __( 'All courses', 'course' ),
            'view_item'           => __( 'Veiw course', 'course' ),
            'add_new_item'        => __( 'Add new course', 'course' ),
            'add_new'             => __( 'Add new', 'course' ),
            'edit_item'           => __( 'Edit course', 'course' ),
            'update_item'         => __( 'Update course', 'course' ),
            'search_items'        => __( 'Search courses', 'course' ),
            'not_found'           => __( 'Not found', 'course' ),
            'not_found_in_trash'  => __( 'Not found in trash', 'course' ),
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
            'taxonomies'          => array( 'course_type', 'campus' ), 
            'public'              => true,
            'show_in_rest'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-video-alt2',
        );
        register_post_type( 'course', $args );
 
    }
 
    add_action( 'init', 'course', 0); 
 
}

if ( ! function_exists( 'course_type' ) ) {
 
    function course_type() {
        $labels = array(
            'name'                       => _x( 'Course type', 'Taxonomy General Name', 'course' ),
            'singular_name'              => _x( 'Course type', 'Taxonomy Singular Name', 'course' ),
            'menu_name'                  => __( 'Course type', 'course' ),
            'all_items'                  => __( 'Course types', 'course' ),
            'parent_item'                => __( 'Parent course type', 'course' ),
            'parent_item_colon'          => __( 'Parent course type', 'course' ),
            'new_item_name'              => __( 'New course type', 'course' ),
            'add_new_item'               => __( 'Add course type', 'course' ),
            'edit_item'                  => __( 'Edit course type', 'course' ),
            'update_item'                => __( 'Update course type', 'course' ),
            'search_items'               => __( 'Search', 'course' ),
            'add_or_remove_items'        => __( 'Add or remove course type', 'course' ),
            'choose_from_most_used'      => __( 'Choose from most used', 'course' ),
            'not_found'                  => __( 'Not found', 'course' ),
        );	  
		$args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
			'show_in_rest'      		 => true,
        );
        register_taxonomy( 'course_type', array( 'course' ), $args );
 
    }
 
    add_action( 'init', 'course_type', 0); 
}

if ( ! function_exists( 'campus' ) ) {
 
    function campus() {
        $labels = array(
            'name'                       => _x( 'Campus', 'Taxonomy General Name', 'course' ),
            'singular_name'              => _x( 'Campus', 'Taxonomy Singular Name', 'course' ),
            'menu_name'                  => __( 'Campus', 'course' ),
            'all_items'                  => __( 'Campus', 'course' ),
            'parent_item'                => __( 'Campus', 'course' ),
            'parent_item_colon'          => __( 'Campus:', 'course' ),
            'new_item_name'              => __( 'New campus', 'course' ),
            'add_new_item'               => __( 'Add campus', 'course' ),
            'edit_item'                  => __( 'Edit campus', 'course' ),
            'update_item'                => __( 'Refresh campus', 'course' ),
            'search_items'               => __( 'Search', 'course' ),
            'add_or_remove_items'        => __( 'Add or remove campus', 'course' ),
            'choose_from_most_used'      => __( 'Choose from most used campus', 'course' ),
            'not_found'                  => __( 'Not found', 'course' ),
        );	  
		$args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
			'show_in_rest'     			 => true,
			'query_var' 				 => true,
        );
        register_taxonomy( 'campus', array( 'course' ), $args );
 
    }
 
    add_action( 'init', 'campus', 0); 
}