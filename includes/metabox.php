<?php
MetaBox_Tabs::add_meta_box( array(
    'id'            => 'ibx_notify',
    'title'         =>  __('Custom Metabox', 'ibx-notify'),
    'object_types'  => array('ibx_notify'),
    'context'       => 'normal',
    'priority'      => 'high',
    'show_header'   => false,
    'fields_prefix' => 'ibx_notify_',
    'config'        => array(
        'configuration' => array(
            'title'         =>  __('Config', 'ibx-notify'),
            'sections'      => array(
                'config_section'    => array(
                    'title'             => __('Configuration', 'ibx-notify'),
                    'description'       => __('The section below is for configuration. You can set it as per your requirements.', 'ibx-notify'),
                    'fields'            => array(
                        'active_check'      => array(
                            'type'              => 'checkbox',
                            'label'             => __('Active?', 'ibx-notify'),
                            'default'           => '1',
                            'sanitize'          => false,
                            'description'       => __('If checked, this will activate the notification.', 'ibx-notify'),
                        ),
                        'type'  => array(
                            'type'      => 'select',
                            'label'     => __('Type' , 'ibx-notify'),
                            'default'   => 'fomo_bar',
                            'options'   => array(
                                'fomo_bar'   => __('Fomo Bar', 'ibx-notify'),
                                'conversion' => __('Conversions', 'ibx-notify'),
                                'reviews'    => __('Reviews', 'ibx-notify'),
                            ),
                            'toggle'  => array(
                                'fomo_bar'   => array(
                                    'sections'  => array('countdown'),
                                    'fields'    => array('fomo_desc', 'sticky', 'clickable','text_color', 'background_color', 'countdown_text_color', 'countdown_background_color'),
                                ),
                                'conversion' => array(
                                    'sections'  => array('image_option'),
                                    'fields'    => array('message_format', 'conversion_group', 'position', 'name_color', 'text_color', 'background_color', 'max_per_page', 'delay_between', 'random', 'loop', 'randomize')
                                ),
                                'reviews' => array(
                                    'fields'    => array('reviews_group', 'rating', 'position', 'text_color', 'background_color', 'star_color', 'max_per_page', 'delay_between', 'random', 'loop', 'randomize')
                                ),
                            ),
                        ),
                        'message_format'   => array(
                            'type'          => 'textarea',
                            'label'         => __('Notification Format', 'ibx-notify'),
                            'rows'          => 3,
                            'default'       => __('{{name}} from {{city}} just signed up for our newsletter!', 'ibx-notify'),
                            'help'          => __('Variables: {{name}}, {{city}}, {{state}}, {{country}}, {{title}}', 'ibx-notify'),
                        ),
                    ),
                ),
                'image_option'    => array(
                    'title'             => __('Image Options', 'ibx-notify'),
                    'fields'            => array(
                        'customer_avatar' => array(
                            'type'          => 'checkbox',
                            'label'         => __('Use customer avatar as image', 'ibx-notify'),
                            'description'   => __('This requires a customer email address.', 'ibx-notify'),
                        ),
                        'disable_img' => array(
                            'type'          => 'checkbox',
                            'label'         => __('Force Disable Images', 'ibx-notify'),
                            'description'   => __('If checked, it will not display any images in notification.', 'ibx-notify'),
                        ),
                        'default_img_url' => array(
                            'type'          => 'photo',
                            'label'         => __('Default Image URL', 'ibx-notify'),
                            'description'   => __('Upload an image or paste external URL of image.', 'ibx-notify'),
                            'help'          => __('Default images are \'backup\' images for new notification. If an image is provided, it will override the default.', 'ibx-notify'),
                        ),
                    ),
                ),
            ),
        ),
        'content'    => array(
            'title'     => __('Content', 'ibx-notify'),
            'sections'  => array(
                'content_section'  => array(
                    'title'             => __('Content', 'ibx-notify'),
                    'description'       => __('The section below is to write your content.', 'ibx-notify'),
                    'fields'            => array(
                        'fomo_desc'   => array(
                            'type'          => 'textarea',
                            'label'         => __('Notification Description', 'ibx-notify'),
                            'default'       => __('Message You want to display.', 'ibx-notify'),
                            'rows'          => 3
                        ),
                        'sticky'            => array(
                            'type'              => 'checkbox',
                            'label'             => __('Sticky Bar?', 'ibx-notify'),
                            'default'           => '0',
                            'sanitize'          => false,
                            'description'       => __('If checked, this will fixed Notification Bar on the top.', 'ibx-notify'),
                        ),
                        'clickable'         => array(
                            'type'              => 'checkbox',
                            'label'             => __('Clickable?', 'ibx-notify'),
                            'default'           => '0',
                            'sanitize'          => false,
                            'description'       => __('Check this if you want to make this clickable and redirect to some URL.', 'ibx-notify'),
                            'toggle'            => array(
                                '1'                 => array(
                                    'fields'            => array('url' )
                                ),
                            ),
                        ),
                        'url'               => array(
                            'type'              => 'text',
                            'label'             => __('URL', 'ibx-notify'),
                            'default'           => '',
                        ),
                        'conversion_group'        => array(
                            'type'              => 'group',
                            'title'             => __('Conversions', 'ibx-notify'),
                            'fields'            => array(
                                'title'              => array(
                                    'type'          => 'text',
                                    'label'         => __('Title', 'ibx-notify'),
                                    'default'       => '',
                                ),
                                'name'              => array(
                                    'type'          => 'text',
                                    'label'         => __('Name', 'ibx-notify'),
                                    'default'       => '',
                                ),
                                'email'           => array(
                                    'type'          => 'text',
                                    'label'         => __('Email Address', 'ibx-notify'),
                                ),
                                'city'           => array(
                                    'type'          => 'text',
                                    'label'         => __('City', 'ibx-notify'),
                                ),
                                'state'           => array(
                                    'type'          => 'text',
                                    'label'         => __('State', 'ibx-notify'),
                                ),
                                'country'           => array(
                                    'type'          => 'text',
                                    'label'         => __('Country', 'ibx-notify'),
                                ),
                                'image'         => array(
                                    'type'          => 'photo',
                                    'label'         => __('Image', 'ibx-notify'),
                                ),
                                'msg_url'               => array(
                                    'type'              => 'text',
                                    'label'             => __('URL', 'ibx-notify'),
                                    'default'           => '',
                                ),
                            ),
                        ),
                        'reviews_group'     => array(
                            'type'              => 'group',
                            'title'             => __('Reviews', 'ibx-notify'),
                            'fields'            => array(
                                'title'              => array(
                                    'type'          => 'text',
                                    'label'         => __('Title', 'ibx-notify'),
                                    'default'       => '',
                                ),
                                'name'              => array(
                                    'type'          => 'text',
                                    'label'         => __('Name', 'ibx-notify'),
                                    'default'       => '',
                                ),
                                'email'           => array(
                                    'type'          => 'text',
                                    'label'         => __('Email Address', 'ibx-notify'),
                                ),
                                'city'           => array(
                                    'type'          => 'text',
                                    'label'         => __('City', 'ibx-notify'),
                                ),
                                'state'           => array(
                                    'type'          => 'text',
                                    'label'         => __('State', 'ibx-notify'),
                                ),
                                'country'           => array(
                                    'type'          => 'text',
                                    'label'         => __('Country', 'ibx-notify'),
                                ),
                                'image'         => array(
                                    'type'          => 'photo',
                                    'label'         => __('Image', 'ibx-notify'),
                                ),
                                'msg_url'               => array(
                                    'type'              => 'text',
                                    'label'             => __('URL', 'ibx-notify'),
                                    'default'           => '',
                                ),
                                'rating'    => array(
                                    'type'      => 'select',
                                    'label'     => __('Rating', 'ibx-notify'),
                                    'default'   => '',
                                    'options'   => array(
                                        '1'         => __('1', 'ibx-notify'),
                                        '2'         => __('2', 'ibx-notify'),
                                        '3'         => __('3', 'ibx-notify'),
                                        '4'         => __('4', 'ibx-notify'),
                                        '5'         => __('5', 'ibx-notify'),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'countdown' => array(
                    'title'     => __('Countdown Timer', 'ibx-notify'),
                    'fields'    => array(
                        'enable_countdown' => array(
                            'type'              => 'checkbox',
                            'label'             => __('Enable Countdown?', 'ibx-notify'),
                            'default'           => '0',
                            'sanitize'          => false,
                            'toggle'            => array(
                                '1'                 => array(
                                    'fields'            => array('countdown_text', 'countdown_time' )
                                ),
                            ),
                        ),
                        'countdown_text'   => array(
                            'type'              => 'text',
                            'label'             => __('Countdown Text', 'ibx-notify'),
                        ),
                        'countdown_time'   => array(
                            'type'              => 'time',
                            'label'             => __('Countdown Time', 'ibx-notify'),
                        ),
                    )
                )
            ),
        ),
        'design' => array(
            'title'     => __('Design', 'ibx-notify'),
            'sections'  => array(
                'design_section'=> array(
                    'title'         => __('Design', 'ibx-notify'),
                    'description'   => __('The section below is to change style, color and position of your content.', 'ibx-notify'),
                    'fields'        => array(
                        'position'      => array(
                            'type'      => 'select',
                            'label'     => __('Positon', 'ibx-notify'),
                            'default'   => 'bottom-left',
                            'options'   => array(
                                'bottom-left'   => __('Bottom Left', 'ibx-notify'),
                                'bottom-right'  => __('Bottom Right', 'ibx-notify'),
                            ),
                        ),
                        'name_color'    => array(
                            'type'      => 'color',
                            'label'     => __('Name Color', 'ibx-notify'),
                            'default'   => '#000000',
                        ),
                        'text_color'    => array(
                            'type'      => 'color',
                            'label'     => __('Text Color', 'ibx-notify'),
                            'default'   => '#000000',
                        ),
                        'background_color'  => array(
                            'type'          => 'color',
                            'label'         => __('Background Color', 'ibx-notify'),
                            'default'       => '#ffffff',
                        ),
                        'countdown_text_color'    => array(
                            'type'      => 'color',
                            'label'     => __('Countdown Text Color', 'ibx-notify'),
                            'default'   => '#000000',
                        ),
                        'countdown_background_color'  => array(
                            'type'          => 'color',
                            'label'         => __('Countdown Background Color', 'ibx-notify'),
                            'default'       => '#ffffff',
                        ),
                        'star_color'      => array(
                            'type'          => 'color',
                            'label'         => __('Rating Star Color', 'ibx-notify'),
                            'default'       => '#000000',
                        ),
                    ),
                ),
            ),
        ),
        'visibility' => array(
            'title'     => __('Visibility', 'ibx-notify'),
            'sections'  => array(
                'visibility_section'=> array(
                    'title'             => __('Visibility', 'ibx-notify'),
                    'description'       => __('The section below is to set visibility of Content.', 'ibx-notify'),
                    'fields'            => array(
                        'page'              => array(
                            'type'          => 'select',
                            'label'         => __('What pages?', 'ibx-notify'),
                            'default'       => __('all-pages', 'ibx-notify'),
                            'options'       => array(
                                'all-pages'     => __('All Pages', 'ibx-notify'),
                                'certain-pages' => __('Certain Pages', 'ibx-notify'),
                            ),
                            'toggle'        => array(
                                'certain-pages' => array(
                                    'fields'    => array('page_ids')
                                ),
                            ),
                        ),
                        'page_ids'          => array(
                            'type'              => 'text',
                            'label'             => __('Page Ids', 'ibx-notify'),
                            'help'              => __('Enter Pages Ids with comma ( , ) Separator. Example: 2,25,311', 'ibx-notify'),
                        ),
                        'visibility_display'=> array(
                            'type'              => 'select',
                            'label'             => __('Display', 'ibx-notify'),
                            'default'           => 'always',
                            'options'           => array(
                                'always'            => __('Always', 'ibx-notify'),
                                'logged_out'        => __('Logged Out User', 'ibx-notify'),
                                'logged_in'         => __('Logged In User', 'ibx-notify')
                            ),
                        ),
                        'visibility_visitors'=> array(
                            'type'               => 'select',
                            'label'              => __('Visitors', 'ibx-notify'),
                            'default'            => 'all',
                            'options'            => array(
                                'all'                => __('All Visitors', 'ibx-notify'),
                                'new'                => __('New Visitors Only', 'ibx-notify'),
                                'returning'          => __('Returning Visitors Only', 'ibx-notify')
                            ),
                        ),
                    ),
                ),
                'behavior' => array(
                    'title'     => __('Behavior', 'ibx-notify'),
                    'fields'    => array(
                        'initial_delay'   => array(
                            'type'              => 'number',
                            'label'             => __('Initial Delay', 'ibx-notify'),
                            'default'           => __('5', 'ibx-notify'),
                            'description'       => __('in seconds', 'ibx-notify'),
                            'help'              =>__('Initial delay of displaying first notification.', 'ibx-notify'),
                        ),
                        'max_per_page'   => array(
                            'type'              => 'number',
                            'label'             => __('Max Per Page', 'ibx-notify'),
                            'default'           => __('5', 'ibx-notify'),
                            'help'              =>__('Limit the number of notifications to be displayed per page.', 'ibx-notify'),
                        ),
                        'display_time'   => array(
                            'type'              => 'number',
                            'label'             => __('Display Time', 'ibx-notify'),
                            'default'           => __('6', 'ibx-notify'),
                            'description'       => __('in seconds', 'ibx-notify'),
                            'help'              =>__('Total duration of each notification to be displayed.', 'ibx-notify'),
                        ),
                        'delay_between'   => array(
                            'type'              => 'number',
                            'label'             => __('Delay between notifications', 'ibx-notify'),
                            'default'           => __('12', 'ibx-notify'),
                            'description'       => __('in seconds', 'ibx-notify'),
                            'help'              =>__('Delay between each notifications.', 'ibx-notify'),
                        ),
                    ),
                ),
                'display_setting' => array(
                    'title'     => __('Display Settings', 'ibx-notify'),
                    'fields'    => array(
                        'random'   => array(
                            'type'              => 'checkbox',
                            'label'             => __('Display notification in random order', 'ibx-notify'),
                            'help'              =>__('Notifications will appear in a random way.', 'ibx-notify'),
                        ),
                        'loop'   => array(
                            'type'              => 'checkbox',
                            'label'             => __('Loop notification', 'ibx-notify'),
                            'help'              =>__('Repeats the sequence of your notifications, if visitor still on page when they run out.', 'ibx-notify'),
                        ),
                        'hide_mobile'   => array(
                            'type'              => 'checkbox',
                            'label'             => __('Hide on Mobile', 'ibx-notify'),
                            'help'              =>__('It will disable notifications on mobile screen.', 'ibx-notify'),
                        ),
                        'hide_desktop'   => array(
                            'type'              => 'checkbox',
                            'label'             => __('Hide on Desktop', 'ibx-notify'),
                            'help'              =>__('It will disable notifications on desktop screen.', 'ibx-notify'),
                        ),
                        'closable'   => array(
                            'type'              => 'checkbox',
                            'label'             => __('Allow users to close notifications', 'ibx-notify'),
                            'help'              =>__('Display a cross at the top right of the notification box.', 'ibx-notify'),
                        ),
                        'randomize'   => array(
                            'type'              => 'checkbox',
                            'label'             => __('Randomize delay between notifications', 'ibx-notify'),
                            'help'              =>__('Makes notifications seem more lifelike by randomizing the delay between them.', 'ibx-notify'),
                        ),
                        'trigger'   => array(
                            'type'              => 'checkbox',
                            'label'             => __('Trigger notifications link to open in new tab', 'ibx-notify'),
                            'help'              =>__('When a user clicks on the notifications the link will open in new tab.', 'ibx-notify'),
                        ),
                    ),
                ),
            ),
        ),
    )
) );
