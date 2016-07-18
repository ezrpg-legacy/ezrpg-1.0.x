<?php
defined('IN_EZRPG') or exit;

/*
  Class: ItemDatabase
  Used to fetch an item from the database given an item ID.

 Returns: Instance of a subclass of BaseItem (an object of the item's class)
*/
class ItemDatabase
{
    public static function getByID(&$db, $id)
    {
        $row = $db->fetchRow('SELECT * FROM `<ezrpg>items` WHERE `id`=?', array($id));

        if ($row == false) {
            return false;
        } else {
            return new $row->class($db, $row);
        }
    }

    public static function getByPlayer(&$db, $player)
    {
        $query = $db->execute('SELECT * FROM `<ezrpg>items` WHERE `player`=?', array($player));
        $items = $db->fetchAll($query);

        $itemObjects = array();
        foreach ($items as $item)
        {
            $itemObjects[] = new $item->class($db, $item);
        }

        return $itemObjects;
    }
}


//Include all the item types
//Remember to include new item types here
require_once(LIB_DIR . '/items/class.BaseItem.php');
require_once(LIB_DIR . '/items/class.HealingItem.php');
require_once(LIB_DIR . '/items/class.MultiHealingItem.php');
require_once(LIB_DIR . '/items/class.WeaponItem.php');