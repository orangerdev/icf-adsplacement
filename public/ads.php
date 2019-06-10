<?php
namespace ICF\Front;


class Ads
{
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
	 * Ads setup data
	 *
	 * @since 	1.0.0
	 * @access 	protected
	 * @var		array
	 */
	protected $ads;

	/**
	 * Set if ads if active or not
	 *
	 * @since 	1.0.0
	 * @access	protected
	 * @var		boolean
	 */
	protected $ads_active = false;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version )
	{
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Get setup data
	 * Hooked via action template_redirect, priority 999
	 * @since	1.0.0
	 * @return 	void
	 */
	public function get_setup()
	{
		$this->ads	= [
			'left'	=> [
				'active'	=> carbon_get_theme_option('icf_ads_left_active'),
				'content'	=> carbon_get_theme_option('icf_ads_left_content'),
			],
			'right'	=> [
				'active'	=> carbon_get_theme_option('icf_ads_right_active'),
				'content'	=> carbon_get_theme_option('icf_ads_right_content'),
			]
		];

		$this->ads_active	= ($this->ads['left']['active'] || $this->ads['right']['active']) ? true : false;
	}

    /**
     * Display ads on footer
     * Hooked via action wp_footer, priority 999
     * @since   1.0.0
     * @return  void
     */
    public function display_ads()
    {

    }
}
