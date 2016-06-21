{include file="header.tpl" TITLE="Hospital"}

<h1>{$LANGUAGE_Healer}</h1>
{$LANGUAGE_Welcome} <strong>{$player->username}</strong>!
  <br />
{$LANGUAGE_You_have_cash} <strong>{$player->money}</strong> {$LANGUAGE_coins_and} <strong>{$player->bank}</strong> {$LANGUAGE_money_in_your_bank}!<br>
<br>
{$LANGUAGE_Complete_your_treatment_will_cost}<b>{round($player->max_hp-$player->hp)}</b>{$LANGUAGE_coins}.
 
<form method="POST" action="index.php?mod=Hospital&act=heal">
<input type="text" name="amount" autocomplete="off" value="{round($player->max_hp-$player->hp)}" />
<input type="submit" value="{$LANGUAGE_heal_me}" />
</form>

<br> 
{$LANGUAGE_An_injection_of_adrenaline_will_cost}<b>{round($player->max_energy-$player->energy)}</b>{$LANGUAGE_coins}.

<form method="POST" action="index.php?mod=Hospital&act=adrenaline">
<input type="text" name="amount" autocomplete="off" value="{round($player->max_energy-$player->energy)}" />
<input type="submit" value="{$LANGUAGE_adrenaline_shot}" />
</form>


{include file="footer.tpl"}