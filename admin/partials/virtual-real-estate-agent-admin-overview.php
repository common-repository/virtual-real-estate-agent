<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://bots4you.de
 * @since      1.1.1
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

    <h1><?php esc_html_e( 'Overview', 'virtual-real-estate-agent' ); ?></h1>

    <form class="va-subscribe-box" action="" method="POST">

        <div class="text-wrap">
            <h3><?php esc_html_e( 'Enable Virtual Real Estate Agent', 'virtual-real-estate-agent' ); ?></h3>
            <p><?php esc_html_e( 'Click settings tab to enable the Virtual Real Estate Agent', 'virtual-real-estate-agent' ); ?></p>
        </div>
    </form>

    <div class="va-tabbed">
        <nav>
            <ul>
                <li class="tab-current">
                    <a href="<?= esc_url( admin_url( 'admin.php?page=va-chatplugin-menu' ) ); ?>" title="<?php esc_html_e('Instructions', 'virtual-real-estate-agent'); ?>">
                        <span class="dashicons dashicons-admin-home"></span>
                        <label><?php esc_html_e('Instructions', 'virtual-real-estate-agent'); ?></label>
                    </a>
                </li>
                <li>
                    <a href="<?= esc_url( admin_url( 'admin.php?page=va-chatplugin-menu-settings' ) ); ?>" title="<?php esc_html_e('Settings', 'virtual-real-estate-agent'); ?>">
                        <span class="dashicons dashicons-admin-settings"></span>
                        <label><?php esc_html_e('Settings', 'virtual-real-estate-agent'); ?></label>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="nav-content">
            <section id="setup" class="content-current">
                <h2><?php esc_html_e( 'Instructions and Guidelines', 'virtual-real-estate-agent' ); ?></h2>

                <p><?php esc_html_e( 'In order to activate the chat plugin please perform the following instructions:', 'virtual-real-estate-agent' ); ?></p>

                <ol>
                    <li>
                        <div>
                            <?php echo wp_kses( __( 'Click on <strong>Virtual Real Estate Agent</strong> located in the sidebar and then click on <strong>Settings</strong>', 'virtual-real-estate-agent' ), array('strong' => array()) ); ?>
                        </div>
                        <img class="instruction-image" src="<?php echo esc_url( VIRTUAL_AGENT_ASSET_URI ) . '/images/' . __('en', 'virtual-real-estate-agent') . '/3.png'; ?>" alt="Settings">
                    </li>
                    <li>
                        <div>
                            <?php echo wp_kses( __( 'Enable the chat plugin Virtual Real Estate Agent by clicking on the checkbox “<strong>Enable</strong>”', 'virtual-real-estate-agent' ), array('strong' => array()) ); ?>
                        </div>
                        <img class="instruction-image" src="<?php echo esc_url( VIRTUAL_AGENT_ASSET_URI ) . '/images/' . __('en', 'virtual-real-estate-agent') . '/4.png'; ?>" alt="Settings">
                    </li>
                    <li>
                        <div>
                            <?php esc_html_e( 'Now paste the link https://testwebsite.de/ into the URL text field.', 'virtual-real-estate-agent' ); ?>
                        </div>
                        <img class="instruction-image" src="<?php echo esc_url( VIRTUAL_AGENT_ASSET_URI ) . '/images/' . __('en', 'virtual-real-estate-agent') . '/5.png'; ?>" alt="Settings">
                    </li>
                    <li>
                        <div>
                            <?php echo wp_kses ( __( 'Select the position where the Virtual Real Estate Agent should be displayed on the WordPress website. In this example we choose “<strong>Bottom Right</strong>”. Then click on <span class="save-change">Save Changes</span>.', 'virtual-real-estate-agent' ), array('strong' => array(), 'span' => array('class' => array()))); ?>
                        </div>
                        <img class="instruction-image" src="<?php echo esc_url( VIRTUAL_AGENT_ASSET_URI ) . '/images/' . __('en', 'virtual-real-estate-agent') . '/6.png'; ?>" alt="Settings">
                    </li>
                    <li>
                        <div>
                            <?php esc_html_e( 'Navigate to your WordPress website.', 'virtual-real-estate-agent' ); ?>
                        </div>
                        <img class="instruction-image" src="<?php echo esc_url( VIRTUAL_AGENT_ASSET_URI ) . '/images/' . __('en', 'virtual-real-estate-agent') . '/7.png'; ?>" alt="Settings">
                    </li>
                    <li>
                        <div>
                            <?php esc_html_e( 'Click the icon in the bottom right corner to display the Virtual Real Estate Agent.', 'virtual-real-estate-agent' ); ?>
                        </div>
                        <img class="instruction-image" src="<?php echo esc_url( VIRTUAL_AGENT_ASSET_URI ) . '/images/' . __('en', 'virtual-real-estate-agent') . '/8.png'; ?>" alt="Settings">
                    </li>

                    <li>
                        <div>
                            <?php esc_html_e( 'The installation is complete. The Virtual Real Estate Agent can now be used on your WordPress website.', 'virtual-real-estate-agent' ); ?>
                        </div>
                    </li>
                </ol>
            </section>
        </div>
    </div>
</div>