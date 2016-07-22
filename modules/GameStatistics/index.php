<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: Module_Index
  
*/
class Module_GameStatistics extends Base_Module
{
    /*
      Function: start
      Displays the members list page.
    */
    public function start()
    {
        //Require login
        requireLogin();
       
            $this->tpl->display('game_statistics.tpl');
       
    }
}
?>