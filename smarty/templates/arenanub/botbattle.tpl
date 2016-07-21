{include file="header.tpl" TITLE="Bot Battle"}

<h1>{$LANGUAGE_Arena}</h1>
<p>
{$LANGUAGE_Click_on_an_opponent_to_battle}
</p>

<table width="90%">
  <tr>
    <th style="text-align: left;">{$LANGUAGE_Name}</th>
    <th style="text-align: left;">{$LANGUAGE_Level}</th>
  </tr>

{foreach from=$bots item=bot}
  <tr>
    <td><a href="index.php?mod=BotBattle&act=battle&id={$bot->id}">{$bot->name}</a></td>
    <td>{$bot->level}</td>
  </tr>
{/foreach}
</table>
<ul>
    <li><a href="index.php?mod=City">{$LANGUAGE_Return}</a></li>
</ul>

{include file="footer.tpl"}