<?php
defined('IN_EZRPG') or exit;

$hooks->add_hook('header', 'total_deaths');

function hook_total_deaths(&$db, &$tpl, &$player, $args = 0)
{    
    $total=0;
    $query = $db->execute('SELECT `deaths` FROM `<ezrpg>players`');
    while ($result = $db->fetchArray($query))
    {
    $total+=$result['deaths'];
    }
    $tpl->assign('DEATHS', $total);    
    
    return $args;
}
?>