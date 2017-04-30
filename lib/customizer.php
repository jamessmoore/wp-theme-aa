<?php

function causes_customizer_config() {

    $url  = get_stylesheet_directory_uri() . '/lib/kirki/';

    /**
     * If you need to include Kirki in your theme,
     * then you may want to consider adding the translations here
     * using your textdomain.
     *
     * If you're using Kirki as a plugin then you can remove these.
     */

    $strings = array(
        'background-color' => __( 'Background Color', 'causes' ),
        'background-image' => __( 'Background Image', 'causes' ),
        'no-repeat' => __( 'No Repeat', 'causes' ),
        'repeat-all' => __( 'Repeat All', 'causes' ),
        'repeat-x' => __( 'Repeat Horizontally', 'causes' ),
        'repeat-y' => __( 'Repeat Vertically', 'causes' ),
        'inherit' => __( 'Inherit', 'causes' ),
        'background-repeat' => __( 'Background Repeat', 'causes' ),
        'cover' => __( 'Cover', 'causes' ),
        'contain' => __( 'Contain', 'causes' ),
        'background-size' => __( 'Background Size', 'causes' ),
        'fixed' => __( 'Fixed', 'causes' ),
        'scroll' => __( 'Scroll', 'causes' ),
        'background-attachment' => __( 'Background Attachment', 'causes' ),
        'left-top' => __( 'Left Top', 'causes' ),
        'left-center' => __( 'Left Center', 'causes' ),
        'left-bottom' => __( 'Left Bottom', 'causes' ),
        'right-top' => __( 'Right Top', 'causes' ),
        'right-center' => __( 'Right Center', 'causes' ),
        'right-bottom' => __( 'Right Bottom', 'causes' ),
        'center-top' => __( 'Center Top', 'causes' ),
        'center-center' => __( 'Center Center', 'causes' ),
        'center-bottom' => __( 'Center Bottom', 'causes' ),
        'background-position' => __( 'Background Position', 'causes' ),
        'background-opacity' => __( 'Background Opacity', 'causes' ),
        'ON' => __( 'ON', 'causes' ),
        'OFF' => __( 'OFF', 'causes' ),
        'all' => __( 'All', 'causes' ),
        'cyrillic' => __( 'Cyrillic', 'causes' ),
        'cyrillic-ext' => __( 'Cyrillic Extended', 'causes' ),
        'devanagari' => __( 'Devanagari', 'causes' ),
        'greek' => __( 'Greek', 'causes' ),
        'greek-ext' => __( 'Greek Extended', 'causes' ),
        'khmer' => __( 'Khmer', 'causes' ),
        'latin' => __( 'Latin', 'causes' ),
        'latin-ext' => __( 'Latin Extended', 'causes' ),
        'vietnamese' => __( 'Vietnamese', 'causes' ),
        'serif' => _x( 'Serif', 'font style', 'causes' ),
        'sans-serif' => _x( 'Sans Serif', 'font style', 'causes' ),
        'monospace' => _x( 'Monospace', 'font style', 'causes' ),
    );

	$args = array(

        // Change the logo image. (URL) Point this to the path of the logo file in your theme directory
        // The developer recommends an image size of about 250 x 250

		'logo_image'   => get_template_directory_uri() . '/assets/images/logo.png',

        // The color of active menu items, help bullets etc.
        'color_active' => '#95c837',

		// Color used on slider controls and image selects
		'color_accent' => '#e7e7e7',

        // Color used for secondary elements and desable/inactive controls
        'color_light'  => '#e7e7e7',

        // Color used for button-set controls and other elements
        'color_select' => '#34495e',

        // For the parameter here, use the handle of your stylesheet you use in wp_enqueue
        'stylesheet_id' => 'customize-styles',

        // Only use this if you are bundling the plugin with your theme (see above)
        'url_path'     => get_template_directory_uri() . '/lib/kirki/',

        'textdomain'   => 'causes',

        'i18n'         => $strings,
	);
	return $args;
}
add_filter( 'kirki/config', 'causes_customizer_config' );


/**
 * Create the customizer panels and sections
 */
add_action( 'customize_register', 'causes_add_panels_and_sections' );
function causes_add_panels_and_sections( $wp_customize ) {

	//Add panels

	$wp_customize->add_panel('slider',               array( 'title' => __( 'Slider', 'causes' ),                  'description' => __( 'Slides details', 'causes' ),          'priority' => 140));
	$wp_customize->add_panel('causelist',            array( 'title' => __( 'Cause List', 'causes' ),              'description' => __( 'Cause list details', 'causes' ),      'priority' => 150));

    // Add Sections

    $wp_customize->add_section('basic',               array('title' => __('Basic Settings', 'causes'),            'description' => '',                                         'priority' => 130,));
    $wp_customize->add_section('coloroptions',        array('title' => __('Color Options', 'causes'),             'description' => '',                                         'priority' => 130,));
    $wp_customize->add_section('blogpage',            array('title' => __('Default Blog Page', 'causes'),         'description' => '',                                         'priority' => 160,));

	// slider sections

	$wp_customize->add_section('slide1',              array('title' => __('Slide 1', 'causes'),                   'description' => '',             'panel' => 'slider',		'priority' => 140,));
	$wp_customize->add_section('slide2',              array('title' => __('Slide 2', 'causes'),                   'description' => '',             'panel' => 'slider',		'priority' => 140,));

	// Cause sections

	$wp_customize->add_section('cause',               array('title' => __('Cause Settings', 'causes'),            'description' => '',             'panel' => 'causelist',		'priority' => 140,));
	$wp_customize->add_section('cause1',              array('title' => __('Cause 1', 'causes'),                   'description' => '',             'panel' => 'causelist',		'priority' => 140,));
	$wp_customize->add_section('cause2',              array('title' => __('Cause 2', 'causes'),                   'description' => '',             'panel' => 'causelist',		'priority' => 140,));
	$wp_customize->add_section('cause3',              array('title' => __('Cause 3', 'causes'),                   'description' => '',             'panel' => 'causelist',		'priority' => 140,));

	// promo sections

	$wp_customize->add_section('promo',               array('title' => __('About Causes Theme', 'causes'),        'description' => '',                                         'priority' => 170,));
}


function causes_custom_setting( $controls ) {

    $copyrights = sprintf( __('Copyright &copy; '.date('Y').' %s All Rights Reserved.', 'causes'), get_bloginfo('name') );

     // Color

	 $controls[] = array('label' => __('General Color', 'causes'),                         'setting' => 'pwt_ceneral_color',               'type' => 'color',             'default' => '#486a14',                                   'section' => 'colors',              'description' => '',     'priority' => 1);
	 $controls[] = array('label' => __('Second Color', 'causes'),                          'setting' => 'pwt_second_color',                'type' => 'color',             'default' => '#e7d569',                                   'section' => 'colors',              'description' => '',    'priority' => 1);	 
	 $controls[] = array('label' => __('Third Color', 'causes'),                          'setting' => 'pwt_third_color',                'type' => 'color',             'default' => '#353535',                                   'section' => 'colors',              'description' => '',    'priority' => 1);

     // Basic

	 $controls[] = array('label' => __('Upload Logo', 'causes'),                'setting' => 'pwt_logo_upload',                 'type' => 'upload',            'default' => '',                                           'section' => 'basic',             'description' => __('For best effect logo image should be transparent png, logo from live preview has 240x70px but you can use bigger', 'causes' ));
	 $controls[] = array('label' => __('Logo Text Color', 'causes'),            'setting' => 'pwt_text_logo_1',                 'type' => 'text',              'default' => __('Causes', 'causes' ),                    'section' => 'basic',             'description' => __('Add text color for logo', 'causes' ));
     $controls[] = array('label' => __('Logo Text Black', 'causes'),            'setting' => 'pwt_text_logo_2',                 'type' => 'text',              'default' => __('Theme', 'causes' ),                      'section' => 'basic',             'description' => __('Add text black for logo', 'causes' ));
	 $controls[] = array('label' => __('Upload Favicon ', 'causes'),            'setting' => 'pwt_favicon_upload',              'type' => 'upload',            'default' => '',                                           'section' => 'basic',             'description' => __('Upload favicon here (16x16)', 'causes' ));
	 $controls[] = array('label' => __('Copyrights text', 'causes'),            'setting' => 'pwt_copyrights',                  'type' => 'text',              'default' => $copyrights,                                  'section' => 'basic',             'description' => __('Text in footer left' , 'causes' ));
	 $controls[] = array('label' => __('Center Box Title', 'causes'),           'setting' => 'pwt_center_box_title',            'type' => 'text',              'default' => __('Latest Sermon', 'causes' ),              'section' => 'basic',             'description' => '' );
	 $controls[] = array('label' => __('Center Box SubTitle', 'causes'),        'setting' => 'pwt_center_box_subtitle',         'type' => 'text',              'default' => __('The open invitation', 'causes' ),        'section' => 'basic',             'description' => '' );
	 $controls[] = array('label' => __('Center Box Button Text', 'causes'),     'setting' => 'pwt_center_box_button_text',      'type' => 'text',              'default' => __('Download Sermon', 'causes' ),            'section' => 'basic',             'description' => '' );
	 $controls[] = array('label' => __('Center Box Button Link', 'causes'),     'setting' => 'pwt_center_box_button_link',      'type' => 'text',              'default' => '',                                           'section' => 'basic',             'description' => '' );
	 $controls[] = array('label' => __('Blog page title', 'causes'),            'setting' => 'pwt_blog_page',                   'type' => 'text',              'default' => __('Latest Blog Posts', 'causes' ),          'section' => 'basic',             'description' => ''  );

     // Slide 1

	 $controls[] = array('label' => __('Title', 'causes'),                      'setting' => 'pwt_title_1',                     'type' => 'text',              'default' => __('Welcome To Causes Theme', 'causes' ),   'section' => 'slide1',             'description' => '');
	 $controls[] = array('label' => __('Title Content', 'causes'),              'setting' => 'pwt_title_content1',              'type' => 'text',              'default' => __('Help 100 children', 'causes' ),          'section' => 'slide1',             'description' => '');
	 $controls[] = array('label' => __('Content of slide', 'causes'),           'setting' => 'pwt_slider_description1',         'type' => 'textarea',          'default' => '',                           'section' => 'slide1',             'description' => '');
	 $controls[] = array('label' => __('Upload Image', 'causes'),               'setting' => 'pwt_slider_image_upload1',        'type' => 'upload',            'default' => '',                                           'section' => 'slide1',             'description' => __('Upload image for slide', 'causes' ));
	 $controls[] = array('label' => __('Button Text', 'causes'),                'setting' => 'pwt_button_color_text1',          'type' => 'text',              'default' => __('Read More', 'causes' ),                  'section' => 'slide1',             'description' => '' );
	 $controls[] = array('label' => __('Button Link', 'causes'),                'setting' => 'pwt_button_color_link1',          'type' => 'text',              'default' => '',                                           'section' => 'slide1',             'description' => '' );

     // Slide 2

	 $controls[] = array('label' => __('Title', 'causes'),                      'setting' => 'pwt_title_2',                    'type' => 'text',              'default' => __('Welcome To Causes Theme', 'causes' ),    'section' => 'slide2',             'description' => '');
	 $controls[] = array('label' => __('Title Content', 'causes'),              'setting' => 'pwt_title_content2',             'type' => 'text',              'default' => __('Help 100 children', 'causes' ),           'section' => 'slide2',             'description' => '');
	 $controls[] = array('label' => __('Content of slide', 'causes'),           'setting' => 'pwt_slider_description2',        'type' => 'textarea',          'default' => '',                                'section' => 'slide2',             'description' => '');
	 $controls[] = array('label' => __('Upload Image', 'causes'),               'setting' => 'pwt_slider_image_upload2',       'type' => 'upload',            'default' => '',                                            'section' => 'slide2',             'description' => __('Upload image for slide', 'causes' ));
	 $controls[] = array('label' => __('Button Text', 'causes'),                'setting' => 'pwt_button_color_text2',         'type' => 'text',              'default' => __('Read More', 'causes' ),                   'section' => 'slide2',             'description' => '' );
	 $controls[] = array('label' => __('Button Link', 'causes'),                'setting' => 'pwt_button_color_link2',         'type' => 'text',              'default' => '',                                            'section' => 'slide2',             'description' => '' );

	 // Cause

	 $controls[] = array('label' => __('Cause Title', 'causes'),                'setting' => 'pwt_box_title',                  'type' => 'text',              'default' => __('Cause List', 'causes' ),                  'section' => 'cause',              'desc' => '' );
	 $controls[] = array('label' => __('Cause Sub Title', 'causes'),            'setting' => 'pwt_box_subtitle',               'type' => 'text',              'default' => __('Lorem ipsum dolor', 'causes' ),           'section' => 'cause',              'desc' => '' );

     // Cause 1

	 $controls[] = array('label' => __('Title', 'causes'),                      'setting' => 'pwt_title_color1',               'type' => 'text',              'default' => __('Drought and Hunger', 'causes' ),          'section' => 'cause1',             'description' => '');
	 $controls[] = array('label' => __('Enter Icon', 'causes'),                 'setting' => 'pwt_cause_icons1',               'type' => 'upload',            'default' => '',                                            'section' => 'cause1',             'description' => __('Recommended icons white and transparent', 'causes' ));
	 $controls[] = array('label' => __('Content of Box', 'causes'),             'setting' => 'pwt_cause_description1',         'type' => 'textarea',          'default' => '',                                 'section' => 'cause1',             'description' => '');
	 $controls[] = array('label' => __('Link of Box', 'causes'),                'setting' => 'pwt_cause_link1',                'type' => 'text',              'default' => '',                                            'section' => 'cause1',             'description' => '');
	 $controls[] = array('label' => __('Button Text', 'causes'),                'setting' => 'pwt_button_text1',               'type' => 'text',              'default' => __('Read More', 'causes' ),                   'section' => 'cause1',             'description' => '' );

     // Cause 2

	 $controls[] = array('label' => __('Title', 'causes'),                      'setting' => 'pwt_title_color2',               'type' => 'text',              'default' => __('Drought and Hunger', 'causes' ),          'section' => 'cause2',             'description' => '');
	 $controls[] = array('label' => __('Enter Icon', 'causes'),                 'setting' => 'pwt_cause_icons2',               'type' => 'upload',            'default' => '',                                            'section' => 'cause2',             'description' => __('Recommended icons white and transparent', 'causes' ));
	 $controls[] = array('label' => __('Content of Box', 'causes'),             'setting' => 'pwt_cause_description2',         'type' => 'textarea',          'default' => '',                                  'section' => 'cause2',             'description' => '');
	 $controls[] = array('label' => __('Link of Box', 'causes'),                'setting' => 'pwt_cause_link2',                'type' => 'text',              'default' => '',                                            'section' => 'cause2',             'description' => '');
	 $controls[] = array('label' => __('Button Text', 'causes'),                'setting' => 'pwt_button_text2',               'type' => 'text',              'default' => __('Read More', 'causes' ),                   'section' => 'cause2',             'description' => '' );

     // Cause 3

	 $controls[] = array('label' => __('Title', 'causes'),                      'setting' => 'pwt_title_color3',               'type' => 'text',              'default' => __('Drought and Hunger', 'causes' ),          'section' => 'cause3',             'description' => '');
	 $controls[] = array('label' => __('Enter Icon', 'causes'),                 'setting' => 'pwt_cause_icons3',               'type' => 'upload',            'default' => '',                                            'section' => 'cause3',             'description' => __('Recommended icons white and transparent', 'causes' ));
	 $controls[] = array('label' => __('Content of Box', 'causes'),             'setting' => 'pwt_cause_description3',         'type' => 'textarea',          'default' => '',                                 'section' => 'cause3',             'description' => '');
	 $controls[] = array('label' => __('Link of Box', 'causes'),                'setting' => 'pwt_cause_link3',                'type' => 'text',              'default' => '',                                            'section' => 'cause3',             'description' => '');
	 $controls[] = array('label' => __('Button Text', 'causes'),                'setting' => 'pwt_button_text3',               'type' => 'text',              'default' => __('Read More', 'causes' ),                   'section' => 'cause3',             'description' => '' );


     // Promo
	 $controls[] = array('label' => __( 'Causes Promo', 'causes' ),            'setting' => 'custompromo',                    'type' => 'promo',                                                                         'section' => 'promo',              'priority' => 10);

     return $controls;
}
add_filter( 'kirki/controls', 'causes_custom_setting' );
