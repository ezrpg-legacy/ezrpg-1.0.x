<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta name="Description" content="ezRPG Project, the free, open source browser-based game engine!" />
<meta name="Keywords" content="ezrpg, game, game engine, pbbg, browser game, browser games, rpg, ezrpg project" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Robots" content="index,follow" />
<link rel="stylesheet" href="static/default/style.css" type="text/css" />	
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
	{if $LOGGED_IN == 'TRUE'}
	<li><a href="index.php">Home</a></li>
	<li><a href="index.php?mod=EventLog">Log</a></li>
	<li><a href="index.php?mod=City">City</a></li>
	<li><a href="index.php?mod=Members">Members</a></li>
	<li><a href="index.php?mod=AccountSettings">Account</a></li>
	{if $player->rank >= 5}
	<li><a href="admin/index.php">Admin</a></li>
	{/if}
	<li><a href="index.php?mod=Logout">Log Out</a></li>
	{else}
	<li><a href="index.php">Home</a></li>
	<li><a href="index.php?mod=Register">Register</a></li>
	{/if}
	</ul>
</div>

<span class="space"></span>

{if $LOGGED_IN == 'TRUE'}
<div id="sidebar">
<strong>Level</strong>: {$player->level}<br />
<strong>Gold</strong>: {$player->money}<br />

<img src="bar.php?width=140&type=exp" alt="EXP: {$player->exp} / {$player->max_exp}" /><br />
<img src="bar.php?width=140&type=hp" alt="HP: {$player->hp} / {$player->max_hp}" /><br />
<img src="bar.php?width=140&type=energy" alt="Energy: {$player->energy} / {$player->max_energy}" /><br />

{if $new_logs > 0}
<a href="index.php?mod=EventLog" class="red"><strong>{$new_logs} New Log Events!</strong></a>
{/if}
</div>
{/if}

<div id="{if $LOGGED_IN == 'TRUE'}gamebody{else}body{/if}">
	{if $GET_MSG != ''}<div class="msg">
	<span class="red"><strong>{$GET_MSG}</strong></span>
	</div>
	<span class="space"></span>{/if}
