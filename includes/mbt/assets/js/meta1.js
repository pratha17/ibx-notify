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

            MBT._initColorField();
            MBT._initPhotoField();
            MBT._initGroupField();
        },

        _initColorField: function()
        {
            if ( 'undefined' !== typeof $.fn.wpColorPicker ) {
                // Add Color Picker to all inputs that have 'mbt-color-picker' class.
                $( '.mbt-color-picker' ).each(function() {
                    var color = $(this).val();
                    $(this).wpColorPicker().parents('.wp-picker-container').find('.wp-color-result').css('background-color', '#' + color);
                });
            }
        },

        _initPhotoField: function()
        {
            if ( $('.mbt-field[data-type="photo"]').length === 0 ) {
                return;
            }

            var frame,
                field           = $('.mbt-field[data-type="photo"]'),
                uploadButton    = field.find('a.mbt-upload-img'),
                removeButton    = field.find('a.mbt-delete-img'),
                imgContainer    = field.find('.mbt-img-container'),
                imgIdField      = field.find('.mbt-img-id');
                imgUrlField     = field.find('.mbt-img-url');

            // Upload image.
            uploadButton.on('click', function(e) {

                e.preventDefault();

                // If the media frame already exists, reopen it.
                if ( frame ) {
                    frame.open();
                    return;
                }

                // Create a new media frame
                frame = wp.media({
                    title: 'Upload Photo',
                    button: {
                        text: 'Use this photo'
                    },
                    multiple: false  // Set to true to allow multiple files to be selected
                });

                // When an image is selected in the media frame...
                frame.on( 'select', function() {

                    // Get media attachment details from the frame state
                    var attachment = frame.state().get('selection').first().toJSON();

                    // Send the attachment URL to our custom image input field.
                    imgContainer.addClass('mbt-has-img').append( '<img src="'+attachment.url+'" alt="" style="max-width:100%;"/>' );

                    // Send the attachment id to our hidden input
                    imgIdField.val( attachment.id );

                    // Send the attachment url to our url input
                    imgUrlField.val( attachment.url );

                    // Hide the upload button
                    uploadButton.addClass( 'hidden' );

                    // Show the remove button
                    removeButton.removeClass( 'hidden' );
                });

                // Finally, open the modal on click
                frame.open();
            });

            // Remove image.
            removeButton.on('click', function(e) {

                e.preventDefault();

                imgContainer.html('').removeClass( 'mbt-has-img' );

                // Show the upload button
                uploadButton.removeClass( 'hidden' );

                // Hide the remove button
                removeButton.addClass( 'hidden' );

                // Delete the image id from the hidden input
                imgIdField.val( '' );

                // Delete the image url from the url input
                imgUrlField.val( '' );
            });

        },

        _initGroupField: function()
        {
            if ( $('.mbt-field[data-type="group"]').length === 0 ) {
                return;
            }

            var field = $('.mbt-field[data-type="group"]');

            field.each(function() {

                var $this       = $(this),
                    firstGroup  = $this.find('.mbt-fields-group:first'),
                    lastGroup   = $this.find('.mbt-fields-group:last');

                firstGroup.find('.mbt-fields-group-order .mbt-fields-group-up').addClass('disabled');
                lastGroup.find('.mbt-fields-group-order .mbt-fields-group-down').addClass('disabled');

                $this.find('.mbt-fields-group-action').on('click', '.mbt-fields-group-add', function(e) {

                    e.preventDefault();

                    var fieldId     = $this.attr('id'),
                        wrapper     = $this.find('.mbt-fields-group-wrapper'),
                        groups      = $this.find('.mbt-fields-group'),
                        firstGroup  = $this.find('.mbt-fields-group:first'),
                        lastGroup   = $this.find('.mbt-fields-group:last'),
                        clone       = $($this.find('.mbt-fields-group-template').html()),
                        groupId     = parseInt(lastGroup.data('group-id')),
                        nextGroupId = groupId + 1,
                        title       = clone.data('group-title');

                    groups.find('.mbt-fields-group-order a').removeClass('disabled');

                    // Reset all data of clone object.
                    clone.attr('data-group-id', nextGroupId);
                    clone.find('.mbt-fields-group-title').html(title + ' ' + nextGroupId);

                    clone.find('.mbt-fields-group-remove').attr('data-remove-group', nextGroupId);

                    clone.find('.mbt-fields-group-order .mbt-fields-group-down').addClass('disabled');

                    clone.insertBefore($(this).parent());

                    MBT._restGroupFieldIds(groups);

                    $this.find('.mbt-fields-group-footer').show();

                    firstGroup.find('.mbt-fields-group-order .mbt-fields-group-up').addClass('disabled');
                });
            });

        },

        _bindEvents: function()
        {
            $('body').delegate( '.mbt-metabox-tabs-wrapper .mbt-input-field', 'change', function() {
                MBT._fieldChange(this);
            } );
            $('body').delegate( '.mbt-metabox-tabs-wrapper .mbt-fields-group .mbt-fields-group-title', 'click', function() {
                MBT._groupFieldToggle(this);
            } );
            $('body').delegate( '.mbt-metabox-tabs-wrapper .mbt-fields-group .mbt-fields-group-remove', 'click', function() {
                MBT._groupFieldRemove(this);
            } );
            $('body').delegate( '.mbt-metabox-tabs-wrapper .mbt-fields-group .mbt-fields-group-up', 'click', function() {
                MBT._groupFieldMoveUp(this);
            } );
            $('body').delegate( '.mbt-metabox-tabs-wrapper .mbt-fields-group .mbt-fields-group-down', 'click', function() {
                MBT._groupFieldMoveDown(this);
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

        /**
		 * Toggle group field content.
		 *
		 * @since 1.0
		 * @access private
		 * @method _groupFieldToggle
		 */
        _groupFieldToggle: function(handle)
        {
            var handle = $(handle);
            handle.next().slideToggle({
                duration: 0,
                complete: function() {
                    if ( $(this).is(':visible') ) {
                        handle.addClass('open');
                    } else {
                        handle.removeClass('open');
                    }
                }
            });
        },

        _groupFieldRemove: function(button)
        {
            var groupId = $(button).data('remove-group'),
                group   = $(button).parents('.mbt-fields-group[data-group-id="'+groupId+'"]'),
                parent  = group.parent();

            group.remove();

            if ( parent.find('.mbt-fields-group').length === 1 ) {
                parent.find('.mbt-fields-group .mbt-fields-group-footer').hide();
            }

            parent.find('.mbt-fields-group:first').find('.mbt-fields-group-up').addClass('disabled');
        },

        _groupFieldMoveUp: function(button)
        {
            var currentGroup    = $(button).parents('.mbt-fields-group'),
                previousGroup   = currentGroup.prev(),
                parent          = currentGroup.parent();

            currentGroup.insertBefore(previousGroup);

            MBT._resetGroupFieldButtons(parent);
        },

        _groupFieldMoveDown: function(button)
        {
            var currentGroup    = $(button).parents('.mbt-fields-group'),
                nextGroup       = currentGroup.next(),
                parent          = currentGroup.parent();

            currentGroup.insertAfter(nextGroup);

            MBT._resetGroupFieldButtons(parent);
        },

        _resetGroupFieldButtons: function(groupsParent)
        {
            groupsParent.find('.mbt-fields-group .mbt-fields-group-order a').removeClass('disabled');
            groupsParent.find('.mbt-fields-group:first').find('.mbt-fields-group-up').addClass('disabled');
            groupsParent.find('.mbt-fields-group:first').find('.mbt-fields-group-down').removeClass('disabled');
            groupsParent.find('.mbt-fields-group:last').find('.mbt-fields-group-up').removeClass('disabled');
            groupsParent.find('.mbt-fields-group:last').find('.mbt-fields-group-down').addClass('disabled');
        },

        _restGroupFieldIds: function(groups)
        {
            var groupId     = 1;
            var nextGroupId = groups.length + 1;

            groups.each(function() {
                var group       = $(this);
                var fieldName   = group.data('field-name');
                var fieldId     = 'mbt-field-' + fieldName;
                var groupInfo   = group.find('.mbt-fields-group-info').data('info');
                var subFields   = groupInfo.group_sub_fields;

                subFields.forEach(function(obj) { console.log(obj);
                    group.find('tr.mbt-field[id="'+obj.field_name+'"]').attr('id', fieldId + '[' + groupId + '][' + obj.original_name + ']');
                });

                $(this).find('tr.mbt-field[id*='+fieldId+']').each(function() {

                    var fieldNameSuffix = $(this).attr('id').split('[1]')[1];
                    var nextFieldId     = fieldId + '[' + nextGroupId + ']' + fieldNameSuffix;
                    var label           = $(this).find('th label');

                    $(this).find('[name*="'+fieldName+'[1]"]').each(function() {
                        var inputName       = $(this).attr('name').split('[1]');
                        var inputNamePrefix = inputName[0];
                        var inputNameSuffix = inputName[1];
                        var newInputName    = inputNamePrefix + '[' + nextGroupId + ']' + inputNameSuffix;
                        $(this).attr('id', newInputName).attr('name', newInputName);
                        label.attr('for', newInputName);
                    });

                    $(this).attr('id', nextFieldId);
                });

                groupId++;
            });
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
