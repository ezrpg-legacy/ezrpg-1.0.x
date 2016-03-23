<?php
defined('IN_EZRPG') or exit;

class Module_Bank extends Base_Module
{
    public function start()
    {
        requireLogin();
        
        if (isset($_GET['act']))
        {
            if ($_GET['act'] == 'withdraw')
                $this->withdraw();
            else if ($_GET['act'] == 'deposit')
                $this->deposit();
            else if ($_GET['act'] == 'install')
                $this->install();
            else if ($_GET['act'] == 'uninstall')
                $this->uninstall();
            else
                $this->tpl->display('bank.tpl');
        }
        else
        {
            $this->tpl->display('bank.tpl');
        }
    }
    
    private function withdraw()
    {
        if (!isset($_POST['amount']))
        {
            header('Location: index.php?mod=Bank');
            exit;
        }
        
        $msg = '';
        $amount = intval($_POST['amount']);
        if ($amount < 0 || $amount > $this->player->bank)
        {
            //No query, just error message
            $msg = 'You cannot withdraw that amount!';
        }
        else
        {
            //Update player database
            $query = $this->db->execute('UPDATE `<ezrpg>players` SET `money`=?, `bank`=? WHERE `id`=?', array($this->player->money + $amount, $this->player->bank - $amount, $this->player->id));
            
            $msg = 'You have withdrawn ' . $amount . ' money!';
        }
        
        //Redirect back to main bank page, including the message
        header('Location: index.php?mod=Bank&msg=' . urlencode($msg));
        exit;
    }
    
    private function deposit()
    {
        if (!isset($_POST['amount']))
        {
            header('Location: index.php?mod=Bank');
            exit;
        }
        
        $msg = '';
        $amount = intval($_POST['amount']);
        if ($amount < 0 || $amount > $this->player->money)
        {
            //No query, just error message
            $msg = 'You cannot deposit that amount!';
        }
        else
        {
            //Update player database
            $query = $this->db->execute('UPDATE `<ezrpg>players` SET `money`=?, `bank`=? WHERE `id`=?', array($this->player->money - $amount, $this->player->bank + $amount, $this->player->id));
            
            $msg = 'You have deposited ' . $amount . ' money!';
        }
        
        //Redirect back to main bank page, including the message
        header('Location: index.php?mod=Bank&msg=' . urlencode($msg));
        exit;
    }
    
    private function install()
    {
        if ($this->player->rank < 5)
        {
            header('Location: index.php?mod=Bank');
            exit;
        }
        
        $msg = '';
        if (!property_exists($this->player, 'bank'))
        {
            $this->db->execute('ALTER TABLE  `<ezrpg>players` ADD  `bank` INT NOT NULL DEFAULT \'0\' AFTER  `money`');
            $msg = 'You have installed the Bank module!';
        }
        else
        {
            $msg = 'This module is already installed.';
        }
        
        header('Location: index.php?mod=Bank&msg=' . urlencode($msg));
        exit;
    }
    
    private function uninstall()
    {
        if ($this->player->rank < 5)
        {
            header('Location: index.php?mod=Bank');
            exit;
        }
        
        $msg = '';
        if (property_exists($this->player, 'bank'))
        {
            $this->db->execute('ALTER TABLE  `<ezrpg>players` DROP  `bank`');
            $msg = 'You have uninstalled the Bank module. You may now remove the files.';
        }
        else
        {
            $msg = 'This module wasn\t installed anyway.';
        }
        
        header('Location: index.php?msg=' . urlencode($msg));
        exit;
    }
}
?>
