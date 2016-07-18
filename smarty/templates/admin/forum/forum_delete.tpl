{include file="admin/header.tpl" TITLE="Forum Admin"}

<h1> Delete Cat</h1>

<p>
Are you sure you want to delete <strong>{$cat->title}</strong>?</br>



</p>

<form method="post" action="index.php?mod=forum&act=delete&id={$cat->id}">

<input type="submit" name="confirm" value="Delete" />

</form>

{include file="admin/footer.tpl"}