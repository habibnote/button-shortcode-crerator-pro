jQuery(document).ready(function ($) {

    $(document).on('click', '.bsc-btn-style', function() {
        $(this).addClass('bsc-active');
        $('.bsc-btn-setting').removeClass('bsc-active');
        $('.bsc-setting-form').hide();
        $('.bsc-style-form').show();
    });

    $(document).on('click', '.bsc-btn-setting', function() {
        $(this).addClass('bsc-active');
        $('.bsc-btn-style').removeClass('bsc-active');
        $('.bsc-setting-form').show();
        $('.bsc-style-form').hide();
    });

});

jQuery(document).ready(function($){
    $("#custom_color_picker").wpColorPicker({
        defaultColor:'#000000',
    });
});