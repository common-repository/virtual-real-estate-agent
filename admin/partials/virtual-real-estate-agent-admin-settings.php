<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://bots4you.de
 * @since      1.0.0
 *
 * @package    Virtual_Agent
 * @subpackage Virtual_Agent/admin/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap va-page">
    <div class="logo">
        <img src="<?php echo esc_url( VIRTUAL_AGENT_ASSET_URI ) . '/images/' . '/logo.svg'; ?>" alt="Settings">
    </div>

    <h1><?php esc_html_e( 'Settings', 'virtual-real-estate-agent' ); ?></h1>

    <div class="va-tabbed">
        <nav>
            <ul>
                <li>
                    <a href="<?= esc_url( admin_url( 'admin.php?page=va-chatplugin-menu' ) ); ?>" title="<?php esc_html_e('Instructions', 'virtual-real-estate-agent'); ?>">
                        <span class="dashicons dashicons-admin-home"></span>
                        <label><?php esc_html_e('Instructions', 'virtual-real-estate-agent'); ?></label>
                    </a>
                </li>
                <li class="tab-current">
                    <a href="<?= esc_url( admin_url( 'admin.php?page=va-chatplugin-menu-settings' ) ); ?>" title="<?php esc_html_e('Settings', 'virtual-real-estate-agent'); ?>">
                        <span class="dashicons dashicons-admin-settings"></span>
                        <label><?php esc_html_e('Settings', 'virtual-real-estate-agent'); ?></label>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="nav-content">
            <section id="settings" class="content-current">
                <h2><?php esc_html_e('Plugin Settings', 'virtual-real-estate-agent'); ?></h2>

                <p><?php esc_html_e('These settings apply to the iFrame of Virtual Real Estate Agent.', 'virtual-real-estate-agent'); ?></p>

                <?php settings_errors(); ?>
                <form method="POST" action="options.php">
                    <?php
                        settings_fields( 'virtual_agent_general_settings' );
                        do_settings_sections( 'virtual_agent_general_settings' );
                    ?>
                    <?php submit_button(); ?>
                </form>
            </section>
        </div>
    </div>
</div>