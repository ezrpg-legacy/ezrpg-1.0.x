{include file="header.tpl" TITLE="Mines"}

<h1>{$LANGUAGE_Buy_Mines}</h1>

<p>
{$LANGUAGE_A_new_mine_will_cost_you}:
</p>

<ul>
    <li><strong>{$LANGUAGE_money}:</strong> {$price_money} ({$LANGUAGE_You_have} <strong>{$player->money}</strong>)</li>
    <li><strong>{$LANGUAGE_Rocks}:</strong> {$price_rocks} ({$LANGUAGE_You_have} <strong>{$player_rocks}</strong>)</li>
    <li><strong>{$LANGUAGE_Copper}:</strong> {$price_copper} ({$LANGUAGE_You_have} <strong>{$player_copper}</strong>)</li>
    <li><strong>{$LANGUAGE_Diamonds}:</strong> {$price_diamonds} ({$LANGUAGE_You_have} <strong>{$player_diamonds}</strong>)</li>
</ul>

<ul>
    <li><a href="index.php?mod=Mines&act=buy&buy=1">{$LANGUAGE_Buy_Mines}!</a></li>
    <li><a href="index.php?mod=Mines">{$LANGUAGE_Return}</a></li>
</ul>


{include file="footer.tpl"}
