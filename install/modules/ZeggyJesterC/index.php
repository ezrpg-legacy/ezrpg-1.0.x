<?php
class Install_ZeggyJesterC extends InstallerFactory
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
		
    $query4 = <<<QUERY
CREATE TABLE IF NOT EXISTS `<ezrpg>mail` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`to` VARCHAR( 50 ) NOT NULL ,
`from` VARCHAR( 50 ) NOT NULL ,
`subject` VARCHAR( 45 ) NOT NULL ,
`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`isread` INT( 1 ) NOT NULL ,
`message` VARCHAR( 5000 ) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
QUERY;
		$db->execute($query4);    
        
		$this->header();
		echo "<h2>The database for additional plugins has been created.</h2>\n";
		echo "<a href=\"index.php?step=ForumLang\">Continue to next step</a>";
		$this->footer();
	}
}
?>
