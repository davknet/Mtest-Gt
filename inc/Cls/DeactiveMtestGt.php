<?php 
namespace Inc\Cls ;



if (!defined('ABSPATH')) {
    exit;
}



/**
 *  
 * class deactivates the plugin
 * i not yet decided what will do the class when deactivate
 * 
*/



class DeactiveMtestGt 
{

    protected array $plugin_table_names ;
 
    public function __construct()
    {
        $this->plugin_table_names = array(

            'all_skills_for_roll_TBL' ,

        );
    }




    public function deactivate()
    {

        // do nothing when plugin is deacitvated 


        error_log('Mtest-GT  Plugin has been deactivated.');
    }




}





