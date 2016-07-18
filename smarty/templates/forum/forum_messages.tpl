{include file="header.tpl" TITLE="Forum"}

<table width="100%" border=2 bgcolor="#C9E3DC" align="center"> 
	{foreach from=$firstMessage item=firstMessage1}

<tr align="center">
	<td width="140">
	<a href="index.php?mod=ViewPlayer&who={$firstMessage1->starter}">
	{$firstMessage1->starter}
	</a>
	</td>
	<td>
    says @ {$firstMessage1->date|date_format:'%B %e, %Y %l:%M %p'}:
    </td>
    <td width="50">
    Starter
    </td>
</tr>
    
<tr>
    <td colspan="3">
	{$firstMessage1->message}
	</td>	
</tr>	
	
	{/foreach}
</table>

<table width="100%" border=2 bgcolor="#E3D9C9"> 
	{foreach from=$messages item=messages1}

<tr align="center">
	<td width="140">
	<a href="index.php?mod=ViewPlayer&who={$messages1->poster}">
	{$messages1->poster}
	</a>
	</td>
	<td>
    says @ {$messages1->date|date_format:'%B %e, %Y %l:%M %p'}:
    </td>
    <td width="50">
    Reply
    </td>
</tr>
    
<tr>
    <td colspan="3">
	{$messages1->message}
	</td>	
</tr>	
	
	{/foreach}
</table>
	
		
	
	
	{if $firstMessage1->topic == ON}
	
	<span class="space"></span>
	
	<span style="display: block; width: 90%; text-align: center;">
	<strong>
	<a href="index.php?mod=Forum&act=read&id={$firstMessage1->id}&page={$prevpage}">Previous Page</a> | <a href="index.php?mod=Forum&act=read&id={$firstMessagey->id}&page={$nextpage}">Next Page</a>
	</strong>
	</span>
	
	<div class="left" align="center">
	
	
	<h1>Reply</h1>
	<form method="POST" action="index.php?mod=Forum&act=addReply&id={$firstMessage1->id}">
		<textarea name="reply" rows="7" cols="40" \></textarea><br /><br />
		<input type="submit" name="addReply" value="Add Reply" \>
		
		</div>


<div class="right" align="center">

</br>

<label>Smileys Liste</label>

<select>
        <option value=""></option>

		<option value="">:-)  -> Smile</option>
		<option value="">:-(  -> Sad</option>
		
</select>

</br>

<label>BBcodes Liste</label>

<select>
        <option value=""></option>
        
		<option value="">[b][/b]  Fett</option>
		<option value="">[i][/i]  Kursiv</option>
		<option value="">[u][/u]  Unterstrichen</option>
		<option value="">[list][/list]  Liste</option>
		<option value="">[*][/*]  Listenpunkt</option>
		<option value="">[url][/url]  Link</option>
		<option value="">[link][/link]  Link</option>
		<option value="">[img][/img]  Bild</option>
		<option value="">[bild][/bild]  Bild</option>
		
</select>

</br>


</div>
		
	</form>

{/if}

{include file="footer.tpl"}