<?php
defined('IN_EZRPG') or exit;

if (defined('IN_ADMIN'))
  $hooks->add_hook('admin_header', 'menu_admin');
else
	$hooks->add_hook('player', 'menu_players');

function hook_menu_players($db, $tpl, $player, $args = 0) {
	if(LOGGED_IN != "TRUE") 
	{
	$menu = "<ul>";
	$menu .= "<li><a href='index.php'>Home</a></li>";
	$menu .= "<li><a href='index.php?mod=Register'>Register</a></li>";
	$menu .= "</ul>";
  $tpl->assign('MENU_LOGGEDOUT', $menu);
	} else {
	get_menus($db, $tpl);
	}
	return $args;
}
function hook_menu_admin(&$db, &$tpl, &$player, $args = 0) {
	$menu = "<ul>";
	$menu .= "<li><a href='index.php'>Admin</a></li>";
	$menu .= "<li><a href='index.php?mod=Members'>Members</a></li>";
	$menu .= "<li><a href='../index.php'>Back</a></li>";
	$menu .= "<li><a href='../index.php?mod=Logout'>Log Out</a></li>";
	$menu .= "</ul>";
	$tpl->assign('ADMIN_MENU', $menu);
	return $args;
}
?>
