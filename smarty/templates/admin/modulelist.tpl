{include file="admin/header.tpl" TITLE="Manage Modules"}

<h1>Game Modules</h1>
<p>This is a list of modules that add or modify the games front-end.</p>
<table width="100%" style="font-size: 100%;">
	<tr>
		<th style="text-align: left;">Name</th>
                                           <th style="text-align: left;">Version</th>
		<th style="text-align: left;">Description</th>
		<th style="text-align: left;">Author</th>
	</tr>
	{foreach from=$gameModules key=module item=m}
		<tr>
			<td>{$m.name}</td>
                                                                <td>{$m.ver}</td>
			<td>{$m.desc}</td>
			<td>{$m.author}</td>
		</tr>
	{/foreach}
</table>

{include file="admin/footer.tpl"}