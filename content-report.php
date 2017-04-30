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
						<article class="article-event">
						    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<h3><?php the_author(); ?></h3>
								<p>
									<?php the_time( get_option( 'date_format' ) ); ?> |
									<a href="<?php the_permalink() ?>"><?php if(get_the_title($post->ID)) { the_title(); } else { echo 'untitled report'; } ?></a>
								 </p>
							</div>
						</article>
						<?php endwhile; ?>
						<span class="left button-gray"><?php next_posts_link(__('<< Previous Reports', 'causes')) ?></span>
						<span class="right button-gray"><?php previous_posts_link(__('Next Reports >>', 'causes')) ?></span>
					</div>
				</div>
			</div>
			<div class="column-4-12 right">
				<div class="gutter">

				</div>
			</div>
		</div>
	</div>
</div>
