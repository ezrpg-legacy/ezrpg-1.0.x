<?php
defined('IN_EZRPG') or exit;

$hooks->add_hook('header', 'online_players');

function hook_online_players(&$db, &$tpl, &$player, $args = 0)
{
    $query = $db->fetchRow('SELECT COUNT(`id`) AS `count` FROM `<ezrpg>players` WHERE `last_active`>?', array(time() - (60*5)));
    $tpl->assign('ONLINE', $query->count);
    
    return $args;
}
?>