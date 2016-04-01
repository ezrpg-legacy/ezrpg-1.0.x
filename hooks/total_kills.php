<?php
defined('IN_EZRPG') or exit;

$hooks->add_hook('header', 'total_kills');

function hook_total_kills(&$db, &$tpl, &$player, $args = 0)
{    
    $total=0;
    $query = $db->execute('SELECT `kills` FROM `<ezrpg>players`');
    while ($result = $db->fetchArray($query))
    {
    $total+=$result['kills'];
    }
    $tpl->assign('KILLS', $total);    
    
    return $args;
}
?>