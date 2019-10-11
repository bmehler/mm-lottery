<?php
/**
* Plugin Name: Lottery Plugin
* Plugin URI: http://www.mehler-medial.de
* Description: Gibt 6 aus 49 Zufallszahlen aus (z.b. für Mittwochs Lotto und Samstags Lotto).
* Version: 0.0.1
* Author: Bernhard Mehler
* Author URI: http://www.mehler-medial.de
* License: GPL2
* Text Domain: mm-lottery
*/
namespace MM\Lottery;

add_action( 'plugins_loaded', 'MM\Lottery\init' );

function init() {
    loadTextdomain();
    include_once('includes/mm-lottery-dashboard.php');
    add_action( 'admin_enqueue_scripts', 'MM\Lottery\register_plugin_styles' );
    add_action('wp_dashboard_setup', 'MM\Lottery\lottery_plugin_widget');
}
function loadTextdomain() {
    load_plugin_textdomain( 'mm-lottery', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
function register_plugin_styles() {
    wp_register_style( 'font-awesome-css', plugins_url('mm-lottery/assets/font-awesome/css/font-awesome.css'));
    wp_enqueue_style( 'font-awesome-css' );
    wp_register_style( 'lottery-styles-css', plugins_url('mm-lottery/assets/styles.css'));
    wp_enqueue_style( 'lottery-styles-css' );
}
?>