<?php
defined('IN_EZRPG') or exit;

$hooks->add_hook('header', 'total_money');

function hook_total_money(&$db, &$tpl, &$player, $args = 0)
{    
    $total=0;
    $query = $db->execute('SELECT `money` FROM `<ezrpg>players`');
    while ($result = $db->fetchArray($query))
    {
    $total+=$result['money'];
    }
    $tpl->assign('MONEY', $total);    
    
    return $args;
}
?>