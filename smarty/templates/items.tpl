{include file="header.tpl" TITLE="Items"}

<h3>Your Items</h3>
<table width="90%" border=2>
  <tr>
    <th style="text-align: left;"><u>Name</u></th>
    <th style="text-align: left;"><u>Description</u></th>
    <th style="text-align: left;"><u>Action</u></th>
  </tr>
{foreach from=$items item=item}
  <tr>
    <td><strong>{$item->getName()}</strong></td>
    <td>{$item->getDescription()}</td>
    <td><a href="index.php?mod=Items&act=use&id={$item->id}">{$item->useType()}</a></td>

</tr>
{/foreach}
</table>

{include file="footer.tpl"}