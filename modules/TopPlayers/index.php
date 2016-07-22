<?php
 defined('IN_EZRPG') or exit; 
  

 class Module_TopPlayers extends Base_Module { 
     public function start() { 
  
         //Require login 
         requireLogin(); 
   
         switch ($_GET['order']) { 
             case 'money': 
                 $order = 'money'; 
             	break;
             case 'bank': 
                 $order = 'bank'; 
             	break;   
             case 'level': 
 		// falls through 
  
 	    default: 
                 $order = 'level'; 
         } 
           
         $query = $this->db->execute('SELECT `username`, `level`, `money`, `bank` FROM `<ezrpg>players` ORDER BY ' . $order . ' DESC LIMIT 10'); 
         $members = $this->db->fetchAll($query); 
   
         $this->tpl->assign('members', $members); 
         $this->tpl->display('topplayers.tpl'); 
     } 
 } 
