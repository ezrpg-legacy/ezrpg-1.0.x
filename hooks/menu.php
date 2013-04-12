<?php
defined('IN_EZRPG') or exit;

	$hooks->add_hook('player', 'menu_players');

function hook_menu_players($db, $tpl, $player, $args = 0) {
	
	get_menus($db, $tpl);

	return $args;
}
?>
