<?php
defined('IN_EZRPG') or exit;

class Module_Market extends Base_Module
{
    public function start()
    {
        requireLogin();
        if ($_GET['act'] == 'sell')
        {
        if ($_GET['move'] == 'dosell')
            $this->dosell();
        else
            $this->tpl->display('market/sell.tpl');
        }
        elseif ($_GET['act'] == 'buy')
            $this->buy();
        elseif ($_GET['act'] == 'remove')
            $this->del();
        else
            $this->marketlist();
    }
    
    private function marketlist()
    {
     $query = $this->db->execute('SELECT `id`, `username`, `item`, `amount`, `price` FROM `<ezrpg>market` ORDER BY `id` DESC');
        
        $positions = Array();
        while ($p = $this->db->fetch($query))
        {
            $positions[] = $p;
        }
        
        $query = $this->db->fetchRow('SELECT COUNT(`id`) AS `count` FROM `<ezrpg>market`');
        $total_items = $query->count;
        
        $this->tpl->assign('total_items', $total_items);
        $this->tpl->assign('positions', $positions);
        
        $this->tpl->display('market/market.tpl');
    }

    private function del()
    {
   	$del = $this->db->fetchRow('SELECT * FROM `<ezrpg>market` WHERE `id`='.$_GET['id']);

      $this->db->execute('UPDATE `<ezrpg>mines` SET `'.$del->item.'`='.$del->item.' + ? WHERE `player`=?', array($del->amount, $this->player->id));
      
      $this->db->execute('UPDATE `<ezrpg>players` SET `money`=money + ? WHERE `id`=?', array($del->price, $this->player->id));
      
      $this->db->execute('DELETE FROM `<ezrpg>market` WHERE `id`='.$_GET['id']);
                
      $msg='You delete '. $del->amount .' '. $del->item .' for '. $del->price .' money from market!';
      Header("Location: index.php?mod=Market&msg=" . urlencode($msg));
    }

    private function buy()
    {
    $query = $this->db->fetchRow('SELECT `money` FROM `<ezrpg>players` WHERE `id`=?', array($this->player->id));
   	$buy = $this->db->fetchRow('SELECT * FROM `<ezrpg>market` WHERE `id`='. $_GET['id']);

      if ($query->money <= 0)
      {
            $msg='You dont have money!';
            Header("Location: index.php?mod=Market&msg=" . urlencode($msg));
      }
      elseif ($query->money < $buy->price)
      {
            $msg='You dont have enough money!';
            Header("Location: index.php?mod=Market&msg=" . urlencode($msg));
      }
      else
    	{
      $this->db->execute('UPDATE `<ezrpg>mines` SET `'.$buy->item.'`='.$buy->item.' + ? WHERE `player`=?', array($buy->amount, $this->player->id));
      
      $this->db->execute('UPDATE `<ezrpg>players` SET `money`=money - ? WHERE `id`=?', array($buy->price, $this->player->id));
      
      $this->db->execute('DELETE FROM `<ezrpg>market` WHERE `id`='.$_GET['id']);
                
      $msg='You buy '. $buy->amount .' '. $buy->item .' for '. $buy->price .' money from '. $buy->username .'.';
      Header("Location: index.php?mod=Market&msg=" . urlencode($msg));
      }
    }
        
    private function dosell()
    {
		if ($_POST['item'] == '')
    	{
    		$msg="Please specify a item";
        	Header("Location: index.php?mod=Market&act=sell&msg=" . urlencode($msg));
        	exit;
    	}
		elseif ($_POST['amount'] <= 0 or $_POST['amount'] =='')
    	{
    		$msg="Please specify a amount";
        	Header("Location: index.php?mod=Market&act=sell&msg=" . urlencode($msg));
        	exit;
    	}
    	elseif ($_POST['price'] <= 0 or $_POST['price'] =='')
    	{
    		$msg="Please specify a amount.";
        	Header("Location: index.php?mod=Market&act=sell&msg=" . urlencode($msg));
        	exit;
    	}
    	else
    	{	
			$query = $this->db->fetchRow('SELECT * FROM `<ezrpg>mines` WHERE `player` = ?', array($this->player->id));
			switch ($_POST['item'])
			{
			case 'Rocks': 
				$what_item = $query->rocks;
				break;
			case 'Copper': 
				$what_item = $query->copper;
				break;
			case 'Diamonds': 
				$what_item = $query->diamonds;
				break;				
			}
			if ($_POST['amount'] > $what_item)
			{
			    $msg="You dont have that amount of items";
				Header("Location: index.php?mod=Market&act=sell&msg=" . urlencode($msg));
				exit;
			}
			
			else
			{
			    $insert = Array();
                $insert['username'] = $this->player->username;
                $insert['item'] = $_POST['item'];
                $insert['amount'] = $_POST['amount'];
                $insert['price'] = $_POST['price'];
                $this->db->insert('<ezrpg>market', $insert);
                
                $query = $this->db->execute('UPDATE `<ezrpg>mines` SET `'. $_POST['item'] .'`='.$_POST['item'].' - ? WHERE `player`=?', array($_POST['amount'], $this->player->id));
                
				$msg='You put for sell '. $_POST['amount'] .' of '. $_POST['item'] .' for '. $_POST['price'] .' money!';
				Header("Location: index.php?mod=Market&act=sell&msg=" . urlencode($msg));
			}
		}
    }
}
?>