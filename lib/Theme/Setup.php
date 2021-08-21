<?php
//Namespace our code for our application
namespace TDW\Theme;

//Include our PostTypes namespace
use \TDW\Constants as Constants;

//Instantiate our class
class Setup {
    /**********************************************************************************
     * Initial setup of our theme
     * ********************************************************************************/
    public function __construct(){
        //Setup our init hook
        $this->init();
        
        //Setup our after_setup_theme hook
        $this->after_setup_theme();
    }
    
    /**********************************************************************************
     * Theme init hook
     * ********************************************************************************/
    public function init(){
        //Setup our init hook
        add_action('init', function(){
            //Iterate through our supports and add it to the list
            foreach(Constants\Theme::SUPPORTS as $support){
                add_theme_support($support);
            }
        });
    }
    
    /**********************************************************************************
     * Theme after_set_theme hook
     * ********************************************************************************/
    public function after_setup_theme(){
        //Setup our after_setup_theme hook
        add_action('after_setup_theme', function(){
            
        });
    }
}
