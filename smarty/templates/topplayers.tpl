{include file="header.tpl" TITLE="Top 10 Players"} 
   
<h2>{$LANGUAGE_Top_10_Players}</h2> 
   
 <table width="90%"> 
   <tr> 
     <th style="text-align: left;">{$LANGUAGE_Username}</th> 
     <th style="text-align: left;"><a href="index.php?mod=TopPlayers&order=level">{$LANGUAGE_Level}</a></th> 
     <th style="text-align: left;"><a href="index.php?mod=TopPlayers&order=money">{$LANGUAGE_money}</a></th>
   </tr> 
   
 {foreach from=$members item=member} 
   <tr> 
     <td>{$member->username}</td> 
     <td>{$member->level}</td> 
     <td>{$member->money}</td>
   </tr> 
 {/foreach} 
 </table> 
   
{include file="footer.tpl"}