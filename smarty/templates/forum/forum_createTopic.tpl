{include file="header.tpl" TITLE="Forum"}

<h1> Forum :: Add Topic</h1>


<form method="POST" action="index.php?mod=Forum&act=addTopic">

<div class="left" align="center">

<p>
	<select name="catID">
		<option value="">Select</option>
		{foreach from=$forumCat item=forumCat1}
		<option value="{$forumCat1->id}">{$forumCat1->title}</option>
		{/foreach}
	</select><br />
	</br>
	<input type="text" name="title" value="Title:" \><br />
	</br>
	<textarea name="message" rows="7" cols="40" \></textarea>
	</br>
	</br>
	<input type="submit" name="addTopic" value="Add Topic!" \>
</br></br>
	<input type="reset" name="reset" value="Reset!">
</p>

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



{include file="footer.tpl"}