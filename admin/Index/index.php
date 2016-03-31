<?php
defined('IN_EZRPG') or exit;

/*
  Class: Admin_Index
  Home page for the admin panel.
*/
class Admin_Index extends Base_Module
{
    /*
      Function: start
      Displays admin/index.tpl
    */
    public function start()
    {
        $this->listAdminModules();
        $this->tpl->display('admin/index.tpl');
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

}
?>