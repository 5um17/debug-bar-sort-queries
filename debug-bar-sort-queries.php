<?php
/**
 * Plugin Name: Debug Bar Sort Queries
 * Plugin URI: https://wpml.org/faq/how-to-debug-performance-problems/
 * Description: Debug Bar extension to sort SQL queries by execution time.
 * Version: 1.0
 * Author: 5um17
 * Text Domain: debug-bar-sort-queries
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Sort query on debug_bar_statuses filter.
 */
add_filter( 'debug_bar_statuses', function( $statuses ) {
	global $wpdb;
	
	usort( $wpdb->queries, function ( $a1, $a2 ) {
		return $a2[1] <=> $a1[1];
	});

	return $statuses;
});