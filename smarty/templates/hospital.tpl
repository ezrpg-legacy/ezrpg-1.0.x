{include file="header.tpl" TITLE="Hospital"}
<!-- HOSPITAL WITH ADRENALINE TEMPLATE BY TREMOR (freepwn.com) -->

<h1>The Hospital</h1>

<p>To completely heal yourself, you need to pay at the rate of <u>1 coin for 1 point</u> of health.
</p>

<p>To restore energy, you need to pay at the rate of <u>1 coin for 1 point</u> of energy.
</p>

<center>

{$hospital}

<br>
<form method="POST" action="index.php?mod=Hospital">
<input type="submit" name="submit" value="Heal Me">
<input type="submit" name="submit" value="Adrenaline Shot">
</form>

</center>
<p>
<li><a href="index.php?mod=City">to return to the city...</a></li>
</p>

{include file="footer.tpl"}