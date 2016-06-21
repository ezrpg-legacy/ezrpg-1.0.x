{include file="admin/header.tpl" TITLE="Members Admin"}

<h3>Пользователи</h3>

<p>
<strong>Всего пользователей: </strong> {$playercount}
</p>

<table width="100%">
  <tr>
    <th style="text-align: left;">Username</th>
    <th style="text-align: left;">Email</th>
    <th style="text-align: left;">Actions</th>
  </tr>

{foreach from=$members item=member}
  <tr>
    <td>{$member->username}</td>
    <td><a href="mailto:{$member->email}">{$member->email}</a></td>
    <td>
      <a href="index.php?mod=Members&act=edit&id={$member->id}"><strong>Edit</strong></a> | 
      <a href="index.php?mod=Members&act=delete&id={$member->id}"><strong>Delete</strong></a> |
      {if $member->ban == 0}
      <a href="index.php?mod=Members&act=ban&id={$member->id}"><strong>Ban</strong></a> 
      {else}
      <a href="index.php?mod=Members&act=unban&id={$member->id}"><strong>UnBan</strong></a> 
      {/if}
    </td>
    <td>
      {if $member->ban_forum == 0}
      <a href="index.php?mod=Members&act=ban_forum&id={$member->id}"><strong>BanForum</strong></a> 
      {else}
      <a href="index.php?mod=Members&act=unban_forum&id={$member->id}"><strong>UnBanForum</strong></a> 
      {/if}
    </td>
  </tr>
{/foreach}
</table>

<span class="space"></span>

<span style="display: block; width: 90%; text-align: center;">
<strong>
<a href="index.php?mod=Members&page={$prevpage}">Prevpage</a>
|
<a href="index.php?mod=Members&page={$nextpage}">Nextpage</a>
</strong>
</span>

{include file="admin/footer.tpl"}