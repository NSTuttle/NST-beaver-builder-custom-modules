<?php
/**
 * Plugin Name: NST Beaver Builder Modules
 * Plugin URI: http://www.nstuttle.com
 * Description: Custom modules for the Beaver Builder Plugin.
 * Version: 1.0
 * Author: Nick Tuttle
 * Author URI: http://www.nstuttle.com
 */
define( 'NST_MODULES_DIR', plugin_dir_path( __FILE__ ) );
define( 'NST_MODULES_URL', plugins_url( '/', __FILE__ ) );

function load_nst_modules() {
    if ( class_exists( 'FLBuilder' ) ) {
        // Include your custom modules here.
        require_once 'text-input-module/text-input-module.php';
        require_once 'nst-link-box-module/nst-link-box-module.php';
        //require_once 'nst-dual-button-module/nst-dual-button-module.php';
        require_once 'nst-accordion-div-toggle-module/nst-accordion-div-toggle-module.php';
    }
}
add_action( 'init', 'load_nst_modules' );