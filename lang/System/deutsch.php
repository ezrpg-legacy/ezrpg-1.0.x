<?php
//error 404 
$tpl->assign('LANGUAGE_SYS_ERROR_404',         'Fehler 404');
$tpl->assign('LANGUAGE_SYS_We_could_not_locate_the_page_you_were_looking_for',         'Wir konnten nicht die Seite die Sie gesucht lokalisieren!');

//coming soon
$tpl->assign('LANGUAGE_SYS_Coming_soon',         'Demnächst!');
$tpl->assign('LANGUAGE_SYS_This_feature_is_coming_soon',         'Diese Funktion wird in Kürze!');

//header 
$tpl->assign('LANGUAGE_SYS_Players_Online',         'Online-Spieler');
$tpl->assign('LANGUAGE_SYS_Level',         'Höhe');
$tpl->assign('LANGUAGE_SYS_Gold',         'Gold');
$tpl->assign('LANGUAGE_SYS_EXP',         'EXP');
$tpl->assign('LANGUAGE_SYS_HP',         'HP');
$tpl->assign('LANGUAGE_SYS_Energy',         'Energie');
$tpl->assign('LANGUAGE_SYS_New_Log_Events',         'Neues Log Events!');
$tpl->assign('LANGUAGE_SYS_Monday',         'Montag - ');
$tpl->assign('LANGUAGE_SYS_Tuesday',         'Dienstag - ');
$tpl->assign('LANGUAGE_SYS_Wednesday',         'Mittwoch - ');
$tpl->assign('LANGUAGE_SYS_Thursday',         'Donnerstag - ');
$tpl->assign('LANGUAGE_SYS_Friday',         'Freitag - ');
$tpl->assign('LANGUAGE_SYS_Saturday',         'Samstag - ');
$tpl->assign('LANGUAGE_SYS_Sunday',         'Sontag - ');

//menu übersetzung EdwardBlack
$tpl->assign('LANGUAGE_SYS_Home',         'Nach Hause');
$tpl->assign('LANGUAGE_SYS_Event_Log',         'Ereignisprotokoll');
$tpl->assign('LANGUAGE_SYS_City',         'Stadt');
$tpl->assign('LANGUAGE_SYS_Members',         'Mitglieder');
$tpl->assign('LANGUAGE_SYS_Account',         'Konto');
$tpl->assign('LANGUAGE_SYS_Admin',         'Admin');
$tpl->assign('LANGUAGE_SYS_Logout',         'Ausloggen');
$tpl->assign('LANGUAGE_SYS_Register',         'Registrieren');

//logout 
$_SESSION['You_have_been_logged_out']   =   'Sie wurden abgemeldet!';

//index 
$_SESSION['Please_enter_your_username_and_password']   =   'Bitte geben Sie Ihren Benutzernamen und Passwort!';
$_SESSION['Password_Set_as_Old_Method']   =   'Passwort Als Alt-Methode!';
$_SESSION['Please_check_your_username_password']   =   'Bitte überprüfen Sie Ihren Benutzername / Passwort!';

//level_up 
$_SESSION['You_have_leveled_up_You_gained_2_stat_points_and_1_max_energy']   =   'Sie haben nivelliert! Sie gewann +2 Statuspunkte und + 1 max Energie!';

//check_session 
$_SESSION['You_have_been_logged_out_due_to_inactivity']   =   'Sie wurden aufgrund von Inaktivität angemeldet!';
 
//Account_Settings übersetzung EdwardBlack
$tpl->assign('LANGUAGE_Account_Settings',         'Kontoeinstellungen');
$tpl->assign('LANGUAGE_Here_you_can_change_your_password',         'Hier können Sie Ihr Passwort ändern.');
$tpl->assign('LANGUAGE_Current_Password',         'Aktuelles Passwort');
$tpl->assign('LANGUAGE_New_Password',         'Neues Passwort');
$tpl->assign('LANGUAGE_Verify_New_Password',         'Neues Kennwort bestätigen');
$tpl->assign('LANGUAGE_Change_Password',         'Passwort Ändern');
$tpl->assign('LANGUAGE_Here_you_can_change_your_game_language',         'Hier können Sie Ihr Spiel Sprache ändern.');
$tpl->assign('LANGUAGE_Select_your_language',   'Sprache wählen.');
$tpl->assign('LANGUAGE_Change_language',         'Sprache ändern.');
$_SESSION['You_forgot_to_fill_in_something']   =   'Sie haben vergessen, etwas zu füllen!';
$_SESSION['The_password_you_entered_does_not_match_this_account_s_password']   =   'Das eingegebene Passwort nicht dieses Konto\'s Kennwort übereinstimmen.';
$_SESSION['Your_password_must_be_longer_than_3_characters']   =   'Das Passwort muss länger als 3 Zeichen lang sein!';
$_SESSION['You_didn_t_confirm_your_new_password_correctly']   =   'Sie didn\'t richtig bestätigen Sie Ihr neues Passwort!';
$_SESSION['You_have_changed_your_password']   =   'Sie haben Ihr Passwort geändert.';
$_SESSION['You_have_changed_your_language']   =   'Sie haben die Sprache geändert.';

//index übersetzung EdwardBlack
$tpl->assign('LANGUAGE_Home',         'Nach Hause');
$tpl->assign('LANGUAGE_Username',         'Benutzername');
$tpl->assign('LANGUAGE_Password',         'Passwort');
$tpl->assign('LANGUAGE_Welcome_to_ezRPG_Login_now',         'Willkommen bei ezRPG! jetzt Anmelden!');
$tpl->assign('LANGUAGE_Login',         'Einloggen!');
$tpl->assign('LANGUAGE_Registered',         'Anmeldung');
$tpl->assign('LANGUAGE_Email',         'Email');
$tpl->assign('LANGUAGE_Kills_Deaths',         'Kills/Gestorben');
$tpl->assign('LANGUAGE_You_have_stat_points_left_over',         'Sie haben Statuspunkte übrig!');
$tpl->assign('LANGUAGE_Spend_them_now',         'Verbringen sie jetzt!');
$tpl->assign('LANGUAGE_You_have_no_extra_stat_points_to_spend',         'Sie haben keine zusätzlichen Statuspunkte zu verbringen.');
$tpl->assign('LANGUAGE_Level',         'Level');
$tpl->assign('LANGUAGE_Gold',         'Gold');
$tpl->assign('LANGUAGE_Strength',         'Stärke');
$tpl->assign('LANGUAGE_Vitality',         'Vitalität');
$tpl->assign('LANGUAGE_Agility',         'Beweglichkeit');
$tpl->assign('LANGUAGE_Dexterity',         'Geschicklichkeit');

//members übersetzung EdwardBlack
$tpl->assign('LANGUAGE_Username',         'Benutzername');
$tpl->assign('LANGUAGE_Level',         'Höhe');
$tpl->assign('LANGUAGE_Previous_Page',         'Vorherige Seite');
$tpl->assign('LANGUAGE_Next_Page',         'Nächste Seite');

//Log übersetzung EdwardBlack
$tpl->assign('LANGUAGE_Clear_Messages',         'Meldungen löschen');
$tpl->assign('LANGUAGE_You_have_no_log_messages',         'Sie haben keine Log-Nachrichten!');
$_SESSION['You_have_cleared_your_event_log']   =   'Sie haben Ihre Ereignisprotokoll gelöscht!';

//city übersetzung EdwardBlack
$tpl->assign('LANGUAGE_City',         'Stadt');
$tpl->assign('LANGUAGE_Player',         'Spieler');
$tpl->assign('LANGUAGE_World',         'Welt');
$tpl->assign('LANGUAGE_EventLog',         'Ereignisprotokoll');
$tpl->assign('LANGUAGE_Account',         'Konto');
$tpl->assign('LANGUAGE_Forum',         'Forum');
$tpl->assign('LANGUAGE_MembersList',         'Benutzerliste');
$tpl->assign('LANGUAGE_TopPlayers',         'Top-Spieler');
$tpl->assign('LANGUAGE_GameStatistics',         'Spiel Statistik');
$tpl->assign('LANGUAGE_MailBox',         'Mail Box');
$tpl->assign('LANGUAGE_Inventory',         'Inventar');
$tpl->assign('LANGUAGE_Bank',         'Bank');
$tpl->assign('LANGUAGE_BotBattle',         'Bot Schlacht');
$tpl->assign('LANGUAGE_Battle',         'Kampf');
$tpl->assign('LANGUAGE_BlackJack',         'BlackJack');
$tpl->assign('LANGUAGE_FiftyFifty',         'FiftyFifty');
$tpl->assign('LANGUAGE_ItemShop',         'Item-Shop ');
$tpl->assign('LANGUAGE_Market',         'Markt');
$tpl->assign('LANGUAGE_Hospital',  'Hospital');

//Stat Points übersetzung EdwardBlack
$tpl->assign('LANGUAGE_Stat_Points',         'Stat Punkte');
$tpl->assign('LANGUAGE_Here_you_can_use_your_stat_points_to_increase_your_stats_You_have',         'Hier können Sie Ihre Statuspunkte verwenden können, um Ihre Statistiken zu erhöhen! Sie haben');
$tpl->assign('LANGUAGE_points_to_use',         'punkte zu bedienen!');
$tpl->assign('LANGUAGE_You_receive_stat_points_when_you_first_sign_up_to_the_game_and_also_each_time_when_you_level_up',         'Sie erhalten Statuspunkte, wenn Sie zuerst jedes Mal melden Sie sich an das Spiel, und auch, wenn Sie Ebene!');
$tpl->assign('LANGUAGE_This_increases_the_damage_you_do_in_battle_and_increases_your_weight_limit_so_you_can_carry_more_items',         'Dies erhöht den Schaden, den du in der Schlacht zu tun, und erhöht die Gewichtsgrenze, so dass Sie mehr Einzelteile tragen kann.');
$tpl->assign('LANGUAGE_This_increases_the_amount_of_health_you_have_and_decreases_the_amount_of_damage_you_receive_in_battle',         'Dies erhöht die Menge an Gesundheit haben und verringert die Menge an Schaden, die in der Schlacht erhalten');
$tpl->assign('LANGUAGE_This_increases_your_chance_to_completely_dodge_and_attack_and_take_no_damage_in_battle',         'Das erhöht Ihre Chance, komplett ausweichen und Angriff und übernehmen keine Schäden in der Schlacht!');
$tpl->assign('LANGUAGE_This_helps_you_aim_better_so_you_are_less_likely_to_miss_your_opponent',         'Dies hilft Ihnen, besser zielen, so dass Sie weniger wahrscheinlich, dass Ihre oponent verpassen.');
//$_SESSION['You_don_t_have_any_stat_points_left']   =   'Sie don\'t haben keine Statuspunkte links!';
//$_SESSION['You_have_increased_your_strength']   =   'Sie haben Ihre Stärke erhöht!';
//$_SESSION['You_have_increased_your_vitality']   =   'Sie haben Ihre Vitalität erhöht!';
//$_SESSION['You_have_increased_your_agility']   =   'Sie haben Ihre Agilität erhöht!';
//$_SESSION['You_have_increased_your_dexterity']   =   'Sie haben Ihre Fingerfertigkeit erhöht!';
//$_SESSION['You_have_no_more_stat_points']   =   'Sie haben keine mehr Statuspunkte!';

//Bank übersetzung EdwardBlack
$tpl->assign('LANGUAGE_Deposit',         'Anzahlung');
$tpl->assign('LANGUAGE_Withdraw',         'Sich Zurückziehen');
$tpl->assign('LANGUAGE_Welcome',         'Herzlich Willkommen,');
$tpl->assign('LANGUAGE_You_have',         'Sie haben ');
$tpl->assign('LANGUAGE_money_in_your_bank',         ' münzen in Ihr Bank');
$tpl->assign('LANGUAGE_Amount_to_Deposit',         'einzahlungsbetrag ein');
$tpl->assign('LANGUAGE_Amount_to_Withdraw',         'betragen abziehen');
$_SESSION['You_cannot_withdraw_that_amount']   =   'Sie können diesen Betrag nicht zurücktreten!';
$_SESSION['You_have_withdrawn']   =   'Sie haben zurückgezogen ';
$_SESSION['money']   =   ' münzen!';
$_SESSION['You_cannot_deposit_that_amount']   =   'Es ist nicht möglich, diesen Betrag zu hinterlegen!';
$_SESSION['You_have_deposited']   =   'Sie haben hinterlegt ';

//Top_10 übersetzung EdwardBlack
$tpl->assign('LANGUAGE_Top_10_Players',  'Top 10 Spieler');
$tpl->assign('LANGUAGE_money',  'Geld');
$tpl->assign('LANGUAGE_bank',  'Bank');

//Statistick übersetzung EdwardBlack
$tpl->assign('LANGUAGE_Statistics',  'Statistick');
$tpl->assign('LANGUAGE_Players_Online',         'Spieler Online');
$tpl->assign('LANGUAGE_Total_Players',  'Gesamtspieler');
$tpl->assign('LANGUAGE_Total_Kills',  'Gesamte Kills');
$tpl->assign('LANGUAGE_Total_Deaths',  'Gesamte Deaths');
$tpl->assign('LANGUAGE_Total_Gold_In_Hand',  'Insgesamt Gold in Hand');
$tpl->assign('LANGUAGE_Total_Gold_In_Banks',  'Insgesamt Gold in Banken');

//BotBattle übersetzung EdwardBlack
$tpl->assign('LANGUAGE_Arena',  'Arena');
$tpl->assign('LANGUAGE_Name',         'Name');
$tpl->assign('LANGUAGE_Batlle_log',         'Kampf log');
$tpl->assign('LANGUAGE_the_batlle',         'Im kampf?');
$tpl->assign('LANGUAGE_To_be_treated',         'Behandelt wird?');
$tpl->assign('LANGUAGE_Return',  'Rückkehr');
$tpl->assign('LANGUAGE_Click_on_an_opponent_to_battle',  'Klicken Sie auf einen Gegner in die Schlacht');
$_SESSION['You_do_not_have_enough_energy_for_a_battle']   =   'Sie haben nicht genug Energie für einen Kampf!';
$_SESSION['You_must_be_alive_to_fight']   =   'Sie müssen am Leben zu kämpfen!';

//Healer übersetzung EdwardBlack
$tpl->assign('LANGUAGE_Healer',  'Heiler');
$tpl->assign('LANGUAGE_heal_me',  'heile mich');
$tpl->assign('LANGUAGE_adrenaline_shot',  'adrenalin schuss');
$tpl->assign('LANGUAGE_An_injection_of_adrenaline_will_cost',  'Eine Injektion von Adrenalin kostet ');
$tpl->assign('LANGUAGE_Complete_your_treatment_will_cost',  'Vervollständigen Sie Ihre Behandlung kostet ');
$tpl->assign('LANGUAGE_You_have_cash',         'Sie haben cash');
$tpl->assign('LANGUAGE_coins_and',     ' münzen und ');
$tpl->assign('LANGUAGE_coins',  ' münzen');
$_SESSION['You_pay_for_treatment']   =   'Sie zahlen für die Behandlung ';
$_SESSION['You_do_not_have_enough_money_for_treatment']   =   'Sie haben nicht genug Geld für die Behandlung!';
$_SESSION['You_do_not_have_enough_money_for_a_shot_of_adrenaline']   =   'Sie haben nicht genug Geld für einen Schuss Adrenalin!';

//Mines übersetzung EdwardBlack
$tpl->assign('LANGUAGE_Mines', 'Minen');
$tpl->assign('LANGUAGE_Rocks', 'Felsen');
$tpl->assign('LANGUAGE_Copper', 'Kupfer');
$tpl->assign('LANGUAGE_Diamonds', 'Diamonds');
$tpl->assign('LANGUAGE_Buy_Mines', 'Kaufen Minen');
$tpl->assign('LANGUAGE_Sell_Minerals', 'Verkaufen Mineralien');
$tpl->assign('LANGUAGE_Mining_License',  'Bergbau Lizenz');
$tpl->assign('LANGUAGE_Mine_for_minerals', 'Mine für Mineralien');
$tpl->assign('LANGUAGE_Costs_1_energy', ' Kostet 1 Energie ');
$tpl->assign('LANGUAGE_Welcome_to_your_mine_site', 'Willkommen zu Ihrer mine site');
$tpl->assign('LANGUAGE_You_have', 'Du hast');
$tpl->assign('LANGUAGE_Mining', 'Bergbau');
$tpl->assign('LANGUAGE_You_mined', 'You abgebaut');
$tpl->assign('LANGUAGE_What_would_you_like_to_do_today', 'Was mochten Sie heute tun');
$tpl->assign('LANGUAGE_A_new_mine_will_cost_you', 'Eine neue mine wird Sie Kosten');
$tpl->assign('LANGUAGE_Here_you_can_sell_the_minerals_that_you_ve_mined', 'Hier konnen Sie verkaufen die Mineralien, die Sie haben, abgebaut');
$tpl->assign('LANGUAGE_Here_are_the_current_mineral_prices_for_one_unit_of_a_mineral', 'Hier sind die aktuellen mineral Preise fur eine Einheit eines mineralischen');
$tpl->assign('LANGUAGE_Mine_again',  'Mir wieder');
$tpl->assign('LANGUAGE_Well_done',  'Gut gemacht'); 
$tpl->assign('LANGUAGE_Remember_the_more_mines_you_have_the_more_minerals_you_will_get',  'Denken Sie daran, je mehr Minen, desto mehr Mineralien, die Sie erhalten');
$_SESSION['You_have_bought_a_mining_license_and_your_first_mine']   =   'Sie gekauft haben, zu einer Bergbau-Lizenz und Ihre erste mine!';
$_SESSION['You_do_not_have_enough_money_to_buy_a_mining_license']   =   'Sie haben nicht genug Geld, um zu kaufen, eine Bergbau-Lizenz!';
$_SESSION['You_need_to_buy_a_mining_license_first']   =   'Sie müssen kaufen eine Bergbau-Lizenz ersten';
$_SESSION['You_do_not_have_enough_money_to_buy_a_new mine'] = 'Sie haben nicht genug Geld um einen neuen zu kaufen mine';
$_SESSION['You_do_not_have_enough_rocks_to_buy_a_new mine'] = 'Sie haben nicht genug Steine, einen neuen zu kaufen mine';
$_SESSION['You_do_not_have_enough_copper_to_buy_a_new mine'] = 'Sie haben nicht genug Kupfer zu kaufen, eine neue mine';
$_SESSION['You_do_not_have_enough_diamonds_to_buy_a_new mine'] = 'Sie haben nicht genug Diamanten zu kaufen, eine neue mine';
$_SESSION['You_have_bought_a_new_mine']   =   'Sie haben eine neue gekauft mine';
$_SESSION['You_do_not_have_many_rocks']   =   'Sie haben nicht viele Felsen!<br />';
$_SESSION['You_do_not_have_much_copper']   =   'Sie haben nicht viel Kupfer!<br />';
$_SESSION['You_do_not_have_many_diamonds']   =   'Sie haben nicht viele Diamanten!<br />';
$_SESSION['You_have_sold_your_minerals_for']   =   'Sie haben Sie verkauft Ihre Mineralien für ';
$_SESSION['You_do_not_have_enough_energy_to_mine']   =   'Sie haben nicht genügend Energie zu mir!';

?>
