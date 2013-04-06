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
	$query = $db->execute('SELECT * FROM `<ezrpg>menu` WHERE parent_id IS NULL');
	$results = $db->fetchAll($query);
	foreach($results as $row => $val){
	$query2 = $db->execute('SELECT * FROM `<ezrpg>menu` WHERE parent_id = '. $val->id);
	$rs = $db->fetchAll($query2);
	$menu = "<ul>";
	foreach($rs as $rw => $vl){
	$menu .= "<li><a href='".$vl->uri."'>".$vl->title."</a></li>";
	}
	$menu .= "</ul>";
	}
	$tpl->assign('TOP_MENU_'. $val->title, $menu);
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
