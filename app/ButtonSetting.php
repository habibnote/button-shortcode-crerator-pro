<?php 

namespace Habib\Button_Shortcode_Creator\App;

/**
 * Main Class
 */
class ButtonSetting {

    /**
     * all setting meta field
     */
    public function setting_meta ( $post ) {
        $post_id = $post->ID;
        ?>
        <div class="bsc-setting-container">
            <div class="bsc-setting-left">
                <ul>
                    <Li class="bsc-btn-setting bsc-active"><?php esc_html_e( 'Setting', 'bsc' ) ?></Li>
                    <Li class="bsc-btn-style"><?php esc_html_e( 'Style', 'bsc' ) ?></Li>
                </ul>
            </div>
            <div class="bsc-setting-right-area">
                <form>
                    <div class="bsc-setting-form">
                        <?php ( new Self() )->setting_container( $post_id ); ?>
                    </div>
                    <div class="bsc-style-form">
                        <?php ( new Self() )->style_container( $post_id ); ?>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }

    /***
     * Setting container form
     */
    public function setting_container( $post_id ) {
        $bsc_btn_style_setting = get_post_meta( $post_id, 'bsc_btn_style_setting', true );

        echo "<pre>";
        print_r( $bsc_btn_style_setting );
        echo "</pre>";

        ?>  
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label for="bsc-btn-text"><?php esc_html_e( 'Text', 'bsc' ) ?></label>
                    <input type="text" name="bsc-btn-text" id="bsc-btn-text" value="<?php echo $bsc_btn_style_setting['bsc_btn_text'] ?? 'Text' ?>">
                </div>
            </div>

            <div class="bsc-single-row">

                <div class="bsc-column">
                    <label for="bsc-item-type"><?php esc_html_e( 'Item Type', 'bsc' ); ?></label>
                    <select name="bsc-item-type" id="bsc-item-type">
                        <option value="link"><?php esc_html_e( 'Link', 'bsc' ); ?></option>
                    </select>
                </div>

                <div class="bsc-column">
                    <label for="bsc-btn-link"><?php esc_html_e( 'Link', 'bsc' ); ?></label>
                    <input type="text" name="bsc-btn-link" id="bsc-btn-link" value="<?php echo $bsc_btn_style_setting['bsc_btn_link'] ?? '' ?>">
                </div>
                <div class="bsc-column">
                    <label for="bsc-new-tab"><?php esc_html_e( 'Open a New Tab', 'bsc' ); ?></label>
                    <?php
                        if( $bsc_btn_style_setting['bsc_new_tab'] === 'on' ) {
                            ?>
                                <input type="checkbox" name="bsc-new-tab" id="bsc-new-tab" checked>
                            <?php
                        }else{
                            ?>
                                <input type="checkbox" name="bsc-new-tab" id="bsc-new-tab">
                            <?php
                        }
                    ?>
                </div>
            </div>

            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label for="bsc-btn-class"><?php esc_html_e( 'Class', 'bsc' ); ?></label>
                    <input type="text" name="bsc-btn-class" id="bsc-btn-class" value="<?php echo $bsc_btn_style_setting['bsc_btn_class'] ?? '' ?>">
                </div>
                <div class="bsc-column">
                    <label for="bsc-btn-id"><?php esc_html_e( 'ID', 'bsc' ); ?></label>
                    <input type="text" name="bsc-btn-id" id="bsc-btn-id" value="<?php echo $bsc_btn_style_setting['bsc_btn_id'] ?? '' ?>">
                </div>
            </div>
        <?php
    }

    /**
     * Style container form
     */
    public function style_container( $post_id ) {
        $bsc_btn_style_setting = get_post_meta( $post_id, 'bsc_btn_style_setting', true );
        ?>
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label for="bsc-btn-width"><?php esc_html_e( 'Width(px)', 'bsc' ); ?></label>
                    <input type="text" name="bsc-btn-width" id="bsc-btn-width" value="<?php echo $bsc_btn_style_setting['bsc_btn_width'] ?? 100 ?>">
                </div>
                <div class="bsc-column">
                    <label for="bsc-btn-height"><?php esc_html_e( 'Height(px)', 'bsc' ); ?></label>
                    <input type="text" name="bsc-btn-height" id="bsc-btn-height" value="<?php echo $bsc_btn_style_setting['bsc_btn_height'] ?? 50 ?>">
                </div>
                <div class="bsc-column">
                    <label for="bsc-btn-z_index"><?php esc_html_e( 'Z-index', 'bsc' ); ?></label>
                    <input type="text" name="bsc-btn-z_index" id="bsc-btn-z_index" value="<?php echo $bsc_btn_style_setting['bsc_btn_z_index'] ?? 1000 ?>">
                </div>
            </div>
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label><?php esc_html_e( 'Color', 'bsc' ); ?></label>
                    <div class="color-picker-single">
                        <input type="text" name="bsc-btn-color" id="bsc-btn-color" value="<?php echo $bsc_btn_style_setting['bsc_btn_color'] ?? '#000000' ?>">
                        <label class="bsc-label"> <?php esc_html_e( 'Select Color', 'bsc' ); ?></label>
                    </div>
                </div>
                <div class="bsc-column">
                    <label><?php esc_html_e( 'Background', 'bsc' ); ?></label>
                    <div class="color-picker-single">
                        <input type="text" name="bsc-btn-bg-color" id="bsc-btn-bg-color" value="<?php echo $bsc_btn_style_setting['bsc_btn_bg_color'] ?? '#1e73be' ?>">
                        <label class="bsc-label"><?php esc_html_e( 'Select Color', 'bsc' ); ?></label>
                    </div>
                </div>
            </div>
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label><?php esc_html_e( 'Hover Color', 'bsc' ); ?></label>
                    <div class="color-picker-single">
                        <input type="text" name="bsc-btn-hover-color" id="bsc-btn-hover-color" value="<?php echo $bsc_btn_style_setting['bsc_btn_hover_color'] ?? '#000000' ?>">
                        <label class="bsc-label"><?php esc_html_e( 'Select Color', 'bsc' ); ?></label>
                    </div>
                </div>
                <div class="bsc-column">
                    <label><?php esc_html_e( 'Hover Background', 'bsc' ); ?></label>
                    <div class="color-picker-single">
                        <input type="text" name="bsc-btn-hover-bg-color" id="bsc-btn-hover-bg-color" value="<?php echo $bsc_btn_style_setting['bsc_btn_hover_bg_color'] ?? '#1e73be' ?>">
                        <label class="bsc-label"><?php esc_html_e( 'Select Color', 'bsc' ); ?></label>
                    </div>
                </div>
                <div class="bsc-column">
                    <label for="bsc-hover-effect"><?php esc_html_e( 'Hover Effect', 'bsc' ); ?></label>
                    <select name="bsc-hover-effect" id="bsc-hover-effect">
                        <option value="none" <?php esc_html_e( bsc_is_selected( $bsc_btn_style_setting['bsc_hover_effect'] ,'none' ) ); ?>><?php esc_html_e( 'none', 'bsc' ); ?></option>
                        <option value="yes" <?php esc_html_e( bsc_is_selected( $bsc_btn_style_setting['bsc_hover_effect'] ,'yes' ) ); ?>><?php esc_html_e( 'Yes', 'bsc' ); ?></option>
                    </select>
                </div>
            </div>
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label for="bsc-border-radius"><?php esc_html_e( 'Radius(px)', 'bsc' ); ?></label>
                    <input type="text" name="bsc-border-radius" id="bsc-border-radius" value="<?php echo $bsc_btn_style_setting['bsc_border_radius'] ?? 10 ?>">
                </div>
            </div>
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label for="bsc-shadow"><?php esc_html_e( 'Shadow', 'bsc' ); ?></label>
                    <select name="bsc-shadow" id="bsc-shadow">
                        <option value="none" <?php esc_html_e( bsc_is_selected( $bsc_btn_style_setting['bsc_shadow'] ,'none' ) ); ?>><?php esc_html_e( 'none', 'bsc' ); ?></option>
                        <option value="yes" <?php esc_html_e( bsc_is_selected( $bsc_btn_style_setting['bsc_shadow'] ,'yes' ) ); ?>><?php esc_html_e( 'Yes', 'bsc' ); ?></option>
                    </select>
                </div>
            </div>
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label for="bsc-btn-font-size"><?php esc_html_e( 'Font Size', 'bsc' ); ?></label>
                    <input type="text" name="bsc-btn-font-size" id="bsc-btn-font-size" value="<?php echo $bsc_btn_style_setting['bsc_btn_font_size'] ?? 16 ?>">
                </div>
                <div class="bsc-column">
                    <label for="bsc-font-weight"><?php esc_html_e( 'Font Weight', 'bsc' ); ?></label>
                    <select name="bsc-font-weight" id="bsc-font-weight">
                        <option value="none"><?php esc_html_e( 'none', 'bsc' ); ?></option>
                    </select>
                </div>
                <div class="bsc-column">
                    <label for="bsc-font-style"><?php esc_html_e( 'Font Style', 'bsc' ); ?></label>
                    <select name="bsc-font-style" id="bsc-font-style">
                        <option value="none"><?php esc_html_e( 'none', 'bsc' ); ?></option>
                    </select>
                </div>
            </div>
        <?php 
    }


}