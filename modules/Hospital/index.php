<?php

/* A simple hospital module by Akai  */
/* Upgraded for adrenaline shots by tREMor @ freepwn.com */

defined('IN_EZRPG') or exit;

class Module_Hospital extends Base_Module
{
 
    public function start()
    {
        requireLogin();
		
		if ($_POST['submit'] == 'Heal Me') { 
			$this->heal(); 
		}	 
		else if ($_POST['submit'] == 'Adrenaline Shot') { 
			$this->adrenaline(); 
		}
		else { 
		$msg = "";
		$this->tpl->assign('hospital', $msg);
		$this->tpl->display('hospital.tpl'); 
		}
		
    }
	
	private function heal()
	{
	
		if ($this->player->hp == $this->player->max_hp)
		{
			$msg = 'Your health is full, you do not need to be healed :)';			
			$this->tpl->assign('hospital', $msg);
			$this->tpl->display('hospital.tpl');
			exit;
		}
		
		$heal = $this->player->max_hp - $this->player->hp;
		$cost = $heal * 1;
		
		if ($this->player->money < $cost)
		{
			$msg = 'You don\t have enough money!';
			$this->tpl->assign('hospital', $msg);
			$this->tpl->display('hospital.tpl');
			exit;
		} 
		else 
		{ 
			$query = $this->db->execute('UPDATE `<ezrpg>players` SET `hp`=?, `money`=? WHERE `id`=?', array($this->player->max_hp, $this->player->money - $cost, $this->player->id)); 
			$msg = 'You have completely healed yourself!';
			$this->tpl->assign('hospital', $msg);
			$this->tpl->display('hospital.tpl');
			exit;
		}
		
	}
	
	
	private function adrenaline()
	{
	
		if ($this->player->energy == $this->player->max_energy)
		{
			$msg = 'Your energy is full, you do not need adrenaline :)';			
			$this->tpl->assign('hospital', $msg);
			$this->tpl->display('hospital.tpl');
			exit;
		}
		
		$heal = $this->player->max_energy - $this->player->energy;
		$cost = $heal * 1;
		
		if ($this->player->money < $cost)
		{
			$msg = 'You don\t have enough money!';
			$this->tpl->assign('hospital', $msg);
			$this->tpl->display('hospital.tpl');
			exit;
		} 
		else 
		{ 
			$query = $this->db->execute('UPDATE `<ezrpg>players` SET `energy`=?, `money`=? WHERE `id`=?', array($this->player->max_energy, $this->player->money - $cost, $this->player->id)); 
			$msg = 'You are now completely energized!';
			$this->tpl->assign('hospital', $msg);
			$this->tpl->display('hospital.tpl');
			exit;
		}
		
	}
}

?>