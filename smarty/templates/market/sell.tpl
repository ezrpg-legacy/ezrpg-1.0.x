{include file="header.tpl" TITLE="Sell"}

<h1Put on sell</h1>
<div class="right"><div id="nav">
	<ul>
  <li><a href="index.php?mod=Market">Market</a></li>
</ul>
</div></div>		
		
		<p>
    Here you can put items for sell..
		</p>
		
</center><form action="index.php?mod=Market&act=sell&move=dosell" method="post">
        <label>Item</label>
        <select name="item">
        <option></option>
          <optgroup label="Mines">
          <option>Rocks</option>
          <option>Copper</option>
          <option>Diamonds</option>
          </optgroup>
          <optgroup label="Items">
          <option></option>
          </optgroup>          
        </select>
         <label>Amount to sell</label>
         <input type="text" name="amount" value="1">
         <label>Price</label>
         <input type="text" name="price" value="1"><br />         
         <input type="submit" value="Sell">
        </form></center>

{include file="footer.tpl"}