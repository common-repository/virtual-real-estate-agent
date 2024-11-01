<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.wplauncher.com
 * @since      1.0.0
 *
 * @package    Virtual_Agent
 * @subpackage Virtual_Agent/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Virtual_Agent
 * @subpackage Virtual_Agent/admin
 * @author     Muhammad Adeel <adeel@bots4you.de>
 */
class Virtual_Agent_Admin {

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

		add_action( 'admin_menu', array( $this, 'addPluginAdminMenu' ), 9 );
		add_action( 'admin_init', array( $this, 'registerAndBuildFields' ) );
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
		 * defined in Virtual_Agent_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Virtual_Agent_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/virtual-real-estate-agent-admin.css', array(), $this->version, 'all' );

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
		 * defined in Virtual_Agent_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Virtual_Agent_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/virtual-real-estate-agent-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function addPluginAdminMenu() {
		//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
		add_menu_page(  $this->plugin_name, __('Virtual Real Estate Agent', 'virtual-real-estate-agent'), 'administrator', 'va-chatplugin-menu', array( $this, 'displayPluginAdminDashboard' ), 'dashicons-editor-code', 26 );

		//add_submenu_page( '$parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
		add_submenu_page( 'va-chatplugin-menu', __('Overview', 'virtual-real-estate-agentt'), __('Overview', 'virtual-real-estate-agent'), 'administrator', 'va-chatplugin-menu', array( $this, 'displayPluginAdminDashboard' ));
		add_submenu_page( 'va-chatplugin-menu', __('Settings', 'virtual-real-estate-agent'), __('Settings', 'virtual-real-estate-agent'), 'administrator', 'va-chatplugin-menu-settings', array( $this, 'displayPluginAdminSettings' ));
	}

	public function displayPluginAdminDashboard() {
		require_once 'partials/'.$this->plugin_name.'-admin-overview.php';
    }

	public function displayPluginAdminSettings() {
		// set this var to be used in the settings-display view
		if(isset($_GET['error_message'])){
				add_action('admin_notices', array($this,'settingsPageSettingsMessages'));
				do_action( 'admin_notices', esc_html($_GET['error_message']) );
		}
		require_once 'partials/'.$this->plugin_name.'-admin-settings.php';
	}

	public function settingsPageSettingsMessages ($error_message){
		switch ($error_message) {
				case '1':
						$message = esc_html(__( 'There was an error while changing the settings of the plugin. Please try again!', 'virtual-real-estate-agent' ));
						$err_code = esc_attr( 'virtual_agent_setting' );
						$setting_field = esc_attr('virtual_agent_setting');
						break;
		}

		$type = 'error';
		add_settings_error(
            $setting_field,
            $err_code,
            $message,
            $type
        );
	}

	public function registerAndBuildFields() {
			/**
		 * First, we add_settings_section. This is necessary since all future settings must belong to one.
		 * Second, add_settings_field
		 * Third, register_setting
		 */
		add_settings_section(
			'virtual_agent_general_section',
			'',
			'',
			'virtual_agent_general_settings'
		);
		unset($args);

        add_settings_field(
            'virtual_agent_setting_enable',
            esc_html(__('Enable', 'virtual-real-estate-agent')),
            array( $this, 'virtual_agent_render_settings_field' ),
            'virtual_agent_general_settings',
            'virtual_agent_general_section',
            array (
                'type'      => 'input',
                'subtype'   => 'checkbox',
                'id'    => 'virtual_agent_setting_enable',
                'name'      => 'virtual_agent_setting_enable',
                'required' => 'true',
                'get_options_list' => '',
                'value_type'=>'normal',
                'wp_data' => 'option'
            )
        );


        register_setting(
            'virtual_agent_general_settings',
            'virtual_agent_setting_enable'
        );

        $chatEnableOption = get_option('virtual_agent_setting_enable');

        if ( isset( $chatEnableOption ) && $chatEnableOption ) {
            add_settings_field(
                'virtual_agent_setting_url',
                esc_html(__('URL *', 'virtual-real-estate-agent')),
                array( $this, 'virtual_agent_render_settings_field' ),
                'virtual_agent_general_settings',
                'virtual_agent_general_section',
                array (
                    'type'      => 'input',
                    'subtype'   => 'text',
                    'id'    => 'virtual_agent_setting_url',
                    'name'      => 'virtual_agent_setting_url',
                    'required' => 'true',
                    'get_options_list' => '',
                    'value_type'=>'normal',
                    'wp_data' => 'option'
                )
            );


            register_setting(
                'virtual_agent_general_settings',
                'virtual_agent_setting_url'
            );


//             add_settings_field(
//                 'virtual_agent_setting_tenant_name',
//                 esc_html(__('Tenant Name', 'virtual-real-estate-agent')),
//                 array( $this, 'virtual_agent_render_settings_field' ),
//                 'virtual_agent_general_settings',
//                 'virtual_agent_general_section',
//                 array (
//                     'type'      => 'input',
//                     'subtype'   => 'text',
//                     'id'    => 'virtual_agent_setting_tenant_name',
//                     'name'      => 'virtual_agent_setting_tenant_name',
//                     'required' => 'false',
//                     'get_options_list' => '',
//                     'value_type'=>'normal',
//                     'wp_data' => 'option'
//                 )
//             );
//
//
//             register_setting(
//                 'virtual_agent_general_settings',
//                 'virtual_agent_setting_tenant_name'
//             );


            add_settings_field(
                'virtual_agent_setting_position',
                esc_html(__('Position *', 'virtual-real-estate-agent')),
                array( $this, 'virtual_agent_render_settings_field' ),
                'virtual_agent_general_settings',
                'virtual_agent_general_section',
                array (
                    'type'      => 'input',
                    'subtype'   => 'radio',
                    'id'    => 'virtual_agent_setting_position',
                    'name'      => 'virtual_agent_setting_position',
                    'required' => 'true',
                    'get_options_list' => array (
                        'bottom_left' => array (
                            'label' => __('Bottom left', 'virtual-real-estate-agent')
                        ),
                        'bottom_right' => array (
                            'label' => __('Bottom right', 'virtual-real-estate-agent')
                        )
                    ),
                    'value_type'=>'normal',
                    'wp_data' => 'option'
                )
            );


            register_setting(
                'virtual_agent_general_settings',
                'virtual_agent_setting_position'
            );
        }
	}

	public function virtual_agent_render_settings_field ($args) {
        $wp_data_value = get_option($args['name']);

		switch ($args['type']) {

			case 'input':
                $value = ($args['value_type'] == 'serialized') ? serialize($wp_data_value) : $wp_data_value;

                if ($args['subtype'] == 'radio') {
                    foreach ($args['get_options_list'] as $key => $arg) {
                        $checked = ($value == $key) ? 'checked' : '';

                        echo '<input required="' . $args['required'] . '" type="' . $args['subtype'] . '" id="'. esc_attr(sanitize_text_field($args['name'])) . '" name="' . esc_attr(sanitize_text_field($args['name'])) . '" value="' . esc_attr(sanitize_key($key)) . '" ' . $checked . '><label for="' . esc_attr(sanitize_text_field($args['name'])) . '">' . esc_html(sanitize_text_field($arg['label'])) . '</label><br>';
                    }
                }
                else if ($args['subtype'] !== 'checkbox') {
                    echo '<input required="' . $args['required'] . '" type="'.$args['subtype'].'" id="' . esc_attr(sanitize_text_field($args['id'])) . '" "'.$args['required'].'" name="' . esc_attr(sanitize_text_field($args['name'])) . '" size="40" value="' . esc_attr(sanitize_text_field($value)) . '" />';

                }
                else {
                    $checked = ($value) ? 'checked' : '';
                    echo '<input type="'.$args['subtype'].'" id="' . esc_attr(sanitize_text_field($args['id'])) . '" "'.$args['required'].'" name="' . esc_attr(sanitize_text_field($args['name'])) . '" size="40" value="1" '.$checked.' />';
                }
                break;
			default:
                break;
		}
	}
}
