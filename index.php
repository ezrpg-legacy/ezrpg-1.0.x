<?php
define('IN_EZRPG', true);

if (!file_exists('./config.php')) {
  header('Location: install/index.php');
	exit(1);
}

require_once 'init.php';

$default_mod = 'Index';

$module_name = ( (isset($_GET['mod']) && ctype_alnum($_GET['mod'])) ? $_GET['mod'] : $default_mod );

//Header hooks
$module_name = $hooks->run_hooks('header', $module_name);

//Begin module
$module = ModuleFactory::factory($db, $tpl, $player, $module_name);
$module->start();

//Footer hooks
$hooks->run_hooks('footer', $module_name);
?>
