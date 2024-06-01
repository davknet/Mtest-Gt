<?php 
namespace Inc\Cls ;
use Inc\Trai\MtestGtDataBaseFunctions ;











class InstallMtestGt 
{
    use MtestGtDataBaseFunctions ;
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
       $this->create_non_existent_tables( $this->prefix  );

    }





    protected function make_sure_the_table_does_not_exist( $table_name ,  $prefix = null )
    {       
            $n_table_name = ( !is_null($prefix) )? $prefix . $table_name : $table_name ;

            if(in_array( $n_table_name  ,  $this->allDataBaseTables ))
            {
                return true ;
            }
            return false ;
    }


    protected function create_non_existent_tables($prefix = null )
    {
         $prefix       = (is_null($prefix)) ? '' : $prefix ;
         $table_names  =  $this->plugin_table_names ;
         foreach( $table_names as $key => $name  )
         {
             if( !$this->make_sure_the_table_does_not_exist( $name  ,  $prefix ) )
             {
                         
             }
         }
    }

}