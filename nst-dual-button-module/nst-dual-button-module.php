<?php
/**
 * @class DualButtonModule
 */
class DualButtonModuleClass extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Dual Button', 'fl-builder' ),
            'description'     => __( 'Dual Button w/ Icon', 'fl-builder' ),
            'category'        => __( 'Advanced Modules', 'fl-builder' ),
            'dir'             => NST_MODULES_DIR . 'nst-dual-button-module/',
            'url'             => NST_MODULES_URL . 'nst-dual-button-module/',
            'editor_export'   => true, // Defaults to true and can be omitted.
            'enabled'         => true, // Defaults to true and can be omitted.
            'partial_refresh' => true, // Defaults to false and can be omitted.
        ));
    }
}

FLBuilder::register_module( 'DualButtonModuleClass', array(
    'button-tab'      => array(
        'title'         => __( 'Buttons', 'fl-builder' ),
        'sections'      => array(
            'button_1'  => array(
                'title'         => __( 'Button 1', 'fl-builder' ),
                'fields'        => array(
                    'button_1_text'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Button 1 Text', 'fl-builder' ),
                    ),
                    'button_1_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Button 1 Link', 'fl-builder'),
                    ),
                )
            ),
            'button_2'  => array(
                'title'         => __( 'Button 2', 'fl-builder' ),
                'fields'        => array(
                    'button_2_text'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Button 2 Text', 'fl-builder' ),
                    ),
                    'button_2_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Button 2 Link', 'fl-builder'),
                    )
                )
            )
        )
    )
));
