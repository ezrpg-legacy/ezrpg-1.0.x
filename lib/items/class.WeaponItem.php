<?php
defined('IN_EZRPG') or exit;

/*
  Class: WeaponItem
  Item will add to the player's stats when equipped, and remove the bonus stats when unequipped.
*/
class WeaponItem extends BaseItem
{
    public function __construct(&$db, $row)
    {
        parent::__construct($db, $row);
    }

    /*
      $this->value1 is strength bonus
      $this->value2 is agility bonus
      $this->value3 is dexterity bonus
      $this->value4 is damage bonus
      $this->value5 is equipped/unequipped boolean
    */
    public function useItem()
    {
        //Get currently equipped weapon
        $item = $this->db->fetchRow('SELECT `value1`, `value2`, `value3`, `value4` FROM `<ezrpg>items` WHERE `value5`=1 AND `player`=? AND `class`=\'WeaponItem\'', array($this->player));
        if ($item !== false)
        {
            $this->db->execute('UPDATE `<ezrpg>players` SET `strength`=strength-?, `agility`=agility-?, `dexterity`=dexterity-?, `damage`=damage-? WHERE `id`=?', array($item->value1, $item->value2, $item->value3, $item->value4, $this->player));
        }

        //Unequip all weapons
        $this->db->execute('UPDATE `<ezrpg>items` SET `value5`=0 WHERE `value5`=1 AND `player`=? AND `class`=\'WeaponItem\'', array($this->player));

        if ($this->value5 == 0)
        {
            //Equip this item
            $this->db->execute('UPDATE `<ezrpg>items` SET `value5`=1 WHERE `id`=?', array($this->id));

            //Add to player stats
            $this->db->execute('UPDATE `<ezrpg>players` SET `strength`=strength+?, `agility`=agility+?, `dexterity`=dexterity+?, `damage`=damage+? WHERE `id`=?', array($this->value1, $this->value2, $this->value3, $this->value4, $this->player));
        }
    }

    public function useType()
    {
        if ($this->value5 == 0)
        {
            return "Equip";
        }
        else
        {
            return "Unequip";
        }
    }

    public function getDescription()
    {
      /*       
        $desc = 'Status: <strong>';
        if ($this->value5 == 0)
        {
            $desc .= 'Unequipped';
        }
        else
        {
            $desc .= 'Equipped';
        }
        $desc .= '</strong>';
      */
        
        //Show weapon stat bonuses
        if ($this->value1 > 0)
        {
            $desc .= 'Strength: <strong>+' . $this->value1 . '</strong><br />';
        }
        if ($this->value2 > 0)
        {
            $desc .= 'Agility: <strong>+' . $this->value2 . '</strong><br />';
        }
        if ($this->value3 > 0)
        {
            $desc .= 'Dexterity: <strong>+' . $this->value3 . '</strong><br />';
        }
        if ($this->value4 > 0)
        {
            $desc .= 'Damage: <strong>+' . $this->value4 . '</strong><br />';
        }
        return $desc;
    }
}