{include file="header.tpl" TITLE="Stat Points"}

<h1>{$LANGUAGE_Stat_Points}</h1>

<p>
{$LANGUAGE_Here_you_can_use_your_stat_points_to_increase_your_stats_You_have} <strong>{$player->stat_points}</strong> {$LANGUAGE_points_to_use}
<br /><br />
{$LANGUAGE_You_receive_stat_points_when_you_first_sign_up_to_the_game_and_also_each_time_when_you_level_up}
</p>
<form method="post" action="index.php?mod=StatPoints">
<input type="submit" class="button" name="stat" value="Strength" />
</form>
<strong>{$LANGUAGE_Strength}</strong> {$LANGUAGE_This_increases_the_damage_you_do_in_battle_and_increases_your_weight_limit_so_you_can_carry_more_items}

<form method="post" action="index.php?mod=StatPoints">
<input type="submit" class="button" name="stat" value="Vitality" />
</form>
<strong>{$LANGUAGE_Vitality}</strong> {$LANGUAGE_This_increases_the_amount_of_health_you_have_and_decreases_the_amount_of_damage_you_receive_in_battle}

<form method="post" action="index.php?mod=StatPoints">
<input type="submit" class="button" name="stat" value="Agility" />
</form>
<strong>{$LANGUAGE_Agility}</strong> {$LANGUAGE_This_increases_your_chance_to_completely_dodge_and_attack_and_take_no_damage_in_battle}

<form method="post" action="index.php?mod=StatPoints">
<input type="submit" class="button" name="stat" value="Dexterity" />
</form>
<strong>{$LANGUAGE_Dexterity}</strong> {$LANGUAGE_This_helps_you_aim_better_so_you_are_less_likely_to_miss_your_opponent}

{include file="footer.tpl"}