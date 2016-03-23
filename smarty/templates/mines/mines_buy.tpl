{include file="header.tpl" TITLE="Mines"}

<h1>Buy Mines</h1>

<p>
A new mine will cost you:
</p>

<ul>
    <li><strong>Money:</strong> {$price_money} (you have <strong>{$player->money}</strong>)</li>
    <li><strong>Rocks:</strong> {$price_rocks} (you have <strong>{$player_rocks}</strong>)</li>
    <li><strong>Copper:</strong> {$price_copper} (you have <strong>{$player_copper}</strong>)</li>
    <li><strong>Diamonds:</strong> {$price_diamonds} (you have <strong>{$player_diamonds}</strong>)</li>
</ul>

<ul>
    <li><a href="index.php?mod=Mines&act=buy&buy=1">Buy a mine!</a></li>
    <li><a href="index.php?mod=Mines">Back...</a></li>
</ul>


{include file="footer.tpl"}
