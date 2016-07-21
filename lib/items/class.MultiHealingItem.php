<?php
defined('IN_EZRPG') or exit;

/*
  Class: MultiHealingItem
  Item will heal the player's HP, then delete itself after a limited number of uses
*/
class MultiHealingItem extends BaseItem
{
    public function __construct(&$db, $row)
    {
        parent::__construct($db, $row);
    }

    /*
      $this->value1 is minimum amount to heal
      $this->value2 is maximum amount to heal
      $this->value3 is number of uses left
      Other values are unused
    */
    public function useItem()
    {
        $heal_amount = rand($this->value1, $this->value2);

        //Update player's health
        $this->db->execute('UPDATE `<ezrpg>players` SET `hp`=hp+? WHERE `id`=?', array($heal_amount, $this->player));

        if (--$this->value3 == 0)
        {
            //Delete self
            $this->db->execute('DELETE FROM `<ezrpg>items` WHERE `id`=?', array($this->id));
        }
        else
        {
            $this->db->execute('UPDATE `<ezrpg>items` SET `value3`=value3-1 WHERE `id`=?', array($this->id));
        }

        return 'You were healed for <strong>' . $heal_amount . '</strong> HP!';
    }

    public function useType()
    {
        return "Heal";
    }

    public function getDescription()
    {
        $desc = 'Heals: ' . $this->value1 . '-' . $this->value2 . ' HP (' . $this->value3 . ' uses left)';
        return $desc;
    }
}