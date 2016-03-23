{include file="header.tpl" TITLE="Mines"}

<h1>Mines</h1>

<p>
Welcome to your mine site. You have:
</p>
<ul>
    <li><strong>Mines:</strong> {$mines}</li>
    <li><strong>Rocks:</strong> {$rocks}</li>
    <li><strong>Copper:</strong> {$copper}</li>
    <li><strong>Diamonds:</strong> {$diamonds}</li>
</ul>

<p>
What would you like to do today?
</p>

<ul>
    <li><a href="index.php?mod=Mines&act=buy">Buy Mines</a></li>
    <li><a href="index.php?mod=Mines&act=market">Sell Minerals</a></li>
    <li><a href="index.php?mod=Mines&act=mine">Mine for minerals! (Costs 1 energy)</a></li>
</ul>

{include file="footer.tpl"}
