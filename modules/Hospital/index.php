<?php

defined('IN_EZRPG') or exit;

class Module_Hospital extends Base_Module
{
 
    public function start()
    {
        requireLogin();
		
    if (isset($_GET['act']))
        {
            if ($_GET['act'] == 'heal')
                $this->heal();
            else if ($_GET['act'] == 'adrenaline')
                $this->adrenaline();
            else
                $this->tpl->display('healer.tpl');
        }
        else
        {
            $this->tpl->display('hospital.tpl');
        }
    }
	
private function heal()
  {
        if (!isset($_POST['amount']))
        {
            header('Location: index.php?mod=Hospital');
            exit;
        }
        
        $msg = '';
        $amount = intval($_POST['amount']);
        if ($amount < 0 || $amount > $this->player->money)
        {
          $msg = $_SESSION['You_do_not_have_enough_money_for_treatment'];
        }
        else
        {
            $query = $this->db->execute('UPDATE `<ezrpg>players` SET `hp`=?, `money`=? WHERE `id`=?', array($this->player->hp + $amount, $this->player->money - $amount, $this->player->id));
            $msg = $_SESSION['You_pay_for_treatment'] . $amount . $_SESSION['money'];
        }
        header('Location: index.php?mod=Hospital&msg=' . urlencode($msg));
        exit;
    }

private function adrenaline()
	{
        if (!isset($_POST['amount']))
        {
            header('Location: index.php?mod=Hospital');
            exit;
        }
        
        $msg = '';
        $amount = intval($_POST['amount']);
        if ($amount < 0 || $amount > $this->player->money)
        {
          $msg = $_SESSION['You_do_not_have_enough_money_for_treatment'];
        }
        else
        {
            $query = $this->db->execute('UPDATE `<ezrpg>players` SET `energy`=?, `money`=? WHERE `id`=?', array($this->player->energy + $amount, $this->player->money - $amount, $this->player->id));
            $msg = $_SESSION['You_pay_for_treatment'] . $amount . $_SESSION['money'];
        }
        header('Location: index.php?mod=Hospital&msg=' . urlencode($msg));
        exit;
}
}
?>