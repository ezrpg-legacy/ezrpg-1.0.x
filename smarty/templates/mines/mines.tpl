{include file="header.tpl" TITLE="Mines"}

<h1>{$LANGUAGE_Mines}</h1>

<p>
{$LANGUAGE_Welcome_to_your_mine_site}. {$LANGUAGE_You_have}:
</p>
<ul>
    <li><strong>{$LANGUAGE_Mines}:</strong> {$mines}</li>
    <li><strong>{$LANGUAGE_Rocks}:</strong> {$rocks}</li>
    <li><strong>{$LANGUAGE_Copper}:</strong> {$copper}</li>
    <li><strong>{$LANGUAGE_Diamonds}:</strong> {$diamonds}</li>
</ul>

<p>
{$LANGUAGE_What_would_you_like_to_do_today}?
</p>

<ul>
    <li><a href="index.php?mod=Mines&act=buy">{$LANGUAGE_Buy_Mines}</a></li>
    <li><a href="index.php?mod=Mines&act=market">{$LANGUAGE_Sell_Minerals}</a></li>
    <li><a href="index.php?mod=Mines&act=mine">{$LANGUAGE_Mine_for_minerals}! ({$LANGUAGE_Costs_1_energy})</a></li>
    <li><a href="index.php?mod=City">{$LANGUAGE_Return}</a></li>
</ul>

{include file="footer.tpl"}
