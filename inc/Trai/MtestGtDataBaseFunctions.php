<?php 
namespace Inc\Trai ;









trait MtestGtDataBaseFunctions 
{


   protected  function sellectAllTablesNames()
    {
        global $wpdb ; 
        $sql = " SHOW TABLES ; " ;
        $result = $wpdb->get_results($sql , ARRAY_A ); 
        return $result ;
    }
    
   protected   function getPrefix()
    {
        global $wpdb ;
        return $wpdb->prefix ;
    }


    protected function createDataBaseTable_all_skills_for_roll_TBL( string $name  ):int 
    {
        global $wpdb ;
        $sql = " CREATE TABLE  $name  (
      
        ) " ;
       
        $result = 1 ;
       
       error_log('Mtest-GT databsaes table ' . $name . 'has been dreated  !!! ');
       return  $result ;
    }

    protected static function deleteDatabaseTables( string $name  , string $prefix = null )
    {
        global $wpdb;
        $db_prefix  = (is_null($prefix)? '' : $prefix ) ;
        $table_name =  $db_prefix . $name ;
        $result =  $wpdb->query("DROP TABLE IF EXISTS $table_name" );
        error_log('Mtest-GT databsaes table ' . $table_name . 'has been deleted !!! ');
        return $result ;
    }

}