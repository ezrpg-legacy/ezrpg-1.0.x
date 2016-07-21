<?php
defined('IN_EZRPG') or exit;

class Module_Job extends Base_Module
{
    public function start()
    {
        requireLogin();
        
        //Name of the different jobs
        $work_strength = 'Warehouse Worker';
        $work_vitality = 'Fitness Specialist';
        $work_agility = 'Athlete';
        $work_dexterity = 'Thief';
        
        if (isset($_GET['work']))
        {
            $this->work();
        }
        else
        {
            $this->tpl->assign('work_strength', $work_strength);
            $this->tpl->assign('work_vitality', $work_vitality);
            $this->tpl->assign('work_agility', $work_agility);
            $this->tpl->assign('work_dexterity', $work_dexterity);
            $this->tpl->display('job.tpl');
        }
    }
    
    private function work()
    {
        if ($this->player->energy < 1)
        {
            $msg = 'You don\'t have enough energy left to work!';
            header('Location: index.php?mod=Job&msg=' . urlencode($msg));
            exit;
        }

        $earn = $this->player->level;
        if ($_GET['work'] == 0)
            $earn += rand($this->player->strength*3, $this->player->strength*5);
        else if ($_GET['work'] == 1)
            $earn += rand($this->player->vitality*3, $this->player->vitality*5);
        else if ($_GET['work'] == 2)
            $earn += rand($this->player->agility*3, $this->player->agility*5);
        else if ($_GET['work'] == 3)
            $earn += rand($this->player->dexterity*3, $this->player->dexterity*5);

        $query = $this->db->execute('UPDATE `<ezrpg>players` SET `money`=money+?, `energy`=energy-1 WHERE `id`=?', array(intval($earn), $this->player->id));

        $msg = 'You did your job and earned <strong>' . $earn . '</strong> money!';
        header('Location: index.php?mod=Job&msg=' . urlencode($msg));
        exit;
    }
}
?>
