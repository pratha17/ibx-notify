// NOTIFICATION BAR
jQuery(window).load(function() {
    jQuery( '.ibx-fomo').each(function(){

    var noti_id             =   jQuery( '.ibx-fomo' ).attr('datalist'); //id
        // get time of show notification on condition and delay time
        var get_show        = jQuery('.' + noti_id + ' .ibx-fomo-bar-wrapper').attr('datalist');
        var get_delay       = jQuery('.' + noti_id + ' .ibx-fomo-bar-wrapper').attr('data-time');

        var noti_timer  =   setInterval( showBar, ( get_show * 1000 ) );

        function showBar(){
            // set position of notification bar
            var height      =   jQuery('#wpadminbar').outerHeight();

            jQuery('.' + noti_id + ' .ibx-fomo-bar-wrapper' ).css({
                "margin-top":   ( 0 + height ) + 'px',
                "transition":   "margin-top 0.3s ease",
            });

            var noti_height = jQuery('.' + noti_id + ' .ibx-fomo-bar-wrapper').outerHeight();

            jQuery('body').css({
                "margin-top":   noti_height + 'px',
                "transition":   "margin-top 0.3s ease",
            });

    // ============= COOKIE ==================
            // get counter time
            var get_value   =   jQuery('.' + noti_id + ' .ibx-fomo-bar-wrapper .timer-counter').attr('data-time');
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
                // Output the result in an element with id="ibx-fomo-bar-start"
                jQuery('.' + noti_id + ' .ibx-fomo-bar-wrapper #start').html(  '<b>' + days + "</b> " +
                                                                    '<b>' + hours + "</b> " +
                                                                    '<b>' + minutes + "</b> " +
                                                                    '<b>' + seconds + "</b> " );
                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    jQuery('.' + noti_id + ' .ibx-fomo-bar-wrapper #start').html("<b>EXPIRED</b>");
                }
            }, 1000);

            jQuery('.' + noti_id + ' .ibx-fomo-bar-wrapper .ibx-fomo-bar-close').click(function(){
                jQuery('.' + noti_id + ' .ibx-fomo-bar-wrapper').css({
                    "margin-top": '-100px',
                    "transition": "margin-top 0.3s ease",
                });
                jQuery('body').css({
                    "margin-top": '0',
                    "transition": "margin-top 0.3s ease",
                });
            });

            if ( get_delay != 0 ){
                var noti_hide_timer =   setTimeout( hideBar, (get_delay) * 1000 );
                function hideBar(){
                    // set position of notification bar
                    jQuery('.' + noti_id + ' .ibx-fomo-bar-wrapper' ).css({
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
});

// poup timmer
jQuery(window).load(function() {
    jQuery('.ibx-notification-popup').each(function(){

        var popup_id            =   jQuery( this ).attr('datalist'); //id

        if ( jQuery( '.ibx-notification-popup' ).hasClass(popup_id) ) {
            var initial_delay   =   ( jQuery( '.' + popup_id + ' .ibx-notify-text-wraper').attr('data-time') ) * 1000; //initial_delay
            var display_time    =   ( jQuery( '.' + popup_id + ' .ibx-notify-text-content').attr('data-time') ) * 1000; //display_time
            var delay_between   =   ( jQuery( '.' + popup_id + ' .ibx-notify-text-wrap').attr('data-time') ) * 1000; // delay_between
            var max_per_page    =     jQuery( '.' + popup_id + ' .ibx-notify-text-wraper').attr('datalist'); //initial_delay
        }

            var count           =   0;
            var container       =   '';

            var container       =   jQuery( '.' + popup_id + ' .ibx-notification-popup-wrapper' ); // creat a variable with name of div

            var first_appear    =   setInterval( firstShow, initial_delay );

                function firstShow() {
                    jQuery( container[count] ).addClass('wpfomo_marked').slideDown();

                    var timer           =   setTimeout( showDiv, display_time );
                    function showDiv() {
                        jQuery( container ).removeClass('wpfomo_marked').slideUp();

                            var apprDivVar   =   setInterval( apprDiv, ( parseInt(delay_between) + parseInt(display_time) ) );
                            function apprDiv() {
                                jQuery( container[count] ).addClass('wpfomo_marked').slideDown();

                                    var timeout     =   setTimeout( timeoutDiv, display_time);
                                    function timeoutDiv() { // set timeout
                                        jQuery( container ).removeClass('wpfomo_marked').slideUp();
                                    };

                                    count       =   count + 1;
                                    if( jQuery( container[count] ).length === 0 || max_per_page == count ){
                                        count       =   0;
                                    }

                            }

                        clearTimeout(timer);
                    }

                    clearInterval(first_appear);
                }

    });
});

// Bottom Custom message popup box
    // jQuery( window ).load(function() {
    //     jQuery( '.ibx-notify-cust-msg').each(function(){
    //         var msg_id          =   jQuery( this ).attr('datalist');
    //         var delay_msg       =   jQuery('.'+ msg_id +' .ibx-notify-wraper' ).attr('datalist') * 1000; //msg_id
    //         var delay_timer     =   setInterval( showMsg, delay_msg );
    //         function showMsg() {
    //             jQuery('.'+ msg_id +' .ibx-notify-toggel-button button').show();
    //         }
    //     }); //id
    //
    //     jQuery('.ibx-notify-toggel-button button').click(function(){
    //         var id  =   jQuery( this ).parent().parent().parent().parent().attr('datalist'); //id
    //         var a   =   jQuery(this).attr('class');
    //         console.log(id);
    //         var e = jQuery('.'+id + ' svg#'+a);
    //         console.log(e);
    //         if ( 'ibx-show' == a ) {
    //             var b =  'ibx-hide';
    //             jQuery('.'+ id +' .ibx-notify-wraper').css({  'animation-name': 'zoomIn',
    //                                                 'animation-fill-mode': 'both',
    //                                                 'animation-duration': '0.3s',
    //                                                 'opacity':  '1' }
    //                                             );
    //         }
    //         if ( 'ibx-hide' == a ) {
    //             var b =  'ibx-show';
    //             jQuery('.'+ id +' .ibx-notify-wraper').css({  'animation-name': 'zoomOut',
    //                                                 'animation-fill-mode': 'both',
    //                                                 'animation-duration': '0.3s',
    //                                                 'opacity':  '1' }
    //                                             );
    //         }
    //         jQuery( '.'+ id +' svg.msg-' + a ).css( {  'opacity':      '0',
    //                                                             'transform':    'rotate(-30deg)',
    //                                                             'transition':   '500ms ease all',
    //                                                             'z-index':      '0'
    //                                                     } );
    //         jQuery( '.'+ id +' svg.msg-' + b ).css( {  'opacity' :     '1',
    //                                                             'transform':    'rotate(0deg)',
    //                                                             'transition':   '500ms ease all',
    //                                                             'z-index':      '999'
    //                                                     } );
    //         jQuery(this).removeClass( a ).addClass( b );
    //     });
    // });
