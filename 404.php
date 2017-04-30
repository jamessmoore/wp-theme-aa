<?php
/**
 * The template for displaying page NOT FOUND.
 *
 * @package Causes
 */
get_header(); ?>
<div id="content" class="content">
	<div class="section-page-title">
		<div class="container">
			<div class="gutter">
				<h5><?php _e( 'Not found', 'causes' ); ?></h5>
			</div>
		</div>
	</div>
	<div class="section-inner-page">
		<div class="container">
			<div class="column-container">
				<div class="column-12-12 left">
					<div class="gutter">
						<div class="page-container">
							<article class="article-single">
								<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'causes' ); ?></p>
							</article>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
</div> 
<?php get_footer(); ?>