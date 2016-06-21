<?php
defined('IN_EZRPG') or exit;

class Admin_BotBattle extends Base_Module
{
    public function start()
    {
        if (isset($_GET['act']))
        {
            if ($_GET['act'] == 'edit')
                $this->editBot();
            else if ($_GET['act'] == 'delete')
                $this->deleteBot();
            else if ($_GET['act'] == 'add')
                $this->addBot();
        }
        else
            $this->listBots();
    }
    
    private function listBots()
    {
        $query = $this->db->execute('SELECT `id`, `name`, `level` FROM `<ezrpg>bots` ORDER BY `id` ASC');
        
        $bots = Array();
        while ($b = $this->db->fetch($query))
        {
            $bots[] = $b;
        }
        
        $query = $this->db->fetchRow('SELECT COUNT(`id`) AS `count` FROM `<ezrpg>bots`');
        $total_bots = $query->count;
        
        $this->tpl->assign('botcount', $total_bots);
        $this->tpl->assign('bots', $bots);
        
        $this->tpl->display('admin/botbattle.tpl');
    }
    
    private function addBot()
    {
        if (isset($_POST['add']))
        {
            $errors = 0;
            $msg = '';
            
            if (empty($_POST['name']) || empty($_POST['level']) || empty($_POST['health']) || empty($_POST['damage']) || empty($_POST['exp']) || empty($_POST['money']))
            {
                $errors = 1;
                $msg .= 'You forgot to fill in part of the form!<br />';
            }
            
            if (!ctype_digit($_POST['level']) || !ctype_digit($_POST['health']) || !ctype_digit($_POST['damage']) || !ctype_digit($_POST['exp']) || !ctype_digit($_POST['money']))
            {
                $errors = 1;
                $msg .= 'Please only enter positive numbers for the bot details.<br />';
            }
            
            if ($errors == 1)
            {
                header('Location: index.php?mod=BotBattle&act=add&msg=' . urlencode($msg));
                exit;
            }
            else
            {
                $insert = Array();
                $insert['name'] = $_POST['name'];
                $insert['level'] = intval($_POST['level']);
                $insert['health'] = intval($_POST['health']);
                $insert['damage'] = intval($_POST['damage']);
                $insert['exp'] = intval($_POST['exp']);
                $insert['money'] = intval($_POST['money']);
                
                $newbot = $this->db->insert('<ezrpg>bots', $insert);
                
                $msg = 'You have added a new <a href="index.php?mod=BotBattle&act=edit&id=' . $newbot . '">bot</a>.';
                $this->tpl->assign('GET_MSG', $msg);
            }
        }
        
        $this->tpl->display('admin/botbattle_add.tpl');
    }
    
    private function editBot()
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
        
        if (!isset($_POST['edit']))
        {
            $this->tpl->assign('bot', $bot);
            $this->tpl->display('admin/botbattle_edit.tpl');
            exit;
        }
        
        $msg = '';
        $errors = 0;
        
        $bot->name = $_POST['name'];
        if (!isUsername($bot->name)) //Bot names have same restrictions as usernames
        {
            $errors = 1;
            $msg .= 'You forgot to enter a name for this bot.<br />';
        }
        
        $bot->level = intval($_POST['level']);
        $bot->health = intval($_POST['health']);
        $bot->damage = intval($_POST['damage']);
        $bot->exp = intval($_POST['exp']);
        $bot->money = intval($_POST['money']);
        
        if ($bot->level < 0 || $bot->health < 0 || $bot->damage < 0 || $bot->exp < 0 || $bot->money < 0)
        {
            $errors = 1;
            $msg .= 'All values must be zero or higher!<br />';
        }
        
        if ($errors == 1)
        {
            $this->tpl->assign('bot', $bot);
            $this->tpl->assign('GET_MSG', $msg);
            $this->tpl->display('admin/botbattle_edit.tpl');
            exit;
        }
        else
        {
            $query = $this->db->execute('UPDATE `<ezrpg>bots` SET `name`=?, `level`=?, `health`=?, `damage`=?, `exp`=?, `money`=? WHERE `id`=?', array($bot->name, $bot->level, $bot->health, $bot->damage, $bot->exp, $bot->money, intval($bot->id)));
            
            $msg = 'You have updated <strong>' . $bot->name . '</strong>';
            header('Location: index.php?mod=BotBattle&msg=' . urlencode($msg));
            exit;
        }
    }
    
    private function deleteBot()
    {
        $bot = $this->db->fetchRow('SELECT `id`, `name` FROM `<ezrpg>bots` WHERE `id`=?', array($_GET['id']));
        
        if ($bot == false)
        {
            header('Location: index.php?mod=BotBattle');
            exit;
        }
        
        if (!isset($_POST['confirm']))
        {
            $this->tpl->assign('bot', $bot);
            $this->tpl->display('admin/botbattle_delete.tpl');
            exit;
        }
        else
        {
            $query = $this->db->execute('DELETE FROM `<ezrpg>bots` WHERE `id`=?', array($bot->id));
            
            $msg = 'You have deleted <strong>' . $bot->username . '</strong>';
            header('Location: index.php?mod=BotBattle&msg=' . urlencode($msg));
            exit;
        }
    }
}