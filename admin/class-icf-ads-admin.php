<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ridwan-arifandi.com
 * @since      1.0.0
 *
 * @package    Icf_Ads
 * @subpackage Icf_Ads/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Icf_Ads
 * @subpackage Icf_Ads/admin
 * @author     Ridwan Arifandi <orangerdigiart@gmail.com>
 */
class Icf_Ads_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Icf_Ads_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Icf_Ads_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/icf-ads-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Icf_Ads_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Icf_Ads_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/icf-ads-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Load carbon fields
	 * Hooked via action after_setup_theme, priority 1
	 * @since 	1.0.0
	 * @return  void
	 */
	public function load_carbon_fields()
	{
		\Carbon_Fields\Carbon_Fields::boot();
	}

	/**
	 * Set plugin options
	 * Hooked via action carbon_fields_register_fields, priority 1
	 * @since 	1.0.0
	 * @return	void
	 */
	public function setup_plugin_options()
	{
		Container::make('theme_options',	__('Ads Placement','icf-ads'))
			->add_fields([
				Field::make('checkbox',	'icf_ads_left_active',	__('Activate Left Ads','icf-ads'))
					->set_option_value('yes'),
				Field::make('rich_text','icf_ads_left_content',	__('Left Content','icf-ads')),
				Field::make('checkbox',	'icf_ads_right_active',__('Activate Right Ads','icf-ads'))
					->set_option_value('yes'),
				Field::make('rich_text','icf_ads_right_content',	__('Right Content','icf-ads')),
			]);
	}
}
