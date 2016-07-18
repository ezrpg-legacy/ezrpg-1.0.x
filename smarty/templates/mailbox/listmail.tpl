{include file="header.tpl" TITLE="Inbox"}

<h1>Inbox</h1>

<p><a href="index.php?mod=MailBox&act=compose">[Compose]</a> | <a href="index.php?mod=MailBox&act=outbox">
[Outbox]</a> | <a href="index.php?mod=MailBox&act=deleteall">[Delete All]</a> | <a href="index.php?mod=City">
[Exit]</a></p>

<table width="90%">
  <tr>
    <th style="text-align: left;">From</th>
    <th style="text-align: left;">Subject</th>
    <th style="text-align: left;">Date Received</th>
    <th style="text-align: left;">Action</th>
  </tr>
{foreach from=$inboxs  item=box}
  <tr>
    <td>{$box->from}</td>
     <td><a href="index.php?mod=MailBox&act=read&id={$box->id}">{$box->subject}</a></td>
     <td>{$box->date}</td>
    <td><a href="index.php?mod=MailBox&act=delete&id={$box->id}"><img height="16" src="static/images/delete.jpg" width="16" alt="Delete"></a></td>
  </tr>
{/foreach}
</table>


{include file="footer.tpl"}
