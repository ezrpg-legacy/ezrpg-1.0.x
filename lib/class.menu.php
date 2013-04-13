<?php
defined('IN_EZRPG') or exit;

/*
Class: Menu
A class to handle the menu system
*/
class Menu
{
    /*
    Variable: $db
    Contains the database object.
    */
    protected $db;
    
    /*
    Variable: $tpl
    The smarty template object.
    */
    protected $tpl;
    
    /*
    Variable: $player
    The currently logged in player. Value is 0 if no user is logged in.
    */
    protected $player;
    
    /*
    Variable: $menu
    An array of all menus.
    */
    protected $menu;
    
    /*
    Function: __construct
    The constructor takes in database, template and player variables to pass onto any hook functions called.
    
    Parameters:
    $db - An instance of the database class.
    $tpl - A smarty object.
    $player - A player result set from the database, or 0 if not logged in.
    */
    public function __construct(&$db, &$tpl, &$player = 0)
    {
        $this->db =& $db;
        $this->tpl =& $tpl;
        $this->player =& $player;
        $query      = $this->db->execute('SELECT * FROM `<ezrpg>menu`');
        $this->menu = $db->fetchAll($query);
    }
    
    /*
    Function: add_menu
    Adds menu to database.
    
    Returns:
    Inserted ID of menu added
    
    Parameters:
    $pid (Optional) Represents the Parent ID of the Menu this Menu belongs to.
    &$db (Mandatory) Opens the function up to the Database class.
    $name (Mandatory) Sets the 1word Name of the Menu.
    $title (Mandatory) Sets the User-Friendly Name of the menu.
    $uri (Optional) Sets the uri that the menu will go to.
    
    Example Usage:
    $bid = add_menu('',$db,'Bank','Empire Bank', 'index.php?mod=Bank');
    $add_menu ($bid, $db, 'Deposit', 'Deposit Money', 'index.php?mod=Bank&act=Deposit');
    */
    
    function add_menu($pid = NULL, &$db, $name, $title, $uri = '')
    {
        $item['parent_id'] = $pid;
        $item['name']      = $name;
        $item['title']     = $title;
        $item['uri']       = $uri;
        return $db->insert("menu", $item);
    }
    
    /*
    Function: get_menus
    Preforms the inital grab of the Parent menus.
    
    Parameters:
    $parent (Optional): Sets the ParentID, if Null then it's a Group, if a string then finds ID
	$begin (BOOLEAN Optional) Determines if we should auto-include a Home menu item.
    $endings (BOOLEAN Optional) Determines if we should auto-include a Logout menu item.
    $menu (Optional) Initializes the $menu array variable    
    */
    
    function get_menus($parent = NULL, $begin = TRUE, $endings = TRUE, $menu = 0)
    {
        if ($menu == 0) {
            $menu = $this->menu;
        }
        if (LOGGED_IN != "TRUE") {
            $menu = "<ul>";
            $menu .= "<li><a href='index.php'>Home</a></li>";
            $menu .= "<li><a href='index.php?mod=Register'>Register</a></li>";
            $menu .= "</ul>";
            $this->tpl->assign('TOP_MENU_LOGGEDOUT', $menu);
        } else {
            foreach ($menu as $item => $ival) {
                $result = ($begin ? $this->get_menu_beginnings() : "<ul>");
                if ($parent != null || !is_null($ival->parent_id)) {
                    if (!is_numeric($parent)) {
                        if ($ival->name == $parent) {
                            $result .= $this->get_children($ival->id);
                            $result .= ($endings ? $this->get_menu_endings() : "</ul>");
                            $this->tpl->assign('MENU_' . $ival->name, $result);
                        }
                    } else {
                        $result .= $this->get_children($ival->id);
                        $result .= ($endings ? $this->get_menu_endings() : "</ul>");
                        $this->tpl->assign('MENU_' . $ival->name, $result);
                    }
                } else {
                    if (is_null($ival->parent_id)) //it's a group
                        {
                        $result .= $this->get_children($ival->id);
                        $result .= ($endings ? $this->get_menu_endings() : "</ul>");
                        $this->tpl->assign('TOP_MENU_' . $ival->name, $result);
                    }
                }
            }
        }
        $result .= "</ul>";
        return $result;
    }
    
	/*
	Function: Get_Children
	Gets the submenus of a Menu's Parent_ID
    
	Parameters:
	$parent (Optional): Sets the ParentID, if Null then it's a Group
	$menu (Optional): Initializes the use of the $menu array variable
	*/
	
    function get_children($parent = NULL, $menu = 0)
    {
        $result = "";
        if ($menu == 0) {
            $menu = $this->menu;
        }
        foreach ($menu as $item => $ival) {
            if (!is_numeric($parent)) {
                if ($ival->name == $parent) {
                    get_children($ival->id);
                    break;
                }
            } else {
                if ($ival->parent_id == $parent) {
                    $result .= "<li><a href='" . $ival->uri . "'>" . $ival->title . "</a>";
                    /*if ( $this->has_children($rows, $ival->id))
                    {
                    $result.= $this->get_children ( $ival->id, $menu);
                    }*/
                    $result .= "</li>";
                }
            }
        }
        return $result;
    }
    
    /*
    Function: add_menu_beginnings and add_menu_endings
    Sets up the start and end of the menu.
    
    Parameters:
    Dont Set the parameters
    
    Example Usage:
    Only used in $get_menus
    */
    
    function get_menu_beginnings($menu = "")
    {
        $menu .= "<ul>"; //Start HTML list
        $menu .= "<li><a href='index.php'>" . (defined('IN_ADMIN') ? "Admin" : "Home") . "</a></li>";
        return $menu;
    }
    
    function get_menu_endings($menu = "", $pre = "")
    {
        if (defined('IN_ADMIN')) {
            $pre = "../";
            $menu .= "<li><a href='../index.php'>To Game</a></li>";
        } else {
            if ($this->player->rank > 5) {
                $menu .= "<li><a href='admin/'>Admin</a></li>";
            }
        }
        $menu .= "<li><a href='" . $pre . "index.php?mod=" . (LOGGED_IN == 'TRUE' ? 'Logout' : 'Register') . "'>" . (LOGGED_IN == 'TRUE' ? 'Logout' : 'Register') . "</a></li>";
        $menu .= "</ul>";
        return $menu;
    }
}
?>
