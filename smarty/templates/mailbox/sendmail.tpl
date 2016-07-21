{include file="header.tpl" TITLE="Composing"}
		<body>
	<h1><strong>Compose Message</strong></h1>
<p><a href="index.php?mod=MailBox">[Inbox]</a> | <a href="index.php?mod=MailBox&act=outbox">[Outbox]</a> | <a href="index.php?mod=City">
[Exit]</a></p>
<form action="index.php?mod=MailBox&act=send" method="post">
         To: <input type="text" name="to" value="Name"><br>
         Subject: <input type="text" name="subject" value="No Subject"><br>
         Message:<br><textarea name="message" cols="50" rows="10"></textarea><br>
         <input type="submit" value="Send">
        </form><br>
        </body>
{include file="footer.tpl"}