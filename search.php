<?php
/**
 * The template for displaying search
 *
 * @package Causes
 */
 get_header(); ?>
<div id="content" class="content">
	<div class="section-page-title">
		<div class="container">
			<div class="gutter">
				<h5><?php printf( __( 'Search Results for: %s', 'causes' ), '<span>' . get_search_query() . '</span>' ); ?></h5>
			</div>
		</div>
	</div> 
	<?php get_template_part( 'content', 'posts' ); ?>
</div>
<?php get_footer(); ?>