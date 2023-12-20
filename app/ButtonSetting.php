<?php 

namespace Habib\Button_Shortcode_Creator\App;

/**
 * Main Class
 */
class ButtonSetting {
    
    /**
     * all setting meta field
     */
    public function setting_meta () {
        ?>
        <div class="bsc-setting-container">
            <div class="bsc-setting-left">
                <ul>
                    <Li class="bsc-btn-setting">Setting</Li>
                    <Li class="bsc-btn-style">Style</Li>
                </ul>
            </div>
            <div class="bsc-setting-right-area">

            </div>
        </div>
        <?php
    }

}