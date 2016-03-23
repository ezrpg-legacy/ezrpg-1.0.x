<?php
defined('IN_EZRPG') or exit;

class Module_BotBattle extends Base_Module
{
    public function start()
    {
        requireLogin();
        
        if (isset($_GET['act']))
        {
            if ($_GET['act'] == 'battle')
                $this->battle();
            else if ($_GET['act'] == 'install')
                $this->install();
            else if ($_GET['act'] == 'uninstall')
                $this->uninstall();
            else
                $this->listBots();
        }
        else
            $this->listBots();
    }
    
    private function battle()
    {
        if (!isset($_GET['id']))
        {
            header('Location: index.php?mod=BotBattle');
            exit;
        }
        
        $bot = $this->db->fetchRow('SELECT `id`, `name`, `level`, `health`, `damage`, `exp`, `money` FROM `<ezrpg>bots` WHERE `id`=?', array( intval($_GET['id']) ));
        
        if ($bot == false)
        {
            header('Location: index.php?mod=BotBattle');
            exit;
        }
        
        if ($this->player->energy == 0)
        {
            $msg = 'You do not have enough energy for a battle!';
            header('Location: index.php?mod=BotBattle&msg=' . urlencode($msg));
            exit;
        }
        
        if ($this->player->hp == 0)
        {
            $msg = 'You must be alive to fight!';
            header('Location: index.php?mod=BotBattle&msg=' . urlencode($msg));
            exit;
        }
        
        $player = $this->player;
        $player->energy -= 1; //Remove 1 energy from player
        
        $battle = '';
        
        //Battle loop
        while (true)
        {
            //Player's turn
            $min_damage = max(0, ($player->strength + $player->damage) - 3);
            $max_damage = $player->strength + $player->damage + 2;
            $damage = rand($min_damage, $max_damage);
            
            $bot->health -= $damage;
            $battle .= 'You hit <strong>' . $bot->name . '</strong> for <strong>' . $damage . '</strong> damage!<br />';
            
            if ($bot->health <= 0)
            {
                $battle .= '<strong>You killed ' . $bot->name . '!</strong><br />';
                break;
            }
            
            //Bot's turn
            $player->hp -= $bot->damage;
            $battle .= '<strong>' . $bot->name . '</strong> hit you for <strong>' . $bot->damage . '</strong> damage!<br />';
            
            if ($player->hp <= 0)
            {
                $battle .= '<strong>' . $bot->name . ' killed you!</strong><br />';
                break;
            }
        }
        
        if ($player->hp <= 0)
        {
            $query = $this->db->execute('UPDATE `<ezrpg>players` SET `energy`=energy-1, `deaths`=deaths+1, `hp`=0 WHERE `id`=?', array($player->id));
        }
        else
        {
            $player->money += $bot->money;
            $player->exp += $bot->exp;
            $battle .= 'You gained <strong>' . $bot->money . '</strong> money and <strong>' . $bot->exp . '</strong> EXP!';
            
            $query = $this->db->execute('UPDATE `<ezrpg>players` SET `energy`=energy-1, `kills`=kills+1, `hp`=?, `money`=?, `exp`=? WHERE `id`=?', array($player->hp, $player->money, $player->exp, $player->id));
        }
        
        $this->tpl->assign('battle', $battle);
        $this->tpl->display('botbattle_results.tpl');
    }
    
    private function listBots()
    {
        $query = $this->db->execute('SELECT `id`, `name`, `level` FROM `<ezrpg>bots` ORDER BY `level` ASC');
        
        $bots = Array();
        while ($b = $this->db->fetch($query))
        {
            $bots[] = $b;
        }
        
        $this->tpl->assign('bots', $bots);
        $this->tpl->display('botbattle.tpl');
    }
    
    private function install()
    {
        requireAdmin($this->player);
        
        $table_prefix = DB_PREFIX;
        $create_table = <<<SQL
CREATE TABLE IF NOT EXISTS `<ezrpg>bots` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `level` int(10) unsigned NOT NULL,
  `health` int(10) unsigned NOT NULL,
  `damage` int(10) unsigned NOT NULL,
  `exp` int(10) unsigned NOT NULL,
  `money` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
SQL;
        $this->db->execute($create_table);
        
        $msg = 'You have installed Bot Battles.';
        header('Location: index.php?mod=BotBattle&msg=' . urlencode($msg));
        exit;
    }
    
    private function uninstall()
    {
        requireAdmin($this->player);
        
        $this->db->execute('DROP TABLE IF EXISTS `<ezrpg>bots`');
        
        $msg = 'You have uninstalled Bot Battles.';
        header('Location: index.php?msg=' . urlencode($msg));
        exit;
    }
}
?>