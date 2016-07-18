<?php
defined('IN_EZRPG') or exit;

$hooks->add_hook('header', 'total_bank');

function hook_total_bank(&$db, &$tpl, &$player, $args = 0)
{    
    $total=0;
    $query = $db->execute('SELECT `bank` FROM `<ezrpg>players`');
    while ($result = $db->fetchArray($query))
    {
    $total+=$result['bank'];
    }
    $tpl->assign('BANK', $total);    
    
    return $args;
}
?>