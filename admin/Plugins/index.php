<?php
defined('IN_EZRPG') or exit;
require_once (LIB_DIR . '/pclzip.lib.php');
/*
  Class: Admin_Plugins
  Admin page for managing plugins and modules
*/
class Admin_Plugins extends Base_Module
{
    /*
      Function: start
      Displays the list of modules/plugins.
    */
    public function start() {
  
        if(isset($_GET['act'])){
			switch ($_GET['act']) {
				case 'view' :
					$this->view_modules();
					break;
				case 'upload' :
					$this->upload_modules();
					break;
				case 'remove' :
					$this->remove_modules();
					break;
				case 'install' :
					$this->install_manager();
					break;
				case 'list' :
					$this->list_modules();
					break;
			}
		} else {
		$this->install_ask();
		}
    }
    
    private function list_modules() {
		$query = $this->db->execute('select * from ' . DB_PREFIX . 'plugins');
		$plugins = Array();
		while ($m = $this->db->fetch($query)) {
			$plugins[] = $m;
		}
		$this->tpl->assign("plugins", $plugins);
		$this->tpl->display('admin/plugins.tpl');
	}
    private function upload_modules() {
		if(isset($_FILES['file'])){
			if ($_FILES["file"]["error"] > 0)
			{
				$this->tpl->assign("MSG", "Error: " . $_FILES["file"]["error"]);
				$this->tpl->display('admin/upload_plugins.tpl');
			}
			else
			{
				if($_FILES["file"]["type"] == "application/x-zip-compressed")
				{
					$zip = new PclZip($_FILES["file"]["tmp_name"]);
					$ziptempdir = substr(uniqid ('', true), -5);
					$dir = "Plugins/temp/" . $ziptempdir;
					$results = "";
					if ($zip->extract(PCLZIP_OPT_PATH, $dir ) == 0) {
						$results .= "Error : ".$zip->errorInfo(true);
					}
					$results .= "Plugin extracted to ". $dir . "<br />";
					if(file_exists($dir ."/".  pathinfo($_FILES['file']['name'], PATHINFO_FILENAME) .".xml"))
					{
						$results .= "this is a proper module/plugin. <br />";
						$plug = simplexml_load_file($dir ."/".  pathinfo($_FILES['file']['name'], PATHINFO_FILENAME) .".xml");
						$p_m['n'] = $plug->Module->Name;
						$p_m['v'] = $plug->Module->Version;
						$p_m['a'] = $plug->Module->Author;
						$p_m['s'] = $plug->Module->AuthorSite;
						$p_m['d'] = $plug->Module->Description;
						$p_m['i'] = $plug->Module->InstallCode;
						$this->db->execute("insert into ". DB_PREFIX ."plugins (title, description, author, authorsite, active, version, xml_location) values ('".$p_m['n']."', '".$p_m['d']."', '".$p_m['a']."', '".$p_m['s']."', 0, '".$p_m['v']."', 'modules/". pathinfo($_FILES['file']['name'], PATHINFO_FILENAME) .".xml')");
						$results .= "installed db data <br />";
						$this->re_copy($dir, CUR_DIR);
						rename(CUR_DIR . "/" .pathinfo($_FILES['file']['name'], PATHINFO_FILENAME) .".xml", MOD_DIR ."/" .pathinfo($_FILES['file']['name'], PATHINFO_FILENAME) .".xml");
						$this->rrmdir($dir);
						$results .= "You have successfully installed a plugin via the manager! <br />";
						$results .= "<a href='index.php?mod=Plugins'><input name='login' type='submit' class='button' value='Back To Manager' /></a> OR <a href='../". $p_m['i'] ."'><input name='login' type='submit' class='button' value='Install Plugin' /></a>";
					}else{
					    $results .= $dir ."/". pathinfo($_FILES['file']['name'], PATHINFO_FILENAME) .".xml was not found <br />";
						$results .= "this is not a proper module/plugin. <br />";
						$this->rrmdir($dir);
						$results .= "all temporary files have been deleted. <br />";
						$results .= "<a href='index.php?mod=Plugins'><input name='login' type='submit' class='button' value='Back To Manager' /></a>";
					}
				} else {
				$results = "Upload: " . $_FILES["file"]["name"] . "<br>";
				$results .= "Type: " . $_FILES["file"]["type"] . "<br>";
				$results .= "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
				$results .= "Stored in: " . $_FILES["file"]["tmp_name"];
				}
				$this->tpl->assign("RESULTS", $results);
				$this->tpl->display('plugin_results.tpl');
			}
		} else {
		$this->tpl->display('admin/upload_plugins.tpl');
		}
	}
	private function install_manager() {
		$results = "Installing DB tables... <br />";
		$this->db->debug = true;
		$this->db->execute("CREATE TABLE IF NOT EXISTS `". DB_PREFIX ."plugins` (
			`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			`title` varchar(255) NOT NULL,
			`description` text NOT NULL,
			`author` varchar(255) NOT NULL,
			`authorsite` varchar(255) NOT NULL,
			`active` tinyint(1) NOT NULL DEFAULT '1',
			`version` float NOT NULL,
			`xml_location` text NOT NULL,
			UNIQUE KEY id (id)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8;");
			
			$query = $this->db->execute('select * from ' . DB_PREFIX . 'plugins where `id` =1');
			$res = Array();
		while ($m = $this->db->fetch($query)) {
			$res[] = $m;
		}
		if($res[0]->id == 1) {
		header('location: index.php?mod=Plugins&act=list');
		exit;
		}
		$results .= "Done. <br />Adding Plugin Manager DB<br />";
		$this->db->execute("insert into ". DB_PREFIX ."plugins (id, title, description, author, active, version, xml_location) values (1, 'ezRPG PluginManager', 'Plugin Manager Beta', 'Tim G', 1, '0.01', '" . CUR_DIR . "/Plugins/plugin.xml')");
		$results .= "Done. <br />";
		$results .= "<a href='index.php?mod=Plugins&act=list'>Go To Manager</a>";
		//$this->db->debug = false;
		$this->tpl->assign("RESULTS", $results);
		$this->tpl->display('admin/plugin_results.tpl');
	}
  private function install_ask() {
    $this->tpl->assign('INSTALLED', FALSE);
    $this->tpl->display('admin/plugins.tpl');
  }

	private function rrmdir($dir) { 
		if (is_dir($dir)) { 
			$objects = scandir($dir); 
			foreach ($objects as $object) { 
				if ($object != "." && $object != "..") { 
					if (filetype($dir."/".$object) == "dir") $this->rrmdir($dir."/".$object); else unlink($dir."/".$object); 
				} 
			} 
			reset($objects); 
			rmdir($dir); 
		} 
	}
	function re_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                $this->re_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 
}
