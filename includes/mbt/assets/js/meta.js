;(function($) {

    /**
	 * The main metabox interface class.
	 *
	 * @since 1.0
	 * @class MBT
	 */
    MBT = {
        _init: function()
        {
            MBT._initTabs();
            MBT._bindEvents();
            MBT._initFields();
        },

        _initTabs: function()
        {
            // Tabs.
            var navEl       = $('.mbt-metabox-tabs'),
                container   = $(navEl.data('container')),
                tabHash     = window.location.hash,
                currentTab  = window.location.hash.replace( '!', '' );

            // If the URL contains a hash beginning with cf-tab, mark that tab as open
            // and display that tab's panel.
            if ( tabHash && tabHash.indexOf('mbt-metabox-tab-') >= 0 ) {

                // Remove the active class from everything in this tab navigation and section.
                container.find('.mbt-metabox-tab-content').removeClass('active');
                navEl.find('.mbt-metabox-tab').removeClass('active');

                // Add the active class to the chosen tab and section.
                $(currentTab).addClass('active');
                navEl.find('a[href="'+currentTab+'"]').parent().addClass('active');

                // Update the form action to contain the selected tab as a hash in the URL
                // This means when the user saves their Giveaway, they'll see the last selected
                // tab 'open' on reload.
                var postAction = $('#post').attr('action');
                if ( postAction ) {
                    // Remove any existing hash from the post action.
                    postAction = postAction.split('#')[0];

                    // Append the selected tab as a hash to the post action.
                    $( '#post' ).attr( 'action', postAction + window.location.hash );
                }
            }

            navEl.find('a').on('click', function(e) {
                // Prevent the default action.
                e.preventDefault();

                // Remove the active class from everything in this tab navigation and section.
                container.find('.mbt-metabox-tab-content').removeClass('active');
                navEl.find('.mbt-metabox-tab').removeClass('active');

                // Get the nav tab ID.
                var tabId = $(this).attr('href');

                // Add the active class to the chosen tab and section.
                $(tabId).addClass('active');
                $(this).parent().addClass('active');

                // Update the window URL to contain the selected tab as a hash in the URL.
                window.location.hash = tabId.split('#').join('#!');

                // Update the form action to contain the selected tab as a hash in the URL
                // This means when the user saves their Giveaway, they'll see the last selected
                // tab 'open' on reload.
                var postAction = $('#post').attr('action');
                if ( postAction ) {
                    // Remove any existing hash from the post action.
                    postAction = postAction.split('#')[0];

                    // Append the selected tab as a hash to the post action.
                    $( '#post' ).attr( 'action', postAction + window.location.hash );
                }
            });
        },

        _initFields: function()
        {
            $('.mbt-metabox-tabs-wrapper .mbt-input-field').trigger('change');

            if ( 'undefined' !== typeof $.fn.wpColorPicker ) {
                // Add Color Picker to all inputs that have 'mbt-color-picker' class.
                $( '.mbt-color-picker' ).wpColorPicker();
            }
        },

        _bindEvents: function()
        {
            $('body').delegate( '.mbt-metabox-tabs-wrapper .mbt-input-field', 'change', function() {
                MBT._fieldChange(this);
            } );
        },

        /**
		 * Callback for when a settings form field has been changed.
		 * If toggle data is present, other fields will be toggled
		 * when this field changes.
		 *
		 * @since 1.0
		 * @access private
		 * @method _fieldChange
		 */
        _fieldChange: function(input)
        {
            var field   = $(input),
                id      = field.attr('id'),
                toggle  = field.data('toggle'),
                val     = field.val(),
                i       = 0;

            if ( 'checkbox' === field.attr('type') && ! field.is(':checked') ) {
                val = '0';
            }

            if ( field.hasClass('mbt-post-type-field') ) {
                if ( $('select[data-post-type-field="'+id+'"]').length > 0 ) {
                    MBT._updatePostTypeField( val, $('select[data-post-type-field="'+id+'"]') );
                }
            }

            // TOGGLE sections or fields.
    		if ( typeof toggle !== 'undefined' ) {

                if ( typeof toggle !== 'object' ) {
    			    toggle = JSON.parse(toggle);
                }

    			for(i in toggle) {
    				MBT._fieldToggle(toggle[i].fields, 'hide', '#mbt-field-');
    				MBT._fieldToggle(toggle[i].sections, 'hide', '#mbt-metabox-section-');
    				MBT._fieldToggle(toggle[i].tabs, 'hide', 'li.mbt-metabox-tab[data-tab=', ']');
    			}

    			if(typeof toggle[val] !== 'undefined') {
    				MBT._fieldToggle(toggle[val].fields, 'show', '#mbt-field-');
    				MBT._fieldToggle(toggle[val].sections, 'show', '#mbt-metabox-section-');
                    MBT._fieldToggle(toggle[i].tabs, 'show', 'li.mbt-metabox-tab[data-tab=', ']');
    			}
    		}
        },

        /**
		 * @since 1.0
		 * @access private
		 * @method _fieldToggle
		 * @param {Array} inputArray
		 * @param {Function} func
		 * @param {String} prefix
		 * @param {String} suffix
		 */
        _fieldToggle: function(inputArray, func, prefix, suffix)
        {
            var i = 0;

    		suffix = 'undefined' == typeof suffix ? '' : suffix;

    		if(typeof inputArray !== 'undefined') {
    			for( ; i < inputArray.length; i++) {
    				$(prefix + inputArray[i] + suffix)[func]();
    			}
    		}
        },

        _updatePostTypeField: function(post_type, field)
        {
            var selected_taxonomy = field.data('value');
            $.ajax({
                type: 'post',
                data: {
                    action: 'mbt_get_object_taxonomies',
                    mbt_post_type: post_type,
                    mbt_tax_exclude: field.data('exclude')
                },
                url: ajaxurl,
                success: function(res) {
                    if ( res !== 'undefined' || res !== '' ) {
                        field.html(res);
                        field.find('option[value="'+selected_taxonomy+'"]').attr('selected', 'selected');
                    }
                }
            });
        }
    };

    $(document).ready(function() {
        MBT._init();
    });
})(jQuery);
