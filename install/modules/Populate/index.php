<?php
class Install_Populate extends InstallerFactory
{
	function start(){
		require_once "../config.php";
		try
		{
			$db = DbFactory::factory($config_driver, $config_server, $config_username, $config_password, $config_dbname);
		}
		catch (DbException $e)
		{
			$e->__toString();
		}
		
		$query1 = <<<QUERY
CREATE TABLE IF NOT EXISTS `<ezrpg>players` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `username` varchar(30) default NULL,
  `password` varchar(40) default NULL,
  `email` varchar(255) default NULL,
  `secret_key` text,
  `rank` smallint(5) unsigned NOT NULL default '1',
  `registered` int(11) unsigned default NULL,
  `last_active` int(11) unsigned default '0',
  `last_login` int(11) unsigned default '0',
  `money` int(11) unsigned default '100',
  `level` int(11) unsigned default '1',
  `stat_points` int(11) unsigned default '10',
  `exp` int(11) unsigned default '0',
  `max_exp` int(11) unsigned default '10',
  `hp` int(11) unsigned default '20',
  `max_hp` int(11) unsigned default '20',
  `energy` int(11) unsigned NOT NULL default '10',
  `max_energy` int(11) unsigned NOT NULL default '10',
  `strength` int(11) unsigned default '5',
  `vitality` int(11) unsigned default '5',
  `agility` int(11) unsigned default '5',
  `dexterity` int(11) unsigned default '5',
  `damage` int(11) unsigned default '0',
  `kills` int(11) unsigned NOT NULL default '0',
  `deaths` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
QUERY;
        $db->execute($query1);
            
        $query2 = <<<QUERY
CREATE TABLE IF NOT EXISTS `<ezrpg>player_log` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `player` int(11) unsigned NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `player_log` (`player`,`time`),
  KEY `new_logs` (`player`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
QUERY;
		$db->execute($query2);
		$this->header();
		echo "<h2>The database has been populated.</h2>\n";
		echo "<a href=\"index.php?step=CreateAdmin\">Continue to next step</a>";
		$this->footer();
	}
}
?>
