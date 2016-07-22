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
<p><B>
Community development engine ezRPG.</B>
</p>

<p>
<B>
author ezRPG engine:
</B>
Zeggy
</p>
<p><B>
developers version "1.0.x -" engine:</B>
Zeggy - Sweden?;
Booher - Jake Booher, USA;
UAKTags - Tim Garrity, USA;
EdwardBlack - Edward Babikov, Russia;  
</p>
<p>
<B>
developers modules version "1.0.x -" engine:
</B>
Zeggy - Sweden?;
Booher - Jake Booher, USA;
UAKTags - Tim Garrity, USA;
JesterC;
tREMor;
Hedge;
21Lockdown;
Waizujin - Marcus Krueger;
EdwardBlack - Edward Babikov, Russia;
</p>
<p>
<B>
test version "1.0.3 - 1.0.6" engine:
</B>
EdwardBlack - Edward Babikov, Russia;
</p>
{include file="admin/footer.tpl"}