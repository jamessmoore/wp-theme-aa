<?php

namespace Kirki;

class Config {

	/** @var array The configuration values for Kirki */
	private $config = null;

	/**
	 * Constructor
	 */
	public function __construct() {
	}

	/**
	 * Get a configuration value
	 *
	 * @param string $key     The configuration key we are interested in
	 * @param string $default The default value if that configuration is not set
	 *
	 * @return mixed
	 */
	public function get( $key, $default='' ) {

		$cfg = $this->get_all();
		return isset( $cfg[$key] ) ? $cfg[$key] : $default;

	}

	/**
	 * Get a configuration value or throw an exception if that value is mandatory
	 *
	 * @param string $key     The configuration key we are interested in
	 *
	 * @return mixed
	 */
	public function getOrThrow( $key ) {

		$cfg = $this->get_all();
		if ( isset( $cfg[$key] ) ) {
			return $cfg[$key];
		}

		throw new RuntimeException( sprintf( "Configuration key %s is mandatory and has not been specified", $key ) );

	}

	/**
	 * Get the configuration options for the Kirki customizer.
	 *
	 * @uses 'kirki/config' filter.
	 */
	public function get_all() {

		if ( is_null( $this->config ) ) {

			// Get configuration from the filter
			$this->config = apply_filters( 'kirki/config', array() );

			// Merge a default configuration with the one we got from the user to make sure nothing is missing
			$default_config = array(
				'stylesheet_id' => 'kirki-styles',
				'capability'    => 'edit_theme_options',
				'logo_image'    => '',
				'description'   => '',
				'url_path'      => '',
				'options_type'  => 'theme_mod',
			);
			$this->config = array_merge( $default_config, $this->config );

			$this->config['logo_image']  = esc_url_raw( $this->config['logo_image'] );
			$this->config['description'] = esc_html( $this->config['description'] );
			$this->config['url_path']    = esc_url_raw( $this->config['url_path'] );

			// Get the translation strings.
			$this->config['i18n'] = ( ! isset( $this->config['i18n'] ) ) ? array() : $this->config['i18n'];
			$this->config['i18n'] = array_merge( $this->translation_strings(), $this->config['i18n'] );

		}

		return $this->config;

	}

	/**
	 * The i18n strings
	 */
	public function translation_strings() {

		$strings = array(
			'background-color'      => __( 'Background Color',         'causes' ),
			'background-image'      => __( 'Background Image',         'causes' ),
			'no-repeat'             => __( 'No Repeat',                'causes' ),
			'repeat-all'            => __( 'Repeat All',               'causes' ),
			'repeat-x'              => __( 'Repeat Horizontally',      'causes' ),
			'repeat-y'              => __( 'Repeat Vertically',        'causes' ),
			'inherit'               => __( 'Inherit',                  'causes' ),
			'background-repeat'     => __( 'Background Repeat',        'causes' ),
			'cover'                 => __( 'Cover',                    'causes' ),
			'contain'               => __( 'Contain',                  'causes' ),
			'background-size'       => __( 'Background Size',          'causes' ),
			'fixed'                 => __( 'Fixed',                    'causes' ),
			'scroll'                => __( 'Scroll',                   'causes' ),
			'background-attachment' => __( 'Background Attachment',    'causes' ),
			'left-top'              => __( 'Left Top',                 'causes' ),
			'left-center'           => __( 'Left Center',              'causes' ),
			'left-bottom'           => __( 'Left Bottom',              'causes' ),
			'right-top'             => __( 'Right Top',                'causes' ),
			'right-center'          => __( 'Right Center',             'causes' ),
			'right-bottom'          => __( 'Right Bottom',             'causes' ),
			'center-top'            => __( 'Center Top',               'causes' ),
			'center-center'         => __( 'Center Center',            'causes' ),
			'center-bottom'         => __( 'Center Bottom',            'causes' ),
			'background-position'   => __( 'Background Position',      'causes' ),
			'background-opacity'    => __( 'Background Opacity',       'causes' ),
			'ON'                    => __( 'ON',                       'causes' ),
			'OFF'                   => __( 'OFF',                      'causes' ),
			'all'                   => __( 'All',                      'causes' ),
			'cyrillic'              => __( 'Cyrillic',                 'causes' ),
			'cyrillic-ext'          => __( 'Cyrillic Extended',        'causes' ),
			'devanagari'            => __( 'Devanagari',               'causes' ),
			'greek'                 => __( 'Greek',                    'causes' ),
			'greek-ext'             => __( 'Greek Extended',           'causes' ),
			'khmer'                 => __( 'Khmer',                    'causes' ),
			'latin'                 => __( 'Latin',                    'causes' ),
			'latin-ext'             => __( 'Latin Extended',           'causes' ),
			'vietnamese'            => __( 'Vietnamese',               'causes' ),
			'serif'                 => _x( 'Serif', 'font style',      'causes' ),
			'sans-serif'            => _x( 'Sans Serif', 'font style', 'causes' ),
			'monospace'             => _x( 'Monospace', 'font style',  'causes' ),
		);

		return $strings;

	}

}
