<?php
/**
 * Template Name: Account Home Template
 *
 * @package Causes
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
  get_header(); ?>
 <?php while (have_posts()) : the_post(); ?>
 		<div id="content" class="content">
			<div class="section-page-title">
				<div class="container">
					<div class="gutter">
				        <h5><?php the_title(); ?></h5>
					</div>
				</div>
			</div>
			<div class="section-inner-menu">
                                <div class="container menu-secure-container">
<?php
$user = wp_get_current_user();
if ( has_nav_menu( 'secure-agents-menu' ) && (in_array( 'agent', (array) $user->roles ))) { 
    wp_nav_menu( array('container'=> '', 'theme_location' => 'secure-agents-menu', 'items_wrap'  => '<ul class="menu-secure">%3$s</ul>'  ) ); 
} 

if ( has_nav_menu( 'secure-members-menu' ) && (in_array( 'member', (array) $user->roles ))) { 
    wp_nav_menu( array('container'=> '', 'theme_location' => 'secure-members-menu', 'items_wrap'  => '<ul class="menu-secure">%3$s</ul>'  ) ); 
}
?>
                                </div>
			</div>
			<div class="section-inner-page">
				<div class="container">
					<div class="column-container">
						<div class="column-12-12 left">
							<div class="gutter">
								<div class="page-container">

									<article class="article-single">
										<?php the_content(); ?>            

<?php // Check if PDF Export Plugin exists first
if( function_exists('simple_pdf_export_process')) { ?>
    <ul class="nav nav-tabs pull-right pdf_export_menu">
        <li role="presentation" class="dropdown">
        <a class="dropdown-toggle btn" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Export Posts to PDF <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <?php
                    $post_type_to_export = 'page';
                    $final_pdf = SIMPLE_PDF_EXPORTER_EXPORT.$post_type_to_export.SIMPLE_PDF_EXPORTER_EXTRA_FILE_NAME.date('dMY').'.pdf';
                    if(file_exists($final_pdf)) {
                        $file_date = date("d M Y - H:i", filemtime($final_pdf));
                        ?>
                        <li><a class="" href="?export=pdf&post_type=page&num=3" target="_blank">Download Existing Version <small>(<?php echo $file_date; ?> GMT)</small></a></li>
                <?php } ?>
                <li><a class="" href="?export=pdf&post_type=page&num=3&force" target="_blank">Generate New Version <small>(might take several minutes)</small></a></li>
            </ul>
        </li>
    </ul>
<?php } ?>               
              
									</article>

									<p><?php posts_nav_link(); ?></p>
									<div class="padinate-page"><?php wp_link_pages(); ?></div> 	 									
									<?php comments_template(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php endwhile; ?>
<?php get_footer(); ?>
