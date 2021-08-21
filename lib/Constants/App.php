<?php
//Namespace our code for our application
namespace TDW\Constants;

//Instantiate our class
class App {
    //Instantiate our global application constants
    public const MIN_WP_VERSION = '5.0';
    public const MIN_PHP_VERSION = '7.4';
    public const APP_VERSION = '1.0';
    
    //Set our dev flag. This allows us to destermine if we are
    //in development mode or not
    public const IS_DEV_MODE = true;
    
    //Unused but potential for processing data and then defining
    //the constants. This would involve instantiating the Constants
    //class and couuld make things messy. We are going for simple elegance here
    public function __construct(){}
}