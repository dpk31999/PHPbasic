<?php 
/*
 * Template Name: Home Page
 */
if ( is_page_template() ) {
	
	get_header();
		
		do_action( 'jewelry_store_sections', false );

		get_template_part('section-all/section-blog');

		get_template_part('section-all/section-contact');
		
	get_footer();
	
} else {
	
	include get_page_template();
	
}