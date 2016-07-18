{include file="header.tpl" TITLE="Register"}

<h3>Registration</h3>

<p>
Want to join game? Fill a form below to be registered!
</p>

<form method="POST" action="index.php?mod=Register">
<table width="100%">
 <tr>
   <td>
   <label>Username</label>
<input type="text" size="40" name="username"{if $GET_USERNAME != ""} value="{$GET_USERNAME}"{/if} />
  </td>
   <td>
<label>Sex</label>
<select name='sex' type='dropdown'>
<option value='Male'>Male</option>
<option value='Female'>Female</option>
<option value='Shemale'>Shemale</option>
</select>
   </td>
   <td>
<label>Language</label>
<select name='lang' type='dropdown'>
<option value='english'>english</option>
<option value='deutsch'>deutsch</option>
<option value='russian'>russian</option>
</select>
   </td>
 </tr>
<tr>
    <td>
   <label>Password</label>
<input type="password" size="40" name="password" />
 <label>Verify Password</label>
<input type="password" size="40" name="password2" />
   </td>
  <td>
<label>Email</label>
<input type="text" size="40" name="email"{if $GET_EMAIL != ""} value="{$GET_EMAIL}"{/if} />
<label>Verify Email</label>
<input type="text" size="40" name="email2"{if $GET_EMAIL2 != ""} value="{$GET_EMAIL2}"{/if} />
</td>
</tr>
<tr>
<td>
<br>
<img src="./captcha.php" /><br>
</td>
<td>
<label>Enter The Code</label>
<input type="text" size="40" name="reg_verify" autocomplete="off" />

</td>
<td> <label>Confirm data</label>
<input name="register" type="submit" value="Register!" class="button" />
</td>
</tr>
</table>
</form>

{include file="footer.tpl"}