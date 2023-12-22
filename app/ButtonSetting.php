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
                <div class="bsc-setting-form">
                    <?php ( new Self() )->setting_container(); ?>
                </div>
                <div class="bsc-style-form">
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
            <form class="bsc-form-wrapper">

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
                            <option value="only-icon">Only Icon</option>
                            <option value="text-icon">Text & Icon</option>
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
                        <input type="text" name="bsc-btn-appear" id="bsc-btn-appear" value="Text">
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
                        <input type="text" name="bsc-btn-link" id="bsc-btn-link">
                    </div>
                    <div class="bsc-column">
                        <label for="bsc-new-tab">Open a New Tab</label>
                        <input type="checkbox" name="bsc-new-tab" id="bsc-new-tab">
                    </div>
                </div>

                <div class="bsc-single-row">
                    <div class="bsc-column">
                        <label for="bsc-btn-class">Class</label>
                        <input type="text" name="bsc-btn-class" id="bsc-btn-class">
                    </div>
                    <div class="bsc-column">
                        <label for="bsc-btn-id">ID</label>
                        <input type="text" name="bsc-btn-id" id="bsc-btn-id">
                    </div>
                </div>

            </form>
            <div class="color-picker-single">
                <input type="text" id="custom_color_picker" value="#000000">
                <label>Select Color</label>
            </div>
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