<?php
/**
 *	@package PDFRenderer\Core
 *	@version 1.0.0
 *	2018-09-22
 */

namespace McGuffin\Core;

if ( ! defined('ABSPATH') ) {
	die('FU!');
}

use McGuffin\Core;

abstract class Theme extends Core\Singleton implements Core\CoreInterface {

	/**
	 *	@inheritdoc
	 */
	protected function __construct() {

		add_action( 'after_setup_theme', array( $this, 'setup' ) );

	}


	/**
	 *	@action after_setup_theme
	 */
	abstract public function setup();


	/**
	 *	@inheritdoc
	 */
	public function version() {

		return wp_get_theme()->Version;

	}

	/**
	 *	@inheritdoc
	 */
	public function get_asset_roots() {
		return [
			get_stylesheet_directory() => get_stylesheet_directory_uri(),
			get_template_directory() => get_template_directory_uri(),
		];
	}

}
