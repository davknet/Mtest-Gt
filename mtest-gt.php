<?php 

use Inc\Cls\InstallMtestGt ;
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


  $plugin_gt = new InstallMtestGt();

//   echo '<pre>' ;
//  var_dump( $plugin_gt->allDataBaseTables );




