{include file="admin/header.tpl" TITLE="Bot Battle Management"}

<h1>Bot Battle Management</h1>

<p>
<strong>Total Bots:</strong> {$botcount}
<br />
<a href="index.php?mod=BotBattle&act=add"><strong>Add Bot</strong></a>
</p>

<table width="100%">
   <tr>
     <th style="text-align: left;">Name</th>
     <th style="text-align: left;">Level</th>
     <th style="text-align: left;">Actions</th>
   </tr>

{foreach from=$bots item=bot}
   <tr>
     <td>{$bot->name}</td>
     <td>{$bot->level}</td>
     <td>
       <a href="index.php?mod=BotBattle&act=edit&id={$bot->id}"><strong>Edit</strong></a> | <a href="index.php?mod=BotBattle&act=delete&id={$bot->id}"><strong>Delete</strong></a>
     </td>
   </tr>
{/foreach}
</table>

{include file="admin/footer.tpl"}