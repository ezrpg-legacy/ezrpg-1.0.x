<?php
defined('IN_EZRPG') or exit;

require_once(LIB_DIR . '/class.items.php');

class Module_Items extends Base_Module
{
    public function start()
    {
        //Require login
        requireLogin();

        if (isset($_GET['act']))
        {
            switch($_GET['act'])
            {
            case 'use':
                $this->useItem();
                break;
            case 'install':
                $this->install();
                break;
            case 'uninstall':
                $this->uninstall();
                break;
            default:
                $this->home();
                break;
            }
        }
        else
        {
            $this->home();
        }
    }

    //Show player's items
    private function home()
    {
        $items = ItemDatabase::getByPlayer($this->db, $this->player->id);
        
        $this->tpl->assign('items', $items);
        $this->tpl->display('items.tpl');
    }

    private function useItem()
    {
        $item = ItemDatabase::getByID($this->db, $_GET['id']);
        if ($item == false)
        {
            $msg = 'That item doesn\'t exist!';
            header('Location: index.php?mod=Items&msg=' . urlencode($msg));
            exit;
        }

        if ($item->player != $this->player->id)
        {
            $msg = 'That item doesn\'t belong to you!';
            header('Location: index.php?mod=Items&msg=' . urlencode($msg));
            exit;
        }

        $msg = $item->useItem();
        header('Location: index.php?mod=Items&msg=' . urlencode($msg));
        exit;
    }

    private function install()
    {
        requireAdmin($this->player);
        
        $table_prefix = DB_PREFIX;
        $create_table = <<<SQL
CREATE TABLE IF NOT EXISTS `<ezrpg>items` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`class` VARCHAR( 50 ) NOT NULL ,
`player` INT UNSIGNED NOT NULL ,
`name` VARCHAR( 50 ) NOT NULL ,
`value1` INT NOT NULL ,
`value2` INT NOT NULL ,
`value3` INT NOT NULL ,
`value4` INT NOT NULL ,
`value5` INT NOT NULL ,
INDEX (  `player` )
) ENGINE = INNODB ;
SQL;
        $this->db->execute($create_table);

        //Insert test items
        
        $insert = array();
        $insert['player'] = $this->player->id;
        $insert['class'] = 'HealingItem';
        $insert['name'] = 'Healing Potion';
        $insert['value1'] = 5;
        $insert['value2'] = 10;
        $insert['value3'] = 0;
        $insert['value4'] = 0;
        $insert['value5'] = 0;

        $this->db->insert('<ezrpg>items', $insert);
        unset($insert);


        $insert = array();
        $insert['player'] = $this->player->id;
        $insert['class'] = 'MultiHealingItem';
        $insert['name'] = 'Large Healing Potion';
        $insert['value1'] = 10;
        $insert['value2'] = 50;
        $insert['value3'] = 5;
        $insert['value4'] = 0;
        $insert['value5'] = 0;

        $this->db->insert('<ezrpg>items', $insert);
        unset($insert);

        $insert = array();
        $insert['player'] = $this->player->id;
        $insert['class'] = 'WeaponItem';
        $insert['name'] = 'Simple Sword';
        $insert['value1'] = 0;
        $insert['value2'] = 0;
        $insert['value3'] = 0;
        $insert['value4'] = 5;
        $insert['value5'] = 0;

        $this->db->insert('<ezrpg>items', $insert);
        unset($insert);


        $insert = array();
        $insert['player'] = $this->player->id;
        $insert['class'] = 'WeaponItem';
        $insert['name'] = 'Special Sword';
        $insert['value1'] = 10;
        $insert['value2'] = 5;
        $insert['value3'] = 5;
        $insert['value4'] = 10;
        $insert['value5'] = 0;

        $this->db->insert('<ezrpg>items', $insert);
        unset($insert);

        $msg = 'You have installed Items.';
        header('Location: index.php?mod=Items&msg=' . urlencode($msg));
        exit;
    }


    private function uninstall()
    {
        requireAdmin($this->player);

        $this->db->execute('DROP TABLE IF EXISTS `<ezrpg>items`');

        $msg = 'You have uninstalled Items.';
        header('Location: index.php?msg=' . urlencode($msg));
        exit;
    }
}