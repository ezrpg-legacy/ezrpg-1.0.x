{include file="admin/header.tpl" TITLE="Admin"}

<h1>Admin Modules</h1>
<p>This is a list of modules that add or modify the Admin Panel.</p>
<table width="100%" style="font-size: 100%;">
	<tr>
		<th style="text-align: left;">Name</th>
                                           <th style="text-align: left;">Version</th>
		<th style="text-align: left;">Description</th>
		<th style="text-align: left;">Author</th>
	</tr>
	{foreach from=$adminModules key=module item=m}
		<tr>
			<td>{$m.name}</td>
                                                                <td>{$m.ver}</td>
			<td>{$m.desc}</td>
			<td>{$m.author}</td>
		</tr>
	{/foreach}
</table>

<br />
{include file="admin/footer.tpl"}