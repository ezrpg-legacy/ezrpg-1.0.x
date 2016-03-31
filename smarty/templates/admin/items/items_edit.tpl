{include file="admin/header.tpl" TITLE="Items Admin"}

<h1>Edit Items</h1>

<form method="post" action="index.php?mod=Items&act=edit&id={$items->id}">

<label>Name</label>
<input type="text" name="name" value="{$items->name}" />

<label>value1</label>
<input type="text" name="value1" value="{$items->value1}" />

<label>value2</label>
<input type="text" name="value2" value="{$items->value2}" />

<label>value3</label>
<input type="text" name="value3" value="{$items->value3}" />

<label>value4</label>
<input type="text" name="value4" value="{$items->value4}" />

<label>value5</label>
<input type="text" name="value5" value="{$items->value5}" />

<br />
<input type="submit" value="Edit" name="edit" />

</form>

{include file="admin/footer.tpl"}