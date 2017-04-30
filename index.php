<?php
/**
 * The main template file.
 *
 * @package Causes
 */
get_header(); ?>
<div id="content" class="content">
	<div class="section-page-title">
		<div class="container">
			<div class="gutter">
				<h5><?php echo esc_html(get_theme_mod('pwt_blog_page',__( 'Latest Blog Posts', "causes"))); ?></h5>
			</div>
		</div>
	</div>
	<?php get_template_part( 'content', 'posts' ); ?>
</div>
<?php get_footer(); ?>