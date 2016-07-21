{include file="admin/header.tpl" TITLE="Bot Battle Admin"}

<h1>Delete Bot</h1>

<p>
Are you sure you want to delete <strong>{$bot->name}</strong>?
</p>

<form method="post" action="index.php?mod=BotBattle&act=delete&id={$bot->id}">

<input type="submit" name="confirm" value="Delete" />

</form>

{include file="admin/footer.tpl"}