{include file="header.tpl" TITLE="Event Log"}

{if $logs}
	<form method="post" action="index.php?mod=EventLog&act=clear">
	<input type="submit" value="{$LANGUAGE_Clear_Messages}" />
	</form>

	<span class="space"></span>

	{foreach from=$logs item=log}
		<div class="block">
		{if $log->status == 0}
			<span class="red"><strong>{$log->time|date_format:'%B %e, %Y %l:%M %p'}</strong></span>
		{else}
			{$log->time|date_format:'%B %e, %Y %l:%M %p'}
		{/if}
		<span class="space"></span>
		{$log->message}
		<span class="space"></span>
		</div>
	{/foreach}
{else}
	<p>
	<strong>{$LANGUAGE_You_have_no_log_messages}</strong>
	</p>
{/if}

{include file="footer.tpl"}