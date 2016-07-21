{include file="admin/header.tpl" TITLE="Bot Battle Admin"}

<h1>Edit Bot</h1>

<form method="post" action="index.php?mod=BotBattle&act=edit&id={$bot->id}">

<label>Name</label>
<input type="text" name="name" value="{$bot->name}" />

<label>Level</label>
<input type="text" name="level" value="{$bot->level}" />

<label>Health</label>
<input type="text" name="health" value="{$bot->health}" />

<label>Damage</label>
<input type="text" name="damage" value="{$bot->damage}" />

<label>EXP Reward</label>
<input type="text" name="exp" value="{$bot->exp}" />

<label>Money Reward</label>
<input type="text" name="money" value="{$bot->money}" />

<br />
<input type="submit" value="Edit" name="edit" />

</form>

{include file="admin/footer.tpl"}