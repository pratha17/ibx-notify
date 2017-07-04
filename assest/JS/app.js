// jQuery(document).ready(function($){
//     // jQuery('.ibx_notify_tab ul li a').click(function(){
//     //     var value = jQuery(this).html();
//     //     jQuery('.ibx_notify_tab ul li a').removeClass('ibx-active');
//     //     jQuery(this).addClass('ibx-active');
//     //     jQuery('.ibx_notify_container').css('display','none');
//     //     jQuery('#'+value).css('display','block');
//     // });
//
//
    var type = jQuery('#ibx_notify_type').find('option:selected').val();
    console.log(type);
    if ( 'msg' == type ) {
        jQuery('#mbt-field-hide_delay').hide();
    }
    jQuery('#ibx_notify_type').change(function() {
        var type_select = jQuery( this ).find('option:selected').val();
        console.log(type_select);
         if( 'msg' == type_select ) {
             jQuery('#mbt-field-hide_delay').hide();
        }
    });

//     jQuery('.side_wraper').css('display','none');
//     jQuery('#'+check1).css('display','table-row');
//     //
//     //
//     // if(jQuery('#ibx_notify_enable_notification_bar').is(':checked')) {
//     //     jQuery('.ibx-notify-count-wrap').show();
//     // }else {
//     //     jQuery('.ibx-notify-count-wrap').hide();
//     // }
//     //
//
// });
