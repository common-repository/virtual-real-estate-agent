<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Virtual_Agent
 * @subpackage Virtual_Agent/public
 * @author     Muhammad Adeel <adeel@bots4you.de>
 */
class Virtual_Agent_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Virtual_Agent_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Virtual_Agent_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/virtual-real-estate-agent-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Virtual_Agent_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Virtual_Agent_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/virtual-real-estate-agent-public.js', array( 'jquery' ), $this->version, false );

	}

    function enable_chat_plugin () {
        $isChatEnabled = get_option('virtual_agent_setting_enable');
        $chatPosition = get_option('virtual_agent_setting_position');
        $chatUrl = get_option('virtual_agent_setting_url');
//         $chatTenantName = get_option('virtual_agent_setting_tenant_name');

        if (
            isset($isChatEnabled) && $isChatEnabled &&
            isset($chatPosition) && !empty($chatPosition) &&
            isset($chatUrl) && !empty($chatUrl)
        ) {
            print sprintf("<div class='chat_trigger %s'>
                <span class='dashicons icon_close dashicons-no'></span>
                <span class='dashicons icon_message dashicons-testimonial'></span>
            </div>
            <div class='chat_plugin %s'></div>", esc_attr($chatPosition), esc_attr($chatPosition));

            wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/virtual-real-estate-agent-public.js', array( 'jquery' ), $this->version, false );
            wp_localize_script( $this->plugin_name, 'php_vars', array ('chatUrl' => esc_url($chatUrl) ) );
//             wp_localize_script( $this->plugin_name, 'php_vars', array ('chatUrl' => esc_url($chatUrl), 'chatTenantName' => esc_html($chatTenantName) ) );
        }

        return null;
    }
}
