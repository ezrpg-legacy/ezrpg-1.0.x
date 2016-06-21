<?php

/* BlackJack module for EZRPG by tREMor  */
/* Stable Version 1 */
/* Please keep this information in header */


defined('IN_EZRPG') or exit;

class Module_BlackJack extends Base_Module
{

    public function start()
    {
        requireLogin();
		
			/* First, we have the suits */
			$suits = array (
			"Spades", "Hearts", "Clubs", "Diamonds"
			);

			/* Next, we declare the faces*/
			$faces = array (
			"Two"=>2, "Three"=>3, "Four"=>4, "Five"=>5, "Six"=>6, "Seven"=>7, "Eight"=>8,
			"Nine"=>9, "Ten"=>10, "Jack"=>10, "Queen"=>10, "King"=>10, "Ace"=>11
			);
			
			/* Now build the deck by combining the faces and suits. */
			$deck = array();

			foreach ($suits as $suit) {
				$keys = array_keys($faces);
				foreach ($keys as $face) {
					$deck[] = array('face'=>$face,'suit'=>$suit);
				}
			}

			/* Next, you can shuffle up the deck and pull a random card. */
			shuffle($deck);
			$hand = array();
		
      
		if (empty($_POST))
		{	
		 $this->tpl->assign('dealerhand', '<p align=center>Welcome To BlackJack, Place Your Bet!</p>');
		 $this->tpl->assign('yourhand', '<p align=center><input type="text" name="playerbet"></p>' );
		 $this->tpl->assign('handresults', '<input type="submit" name="submit" value="play" />');
		 $this->tpl->display('blackjack.tpl');
		}
		

	
		else if ($_POST['submit'] == 'play') 
		{
		    // This should give us our first 2 cards for the player and the dealer
			
			$playerbet = $_POST['playerbet'];
					
			if ($this->player->money < $playerbet)
			{
				 $this->tpl->assign('dealerhand', '<p align=center>Try A Smaller Bet!</p>');
				 $this->tpl->assign('yourhand', '<p align=center><input type="text" name="playerbet"></p>' );
				 $this->tpl->assign('handresults', '<input type="submit" name="submit" value="play" />');
				 $this->tpl->display('blackjack.tpl');
				exit;
			} 
			
			if ($playerbet < 5)
			{
				 $this->tpl->assign('dealerhand', '<p align=center>Must Bet Atleast 5 To Play Here!</p>');
				 $this->tpl->assign('yourhand', '<p align=center><input type="text" name="playerbet"></p>' );
				 $this->tpl->assign('handresults', '<input type="submit" name="submit" value="play" />');
				 $this->tpl->display('blackjack.tpl');
				exit;
			} 

			
			// TAKE THE CASH NOW!!! SO THEY CANT QUIT OUT
			$query = $this->db->execute('UPDATE `<ezrpg>players` SET `money`=? WHERE `id`=?', array($this->player->money - $playerbet, $this->player->id)); 
			
		  
			for ($i = 0; $i < 2; $i++) 
			{
			$hand[] = array_shift($deck);
			$dealer[] = array_shift($deck);
			}
			
			$handstr = serialize($hand);
			$deckstr= serialize($deck);
			$dealerstr= serialize($dealer);
			
			$this->tpl->assign('playerbet',$playerbet);
			$this->tpl->assign('handstr',$handstr);
			$this->tpl->assign('deckstr',$deckstr);
			$this->tpl->assign('dealerstr',$dealerstr);
			
			// Get players score & print the cards.
			$cardvalue = 0;
			$acecount = 0;
			$evi = 0;
		
			foreach ($hand as $card) {
				$cardvalue = intval($cardvalue) + intval($faces[$card['face']]);
				if ($card['face'] == 'Ace') { 
					$acecount = $acecount + 1;
				}
			}
			// The tricky case of counting aces.
			for ($evi = 0; $evi < $acecount; $evi += 1)	{
				if ($cardvalue > 21) {
					$cardvalue = $cardvalue - 10; 	
				}
			}
			$playerscore = $cardvalue;
			
			$yourhand = "<br><br> Your Bet:  $playerbet  Your Score:  $playerscore ";
			$yourhand .= "Your Cards: <br>";
			// Print the cards out
			foreach ($hand as $index =>$card) {
    	    $yourhand .= "<img src='cards/".$card['face'].'of'.$card['suit'].".png'>";
			}
	
			
			// Get Dealers score & print the cards.
			$cardvalue = 0;
			$acecount = 0;
			$evi = 0;
		
			foreach ($dealer as $card) {
				$cardvalue = intval($cardvalue) + intval($faces[$card['face']]);
				if ($card['face'] == 'Ace') { 
					$acecount = $acecount + 1;
				}
			}
			// The tricky case of counting aces.
			for ($evi = 0; $evi < $acecount; $evi += 1)	{
				if ($cardvalue > 21) {
					$cardvalue = $cardvalue - 10; 	
				}
			}
			$dealerscore = $cardvalue;
	
			$dealerhand = "<br>Dealer Score: ?? ";
			$dealerhand .= "Dealer Cards: <br>";
			// Print the cards out
			$dealerhand .= "<img src='cards/redback.png'>";
			$dealerhand .= "<img src='cards/".$dealer[1]['face'].'of'.$dealer[1]['suit'].".png'>";

		
			// Check everything and print results
			if (($playerscore == 21) &&  ($_POST['submit'] == 'play')) {
			$query = $this->db->execute('UPDATE `<ezrpg>players` SET `money`=? WHERE `id`=?', array($this->player->money + (($playerbet)*(3)), $this->player->id)); 
			$handresults = "<p>Excellent 21!!!  You Win!!!</p>";
			$handresults .=  "Bet: <input type='text' name='playerbet' value='$playerbet'> <input type='submit' name='submit' value='play' />";
			}

			else if ($playerscore == 21)  {
			$query = $this->db->execute('UPDATE `<ezrpg>players` SET `money`=? WHERE `id`=?', array($this->player->money + (($playerbet)*(3)), $this->player->id)); 
			$handresults =  "<p>Hooray!!! You Win!!!</p>";
			$handresults .=  "Bet: <input type='text' name='playerbet' value='$playerbet'> <input type='submit' name='submit' value='play' />";
			}

			else if (($playerscore < 21) &&  ($_POST['submit'] == 'hit me')) {
			$handresults =  "<input type='submit' name='submit' value='hit me' />";
			$handresults .=  "<input type='submit' name='submit' value='stay' />";
			}

			else if (($playerscore < 21) &&  ($_POST['submit'] == 'play')) {
			$handresults =  "<input type='submit' name='submit' value='hit me' />";
			$handresults .=  "<input type='submit' name='submit' value='stay' />";
			}

			else if ($playerscore  > 21) {
			$handresults =  "<p>Sorry, You Bust</p>";
			$handresults .=  "Bet: <input type='text' name='playerbet' value='$playerbet'> <input type='submit' name='submit' value='play' />";
			}

			else {

			}
			
			$handstr = $_POST['handstr'];
			$dealerstr = serialize($dealer);
			$deckstr= serialize($deck);
			
			
						
			// assign to variables
			$this->tpl->assign('yourhand', $yourhand);
			$this->tpl->assign('dealerhand', $dealerhand);
			$this->tpl->assign('handresults', $handresults);
			
			// send to template
			$this->tpl->display('blackjack.tpl');		 
		}
		
		

		
		
		/* HIT ME MODE */
		else if ($_POST['submit'] == 'hit me') 
		{
		
		$playerbet = $_POST['playerbet'];
		
			$dealer = unserialize($_POST['dealerstr']);
			$hand = unserialize($_POST['handstr']);
			$deck = unserialize($_POST['deckstr']);
			$hand[] = array_shift($deck);
			
			$dealerstr = $_POST['dealerstr'];
			$handstr = serialize($hand);
			$deckstr= serialize($deck);

			$this->tpl->assign('playerbet',$playerbet);
			$this->tpl->assign('handstr',$handstr);
			$this->tpl->assign('deckstr',$deckstr);
			$this->tpl->assign('dealerstr',$dealerstr);
			
				
			
			// Get players score & print the cards.
			$cardvalue = 0;
			$acecount = 0;
			$evi = 0;
		
			foreach ($hand as $card) {
				$cardvalue = intval($cardvalue) + intval($faces[$card['face']]);
				if ($card['face'] == 'Ace') { 
					$acecount = $acecount + 1;
				}
			}
			// The tricky case of counting aces.
			for ($evi = 0; $evi < $acecount; $evi += 1)	{
				if ($cardvalue > 21) {
					$cardvalue = $cardvalue - 10; 	
				}
			}
			$playerscore = $cardvalue;
			
			$yourhand = "<br><br> Your Bet:  $playerbet  Your Score:  $playerscore ";
			$yourhand .= "Your Cards: <br>";
			// Print the cards out
			foreach ($hand as $index =>$card) {
    	    $yourhand .= "<img src='cards/".$card['face'].'of'.$card['suit'].".png'>";
			}
	
	

			// Get Dealers score & print the cards.
			$cardvalue = 0;
			$acecount = 0;
			$evi = 0;
		
			foreach ($dealer as $card) {
				$cardvalue = intval($cardvalue) + intval($faces[$card['face']]);
				if ($card['face'] == 'Ace') { 
					$acecount = $acecount + 1;
				}
			}
			// The tricky case of counting aces.
			for ($evi = 0; $evi < $acecount; $evi += 1)	{
				if ($cardvalue > 21) {
					$cardvalue = $cardvalue - 10; 	
				}
			}
			$dealerscore = $cardvalue;
	
			$dealerhand = "<br>Dealer Score: ?? ";
			$dealerhand .= "Dealer Cards: <br>";
			// Print the cards out
			$dealerhand .= "<img src='cards/redback.png'>";
			$dealerhand .= "<img src='cards/".$dealer[1]['face'].'of'.$dealer[1]['suit'].".png'>";

			
			// Check everything and print results
				if ($playerscore == 21)  {
				$query = $this->db->execute('UPDATE `<ezrpg>players` SET `money`=? WHERE `id`=?', array($this->player->money + (($playerbet)*(3)), $this->player->id)); 
				$handresults =  "<p>Hooray!!! You Win!!!</p>";
			    $handresults .=  "Bet: <input type='text' name='playerbet' value='$playerbet'> <input type='submit' name='submit' value='play' />";
				}

				else if (($playerscore < 21) &&  ($_POST['submit'] == 'hit me')) {
				$handresults =  "<input type='submit' name='submit' value='hit me' />";
				$handresults .=  "<input type='submit' name='submit' value='stay' />";
				}

				else if (($playerscore < 21) &&  ($_POST['submit'] == 'play')) {
				$handresults =  "<input type='submit' name='submit' value='hit me' />";
				$handresults .=  "<input type='submit' name='submit' value='stay' />";
				}

				else if ($playerscore  > 21) {
				$handresults =  "<p>Sorry, You Bust</p>";
			    $handresults .=  "Bet: <input type='text' name='playerbet' value='$playerbet'> <input type='submit' name='submit' value='play' />";
				}
							
				else {

				}

				$handstr = $_POST['handstr'];
				$dealerstr = serialize($dealer);
				$deckstr= serialize($deck);
			
			
						
			// assign to variables
			$this->tpl->assign('yourhand', $yourhand);
			$this->tpl->assign('dealerhand', $dealerhand);
			$this->tpl->assign('handresults', $handresults);
			
			// send to template
			$this->tpl->display('blackjack.tpl');				
				
		
		}
		/* END OF HIT ME MODE */



	
		
		/* STAY MODE */
		else if ($_POST['submit'] == 'stay') 
		{
		
		$playerbet = $_POST['playerbet'];
		
			$dealer = unserialize($_POST['dealerstr']);
			$hand = unserialize($_POST['handstr']);
			$deck = unserialize($_POST['deckstr']);
			
			$dealerstr = $_POST['dealerstr'];
			$handstr = serialize($hand);
			$deckstr= serialize($deck);
			
			$this->tpl->assign('playerbet',$playerbet);
			$this->tpl->assign('handstr',$handstr);
			$this->tpl->assign('deckstr',$deckstr);
			$this->tpl->assign('dealerstr',$dealerstr);
			
			
			// Get players score & print the cards.
			$cardvalue = 0;
			$acecount = 0;
			$evi = 0;
		
			foreach ($hand as $card) {
				$cardvalue = intval($cardvalue) + intval($faces[$card['face']]);
				if ($card['face'] == 'Ace') { 
					$acecount = $acecount + 1;
				}
			}
			// The tricky case of counting aces.
			for ($evi = 0; $evi < $acecount; $evi += 1)	{
				if ($cardvalue > 21) {
					$cardvalue = $cardvalue - 10; 	
				}
			}
			$playerscore = $cardvalue;
			
			$yourhand = "<br><br> Your Bet:  $playerbet  Your Score:  $playerscore ";
			$yourhand .= "Your Cards: <br>";
			// Print the cards out
			foreach ($hand as $index =>$card) {
    	    $yourhand .= "<img src='cards/".$card['face'].'of'.$card['suit'].".png'>";
			}				

			
			
			// Get Dealers score & print the cards.
			$cardvalue = 0;
			$acecount = 0;
			$evi = 0;
		
			foreach ($dealer as $card) {
				$cardvalue = intval($cardvalue) + intval($faces[$card['face']]);
				if ($card['face'] == 'Ace') { 
					$acecount = $acecount + 1;
				}
			}
			// The tricky case of counting aces.
			for ($evi = 0; $evi < $acecount; $evi += 1)	{
				if ($cardvalue > 21) {
					$cardvalue = $cardvalue - 10; 	
				}
			}
			$dealerscore = $cardvalue;
				
			
			if ($dealerscore < 17) {
			
					while($dealerscore < 17) 
					{
						$dealer[] = array_shift($deck);
						
						$cardvalue = 0;
						$acecount = 0;
						$evi = 0;
					
						foreach ($dealer as $card) {
							$cardvalue = intval($cardvalue) + intval($faces[$card['face']]);
							if ($card['face'] == 'Ace') { 
								$acecount = $acecount + 1;
							}
						}
						// The tricky case of counting aces.
						for ($evi = 0; $evi < $acecount; $evi += 1)	{
							if ($cardvalue > 21) {
								$cardvalue = $cardvalue - 10; 	
							}
						}
						$dealerscore = $cardvalue;
					}
			}
			
			$dealerhand = "<br>Dealer Score: $dealerscore ";
			$dealerhand .= "Dealer Cards: <br>";
					
			// Print the cards out
			foreach ($dealer as $index =>$card) {
    	    $dealerhand .= "<img src='cards/".$card['face'].'of'.$card['suit'].".png'>";
			}
	
	
			// Check everything and print results

			if ($dealerscore  > 21) {
			$query = $this->db->execute('UPDATE `<ezrpg>players` SET `money`=? WHERE `id`=?', array($this->player->money + (($playerbet)*(2)), $this->player->id)); 
			$handresults =  "<p>Dealer Busts, You Win!</p>";
			$handresults .=  "Bet: <input type='text' name='playerbet' value='$playerbet'> <input type='submit' name='submit' value='play' />";
			}

			else if ($playerscore == $dealerscore) {
			$query = $this->db->execute('UPDATE `<ezrpg>players` SET `money`=? WHERE `id`=?', array($this->player->money + (($playerbet)*(1)), $this->player->id)); 
			$handresults =  "<p>It's a Push!</p>";
			$handresults .=  "Bet: <input type='text' name='playerbet' value='$playerbet'> <input type='submit' name='submit' value='play' />";
			}

			else if ($playerscore > $dealerscore) {
			$query = $this->db->execute('UPDATE `<ezrpg>players` SET `money`=? WHERE `id`=?', array($this->player->money + (($playerbet)*(1)), $this->player->id)); 
			$handresults =  "<p>Congratulations, You Win!</p>";
			$handresults .=  "Bet: <input type='text' name='playerbet' value='$playerbet'> <input type='submit' name='submit' value='play' />";
			}
				
			else if ($playerscore < $dealerscore) {
			$handresults =  "<p>Sorry, You Are A Loser!</p>";
			$handresults .=  "Bet: <input type='text' name='playerbet' value='$playerbet'> <input type='submit' name='submit' value='play' />";
			}
				
			else {

			}
		
			// assign to variables
			$this->tpl->assign('yourhand', $yourhand);
			$this->tpl->assign('dealerhand', $dealerhand);
			$this->tpl->assign('handresults', $handresults);
			
			// send to template
			$this->tpl->display('blackjack.tpl');				
				
			
		}
		/* END OF STAY MODE */
		

    }
	
			
}
?>