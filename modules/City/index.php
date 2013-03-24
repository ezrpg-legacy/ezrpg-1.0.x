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
		
        $this->tpl->display('city.tpl');
    }
}
?>