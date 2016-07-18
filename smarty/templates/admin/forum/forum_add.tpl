{include file="admin/header.tpl" TITLE="Forum Admin"}

<h1> Add Cat</h1>


<form method="post" enctype="multipart/form-data" action="index.php?mod=Forum&act=add">
<div align="center">

<label>Titlу</label>
<input type="text" name="title" />

<label>Description</label>
<input type="text" name="description" />

</br>

<input type="submit" value="Add" name="add" />

</div>

</form>



{include file="admin/footer.tpl"}