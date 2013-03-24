<?php
defined('IN_EZRPG') or exit;

/*
  Class: Admin_Index
  Home page for the admin panel.
*/
class Admin_Index extends Base_Module
{
    /*
      Function: start
      Displays admin/index.tpl
    */
    public function start()
    {
        $this->tpl->display('admin/index.tpl');
    }
}
?>