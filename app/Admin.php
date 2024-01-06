<?php 

namespace Habib\Button_Shortcode_Creator\App;

/**
 * Admin Class
 */
class Admin {

    /**
     * Class constructor
     */
    public function __construct() {
        add_action( 'init', [$this, 'register_post_type'] );
        add_action( 'admin_enqueue_scripts', [$this, 'admin_enqueue_scripts'] );
        add_action( 'admin_menu', [$this, 'setting_submenu'] );

        add_action( 'admin_init', [$this, 'duplicate_post_action'] );
        add_filter( 'post_row_actions', [$this, 'add_duplicate_link_before_trash'], 10, 2 );

        add_action( 'admin_notices', [$this,'activate_notice'] );
    }

    /**
     * Plugin Setting Page
     */
    public function setting_submenu() {

        add_submenu_page(
            'edit.php?post_type=bs_creator',
            'Settings',
            'Settings',
            'manage_options',
            'bsc_settings',
            [$this, 'setting_callback']
        );
    }

    /**
     * Setting page callback function
     */
    public function setting_callback() {
        ?>
        <div class="wrap bsc-license-page">
            <h1><?php esc_html_e( 'Plugin License Options', 'bsc' ) ?></h1>
            <hr>
            <p class="bsc-message"><?php esc_html_e( 'Please active your license key to make the plugin work.', 'bsc'); ?></p>
            <div class="bsc-license_form">
                <form>
                    <p>
                        <label for="bsc-ls-website"><?php esc_html_e( 'License Key:', 'bsc'); ?></label>
                        <input type="text"/>
                        <span> <?php esc_html_e( 'Please Enter Your Pro Plugin Activation Key', 'bsc' ); ?></span>
                    </p>
                    <p>
                        <button id="bsc-license_actived-btn" type="button" class="bsc-active-btn button button-primary"><?php esc_html_e( 'Active', 'bsc' ); ?></button>
                    </p>
                </form>
            </div>
        </div>
        <?php
    }

    /**
     * Create duplicate post
     */
    function duplicate_post_action() {
        if ( isset( $_GET['action'] ) && $_GET['action'] === 'duplicate_post' && isset( $_GET['post_id'] ) ) {

            $post_id        = intval( $_GET['post_id'] );
            $new_post_id    = \bsc_duplicate_post( $post_id );
    
            // Redirect to the new duplicate post
            wp_redirect( admin_url('post.php?action=edit&post=' . $new_post_id ) );
            exit;
        }
    }
    

    /**
     * duplicate link button
     */
    public function add_duplicate_link_before_trash( $actions, $post ) {

        if ( $post->post_type == 'bs_creator' ) {
            
            // Add Duplicate link
            $actions['duplicate'] = '<a href="' . esc_url(add_query_arg(array('post_id' => $post->ID), admin_url('admin-post.php?action=duplicate_post'))) . '">Duplicate</a>';
            
        }
        return $actions;
    }

    /**
     * Register Custom post type
     */
    public function register_post_type() {
        include_once( BSC_DIR . "/views/admin/bsc-post.php" );
    }

    /*
    * load all admin assets
    */
    public function admin_enqueue_scripts() {
        wp_enqueue_style( 'admin', BSC_ASSET . '/admin/css/admin.css', '', time(), 'all' );

        wp_enqueue_script( 'admin', BSC_ASSET . '/admin/js/admin.js', ['jquery', 'wp-color-picker'], time(), true );

        $ajax_url = admin_url( 'admin-ajax.php' );
        $nonce    = wp_create_nonce( 'bsc_nonce_admin' );
        wp_localize_script( 'admin', 'BSC', array( 
            'ajax'  => $ajax_url,
            'admin_nonce'=> $nonce,
        ) );
    }   

    /**
     * Admin Activate notice
     */
    public function activate_notice() {
        if ( current_user_can( 'manage_options' ) ) {
            ?>
                <div class="notice notice-error is-dismissible">
                    <p>
                        <?php 
                            $bsc_setting_url = add_query_arg( array(
                                'post_type' => 'bs_creator',
                                'page'      => 'bsc_settings',
                            ), admin_url( 'edit.php' ) );

                            esc_html_e( 'Button Shortcode Creator. It\'s a pro Plugin', 'bsc' );

                            printf( ' <a href="%s">%s</a>', $bsc_setting_url, esc_html__( 'Active now' , 'bsc' ) );
                        ?>
                    </p>
                </div>
            <?php
        }
    }
}