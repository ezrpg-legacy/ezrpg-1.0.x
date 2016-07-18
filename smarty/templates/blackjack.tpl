{include file="header.tpl" TITLE="BlackJack"}

<h1>BlackJack</h1>

<form method='post'>

<input type='hidden' name='playerbet' value = '{$playerbet}' />
<input type='hidden' name='handstr' value = '{$handstr}' />
<input type='hidden' name='deckstr' value = '{$deckstr}' />
<input type='hidden' name='dealerstr' value = '{$dealerstr}' />


<table width="100%" cellpadding="2" cellspacing="0">
<tr><td colspan="2">{$dealerhand}</td></tr>
<tr><td colspan="2">{$yourhand}</td></tr>
<tr><td colspan="2" align="center">{$handresults}</td></tr>
</table>

</form>



{include file="footer.tpl"}