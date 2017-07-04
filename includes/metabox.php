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
                        'type'  => array(
                            'type'      => 'select',
                            'label'     => __('Type' , 'ibx-notify'),
                            'default'   => 'not_bar',
                            'options'   => array(
                                'not_bar'   => __('Notification Bar', 'ibx-notify'),
                                'msg'       => __('Custom Message', 'ibx-notify'),
                                'purchase'      => __('Purchase Notification', 'ibx-notify'),
                                'reviews'   => __('Reviews', 'ibx-notify'),
                            ),
                            'toggle'  => array(
                                'not_bar'   => array(
                                    'sections'  => array('countdown'),
                                    'fields'    => array('not_description', 'sticky','text_color', 'background_color', 'countdown_text_color', 'countdown_background_color', 'show_delay', 'hide'),
                                ),
                                'msg' => array(
                                    'fields'    => array('msg_section', 'position', 'text_color', 'background_color', 'show_delay')
                                ),
                                'purchase' => array(
                                    'fields'    => array('purchase_group', 'clickable', 'show_delay', 'hide', 'position', 'name_color', 'text_color', 'background_color')
                                ),
                                'reviews' => array(
                                    'fields'    => array('reviews_group', 'clickable', 'show_delay', 'hide', 'position', 'text_color', 'background_color', 'star_color')
                                ),
                            ),
                        ),
                        'active_check' => array(
                            'type'          => 'checkbox',
                            'label'         => __('Active?', 'ibx-notify'),
                            'default'       => '1',
                            'sanitize'      => false,
                            'description'   => __('If checked, this will activate the box.', 'ibx-notify'),
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
                        'not_description'   => array(
                            'type'          => 'editor',
                            'label'         => __('Notification Description', 'ibx-notify'),
                            'default'       => __('Message You want to display.', 'ibx-notify'),
                            'rows'          => 6
                        ),
                        'sticky'            => array(
                            'type'              => 'checkbox',
                            'label'             => __('Sticky Bar?', 'ibx-notify'),
                            'default'           => '0',
                            'sanitize'          => false,
                            'description'       => __('If checked, this will fixed Notification Bar on the top.', 'ibx-notify'),
                        ),
                        'msg_section'       => array(
                            'type'              => 'editor',
                            'label'             => __('Custom Message', 'ibx-notify'),
                            'default'           => __('Message You want to display.', 'ibx-notify'),
                            'rows'              => 6
                        ),
                        'clickable'         => array(
                            'type'              => 'checkbox',
                            'label'             => __('Clickable?', 'ibx-notify'),
                            'default'           => '0',
                            'sanitize'          => false,
                            'help'              => __('Check this if you want to make this Clickable and redirect to some url.', 'ibx-notify'),
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
                        'purchase_group'        => array(
                            'type'              => 'group',
                            'title'             => __('Purchase', 'ibx-notify'),
                            'fields'            => array(
                                'name'              => array(
                                    'type'          => 'text',
                                    'label'         => __('Name', 'ibx-notify'),
                                    'default'       => '',
                                ),
                                'image'         => array(
                                    'type'          => 'photo',
                                    'label'         => __('Image', 'ibx-notify'),
                                ),
                                'msg'           => array(
                                    'type'          => 'textarea',
                                    'label'         => __('Message', 'ibx-notify'),
                                    'default'       => '',
                                    'rows'          => 2
                                ),
                            ),
                        ),
                        'reviews_group'     => array(
                            'type'              => 'group',
                            'title'             => __('Reviews', 'ibx-notify'),
                            'fields'            => array(
                                'image'     => array(
                                    'type'      => 'photo',
                                    'label'     => __('Image', 'ibx-notify'),
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
                                'msg'       => array(
                                    'type'      => 'textarea',
                                    'label'     => __('Message', 'ibx-notify'),
                                    'default'   => '',
                                    'rows'      => 2
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
                            'description'       => __('If checked, this will activate Countdown.', 'ibx-notify'),
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
                                'new'                => 'New Visitors Only',
                                'returning'          => 'Returning Visitors Only',
                            ),
                        ),
                        'show_delay'        => array(
                            'type'              => 'number',
                            'label'             => __('Appear after', 'ibx-notify'),
                            'description'       => __('seconds', 'ibx-notify'),
                        ),
                        'hide'              => array(
                            'type'              => 'select',
                            'label'             => __('When it should disappear?', 'ibx-notify'),
                            'default'           => 'click',
                            'options'           => array(
                                'never'             => __('Never', 'ibx-notify'),
                                'click'             => __('When user clicks hide', 'ibx-notify'),
                                'delay'             => __('Delay of some time', 'ibx-notify'),
                            ),
                            'toggle'        => array(
                                // 'never'         => array(
                                //     'fields'        => array('transition_delay')
                                // ),
                                // 'click'         => array(
                                //     'fields'        => array('transition_delay')
                                // ),
                                'delay'         => array(
                                    'fields'        => array('hide_delay')
                                ),
                            ),
                        ),
                        'hide_delay'        => array(
                            'type'              => 'number',
                            'label'             => __('Disappear after', 'ibx-notify'),
                            'description'       => __('seconds', 'ibx-notify'),
                        ),
                        // 'transition_delay'        => array(
                        //     'type'              => 'number',
                        //     'label'             => __('Transition Delay', 'ibx-notify'),
                        //     'description'       => __('seconds', 'ibx-notify'),
                        // ),
                        // 'how_often'         => array(
                        //     'type'              => 'select',
                        //     'label'             => __('How often it should appear to each visitor?', 'ibx-notify'),
                        //     'default'           => 'always',
                        //     'options'           => array(
                        //         'always'            => __('Everytime page load', 'ibx-notify'),
                        //         'user_interacts'    => __('Hide after user interacts (clicks link or submits email)', 'ibx-notify'),
                        //         'hide_for'          => __('Show, then hide for some days', 'ibx-notify'),
                        //     ),
                        //     'toggle'        => array(
                        //         'hide_for'      => array(
                        //             'fields'    => array('hide_for_days')
                        //         ),
                        //     ),
                        // ),
                        // 'hide_for_days'     => array(
                        //     'type'              => 'number',
                        //     'label'             => __('Hide for', 'ibx-notify'),
                        //     'description'       => __('days', 'ibx-notify'),
                        // ),
                    ),
                ),
            ),
        ),
    )
) );
