{include file="admin/header.tpl" TITLE="Members Admin"}

<h1>Ban Member</h1>

<p>
Are you sure you want to ban <strong>{$member->username}</strong>?
</p>

<form method="post" action="index.php?mod=Members&act=ban&id={$member->id}">

<input type="submit" name="confirm" value="Ban" />

</form>

{include file="admin/footer.tpl"}