<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ridwan-arifandi.com
 * @since             1.0.0
 * @package           Icf_Ads
 *
 * @wordpress-plugin
 * Plugin Name:       ICF - Ads Placement
 * Plugin URI:        https://ridwan-arifandi.com
 * Description:       Display ads placement for infocarfreeday.net
 * Version:           1.0.0
 * Author:            Ridwan Arifandi
 * Author URI:        https://ridwan-arifandi.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       icf-ads
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ICF_ADS_VERSION', 	'1.0.0' );
define( 'ICF_ADS_PATH',		plugin_dir_path( __FILE__ ));
define( 'ICF_ADS_URL',		plugin_dir_url( __FILE__ ));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-icf-ads-activator.php
 */
function activate_icf_ads() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-icf-ads-activator.php';
	Icf_Ads_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-icf-ads-deactivator.php
 */
function deactivate_icf_ads() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-icf-ads-deactivator.php';
	Icf_Ads_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_icf_ads' );
register_deactivation_hook( __FILE__, 'deactivate_icf_ads' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-icf-ads.php';
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
require plugin_dir_path( __FILE__ ) . 'library/plugin-update-checker/plugin-update-checker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_icf_ads() {

	$plugin = new Icf_Ads();
	$plugin->run();

}

if(!function_exists('__debug')) :
	function __debug()
	{
		$bt     = debug_backtrace();
		$caller = array_shift($bt);
		?><pre class='sejoli-debug'><?php
		print_r([
			"file"  => $caller["file"],
			"line"  => $caller["line"],
			"args"  => func_get_args()
		]);
		?></pre><?php
	}
endif;

run_icf_ads();

$update_checker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/orangerdev/icf-adsplacement',
	__FILE__,
	'icf-adsplacement'
);

$update_checker->setBranch('master');
