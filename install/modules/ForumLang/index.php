<?php
class Install_ForumLang extends InstallerFactory
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
CREATE TABLE  `<ezrpg>settings` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `title` varchar(120) NOT NULL,
  `description` text,
  `optionscode` text,
  `value` text,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
QUERY;
        $db->execute($query1);
    
          $query2 = <<<QUERY
CREATE TABLE IF NOT EXISTS `<ezrpg>forum_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
QUERY;
		$db->execute($query2);
    
    $query3 = <<<QUERY
CREATE TABLE IF NOT EXISTS `<ezrpg>forum_mes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_top` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `poster` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
QUERY;
    $db->execute($query3);
    
    $query4 = <<<QUERY
CREATE TABLE IF NOT EXISTS `<ezrpg>forum_top` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `starter` varchar(15) NOT NULL,
  `title` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `date` int(11) NOT NULL,
  `topic` enum('ON','OFF') NOT NULL DEFAULT 'ON',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
QUERY;
		$db->execute($query4);    

        $data1 = <<<QUERY
INSERT INTO `<ezrpg>settings` (`id`, `name`, `title`, `description`, `optionscode`, `value`) VALUES
(1, 'game_name', 'Untitled', 'The title for your game', 'version', '0.0.1'),
(2, 'core_name', 'ezRPG', 'The title for your core', 'version', '1.0.7 lang'),
(3, 'english', 'English', NULL, 'language', 'English'),
(4, 'deutsch', 'Deutsch', NULL, 'language', 'Deutsch'),
(5, 'russian', 'Russian', NULL, 'language', 'Russian');
QUERY;

        $db->execute($data1);
        
		$this->header();
		echo "<h2>The database has been ForumLang.</h2>\n";
		echo "<a href=\"index.php?step=CreateAdmin\">Continue to next step</a>";
		$this->footer();
	}
}
?>
