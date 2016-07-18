{include file="header.tpl" TITLE="Members"}

<table width="90%">
  <tr>
    <th style="text-align: left;">{$LANGUAGE_Username}</th>
    <th style="text-align: left;">{$LANGUAGE_Level}</th>
  </tr>

{foreach from=$members item=member}
  <tr>
    <td>{$member->username}</td>
    <td>{$member->level}</td>
  </tr>
{/foreach}
</table>

<span class="space"></span>

<span style="display: block; width: 90%; text-align: center;">
<strong>
<a href="index.php?mod=Members&page={$prevpage}">{$LANGUAGE_Previous_Page}</a> | <a href="index.php?mod=Members&page={$nextpage}">{$LANGUAGE_Next_Page}</a>
</strong>
</span>

{include file="footer.tpl"}