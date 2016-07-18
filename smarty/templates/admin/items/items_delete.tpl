{include file="admin/header.tpl" TITLE="Items Admin"}

<h1>Delete Items</h1>

<p>
Are you sure you want to delete <strong>{$items->name}</strong>?
</p>

<form method="post" action="index.php?mod=Items&act=delete&id={$items->id}">

<input type="submit" name="confirm" value="Delete" />

</form>

{include file="admin/footer.tpl"}