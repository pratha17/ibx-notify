;(function($) {

    IBXFomo = {
        _fomoBarActive: 0,

        _init: function()
        {
            IBXFomo._initFomo();
            IBXFomo._initConversion();
            IBXFomo._initReviews();
            IBXFomo._bindEvents();
        },

        _bindEvents: function()
        {
            $('body').delegate( '.ibx-fomo .ibx-fomo-bar-close', 'click', function() {
                IBXFomo._fomoBarActive = 0;
                IBXFomo._hideFomoBar();
            } );
        },

        _initFomo: function()
        {
            var elements = $('.ibx-fomo:last');

            if ( elements.length === 0 ) {
                return;
            }

            elements.each(function() {
                var fomo_bar        = $(this),
                    id              = fomo_bar.data('fomo-id'),
                    duration        = fomo_bar.data('display-duration'),
                    countdown_time  = fomo_bar.find('.ibx-fomo-countdown').data('fomo-time'),
                    countdown       = [];

                countdown['days']       = countdown_time.split(',')[0];
                countdown['hours']      = countdown_time.split(',')[1];
                countdown['minutes']    = countdown_time.split(',')[2];
                countdown['seconds']    = countdown_time.split(',')[3];

                // Get current date and time.
                var date    = new Date(),
                    year    = date.getYear() + 1900,
                    month   = date.getMonth() + 1,
                    days    = ( parseInt( date.getDate() ) + parseInt( countdown['days'] ) ),
                    hours   = ( parseInt( date.getHours() ) + parseInt( countdown['hours'] ) ),
                    minutes = ( parseInt( date.getMinutes() ) + parseInt( countdown['minutes'] ) ),
                    seconds = ( parseInt( date.getSeconds() ) + parseInt( countdown['seconds'] ) ),
                    new_date = new Date( year, parseInt( month, 10 ) - 1, days, hours, minutes, seconds ),
                    countdown_cookie = '';

                // Conver countdown time to miliseconds and add it to current date.
                date.setTime(date.getTime() +  ( parseInt( countdown['days'] ) * 24 * 60 * 60 * 1000)
                                            +  ( parseInt( countdown['hours'] )  * 60 * 60 * 1000)
                                            +  ( parseInt( countdown['minutes'] ) * 60 * 1000)
                                            +  ( parseInt( countdown['seconds'] ) * 1000) );

                // Remove countdown value from cookie if countdown value has changed in wp-admin.
                if( $.cookie('ibx_fomo_countdown_old') != countdown_time ){
                    $.cookie( 'ibx_fomo_countdown_old', countdown_time, { expires: date } );
                    $.removeCookie('ibx_fomo_countdown');
                }
                // Get countdown value from cookie if exist.
                if ( $.cookie('ibx_fomo_countdown') ){
                    countdown_cookie = $.cookie( 'ibx_fomo_countdown' );
                }
                else {
                    // Set countdown value in cookie if doesn't exist.
                    $.cookie( 'ibx_fomo_countdown', new_date.getTime(), { expires: date } );
                    $.cookie( 'ibx_fomo_countdown_old', countdown_time, { expires: date } );
                    countdown_cookie = $.cookie( 'ibx_fomo_countdown' );
                }

                // Start countdown.
                var countdown_interval = setInterval(function() {
                    var now         = new Date().getTime(),
                        difference  = countdown_cookie - now;

                    // Calculate time from difference.
                    var days        = Math.floor( difference / ( 1000 * 60 * 60 * 24 ) ),
                        hours       = Math.floor( ( difference % ( 1000 * 60 * 60 * 24 ) ) / ( 1000 * 60 * 60 ) ),
                        minutes     = Math.floor( ( difference % ( 1000 * 60 * 60 ) ) / ( 1000 * 60 ) ),
                        seconds     = Math.floor( ( difference % ( 1000 * 60 )) / 1000 );

                    // Output the result in an element with id="ibx-fomo-countdown-time"
                    fomo_bar.find('#ibx-fomo-countdown-time sapn.ibx-fomo-days').html(days);
                    fomo_bar.find('#ibx-fomo-countdown-time sapn.ibx-fomo-hours').html(hours);
                    fomo_bar.find('#ibx-fomo-countdown-time sapn.ibx-fomo-minutes').html(minutes);
                    fomo_bar.find('#ibx-fomo-countdown-time sapn.ibx-fomo-seconds').html(seconds);

                    // If the count down is over, write some text
                    if ( difference < 0 ) {
                        clearInterval( countdown_interval );
                        fomo_bar.find('#ibx-fomo-countdown-time').addClass('ibx-fomo-expired');
                    }
                }, 1000);

                IBXFomo._showFomoBar(fomo_bar);

                if ( '' !== duration ) {
                    setTimeout(function() {
                        IBXFomo._hideFomoBar();
                    }, parseInt(duration) * 1000);
                }
            });
        },

        _showFomoBar: function(fomo_bar = '')
        {
            if ( '' === fomo_bar ) {
                fomo_bar = $('.ibx-fomo:last');
            }
            var initial_delay       = parseInt( fomo_bar.data('initial-delay') ),
                fomo_bar_height     = fomo_bar.find('.ibx-fomo-bar-wrapper').outerHeight(),
                admin_bar_height    = ( $('#wpadminbar').length > 0 ) ? $('#wpadminbar').outerHeight() : 0;

            if ( '' === initial_delay || isNaN( initial_delay ) ) {
                initial_delay = 0;
            }

            setTimeout(function() {
                $('html').addClass('ibx-fomo-bar-active');
                $('body').css( 'margin-top', ( fomo_bar_height ) + 'px' );
                fomo_bar.find('.ibx-fomo-bar-wrapper').css( 'margin-top', admin_bar_height + 'px' );
                IBXFomo._fomoBarActive = 1;
            }, initial_delay * 1000);
        },

        _hideFomoBar: function()
        {
            var fomo_bar            = $('.ibx-fomo:last'),
                fomo_bar_height     = fomo_bar.find('.ibx-fomo-bar-wrapper').outerHeight(),
                admin_bar_height    = ( $('#wpadminbar').length > 0 ) ? $('#wpadminbar').outerHeight() : 0;

            $('html').removeClass('ibx-fomo-bar-active');
            $('body').css( 'margin-top', '0px' );
            fomo_bar.find('.ibx-fomo-bar-wrapper').css( 'margin-top', '-' + ( fomo_bar_height ) + 'px' );

            IBXFomo._fomoBarActive = 0;
        },

        _initConversion: function()
        {

        },

        _initReviews: function()
        {

        }
    };

    $(window).load(function() {
        IBXFomo._init();
    });

})(jQuery);

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

            var container       =   jQuery( '.' + popup_id + ' .ibx-notification-popup-wraper' ); // creat a variable with name of div

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
