<?php
defined('IN_EZRPG') or exit;

$hooks->add_hook('header', 'total_players');

function hook_total_players(&$db, &$tpl, &$player, $args = 0)
{
    $query = $db->fetchRow('SELECT COUNT(`id`) AS `count` FROM `<ezrpg>players`');
    $tpl->assign('TOTAL', $query->count);
    
    return $args;
}
?>