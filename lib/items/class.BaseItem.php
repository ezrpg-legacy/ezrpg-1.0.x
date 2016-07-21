<?php
defined('IN_EZRPG') or exit;

abstract class BaseItem
{
    protected $db;
    protected $row;

    public $id;
    public $player;
    protected $name;
    public $value1;
    public $value2;
    public $value3;
    public $value4;
    public $value5;

    public function __construct(&$db, $row)
    {
        $this->db = $db;

        $this->id = $row->id;
        $this->player = $row->player;
        $this->name = $row->name;
        $this->value1 = $row->value1;
        $this->value2 = $row->value2;
        $this->value3 = $row->value3;
        $this->value4 = $row->value4;
        $this->value5 = $row->value5;
    }

    //Item classes must implement this function
    //This function performs the item's action/effect such as healing, damage bonus, etc
    public abstract function useItem();

    //This function should return a string indicating the item's 'verb'
    //Example: 'Heal' for healing items, 'Equip'/'Unequip' for equipment
    //The verb will be displayed under the item as "Use: <verb>"
    public abstract function useType();

    //A printable description of the item's stats
    public abstract function getDescription();

    /*
      Return the name of the item.
      Could be useful for some item types that have special name prefixes/suffixes
    */
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        
        return $this->db->execute('UPDATE `<ezrpg>items` SET `name`=? WHERE `id`=?', array($name, $this->id));
    }
}