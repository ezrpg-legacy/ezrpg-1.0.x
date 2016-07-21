{include file="header.tpl" TITLE="Account Settings"}

<h1>{$LANGUAGE_Account_Settings}</h1>


<div class=left align=center>
<p>
{$LANGUAGE_Here_you_can_change_your_password}
</p>

<form method="post" action="index.php?mod=AccountSettings">

<label>{$LANGUAGE_Current_Password}</label>
<input type="password" size="40" name="current_password" autocomplete="off" />

<label>{$LANGUAGE_New_Password}</label>
<input type="password" size="40" name="new_password" autocomplete="off" />

<label>{$LANGUAGE_Verify_New_Password}</label>
<input type="password" size="40" name="new_password2" autocomplete="off" />

<br />
<input name="change_password" type="submit" value="{$LANGUAGE_Change_Password}" class="button" />
</form>
</div>

<div class=right align=center>
<p>
{$LANGUAGE_Here_you_can_change_your_game_language}
</p>
<label>{$LANGUAGE_Select_your_language}</label>
<form method="post" action="index.php?mod=AccountSettings">
<select name="selection">
{foreach from=$language item=lang}
  <option value="{$lang->name}">{$lang->name}</option>
{/foreach}
</select>  

<input name="change_language" type="submit" value="{$LANGUAGE_Change_language}" class="button" />
</form>
</div>



{include file="footer.tpl"}