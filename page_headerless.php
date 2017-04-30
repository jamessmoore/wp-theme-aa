<?php
/**
 * Template Name: HTTP Headerless
 *
 * @package Causes
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		//
		// Post Content here
    the_content();
		//
	} // end while
} // end if

?>
