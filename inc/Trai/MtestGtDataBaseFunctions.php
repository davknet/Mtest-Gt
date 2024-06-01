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


    protected function createDataBaseTable_all_skills_for_roll_TBL( string $name  )
    {
        global $wpdb ;
        $sql = " CREATE TABLE  $name  (
      
         



        ) " ;

    }


}