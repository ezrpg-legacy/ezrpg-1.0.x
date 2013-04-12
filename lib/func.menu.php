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
function get_menus(&$db, &$tpl, $menuname = NULL, $pos = NULL, $begin = TRUE, $endings = TRUE)
{
if(!isset($menuname))
	$pos = "TOP_";
	
	
	if(LOGGED_IN != "TRUE") 
	{
		$menu = "<ul>";
		$menu .= "<li><a href='index.php'>Home</a></li>";
		$menu .= "<li><a href='index.php?mod=Register'>Register</a></li>";
		$menu .= "</ul>";
		$tpl->assign('TOP_MENU_LOGGEDOUT', $menu);
	} 
	else 
	{
		if(!isset($menuname))
		{
			$query = $db->execute('SELECT * FROM `<ezrpg>menu` WHERE parent_id IS NULL');
		}
		else
		{
			$query = $db->execute('SELECT * FROM `<ezrpg>menu` WHERE name = "'. $menuname. '"');
		}
		$result = $db->fetchAll($query);
		foreach ($result as $row => $val)
		{
			$menu = "";
			$q1 = $db->execute('SELECT COUNT(*) as count FROM `<ezrpg>menu` WHERE parent_id = '. $val->id);
			$r1 = $db->fetch($q1);
			$menu .= get_menu_beginnings($begin); //Start HTML list
			if($r1->count <> 0)
			{
				$query2 = $db->execute('SELECT * FROM `<ezrpg>menu` WHERE parent_id = '. $val->id);
				$result2 = $db->fetchAll($query2);
				foreach($result2 as $row2 => $val2)
					{
						$menu .= "<li><a href='".$val2->uri."'>".$val2->title."</a>";
							//This Section Checks for Children//
							$q2 = $db->execute('SELECT COUNT(*) as count FROM `<ezrpg>menu` WHERE parent_id = '. $val2->id);
							$result = $db->fetch($q2);
							if ($result->count != '0')
							{ 
							$menu .= get_menu_children($val2->id, $db); 
							} else {
								$menu .= '';
							}
							//End Of Children Check//
						$menu .= "</li>";
					}// End of ForEach
			} 
			else
			{
			$menu .= "";
			}
		$menu .= get_menu_endings($endings);//End of Menu's List	
		$menutag = $pos. "MENU_". $val->name;
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
				$result = $db->fetch($query);
				$menu .= (($result->count <> 0) ? get_menu_children($val->id, $db) : '') . "</li>";
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
	
	function get_menu_beginnings($begin, $menu = ""){
	$menu .= "<ul>"; //Start HTML list
	if($begin == TRUE){$menu .= "<li><a href='index.php'>".(defined('IN_ADMIN')? "ADMIN" : "Home")."</a></li>";}
	return $menu;
	}
	
	function get_menu_endings($end, $menu = "", $pre = ""){
	if (defined('IN_ADMIN')){
	$pre = "../";
	$menu .= "<li><a href='../index.php'>To Game</a></li>";
	}
	if($end == TRUE){
	$menu .= "<li><a href='admin/'>Admin</a></li>";
	$menu .= "<li><a href='".$pre."index.php?mod=" . (LOGGED_IN == 'TRUE' ? 'Logout' : 'Register'). "'>" .(LOGGED_IN == 'TRUE' ? 'Logout' : 'Register'). "</a></li>";
	}
	$menu .= "</ul>";
	return $menu;
	}
?>
