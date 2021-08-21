<?php
//Namespace our code for our application
namespace TDW\Constants;

//Instantiate our class
class Theme {
    //Instantiate our global application constants
    public const SUPPORTS = array(
        'html5',
        'title_tag'
    );
    
    //Define our template directory
    public const TEMPLATE_DIR = '/templates/';
    
    //Define our template pages. These are the pages that our theme will override
    //so as to use our template subdirectory instead of the root directory. This
    //promotes a cleaner file structure.
    public const TEMPLATE_PAGES = array(
        'index',
        'single',
        'portfolio',
        'code',
        'about-me',
        'contact',
        'blog'
    );
}