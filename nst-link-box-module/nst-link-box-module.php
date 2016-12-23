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
            'partial_refresh' => true, // Defaults to false and can be omitted.
        ));
    }
}

FLBuilder::register_module( 'LinkBoxModuleClass', array(
    'links'         => array(
        'title'         => __('Links', 'fl-builder'),
        'sections'      => array(
            'general'       => array(
                'title'         => '',
                'fields'        => array(
                    'the_links'         => array(
                        'type'          => 'form',
                        'label'         => __('Link', 'fl-builder'),
                        'form'          => 'links_items_form', // ID from registered form below
                        'preview_text'  => 'link_label', // Name of a field to use for the preview text
                        'multiple'      => true
                    )
                )
            )
        )
    ),
    'my-tab-1'      => array(
        'title'         => __( 'Settings', 'fl-builder' ),
        'sections'      => array(
            'section_1'  => array(
                'title'         => __( 'Title', 'fl-builder' ),
                'fields'        => array(
                    'title_field'     => array(
                        'type'          => 'text',
                        'label'         => __( 'LinkBox Title', 'fl-builder' ),
                    ),
                    'title_align_toggle'     => array(
                        'type'          => 'select',
                        'label'         => __('Alignment', 'fl-builder'),
                        'default'       => 'left',
                        'options'       => array(
                            'left'      => __('Left', 'fl-builder'),
                            'center'      => __('Center', 'fl-builder'),
                            'right'      => __('Right', 'fl-builder'),
                        ),
                        'toggle'        => array(
                            'left'      => array(),
                            'center'      => array(),
                            'right'      => array(),
                        )
                    ),
                    'heading_elem_type' => array(
                        'type' =>   'select',
                        'label' =>  __('Heading Type','fl-builder'),
                        'default' =>    'h3',
                        'options' =>    array(
                            'h2'    => __('h2','fl-builder'),
                            'h3'    => __('h3','fl-builder'),
                            'h4'    => __('h4','fl-builder'),
                            'p'    => __('p','fl-builder'),
                        ),
                        'toggle'    => array(
                            'h2'    => array(),
                            'h3'    => array(),
                            'h4'    => array(),
                            'p'     => array(),
                        )
                    ),
                    'title_divider_toggle'  => array(
                        'type'  => 'select',
                        'label' => __( 'Title Divider','fl-builder'),
                        'default' => 'true',
                        'options' => array(
                            'true' => __('Yes', 'fl-builder'),
                            'false'     => __('No', 'fl-builder')
                        ),
                        'toggle'    => array(
                            'true'  => array(),
                            'false' => array(),
                        )
                    )
                )
            ),
            'section_2'  => array(
                'title'         => __( 'Image', 'fl-builder' ),
                'fields'        => array(
                    'link_box_img'     => array(
                        'type'          => 'photo',
                        'label'         => __( 'LinkBox Image', 'fl-builder' ),
                        'show_remove'	=> true,
                    )
                )
            ),
            'section_3'  => array(
                'title'         => __( 'Column Style', 'fl-builder' ),
                'fields'        => array(
                    'double_col_toggle'     => array(
                        'type'          => 'select',
                        'label'         => __('Enable 2 Column', 'fl-builder'),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __('Yes', 'fl-builder'),
                            'false'      => __('No', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'false'      => array(),
                            'true'      => array(
                                'fields' => array('flip_col_toggle')
                            )
                        )
                    ),
                    'flip_col_toggle'   => array(
                        'type'  => 'select',
                        'label' => __('Flip Positions','fl-builder'),
                        'default' => 'false',
                        'options' => array(
                            'false' => __('No', 'fl-builder'),
                            'true' => __('Yes', 'fl-builder')
                        ),
                        'toggle' => array(
                            'false' => array(),
                            'true' => array()
                        )
                    )
                )
            )
        )
    )
));

FLBuilder::register_settings_form('links_items_form', array(
    'title' => __('Add Link', 'fl-builder'),
    'tabs'  => array(
        'general'      => array(
            'title'         => __('General', 'fl-builder'),
            'sections'      => array(
                'general'       => array(
                    'title'         => '',
                    'fields'        => array(
                        'link_label'         => array(
                            'type'          => 'text',
                            'label'         => __('Label Text', 'fl-builder')
                        ),
                        'link-url'         => array(
                            'type'          => 'link',
                            'label'         => __('Link Text', 'fl-builder')
                        )
                    )
                )
            )
        )
    )
));