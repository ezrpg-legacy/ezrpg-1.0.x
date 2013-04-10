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
function get_menus(&$db, &$tpl)
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
?>
