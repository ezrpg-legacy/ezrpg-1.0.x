{include file="header.tpl" TITLE="Mines"}

<h1>{$LANGUAGE_Mining}</h1>

<p>{$LANGUAGE_You_mined}:</p>

<ul>
    <li><strong>{$LANGUAGE_Rocks}:</strong> {$gain_rocks}</li>
    <li><strong>{$LANGUAGE_Copper}:</strong> {$gain_copper}</li>
    <li><strong>{$LANGUAGE_Diamonds}:</strong> {$gain_diamonds}</li>
</ul>

<p>
{$LANGUAGE_Well_done}! 
{$LANGUAGE_Remember_the_more_mines_you_have_the_more_minerals_you_will_get}!</p>

<ul>
    <li><a href="index.php?mod=Mines&act=mine">{$LANGUAGE_Mine_again}</a></li>
    <li><a href="index.php?mod=Mines">{$LANGUAGE_Return}</a></li>
</ul>

{include file="footer.tpl"}
