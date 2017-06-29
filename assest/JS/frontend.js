// NOTIFICATION BAR

jQuery(window).load(function() {
    // get time of show notification on condition and delay time
    var get_show        = jQuery('.ibx-notify-notification-bar-wraper').attr('datalist');
    var get_hide_type   = jQuery('.ibx-notify-notification-bar-wraper .container').attr('datalist');
    var get_delay       = jQuery('.ibx-notify-notification-bar-wraper').attr('data-time');

    var noti_timer  =   setInterval( showBar, ( get_show * 1000 ) );

    function showBar(){
        // set position of notification bar
        var height      =   jQuery('#wpadminbar').outerHeight();

        jQuery( '.ibx-notify-notification-bar-wraper' ).css({
            "margin-top":   ( 0 + height ) + 'px',
            "transition":   "margin-top 0.3s ease",
        });

        var noti_height = jQuery('.ibx-notify-notification-bar-wraper').outerHeight();

        jQuery('body').css({
            "margin-top":   noti_height + 'px',
            "transition":   "margin-top 0.3s ease",
        });

// ============= COOKIE ==================
        // get counter time
        var get_value   =   jQuery('.ibx-notify-notification-bar-wraper .timer-counter').attr('data-time');
            if ( get_value ) { get_value   =   get_value; }else{ get_value   =   '0,0,0,0'; }
        // split time
        var tmp_day     =   get_value.split(/\,/)[0];
        var tmp_hr      =   get_value.split(/\,/)[1];
        var tmp_min     =   get_value.split(/\,/)[2];
        var tmp_sec     =   get_value.split(/\,/)[3];
        // current time
        var date        =   new Date();
        // split current time and add counter time
        var year        =   date.getYear() + 1900;
        var month       =   ( date.getMonth() + 1 ) ;
        var day         =   ( parseInt( date.getDate() ) + parseInt( tmp_day ) ) ;
        var hour        =   ( parseInt( date.getHours() ) + parseInt( tmp_hr ) );
        var minute      =   ( parseInt( date.getMinutes() ) + parseInt( tmp_min ) );
        var second      =   ( parseInt( date.getSeconds() ) + parseInt( tmp_sec ) );
        var newDate     =   new Date(year, parseInt(month, 10) - 1 , day , hour , minute ,second );
        // variable
        var countDownDate;
        // Expire date
        date.setTime(date.getTime() +  ( tmp_day * 24 * 60 * 60 * 1000)
                                    +  ( tmp_hr  * 60 * 60 * 1000)
                                    +  ( tmp_min * 60 * 1000)
                                    +  ( tmp_sec * 1000) );
        // remove cookie, if counter time is reset from wp-admin
        if( jQuery.cookie('c_time') != get_value ){
            jQuery.cookie( 'c_time', get_value, { expires: date });
            jQuery.removeCookie('countDownDate');
        }
        // if cookie already set then update same value
        if ( jQuery.cookie('countDownDate') ){
            var countDownDate = jQuery.cookie( 'countDownDate' );
        }
        // if cookie not set then set it with countDownDate
        else{
            jQuery.cookie( 'countDownDate', newDate.getTime(), { expires: date });
            jQuery.cookie( 'c_time', get_value, { expires: date });
            var countDownDate = jQuery.cookie( 'countDownDate' );
        }

        // Set interval for countdown
        var x = setInterval(function() {
            var now         =   new Date().getTime();
            var distance    =   countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days        =   Math.floor( distance / ( 1000 * 60 * 60 * 24 ));
            var hours       =   Math.floor( ( distance % ( 1000 * 60 * 60 * 24 )) / ( 1000 * 60 * 60 ));
            var minutes     =   Math.floor( ( distance % ( 1000 * 60 * 60 )) / ( 1000 * 60 ));
            var seconds     =   Math.floor( ( distance % ( 1000 * 60 )) / 1000 );
            // Output the result in an element with id="ibx-notify-notification-bar-start"
            jQuery(".ibx-notify-notification-bar-wraper #start").html(  '<b>' + days + "</b> " +
                                                                '<b>' + hours + "</b> " +
                                                                '<b>' + minutes + "</b> " +
                                                                '<b>' + seconds + "</b> " );
            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                jQuery(".ibx-notify-notification-bar-wraper #start").html("<b>EXPIRED</b>");
            }
        }, 1000);

        jQuery('.ibx-notify-notification-bar-wraper .close').click(function(){
            jQuery('.ibx-notify-notification-bar-wraper').css({
                "margin-top": '-100px',
                "transition": "margin-top 0.3s ease",
            });
            jQuery('body').css({
                "margin-top": '0',
                "transition": "margin-top 0.3s ease",
            });
        });
        if ( get_delay != 0 && 'delay' == get_hide_type ){
            var noti_hide_timer =   setTimeout( hideBar, (get_delay) * 1000 );
            function hideBar(){
                // set position of notification bar
                jQuery( '.ibx-notify-notification-bar-wraper' ).css({
                    "margin-top":   '-100px',
                    "transition":   "margin-top 0.3s ease",
                });
                jQuery('body').css({
                    "margin-top":   '0px',
                    "transition":   "margin-top 0.3s ease",
                });
            }
        }
        clearInterval(noti_timer);
    }
});


// Bottom Custom message popup box
    jQuery( window ).load(function() {
        jQuery('.ibx-notify-toggel-button #show').click(function(){
            jQuery( this ).rotate(90);
            jQuery('.ibx-notify-wraper').animate({ opacity: 1 }, 300);
            jQuery('.ibx-notify-toggel-button #hide').show();
        });
        jQuery('.ibx-notify-toggel-button #hide').click(function(){
            jQuery( this ).hide();
            jQuery('.ibx-notify-wraper').animate({ opacity: 0 }, 300);
            jQuery('.ibx-notify-toggel-button #show').show();
        });
    });


// poup timmer
jQuery(window).load(function() {
    jQuery(function() {
        var appear_after    =   ( jQuery('.ibx-notify-text-wraper').attr('datalist') ) * 1000; //show
        var hide_type       =   jQuery('.ibx-notify-text-wrap').attr('data-time'); // hide type
        var disappear_after =   ( jQuery('.ibx-notify-text-content').attr('data-time') ) * 1000; //hide
        var transition_delay=   ( jQuery('.ibx-notify-text-wraper').attr('data-time') ) * 1000; //show
        var count           =   0;
        var timer           =   setInterval( showDiv, appear_after ); // Set Timer for the first time load
        var container       =   '';
        var container_box   =   '';

        if ( 'delay' == hide_type && appear_after != '' && disappear_after != '' ) {
            var container       =   jQuery('.ibx-notify-popup-wraper'); // creat a variable with name of div
        }
            function showDiv() {
                jQuery( container[count] ).addClass('wpfomo_marked').slideDown(); // hide div

                    var timeout     =   setTimeout( timeoutDiv, 0); // set timeout to display div for 'disappear_after' time
                    function timeoutDiv() { // set timeout
                        jQuery( container ).removeClass('wpfomo_marked').slideUp(); // display div
                    };
                    clearTimeout(timeout);
                    timeout     =   setTimeout( timeoutDiv, disappear_after);

                        // mouse hover
                        jQuery('.ibx-notify-popup-wraper').hover(function(ev){
                            clearInterval(timeout); // if mouse hover on div then stop timmer
                        }, function(ev){
                            timeout     =   setTimeout( timeoutDiv, disappear_after); // mouse out then again start timmer
                        })
                        clearInterval(timer); // clear timmer of first time div loader
                        if( 0 == appear_after && disappear_after != 0 ){
                            timer   =   setInterval( showDiv, (disappear_after * 2) ); // again start timmer with new timmer value
                        }else if ( appear_after != 0 && disappear_after != 0 ) {
                            timer   =   setInterval( showDiv, ( parseInt(appear_after) + parseInt(disappear_after) ) ); // again start timmer with new timmer value
                        }
                    count   =   count + 1;
                if( jQuery( container[count] ).length === 0 ){
                    count   =   0;
                }
            }


        if ( 'delay' != hide_type && appear_after >= 0 ) {
            var container_box   =   jQuery('.ibx-notify-popup-wraper');
            timer_box           =   setInterval( showTextDiv, appear_after );
        }
        var count_box   =   0;
        function showTextDiv() {
                jQuery( container_box[count_box] ).addClass('wpfomo_marked').fadeIn(); // hide div

                    var timeout_box     =   setTimeout( timeoutTextDiv, ( parseInt(transition_delay) - 50 ) ); // set timeout to display div for 'disappear_after' time
                    function timeoutTextDiv() { // set timeout
                        jQuery( container_box ).removeClass('wpfomo_marked').fadeOut(); // display div
                    };

                    count_box   =   count_box + 1;
                if( jQuery( container_box[count_box] ).length === 0 ){
                    count_box   =   0;
                }
                clearInterval(timer_box);
                appear_after    =   transition_delay;
                timer_box       =   setInterval( showTextDiv, appear_after );

            }

// click on close hide div
        jQuery( '.ibx-notify-popup-wraper .close' ).click(function(){
            clearInterval(timer_box);
            jQuery('.ibx-notify-popup-wraper').css('display','none');
        });

    });
});
