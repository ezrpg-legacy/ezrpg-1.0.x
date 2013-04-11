<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Title: Menu Functions
  This file contains functions that deal with menus.
*/


/*
  Function: get_menus
  Preforms the inital grab of the Parent menus.

  Parameters:
  &$db (Mandatory) Opens the function up to the Database class.
  &$tpl (Mandatory) Opens the function up to accessing the Smarty Template class.
  
  Example Usage:
  Called in hooks/menu.php with get_menus($db, $tpl)


*/
function get_menus(&$db, &$tpl, $menuname = "")
{
if($menuname == "")
{
   if(LOGGED_IN != "TRUE") 
	{
	$menu = "<ul>";
	$menu .= "<li><a href='index.php'>Home</a></li>";
	$menu .= "<li><a href='index.php?mod=Register'>Register</a></li>";
	$menu .= "</ul>";
  $tpl->assign('TOP_MENU_LOGGEDOUT', $menu);
	} else {
	$query = $db->execute('SELECT * FROM `<ezrpg>menu` WHERE parent_id IS NULL');
	$result = $db->fetchAll($query);
	$menu = "";
	foreach ($result as $row => $val)
	{
		$menutag = "TOP_MENU_$val->name";
		$query = $db->execute('SELECT * FROM `<ezrpg>menu` WHERE parent_id = '. $val->id);
		$result = $db->fetchAll($query);
		$menu .= "<ul>"; //Start HTML list
		foreach($result as $row => $val)
			{
				$menu .= "<li><a href='".$val->uri."'>".$val->title."</a>";
				$query = $db->execute('SELECT COUNT(id) AS count FROM `<ezrpg>menu` WHERE parent_id = '. $val->id);
				$result = $db->fetchAll($query);
				if($result){ 
					$menu .= get_menu_children($val->id, $db); 
				} else {
					$menu .= '';
				}
				$menu .= "</li>";
			}// End of ForEach
		$menu .= "</ul>";//End of Menu's List
		$tpl->assign($menutag, $menu); //Assign a Short Code for Template by the Group's Title		
	}// End of Group's ForEach
	
	}
}else{
if(LOGGED_IN != "TRUE") 
	{
	$menu = "<ul>";
	$menu .= "<li><a href='index.php'>Home</a></li>";
	$menu .= "<li><a href='index.php?mod=Register'>Register</a></li>";
	$menu .= "</ul>";
  $tpl->assign('TOP_MENU_LOGGEDOUT', $menu);
	} else {
	$query = $db->execute('SELECT * FROM `<ezrpg>menu` WHERE name = "'. $menuname. '"');
	$result = $db->fetchAll($query);
	$menu = "";
	foreach ($result as $row => $val)
	{
		$menutag = "TOP_MENU_$val->name";
		$query = $db->execute('SELECT * FROM `<ezrpg>menu` WHERE parent_id = '. $val->id);
		$result = $db->fetchAll($query);
		$menu .= get_menu_beginnings(); //Start HTML list
		get_menu_beginnings();
		foreach($result as $row => $val)
			{
				$menu .= "<li><a href='".$val->uri."'>".$val->title."</a>";
				$query = $db->execute('SELECT COUNT(id) AS count FROM `<ezrpg>menu` WHERE parent_id = '. $val->id);
				$result = $db->fetchAll($query);
				if($result){ 
					$menu .= get_menu_children($val->id, $db); 
				} else {
					$menu .= '';
				}
				$menu .= "</li>";
			}// End of ForEach
		$menu .= get_menu_endings();//End of Menu's List
		$tpl->assign($menutag, $menu); //Assign a Short Code for Template by the Group's Title		
	}// End of Group's ForEach
	
	}
	}

	return TRUE;
}

/*
  Function: get_menu_children
  Preforms a recursive check of menus for submenus.

  Parameters:
  $id (Mandatory) Represents the Parent ID of the Menu you're searching
  &$db (Mandatory) Opens the function up to the Database class.
  
*/

function get_menu_children($id, &$db){
		$query = $db->execute('SELECT * FROM `<ezrpg>menu` WHERE parent_id = '. $id);
		$result = $db->fetchAll($query);
		$menu = "<ul>"; //Start HTML list
		foreach($result as $row => $val)
			{
				$menu .= "<li><a href='".$val->uri."'>".$val->title."</a>";
				$query = $db->execute('SELECT COUNT(id) AS count FROM `<ezrpg>menu` WHERE parent_id = '. $val->id);
				$result = $db->fetchAll($query);
				$menu .= ($result ? get_menu_children($val->id, $db) : '') . "</li>";
			}// End of ForEach
		$menu .= "</ul>";//End of Menu's List
		return $menu;
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
	
	function add_menu($pid = NULL, &$db, $name, $title, $uri = ''){
		$item['parent_id'] = $pid;
		$item['name'] = $name;
		$item['title'] = $title;
		$item['uri'] = $uri;
		return $db->insert("<ezrpg>menu", $item);
	}
	
/*
  Function: add_menu_beginnings and add_menu_endings
  Sets up the start and end of the menu.
  
  Parameters:
  Dont Set the parameters
  
  Example Usage:
  Only used in $get_menus
*/
	
	function get_menu_beginnings($menu = ""){
	$menu .= "<ul>"; //Start HTML list
	$menu .= "<li><a href='index.php'>".(defined('IN_ADMIN')? "ADMIN" : "Home")."</a></li>";
	return $menu;
	}
	function get_menu_endings($menu = "", $pre = ""){
	if (defined('IN_ADMIN')){
	$pre = "../";
	$menu .= "<li><a href='../index.php'>To Game</a></li>";
	}
	$menu .= "<li><a href='".$pre."index.php?mod=" . (LOGGED_IN == 'TRUE' ? 'Logout' : 'Register'). "'>" .(LOGGED_IN == 'TRUE' ? 'Logout' : 'Register'). "</a></li>";
	$menu .= "</ul>";
	return $menu;
	}
?>
