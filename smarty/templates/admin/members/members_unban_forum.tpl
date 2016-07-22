{include file="admin/header.tpl" TITLE="Members Admin"}

<h1>unBan forum Member</h1>

<p>
Are you sure you want to unban forum <strong>{$member->username}</strong>?
</p>

<form method="post" action="index.php?mod=Members&act=unban_forum&id={$member->id}">

<input type="submit" name="confirm" value="unBan_forum" />

</form>

{include file="admin/footer.tpl"}