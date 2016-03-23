{include file="header.tpl" TITLE="Bot Battle"}

<p>
Click on an opponent to battle!
</p>

<table width="90%">
  <tr>
    <th style="text-align: left;">Name</th>
    <th style="text-align: left;">Level</th>
  </tr>

{foreach from=$bots item=bot}
  <tr>
    <td><a href="index.php?mod=BotBattle&act=battle&id={$bot->id}">{$bot->name}</a></td>
    <td>{$bot->level}</td>
  </tr>
{/foreach}
</table>

{include file="footer.tpl"}