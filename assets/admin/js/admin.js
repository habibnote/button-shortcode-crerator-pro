jQuery(document).ready(function ($) {

    // Add color picker to all elements with class 'color-picker'
    // $('.color-picker').wpColorPicker({
    //     defaultColor: '#000000'
    // });

    $(document).on('click', 'selector', function() {

    });

   

});

jQuery(document).ready(function($){
    $("#custom_color_picker").wpColorPicker({
        defaultColor:'#000000',
    });


    $(document).on('click', '.wp-picker-container', function(){

        console.log("Hello");
    });

});