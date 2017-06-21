<?php
MetaBox_Tabs::add_meta_box( array(
    'id'            => 'ibx_notify',
    'title'         => 'Custom Metabox',
    'object_types'  => array('ibx_notify'),
    'context'       => 'normal',
    'priority'      => 'high',
    'show_header'   => false,
    'fields_prefix' => 'ibx_notify_',
    'config'        => array(
        'configuration' => array(
            'title'         => 'Config',
            'sections'      => array(
                'config_section'    => array(
                    'title'             => 'Configuration Section',
                    'description'       => 'The section below is for configuration. You can set it as per your requirements.',
                    'fields'            => array(
                        'type'  => array(
                            'type'  => 'select',
                            'label'  => 'Type',
                            'default'  => 'not_bar',
                            'options'  => array(
                                'not_bar' => 'Notification Bar',
                                'msg' => 'Custom Message',
                                'sale' => 'Sale Notification',
                                'reviews' => 'Reviews',
                            ),
                            'toggle'  => array(
                                'not_bar' => array(
                                    'fields' => array('not_desc', 'enable_countdown' )
                                ),
                                'msg' => array(
                                    'fields' => array('msg_section')
                                ),
                                'sale' => array(
                                    'fields' => array('sale_section')
                                ),
                                'reviews' => array(
                                    'fields' => array('reviews_section')
                                ),
                            ),
                        ),
                        'active_check' => array(
                            'type'  => 'checkbox',
                            'label'  => 'Active?',
                            'default'  => '1',
                            'sanitize'  => false,
                            'description'  => 'If checked, this will activate the box.',
                        ),
                    ),
                ),
            ),
        ),
        'content'    => array(
            'title'  => 'Content',
            'sections'  => array(
                'content_section'  => array(
                    'title'  => 'Content Section',
                    'description'  => 'The section below is to write your content.',
                    'fields'  => array(
                        'not_desc' => array(
                            'type'  => 'editor',
                            'label'  => 'Notification Description',
                            'default'  => 'Message You want to display.',
                            'rows'  => 6
                        ),
                        'enable_countdown' => array(
                            'type'  => 'checkbox',
                            'label'  => 'Enable Countdown?',
                            'default'  => '0',
                            'sanitize'  => false,
                            'description'  => 'If checked, this will activate Countdown.',
                            'toggle'  => array(
                                '1' => array(
                                    'fields' => array('countdown_text', 'countdown_time' )
                                ),
                            ),
                        ),
                        'countdown_text' => array(
                            'type'  => 'text',
                            'label'  => 'Countdown Text',
                        ),
                        'countdown_time' => array(
                            'type'   => 'time',
                            'label'  => 'Countdown Time',
                        ),

                        'msg_section' => array(
                            'type'  => 'editor',
                            'label'  => 'Custom Message',
                            'default'  => 'Message You want to display.',
                            'rows'  => 6
                        ),
                    ),
                ),
            ),
        ),
        'design' => array(
            'title' => 'Design',
            'sections' => array(
                'design_section' => array(
                    'title' => 'Design Section',
                    'description' => 'The section below is to change style, color and position of your content.',
                    'fields' => array(
                        'position'  => array(
                            'type'  => 'select',
                            'label'  => 'Positon',
                            'default'  => 'bottom-left',
                            'options'  => array(
                                'bottom-left' => 'Bottom Left',
                                'bottom-right' => 'Bottom Right',
                            ),
                        ),
                        'text_color' => array(
                            'type'  => 'color',
                            'label' => __('Text Color', 'ibx-notify'),
                            'default'   => '000000'
                        ),
                        'background_color' => array(
                            'type'  => 'color',
                            'label' => __('Background Color', 'ibx-notify'),
                            'default'   => 'ffffff'
                        ),
                        'button_color' => array(
                            'type'  => 'color',
                            'label' => __('Button Color', 'ibx-notify'),
                            'default'   => '0b6bbf'
                        ),
                        'button_text_color' => array(
                            'type'  => 'color',
                            'label' => __('Button Text Color', 'ibx-notify'),
                            'default'   => '000000'
                        ),
                    ),
                ),
            ),
        ),
        'visibility' => array(
            'title' => 'Visibility',
            'sections' => array(
                'visibility_section' => array(
                    'title' => 'Visibility Section',
                    'description' => 'The section below is to set visibility of Content.',
                    'fields' => array(
                        'page'  => array(
                            'type'  => 'select',
                            'label'  => 'What pages?',
                            'default'  => 'all-pages',
                            'options'  => array(
                                'all-pages' => 'All Pages',
                                'certain-pages' => 'Certain Pages ',
                            ),
                        ),
                        'login_visitor'  => array(
                            'type'  => 'select',
                            'label'  => 'Show to these visitors',
                            'default'  => 'log-all',
                            'options'  => array(
                                'log-all' => 'All visitors',
                                'log-in' => 'Logged in only',
                                'log-out' => 'Logged out only',
                            ),
                        ),
                        'visitors'  => array(
                            'type'  => 'select',
                            'label'  => 'New or returning',
                            'default'  => 'visit-all',
                            'options'  => array(
                                'visit-all' => 'All visitors',
                                'visit-new' => 'New visitors only',
                                'visit-return' => 'Returning visitors only',
                            ),
                        ),
                        'show'  => array(
                            'type'  => 'select',
                            'label'  => 'When should we show it?',
                            'default'  => 'immediate',
                            'options'  => array(
                                'immediate' => 'Immediately',
                                'delay' => 'Delay of some time',
                                'scroll' => 'User scrolls halfway down the page',
                            ),
                            'toggle'   => array(
                                'delay' => array(
                                    'fields' => array('show_delay')
                                ),
                            ),

                        ),
                        'show_delay'  => array(
                            'type' => 'number',
                            'label' => 'Delay Of?',
                            'help'  => 'seconds',
                        ),
                        'disappear'  => array(
                            'type'  => 'select',
                            'label'  => 'After it displays, when should it disappear?',
                            'default'  => 'click-to-hide',
                            'options'  => array(
                                'click-to-hide' => 'When user clicks hide',
                                'dis-delay' => 'Delay of some time',
                            ),
                            'toggle'   => array(
                                'dis-delay'     => array(
                                    'fields'    => array('disappear-delay')
                                ),
                            ),
                        ),
                        'disappear-delay'  => array(
                            'type' => 'number',
                            'label' => 'Delay Of?',
                            'help'  => 'seconds',
                        ),
                        'show-and-hide'  => array(
                            'type'  => 'select',
                            'label'  => 'How often should we show it to each visitor?',
                            'default'  => 'click-to-hide',
                            'options'  => array(
                                'page-load' => 'Every page load',
                                'click-to-submit' => 'Hide after user interacts (clicks link or submits email)',
                                'show-and-hide' => 'Show, then hide for some days',
                            ),
                            'toggle'   => array(
                                'show-and-hide'     => array(
                                    'fields'    => array('show-and-hide-delay')
                                ),
                            ),
                        ),
                        'show-and-hide-delay'  => array(
                            'type' => 'number',
                            'label' => 'Hide for?',
                            'help'  => 'days',
                        ),
                    ),
                ),
            ),
        ),
    )
) );
