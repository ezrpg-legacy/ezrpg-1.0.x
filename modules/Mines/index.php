<?php
defined('IN_EZRPG') or exit;

class Module_Mines extends Base_Module
{
    public function start()
    {
        requireLogin();

        if (isset($_GET['act']))
        {
            switch($_GET['act'])
            {
            case 'license':
                $this->buyLicense();
                break;
            case 'buy':
                $this->buyMines();
                break;
            case 'market':
                $this->sell();
                break;
            case 'mine':
                $this->mine();
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

    private function home()
    {
        $mines = $this->db->fetchRow('SELECT `id`, `mines`, `rocks`, `copper`, `diamonds` FROM `<ezrpg>mines` WHERE `player`=?', array($this->player->id));
        
        if ($mines == false)
        {
            $this->tpl->display('mines/mines_license.tpl');
        }
        else
        {
            $this->tpl->assign('mines', $mines->mines);
            $this->tpl->assign('rocks', $mines->rocks);
            $this->tpl->assign('copper', $mines->copper);
            $this->tpl->assign('diamonds', $mines->diamonds);

            $this->tpl->display('mines/mines.tpl');
        }
    }

    private function buyLicense()
    {
        $mines = $this->db->fetchRow('SELECT `id` FROM `<ezrpg>mines` WHERE `player`=?', array($this->player->id));

        if ($mines == false)
        {
            if ($this->player->money >= 300)
            {
                $this->db->execute('UPDATE `<ezrpg>players` SET `money`=money-300 WHERE `id`=?', array($this->player->id)); 

                $insert = array();
                $insert['player'] = $this->player->id;
                $this->db->insert('<ezrpg>mines', $insert);

                $msg = $_SESSION['You_have_bought_a_mining_license_and_your_first_mine'];
                header('Location: index.php?mod=Mines&msg=' . urlencode($msg));
                exit;
            }
            else
            {
                $msg = $_SESSION['You_do_not_have_enough_money_to_buy_a_mining_license'];
                header('Location: index.php?mod=Mines&msg=' . urlencode($msg));
                exit;
            }
        }
        else
        {
            header('Location: index.php?mod=Mines');
            exit;
        }
    }

    private function buyMines()
    {
        $mines = $this->db->fetchRow('SELECT `id`, `mines`, `rocks`, `copper`, `diamonds` FROM `<ezrpg>mines` WHERE `player`=?', array($this->player->id));
        
        if ($mines == false)
        {
            $msg = $_SESSION['You_need_to_buy_a_mining_license_first'];
            header('Location: index.php?mod=Mines&msg=' . urlencode($msg));
            exit;
        }

        //Price of buying a new mine
        $price_money = $mines->mines * 500;
        $price_rocks = $mines->mines * 100;
        $price_copper = $mines->mines * 30;
        $price_diamonds = $mines->mines * 5;

        $this->tpl->assign('price_money', $price_money);
        $this->tpl->assign('price_rocks', $price_rocks);
        $this->tpl->assign('price_copper', $price_copper);
        $this->tpl->assign('price_diamonds', $price_diamonds);

        if (isset($_GET['buy']) && $_GET['buy'] == '1')
        {
            if ($price_money > $this->player->money)
            {
                $msg = $_SESSION['You_do_not_have_enough_money_to_buy_a_new mine'];
                header('Location: index.php?mod=Mines&act=buy&msg=' . urlencode($msg));
                exit;
            }
            else if ($price_rocks > $mines->rocks)
            {
                $msg = $_SESSION['You_do_not_have_enough_rocks_to_buy_a_new_mine'];
                header('Location: index.php?mod=Mines&act=buy&msg=' . urlencode($msg));
                exit;
            }
            else if ($price_copper > $mines->copper)
            {
                $msg = $_SESSION['You_do_not_have_enough_copper_to_buy_a_new_mine'];
                header('Location: index.php?mod=Mines&act=buy&msg=' . urlencode($msg));
                exit;
            }
            else if ($price_diamonds > $mines->diamonds)
            {
                $msg = $_SESSION['You_do_not_have_enough_diamonds_to_buy_a_new mine'];
                header('Location: index.php?mod=Mines&act=buy&msg=' . urlencode($msg));
                exit;
            }
            else
            {
                //Price requirements met, update database
                $this->db->execute('UPDATE `<ezrpg>players` SET `money`=money-? WHERE `id`=?', array(intval($price_money), $this->player->id));
                $this->db->execute('UPDATE `<ezrpg>mines` SET `rocks`=rocks-?, `copper`=copper-?, `diamonds`=diamonds-?, `mines`=mines+1 WHERE `id`=?', array($price_rocks, $price_copper, $price_diamonds, $mines->id));

                $msg = $_SESSION['You_have_bought_a_new_mine'];
                header('Location: index.php?mod=Mines&act=buy&msg=' . urlencode($msg));
                exit;
            }
        }

        $this->tpl->assign('player_rocks', $mines->rocks);
        $this->tpl->assign('player_copper', $mines->copper);
        $this->tpl->assign('player_diamonds', $mines->diamonds);

        $this->tpl->display('mines/mines_buy.tpl');
    }

    private function sell()
    {
        $mines = $this->db->fetchRow('SELECT `id`, `mines`, `rocks`, `copper`, `diamonds` FROM `<ezrpg>mines` WHERE `player`=?', array($this->player->id));

        if ($mines == false)
        {
            $msg = $_SESSION['You_need_to_buy_a_mining_license_first'];
            header('Location: index.php?mod=Mines&msg=' . urlencode($msg));
            exit;
        }

        if (isset($_POST['sell']))
        {
            $rocks = max(0, intval($_POST['rocks']));
            $copper = max(0, intval($_POST['copper']));
            $diamonds = max(0, intval($_POST['diamonds']));

            $msg = '';
            $errors = 0;
            //Check if player is trying to sell more than he's got
            if ($rocks > $mines->rocks)
            {
                $errors = 1;
                $msg .= $_SESSION['You_do_not_have_many_rocks'];
            }
            if ($copper > $mines->copper)
            {
                $errors = 1;
                $msg .= $_SESSION['You_do_not_have_much_copper'];
            }
            if ($diamonds > $mines->diamonds)
            {
                $errors = 1;
                $msg .= $_SESSION['You_do_not_have_many_diamonds'];
            }

            if ($errors == 1)
            {
                header('Location: index.php?mod=Mines&act=market&msg=' . urlencode($msg));
                exit;
            }
            else
            {
                $gain = $rocks * 2 + $copper * 15 + $diamonds * 45;
                $this->db->execute('UPDATE `<ezrpg>players` SET `money`=money+? WHERE `id`=?', array(intval($gain), $this->player->id));
                $this->db->execute('UPDATE `<ezrpg>mines` SET `rocks`=rocks-?, `copper`=copper-?, `diamonds`=diamonds-? WHERE `id`=?', array($rocks, $copper, $diamonds, $mines->id));

                $msg = $_SESSION['You_have_sold_your_minerals_for'] . $gain . $_SESSION['money'];
                header('Location: index.php?mod=Mines&act=market&msg=' . urlencode($msg));
                exit;
            }
        }

        $this->tpl->assign('rocks', $mines->rocks);
        $this->tpl->assign('copper', $mines->copper);
        $this->tpl->assign('diamonds', $mines->diamonds);

        $this->tpl->display('mines/mines_sell.tpl');
    }

    private function mine()
    {
        $mines = $this->db->fetchRow('SELECT `id`, `mines`, `rocks`, `copper`, `diamonds` FROM `<ezrpg>mines` WHERE `player`=?', array($this->player->id));

        if ($mines == false)
        {
            $msg = $_SESSION['You_need_to_buy_a_mining_license_first'];
            header('Location: index.php?mod=Mines&msg=' . urlencode($msg));
            exit;
        }

        if ($this->player->energy < 1)
        {
            $msg = $_SESSION['You_do_not_have_enough_energy_to_mine'];
            header('Location: index.php?mod=Mines&msg=' . urlencode($msg));
            exit;
        }

        $gain_rocks = $mines->mines * rand(0, 10);
        $gain_copper = $mines->mines * rand(0, 3);
        $gain_diamonds = 0;
        //1 in 5 chance of getting between 0 and 2 diamonds
        if (rand(1,5) == 1)
            $gain_diamonds = $mines->mines * rand(0, 2);

        $this->db->execute('UPDATE `<ezrpg>players` SET `energy`=energy-1 WHERE `id`=?', array($this->player->id));
        $this->db->execute('UPDATE `<ezrpg>mines` SET `rocks`=rocks+?, `copper`=copper+?, `diamonds`=diamonds+? WHERE `id`=?', array($gain_rocks, $gain_copper, $gain_diamonds, $mines->id));

        $this->tpl->assign('gain_rocks', $gain_rocks);
        $this->tpl->assign('gain_copper', $gain_copper);
        $this->tpl->assign('gain_diamonds', $gain_diamonds);
        $this->tpl->display('mines/mines_mine.tpl');
    }

    private function install()
    {
        requireAdmin($this->player);

        $create_table = <<<SQL
CREATE TABLE  `<ezrpg>mines` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`player` INT UNSIGNED NOT NULL ,
`mines` INT UNSIGNED NOT NULL DEFAULT  '1',
`rocks` INT UNSIGNED NOT NULL DEFAULT  '0',
`copper` INT UNSIGNED NOT NULL DEFAULT  '0',
`diamonds` INT UNSIGNED NOT NULL DEFAULT  '0',
PRIMARY KEY (  `id` ) ,
UNIQUE (`player`)
) ENGINE = INNODB;
SQL;
        $this->db->execute($create_table);
        
        $msg = 'You have installed Mines.';
        header('Location: index.php?mod=Mines&msg=' . urlencode($msg));
        exit;
    }

    private function uninstall()
    {
        requireAdmin($this->player);

        $this->db->execute('DROP TABLE IF EXISTS `<ezrpg>mines`');

        $msg = 'You have uninstalled Mines.';
        header('Location: index.php?msg=' . urlencode($msg));
        exit;
    }
}
?>
