<?php 
use Inc\Cls\UninstallGtestGt ;



if( !defined( 'WP_UNINSTALL_PLUGIN' ) ){

    exit ();  

}

require ( MTEST_GT_PLUGIN_DIR_PATH . "vendor/autoload.php") ;

$uninstall_gt = new UninstallGtestGt();

$uninstall_gt::uninstall();
