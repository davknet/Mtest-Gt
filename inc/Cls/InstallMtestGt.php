<?php 
namespace Inc\Cls ;
use Inc\Trai\MtestGtDataBaseFunctions ;





if (!defined('ABSPATH')) {
    exit;
}

/**
 * Acitvate Mtest-Gt Plugin
 * also creates database and options
 * 
*/



class InstallMtestGt 
{
    use MtestGtDataBaseFunctions ;
    const MINIMUM_WP_VERSION = '5.0';
    const MINIMUM_PHP_VERSION = '7.4';
    protected    array    $allDataBaseTables ;
    protected   array $plugin_table_names  = [
     
        'all_skills_for_roll_TBL' ,

    ] ;
    protected string $prefix ;


    function __construct()
    {
       $db_name                 = "Tables_in_" . DB_NAME  ;
       $table_names             = $this->sellectAllTablesNames() ;  
       $this->allDataBaseTables =  array_column($table_names , $db_name  );
       $this->prefix            = $this->getPrefix() ;
      
    }

        /**
         * 
         * plugin activation method
         * the method ensures wordpress has appropriate version
         * and also php verssion is higher then 7.3 
         * @return void 
        */

    public function activate()
    {
        global $wp_version; 
        if( version_compare( $wp_version, self::MINIMUM_WP_VERSION , '<') )
        {
            deactivate_plugins(plugin_basename(__FILE__));
            wp_die(
                __('Mtest-GT plugin requires WordPress version ' . self::MINIMUM_WP_VERSION . ' or higher.', 'Mtest-GT'),
                __('Plugin Activation Error', 'Mtest-GT'),
                array('back_link' => true)
            );
        }


        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            deactivate_plugins(plugin_basename(__FILE__));
            wp_die(
                __('Mtest-GT plugin requires PHP version ' . self::MINIMUM_PHP_VERSION . ' or higher.', 'Mtest-GT'),
                __('Plugin Activation Error', 'Mtest-GT'),
                array('back_link' => true)
            );

        }

        $this->create_non_existent_tables( $this->prefix  );
        error_log('Mtest-GT Plugin has been activated.');
      
    }


        /**
         * the method check if table name is  in the all
         *  database tables list if not return false 
         *
         * @param string  $table_name  database table name 
         * @param string  $prefix  database table prefix 
         * @return void 
        */

    


    protected function make_sure_the_table_does_not_exist( string $table_name , string  $prefix = null )
    {       
            $n_table_name = ( !is_null($prefix) )? $prefix . $table_name : $table_name ;

            if(in_array( $n_table_name  ,  $this->allDataBaseTables ))
            {
                return true ;
            }
            return false ;
    }



        /**
         * the method create not existing tables in database
         * @param string  $prefix  database tables prefix 
         * @return void 
         * 
        */

    protected function create_non_existent_tables( string $prefix = null )
    {
         $prefix       = (is_null($prefix)) ? '' : $prefix ;
         $table_names  =  $this->plugin_table_names ;
         foreach( $table_names as $key => $name  )
         {
             if( !$this->make_sure_the_table_does_not_exist( $name  ,  $prefix ) )
             {
                     $function_name =  'createDataBaseTable_' . $name ;  
                     $table_name    = $prefix . $name ;
                     $this->$function_name( $table_name  );
             }
         }
    }

}