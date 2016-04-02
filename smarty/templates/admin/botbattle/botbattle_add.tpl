{include file="admin/header.tpl" TITLE="Bot Battle Admin"}

<h1>Add Bot</h1>

<form method="post" action="index.php?mod=BotBattle&act=add">

<label>Name</label>
<input type="text" name="name" />

<label>Level</label>
<input type="text" name="level" />

<label>Health</label>
<input type="text" name="health" />

<label>Damage</label>
<input type="text" name="damage" />

<label>EXP Reward</label>
<input type="text" name="exp" />

<label>Money Reward</label>
<input type="text" name="money" />

<br />
<input type="submit" value="Add" name="add" />

</form>

{include file="admin/footer.tpl"}