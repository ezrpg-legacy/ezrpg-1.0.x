{include file="header.tpl" TITLE="Fifty Fifty"}
			<html>
			<head>
			<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/layout<?php echo $page->layout; ?>/css/css.css">
			</head>
			<body style="margin: 0px;">

			<center>
			<table  width=70%><table width=70% cellspacing=0 cellpadding=2><table width=70%>
			  <tr>
			  <td width="70%" class=subTitle><b>Give it a try!</b></td>
			<table  width=70%>
			<td class="mainTxt"><center></center>
			</td>
			</table></tr></table></table></table></center>

			<table align="center" width="70%">
			<tr><td class="subTitle">50/50</td></tr>
			<tr><td class="mainTxt">
			Welcome to 50/50,<br>
			In this game you have 50% chance of winning!<br> On the other hand, theres 50% chance you could lose!
			</td></tr>
			<form method="POST" action="index.php?mod=FiftyFifty&act=1">
			<tr><td class="mainTxt" align="center"><input maxlength="13" type="text" name="input">
				<input class="2" type="submit" value="Do it!"></td></tr>
			</form>

			</table>

			</body>
			</html>
<a href="index.php?mod=City">to return to the city...</a>
{include file="footer.tpl"}
