{include file="header.tpl" TITLE="Battle"}


<h1>{$LANGUAGE_Arena}</h1>
<p>
{$LANGUAGE_Click_on_an_opponent_to_battle}
</p>

<table width="90%">
  <tr>
    <th style="text-align: left;">{$LANGUAGE_Name}</th>
    <th style="text-align: left;">{$LANGUAGE_Level}</th>
  </tr>

{foreach from=$opponents item=opponent}
  <tr>
    <td><a href="index.php?mod=Attack&act=go&id={$opponent->id}">{$opponent->username}</a></td>
    <td>{$opponent->level}</td>
  </tr>
{/foreach}
</table>
<p>
<li><a href="index.php?mod=City">{$LANGUAGE_Return}</a></li>
</p>
{include file="footer.tpl"}