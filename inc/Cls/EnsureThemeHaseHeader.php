<?php 
namespace Inc\Cls;











if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}














class EnsureThemeHaseHeader
{

    protected static $instance = null;

  public   $theme_directory;

  public  bool $has_get_header ;

    public   function __construct()
    {
        $this->theme_directory   =  get_template_directory();

        $this->has_get_header = $this->searchGetThemeHeader($this->theme_directory);

    }




    public static function get_instance()
    {

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }




   public  function searchGetThemeHeader($directory) {
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory));
        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $contents = file_get_contents($file->getPathname());
                if (strpos($contents, 'get_header') !== false) {
                    return true;
                }
            }
        }
        return false;
    }




    public function getHeader()
    {
        if ($this->has_get_header) 
        {
            
          get_header() ;
            
        } else {
            
            $this->mtestGtHeader('mtestgt')  ;
        }
    }



  protected   function mtestGtHeader($name = null) 
    {
        do_action('get_header', $name);
    
       
        $templates = array();
        $name = (string) $name;
        if ('' !== $name) {
            
            $templates[] = MTEST_GT_PLUGIN_DIR_PATH . "templates/header-{$name}.php";
        }
    
        
        $templates[] = MTEST_GT_PLUGIN_DIR_PATH . 'templates/header.php';
    
        // Include the first template file found in the array
        foreach ($templates as $template) {
            if (file_exists($template)) {
                include $template;
                break;
            }
        }

    }
    





    function get_footer($name = null, $args = array()) 
    {
        // Trigger a custom action hook before loading the footer template
        do_action('mtest_gt_get_footer_before', $name, $args);
    
        // Define templates to check
        $templates = array();
        if ($name) {
            $templates[] = "footer-{$name}.php";
        }
        $templates[] = 'mtest-gt-footer.php';
    
        // Check if the template exists in plugin directory
        $template_found = false;
        foreach ($templates as $template) {
            $template_path = MTEST_GT_PLUGIN_DIR_PATH . 'templates/frontend/' . $template;
            if (file_exists($template_path)) {
                include $template_path;
                $template_found = true;
                break;
            }
        }



    }
}