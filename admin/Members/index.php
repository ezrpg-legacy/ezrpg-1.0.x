<?php
defined('IN_EZRPG') or exit;

/*
  Class: Admin_Members
  Admin page for managing members
*/
class Admin_Members extends Base_Module
{
    /*
      Function: start
      Displays the list of members or a member edit form.
    */
    public function start()
    {
        if (isset($_GET['act']))
        {
            if ($_GET['act'] == 'edit')
            {
                $this->editMember();
            }
            else if ($_GET['act'] == 'delete')
            {
                $this->deleteMember();
            }
        }
        else
        {
            $this->listMembers();
        }
    }
    
    /*
      Function: listMembers
      Gets a list of all members and displays them in a paginated format.
    */
    private function listMembers()
    {
        if (isset($_GET['page']))
            $page = (intval($_GET['page']) > 0) ? intval($_GET['page']) : 0;
        else
            $page = 0;
        
        $query = $this->db->execute('SELECT `id`, `username`, `email` FROM `<ezrpg>players` ORDER BY `id` ASC LIMIT ?,50', array($page * 50));
        
        $members = Array();
        while ($m = $this->db->fetch($query))
        {
            $members[] = $m;
        }
        
        $query = $this->db->fetchRow('SELECT COUNT(`id`) AS `count` FROM `<ezrpg>players`');
        $total_players = $query->count;
        
        $prevpage = (($page - 1) >= 0) ? ($page - 1) : 0;
        
        $this->tpl->assign('nextpage', ++$page);
        $this->tpl->assign('prevpage', $prevpage);
        $this->tpl->assign('playercount', $total_players);
        $this->tpl->assign('members', $members);
        
        $this->tpl->display('admin/members.tpl');
    }
    
    /*
      Function: editMember
      Displays a form to edit a player, and processes the form submissions.
    */
    private function editMember()
    {
        if (!isset($_GET['id']))
        {
            header('Location: index.php?mod=Members');
            exit;
        }
        
        $member = $this->db->fetchRow('SELECT `id`, `username`, `email`, `rank`, `money`, `level`, `stat_points`, `strength`, `vitality`, `agility`, `dexterity`, `damage`, `kills`, `deaths` FROM `<ezrpg>players` WHERE `id`=?', array( intval($_GET['id']) ));
        
        //No rows found
        if ($member == false)
        {
            header('Location: index.php?mod=Members');
            exit;
        }
        
        //No form was submitted, so just display the edit form
        if (!isset($_POST['edit']))
        {
            $this->tpl->assign('member', $member);
            $this->tpl->display('admin/members_edit.tpl');
            exit;
        }
        
        $msg = '';
        $errors = 0;
        //Form was submitted! \o/
        if (empty($_POST['email']))
        {
            $errors = 1;
            $msg .= 'You forgot to enter an email address.<br />';
        }
        
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $errors = 1;
            $msg .= 'Email is invalid.<br />';
        }
        
        if ($_POST['rank'] < 0 || !filter_var($_POST['rank'], FILTER_VALIDATE_INT))
        {
            $errors = 1;
            $msg .= 'The rank you entered was invalid.<br />';
        }
        
        //If the rank of the player you're editing is higher or equal to your own rank, then you are not allowed to edit their rank
        if ($member->rank > $this->player->rank)
        {
            if ($_POST['rank'] != $member->rank)
            {
                //Reset rank to original rank
                $_POST['rank'] = $member->rank;
            }
        }
        else if ($_POST['rank'] > $this->player->rank)
        {
            $errors = 1;
            $msg .= 'You can\'t set a member\'s rank to higher than your own!<br />';
        }
        
        if ($_POST['money'] < 0 || !filter_var($_POST['money'], FILTER_VALIDATE_INT))
        {
            $errors = 1;
            $msg .= 'The player must have a positive amount of money!<br />';
        }
        
        if ($_POST['level'] < 0 || !filter_var($_POST['level'], FILTER_VALIDATE_INT))
        {
            $errors = 1;
            $msg .= 'The player must have a level higher than 0!<br />';
        }
        
        if ($_POST['stat_points'] < 0 || !filter_var($_POST['stat_points'], FILTER_VALIDATE_INT))
        {
            $errors = 1;
            $msg .= 'Stat points are invalid';
        }
        
        if ($_POST['strength'] < 0 || !filter_var($_POST['strength'], FILTER_VALIDATE_INT))
        {
            $errors = 1;
            $msg .= 'Strength points are invalid';
        }
        
        if ($_POST['vitality'] < 0 || !filter_var($_POST['vitality'], FILTER_VALIDATE_INT))
        {
            $errors = 1;
            $msg .= 'Vitality points are invalid';
        }
        
        if ($_POST['agility'] < 0 || !filter_var($_POST['agility'], FILTER_VALIDATE_INT))
        {
            $errors = 1;
            $msg .= 'Agility points are invalid';
        }
        
        if ($_POST['dexterity'] < 0 || !filter_var($_POST['dexterity'], FILTER_VALIDATE_INT))
        {
            $errors = 1;
            $msg .= 'Dexterity points are invalid';
        }
        
        if ($_POST['damage'] < 0 || !filter_var($_POST['damage'], FILTER_VALIDATE_INT))
        {
            $errors = 1;
            $msg .= 'Damage points are invalid';
        }
        
        if ($_POST['kills'] < 0 || !filter_var($_POST['kills'], FILTER_VALIDATE_INT))
        {
            $errors = 1;
            $msg .= 'Kill points are invalid';
        }
        
        if ($_POST['deaths'] < 0 || !filter_var($_POST['deaths'], FILTER_VALIDATE_INT))
        {
            $errors = 1;
            $msg .= 'Death points are invalid';
        }
        
        //The form wasn't filled out correctly
        if ($errors == 1)
        {
            $member->email = $_POST['email'];
            $member->rank = $_POST['rank'];
            $member->money = $_POST['money'];
            $member->level = $_POST['level'];
            $member->stat_points = $_POST['stat_points'];
            $member->strength = $_POST['strength'];
            $member->vitality = $_POST['vitality'];
            $member->agility = $_POST['agility'];
            $member->dexterity = $_POST['dexterity'];
            $member->damage = $_POST['damage'];
            $member->kills = $_POST['kills'];
            $member->deaths = $_POST['deaths'];
            
            $this->tpl->assign('member', $member);
            $this->tpl->assign('GET_MSG', $msg);
            $this->tpl->display('admin/members_edit.tpl');
            exit;
        }
        else
        {
            //No errors, update player info
            $query = $this->db->execute('UPDATE `<ezrpg>players` SET `email`=?, `rank`=?, `money`=?, `level`=?, `stat_points`=?, `strength`=?, `vitality`=?, `agility`=?, `dexterity`=?, `damage`=?, `kills`=?, `deaths`=? WHERE `id`=?', array($_POST['email'], $_POST['rank'], $_POST['money'], $_POST['level'], $_POST['stat_points'], $_POST['strength'], $_POST['vitality'], $_POST['agility'], $_POST['dexterity'], $_POST['damage'], $_POST['kills'], $_POST['deaths'], $member->id));
            
            $msg = 'You have updated the player\'s info.';
            header('Location: index.php?mod=Members&msg=' . urlencode($msg));
            exit;
        }
    }
    
    /*
      Function: deleteMember
      Deletes a member from the database. Asks for confirmation first.
    */
    private function deleteMember()
    {
        $member = $this->db->fetchRow('SELECT `id`, `username` FROM `<ezrpg>players` WHERE `id`=?', array($_GET['id']));
        
        if ($member == false)
        {
            header('Location: index.php?mod=Members');
            exit;
        }
        
        if ($member->id == $this->player->id)
        {
            //Cannot delete self
            $msg = 'You cannot delete yourself!';
            header('Location: index.php?mod=Members&msg=' . urlencode($msg));
            exit;
        }
        
        if (!isset($_POST['confirm']))
        {
            $this->tpl->assign('member', $member);
            $this->tpl->display('admin/members_delete.tpl');
            exit;
        }
        else
        {
            $query = $this->db->execute('DELETE FROM `<ezrpg>players` WHERE `id`=?', array($member->id));
            $msg = 'You have deleted <strong>' . $member->username . '</strong>.';
            header('Location: index.php?mod=Members&msg=' . urlencode($msg));
            exit;
        }
    }
}
