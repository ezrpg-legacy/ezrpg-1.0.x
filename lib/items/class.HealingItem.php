<?php
defined('IN_EZRPG') or exit;

/*
  Class: HealingItem
  Item will heal the player's HP and then delete itself (one-use item)
*/
class HealingItem extends BaseItem
{
    public function __construct(&$db, $row)
    {
        parent::__construct($db, $row);
    }

    /*
      $this->value1 is minimum amount to heal
      $this->value2 is maximum amount to heal
      Other values are unused
    */
    public function useItem()
    {
        $heal_amount = rand($this->value1, $this->value2);

        //Update player's health
        $this->db->execute('UPDATE `<ezrpg>players` SET `hp`=hp+? WHERE `id`=?', array($heal_amount, $this->player));

        //Delete self
        $this->db->execute('DELETE FROM `<ezrpg>items` WHERE `id`=?', array($this->id));

        return 'You were healed for <strong>' . $heal_amount . '</strong> HP!';
    }

    public function useType()
    {
        return "Heal";
    }

    public function getDescription()
    {
        $desc = 'Heals: ' . $this->value1 . '-' . $this->value2 . ' HP';
        return $desc;
    }
}