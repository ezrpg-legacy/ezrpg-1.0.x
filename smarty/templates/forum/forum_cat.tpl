{include file="header.tpl" TITLE="Forum"}

<h1>Forum </h1>

{if $forumCats == TRUE}
[<a href="index.php?mod=Forum&act=createTopic">Add Topic</a>]

</br>
</br><hr>

<table width="100%" border=2>
{foreach from=$forumCats item=forumCats1}
<tr>

<td>
<h3>
<a href="index.php?mod=Forum&act=cat&id={$forumCats1->id}">{$forumCats1->title}</a>
</h3>
{$forumCats1->description}
</br>
Existing Themes:{$count[$forumCats1->id]}
</td>


{if $count[$forumCats1->id] > 0}
<td>
The Last Entry: 
{if {$topid[$forumCats1->id]} > 0}
<a href="index.php?mod=Forum&act=read&id={$topid[$forumCats1->id]}">GoTO</a>
{/if}
</br>
{$title[$forumCats1->id]}  
</br>
From:{$owner[$forumCats1->id]}
</br>
{$data[$forumCats1->id]|date_format:'%B %e, %Y %l:%M %p'}
</td>
{/if}

</tr>

{/foreach}
</table>


{else}
	The admin needs to add some cats to the game.<br />
	Come back later!
{/if}

{include file="footer.tpl"}