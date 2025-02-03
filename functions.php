<?php

function tt_maintenance_mode() {
    // Check if the user is logged in and has admin privileges
    if (!current_user_can('administrator') ) {
        // Set a 503 (Service Unavailable) HTTP response code
        http_response_code(503);
        
        // Customize your maintenance page content here
        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head>';
        echo '<title>Site Under Maintenance</title>';
        echo '<meta charset="UTF-8">';
        echo '<style>
                body { font-family: Arial, sans-serif; text-align: center; margin-top: 20%; color: #333; }
                h1 { font-size: 40px; margin-bottom: 20px; }
                p { font-size: 18px; }
                body {background: #f0f0f1;}
              </style>';
        echo '</head>';
        echo '<body>';
        echo '<img style="width: 200px;" src="' . get_site_icon_url() . '"/>';
        echo '<h1>' . get_bloginfo('name') . ' will be back soon!</h1>';
        echo '<p>Our website is currently undergoing scheduled maintenance.</p>';
        echo '<p>Sorry for the inconvenience. Please check back later.</p>';
        echo '</body>';
        echo '</html>';
        
        // Stop further execution to prevent loading of the WordPress theme
        exit();
    }
}

// Hook the function /
add_action('wp', 'tt_maintenance_mode');

