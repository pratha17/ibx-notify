jQuery(document).ready(function($){
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
    if(jQuery('#ibx_notify_enable_notification_bar').is(':checked')) {
        jQuery('.ibx-notify-count-wrap').show();
    }else {
        jQuery('.ibx-notify-count-wrap').hide();
    }

    jQuery('#ibx_notify_enable_notification_bar').change(function() {
         if(jQuery(this).is(":checked")) {
             jQuery('.ibx-notify-count-wrap').css('display','table-row');
         }else {
             jQuery('.ibx-notify-count-wrap').css('display','none');
         }
    });
// Notification Email opt-in
    if(jQuery('#ibx_notify_enable_notification_email').is(":checked")) {
        jQuery('.ibx-notify-noti-email-wrap').css('display','table-row');
    }else {
        jQuery('.ibx-notify-noti-email-wrap').css('display','none');
    }

    jQuery('#ibx_notify_enable_notification_email').change(function() {
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


// Sale Notification

    jQuery(".ibx_notify_sale_table").on('click','.del-tr',function(){
        var z = jQuery(this).parent().parent().parent().parent().remove();
    });

        jQuery(".add-tr").on('click',function(){
            var a = jQuery(".sale-table").length;
            var table = "<table class='form-table sale-table' id='sale_div_" + a + "'>"+
                            "<tbody class='ibx_notify_sale_tbody'>"+
                            "<tr class='ibx_notify_sale_tr'>"+
                            "<th>"+
                            "<h3>Sale Notification</h3></th>"+
                            "<td class='sale-button'><button type='button' class='del-tr button button-secondary' name='button'>Remove</button>"+
                            "</td></tr> <tr>"+
                            "<th scope='row' valign='top'>Name</th>"+
                            "<td class=''>"+
                            "<input type='text' name='ibx_notify_sale["+a+"][ibx_notify_sale_name]' placeholder='Name'>"+
                            "</td> </tr> <tr>"+
                            "<th scope='row' valign='top'>Email</th>"+
                            "<td class=''>"+
                            "<input type='email' name='ibx_notify_sale["+a+"][ibx_notify_sale_email]' placeholder='Email'>"+
                            "</td> </tr>  <tr>"+
                            "<th scope='row' valign='top'>Message</th>"+
                            "<td> <textarea cols='60' rows='3' name='ibx_notify_sale["+a+"][ibx_notify_sale_msg]'> </textarea> </td>"+
                            "</tr></tbody>"+
                            "</table>";
            jQuery(".ibx_notify_sale_table").append( table );
        });



// Ratings
    jQuery(".ibx_notify_review_table").on('click','.del-tr',function(){
        var z = jQuery(this).parent().parent().parent().parent().remove();
    });

        jQuery(".add-tr").on('click',function(){
            var a = jQuery(".review-table").length;
            var rating_table = "<table class='form-table review-table' id='div_" + a + "'>"+
                                "<tbody class='ibx_notify_reviews_tbody'>"+
                                    "<tr class='ibx_notify_reviews_tr'> <th> <h3>Reviews</h3></th> <td class='review-button'><button type='button' class='del-tr button button-secondary' name='button'>Remove</button> </td></tr>"+
                                    "<tr> <th scope='row' valign='top'>Image uploader</th> <td class='img-uploader'> <input class='ibx_notify_reviews_image' type='text' name='ibx_notify_reviews["+a+"][ibx_notify_reviews_img]' value=''> <input class='ibx_notify_reviews_image_button button button-secondary' type='button' value='Upload Image'> </td> </tr>"+
                                    "<tr><th scope='row' valign='top'>Ratings</th> <td class=''>"+
                                        "<select id='ibx_notify_design_position' name='ibx_notify_reviews["+a+"][ibx_notify_rating]'>"+
                                                "<option value=''>Rating</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>"+
                                    "</td></tr>"+
                                    "<tr><th scope='row' valign='top'>Message</th><td><textarea cols='60' rows='3' name='ibx_notify_reviews["+a+"][ibx_notify_review_msg]'> ibx_notify_review_msg</textarea></td></tr></tbody>"+
                                "</table>";
            jQuery('.ibx_notify_review_table').append( rating_table );
        });

});
// MEDIA uploader
// jQuery(document).ready(function($){
var custom_uploader;
jQuery('.ibx_notify_review_table').on('hover','.ibx_notify_reviews_image_button',function(){
    var id = jQuery(this).parent().parent().parent().parent().attr('id');

          jQuery('#' + id + ' .ibx_notify_reviews_image_button').click(function(e) {
              jQuery.session.set('id', id );
               e.preventDefault();
               //If the uploader object has already been created, reopen the dialog
               if (custom_uploader) {
                   custom_uploader.open();
                   return;
               }
               //Extend the wp.media object
               custom_uploader = wp.media.frames.file_frame = wp.media({
                   title: 'Choose Image',
                   button: {
                       text: 'Choose Image'
                   },
                   multiple: true
               });
               //When a file is selected, grab the URL and set it as the text field's value
               custom_uploader.on('select', function() {
                   var session_id = jQuery.session.get('id');
                   console.log(custom_uploader.state().get('selection').toJSON());
                   attachment = custom_uploader.state().get('selection').first().toJSON();
                   jQuery('#' + session_id + ' .ibx_notify_reviews_image').val(attachment.url);
               });
               //Open the uploader dialog
               custom_uploader.open();
           });

});
