{include file="header.tpl" TITLE="Forum"}

<h1> Forum :: Topics</h1>

{if $forumTops == TRUE}
[<a href="index.php?mod=Forum&act=createTopic">New Topic</a>]<br />
<table width="100%">
  <tr>
    <th style="text-align: left;">Topic</th>
    <th style="text-align: left;">Starter</th>
	<th style="text-align: left;">Date</th>
	<th style="text-align: left;">Action</th>
  </tr>

{foreach from=$forumTops item=forumTops1}
<tr>
    <td>{$forumTops1->title}</td>
    <td>{$forumTops1->starter}</td>
	<td>{$forumTops1->date|date_format:'%B %e, %Y %l:%M %p'}</td>
    <td>
    <a href="index.php?mod=Forum&act=read&id={$forumTops1->id}" title="Read" \>Read</a> 
    
    {if $player->username == $forumTops1->starter}
    </br>
    <a href="index.php?mod=Forum&act=deltopic&id={$forumTops1->id}" title="Del" \>Del</a>
   
    </br>
    
    {if $forumTops1->topic == 'ON'}
	<a href="index.php?mod=Forum&act=topicoff&id={$forumTops1->id}">
	Topic Schreibmodus
	</a>
	{else}
	<a href="index.php?mod=Forum&act=topicon&id={$forumTops1->id}">
	Topic Lesemodus
	</a>
	{/if}
    
    {/if}
    </td>
  </tr>
{/foreach}
</table>

{else}
	There are no topics.<br />
	<a href="index.php?mod=Forum">Go back</a> or <a href="index.php?mod=Forum&act=createTopic">add a new topic</a>
{/if}

{include file="footer.tpl"}