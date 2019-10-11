<?php
namespace MM\Lottery;

function lottery_plugin_widget() {
    global $wp_meta_boxes;
    add_meta_box('lottery_dashboard_widget', __('Random numbers for Lottery', 'mm-lottery'), 'MM\Lottery\dashboard_lottery_plugin', 'dashboard', 'side', 'high');
}
   
function dashboard_lottery_plugin() {
    
    $output = '';
    $stack = range(1, 49);
    $flipped = array_flip($stack);
    $numbers = array_rand($flipped, 6);
    $random = rand(0,9);

    foreach($numbers as $key => $value) {
        $output .= '<span class="lottery-number">';
        $output .= '<span>' . $value . '  </span>';
        $output .= '</span>';
    }

    $output .= '<div class="lottery-number">Zusatzzahl: ' . $random . '</div>';

    echo $output;
    
}