{include file="header.tpl" TITLE="Bank"}

<h1>{$LANGUAGE_Bank}</h1>

<p>
  {$LANGUAGE_Welcome} <strong>{$player->username}</strong>!
  <br />
  {$LANGUAGE_You_have} <strong>{$player->bank}</strong> {$LANGUAGE_money_in_your_bank}!
</p>

<div class="left">
 <form method="post" action="index.php?mod=Bank&act=deposit">
  <label>{$LANGUAGE_Amount_to_Deposit}</label>
  <input type="text" name="amount" autocomplete="off" value="{$player->money}" />
  <br />
  <input type="submit" value="{$LANGUAGE_Deposit}" />
  </form>
</div>


<div class="right">
  <form method="post" action="index.php?mod=Bank&act=withdraw">
  <label>{$LANGUAGE_Amount_to_Withdraw}</label>
  <input type="text" name="amount" autocomplete="off" value="{$player->bank}" />
  <br />
  <input type="submit" value="{$LANGUAGE_Withdraw}" />
  </form>
</div>

{include file="footer.tpl"}