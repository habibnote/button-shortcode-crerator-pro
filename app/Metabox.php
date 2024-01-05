<?php 

namespace Habib\Button_Shortcode_Creator\App;

/**
 * Main Class
 */
class Metabox {

    /**
     * class constructor
     */
    public function __construct() {
        add_action( 'add_meta_boxes', [$this, 'bsc_metaboxes'] );
        add_action( 'save_post', [$this, 'bsc_save_meta_info'] );
        add_action( 'manage_bs_creator_posts_custom_column', [$this, 'bsc_addshortcode_in_column'], 10, 2 );
        add_filter( 'manage_edit-bs_creator_columns', [$this, 'bsc_manage_post_columns'] );
    }

    /**
     * manage posts column
     */
    public function bsc_manage_post_columns( $columns ) {
        print_r($columns);

        unset($columns['date']);
        $columns['shortcode'] = __( 'Shortcode', 'bsc' );
        $columns['date'] = __( 'Date', 'bsc' );

        return $columns;
    }

    /**
     * Add shortcode in column
     */
    public function bsc_addshortcode_in_column( $column, $post_id ) {
        if( 'shortcode' == $column ) {
            printf( "[bsc_button id=%s/]", $post_id );
        }
    }

    /**
     * BSC create all metabox
     */
    public function bsc_metaboxes() {
        add_meta_box(
            'bsc_buton_meta',
            __( 'Button Text', 'bsc' ),
            [ $this, 'bsc_post_meta' ],
            'bs_creator',
            'normal'
        );

        add_meta_box(
            'bsc_buton_setting_meta',
            __( 'Settings', 'bsc' ),
            [ $this, 'bsc_setting_post_meta' ],
            'bs_creator',
            'normal'
        );

        add_meta_box(
            'bsc_button_shortcode',
            __( 'Button Shortcode', 'bsc' ),
            [$this, 'bsc_shortcode'],
            'bs_creator',
            'side',
        );
    }

    /**
     * Shortcode Metabox
     */
    public function bsc_shortcode( $post ) {
        echo "<pre>";
        printf( "[bsc_button id=%s/]", $post->ID );
        echo "</pre>";
    }

    /**
     * all button setting field
     */
    public function bsc_setting_post_meta( $post ) {
        ( new ButtonSetting() )->setting_meta( $post );
    }

    /**
     * all meta
     */
    public function bsc_post_meta( $post ) {

        $post_id = $post->ID;

        //all prevent data
        $sub_title_value = get_post_meta( $post_id, 'bsc_subtitle', true );
        $bsc_offer_value = get_post_meta( $post_id, 'bsc_offer', true );

        //meta box dom
        wp_nonce_field( 'bsc_nonce', 'bsc_nonce_field' );

        ?>
        <div class="bsc_button_metaboxes">
            <div class="right-area">
                <p class="single-row">  
                    <label for="sub-title"><?php esc_html_e( 'Subtitle', 'bsc' ) ?></label><br>
                    <input type="text" value="<?php esc_html_e( $sub_title_value , 'bsc' ); ?>" name="sub_title" id="sub_title">
                </p>
                <p>
                </p>
                <p class="single-row">
                    <label for="bsc-offer"> <?php esc_html_e( 'Offer Title', 'bsc' ) ?> </label><br>
                    <input type="text" value="<?php esc_html_e( $bsc_offer_value, 'bsc' ) ?>" name="bsc_offer" id="bsc-offer">
                </p>
            </div>
        </div>
        <?php
    }   

    /**
     * Saved button meta info
     */
    public function bsc_save_meta_info( $post_id ) {
        $bsc_nonce_value = $_POST['bsc_nonce_field'] ?? '';
        $sub_title       = $_POST['sub_title'] ?? '';
        $bsc_offer       = $_POST['bsc_offer'] ?? '';

        /**
         * Retrive btn settings data
         */
        $bsc_btn_text   = $_POST['bsc-btn-text'] ?? '';
        $bsc_item_type  = $_POST['bsc-item-type'] ?? '';
        $bsc_btn_link   = $_POST['bsc-btn-link'] ?? '';
        $bsc_new_tab    = $_POST['bsc-new-tab'] ?? '';
        $bsc_btn_class  = $_POST['bsc-btn-class'] ?? '';
        $bsc_btn_id     = $_POST['bsc-btn-id'] ?? '';

        /**
         * Retrive all style data
         */
        $bsc_btn_width      = $_POST['bsc-btn-width'] ?? '';
        $bsc_btn_height     = $_POST['bsc-btn-height'] ?? '';
        $bsc_btn_z_index    = $_POST['bsc-btn-z_index'] ?? '';
        $bsc_btn_color      = $_POST['bsc-btn-color'] ?? '';
        $bsc_btn_bg_color   = $_POST['bsc-btn-bg-color'] ?? '';
        $bsc_btn_hover_color = $_POST['bsc-btn-hover-color'] ?? '';
        $bsc_btn_hover_bg_color = $_POST['bsc-btn-hover-bg-color'] ?? '';
        $bsc_hover_effect   = $_POST['bsc-hover-effect'] ?? '';
        $bsc_border_radius  = $_POST['bsc-border-radius'] ?? '';
        $bsc_style          = $_POST['bsc-style'] ?? '';
        $bsc_shadow         = $_POST['bsc-shadow'] ?? '';
        $bsc_btn_font_size  = $_POST['bsc-btn-font-size'] ?? '';
        $bsc_font_weight    = $_POST['bsc-font-weight'] ?? '';
        $bsc_font_style     = $_POST['bsc-font-style'] ?? '';

        //Intialize button setting and style array
        $bsc_btn_style_setting = [];

        //set all button setting meta in array
        $bsc_btn_style_setting['bsc_btn_text']     = $bsc_btn_text;
        $bsc_btn_style_setting['bsc_item_type']    = $bsc_item_type;
        $bsc_btn_style_setting['bsc_btn_link']     = $bsc_btn_link;
        $bsc_btn_style_setting['bsc_new_tab']      = $bsc_new_tab;
        $bsc_btn_style_setting['bsc_btn_class']    = $bsc_btn_class;
        $bsc_btn_style_setting['bsc_btn_id']       = $bsc_btn_id;

        //set all button style meta in array
        $bsc_btn_style_setting['bsc_btn_width']    = $bsc_btn_width;
        $bsc_btn_style_setting['bsc_btn_height']   = $bsc_btn_height;
        $bsc_btn_style_setting['bsc_btn_z_index']  = $bsc_btn_z_index;
        $bsc_btn_style_setting['bsc_btn_color']    = $bsc_btn_color;
        $bsc_btn_style_setting['bsc_btn_bg_color'] = $bsc_btn_bg_color;
        $bsc_btn_style_setting['bsc_btn_hover_color'] = $bsc_btn_hover_color;
        $bsc_btn_style_setting['bsc_btn_hover_bg_color'] = $bsc_btn_hover_bg_color;
        $bsc_btn_style_setting['bsc_hover_effect']  = $bsc_hover_effect;
        $bsc_btn_style_setting['bsc_border_radius'] = $bsc_border_radius;
        $bsc_btn_style_setting['bsc_style']         = $bsc_style;
        $bsc_btn_style_setting['bsc_shadow']        = $bsc_shadow;
        $bsc_btn_style_setting['bsc_btn_font_size'] = $bsc_btn_font_size;
        $bsc_btn_style_setting['bsc_font_weight']   = $bsc_font_weight;
        $bsc_btn_style_setting['bsc_font_style']    = $bsc_font_style;

        if( ! bsc_is_secured( $bsc_nonce_value, 'bsc_nonce', $post_id ) ) {
            return $post_id;
        }   

        if( in_array( '', [ $sub_title, $bsc_offer] ) ) {
            return $post_id;
        }

        update_post_meta( $post_id, 'bsc_subtitle', $sub_title );
        update_post_meta( $post_id, 'bsc_offer', $bsc_offer );
        update_post_meta( $post_id, 'bsc_btn_style_setting', $bsc_btn_style_setting );
    }
}





