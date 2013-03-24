<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta name="Description" content="ezRPG Project, the free, open source browser-based game engine!" />
<meta name="Keywords" content="ezrpg, game, game engine, pbbg, browser game, browser games, rpg, ezrpg project" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Robots" content="index,follow" />
<link rel="stylesheet" href="../static/default/style.css" type="text/css" />	
<title>ezRPG :: {$TITLE|default:""}</title>
</head>
<body>

<div id="wrapper">

<div id="header">
	<span id="title">ezRPG</span>
	<span id="time">{$smarty.now|date_format:'%A %T'}
	<br />
	<strong>Players Online</strong>: {$ONLINE}</span>
</div>

<div id="nav">
	<ul>
	<li><a href="index.php">Admin</a></li>
	<li><a href="index.php?mod=Members">Members</a></li>
	<li><a href="../index.php">Back</a></li>
	<li><a href="../index.php?mod=Logout">Log Out</a></li>
	</ul>
</div>

<span class="space"></span>

<div id="body">
	{if $GET_MSG != ''}<div class="msg">
	<span class="red"><strong>{$GET_MSG}</strong></span>
	</div>
	<span class="space"></span>{/if}
