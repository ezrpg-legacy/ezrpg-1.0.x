<?php
class Install_Zeggy extends InstallerFactory
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
CREATE TABLE  `<ezrpg>mines` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `player` INT UNSIGNED NOT NULL ,
  `mines` INT UNSIGNED NOT NULL DEFAULT  '1',
  `rocks` INT UNSIGNED NOT NULL DEFAULT  '0',
  `copper` INT UNSIGNED NOT NULL DEFAULT  '0',
  `diamonds` INT UNSIGNED NOT NULL DEFAULT  '0',
  PRIMARY KEY  (`id`),
  UNIQUE (`player`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
QUERY;
        $db->execute($query1);
    
          $query2 = <<<QUERY
CREATE TABLE IF NOT EXISTS `<ezrpg>bots` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) default NULL,
  `level` int(11) unsigned NOT NULL,
  `health` int(11) unsigned NOT NULL,
  `damage` int(11) unsigned NOT NULL,
  `exp` int(11) unsigned NOT NULL,
  `money` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
QUERY;
		$db->execute($query2);
    
    $query3 = <<<QUERY
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
QUERY;
    $db->execute($query3);
        
		$this->header();
		echo "<h2>The database has been zeggy.</h2>\n";
		echo "<a href=\"index.php?step=CreateAdmin\">Continue to next step</a>";
		$this->footer();
	}
}
?>
