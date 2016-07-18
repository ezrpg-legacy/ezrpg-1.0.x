{include file="admin/header.tpl" TITLE="Items Management"}

<h1>Items Management</h1>
<p>
<strong>Total items:</strong> {$itemscount}
<br />
<a href="index.php?mod=Items&act=add"><strong>Add items</strong></a>
</p>

<table width="100%">
   <tr>
     <th style="text-align: left;">Name</th>
     <th style="text-align: left;">Player</th>
     <th style="text-align: left;">Actions</th>
   </tr>
{foreach from=$items item=item}
   <tr>
     <td>{$item->name}</td>
     <td>{$item->player}</td>
     <td>
       <a href="index.php?mod=Items&act=edit&id={$item->id}"><strong>Edit</strong></a> | <a href="index.php?mod=Item&act=delete&id={$item->id}"><strong>Delete</strong></a>
     </td>
   </tr>
{/foreach}
</table>

{include file="admin/footer.tpl"}