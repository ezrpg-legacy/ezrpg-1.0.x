<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: Module_Index
  A basic module for the default landing page. Just shows the index template or the player's home page.
*/
class Module_Index extends Base_Module
{
    /*
      Function: start
      Renders  either index.tpl or home.tpl with smarty, depending on if the user is logged in.
    */
    public function start()
    {
        if (LOGGED_IN)
        {
            $this->tpl->display('home.tpl');
        }
        else
        {
           $this->totalPlayers();            
           $this->tpl->display('index.tpl');
        }
    
    }
       private function totalPlayers()
       {
        $query = $this->db->fetchRow('SELECT COUNT(`id`) AS `count` FROM `<ezrpg>players`');
        $total_players = $query->count;
       
        $this->tpl->assign('playercount', $total_players); 
        
       }

   
}
?>