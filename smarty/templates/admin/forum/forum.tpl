{include file="admin/header.tpl" TITLE="Forum Management"}

<h1> Forum Management</h1>

<p>
<strong>Total Cats:</strong> {$count}
<br />
<a href="index.php?mod=Forum&act=add"><strong>Add Cat</strong></a>
</p>



<table width="100%" border="2">
   <tr>
     <th style="text-align: center;">Title</th>
     <th style="text-align: center;">Description</th>
     
     
     <th style="text-align: center;">Action</th>
   </tr>

{foreach from=$list item=liste}
   <tr>
     <td style="text-align: center;">{$liste->title}</td>
     <td style="text-align: center;">{$liste->description}</td>
     
     <td>
       <a href="index.php?mod=Forum&act=edit&id={$liste->id}"><strong>Edit</strong></a>|<a href="index.php?mod=Forum&act=delete&id={$liste->id}"><strong>Delete</strong></a>
     </td>
   </tr>
{/foreach}
</table>

{include file="admin/footer.tpl"}