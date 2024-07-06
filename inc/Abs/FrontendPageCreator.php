<?php
namespace Inc\Abs;
/**
 * Abstract Class to handle page creation for frontend in WordPress plugin.
 */

defined('ABSPATH') or die("Direct access to the script is not allowed");




abstract class FrontendPageCreator
{
    protected $page_title;
    protected $page_content;
    protected $page_slug;
    protected $page_template;

    

    public function __construct($page_title, $page_content, $page_slug, $page_template = '')
    {
        $this->page_title = $page_title;
        $this->page_content = $page_content;
        $this->page_slug = $page_slug;
        $this->page_template = $page_template;

        add_action('init', array($this, 'createPage'));
    }

    public function createPage()
    {
        $page_check = get_page_by_path($this->page_slug);

        if (!isset($page_check->ID)) {
            $page_id = wp_insert_post(
                array(
                    'post_title'   => $this->page_title,
                    'post_content' => $this->page_content,
                    'post_name'    => $this->page_slug,
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                )
            );

            if ($this->page_template != '') {
                update_post_meta($page_id, '_wp_page_template', $this->page_template);
            }
        }
    }
}
