<?php 
namespace Inc\Abs ;









/**
 *  Abstract class 
 * creates custom posttypes 
 * 
 */










abstract class CreateCustomPostType 
{
     protected bool   $public   ;
     protected string $query_var ;
     protected array  $rewrite  ;
     protected array  $supports ;
     protected array  $labels   ;
     protected string $post_type ;

     
          $this->supports   = $supports  ;
          public function __construct( bool $public , string  $query_var , array $rewrite , array $supports , array $labels  ,string $post_type  )
     {
          $this->public     = $public    ;
          $this->query_var  = $query_var ;
          $this->rewrite    = $rewrite   ;
          $this->supports   = $supports  ;
          $this->labels     = $labels    ;

         

          add_action( 'init', array( $this , 'init') );
        //   $this->init( $post_type ,  $post_args );
     }



     protected  function init()
     {
        $post_args  = array(
               
                 'public'     => $this->public ,
                 'query_var'  => $this->query_var ,
                 'rewrite'    => $this->rewrite ,
                 'supports'   => $this->supports  ,
                 'labels'     => $this->labels 

            ) ;


        register_post_type(  $this->post_type , $post_args  );
     }

}