<?php
//Namespace our code for our application
namespace TDW\Theme;

//Include our Constants namespace
use \TDW\Constants as Constants;

//Include our Theme Setup namespace
use \TDW\Theme\Setup as Setup;

//Include our Theme Setup namespace
use \TDW\Theme\Template as Template;

//Instantiate our class
class Core {
    /**********************************************************************************
     * Initializes our plugin (hooks, filters, etc)
     * ********************************************************************************/
    public function __construct(){
        //Run our theme setup functions such as supports, etc.
        $this->setup = new Setup();
        
        //Run the template setup
        $this->setup = new Template();
    }
}
