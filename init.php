<?php
//This page cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

//Start Session
session_start();

//Headers
//header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
//header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past

require_once 'config.php';

//Show errors?
(SHOW_ERRORS == 0)?error_reporting(0):error_reporting(E_ALL);

//Constants
define('CUR_DIR', realpath(dirname(__FILE__)));
define('MOD_DIR', CUR_DIR . '/modules');
define('ADMIN_DIR', CUR_DIR . '/admin');
define('LIB_DIR', CUR_DIR . '/lib');
define('EXT_DIR', LIB_DIR . '/ext');
define('HOOKS_DIR', CUR_DIR . '/hooks');

require_once(CUR_DIR . '/lib.php');


//Database
try
{
    $db = DbFactory::factory($config_driver, $config_server, $config_username, $config_password, $config_dbname);
}
catch (DbException $e)
{
    $e->__toString();
}

//Database password no longer needed, unset variable
unset($config_password);


//HTML Purifier Config
$purifier_config = HTMLPurifier_Config::createDefault();
$purifier_config->set('HTML.Allowed', 'b,a[href],i,br,em,strong,ul,li');
$purifier_config->set('URI.Base', $_SERVER['DOCUMENT_ROOT']);
$purifier_config->set('URI.MakeAbsolute', true);
$purifier_config->set('URI.DisableExternal', true);
$purifier = new HTMLPurifier($purifier_config);


//Smarty
$tpl = new Smarty();
$tpl->template_dir = CUR_DIR . '/smarty/templates/';
$tpl->compile_dir  = CUR_DIR . '/smarty/templates_c/';
$tpl->config_dir   = CUR_DIR . '/smarty/configs/';
$tpl->cache_dir    = CUR_DIR . '/smarty/cache/';

//Initialize $player
$player = 0;

//Create a hooks object
$hooks = new Hooks($db, $tpl, $player);

//Include all hook files
$hook_files = scandir(HOOKS_DIR);

foreach($hook_files as $hook_file)
{
    $path_parts = pathinfo(HOOKS_DIR . '/' . $hook_file);
    if ($path_parts['extension'] == 'php' && $path_parts['basename'] != 'index.php')
        include_once (HOOKS_DIR . '/' . $hook_file);
}

//Run login hooks on player variable
$player = $hooks->run_hooks('player', 0);
?>
