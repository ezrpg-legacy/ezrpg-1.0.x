{include file="header.tpl" TITLE="Outbox"}

<h1>Outbox</h1>
<p><a href="index.php?mod=MailBox">[Inbox]</a> | <a href="index.php?mod=MailBox&act=compose">[Compose]</a> | <a href="index.php?mod=City">
[Exit]</a></p>

<table width="90%">
  <tr>
    <th style="text-align: left;">To</th>
    <th style="text-align: left;">Subject</th>
    <th style="text-align: left;">Date Sent</th>
  </tr>
{foreach from=$outboxs item=out}
  <tr>
  	<td>{$out->to}</td>
    <td><a href="index.php?mod=MailBox&act=read&id={$out->id}">{$out->subject}</a></td>
    <td>{$out->date}</td>
  </tr>
{/foreach}

</table>

{include file="footer.tpl"}