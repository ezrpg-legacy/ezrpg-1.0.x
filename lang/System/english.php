<?php
//error 404
$tpl->assign('LANGUAGE_SYS_ERROR_404',         'ERROR 404');
$tpl->assign('LANGUAGE_SYS_We_could_not_locate_the_page_you_were_looking_for',         'We could not locate the page you were looking for!');

//coming soon
$tpl->assign('LANGUAGE_SYS_Coming_soon',         'Coming soon!');
$tpl->assign('LANGUAGE_SYS_This_feature_is_coming_soon',         'This feature is coming soon!');

//header
$tpl->assign('LANGUAGE_SYS_Players_Online',         'Players Online');
$tpl->assign('LANGUAGE_SYS_Level',         'Level');
$tpl->assign('LANGUAGE_SYS_Gold',         'Gold');
$tpl->assign('LANGUAGE_SYS_EXP',         'EXP');
$tpl->assign('LANGUAGE_SYS_HP',         'HP');
$tpl->assign('LANGUAGE_SYS_Energy',         'Energy');
$tpl->assign('LANGUAGE_SYS_New_Log_Events',         'New Log Events!');
$tpl->assign('LANGUAGE_SYS_Monday',         'Monday - ');
$tpl->assign('LANGUAGE_SYS_Tuesday',         'Tuesday - ');
$tpl->assign('LANGUAGE_SYS_Wednesday',         'Wednesday - ');
$tpl->assign('LANGUAGE_SYS_Thursday',         'Thursday - ');
$tpl->assign('LANGUAGE_SYS_Friday',         'Friday - ');
$tpl->assign('LANGUAGE_SYS_Saturday',         'Saturday - ');
$tpl->assign('LANGUAGE_SYS_Sunday',         'Sunday - ');

//menu
$tpl->assign('LANGUAGE_SYS_Home',         'Home');
$tpl->assign('LANGUAGE_SYS_Event_Log',         'Event Log');
$tpl->assign('LANGUAGE_SYS_City',         'City');
$tpl->assign('LANGUAGE_SYS_Members',         'Members');
$tpl->assign('LANGUAGE_SYS_Account',         'Account');
$tpl->assign('LANGUAGE_SYS_Admin',         'Admin');
$tpl->assign('LANGUAGE_SYS_Logout',         'Logout');
$tpl->assign('LANGUAGE_SYS_Register',         'Register');

//logout
$_SESSION['You_have_been_logged_out']   =   'You have been logged out!';

//index
$_SESSION['Please_enter_your_username_and_password']   =   'Please enter your username and password!';
$_SESSION['Password_Set_as_Old_Method']   =   'Password Set as Old Method!';
$_SESSION['Please_check_your_username_password']   =   'Please check your username/password!';

//level_up
$_SESSION['You_have_leveled_up_You_gained_2_stat_points_and_1_max_energy']   =   'You have leveled up! You gained +2 stat points and +1 max energy!';

//check_session
$_SESSION['You_have_been_logged_out_due_to_inactivity']   =   'You have been logged out due to inactivity!';

//AccountSettings
$_SESSION['You_forgot_to_fill_in_something']   =   'You forgot to fill in something!';
$_SESSION['The_password_you_entered_does_not_match_this_account_s_password']   =   'The password you entered does not match this account\'s password.';
$_SESSION['Your_password_must_be_longer_than_3_characters']   =   'Your password must be longer than 3 characters!';
$_SESSION['You_didn_t_confirm_your_new_password_correctly']   =   'You didn\'t confirm your new password correctly!';
$_SESSION['You_have_changed_your_password']   =   'You have changed your password.';
$_SESSION['You_have_changed_your_language']   =   'You have changed your language.';
$tpl->assign('LANGUAGE_Account_Settings',         'Account Settings');
$tpl->assign('LANGUAGE_Here_you_can_change_your_password',         'Here you can change your password.');
$tpl->assign('LANGUAGE_Current_Password',         'Current Password');
$tpl->assign('LANGUAGE_New_Password',         'New Password');
$tpl->assign('LANGUAGE_Verify_New_Password',         'Verify New Password');
$tpl->assign('LANGUAGE_Change_Password',         'Change Password');
$tpl->assign('LANGUAGE_Here_you_can_change_your_game_language',         'Here you can change your game language.');
$tpl->assign('LANGUAGE_Select_your_language', 'Select your language.');
$tpl->assign('LANGUAGE_Change_language',         'Change Language');

//index
$tpl->assign('LANGUAGE_Home',         'Home');
$tpl->assign('LANGUAGE_Username',         'Username');
$tpl->assign('LANGUAGE_Password',         'Password');
$tpl->assign('LANGUAGE_Welcome_to_ezRPG_Login_now',         'Welcome to ezRPG! Login now!');
$tpl->assign('LANGUAGE_Login',         'Login!');
$tpl->assign('LANGUAGE_Registered',         'Registered');
$tpl->assign('LANGUAGE_Email',         'Email');
$tpl->assign('LANGUAGE_Kills_Deaths',         'Kills/Deaths');
$tpl->assign('LANGUAGE_You_have_stat_points_left_over',         'You have stat points left over!');
$tpl->assign('LANGUAGE_Spend_them_now',         'Spend them now!');
$tpl->assign('LANGUAGE_You_have_no_extra_stat_points_to_spend',         'You have no extra stat points to spend.');
$tpl->assign('LANGUAGE_Level',         'Level');
$tpl->assign('LANGUAGE_Gold',         'Gold');
$tpl->assign('LANGUAGE_Strength',         'Strength');
$tpl->assign('LANGUAGE_Vitality',         'Vitality');
$tpl->assign('LANGUAGE_Agility',         'Agility');
$tpl->assign('LANGUAGE_Dexterity',         'Dexterity');

//members
$tpl->assign('LANGUAGE_Username',         'Username');
$tpl->assign('LANGUAGE_Level',         'Level');
$tpl->assign('LANGUAGE_Previous_Page',         'Previous Page');
$tpl->assign('LANGUAGE_Next_Page',         'Next Page');

//Log
$tpl->assign('LANGUAGE_Clear_Messages',         'Clear Messages');
$tpl->assign('LANGUAGE_You_have_no_log_messages',         'You have no log messages!');
$_SESSION['You_have_cleared_your_event_log']   =   'You have cleared your event log!';

//city
$tpl->assign('LANGUAGE_City',         'City');
$tpl->assign('LANGUAGE_Player',         'Player');
$tpl->assign('LANGUAGE_World',         'World');
$tpl->assign('LANGUAGE_EventLog',         'Event Log');
$tpl->assign('LANGUAGE_Account',         'Account');
$tpl->assign('LANGUAGE_Forum',         'Forum');
$tpl->assign('LANGUAGE_MembersList',         'Members List');
$tpl->assign('LANGUAGE_TopPlayers',         'Top Players');
$tpl->assign('LANGUAGE_GameStatistics',         'Game Statistics');
$tpl->assign('LANGUAGE_MailBox',         'Mail Box');
$tpl->assign('LANGUAGE_Inventory',         'Inventory');
$tpl->assign('LANGUAGE_Bank',         'Bank');
$tpl->assign('LANGUAGE_BotBattle',         'BotBattle');
$tpl->assign('LANGUAGE_Battle',         'Battle');
$tpl->assign('LANGUAGE_BlackJack',         'BlackJack');
$tpl->assign('LANGUAGE_FiftyFifty',         'FiftyFifty');
$tpl->assign('LANGUAGE_ItemShop',         'Item Shop');
$tpl->assign('LANGUAGE_Market',         'Market');
$tpl->assign('LANGUAGE_Hospital',  'Hospital');

//Stat Points
$tpl->assign('LANGUAGE_Stat_Points',         'Stat Points');
$tpl->assign('LANGUAGE_Here_you_can_use_your_stat_points_to_increase_your_stats_You_have',         'Here you can use your stat points to increase your stats! You have');
$tpl->assign('LANGUAGE_points_to_use',         'points to use!');
$tpl->assign('LANGUAGE_You_receive_stat_points_when_you_first_sign_up_to_the_game_and_also_each_time_when_you_level_up',         'You receive stat points when you first sign up to the game, and also each time when you level up!');
$tpl->assign('LANGUAGE_This_increases_the_damage_you_do_in_battle_and_increases_your_weight_limit_so_you_can_carry_more_items',         'This increases the damage you do in battle, and increases your weight limit so you can carry more items.');
$tpl->assign('LANGUAGE_This_increases_the_amount_of_health_you_have_and_decreases_the_amount_of_damage_you_receive_in_battle',         'This increases the amount of health you have and decreases the amount of damage you receive in battle');
$tpl->assign('LANGUAGE_This_increases_your_chance_to_completely_dodge_and_attack_and_take_no_damage_in_battle',         'This increases your chance to completely dodge and attack and take no damage in battle!');
$tpl->assign('LANGUAGE_This_helps_you_aim_better_so_you_are_less_likely_to_miss_your_opponent',         'This helps you aim better so you are less likely to miss your oponent.');
$_SESSION['You_don_t_have_any_stat_points_left']   =   'You don\'t have any stat points left!';
$_SESSION['You_have_increased_your_strength']   =   'You have increased your strength!';
$_SESSION['You_have_increased_your_vitality']   =   'You have increased your vitality!';
$_SESSION['You_have_increased_your_agility']   =   'You have increased your agility!';
$_SESSION['You_have_increased_your_dexterity']   =   'You have increased your dexterity!';
$_SESSION['You_have_no_more_stat_points']   =   'You have no more stat points!';
$_SESSION['Strength']  =   'Strength';


//Bank
$tpl->assign('LANGUAGE_Deposit',         'Deposit');
$tpl->assign('LANGUAGE_Withdraw',         'Withdraw');
$tpl->assign('LANGUAGE_Welcome',         'Welcome,');
$tpl->assign('LANGUAGE_You_have',         'You have ');
$tpl->assign('LANGUAGE_money_in_your_bank',         ' money in your bank!');
$tpl->assign('LANGUAGE_Amount_to_Deposit',         'amount to deposit');
$tpl->assign('LANGUAGE_Amount_to_Withdraw',         'amount to withdraw');
$_SESSION['You_cannot_withdraw_that_amount']   =   'You cannot withdraw that amount!';
$_SESSION['You_have_withdrawn']   =   'You have withdrawn ';
$_SESSION['money']   =   ' money!';
$_SESSION['You_cannot_deposit_that_amount']   =   'You cannot deposit that amount!';
$_SESSION['You_have_deposited']   =   'You have deposited ';

//Top_10
$tpl->assign('LANGUAGE_Top_10_Players',  'Top 10 Players');
$tpl->assign('LANGUAGE_money',  'Money');
$tpl->assign('LANGUAGE_bank',  'Bank');

//Statistics
$tpl->assign('LANGUAGE_Statistics',  'Statistics');
$tpl->assign('LANGUAGE_Players_Online',         'Players Online');
$tpl->assign('LANGUAGE_Total_Players',  'Total Players');
$tpl->assign('LANGUAGE_Total_Kills',  'Total Kills');
$tpl->assign('LANGUAGE_Total_Deaths',  'Total Deaths');
$tpl->assign('LANGUAGE_Total_Gold_In_Hand',  'Total Gold In Hand');
$tpl->assign('LANGUAGE_Total_Gold_In_Banks',  'Total Gold In Banks');

//BotBattle
$tpl->assign('LANGUAGE_Arena',  'Arena');
$tpl->assign('LANGUAGE_Name',         'Name');
$tpl->assign('LANGUAGE_Batlle_log',         'Batlle log');
$tpl->assign('LANGUAGE_the_batlle',         'The batlle?');
$tpl->assign('LANGUAGE_To_be_treated',         'To be treated?');
$tpl->assign('LANGUAGE_Return',  'Return');
$tpl->assign('LANGUAGE_Click_on_an_opponent_to_battle',  'Click on an opponent to battle');
$_SESSION['You_hit']   =   'You hit';
$_SESSION['for'] = 'for';          
$_SESSION['damage'] = 'damage';
$_SESSION['You_do_not_have_enough_energy_for_a_battle']   =   'You cannot withdraw that amount!';
$_SESSION['You_must_be_alive_to_fight']   =   'You must be alive to fight!';

//Healer
$tpl->assign('LANGUAGE_Healer',  'Healer');
$tpl->assign('LANGUAGE_heal_me',  'heal me');
$tpl->assign('LANGUAGE_adrenaline_shot',  'adrenaline shot');
$tpl->assign('LANGUAGE_An_injection_of_adrenaline_will_cost',  'An injection of adrenaline will cost ');
$tpl->assign('LANGUAGE_Complete_your_treatment_will_cost',  'Complete your treatment will cost ');
$tpl->assign('LANGUAGE_You_have_cash',         'You have cash');
$tpl->assign('LANGUAGE_coins_and',     ' coins and ');
$tpl->assign('LANGUAGE_coins',  ' coins');
$_SESSION['You_pay_for_treatment']   =   'You pay for treatment ';
$_SESSION['You_do_not_have_enough_money_for_treatment']   =   'You do not have enough money for treatment!';
$_SESSION['You_do_not_have_enough_money_for_a_shot_of_adrenaline']   =   'You do not have enough money for a shot of adrenaline!';

//Mines
$tpl->assign('LANGUAGE_Mines',  'Mines');
$tpl->assign('LANGUAGE_Rocks',  'Rocks');
$tpl->assign('LANGUAGE_Copper',  'Copper');
$tpl->assign('LANGUAGE_Diamonds',  'Diamonds');
$tpl->assign('LANGUAGE_Buy_Mines',  'Buy Mines');
$tpl->assign('LANGUAGE_Mining_License',  'Mining License');
$tpl->assign('LANGUAGE_Sell_Minerals',  'Sell Minerals');
$tpl->assign('LANGUAGE_Mine_for_minerals',  'Mine for minerals');
$tpl->assign('LANGUAGE_Costs_1_energy',     ' Costs 1 energy ');
$tpl->assign('LANGUAGE_Welcome_to_your_mine_site',  'Welcome to your mine site');
$tpl->assign('LANGUAGE_You_have',  ' You have');
$tpl->assign('LANGUAGE_Mining',  'Mining');
$tpl->assign('LANGUAGE_You_mined',  'You mined');
$tpl->assign('LANGUAGE_What_would_you_like_to_do_today',  'What would you like to do today');
$tpl->assign('LANGUAGE_A_new_mine_will_cost_you',  'What would you like to do today'); 
$tpl->assign('LANGUAGE_Here_you_can_sell_the_minerals_that_you_ve_mined', 'Here you can sell the minerals that you mined');
$tpl->assign('LANGUAGE_Mine_again',  'Mine again');
$tpl->assign('LANGUAGE_Well_done',  'Well done'); 
$tpl->assign('LANGUAGE_Remember_the_more_mines_you_have_the_more_minerals_you_will_get',  'Remember, the more mines you have, the more minerals you will get');
$tpl->assign('LANGUAGE_Here_are_the_current_mineral_prices_for_one_unit_of_a_mineral',  'Here are the current mineral prices for one unit of a mineral'); 
$_SESSION['You_have_bought_a_mining_license_and_your_first_mine']   =   'You have bought a mining license and your first mine!';
$_SESSION['You_do_not_have_enough_money_to_buy_a_mining_license']   =   'You do not have enough money to buy a mining license!';
$_SESSION['You_need_to_buy_a_mining_license_first']   =   'You need to buy a mining license first';
$_SESSION['You_do_not_have_enough_money_to_buy_a_new mine']   =   'You do not have enough money to buy a new mine';
$_SESSION['You_do_not_have_enough_rocks_to_buy_a_new mine']   =   'You do not have enough rocks to buy a new mine';
$_SESSION['You_do_not_have_enough_copper_to_buy_a_new mine']   =   'You do not have enough copper to buy a new mine';
$_SESSION['You_do_not_have_enough_diamonds_to_buy_a_new mine']   =   'You do not have enough diamonds to buy a new mine';
$_SESSION['You_have_bought_a_new_mine']   =   'You have bought a new mine';
$_SESSION['You_do_not_have_many_rocks']   =   'You do not have many  rocks!<br />';
$_SESSION['You_do_not_have_much_copper']   =   'You do not have much copper!<br />';
$_SESSION['You_do_not_have_many_diamonds']   =   'You do not have many diamonds!<br />';
$_SESSION['You_have_sold_your_minerals_for']   =   'You have sold your minerals for ';
$_SESSION['You_do_not_have_enough_energy_to_mine']   =   'You do not have enough energy to mine!';
?>