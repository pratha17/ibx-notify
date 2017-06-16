jQuery(document).ready(function($){
    jQuery('.ibx_notify_container').css('display','none');
    jQuery('#Config').css('display','block');

    jQuery('.ibx_notify_tab ul li a').click(function(){
        var value = jQuery(this).html();
        jQuery('.ibx_notify_tab ul li a').removeClass('ibx-active');
        jQuery(this).addClass('ibx-active');
        jQuery('.ibx_notify_container').css('display','none');
        jQuery('#'+value).css('display','block');
    });


// Main type section
    var check1 = jQuery('#ibx_notify_type').find('option:selected').val();
    jQuery('.side_wraper').css('display','none');
    jQuery('#'+check1).css('display','table-row');

    jQuery('#ibx_notify_type').change(function(){
        var check = jQuery('#ibx_notify_type').find('option:selected').val();
        jQuery('.side_wraper').css('display','none');
        jQuery('#'+check).css('display','table-row');
    });

// Countdown Section
    if(jQuery('#ibx_notify_enable_notification_bar').is(":checked")) {
        jQuery('.ibx_notify_count_wrap').css('display','table-row');
    }else {
        jQuery('.ibx_notify_count_wrap').css('display','none');
    }

    jQuery('#ibx_notify_enable_notification_bar').change(function() {
         if(jQuery(this).is(":checked")) {
             jQuery('.ibx_notify_count_wrap').css('display','table-row');
         }else {
             jQuery('.ibx_notify_count_wrap').css('display','none');
         }
    });
// Notification Email opt-in
    if(jQuery('#ibx-notify-enable-notification-email').is(":checked")) {
        jQuery('.ibx-notify-noti-email-wrap').css('display','table-row');
    }else {
        jQuery('.ibx-notify-noti-email-wrap').css('display','none');
    }

    jQuery('#ibx-notify-enable-notification-email').change(function() {
         if(jQuery(this).is(":checked")) {
             jQuery('.ibx-notify-noti-email-wrap').css('display','table-row');
         }else {
             jQuery('.ibx-notify-noti-email-wrap').css('display','none');
         }
    });

// Email Section

    var email_check1 = jQuery('#ibx_notify_email_type').find('option:selected').val();
    jQuery('.email_sec').css('display','none');
    jQuery('.'+email_check1).css('display','table-row');

    jQuery('#ibx_notify_email_type').change(function(){
        var email_check = jQuery('#ibx_notify_email_type').find('option:selected').val();
        jQuery('.email_sec').css('display','none');
        jQuery('.'+email_check).css('display','table-row');
    });


// Sale Notification
    jQuery(".sale-table").on('click','.del-tr',function(){
        jQuery(this).parent().parent().remove();
    });

    jQuery(".sale-table").on('click','#add-tr',function(){
        jQuery(".sale-table").append(
            "<tr>"+
            "<th scope='row' valign='top'></th>"+
            "<td><input type='text' name='ibx-notify-sale-name[]' placeholder='Name'/></td>"+
            "<td><input type='email' name='ibx-notify-sale-email[]' placeholder='Email'/></td>"+
            "<td><span class='dashicons dashicons-minus del-tr'></span></td>"+
            "<td><span class='dashicons dashicons-plus' id='add-tr'></span></td>"+
            "</tr>");
    });

// Visibility Options

    jQuery('#delay').css('display','none');
    jQuery('#ibx-notify-visibility-show').change(function(){
        var show_check = jQuery('#ibx-notify-visibility-show').find('option:selected').val();
        if ( 'delay' == show_check) {
            jQuery('#delay').css('display','table-row');
        }else {
            jQuery('#delay').css('display','none');
        }
    });

    jQuery('#disappear-delay').css('display','none');
    jQuery('#ibx-notify-visibility-disappear').change(function(){
        var disappear_check = jQuery('#ibx-notify-visibility-disappear').find('option:selected').val();
        if ( 'disappear-delay' == disappear_check) {
            jQuery('#disappear-delay').css('display','table-row');
        }else {
            jQuery('#disappear-delay').css('display','none');
        }
    });

    jQuery('#show-and-hide').css('display','none');
    jQuery('#ibx-notify-visibility-appear').change(function(){
        var appear_check = jQuery('#ibx-notify-visibility-appear').find('option:selected').val();
        if ( 'show-and-hide' == appear_check) {
            jQuery('#show-and-hide').css('display','table-row');
        }else {
            jQuery('#show-and-hide').css('display','none');
        }
    });

});
