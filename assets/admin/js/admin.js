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

    // console.log(BSC.ajax);

    /**
     * Ajax call for license activeated
     */
    $(document).on('click', '#bsc-license_actived-btn', function(){
        let bscLicenseKeyValue = $('#bsc-license-key-input').val();
        
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: BSC.ajax,
            data: {
                action: 'bsc_admin_ajax',
                nonce: BSC.admin_nonce,
                key: bscLicenseKeyValue
            },
            success: function (response) {
                if( response.success ) {
                    if( response.data.verify == 200){
                        $("#bsc-license-key-input").prop("disabled", true);
                        $('#bsc-verify-message').html('Your Key is Verifye').css('color', 'chartreuse');
                        $('.bsc-notice').hide();
                        $('#bsc-license_actived-btn').hide();
                    };
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

});

jQuery(document).ready(function($){
    $("#bsc-btn-color").wpColorPicker({
        defaultColor:'#000000',
    });
    $("#bsc-btn-bg-color").wpColorPicker({
        defaultColor:'#1e73be',
    });
    $("#bsc-btn-hover-color").wpColorPicker({
        defaultColor:'#000000',
    });
    $("#bsc-btn-hover-bg-color").wpColorPicker({
        defaultColor:'#1e73be',
    });
});