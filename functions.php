<?php 


require ( MTEST_GT_PLUGIN_DIR_PATH . "vendor/autoload.php") ;



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


