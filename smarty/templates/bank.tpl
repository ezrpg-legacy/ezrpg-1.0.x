{include file="header.tpl" TITLE="Bank"}

<h1>Bank</h1>

<p>
  Welcome, <strong>{$player->username}</strong>!
  <br />
  You have <strong>{$player->bank}</strong> money in your bank!
<br /><br />
<a href="index.php?mod=City">to return to the city...</a>
</p>
<div class="left">
  <h2>Deposit</h2>
  <form method="post" action="index.php?mod=Bank&act=deposit">
  <label>Amount to Deposit</label>
  <input type="text" name="amount" autocomplete="off" value="{$player->money}" />
  <br />
  <input type="submit" value="Deposit" />
  </form>
</div>


<div class="right">
  <h2>Withdraw</h2>
  <form method="post" action="index.php?mod=Bank&act=withdraw">
  <label>Amount to Withdraw</label>
  <input type="text" name="amount" autocomplete="off" value="{$player->bank}" />
  <br />
  <input type="submit" value="Withdraw" />
  </form>
</div>

{include file="footer.tpl"}