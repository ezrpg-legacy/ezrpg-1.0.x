<?php
//Attack system by JesterC
defined('IN_EZRPG') or exit;
class Module_Attack extends Base_Module
{
    public function start()
    {
        requireLogin();
        if (isset($_GET['act']))
        {
            if ($_GET['act'] == 'go')
                $this->attackuser();
            else if ($_GET['act'] == 'install')
                $this->install();
            else if ($_GET['act'] == 'uninstall')
                $this->uninstall();
            else
                $this->listOpponent();
        }
        else
            $this->listOpponent();
    }
    
    private function attackuser()
    {
        //make sure they are attacking someone
        if (!isset($_GET['id']))
        {
            $msg='You must have the id of the user';
            header('Location: index.php?mod=Attack&msg=' . urlencode($msg));
            exit;
        }
        //make sure they arent attacking themself
        if (($_GET['id']) == $this->player->id)
        {
            $msg='You CANNOT attack yourself';
            header('Location: index.php?mod=Attack&msg=' . urlencode($msg));
            exit;	
        }
        //make sure they have enough energy to attack
        if ($this->player->energy == 0)
        {
            $msg='You dont have enough energy to attack';
            header('Location: index.php?mod=Attack&msg=' . urlencode($msg));
            exit;    
        }
        //make sure player isnt dead before attacking
        if ($this->player->hp == 0)
        { 
            $msg='You cant fight while you are dead';
            header('Location: index.php?mod=Attack&msg=' . urlencode($msg));
            exit;
        }
        //make sure the attacked exists
        $attacked = $this->db->fetchRow('SELECT `id`, `username`, `level`, `hp`, `strength`, `damage`, `exp`, `money` FROM `<ezrpg>players` WHERE `id`=?', array( intval($_GET['id']) ));
        if ($attacked == false)
        {
            $msg='Player doesnt exist';
            header('Location: index.php?mod=Attack&msg=' . urlencode($msg));
            exit;
        }
        if ($attacked->hp <=0)
        {
        	$msg='Player is dead';
        	header('Location: index.php?mod=Attack&msg=' . urlencode($msg));
        	exit;
        }
        //start fighting
        $player = $this->player;
        $player->energy -= 1;
	
        $amsg = '';
	
        while(true)
        {
            //Formula from Zeggy's BotBattle Module
            $min_damage = max(0, ($this->player->strength + $this->player->damage) - 3);
            $max_damage = $this->player->strength + $this->player->damage + 2;
            $damage = rand($min_damage, $max_damage);
            $amin_damage = max(0, ($attacked->strength + $attacked->damage) - 3);
            $amax_damage = $attacked->strength + $attacked->damage + 2;
            $adamage = rand($amin_damage, $amax_damage);
            
            //attacker's turn
            $attacked->hp -= $damage;
            $amsg .= 'You just hit <strong>' . $attacked->username . '</strong> for <strong>' . $damage . '</strong> damage!<br />';
	    
            if ($attacked->hp <= 0)
            {
                $amsg .= '<strong>You just killed ' . $attacked->username . '!</strong><br />';
                break;
            }
            //Attacked's turn
            $player->hp -= $adamage;
            $amsg .= '<strong>' . $attacked->username . '</strong> hit you for <strong>' . $adamage . '</strong> damage!<br />';
	    
            if ($player->hp <= 0)
            {
                $amsg .= '<strong>' . $attacked->username . ' just killed you!</strong><br />';
                break;
            }
            
            
        }
        //End of the Battle
        if ($player->hp <= 0)
        {
            $query = $this->db->execute('UPDATE `<ezrpg>players` SET `energy`=energy-1, `deaths`=deaths+1, `hp`=0 WHERE `username`=?', array($player->username));
        }
        else
        {
            $this->db->execute('UPDATE `<ezrpg>players` SET `deaths`=deaths+1, `hp`=0 WHERE `username`=?', array($attacked->username));
            $winnings = $attacked->money/4;
            $player->money += $winnings;
            $player->exp += $attacked->level*5;
            $amsg .= 'You gained <strong>' . $winnings . '</strong> money and <strong>' . $attacked->level*5 . '</strong> EXP!';
            $query = $this->db->execute('UPDATE `<ezrpg>players` SET `energy`=energy-1, `kills`=kills+1, `hp`=?, `money`=?, `exp`=? WHERE `username`=?', array($player->hp, $player->money, $player->exp, $player->username));
        }
	
        $this->tpl->assign('amsg', $amsg);
        $this->tpl->display('arenanub/attack_results.tpl');
    }
    
    private function listOpponent()
    {
        $query = $this->db->execute('SELECT `id`, `username`, `level` FROM `<ezrpg>players` WHERE `level`<=? and `username`<>? and `hp`>0 ORDER BY `level` ASC', array($this->player->level, $this->player->username));
        $opponents = Array();
        while ($b = $this->db->fetch($query))
        {
            $opponents[] = $b;
        }
        
        $this->tpl->assign('opponents', $opponents);
        $this->tpl->display('arenanub/attack.tpl');
    }
    
}
?>