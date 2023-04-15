<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://sohamsolution.com/
 * @since             1.0.0
 * @package           Vedicastro
 *
 * @wordpress-plugin
 * Plugin Name:       VedicAstro
 * Plugin URI:        https://vedicastroapi.com/
 * Description:       Horoscope and Astrology is the first vedic astrology plugin that lets you generate horoscope reports based on the birth details.
 * Version:           1.0.3
 * Author:            Vedic Astro, Ravi Yadav
 * Author URI:        http://sohamsolution.com/
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       vedicastro
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
define( 'VEDICASTRO_VERSION', '1.0.0' );
define( 'VEDICASTRO_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vedicastro-activator.php
 */
function activate_vedicastro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vedicastro-activator.php';
	Vedicastro_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vedicastro-deactivator.php
 */
function deactivate_vedicastro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vedicastro-deactivator.php';
	Vedicastro_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vedicastro' );
register_deactivation_hook( __FILE__, 'deactivate_vedicastro' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vedicastro.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vedicastro() {

	$plugin = new Vedicastro();
	$plugin->run();

}
run_vedicastro();
