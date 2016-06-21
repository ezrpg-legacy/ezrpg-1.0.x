{include file="header.tpl" TITLE="Home"}

<h1>{$LANGUAGE_Home}</h1>

<div class="left">
<p>
<strong>{$LANGUAGE_Username}</strong>: {$player->username}<br />
<strong>{$LANGUAGE_Email}</strong>: {$player->email}<br />
<strong>{$LANGUAGE_Registered}</strong>: {$player->registered|date_format:'%B %e, %Y %l:%M %p'}<br />
<strong>{$LANGUAGE_Kills_Deaths}</strong>: {$player->kills}/{$player->deaths}<br />
<br />
{if $player->stat_points > 0}
{$LANGUAGE_You_have_stat_points_left_over}<br />
<a href="index.php?mod=StatPoints"><strong>{$LANGUAGE_Spend_them_now}</strong></a>
{else}
{$LANGUAGE_You_have_no_extra_stat_points_to_spend}
{/if}
</p>
</div>


<div class="right">
<p>
<strong>{$LANGUAGE_Level}</strong>: {$player->level}<br />
<strong>{$LANGUAGE_Gold}</strong>: {$player->money}<br />
<strong>{$LANGUAGE_Bank}</strong>: {$player->bank}<br />
<br />
<strong>{$LANGUAGE_Strength}</strong>: {$player->strength}<br />
<strong>{$LANGUAGE_Vitality}</strong>: {$player->vitality}<br />
<strong>{$LANGUAGE_Agility}</strong>: {$player->agility}<br />
<strong>{$LANGUAGE_Dexterity}</strong>: {$player->dexterity}<br />
</p>
</div>
{include file="footer.tpl"}