<?php
//Namespace our code for our application
namespace TDW\Theme;

//Include our PostTypes namespace
use \TDW\Constants as Constants;

//Instantiate our class
class Template {
    /**********************************************************************************
     * Initial setup of our theme
     * ********************************************************************************/
    public function __construct(){
        //Initialize our templates
        $this->template_include();
        
        //Add our scripts and styles
        $this->wp_enqueue_scripts();
    }
    
    /**********************************************************************************
     * Sets up our templates
     * ********************************************************************************/
    public function template_include(){
        //Checks to see ifwe should redirect the template to our subdirectory
        add_action('template_include', function($template){
            //Get the basename of the template page in question
            //(In other words, we get rid of the absolute file path and 
            //the .php or other extension so it is a single nbsp; word)
            $basename = basename($template, '.php');
            
            //Check if the basename matches any of the template pages
            //that we want to override
            if (in_array($basename, Constants\Theme::TEMPLATE_PAGES)){
                $template = get_stylesheet_directory().Constants\Theme::TEMPLATE_DIR.$basename.'.php';
                error_log('New Template: '.$template);
            }
            
            //Make sure we return the template, as not returning it will yield
            //no template to the calling function
            return $template;
        });
    }
    
    /**********************************************************************************
     * Sets up all of our themes styles and scripts
     * ********************************************************************************/
    public function wp_enqueue_scripts(){
        //Setup our after_setup_theme hook
        add_action('wp_enqueue_scripts', function(){
            //Enqueue our styles
            wp_enqueue_style('bulma', get_stylesheet_uri().'/vendor/chucksplayground/bulma-css/bulma.css');
        });
    }
}
