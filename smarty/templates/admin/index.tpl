{include file="admin/header.tpl" TITLE="Admin"}
<h1>Admin</h1>
<h2>Admin Modules</h2>
<<<<<<< HEAD
<ul>
        <li><a href="index.php?mod=Members">Member Management</a></li>
        <li><a href="index.php?mod=BotBattle">BotBattle</a></li>
        <li><a href="index.php?mod=ModuleList">Module List</a></li>
</ul>

=======
{$MENU_AdminModules}
>>>>>>> refs/remotes/origin/development
<p>
If you install extra admin modules, edit <em>smarty/templates/admin/index.tpl</em> to add links above.
</p>

{include file="admin/footer.tpl"}
