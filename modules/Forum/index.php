<?php
defined('IN_EZRPG') or exit;




//  Funktion zum Einbinden von URLs
function do_bbcode_url ($action, $attributes, $content, $params, $node_object) {
    if (!isset ($attributes['default'])) {
        $url = $content;
        $text = htmlspecialchars ($content);
    } else {
        $url = $attributes['default'];
        $text = $content;
    }
    if ($action == 'validate') {
        if (substr ($url, 0, 5) == 'data:' || substr ($url, 0, 5) == 'file:'
          || substr ($url, 0, 11) == 'javascript:' || substr ($url, 0, 4) == 'jar:') {
            return false;
        }
        return true;
    }
    return '<a href="'.htmlspecialchars ($url).'">'.$text.'</a>';
}



// Funktion zum Einbinden von Bildern
function do_bbcode_img ($action, $attributes, $content, $params, $node_object) {
    if ($action == 'validate') {
        if (substr ($content, 0, 5) == 'data:' || substr ($content, 0, 5) == 'file:'
          || substr ($content, 0, 11) == 'javascript:' || substr ($content, 0, 4) == 'jar:') {
            return false;
        }
        return true;
    }
    return '<img src="'.htmlspecialchars($content).'" alt="">';
}






class Module_Forum extends Base_Module
{
    public function start()
    {
        requireLogin();
		
        
        if($this->player->ban_forum == 1)
			{
				$msg = 'Du wurdest aus den Forum verbant!';
				header('Location: index.php?msg=' . urlencode($msg));
				exit;
			} 
        
        
		if (isset($_GET['act']))
        {
            switch($_GET['act'])
            {
            case 'cat':
                $this->cat();
                break;
			case 'topic':
                $this->topic();
                break;
			case 'createTopic':
                $this->createTopic();
                break;
			case 'addTopic':
                $this->addTopic();
                break;
			case 'read':
                $this->read();
                break;
			case 'addReply':
                $this->addReply();
                break;
            case 'deltopic':
                $this->deltopic();
                break;    
            case 'topicon':
                $this->topicon();
                break;    
            case 'topicoff':
                $this->topicoff();
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
        $query = $this->db->execute('SELECT * FROM `<ezrpg>forum_cat` ORDER BY `title` ASC');
        
        $count = Array();
        $data = Array();
        $owner = Array();
        $topid = Array();
        $title = Array();
        $forumCats = Array();
        
        while ($b = $this->db->fetch($query))
        {
        $forumCats[] = $b;

        //anzahl der topic
        $counter1 = $this->db->fetchRow('SELECT COUNT(`id`) AS `count` FROM `<ezrpg>forum_top`WHERE `id_cat`=?', array($b->id));
        $counter = $counter1->count;
        $count[$b->id] = $counter;
        
        //Letzter eintrag 
        $daten1 = $this->db->fetchRow('SELECT * FROM `<ezrpg>forum_mes` WHERE `id_cat`=? ORDER BY `date` DESC', array($b->id));
        $daten2 = $this->db->fetchRow('SELECT * FROM `<ezrpg>forum_top` WHERE `id_cat`=? ORDER BY `date` DESC', array($b->id));
        
        if($daten1 == True)
        {
        $data[$b->id] = $daten1->date;
        $owner[$b->id] = $daten1->poster;
        $topid[$b->id] = $daten2->id;
        $title[$b->id] = $daten2->title;
        }
        else
        {
        $data[$b->id] = $daten2->date;
        $owner[$b->id] = $daten2->starter;
        $topid[$b->id] = $daten2->id;
        $title[$b->id] = $daten2->title;
	    }
        
        
        }
        
        $this->tpl->assign('topid', $topid);
        $this->tpl->assign('owner', $owner);
        $this->tpl->assign('count', $count);
        $this->tpl->assign('data', $data);
        $this->tpl->assign('title', $title);
		$this->tpl->assign('forumCats', $forumCats);
		$this->tpl->display('forum/forum_cat.tpl');
    }
	
	private function cat()
    {
		if(isset($_GET['act']) && $_GET['act'] == "cat")
		{
			$query = $this->db->execute('SELECT * FROM `<ezrpg>forum_top` WHERE `id_cat`=? ORDER BY `id` DESC', array($_GET['id']));
			$forumTops = $this->db->fetchAll($query);
			
			$this->tpl->assign('forumTops', $forumTops);
			$this->tpl->display('forum/forum_top.tpl');
		}
    }
	
	private function createTopic()
    {
		if(isset($_GET['act']) && $_GET['act'] == "createTopic")
		{
			$query = $this->db->execute('SELECT * FROM `<ezrpg>forum_cat` ORDER BY `title` ASC');
			$forumCat = $this->db->fetchAll($query);
			
			$this->tpl->assign('forumCat', $forumCat);
			$this->tpl->display('forum/forum_createTopic.tpl');
		}
	}
	
	private function addTopic()
    {
		if(isset($_POST['addTopic']))
		{
			if(! isset($_POST['title']) OR EMPTY ($_POST['title']))
			{
				$msg = 'Fillout a title!';
				header('Location: index.php?mod=Forum&act=createTopic&msg=' . urlencode($msg));
				exit;
			} 
			else if(! isset($_POST['message']) OR EMPTY ($_POST['message']))
			{
				$msg = 'Fillout a message!';
				header('Location: index.php?mod=Forum&act=createTopic&msg=' . urlencode($msg));
				exit;
			}
			else if($_POST['catID'] == "")
			{
				$msg = 'Select a category!';
				header('Location: index.php?mod=Forum&act=createTopic&msg=' . urlencode($msg));
				exit;
			}
			else
			{
				
				$message = nl2br(htmlentities($_POST['message'],ENT_COMPAT,'UTF-8'));
				
//Smiley 				

//$message = str_replace(":-)","<img src=\"/images/smiley/smile.png\">",$message);				
$message = str_replace(":-)","<img src=images/smiley/smile.png>",$message);
//$message = str_replace(":-(","<img src=\"/images/smiley/sad.png\">",$message);
$message = str_replace(":-(","<img src=images/smiley/sad.png>",$message);
				
				
//Smiley  ende				


//BBCodes test

require_once 'stringparser_bbcode.class.php';

$bbcode = new StringParser_BBCode ();



$bbcode->addCode ('b', 'simple_replace', null, array ('start_tag' => '<b>', 'end_tag' => '</b>'),
                  'inline', array ('block', 'inline'), array ());// Fett

$bbcode->addCode ('i', 'simple_replace', null, array ('start_tag' => '<i>', 'end_tag' => '</i>'),
                  'inline', array ('block', 'inline'), array ());// Kursiv

$bbcode->addCode ('u', 'simple_replace', null, array ('start_tag' => '<u>', 'end_tag' => '</u>'),
                  'inline', array ('block', 'inline'), array ());// Unterstrichen

$bbcode->addCode ('list', 'simple_replace', null, array ('start_tag' => '<ul>', 'end_tag' => '</ul>'),
                  'list', array ('block', 'listitem'), array ());// Liste

$bbcode->addCode ('*', 'simple_replace', null, array ('start_tag' => '<li>', 'end_tag' => '</li>'),
                  'listitem', array ('list'), array ());// Punkt in der Liste

$bbcode->addCode ('url', 'usecontent?', 'do_bbcode_url', array ('usecontent_param' => 'default'),
                  'link', array ('listitem', 'block', 'inline'), array ('link'));

$bbcode->addCode ('link', 'callback_replace_single', 'do_bbcode_url', array (),
                  'link', array ('listitem', 'block', 'inline'), array ('link'));


$bbcode->addCode ('img', 'usecontent', 'do_bbcode_img', array (),
                  'image', array ('listitem', 'block', 'inline', 'link'), array ());
$bbcode->addCode ('bild', 'usecontent', 'do_bbcode_img', array (),
                  'image', array ('listitem', 'block', 'inline', 'link'), array ());

$bbcode->setOccurrenceType ('img', 'image');
$bbcode->setOccurrenceType ('bild', 'image');
$bbcode->setMaxOccurrences ('image', 2);
$bbcode->setCodeFlag ('*', 'closetag', BBCODE_CLOSETAG_OPTIONAL);
$bbcode->setCodeFlag ('*', 'paragraphs', true);
$bbcode->setCodeFlag ('list', 'paragraph_type', BBCODE_PARAGRAPH_BLOCK_ELEMENT);
$bbcode->setCodeFlag ('list', 'opentag.before.newline', BBCODE_NEWLINE_DROP);
$bbcode->setCodeFlag ('list', 'closetag.before.newline', BBCODE_NEWLINE_DROP);
$bbcode->setRootParagraphHandling (true);




$message = $bbcode->parse ($message);

//BBCodes ende test


				

				
				$insert = array();
				$insert['id_cat'] = $_POST['catID'];
				$insert['title'] = $_POST['title'];
				$insert['starter'] = $this->player->username;
				$insert['message'] = $message;
				$insert['date'] = time();
				$this->db->insert('<ezrpg>forum_top', $insert);
				
				$msg = 'You have succesvol created a new topic!';
				header('Location: index.php?mod=Forum&act=cat&id='.$_POST['catID'].'&msg=' . urlencode($msg));
				exit;
			}
		}
	}
	
	private function read()
    {
		if(isset($_GET['act']) && $_GET['act'] == "read")
		{
			$query = $this->db->execute('SELECT * FROM `<ezrpg>forum_top` WHERE `id`=? ORDER BY `id` DESC', array($_GET['id']));
			$firstMessage = $this->db->fetchAll($query);
			
		    
			$this->tpl->assign('firstMessage', $firstMessage);
			
			if (isset($_GET['page']))
				$page = (intval($_GET['page']) > 0) ? intval($_GET['page']) : 0;
			else
				$page = 0;
			
				$query = $this->db->execute('SELECT * FROM `<ezrpg>forum_mes` WHERE `id_top`=? ORDER BY `id` ASC LIMIT ?,50' , array($_GET['id'], $page * 50));
				$messages = $this->db->fetchAll($query);
				
				$prevpage = (($page - 1) >= 0) ? ($page - 1) : 0;
        
			$this->tpl->assign('nextpage', ++$page);
			$this->tpl->assign('prevpage', $prevpage);
			$this->tpl->assign('messages', $messages);
			
			$this->tpl->display('forum/forum_messages.tpl');
		}
	}
	
	private function addReply()
    {
		if(isset($_POST['addReply']))
		{
			if(! isset($_POST['reply']) OR EMPTY ($_POST['reply']))
			{
				$msg = 'You need to fillout a reply!';
				header('Location: index.php?mod=Forum&act=read&id=' . (INT) $_GET['id'] . '&msg=' . urlencode($msg));
				exit;
			}
			else
			{
				
				$message = nl2br(htmlentities($_POST['reply'],ENT_COMPAT,'UTF-8'));
				
				
// Smiley 				
				
//$message = str_replace(":-)","<img src=\"/images/smiley/smile.png\">",$message);				
$message = str_replace(":-)","<img src=images/smiley/smile.png>",$message);
//$message = str_replace(":-(","<img src=\"/images/smiley/sad.png\">",$message);
$message = str_replace(":-(","<img src=images/smiley/sad.png>",$message);
				
							
//Smiley  ende	


//BBCodes test

require_once 'stringparser_bbcode.class.php';

$bbcode = new StringParser_BBCode ();



$bbcode->addCode ('b', 'simple_replace', null, array ('start_tag' => '<b>', 'end_tag' => '</b>'),
                  'inline', array ('block', 'inline'), array ());// Fett

$bbcode->addCode ('i', 'simple_replace', null, array ('start_tag' => '<i>', 'end_tag' => '</i>'),
                  'inline', array ('block', 'inline'), array ());// Kursiv

$bbcode->addCode ('u', 'simple_replace', null, array ('start_tag' => '<u>', 'end_tag' => '</u>'),
                  'inline', array ('block', 'inline'), array ());// Unterstrichen

$bbcode->addCode ('list', 'simple_replace', null, array ('start_tag' => '<ul>', 'end_tag' => '</ul>'),
                  'list', array ('block', 'listitem'), array ());// Liste

$bbcode->addCode ('*', 'simple_replace', null, array ('start_tag' => '<li>', 'end_tag' => '</li>'),
                  'listitem', array ('list'), array ());// Punkt in der Liste

$bbcode->addCode ('url', 'usecontent?', 'do_bbcode_url', array ('usecontent_param' => 'default'),
                  'link', array ('listitem', 'block', 'inline'), array ('link'));

$bbcode->addCode ('link', 'callback_replace_single', 'do_bbcode_url', array (),
                  'link', array ('listitem', 'block', 'inline'), array ('link'));


$bbcode->addCode ('img', 'usecontent', 'do_bbcode_img', array (),
                  'image', array ('listitem', 'block', 'inline', 'link'), array ());
$bbcode->addCode ('bild', 'usecontent', 'do_bbcode_img', array (),
                  'image', array ('listitem', 'block', 'inline', 'link'), array ());

$bbcode->setOccurrenceType ('img', 'image');
$bbcode->setOccurrenceType ('bild', 'image');
$bbcode->setMaxOccurrences ('image', 2);
$bbcode->setCodeFlag ('*', 'closetag', BBCODE_CLOSETAG_OPTIONAL);
$bbcode->setCodeFlag ('*', 'paragraphs', true);
$bbcode->setCodeFlag ('list', 'paragraph_type', BBCODE_PARAGRAPH_BLOCK_ELEMENT);
$bbcode->setCodeFlag ('list', 'opentag.before.newline', BBCODE_NEWLINE_DROP);
$bbcode->setCodeFlag ('list', 'closetag.before.newline', BBCODE_NEWLINE_DROP);
$bbcode->setRootParagraphHandling (true);




$message = $bbcode->parse ($message);

//BBCodes ende test


				
$top = $this->db->fetchRow('SELECT * FROM `<ezrpg>forum_top` WHERE `id`=?', array($_GET['id']));
        


				$insert = array();
				$insert['id_cat'] = $top->id_cat;
				$insert['id_top'] = $top->id;
				$insert['poster'] = $this->player->username;
				$insert['message'] = $message;
				$insert['date'] = time();
				$this->db->insert('<ezrpg>forum_mes', $insert);
				
				$msg = 'The reply is succesfull added!';
				header('Location: index.php?mod=Forum&act=read&id=' . (INT) $_GET['id'] . '&msg=' . urlencode($msg));
				exit;
			}
		}
	}
	
	private function deltopic()
    {

    
            $query = $this->db->execute('DELETE FROM `<ezrpg>forum_top` WHERE `id`=?', array($_GET['id']));
            $query = $this->db->execute('DELETE FROM `<ezrpg>forum_mes` WHERE `id_top`=?', array($_GET['id']));
            
            
            $msg = 'You have deleted the Topic and message';
            header('Location: index.php?mod=forum&act=cat&msg=' . urlencode($msg));
            exit;
        
    	    	
    }
    
   private function topicon()
   {
   $topic= "ON";
   $update = $this->db->execute('UPDATE `<ezrpg>forum_top` SET `topic`=? WHERE `id`=?', array($topic, $_GET['id']));     
 
   
   if ($update == true)
   {
    header('Location:' . $_SERVER['HTTP_REFERER']);  //ruft die letzte seite wieder auf
   }
 
   }
 
   private function topicoff()
   {
   $topic= "OFF";
   $update = $this->db->execute('UPDATE `<ezrpg>forum_top` SET `topic`=? WHERE `id`=?', array($topic, $_GET['id']));     
   
   if ($update == true)
   {
   header('Location:' . $_SERVER['HTTP_REFERER']);  //ruft die letzte seite wieder auf	
   }
 
   }  
   
	
	
	
}

?>