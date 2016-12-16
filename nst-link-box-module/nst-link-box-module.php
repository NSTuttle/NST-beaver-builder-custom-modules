<?php
/**
 * @class LinkBoxModule
 */
class LinkBoxModuleClass extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Link Box', 'fl-builder' ),
            'description'     => __( 'Stylized Link Box w/ Image Options', 'fl-builder' ),
            'category'        => __( 'Advanced Modules', 'fl-builder' ),
            'dir'             => NST_MODULES_DIR . 'nst-link-box-module/',
            'url'             => NST_MODULES_URL . 'nst-link-box-module/',
            'editor_export'   => true, // Defaults to true and can be omitted.
            'enabled'         => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));
    }
}

FLBuilder::register_module( 'LinkBoxModuleClass', array(
    'my-tab-1'      => array(
        'title'         => __( 'Settings', 'fl-builder' ),
        'sections'      => array(
            'section_1'  => array(
                'title'         => __( 'General', 'fl-builder' ),
                'fields'        => array(
                    'headline_field'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Headline', 'fl-builder' ),
                    ),
                    'placeholder_field'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Input Placeholder', 'fl-builder' ),
                    ),
                    'color_field'    => array(
                        'type'          => 'color',
                        'label'         => __('Line Color', 'fl-builder'),
                        'default'       => '333333',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.fl-example-text',
                            'property'        => 'color'
                        )
                    )
                )
            ),
            'section_2'  => array(
                'title'         => __( 'Icon', 'fl-builder' ),
                'fields'        => array(
                    'toggle_icon'     => array(
                        'type'          => 'select',
                        'label'         => __('Enable Icon', 'fl-builder'),
                        'default'       => 'false',
                        'options'       => array(
                            'false'      => __('No', 'fl-builder'),
                            'true'      => __('Yes', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'true'      => array(
                                'fields'        => array('icon_select', 'icon_color')
                            ),
                            'false'      => array(
                                'fields'        => array()
                            )
                        )
                    ),
                    'icon_select'     => array(
                        'type'          => 'icon',
                        'label'         => __( 'Icon Select', 'fl-builder' ),
                        'show_remove'   => true,
                    ),
                    'icon_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Icon Color', 'fl-builder'),
                        'default'       => '333333',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.fl-example-text',
                            'property'        => 'color'
                        )
                    )
                )
            )
        )
    )
));