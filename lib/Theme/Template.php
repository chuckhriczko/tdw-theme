<?php
//Namespace our code for our application
namespace TDW\Theme;

//Include our Constants namespace
use \TDW\Constants as Constants;

//Include our theme Menu namespace
use \TDW\Theme\Menu as Menu;

//Instantiate our class
class Template {
    public $menus = null;
    
    /**********************************************************************************
     * Initial setup of our theme
     * ********************************************************************************/
    public function __construct(){
        //Initialize our templates
        $this->template_include();
        
        //Add our scripts and styles
        $this->wp_enqueue_scripts();
        
        //Instantiate our menus class
        $this->menus = new Menu();
    }
    
    /**********************************************************************************
     * Sets up our templates
     * Note: I originally had wanted to search the templates directory so
     * the TEMPLATE_PAGES array would be dynamic but I felt this would cause
     * too much CPU and disk activity since it would be checking every time a template
     * loads. A more efficient method of this feature may be available down the road
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
            //Enqueue our theme styles
            wp_enqueue_style('tdw', get_stylesheet_directory_uri().'/assets/css/tdw.css');
            
            //Enqueue our framework styles
            //If we are not in dev mode, loads a minified version if not in dev mode
            wp_enqueue_style('bulma', get_stylesheet_uri().'/vendor/chucksplayground/bulma-css/bulma'.(Constants\App::IS_DEV_MODE ? '' : '.min').'.css');
        });
    }
}
