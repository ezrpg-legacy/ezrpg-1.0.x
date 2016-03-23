{include file="header.tpl" TITLE="Job Agency"}

<h1>Job</h1>
<p>
Welcome to the Job agency! What kind of work do you want to do?
</p>

<ul>
<li><a href="index.php?mod=Job&work=0">{$work_strength}</a></li>
<li><a href="index.php?mod=Job&work=1">{$work_vitality}</a></li>
<li><a href="index.php?mod=Job&work=2">{$work_agility}</a></li>
<li><a href="index.php?mod=Job&work=3">{$work_dexterity}</a></li>
</ul>

{include file="footer.tpl"}
