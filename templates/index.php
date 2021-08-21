<?php
/**
 * The main template file
 *
 * @package TDW
 * @subpackage Theme
 * 
 */

get_header(); ?>

<?php
if ( have_posts() ) {
	// Load posts loop.
	while ( have_posts() ) {
		the_post();

	}
} else {
	?><h2>No posts fouund!</h2><?php
}

get_footer();