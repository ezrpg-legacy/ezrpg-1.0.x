{include file="header.tpl" TITLE="Mines"}

<h1>Sell Minerals</h1>

<p>
Here you can sell the minerals that you've mined. Here are the current mineral prices for one unit of a mineral:
</p>

<ul>
    <li><strong>Rocks:</strong> 2 money</li>
    <li><strong>Copper:</strong> 15 money</li>
    <li><strong>Diamonds:</strong> 45 money</li>
</ul>

<form method="post" action="index.php?mod=Mines&act=market">
<label>Rocks</label>
<input type="text" name="rocks" value="{$rocks}" />

<label>Copper</label>
<input type="text" name="copper" value="{$copper}" />

<label>Diamonds</label>
<input type="text" name="diamonds" value="{$diamonds}" />

<br />
<input type="submit" name="sell" value="Sell" />
</form>

<ul>
    <li><a href="index.php?mod=Mines">Back to mining station</a></li>
</ul>


{include file="footer.tpl"}
