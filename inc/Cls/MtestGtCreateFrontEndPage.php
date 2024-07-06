<?php 
namespace Inc\Cls ;

use Inc\Abs\FrontendPageCreator;





if (!defined('ABSPATH')) {
    exit;
}










class MtestGtCreateFrontEndPage extends FrontendPageCreator
{

 


    public function __construct($page_title, $page_content,  $page_slug = '',  $page_template =  '' )
    {
    
        parent::__construct($page_title, $page_content, $page_slug, $page_template);

        add_filter( 'template_include', array( $this  ,  'mtest_gtLoadCustomPage' ));

    }




    public   function mtest_gtLoadCustomPage( $template ) {
        if ( is_page( 'your-local-page' ) ) { 
            $plugin_template =  MTEST_GT_PLUGIN_DIR_PATH . 'templates/frontend/mtest-gt-some-page.php';
            if ( file_exists( $plugin_template ) ) {
                return $plugin_template;
            }
        }

       
        return $template;
    }



    
}