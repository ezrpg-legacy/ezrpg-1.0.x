<?php
session_start();
defined('IN_EZRPG') or exit;
$hooks->add_hook('header', 'lang', 1);
$hooks->add_hook('admin_header', 'lang', 1);

function hook_lang(&$db, &$tpl, &$player, $args = 0)
{  

//settings
$dir =CUR_DIR."/lang";

//lang
$query = $db->fetchRow('SELECT * FROM `<ezrpg>players` WHERE `id`=? ', array( intval($player->id) ));   
       
if ($query->lang==true) 
{

$lang=$query->lang;
switch ($lang){
    case "english":
        $tpl->assign('FLAGS', 'images/flags/en.png');
        break;
    case "deutsch":
        $tpl->assign('FLAGS', 'images/flags/de.png');
        break;    
    case "russian":
        $tpl->assign('FLAGS',  'images/flags/ru.png');
        break;

        }
}
else
{
$page = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
switch ($page){
    case "en":
        //echo "PAGE EN";
        $lang="english";
        $tpl->assign('FLAGS',  'images/flags/en.png');
        break;
    case "de":
        //echo "PAGE DE";
        $lang="deutsch";
        $tpl->assign('FLAGS',  'images/flags/de.png');
        break;
    case "ru":
        //echo "PAGE RU";
        $lang="russian";
        $tpl->assign('FLAGS', 'images/flags/ru.png');
        break;        
    default:
        //echo "PAGE EN - Setting Default";
        $lang="english";
        $tpl->assign('FLAGS',  'images/flags/en.png');
        break;
}

}

//module
$module =$args;

//data output
$SYSTEM=$dir."/System/".$lang.".php";
include($SYSTEM);

//debug output
if ( DEBUG_MODE == 1 )
{
echo "lang"." ---> "."$lang"."</br>";
echo "System"." ---> ".$SYSTEM."</br>";
}
    return $args;
}

?>