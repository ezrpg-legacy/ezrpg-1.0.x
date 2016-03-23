{include file="header.tpl" TITLE="Mines"}

<h1>Mining</h1>

<p>You mined:</p>

<ul>
    <li><strong>Rocks:</strong> {$gain_rocks}</li>
    <li><strong>Copper:</strong> {$gain_copper}</li>
    <li><strong>Diamonds:</strong> {$gain_diamonds}</li>
</ul>

<p>
Well done! Remember, the more mines you have, the more minerals you will get!</p>

<ul>
    <li><a href="index.php?mod=Mines&act=mine">Mine again</a></li>
    <li><a href="index.php?mod=Mines">Back...</a></li>
</ul>

{include file="footer.tpl"}
