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
                    <Li class="bsc-btn-setting bsc-active">Setting</Li>
                    <Li class="bsc-btn-style">Style</Li>
                </ul>
            </div>
            <div class="bsc-setting-right-area">
                <div class="bsc-setting-container">
                    <?php ( new Self() )->setting_container(); ?>
                </div>
                <div class="bsc-style-container">
                    <?php ( new Self() )->style_container(); ?>
                </div>
            </div>
        </div>
        <?php
    }

    /***
     * Setting container form
     */
    public function setting_container() {
        ?>  
            
        <?php 
    }

    /**
     * Style container form
     */
    public function style_container() {
        ?>
            
        <?php 
    }


}