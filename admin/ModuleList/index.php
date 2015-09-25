<?php
defined('IN_EZRPG') or exit;

/*
	Class: Modules_List
	Admin page for managing and accessing modules
*/
class Admin_ModuleList extends Base_Module
{
	/*
		Function: start
		Displays the list of Modules
	*/
	public function start()
	{
		$this->listAdminModules();
		$this->listGameModules();
		
		$this->tpl->display('admin/modulelist.tpl');
	}
	
	/*
		Function: listAdminModules
		Grabs and displays a list of modules.
	*/
	private function listAdminModules()
	{
		// Grab all files and directories in the modules folder
		$scan = scandir('../admin');
		
		// Check if there are any modules present
		$modules = array();
		$modulesInfo = array();
		foreach($scan AS $module)
		{
			if(is_dir("../admin/" . $module) && $module !== "." && $module !== "..")
			{
				$modules[] = $module;
				
				// Check if any of the modules has a Module_Info.txt file.
				if(fopen("../admin/" . $module . "/Module_Info.txt", "r") != false) {
					// Okay, let's parse the file
					$contents = file_get_contents("../admin/" . $module . "/Module_Info.txt");
					$contents = explode(":", $contents);
					
					$modulesInfo[] = array("name" => "<a href='index.php?mod=" . $module . "'>" . $contents[2] . "</a>", "ver" => $contents[4], "desc" => $contents[6], "author" => $contents[8]);
				} else {
					$modulesInfo[] = array("name" => "<a href='index.php?mod=" . $module . "'>" . $module . "</a>", "ver" => "?", "desc" => "No Info File", "author" => "Unknown");
				}
			}
		}
		
		$this->tpl->assign('adminModules', $modulesInfo);
	}
	
	/*
		Function: listGameModules
		Grabs and displays a list of modules.
	*/
	private function listGameModules()
	{
		// Grab all files and directories in the modules folder
		$scan = scandir('../modules');
		
		// Check if there are any modules present
		$modules = array();
		$modulesInfo = array();
		foreach($scan AS $module)
		{
			if(is_dir("../modules/" . $module) && $module !== "." && $module !== "..")
			{
				$modules[] = $module;
				
				// Check if any of the modules has a Module_Info.txt file.
				if(fopen("../modules/" . $module . "/Module_Info.txt", "r") != false) {
					// Okay, let's parse the file
					$contents = file_get_contents("../modules/" . $module . "/Module_Info.txt");
					$contents = explode(":", $contents);
					
					$modulesInfo[] = array("name" => $contents[2], "ver" => $contents[4], "desc" => $contents[6], "author" => $contents[8]);
				} else {
					$modulesInfo[] = array("name" => $module, "ver" => "?", "desc" => "No Module_Info.txt File", "author" => "Unknown");
				}
			}
		}
		
		$this->tpl->assign('gameModules', $modulesInfo);
	}
}
?>