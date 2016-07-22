<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="Description" content="ezRPG Project, the free, open source browser-based game engine!" />
<meta name="Keywords" content="ezrpg, game, game engine, pbbg, browser game, browser games, rpg, ezrpg project" />
<meta name="Distribution" content="Global" />
<meta name="Robots" content="index,follow" />
<link rel="stylesheet" href="static/default/style.css" type="text/css" />	
<title>ezRPG :: {$TITLE|default:""}</title>

<script language="javascript" type="text/javascript">
    
       window.setInterval("time_display()",1000);
 
       function time_display()
       {
        d = new Date ();
 
        h = (d.getHours () < 10 ? '0' + d.getHours () : d.getHours ());
        m = (d.getMinutes () < 10 ? '0' + d.getMinutes () : d.getMinutes ());
        s = (d.getSeconds () < 10 ? '0' + d.getSeconds () : d.getSeconds ());
 
        document.getElementById("time_d").innerHTML =  
        h + ':' + m + ':' + s ;
       }
    </script>

</head>
<body onload="time_display()">

<div id="wrapper">

<div id="header">
	<span id="title">ezRPG 1.0.8</span>
	<span id="time">{$LANGUAGE_SYS_{$smarty.now|date_format:'%A'}}<span id="time_d">{$smarty.now|date_format:'%H:%M:%S'}</span>
	<br />
	<strong>{$LANGUAGE_SYS_Players_Online}</strong>: {$ONLINE}</span>
</div>

<div id="nav">
	<ul>
	{if $LOGGED_IN == 'TRUE'}
	<li><a href="index.php">{$LANGUAGE_SYS_Home}</a></li>
	<li><a href="index.php?mod=EventLog">{$LANGUAGE_SYS_Event_Log}</a></li>
	<li><a href="index.php?mod=City">{$LANGUAGE_SYS_City}</a></li>
	<li><a href="index.php?mod=Members">{$LANGUAGE_SYS_Members}</a></li>
	<li><a href="index.php?mod=AccountSettings">{$LANGUAGE_SYS_Account}</a></li>
	{if $player->rank >= 5}
	<li><a href="admin/index.php">{$LANGUAGE_SYS_Admin}</a></li>
	{/if}
	<li><a href="index.php?mod=Logout">{$LANGUAGE_SYS_Logout}</a></li>
	{else}
	<li><a href="index.php">Home</a></li>
	<li><a href="index.php?mod=Register">Register</a></li>
	{/if}
	</ul>
</div>

<span class="space"></span>

{if $LOGGED_IN == 'TRUE'}
<div id="sidebar">
<strong>{$LANGUAGE_SYS_Level}</strong>: {$player->level}<br />
<strong>{$LANGUAGE_SYS_Gold}</strong>: {$player->money}<br />

<img src="bar.php?width=140&type=exp" alt="{$LANGUAGE_SYS_EXP}: {$player->exp} / {$player->max_exp}" /><br />
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
