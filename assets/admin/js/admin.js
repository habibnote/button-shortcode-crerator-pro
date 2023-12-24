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
    $("#bsc-btn-color").wpColorPicker({
        defaultColor:'#000000',
    });
    $("#bsc-btn-bg-color").wpColorPicker({
        defaultColor:'#000000',
    });
    $("#bsc-btn-hover-color").wpColorPicker({
        defaultColor:'#000000',
    });
    $("#bsc-btn-hover-bg-color").wpColorPicker({
        defaultColor:'#000000',
    });
});