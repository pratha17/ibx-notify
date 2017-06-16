// EMAIL OPT-IN
jQuery( window ).load(function() {
    jQuery('.ibx-notify-toggel-button #show').click(function(){
        jQuery( this ).animate({ opacity: 0 }, 800).hide();
        jQuery('.ibx-notify-email-wraper').animate({ opacity: 1 }, 800).show();
        jQuery('.ibx-notify-toggel-button #hide').animate({ opacity: 1 }, 800).show();
    });
    jQuery('.ibx-notify-toggel-button #hide').click(function(){
        jQuery( this ).animate({ opacity: 0 }, 800).hide();
        jQuery('.ibx-notify-email-wraper').animate({ opacity: 0 }, 800).hide();
        jQuery('.ibx-notify-toggel-button #show').animate({ opacity: 1 }, 800).show();
    });
});


// NOTIFICATION BAR
jQuery(window).load(function() {
    var height = jQuery('#wpadminbar').outerHeight();
    jQuery('.ibx-notify-notification-bar-wraper').css({
        "margin-top": height + 'px',
        "transition": "margin-top 0.3s ease",
    });
    var height1 = jQuery('.ibx-notify-notification-bar-wraper').outerHeight();
    jQuery('body').css({
        "margin-top": height1 + 'px',
        "transition": "margin-top 0.3s ease",
    });
    jQuery('.ibx-notify-notification-bar-close').click(function(){
        jQuery('.ibx-notify-notification-bar-wraper').css({
            "margin-top": '-100px',
            "transition": "margin-top 0.3s ease",
        });
        jQuery('body').css({
            "margin-top": '0',
            "transition": "margin-top 0.3s ease",
        });
    });
// ============= COOKIE ==================
var get_value = jQuery('.ibx-notify-notification-bar-timer-counter').attr('data-time');
var tmp_day = get_value.split(/\,/)[0];
var tmp_hr = get_value.split(/\,/)[1];
var tmp_min = get_value.split(/\,/)[2];
var tmp_sec = get_value.split(/\,/)[3];
var date = new Date();

var year = date.getYear() + 1900;
var month = ( date.getMonth() + 1 ) ;
var day = ( parseInt( date.getDate() ) + parseInt( tmp_day ) ) ;
var hour = ( parseInt( date.getHours() ) + parseInt( tmp_hr ) );
var minute = ( parseInt( date.getMinutes() ) + parseInt( tmp_min ) );
var second = ( parseInt( date.getSeconds() ) + parseInt( tmp_sec ) );
var newDate = new Date(year, parseInt(month, 10) - 1 , day , hour , minute ,second );
var countDownDate;

date.setTime(date.getTime() + ( 60 * 1000));
if ( jQuery.cookie('countDownDate') ){
    var countDownDate = jQuery.cookie( 'countDownDate' );
}else {
    jQuery.cookie( 'countDownDate', newDate.getTime(), { expires: date });
    var countDownDate = jQuery.cookie( 'countDownDate' );
}
 var x = setInterval(function() {
     var now = new Date().getTime();
     var distance = countDownDate - now;
     // Time calculations for days, hours, minutes and seconds
     var days = Math.floor(distance / (1000 * 60 * 60 * 24));
     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
     var seconds = Math.floor((distance % (1000 * 60)) / 1000);
     // Output the result in an element with id="ibx-notify-notification-bar-start"
     jQuery("#ibx-notify-notification-bar-start").html(days + "d " + hours + "h " + minutes + "m " + seconds + "s ");
     // If the count down is over, write some text
     if (distance < 0) {
         clearInterval(x);
         jQuery("#ibx-notify-notification-bar-start").html("EXPIRED");
     }
 }, 1000);

});



// CUSTOM MESSAGE
jQuery(window).load(function() {

});

// SALE NOTIFICATION
jQuery(window).load(function() {

});
