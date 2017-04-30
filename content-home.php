<?php 
/**
 * 
 * @package Causes 
 */
?>
<?php while (have_posts()) : the_post(); ?>
<div id="content" class="content">
	<div class="section-causes">
		<div class="container">
			<div class="gutter">
               <div class="owl-carousel causes-carousel">
					<div class="item">
						<div class="column-container">
							<div class="column-12-12 right">

<?php 
    $ms = get_page_by_title( '_Meta_Slider' );
    $ms_output = apply_filters( 'the_content', $ms->post_content );
    echo $ms_output;
?>

								</div>
							</div>
						</div>
					</div>			
				</div> 
			</div>
		</div>
	</div>
	<div class="section-inner-page">
		<div class="container">
			<div class="column-container">

				<div class="column-3-12 left">
					<div class="gutter">
						<nav class="sidebar-container">
							<?php if ( has_nav_menu( 'front-page-menu' ) ) { ?>
                               <h3 class="widget-title">Quick Links</h3>
							   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'front-page-menu', 'items_wrap'  => '<ul class="menu-frontpage">%3$s</ul>'  ) ); ?>
							<?php } ?>
						</nav>
					</div>
				</div>
				<div class="column-9-12 right">
					<div class="gutter">
						<div class="page-container">
							<article class="article-single">
								<?php the_content(); ?>
							</article>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>	
</div>
<?php endwhile; ?>
