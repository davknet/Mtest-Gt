<?php 

use Inc\Cls\UserLocalPlace;
use Inc\Cls\DeactiveMtestGt ;
use Inc\Cls\InstallMtestGt  ;
use Inc\Cls\MtestGtCreateFrontEndPage;
/*
 * Plugin Name:       MTest-Gt
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:        the plugin developed for testing purppeses 
 * Version:           1.0.0.0
 * Requires at least: 5.5
 * Requires PHP:      7.2
 * Author:           David Kahadze 
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:        mtest-gt 
 * Domain Path:       /languages
 */ 


 /**
  * plugins_url() — Full plugins directory URL 
  * includes_url() — Full includes directory URL 
  * content_url() — Full content directory URL 
  * admin_url() — Full admin URL 
  * site_url() — Site URL for the current site 
  * home_url() — Home URL for the current site 
  */

 define('MTEST_GT_PLUGIN_DIR_PATH' , plugin_dir_path( __FILE__ ) ) ;
 define('MTEST_HOME_URL' , home_url() ) ;

 require( MTEST_GT_PLUGIN_DIR_PATH . "functions.php" ) ;


  $plugin_gt          =  new InstallMtestGt()  ;
  $deactive_plugin_Gt =  new DeactiveMtestGt() ;
  $user_lunguage      =   UserLocalPlace::get_instance();
//   echo '<pre>' ;
//  var_dump( $plugin_gt->allDataBaseTables );

register_activation_hook(__FILE__, array( $plugin_gt , 'activate'));
register_deactivation_hook(__FILE__, array( $deactive_plugin_Gt , 'deactivate'));
add_action('plugins_loaded', array( $user_lunguage         , 'get_instance' ));

register_activation_hook(__FILE__, array('Inc\Cls\EnsureThemeHasFooter', 'init'));

add_action('plugins_loaded', function() {
  new MtestGtCreateFrontEndPage(
     __('Local Page ' , 'mtest-gt'),
     __( 'Just another page ' , 'mtest-gt' )    ,
      'your-local-page'
  );

});




