<?php
defined('IN_EZRPG') or exit;

class Admin_Items extends Base_Module
{
    public function start()
    {
        if (isset($_GET['act']))
        {
            switch($_GET['act'])
          {  
           case 'edit':           
               $this->editItem();
               break;
           case 'delete':           
               $this->deleteItem();
               break;
           case 'add':
               $this->addItem();
               break;
           default:
               $this->listItem();
               break;
            }
        }
        else
        {
            $this->listItem();
        }
    }

    private function listItem()
    {
        $query = $this->db->execute('SELECT `id`, `player`, `class`, `name` FROM `<ezrpg>items` ORDER BY `id` ASC');
        
        $items = Array();
        while ($o = $this->db->fetch($query))
        {
            $items[] = $o;
        }
        
        $query = $this->db->fetchRow('SELECT COUNT(`id`) AS `count` FROM `<ezrpg>items`');
        $total_items = $query->count;
        
        $this->tpl->assign('itemscount', $total_items);
        $this->tpl->assign('items', $items);
        
        $this->tpl->display('admin/items/items.tpl');
    }
    
    private function addItem()
    {
        if (isset($_POST['add']))
        {
            $errors = 0;
            $msg = '';
            
            if (empty($_POST['player']) || empty($_POST['class']) || empty($_POST['name']) || empty($_POST['value1']) || empty($_POST['value2']) || empty($_POST['value3']) || empty($_POST['value4']) || empty($_POST['value5']))
            {
                $errors = 1;
                $msg .= 'You forgot to fill in part of the form!<br />';
            }
            
            if (!ctype_digit($_POST['value1']) || !ctype_digit($_POST['value2']) || !ctype_digit($_POST['value3']) || !ctype_digit($_POST['value4']) || !ctype_digit($_POST['value5']))
            {
                $errors = 1;
                $msg .= 'Please only enter positive numbers for the bot details.<br />';
            }
            
            if ($errors == 1)
            {
                header('Location: index.php?mod=Items&act=add&msg=' . urlencode($msg));
                exit;
            }
            else
            {
                $insert = Array();
                $insert['player'] = $this->player->id;
                $insert['class'] = $_POST['class'];
                $insert['name'] = $_POST['name'];
                $insert['value1'] = intval($_POST['value1']);
                $insert['value2'] = intval($_POST['value2']);
                $insert['value3'] = intval($_POST['value3']);
                $insert['value4'] = intval($_POST['value4']);
                $insert['value5'] = intval($_POST['value5']);
                
                $newitem = $this->db->insert('<ezrpg>items', $insert);
                
                $msg = 'You have added a new <a href="index.php?mod=Items&act=edit&id=' . $newitem . '">Item</a>.';
                $this->tpl->assign('GET_MSG', $msg);
            }
        }
        
        $this->tpl->display('admin/items/items_add.tpl');
    }
    
    private function editItem()
    {
        if (!isset($_GET['id']))
        {
            header('Location: index.php?mod=Items');
            exit;
        }
        
        $items = $this->db->fetchRow('SELECT `id`, `player`, `class`, `name`, `value1`, `value2`, `value3`, `value4`, `value5` FROM `<ezrpg>items` WHERE `id`=?', array( intval($_GET['id']) ));
        
        if ($items == false)
        {
            header('Location: index.php?mod=Items');
            exit;
        }
        
        if (!isset($_POST['edit']))
        {
            $this->tpl->assign('items', $items);
            $this->tpl->display('admin/items/items_edit.tpl');
            exit;
        }
        
        $msg = '';
        $errors = 0;
        
        $items->name = $_POST['name'];
        if (!isUsername($items->name)) //items names have same restrictions as usernames
        {
            $errors = 1;
            $msg .= 'You forgot to enter a name for this items.<br />';
        }
        
        $items->value1 = intval($_POST['value1']);
        $items->value2 = intval($_POST['value2']);
        $items->value3 = intval($_POST['value3']);
        $items->value4 = intval($_POST['value4']);
        $items->value5 = intval($_POST['value5']);
        
        if ($items->value1 < 0 || $items->value2 < 0 || $items->value3 < 0 || $items->value4 < 0 || $items->value5 < 0)
        {
            $errors = 1;
            $msg .= 'All values must be zero or higher!<br />';
        }
        
        if ($errors == 1)
        {
            $this->tpl->assign('items', $items);
            $this->tpl->assign('GET_MSG', $msg);
            $this->tpl->display('admin/items/items_edit.tpl');
            exit;
        }
        else
        {
            $query = $this->db->execute('UPDATE `<ezrpg>items` SET `name`=?, `value1`=?, `value2`=?, `value3`=?, `value4`=?, `value5`=? WHERE `id`=?', array($items->name, $items->value1, $items->value2, $items->value3, $items->value4, $items->value5, intval($items->id)));
            
            $msg = 'You have updated <strong>' . $items->name . '</strong>';
            header('Location: index.php?mod=Items&msg=' . urlencode($msg));
            exit;
        }
    }
    
    private function deleteItem()
    {
        $items = $this->db->fetchRow('SELECT `id`, `name` FROM `<ezrpg>items` WHERE `id`=?', array($_GET['id']));
        
        if ($items == false)
        {
            header('Location: index.php?mod=Items');
            exit;
        }
        
        if (!isset($_POST['confirm']))
        {
            $this->tpl->assign('items', $items);
            $this->tpl->display('admin/items/items_delete.tpl');
            exit;
        }
        else
        {
            $query = $this->db->execute('DELETE FROM `<ezrpg>items` WHERE `id`=?', array($items->id));
            
            $msg = 'You have deleted <strong>' . $items->username . '</strong>';
            header('Location: index.php?mod=Items&msg=' . urlencode($msg));
            exit;
        }
    }
}