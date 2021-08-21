<?php
//Namespace our code for our application
namespace TDW\Theme;

//Include our Constants namespace
use \TDW\Constants as Constants;

//Instantiate our class
class Menu {
    //Instantiate our class variables
    public $menu = null;
    
    /**********************************************************************************
     * Initializes our plugin (hooks, filters, etc)
     * ********************************************************************************/
    public function __construct(){
        //Get our default menu
        $this->menu = $this->get_menu_items();
        
        //Add action for getting HTML
        add_action('tdw_generate_menu', function(){
            //Generate menu HTML
            $menu_html = $this->generate_menu_html($this->menu);
            
            echo $menu_html;
        });
    }
    
    /**********************************************************************************
     * Get our menus, optionally defined by menu ID
     * Returns an array of menu items
     * ********************************************************************************/
    public function get_menu_items($id = Constants\Theme::DEFAULT_MENU_ID){
        //Instantiate our menu array
        $menu = array();
        
        //Get our menu items
        $menu_items = wp_get_nav_menu_items($id);
        
        //Loop through each menu item
        foreach ($menu_items as $menu_item) {
            //Create new array for menu item and add to our menu array
            $menu[$menu_item->ID] = array(
                'ID' => $menu_item->ID,
                'title' => $menu_item->title,
                'url' => $menu_item->url
            );
        }
         
        //Return processed array of menu items
        return $menu;
    }
    
    /**********************************************************************************
     * Generates an HTML menu from a WP array of menu items
     * Returns an HTML menu for our menu
     * ********************************************************************************/
    public function generate_menu_html($menu_items = array(), $echo = false){
        //Init our HTML
        $html = '<div class="columns">';
        
        //Loop through array of menu items
        foreach($menu_items as $menu_item_id=>$menu_item){
            $html .= '<div id="menu-item-'.$menu_item['ID'].'" class="column"><a href="'.$menu_item['title'].'">'.$menu_item['url'].'</a></div>';
        }
        
        //Finish our HTML
        $html .= '</div>';
        
        return $html;
    }
}
