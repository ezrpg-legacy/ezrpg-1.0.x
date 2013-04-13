<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: Module_City
  This is a very simple module, designed to simply display a static template page.
*/
class Module_City extends Base_Module
{
    /*
      Function: start
      Displays the city.tpl template. That's all!
    */
    public function start()
    {
        //Require the user to be logged in
        requireLogin();
		$db = $this->db;
		$tpl = $this->tpl;
		$menu = $this->menu;
		$menu->get_menus($db, $tpl, "UserMenu", FALSE, FALSE);
		$menu->get_menus($db, $tpl, "WorldMenu", FALSE, FALSE);
		$menu->get_menus($db, $tpl, "City", False, FALSE);
        $this->tpl->display('city.tpl');
    }
}
?>
