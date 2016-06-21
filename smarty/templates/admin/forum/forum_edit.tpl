{include file="admin/header.tpl" TITLE="Adressen Admin"}

<h1> Edit Adressen</h1>


<form method="post" enctype="multipart/form-data" action="index.php?mod=forum&act=edit&id={$cat->id}">

<div align="center">

<label>Titlу</label>
<input type="text" name="title" value="{$cat->title}"/>

<label>Description</label>
<input type="text" name="description" value="{$cat->description}"/>

</br>

<input type="submit" value="Edit" name="edit" />

</div>

</form>




{include file="admin/footer.tpl"}