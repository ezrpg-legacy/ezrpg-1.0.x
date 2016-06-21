{include file="header.tpl" TITLE="Mines"}

<h1>{$LANGUAGE_Sell_Minerals}</h1>

<p>
{$LANGUAGE_Here_you_can_sell_the_minerals_that_you_ve_mined}.<br /> 
{$LANGUAGE_Here_are_the_current_mineral_prices_for_one_unit_of_a_mineral}:
</p>

<ul>
    <li><strong>{$LANGUAGE_Rocks}:</strong> 2 money</li>
    <li><strong>{$LANGUAGE_Copper}:</strong> 15 money</li>
    <li><strong>{$LANGUAGE_Diamonds}:</strong> 45 money</li>
</ul>

<form method="post" action="index.php?mod=Mines&act=market">
<label>{$LANGUAGE_Rocks}</label>
<input type="text" name="rocks" value="{$rocks}" />

<label>{$LANGUAGE_Copper}</label>
<input type="text" name="copper" value="{$copper}" />

<label>{$LANGUAGE_Diamonds}</label>
<input type="text" name="diamonds" value="{$diamonds}" />

<br />
<input type="submit" name="sell" value="{$LANGUAGE_Sell_Minerals}" />
</form>

<ul>
    <li><a href="index.php?mod=Mines">{$LANGUAGE_Return}</a></li>
</ul>


{include file="footer.tpl"}
