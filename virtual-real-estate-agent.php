<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           VIRTUALAGENT
 *
 * @wordpress-plugin
 * Plugin Name:       Virtual Real Estate Agent
 * Plugin URI:        https://bots4you.atlassian.net/wiki/spaces/DOC/pages/286621697/Wordpress+Plugin+Installation+Guide+-+English
 * Description:       This is the initial wordpress plugin to serve chat plugin inside the iFrame and display this chat plugin on the wordpress websites.
 * Version:           1.1.6
 * Author:            Bots4You GmbH
 * Author URI:        https://bots4you.de
 * License:           GPL-2.0+ or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       virtual-real-estate-agent
 * Domain Path:       /languages/
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
define( 'VIRTUAL_AGENT_VERSION', '1.1.6' );
define( 'VIRTUAL_AGENT_ROOT_URI', plugins_url( '', __FILE__ ) );
define( 'VIRTUAL_AGENT_ASSET_URI', VIRTUAL_AGENT_ROOT_URI . '/assets' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-virtual-real-estate-agent-activator.php
 */
function activate_virtual_agent () {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-virtual-real-estate-agent-activator.php';
    Virtual_Agent_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-virtual-real-estate-agent-deactivator.php
 */
function deactivate_virtual_agent () {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-virtual-real-estate-agent-deactivator.php';
    Virtual_Agent_Deactivator::deactivate();
}

function add_virtual_agent_settings_link ($links) {
    $links[] = '<a href="' . esc_url( admin_url( 'admin.php?page=va-chatplugin-menu' ) ) . '">' . __('Settings', 'virtual-real-estate-agent') . '</a>';
    return $links;
}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_virtual_agent_settings_link' );

register_activation_hook( __FILE__, 'activate_virtual_agent' );
register_deactivation_hook( __FILE__, 'deactivate_virtual_agent' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-virtual-real-estate-agent.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_virtual_agent() {

	$plugin = new Virtual_Agent();
	$plugin->run();

}

run_virtual_agent();
