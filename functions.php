<?php
/**
 * Causes functions and definitions
 *
 * @package Causes
 */

/*
 * Loads the Options Panel
 *
 */

/*----------------------------*/
/*	Adding customizer with kirki
/*----------------------------*/
include_once( trailingslashit(get_template_directory()) . '/lib/customizer.php' );
include_once( trailingslashit(get_template_directory()) . '/lib/kirki/kirki.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @see http://developer.wordpress.com/themes/content-width/Enqueue
 */

if ( ! isset( $content_width ) ) {
	$content_width = 970; /* pixels */
}


/**
 * Theme support and thumbnail sizes
*/

if( ! function_exists( 'causes_theme_setup' ) ) {

	function causes_theme_setup() {

		/* Change default image editors */
		add_filter( 'wp_image_editors', 'change_graphic_lib' );
		function change_graphic_lib($array) {
  		return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
		}
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on BuildPress, use a find and replace
		 */

		load_theme_textdomain( 'causes', get_template_directory() . '/lang' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add default title support
		add_theme_support( 'title-tag' );

        // show admin bar only for admins
        if (!current_user_can('manage_options')) {
            add_filter('show_admin_bar', '__return_false');
        }

		// Custom Backgrounds
		add_theme_support( 'custom-background', array(
			'default-color' => 'ffffff',
		) );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */

		add_theme_support('post-thumbnails');
		set_post_thumbnail_size( 150, 150, true);
		add_image_size('causes-news-box', 220, 154, true);
		add_image_size('causes-slider-box', 531, 428, true);

		// Menus
		add_theme_support( 'menus' );
		register_nav_menu( 'top-menu', _x( 'Top Menu', 'backend', 'causes' ) );
		register_nav_menu( 'main-menu', _x( 'Main Menu', 'backend', 'causes' ) );
		register_nav_menu( 'front-page-menu', _x( 'Front Page Menu', 'backend', 'causes' ) );
		register_nav_menu( 'pubsub-member-menu', _x( 'Public Member Sub Menu', 'backend', 'causes' ) );
		register_nav_menu( 'pubsub-agents-menu', _x( 'Public Agents Sub Menu', 'backend', 'causes' ) );
		register_nav_menu( 'secure-members-menu', _x( 'Secure Members Menu', 'backend', 'causes' ) );
		register_nav_menu( 'secure-agents-menu', _x( 'Secure Agents Menu', 'backend', 'causes' ) );
		register_nav_menu( 'footer-menu', _x( 'Footer Menu', 'backend', 'causes' ) );


		// Add theme support for Semantic Markup
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		// Add CSS for the TinyMCE editor
		add_editor_style();


	}
	add_action( 'after_setup_theme', 'causes_theme_setup' );
}


/**
 * Enqueue CSS stylesheets
 */

if( ! function_exists( 'causes_enqueue_styles' ) ) {
	function causes_enqueue_styles() {

		// owl carousel
		wp_enqueue_style( 'causes-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '1.0' );

		// owl theme
		wp_enqueue_style( 'causes-owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.css', array(), '1.0' );

		// font awesome
		wp_enqueue_style( 'causes-transitions', get_template_directory_uri() . '/assets/css/owl.transitions.css', array(), '1.0' );

		// main style
	  wp_enqueue_style( 'causes-style', get_stylesheet_uri() );

	}
	add_action( 'wp_enqueue_scripts', 'causes_enqueue_styles' );
}


/**
 * Enqueue JS scripts
 */

if( ! function_exists( 'causes_enqueue_scripts' ) ) {
	function causes_enqueue_scripts() {

		// OWL carousel for sliders
		wp_enqueue_script( 'causes-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), null );

		// main for script js
		wp_enqueue_script( 'causes-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null );


		// for nested comments
		if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'causes_enqueue_scripts' );
}

// load script for  IE9

function causes_ie_support_header() {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/assets/js/html5.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}

add_action( 'wp_head', 'causes_ie_support_header', 1 );

/**
 * Register sidebars for Causes
 *
 * @package Causes
 */

function causes_sidebars() {

	// Blog Sidebar

	register_sidebar(array(
		'name' => __( 'Blog Sidebar', "causes"),
		'id' => 'blog-sidebar',
		'description' => __( 'Sidebar on the blog layout.', "causes"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

	// Footer Sidebar

	register_sidebar(array(
		'name' => __( 'Footer Widget Area 1', "causes"),
		'id' => 'footer-widget-area-1',
		'description' => __( 'The footer widget area 1', "causes"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 2', "causes"),
		'id' => 'footer-widget-area-2',
		'description' => __( 'The footer widget area 2', "causes"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 3', "causes"),
		'id' => 'footer-widget-area-3',
		'description' => __( 'The footer widget area 3', "causes"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 4', "causes"),
		'id' => 'footer-widget-area-4',
		'description' => __( 'The footer widget area 4', "causes"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}

add_action( 'widgets_init', 'causes_sidebars' );

// Custom CSS Output

if (!function_exists('causes_custom_styles')) {
		function causes_custom_styles() {

			$main_color = "#3391AD";
			$second_color = "#E7D569";
			$third_color = "#353535";
			$background_color = "#f7f7f7";
	    $main_color = esc_attr(get_theme_mod('pwt_ceneral_color', $main_color));
			$second_color = esc_attr(get_theme_mod('pwt_second_color', $second_color));
			$third_color = esc_attr(get_theme_mod('pwt_third_color', $third_color));
			$background_color = esc_attr(get_theme_mod('background-color', $background_color));

			//ob_start();

			echo '<style type="text/css">'. "\n";
			echo '.color-main, a, h1, h1 a, .article-blog h2 a:hover, .article-single h2 a:hover, .article-cause h2 a:hover, .article-news h2 a:hover, .events-list h2 a:hover, .widget-events h2 a:hover, .article-event h2 a:hover, h6 a:hover, .meta a:hover, a.meta-clock:hover, a.meta-location:hover, a.meta-phone:hover, a.meta-email:hover, .widget-archives a:hover { color: '.$main_color.';}';
			echo '.border-main, .pagination a:hover, .section-articles h4:after, .contact-info-block h4:after, .social-media-block h4:after, .sidebar-container h3 { border-color: '.$second_color.'; }';
			echo '.bg-main, .menu-top-bar a:hover, .menu-top a:hover, .menu-top .current-menu-item a:hover, .menu-top a.hover, .menu-top .current-menu-item a.hover, .menu-top .sub-menu, .icon-search, .icon-menu span, .button:hover, .button-styled:hover, .buttom-download, a.icon-disc:hover, .pagination a:hover, input#submit, .button-form, .wpcf7-submit { background-color: '.$third_color.'; }';
			echo '.sidebar-container .search-submit:hover, .footer .widget .search-submit:hover{ background-color: '.$main_color.'; }';
			echo '.copyright-block { background-color: '.$main_color.'; }';
			echo '.top-bar a:hover { color: '.$second_color.';}';
			echo '.menu-top-bar li, .menu-contact li { border-color: '.$main_color.'; }';
			echo '.color-main-dark, .menu-top-mob a:hover { color: '.$main_color.'; }';
			echo '.border-main-dark { border-color: '.$second_color.'; }';
			echo '.date { background-color:  '.$second_color.'; }';
			echo '.bg-main-dark, .top-bar, .menu-top-bar, .menu-contact, input.icon-search:hover, .icon-menu:hover span, .buttom-download:hover, .sidebar-container h3, .section-contact-form, .footer { background-color: '.$main_color.'; }';
			echo '.bg-main-dark, .top-bar, .menu-top-bar, .section-causes, .section-contact-form { background-color: '.$third_color.'; }';
			echo 'blockquote { border-left: 5px solid '.$second_color.'; }';
			echo 'th { background: none repeat scroll 0 0 '.$third_color.'; border: 1px solid '.$third_color.'; }';
			echo 'abbr, acronym, dfn { border-bottom: 1px dotted '.$second_color.'; }';
			echo '.sidebar-container .search-submit{ background-color: '.$main_color.';}';
			echo '.footer .widget .search-submit{ background-color: '.$second_color.'; }';
			echo '.footer h3, .footer h3 a, .widget-menu-footer .current-menu-item a, .widget-menu-footer a:hover, .widget-tweets a:hover, .copyright-block a:hover { color: '.$main_color.'; }';
			echo '.footer .widget li a:hover{ color: '.$main_color.'; }';
			// TeamWeb customizations
			echo '.slide-title, .button-styled, .section-page-title, .section-download { background-color: '.$third_color.' }';
			echo '.menu-top a { background-color: '.$main_color.'; }';
			echo '.menu-top .current-menu-item a { background-color: '.$main_color.'; }';
			echo '.menu-top .sub-menu li { border-color: '.$second_color.'; }';
			echo '.menu-top .sub-menu a { padding: 10px 6px; white-space: normal; color: '.$background_color.'; background-color: '.$third_color.';}';
			echo '.menu-top .sub-menu a:hover { color: '.$second_color.'; }';
			echo '.menu-frontpage { background-color: '.$third_color.';}';
			echo '.button:hover { color: '.$main_color.'; }';
			echo "</style>". "\n";

			//$output = ob_get_clean();
			//return $output;
		}
	add_action('wp_head', 'causes_custom_styles');
}

// Create Function Credits

if ( ! function_exists( 'causes_credits' ) ) :
	function causes_credits() {
		$text =  __( 'Site design by ', "causes").'<a href="http://www.teamweb.us/">'.__( 'TeamWeb', "causes").'</a>';
		echo apply_filters( 'causes_credits_text', $text) ;
	}
endif;

add_action( 'causes_display_credits', 'causes_credits' );

function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png);
        -webkit-background-size: 164px;
        background-size: 164px;
        background-position: center top;
        background-repeat: no-repeat;
        height:132px;
        font-size: 20px;
        line-height: 1.3em;
        margin: 0 auto 25px;
        padding: 0;
        width: 164px;
        text-indent: -9999px;
        outline: 0;
        display: block;
        }
    .login #nav {
        display: none;
    }
    </style>

<?php }

add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return get_option('blogtitle', "Adjusting Alternatives, LLC.");
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


function wps_add_login_logout_link($items, $args) {

    $login = __('Log-in');
    $logout = __('Log-out');

		$redirect = my_login_logo_url();

    //use one of the following methods of identification
    $menu_id = '20';
    $menu_name = 'top-menu'; //name you gave to the menu
    $menu_slug = 'top_menu'; //slug of the menu, generally menu_name reduced to lowercase

    if ( ! is_user_logged_in() )
    $link = '<a href="' . esc_url( wp_login_url($redirect) ) . '">' . $login . '</a>';
    else
    $link = '<a href="' . esc_url( wp_logout_url($redirect) ) . '">' . $logout . '</a>';

    if ( ($menu_id) && ($args->menu->term_id == $menu_id) )
    $items .= '<li>'. $link .'</li>';
    elseif ( ($menu_name) && ($args->menu->name == $menu_name) )
    $items .= '<li>'. $link .'</li>';
    elseif ( ($menu_slug) && ($args->menu->slug == $menu_slug) )
    $items .= '<li>'. $link .'</li>';

    return $items;
}
add_filter('wp_nav_menu_items', 'wps_add_login_logout_link', 10, 2);

// example custom post type
function codex_report_init() {
	$labels = array(
		'name'               => _x('Reports', 'post type general name', 'your-plugin-textdomain'),
		'singular_name'      => _x('Report', 'post type singular name', 'your-plugin-textdomain'),
		'menu_name'          => _x('Reports', 'admin menu', 'your-plugin-textdomain'),
		'name_admin_bar'     => _x('Report', 'add new on admin bar', 'your-plugin-textdomain'),
		'add_new'            => _x('Add New', 'report', 'your-plugin-textdomain'),
		'add_new_item'       => __('Add New Report', 'your-plugin-textdomain'),
		'new_item'           => __('New Report', 'your-plugin-textdomain'),
		'edit_item'          => __('Edit Report', 'your-plugin-textdomain'),
		'view_item'          => __('View Report', 'your-plugin-textdomain'),
		'all_items'          => __('All Reports', 'your-plugin-textdomain'),
		'search_items'       => __('Search Reports', 'your-plugin-textdomain'),
		'parent_item_colon'  => __('Parent Reports:', 'your-plugin-textdomain'),
		'not_found'          => __('No reports found.', 'your-plugin-textdomain'),
		'not_found_in_trash' => __('No reports found in Trash.', 'your-plugin-textdomain'),
	);
	$args = array(
		'labels'             => $labels,
		'taxonomies'         => array('category'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'report'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields')
	);
	register_post_type('report', $args);
}
add_action('init', 'codex_report_init');


?>
