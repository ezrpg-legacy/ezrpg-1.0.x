<?php
defined('IN_EZRPG') or exit;
class Module_FiftyFifty extends Base_Module
{
    public function start()
    {
        requireLogin();

			        if ($_GET['act'] == '1')
			            $this->play();
			        else
			            $this->tpl->display('fiftyfifty/5050.tpl');


    }

    private function play()
	{
		if(isset($_POST['input']))
		{
		 $kans = rand(1,2);
		  if($this->player->money < $_POST['input'])
		  {
		  print"<tr><td class=\"mainTxt\" align=\"center\">You dont have enough cash!</td></tr>";
		  }
		   else if(!preg_match('/^[0-9]{1,15}$/',$_POST['input']))
		   {
		   print"<tr><td class=\"mainTxt\" align=\"center\">Only enter numbers.</td></tr>";
		   }
		   else if($kans == 1)
		   {
		   $this->db->execute("UPDATE `<ezrpg>players` SET `money`=`money`-'{$_POST['input']}' WHERE `username`='{$this->player->username}'");
		   $this->tpl->display('fiftyfifty/5050lose.tpl');
		   }
		  else if($kans == 2)
		  {
		   $this->db->execute("UPDATE `<ezrpg>players` SET `money`=`money`+'{$_POST['input']}*2' WHERE `username`='{$this->player->username}'");
		   $this->tpl->display('fiftyfifty/5050win.tpl');
		  }
		}

	}
}
?>