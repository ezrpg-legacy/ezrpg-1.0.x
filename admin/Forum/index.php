<?php
defined('IN_EZRPG') or exit;

class Admin_Forum extends Base_Module
{
    public function start()
    {
       //meine problem lцsung fьr die msg anzeige//start
       //$GET_MSG = $_GET['msg'];
       //$this->tpl->assign('GET_MSG', $GET_MSG);
       //meine problem lцsung fьr die msg anzeige//ende
    	
        if (isset($_GET['act']))
        {
            if ($_GET['act'] == 'edit')
                $this->editforum();
            else if ($_GET['act'] == 'delete')
                $this->deleteforum();
            else if ($_GET['act'] == 'add')
                $this->addforum();
        }
        else
            $this->listforum();
    }
    
    private function listforum()
    {
        $query = $this->db->execute('SELECT * FROM `<ezrpg>forum_cat` ORDER BY `id` ASC');
        
        $list = Array();
        while ($b = $this->db->fetch($query))
        {
            $list[] = $b;
        }
        
        $query = $this->db->fetchRow('SELECT COUNT(`id`) AS `count` FROM `<ezrpg>forum_cat`');
        $total = $query->count;
        
        $this->tpl->assign('count', $total);
        $this->tpl->assign('list', $list);
        
        $this->tpl->display('admin/forum/forum.tpl');
    }
    
    private function addforum()
    {
        if (isset($_POST['add']))
        { 
        

            $errors = 0;
            $msg = '';
            
            if (empty($_POST['title']) || empty($_POST['description']))
            {
                $errors = 1;
                $msg .= 'You forgot to fill in part of the form!<br />';
            }
            
            
            if ($errors == 1)
            {
                header('Location: index.php?mod=Forum&act=add&msg=' . urlencode($msg));
                exit;
            }
            else
            {
        	
                $insert = Array();
                $insert['title'] = $_POST['title'];
                $insert['description'] = $_POST['description'];
                
                
                $new = $this->db->insert('<ezrpg>forum_cat', $insert);
                if ($new == true)
                {
                $msg = 'You have added a new <a href="index.php?mod=Forum&act=edit&id=' . $new . '">Item</a>.';
                header('Location: index.php?mod=Forum&msg=' . urlencode($msg));
            exit;
                }
                else
                {
                $msg = 'Insert Error';
                $this->tpl->assign('GET_MSG', $msg);
                }
            }
        }
        
        $this->tpl->display('admin/forum/forum_add.tpl');
    }
    
    private function editforum()
    {
        if (!isset($_GET['id']))
        {
            header('Location: index.php?mod=Forum');
            exit;
        }
        
        $cat = $this->db->fetchRow('SELECT * FROM `<ezrpg>forum_cat` WHERE `id`=?', array( intval($_GET['id']) ));
        
        if ($cat == false)
        {
            header('Location: index.php?mod=Forum');
            exit;
        }
        
        if (!isset($_POST['edit']))
        {
            $this->tpl->assign('cat', $cat);
            $this->tpl->display('admin/forum/forum_edit.tpl');
            exit;
        }
        
        $msg = '';
        $errors = 0;
        
        
        $cat->title = $_POST['title'];
        $cat->description = $_POST['description'];
        
        
        if ($errors == 1)
        {
            $this->tpl->assign('cat', $cat);
            $this->tpl->assign('GET_MSG', $msg);
            $this->tpl->display('admin/forum_edit.tpl');
            exit;
        }
        else
        {
$query = $this->db->execute('UPDATE `<ezrpg>forum_cat` SET `title`=?, `description`=? WHERE `id`=?', array($cat->title, $cat->description, intval($cat->id)));
            
            
           
            $msg = 'You have updated <strong>' . $cat->title . '</strong>';
            header('Location: index.php?mod=Forum&msg=' . urlencode($msg));
            exit;
}

    }
    
    private function deleteforum()
    {
        $cat = $this->db->fetchRow('SELECT * FROM `<ezrpg>forum_cat` WHERE `id`=?', array($_GET['id']));
        
        if ($cat == false)
        {
            header('Location: index.php?mod=Forum');
            exit;
        }
        
        if (!isset($_POST['confirm']))
        {
            $this->tpl->assign('cat', $cat);
            $this->tpl->display('admin/forum/forum_delete.tpl');
            exit;
        }
        else
        {
        	//cat
            $query = $this->db->execute('DELETE FROM `<ezrpg>forum_cat` WHERE `id`=?', array($cat->id));
            //topic
            $query = $this->db->execute('DELETE FROM `<ezrpg>forum_top` WHERE `id_cat`=?', array($cat->id));
            //mes
            $query = $this->db->execute('DELETE FROM `<ezrpg>forum_mes` WHERE `id_cat`=?', array($cat->id));
            
            $msg = 'You have deleted <strong>' . $objekte->username . '</strong>';
            header('Location: index.php?mod=Forum&msg=' . urlencode($msg));
            exit;
        }
    }
}