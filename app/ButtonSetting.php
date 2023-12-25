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
                    <Li class="bsc-btn-setting bsc-active">Setting</Li>
                    <Li class="bsc-btn-style">Style</Li>
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
        ?>  
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label for="bsc-btn-type">Type</label>
                    <select name="bsc-btn-type" id="bsc-btn-type">
                        <option value="standard">Standard</option>
                    </select>
                </div>
                <div class="bsc-column">
                    <label for="bsc-btn-appear">Button Appearance</label>
                    <select name="bsc-btn-appear" id="bsc-btn-appear">
                        <option value="only-text">Only Text</option>
                    </select>
                </div>
                <div class="bsc-column">
                    <label for="bsc-rotate-btn">Rotate Button</label>
                    <select name="bsc-rotate-btn" id="bsc-rotate-btn">
                        <option value="none">none</option>
                    </select>
                </div>
            </div>

            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label for="bsc-btn-text">Text</label>
                    <input type="text" name="bsc-btn-text" id="bsc-btn-text" value="<?php echo $bsc_btn_style_setting['bsc_btn_text'] ?? 'Text' ?>">
                </div>
            </div>

            <div class="bsc-single-row">

                <div class="bsc-column">
                    <label for="bsc-item-type">Item Type</label>
                    <select name="bsc-item-type" id="bsc-item-type">
                        <option value="link">Link</option>
                    </select>
                </div>

                <div class="bsc-column">
                    <label for="bsc-btn-link">Link</label>
                    <input type="text" name="bsc-btn-link" id="bsc-btn-link" value="<?php echo $bsc_btn_style_setting['bsc_btn_link'] ?? '' ?>">
                </div>
                <div class="bsc-column">
                    <label for="bsc-new-tab">Open a New Tab</label>
                    <input type="checkbox" name="bsc-new-tab" id="bsc-new-tab">
                </div>
            </div>

            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label for="bsc-btn-class">Class</label>
                    <input type="text" name="bsc-btn-class" id="bsc-btn-class" value="<?php echo $bsc_btn_style_setting['bsc_btn_class'] ?? '' ?>">
                </div>
                <div class="bsc-column">
                    <label for="bsc-btn-id">ID</label>
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
                    <label for="bsc-btn-width">Width(px)</label>
                    <input type="text" name="bsc-btn-width" id="bsc-btn-width" value="<?php echo $bsc_btn_style_setting['bsc_btn_width'] ?? 100 ?>">
                </div>
                <div class="bsc-column">
                    <label for="bsc-btn-height">Height(px)</label>
                    <input type="text" name="bsc-btn-height" id="bsc-btn-height" value="<?php echo $bsc_btn_style_setting['bsc_btn_height'] ?? 50 ?>">
                </div>
                <div class="bsc-column">
                    <label for="bsc-btn-z_index">Z-index</label>
                    <input type="text" name="bsc-btn-z_index" id="bsc-btn-z_index" value="<?php echo $bsc_btn_style_setting['bsc_btn_z_index'] ?? 1000 ?>">
                </div>
            </div>
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label>Color</label>
                    <div class="color-picker-single">
                        <input type="text" name="bsc-btn-color" id="bsc-btn-color" value="<?php echo $bsc_btn_style_setting['bsc_btn_color'] ?? '#000000' ?>">
                        <label class="bsc-label">Select Color</label>
                    </div>
                </div>
                <div class="bsc-column">
                    <label>Background</label>
                    <div class="color-picker-single">
                        <input type="text" name="bsc-btn-bg-color" id="bsc-btn-bg-color" value="<?php echo $bsc_btn_style_setting['bsc_btn_bg_color'] ?? '#1e73be' ?>">
                        <label class="bsc-label">Select Color</label>
                    </div>
                </div>
            </div>
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label>Hover Color</label>
                    <div class="color-picker-single">
                        <input type="text" name="bsc-btn-hover-color" id="bsc-btn-hover-color" value="<?php echo $bsc_btn_style_setting['bsc_btn_hover_color'] ?? '#000000' ?>">
                        <label class="bsc-label">Select Color</label>
                    </div>
                </div>
                <div class="bsc-column">
                    <label>Hover Background</label>
                    <div class="color-picker-single">
                        <input type="text" name="bsc-btn-hover-bg-color" id="bsc-btn-hover-bg-color" value="<?php echo $bsc_btn_style_setting['bsc_btn_hover_bg_color'] ?? '#1e73be' ?>">
                        <label class="bsc-label">Select Color</label>
                    </div>
                </div>
                <div class="bsc-column">
                    <label for="bsc-hover-effect">Hover Effect</label>
                    <select name="bsc-hover-effect" id="bsc-hover-effect">
                        <option value="none">none</option>
                    </select>
                </div>
            </div>
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label for="bsc-border-radius">Radius(px)</label>
                    <input type="text" name="bsc-border-radius" id="bsc-border-radius" value="<?php echo $bsc_btn_style_setting['bsc_border_radius'] ?? 10 ?>">
                </div>
                <div class="bsc-column">
                    <label for="bsc-style">Style</label>
                    <select name="bsc-style" id="bsc-style">
                        <option value="none">none</option>
                    </select>
                </div>
            </div>
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label for="bsc-shadow">Shadow</label>
                    <select name="bsc-shadow" id="bsc-shadow">
                        <option value="none">none</option>
                    </select>
                </div>
            </div>
            <div class="bsc-single-row">
                <div class="bsc-column">
                    <label for="bsc-btn-font-size">Font Size</label>
                    <input type="text" name="bsc-btn-font-size" id="bsc-btn-font-size" value="<?php echo $bsc_btn_style_setting['bsc_btn_font_size'] ?? 16 ?>">
                </div>
                <div class="bsc-column">
                    <label for="bsc-font-weight">Font Weight</label>
                    <select name="bsc-font-weight" id="bsc-font-weight">
                        <option value="none">none</option>
                    </select>
                </div>
                <div class="bsc-column">
                    <label for="bsc-font-style">Font Style</label>
                    <select name="bsc-font-style" id="bsc-font-style">
                        <option value="none">none</option>
                    </select>
                </div>
            </div>
        <?php 
    }


}