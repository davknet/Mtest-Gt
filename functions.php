<?php 


require ( MTEST_GT_PLUGIN_DIR_PATH . "vendor/autoload.php") ;









function mtest_gt_frontend_style_register_style_frontend() {
    wp_register_style(
        'mtest-gt_style_page_style_frontend',
        plugin_dir_url( __FILE__ ) . 'src/css/mtest-gt-page-style.css',
        array(),
        '1.0.0',
        'all'
    );
}

add_action('wp_enqueue_scripts', 'mtest_gt_frontend_style_register_style_frontend');

function mtest_gt_frontend_style_enqueue_style_frontend() {
    if (is_page('your-local-page')) {
        wp_enqueue_style('mtest-gt_style_page_style_frontend');
        wp_enqueue_script('jquery');
        wp_enqueue_script('mtest-gt-frontent-user-tabs', plugin_dir_url( __FILE__ ) . 'src/js/mtest-gt-style-frontend-page-style.js', 
        array('jquery'), '1.0.0', true);
    }
}

add_action('wp_enqueue_scripts', 'mtest_gt_frontend_style_enqueue_style_frontend');



// Enable SVG Uploads
function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

// Fix SVG Mime Type
function fix_svg_mime_type($data, $file, $filename, $mimes) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ($ext === 'svg') {
        $data['type'] = 'image/svg+xml';
        $data['ext'] = 'svg';
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 4);

// Sanitize SVG Uploads
function sanitize_svg($svg) {
    $svg = simplexml_load_string($svg);
    if ($svg === false) {
        // If the SVG is invalid, return an empty string.
        return '';
    }

    // Convert the SimpleXML object back to a string.
    return $svg->asXML();
}
add_filter('wp_handle_upload_prefilter', 'sanitize_svg');




//  function changeTheLanguageOnLogin()
// {
//     $user_id = get_current_user_id() ;
//     $user_ip = $_SERVER['REMOTE_ADDR'];

//     if( $user_ip ==  '::1' )
//     {
        
//         $user_ip = '102.128.166.0';

//     }

    
//      $api_url = 'http://www.geoplugin.net/php.gp?ip=' . $user_ip;

//   echo  $country_code = setUserLanguageFromIP($api_url);

//     if ($country_code) {
//         // Update the site language
//         update_user_meta($user_id, 'locale', $country_code);
//         // Optionally, set the site language if it's a global change
//         update_option('WPLANG', $country_code);
//     }
// }

// /**
//  * Set the user's language based on IP geolocation.
//  *
//  * @since 1.0.0
//  */
//  function setUserLanguageFromIP($api_url)
// {
//     if (is_admin()) {
//         return; // Exit if in admin panel
//     }

//     // Check if user language is already set (optional, based on your needs)
//     // if (get_user_locale()) {
//     //     return;
//     // }

//     $response = wp_remote_get($api_url);

//     if (is_wp_error($response)) {
//         return;
//     }

//     $body = wp_remote_retrieve_body($response);

  

//     if ($body) {
//         $data = unserialize($body);
//         $country_code = getLanguageCodeFromCountry($data['geoplugin_countryCode']);
//     }

//     return $country_code ;
// }

// /**
//  * Get language code based on country code.
//  *
//  * @param string $country_code The country code.
//  * @return string The language code.
//  *
//  * @since 1.0.0
//  */
//  function getLanguageCodeFromCountry($country_code)
// {
//     // Replace with your logic to map country codes to language codes
//     switch ($country_code) {
//         case 'IL':
//             return 'he_IL'; // Hebrew (Israel)
//         case 'FR':
//             return 'fr_FR'; // French (France)
//         case 'ES':
//             return 'es_ES'; // Spanish (Spain)
//         // Add more cases for other countries as needed
//         default:
//             return 'en_US'; // English (United States)
//     }
// }


