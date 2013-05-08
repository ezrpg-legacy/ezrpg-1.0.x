{include file="admin/header.tpl" TITLE="Members Admin"}

<h1>Edit Member</h1>

<form method="post" action="index.php?mod=Members&act=edit&id={$member->id}">

<h2>General <hr /></h2>
<label>Username</label>
<input type="text" disabled="disabled" value="{$member->username}" />

<label for="email">Email</label>
<input type="text" name="email" id="email" value="{$member->email}" />

<label for="rank">Rank (If the player has rank 5 or higher, the player will be able to access the admin panel.)</label>
<input type="text" name="rank" id="rank" value="{$member->rank}" />

<label for="money">Money</label>
<input type="text" name="money" id="money" value="{$member->money}" />


<h2>Stats <hr /></h2>
<label for="level">Level</label>
<input type="text" name="level" id="level" value="{$member->level}" />

<label for="stat_points">Stat Points</label>
<input type="text" name="stat_points" id="stat_points" value="{$member->stat_points}" />

<label for="strength">Strength</label>
<input type="text" name="strength" id="strength" value="{$member->strength}" />

<label for="vitality">Vitality</label>
<input type="text" name="vitality" id="vitality" value="{$member->vitality}" />

<label for="agility">Agility</label>
<input type="text" name="agility" id="agility" value="{$member->agility}" />

<label for="dexterity">Dexterity</label>
<input type="text" name="dexterity" id="dexterity" value="{$member->dexterity}" />

<label for="damage">Damage</label>
<input type="text" name="damage" id="damage" value="{$member->damage}" />

<label for="kills">Kills</label>
<input type="text" name="kills" id="kills" value="{$member->kills}" />

<label for="deaths">Deaths</label>
<input type="text" name="deaths" id="deaths" value="{$member->deaths}" />


<br />
<input class="button" type="submit" value="Edit" name="edit" />

</form>

{include file="admin/footer.tpl"}
