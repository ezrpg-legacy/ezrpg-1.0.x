<?php
defined('IN_EZRPG') or exit;

if (defined('IN_ADMIN'))
  $hooks->add_hook('admin', 'menu_admin');
else
	$hooks->add_hook('player', 'menu_players');

function hook_menu_players($db, $tpl, $player, $args = 0) {
	if(LOGGED_IN != "TRUE") 
	{
	$menu = "<ul>";
	$menu .= "<li><a href='index.php'>Home</a></li>";
	$menu .= "<li><a href='index.php?mod=Register'>Register</a></li>";
	$menu .= "</ul>";
  $tpl->assign('TOP_MENU_LOGGEDOUT', $menu);
	} else {
	/*
	$menu = "<ul>";
	$menu .= "<li><a href='index.php'>Home</a></li>";
	$menu .= "<li><a href='index.php?mod=EventLog'>Log</a></li>";
	$menu .= "<li><a href='index.php?mod=City'>City</a></li>";
	$menu .= "<li><a href='index.php?mod=Members'>Members</a></li>";
	$menu .= "<li><a href='index.php?mod=AccountSettings'>Account</a></li>";
	$menu .= "<li><a href='index.php?mod=Logout'>Log Out</a></li>";
	*/
	$query = $db->execute('SELECT * FROM `<ezrpg>menu` WHERE parent_id IS NULL'); //Grab All Menu Groups
	$results = $db->fetchAll($query); //Fetch All results
	foreach($results as $row => $val){ //For Each Result, get Value
	$query2 = $db->execute('SELECT * FROM `<ezrpg>menu` WHERE parent_id = '. $val->id); //Grab Groups Children Menus
	$rs = $db->fetchAll($query2); //Fetch All results
	$menu = "<ul>"; //Start HTML list
	foreach($rs as $rw => $vl){ //For each child get values
	$menu .= "<li><a href='".$vl->uri."'>".$vl->title."</a></li>";
	}// End of ForEach
	$menu .= "</ul>";//End of Menu's List
	$tpl->assign('TOP_MENU_'. $val->title, $menu); //Assign a Short Code for Template by the Group's Title
	}// End of Group's ForEach
	}
	return $args;
}
function hook_menu_admin(&$db, $config, &$tpl, &$player, $args = 0) {
	$menu = "<ul>";
	$menu .= "<li><a href='index.php'>Admin</a></li>";
	$menu .= "<li><a href='index.php?mod=Members'>Members</a></li>";
	$menu .= "<li><a href='../index.php'>Back</a></li>";
	$menu .= "<li><a href='../index.php?mod=Logout'>Log Out</a></li>";
	$menu .= "</ul>";
	$tpl->assign('TOP_ADMIN_MENU', $menu);
	return $args;
}
?>
