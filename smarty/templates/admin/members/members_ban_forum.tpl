{include file="admin/header.tpl" TITLE="Members Admin"}

<h1>Ban forum Member</h1>

<p>
Are you sure you want to ban forum <strong>{$member->username}</strong>?
</p>

<form method="post" action="index.php?mod=Members&act=ban_forum&id={$member->id}">

<input type="submit" name="confirm" value="Ban_forum" />

</form>

{include file="admin/footer.tpl"}