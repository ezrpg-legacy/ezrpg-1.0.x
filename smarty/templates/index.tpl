{include file="header.tpl" TITLE="Home"}

<h1>Demo version</h1>

<div class="left">
<p>
Welcome to demo ezRPG engine! Login now!
<br>
<br>
<em> The demo version of the engine 
<center>looked: <strong>{$playercount}</strong> users. </center> </em>

</p>
</div>

<div class="right">
<form method="post" action="index.php?mod=Login">
<label>Username</label>
<input type="text" name="username" />

<label>Password</label>
<input type="password" name="password" />

<input name="login" type="submit" class="button" value="Login!">
</form>
</div>

{include file="footer.tpl"}