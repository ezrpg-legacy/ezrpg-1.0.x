{include file="admin/header.tpl" TITLE="Members Admin"}

<h1>Ban Member</h1>

<p>
Are you sure you want to unban <strong>{$member->username}</strong>?
</p>

<form method="post" action="index.php?mod=Members&act=unban&id={$member->id}">

<input type="submit" name="confirm" value="unBan" />

</form>

{include file="admin/footer.tpl"}