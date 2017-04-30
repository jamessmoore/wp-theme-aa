<?php
/**
 * The template for displaying category
 *
 *
 * @package Causes
 */
get_header(); ?>
<div id="content" class="content">
	<div class="section-page-title">
		<div class="container">
			<div class="gutter">
				<h5><?php printf( __( '%s', 'causes' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h5>
			</div>
		</div>
	</div>
	<?php get_template_part( 'content', 'posts' ); ?>
</div>
<?php get_footer(); ?>
