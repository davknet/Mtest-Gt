<?php 
namespace Inc\Cls ;
use Inc\Trai\MtestGtDataBaseFunctions ;



if( !defined( 'WP_UNINSTALL_PLUGIN' ) ){

    exit ();  

}




/**
 * 
 * The class deletes a Mtest-Gt plugin
 *  deletes also option and all Mtest-Gt database tables
 * 
*/






class UninstallGtestGt 
{
    use MtestGtDataBaseFunctions ;
    protected static  array $plugin_table_names ;
    protected  static string $prefix ;





    public function __construct()
    {
         self::prefix            = $this->getPrefix() ;
         self::plugin_table_names = array(
            'all_skills_for_roll_TBL' ,
        );
    }


        /**
         * the method 
        * @return void  deletes all tables and options 
        */


    public static  function uninstall()
    {
        foreach ($self::plugin_table_names  as $key => $name ) {
           
            self::deleteDatabaseTables(  $name  , self::prefix  ) ;
        }
        error_log('Mtest-GT  Plugin has been uninstalled .');
    }
}