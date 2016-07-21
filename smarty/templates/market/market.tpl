{include file="header.tpl" TITLE="Market"}

<h1>Market</h1>

<div class="left">

</div>

<div class="right"><div id="nav">
	<ul>
  <li><a href="index.php?mod=Market&act=sell">Put on sell</a></li>
</ul>
</div></div>

<p>
<strong>Total items:</strong> {$total_items}
</p>

<table width="100%">
   <tr>
     <th style="text-align: left;">Item</th>
     <th style="text-align: left;">Amount</th>
     <th style="text-align: left;">Price</th>
     <th style="text-align: left;">User</th>
     <th style="text-align: left;">Action</th>
   </tr>

{foreach from=$positions item=position}
   <tr>
     <td>{$position->item}</td>
     <td>{$position->amount}</td>
     <td>{$position->price}</td>
     <td>{$position->username}</td>
     <td>
     <a href="index.php?mod=Market&act=buy&id={$position->id}"><strong>Buy</strong></a>
     {if $position->username == $player->username} | <a href="index.php?mod=Market&act=remove&id={$position->id}"><strong>[X]</strong></a>{/if}
     </td>
   </tr>
{/foreach}
</table>

{include file="footer.tpl"}