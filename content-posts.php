<?php 
/**
 * 
 * @package Causes 
 */
?>
<div class="section-inner-page">
	<div class="container">
		<div class="column-container">
			<div class="column-8-12 left">
				<div class="gutter">
					<div class="page-container">
						<?php while (have_posts()) : the_post(); ?>
						<article class="article-blog">
						    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
								<div class="article-image">	
									<div class="img-container">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail($post->ID, 'featured'); ?></a>	
									</div>
								</div>	
								<?php endif; ?>
								<h2><a href="<?php the_permalink() ?>"><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></a></h2>
								<p class="meta"><?php the_time( get_option( 'date_format' ) ); ?> / <?php the_author(); ?> / <?php the_category(', '); ?></p>
								<?php the_excerpt(); ?>
								<p class="more"><a class="button" href="<?php the_permalink() ?>"><?php _e( 'Read More', 'causes' ); ?></a></p>
							</div>
						</article>								
						<?php endwhile; ?>		
						<span class="left button-gray"><?php next_posts_link(__('Previous Posts', 'causes')) ?></span>
						<span class="right button-gray"><?php previous_posts_link(__('Next posts', 'causes')) ?></span>						
					</div>
				</div>
			</div>
			<div class="column-4-12 right">
				<div class="gutter">
					<?php  get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
</div>