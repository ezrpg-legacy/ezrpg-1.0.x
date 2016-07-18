{include file="admin/header.tpl" TITLE="Items Admin"}

<h1>Add Items</h1>

<form method="post" action="index.php?mod=Items&act=add">

<label>player</label>
<input type="text" name="player" />

<label>class</label>
<select name='class' type='dropdown'>
<option value='HealingItem'>HealingItem</option>
<option value='MultiHealingItem'>MultiHealingItem</option>
<option value='WeaponItem'>WeaponItem</option>
</select>

<label>Name</label>
<input type="text" name="name" />

<label>value1</label>
<input type="text" name="value1" />

<label>value2</label>
<input type="text" name="value2" />

<label>value3</label>
<input type="text" name="value3" />

<label>value4</label>
<input type="text" name="value4" />

<label>value5</label>
<input type="text" name="value5" />

<br />
<input type="submit" value="Add" name="add" />

</form>

{include file="admin/footer.tpl"}