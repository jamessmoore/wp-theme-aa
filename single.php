<?php
/**
 * The template for displaying all pages.
 *
 * @package Causes
 */
 get_header(); ?>
 <?php while (have_posts()) : the_post(); ?>
 		<div id="content" class="content">
			<div class="section-page-title">
				<div class="container">
					<div class="gutter">
				        <h5><?php echo esc_html(get_theme_mod('pwt_blog_page',__( 'Latest Blog Posts', "causes"))); ?></h5>
					</div>
				</div>
			</div>
			<div class="section-inner-page">
				<div class="container">
					<div class="column-container">
						<div class="column-8-12 left">
							<div class="gutter">
								<div class="page-container">
									<article class="article-single">
										<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
											<div class="article-image">
												<?php the_post_thumbnail($post->ID, 'featured'); ?>
											</div>
										<?php endif; ?>
										<h2><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></h2>
										<p class="meta"><?php the_time( get_option( 'date_format' ) ); ?> / <?php the_author(); ?> / <?php the_category(', '); ?></p>
										<?php the_content(); ?>
										<div class="padinate-page"><?php wp_link_pages(); ?></div>
										<!-- <p class="meta_tags"><?php the_tags(); ?></p> -->
									    <?php //comments_template(); ?>
									</article>
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
		</div>
<?php endwhile; ?>
<?php get_footer(); ?>
