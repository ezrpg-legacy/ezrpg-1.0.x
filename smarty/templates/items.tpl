{include file="header.tpl" TITLE="Items"}

<h1>Your Items</h1>

<table width="90%">
  <tr>
    <th style="text-align: left;"><u>Name</u></th>
    <th style="text-align: left;"><u>Action</u></th>
  </tr>

{foreach from=$items item=item}
  <tr>
    <td><strong>{$item->getName()}</strong></td>
    <td><a href="index.php?mod=Items&act=use&id={$item->id}">{$item->useType()}</a></td>
  </tr>
  <tr>
    <td colspan="2">
        {$item->getDescription()}
        <span class="space"></span>
    </td>
  </tr>
{/foreach}
</table>

{include file="footer.tpl"}