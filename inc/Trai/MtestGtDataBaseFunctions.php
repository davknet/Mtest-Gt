<?php 
namespace Inc\Trai ;









trait MtestGtDataBaseFunctions 
{


    function sellectAllTablesNames()
    {
        global $wpdb ; 
        $sql = " SHOW TABLES ; " ;
        $result = $wpdb->get_results($sql , ARRAY_A ); 
        return $result ;
    }
    
    function getPrefix()
    {
        global $wpdb ;
        return $wpdb->prefix ;
    }

}