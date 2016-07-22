<?php
defined('IN_EZRPG') or exit;
//Made by 21lockdown
$hooks->add_hook('header', 'ban');

function hook_ban($db, $tpl, $player, $args = 0)
{
    if ($player === 0 || LOGGED_IN == false)
        return $args;
    
            if ($player->ban == 1)
    {
        unset($_SESSION['hash']);
        unset($_SESSION['userid']);
        session_unset();
        session_destroy();
        header('Location: index.php?msg=' . urlencode("You have been banned from the server!"));
    }
    
    return $args;
}
?>