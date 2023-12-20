<?php 

namespace Habib\Button_Shortcode_Creator\App;

/**
 * Main Class
 */
class MetaField { 

    /**
     * Class Constructor
     */
    public function __construct() {
        
    }

    /**
     * All Button Reapeater Meta Filed
     */
    public function bsc_btn_repeater( $post_id ) {
        ?>
        <p class="single-row">
            <?php
                $number_of_btn      = get_post_meta( $post_id, 'bsc_number_of_btn', true );
                $bsc_btn_info       = get_post_meta( $post_id, 'bsc_btn_info', true );

                for( $i = 0; $i < $number_of_btn; $i++ ){
                    ?>
                    <div class="bsc-btn-meta single-btn">
                        <div class="left-area">
                            <div class="bsc-btn-text-field">
                                <p>
                                    <label>Button Text:</label>
                                    <input type="text" name="bsc_btn_text[]" value="<?php echo $bsc_btn_info['bsc_btn_text'][$i] ?? ''; ?>" />
                                </p>
                                <p>
                                    <label>Button Url:</label>
                                    <input type="text" name="bsc_btn_url[]" value="<?php echo $bsc_btn_info['bsc_btn_url'][$i] ?? ''; ?>" />
                                </p>
                                <div class="bsc-btn-setting" id="bsc-btn-setting"> Button Style <span class="dashicons dashicons-arrow-down-alt2"></span> </div>
                            </div>
                            <?php ( new self() )->btn_setting_meta_field( $bsc_btn_info, $i ); ?>
                        </div>
                        <div class="right-area">
                            <div class="btn-right-area">
                                <p class="bsc-delete" item="<?php echo $i; ?>" post_id="<?php echo $post_id; ?>"><span class="dashicons dashicons-trash"></span></p>
                                <p class="bsc-add-new" post_id="<?php echo $post_id; ?>"><span class="dashicons dashicons-plus-alt"></span></p>
                            </div>
                        </div>
                        
                    </div>
                    <?php
                }
            ?>
        </p>
        <?php 
    }

    /**
     * setting metafield
     */
    public function btn_setting_meta_field( $bsc_btn_info, $i ) {
        if( ! empty( $bsc_btn_info ) ) {
        ?>
            <div class="bsc_setting_metafield">

                <div class="bsc-btn-space-field">
                    
                    <div class="single-field">
                        <label>Padding: <span>px</span></label>
                        <input type="number" name="bsc_btn_padding[]" value="<?php echo $bsc_btn_info['bsc_btn_padding'][$i] ?? ''; ?>" />
                    </div>
                    <div class="single-field">
                        <label>Margin: <span>px</span> </label>
                        <input type="number" name="bsc_btn_margin[]" value="<?php echo $bsc_btn_info['bsc_btn_margin'][$i] ?? ''; ?>" />
                    </div>
                </div>
                <div class="bsc-btn-color-field">
                    <div class="single-field">
                        <label>Color: </label>
                        <input type="text" class="color-picker" name="bsc_btn_color[]" value="<?php echo $bsc_btn_info['bsc_btn_color'][$i] ?? ''; ?>">
                    </div>
                    <div class="single-field">
                        <label>Background: </label>
                        <input type="text" class="color-picker" name="bsc_btn_background[]" value="<?php echo $bsc_btn_info['bsc_btn_background'][$i] ?? ''; ?>">
                    </div>
                    <div class="single-field">
                        <label>Border-color: </label>
                        <input type="text" class="color-picker" name="bsc_btn_border-color[]" value="<?php echo $bsc_btn_info['bsc_btn_border-color'][$i] ?? ''; ?>">
                    </div>
                </div>
                <div class="bsc-btn-color-field">
                    <div class="single-field">
                        <label>Hover Color: </label>
                        <input type="text" class="color-picker" name="bsc_btn_hover_color[]" value="<?php echo $bsc_btn_info['bsc_btn_hover_color'][$i] ?? ''; ?>">
                    </div>
                    <div class="single-field">
                        <label>Hover Background: </label>
                        <input type="text" class="color-picker" name="bsc_btn_hover_bg_color[]" value="<?php echo $bsc_btn_info['bsc_btn_hover_bg_color'][$i] ?? ''; ?>">
                    </div>
                </div>
                <div class="bsc-btn-color-field">
                    <div class="single-field">
                        <label>Font Size: <span>px</span> </label>
                        <input type="number" name="bsc_btn_font_size[]" value="<?php echo $bsc_btn_info['bsc_btn_font_size'][$i] ?? ''; ?>" />
                    </div>
                    <div class="single-field">
                        <label>Font Weight: </label>
                        <select name="bsc_btn_font_weight[]">
                            <?php 
                                $bsc_btn_font_weights = ['normal', 'bold']; 
                                foreach( $bsc_btn_font_weights as $weight ) {
                                    printf( "<option value='%s' %s>%s</option>", $weight, bsc_is_selected( $bsc_btn_info['bsc_btn_font_weight'][$i], $weight  ), $weight );
                                } 
                            ?>
                        </select>
                    </div>
                    <div class="single-field">
                        <label>Font Style: </label>
                        <select name="bsc_btn_font-style[]">
                            <?php 
                                $bsc_btn_font_style = ['normal', 'italic']; 
                                foreach( $bsc_btn_font_style as $style ) {
                                    printf( "<option value='%s' %s>%s</option>", $style, bsc_is_selected( $bsc_btn_info['bsc_btn_font-style'][$i], $style ), $style );
                                } 
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        <?php
        }else{
            ?>

            <div class="bsc_setting_metafield">
                <div class="bsc-btn-space-field">
                    
                    <div class="single-field">
                        <label>Padding: <span>px</span></label>
                        <input type="number" name="bsc_btn_padding[]" />
                    </div>
                    <div class="single-field">
                        <label>Margin: <span>px</span> </label>
                        <input type="number" name="bsc_btn_margin[]" />
                    </div>
                </div>
                <div class="bsc-btn-color-field">
                    <div class="single-field">
                        <label>Color: </label>
                        <input type="text" class="color-picker" name="bsc_btn_color[]" />
                    </div>
                    <div class="single-field">
                        <label>Background: </label>
                        <input type="text" class="color-picker" name="bsc_btn_background[]" />
                    </div>
                    <div class="single-field">
                        <label>Border-color: </label>
                        <input type="text" class="color-picker" name="bsc_btn_border-color[]" />
                    </div>
                </div>
                <div class="bsc-btn-color-field">
                    <div class="single-field">
                        <label>Hover Color: </label>
                        <input type="text" class="color-picker" name="bsc_btn_hover_color[]" />
                    </div>
                    <div class="single-field">
                        <label>Hover Background: </label>
                        <input type="text" class="color-picker" name="bsc_btn_hover_bg_color[]" />
                    </div>
                </div>
                <div class="bsc-btn-color-field">
                    <div class="single-field">
                        <label>Font Size: <span>px</span> </label>
                        <input type="number" name="bsc_btn_font_size[]" />
                    </div>
                    <div class="single-field">
                        <label>Font Weight: </label>
                        <select name="bsc_btn_font_weight[]">
                            <?php 
                                $bsc_btn_font_weights = ['normal', 'bold']; 
                                foreach( $bsc_btn_font_weights as $weight ) {
                                    printf( "<option value='%s'>%s</option>", $weight, $weight );
                                } 
                            ?>
                        </select>
                    </div>
                    <div class="single-field">
                        <label>Font Style: </label>
                        <select name="bsc_btn_font-style[]">
                            <?php 
                                $bsc_btn_font_style = ['normal', 'italic']; 
                                foreach( $bsc_btn_font_style as $style ) {
                                    printf( "<option value='%s'>%s</option>", $style, $style );
                                } 
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <?php
        }
    }
}