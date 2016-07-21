<?php
//ошибка 404
$tpl->assign('LANGUAGE_SYS_ERROR_404',         'ОШИБКА 404');
$tpl->assign('LANGUAGE_SYS_We_could_not_locate_the_page_you_were_looking_for',         'Мы не смогли найти страницу, которую вы ищете!');

//В будущем
$tpl->assign('LANGUAGE_SYS_Coming_soon',         'Скоро!');
$tpl->assign('LANGUAGE_SYS_This_feature_is_coming_soon',         'Эта функция в ближайшее время!');

//колонтитул
$tpl->assign('LANGUAGE_SYS_Players_Online',         'Игроков онлайн');
$tpl->assign('LANGUAGE_SYS_Level',         'Уровень');
$tpl->assign('LANGUAGE_SYS_Gold',         'Золото');
$tpl->assign('LANGUAGE_SYS_EXP',         'Опыт');
$tpl->assign('LANGUAGE_SYS_HP',         'Здоровье');
$tpl->assign('LANGUAGE_SYS_Energy',         'Энергия');
$tpl->assign('LANGUAGE_SYS_New_Log_Events',         'Новое событие в журнале!');
$tpl->assign('LANGUAGE_SYS_Monday',         'Понедельник - ');
$tpl->assign('LANGUAGE_SYS_Tuesday',         'Вторник - ');
$tpl->assign('LANGUAGE_SYS_Wednesday',         'Среда - ');
$tpl->assign('LANGUAGE_SYS_Thursday',         'Четверг - ');
$tpl->assign('LANGUAGE_SYS_Friday',         'Пятница - ');
$tpl->assign('LANGUAGE_SYS_Saturday',         'Суббота - ');
$tpl->assign('LANGUAGE_SYS_Sunday',         'Воскресенье - ');

//меню
$tpl->assign('LANGUAGE_SYS_Home',         'Домой');
$tpl->assign('LANGUAGE_SYS_Event_Log',         'События');
$tpl->assign('LANGUAGE_SYS_City',         'Город');
$tpl->assign('LANGUAGE_SYS_Members',         'Игроки');
$tpl->assign('LANGUAGE_SYS_Account',         'Настройки');
$tpl->assign('LANGUAGE_SYS_Admin',         'Админ');
$tpl->assign('LANGUAGE_SYS_Logout',         'Выход');
$tpl->assign('LANGUAGE_SYS_Register',         'Регистрация');

//выход
$_SESSION['You_have_been_logged_out']   =   'Вы вышли из игры!';

//начальная
$_SESSION['Please_enter_your_username_and_password']   =   'Пожалуйста, введите ваш логин и пароль!';
$_SESSION['Password_Set_as_Old_Method']   =   'Установите пароль как старый метод!';
$_SESSION['Please_check_your_username_password']   =   'Пожалуйста, проверьте своё имя пользователя / пароль!';

//повышение уровня
$_SESSION['You_have_leveled_up_You_gained_2_stat_points_and_1_max_energy']   =   'Вы повысили уровень! Вы получили 2 очка опыта и 1 очко к максимальной энергии!';

//проверка сессии
$_SESSION['You_have_been_logged_out_due_to_inactivity']   =   'Вы были отключены из-за бездействия!';

//модуль - настройки учетной записи
$_SESSION['You_forgot_to_fill_in_something']   =   'Вы не заполнили форму!';
$_SESSION['The_password_you_entered_does_not_match_this_account_s_password']   =   'Пароль, который вы ввели не совпадает с этой учетной записью - паролем.';
$_SESSION['Your_password_must_be_longer_than_3_characters']   =   'Ваш пароль должен быть больше 3-х символов!';
$_SESSION['You_didn_t_confirm_your_new_password_correctly']   =   'Вы не правильно ввели подтверждение нового пароля!';
$_SESSION['You_have_changed_your_password']   =   'Вы изменили пароль.';
$_SESSION['You_have_changed_your_language']   =   'Вы изменили язык.';
$tpl->assign('LANGUAGE_Account_Settings',         'Учётная запись');
$tpl->assign('LANGUAGE_Here_you_can_change_your_password',         'Здесь вы можете изменить свой пароль.');
$tpl->assign('LANGUAGE_Current_Password',         'Текущий Пароль');
$tpl->assign('LANGUAGE_New_Password',         'Новый Пароль');
$tpl->assign('LANGUAGE_Verify_New_Password',         'Повторите Новый Пароль');
$tpl->assign('LANGUAGE_Change_Password',         'Изменить Пароль');
$tpl->assign('LANGUAGE_Here_you_can_change_your_game_language',         'Здесь вы можете изменить язык игры.');
$tpl->assign('LANGUAGE_Select_your_language',   'Выберите нужный язык.');
$tpl->assign('LANGUAGE_Change_language',         'Изменить язык');

//модуль - Индекс
$tpl->assign('LANGUAGE_Home',         'Домашняя страница');
$tpl->assign('LANGUAGE_Username',         'Имя игрока');
$tpl->assign('LANGUAGE_Password',         'Пароль');
$tpl->assign('LANGUAGE_Welcome_to_ezRPG_Login_now',         'Добро пожаловать в игру! Введите логин и пароль!');
$tpl->assign('LANGUAGE_Login',         'Login!');
$tpl->assign('LANGUAGE_Registered',         'Регистрация');
$tpl->assign('LANGUAGE_Email',         'Э.почта');
$tpl->assign('LANGUAGE_Kills_Deaths',         'Убийства/Смерти');
$tpl->assign('LANGUAGE_You_have_stat_points_left_over',         'У Вас остались не распределенные очки опыта!');
$tpl->assign('LANGUAGE_Spend_them_now',         'Распределите их сейчас!');
$tpl->assign('LANGUAGE_You_have_no_extra_stat_points_to_spend',         'Все очки опыта распределены');
$tpl->assign('LANGUAGE_Level',         'Уровень');
$tpl->assign('LANGUAGE_Gold',         'Золото');
$tpl->assign('LANGUAGE_Strength',         'Сила');
$tpl->assign('LANGUAGE_Vitality',         'Живучесть');
$tpl->assign('LANGUAGE_Agility',         'Проворство');
$tpl->assign('LANGUAGE_Dexterity',         'Ловкость');

//модуль - Игроки
$tpl->assign('LANGUAGE_Username',         'Имя игрока');
$tpl->assign('LANGUAGE_Level',         'Уровень');
$tpl->assign('LANGUAGE_Previous_Page',         'Предыдущая страница');
$tpl->assign('LANGUAGE_Next_Page',         'Следующая страница');

//модуль-журнал
$tpl->assign('LANGUAGE_Clear_Messages',         'Очистить сообщения');
$tpl->assign('LANGUAGE_You_have_no_log_messages',         'У Вас нет сообщений в журнале!');
$_SESSION['You_have_cleared_your_event_log']   =   'Все сообщения удалены!';

//модуль - город
$tpl->assign('LANGUAGE_City',         'Город');
$tpl->assign('LANGUAGE_Player',         'Игрок');
$tpl->assign('LANGUAGE_World',         'Мир');
$tpl->assign('LANGUAGE_EventLog',         'События');
$tpl->assign('LANGUAGE_MembersList',         'Игроки');
$tpl->assign('LANGUAGE_Forum',         'Форум');
$tpl->assign('LANGUAGE_Account',         'Настройки');
$tpl->assign('LANGUAGE_TopPlayers',         'Лучшие игроки');
$tpl->assign('LANGUAGE_GameStatistics',         'Игровая статистика');
$tpl->assign('LANGUAGE_MailBox',         'Почта');
$tpl->assign('LANGUAGE_Inventory',         'Инвентарь');
$tpl->assign('LANGUAGE_Bank',         'Банк');
$tpl->assign('LANGUAGE_BotBattle',         'Бой с ботом');
$tpl->assign('LANGUAGE_Battle',         'Бой с игроком');
$tpl->assign('LANGUAGE_BlackJack',         'Карточная игра 21');
$tpl->assign('LANGUAGE_FiftyFifty',         'Игра 50 на 50');
$tpl->assign('LANGUAGE_ItemShop',         'Магазин');
$tpl->assign('LANGUAGE_Market',         'Рынок');
$tpl->assign('LANGUAGE_Hospital',  'Hospital');

//модуль - характеристики персонажа
$tpl->assign('LANGUAGE_Stat_Points',         'Распределение опыта');
$tpl->assign('LANGUAGE_Here_you_can_use_your_stat_points_to_increase_your_stats_You_have',         'Здесь вы можете использовать свои очки опыта, чтобы увеличить Ваши характеристики! У Вас не распределено');
$tpl->assign('LANGUAGE_points_to_use',         'очков опыта!');
$tpl->assign('LANGUAGE_You_receive_stat_points_when_you_first_sign_up_to_the_game_and_also_each_time_when_you_level_up',         'Вы получаете очки опыта, когда впервые входите в игру, а также каждый раз, когда повышается уровень!');
$tpl->assign('LANGUAGE_This_increases_the_damage_you_do_in_battle_and_increases_your_weight_limit_so_you_can_carry_more_items',         '- увеличивает урон, который вы делаете в бою, и увеличивает лимит веса, так что вы можете носить больше вещей.');
$tpl->assign('LANGUAGE_This_increases_the_amount_of_health_you_have_and_decreases_the_amount_of_damage_you_receive_in_battle',         '- увеличивает очки здоровья у вас и уменьшает количество повреждений получаемых Вами в бою.');
$tpl->assign('LANGUAGE_This_increases_your_chance_to_completely_dodge_and_attack_and_take_no_damage_in_battle',         '- увеличивает Ваш шанс полностью уклониться от атаки и не получить повреждения в бою!');
$tpl->assign('LANGUAGE_This_helps_you_aim_better_so_you_are_less_likely_to_miss_your_opponent',         '- помогает лучше прицеливаться, а так же увеличивает шанс нанести вашему противнику больше повреждений.');
$_SESSION['You_don_t_have_any_stat_points_left']   =   'You don\'t have any stat points left!';
$_SESSION['You_have_increased_your_strength']   =   'Вы увеличили свою силу!';
$_SESSION['You_have_increased_your_vitality']   =   'Вы увеличили свою жизненную энергию!';
$_SESSION['You_have_increased_your_agility']   =   'Вы увеличили своё проворство!';
$_SESSION['You_have_increased_your_dexterity']   =   'Вы увеличили свою ловкость!';
$_SESSION['You_have_no_more_stat_points']   =   'У вас нет больше очков опыта!';

//модуль банк
$tpl->assign('LANGUAGE_Deposit',         'Пополнить вклад');
$tpl->assign('LANGUAGE_Withdraw',         'Забрать вклад');
$tpl->assign('LANGUAGE_Welcome',         'Добро пожаловать,');
$tpl->assign('LANGUAGE_You_have',         'У Вас есть ');
$tpl->assign('LANGUAGE_money_in_your_bank',         ' монет на вкладе в банке!');
$tpl->assign('LANGUAGE_Amount_to_Deposit',         'введите сумму вклада');
$tpl->assign('LANGUAGE_Amount_to_Withdraw',         'введите сумму вывода');
$_SESSION['You_cannot_withdraw_that_amount']   =   'Вы не можете снять эту сумму!';
$_SESSION['You_have_withdrawn']   =   'Вы сняли ';
$_SESSION['money']   =   ' монет!';
$_SESSION['You_cannot_deposit_that_amount']   =   'Вы не можете внести эту сумму!';
$_SESSION['You_have_deposited']   =   'Вы внесли ';

//Топ_10
$tpl->assign('LANGUAGE_Top_10_Players',  'Tоп 10 лучших игроков');
$tpl->assign('LANGUAGE_money',  'Деньги');
$tpl->assign('LANGUAGE_bank',  'Вклад');

//Statistics
$tpl->assign('LANGUAGE_Statistics',  'Статистика');
$tpl->assign('LANGUAGE_Players_Online',         'Игроков онлайн');
$tpl->assign('LANGUAGE_Total_Players',  'Всего игроков');
$tpl->assign('LANGUAGE_Total_Kills',  'Всего убийств');
$tpl->assign('LANGUAGE_Total_Deaths',  'Всего смертей');
$tpl->assign('LANGUAGE_Total_Gold_In_Hand',  'Всего золота на руках');
$tpl->assign('LANGUAGE_Total_Gold_In_Banks',  'Всего золота в банках');

//модуль BotBattle
$tpl->assign('LANGUAGE_Arena',  'Арена');
$tpl->assign('LANGUAGE_Name',         'Противник');
$tpl->assign('LANGUAGE_Batlle_log',         'Ход боя');
$tpl->assign('LANGUAGE_the_batlle',         'В бой?');
$tpl->assign('LANGUAGE_To_be_treated',         'Лечиться?');
$tpl->assign('LANGUAGE_Return',  'Вернуться');
$tpl->assign('LANGUAGE_Click_on_an_opponent_to_battle',  'Нажмите на противника, чтобы сражаться');
$_SESSION['You_do_not_have_enough_energy_for_a_battle']   =   'Вы не имеете достаточно энергии для битвы!';
$_SESSION['You_must_be_alive_to_fight']   =   'Вы должны быть в живых, чтобы бороться!';

//Healer
$tpl->assign('LANGUAGE_Healer',  'Целитель');
$tpl->assign('LANGUAGE_heal_me',  'исцели меня');
$tpl->assign('LANGUAGE_adrenaline_shot',  'укол адреналина');
$tpl->assign('LANGUAGE_An_injection_of_adrenaline_will_cost',  'Укол адреналина будет стоить ');
$tpl->assign('LANGUAGE_Complete_your_treatment_will_cost',  'Полное Ваше лечение будет стоить ');
$tpl->assign('LANGUAGE_You_have_cash',         'У Вас есть наличными');
$tpl->assign('LANGUAGE_coins_and',  ' монет и ');
$tpl->assign('LANGUAGE_coins',  ' монет');
$_SESSION['You_pay_for_treatment']   =   'Вы заплатили за лечение ';
$_SESSION['You_do_not_have_enough_money_for_treatment']   =   'У Вас не хватает денег на лечение!';
$_SESSION['You_do_not_have_enough_money_for_a_shot_of_adrenaline']   =   'У Вас не хватает денег на дозу адреналина!';

//Mines
$tpl->assign('LANGUAGE_Mines',  'Рудники');
$tpl->assign('LANGUAGE_Rocks',  'Камни');
$tpl->assign('LANGUAGE_Copper',  'Медь');
$tpl->assign('LANGUAGE_Diamonds',  'Алмазы');
$tpl->assign('LANGUAGE_Buy_Mines',  'Купить Рудник');
$tpl->assign('LANGUAGE_Sell_Minerals',  'Продать Минералы');
$tpl->assign('LANGUAGE_Mining_License',  'Лицензия на горнодобычу');
$tpl->assign('LANGUAGE_Mine_for_minerals',  'В шахту за минералами');
$tpl->assign('LANGUAGE_Costs_1_energy',     ' Затратите 1 энергию ');
$tpl->assign('LANGUAGE_Welcome_to_your_mine_site',  'Добро пожаловать в шахту');
$tpl->assign('LANGUAGE_You_have',  ' У тебя есть');
$tpl->assign('LANGUAGE_Mining',  'Добыча');
$tpl->assign('LANGUAGE_You_mined',  'Ты добыл');
$tpl->assign('LANGUAGE_What_would_you_like_to_do_today',  'Что бы Вы хотели сделать сегодня'); 
$tpl->assign('LANGUAGE_A_new_mine_will_cost_you',  'Новый рудник обойдётся Вам в'); 
$tpl->assign('LANGUAGE_Here_you_can_sell_the_minerals_that_you_ve_mined',  'Здесь вы можете продать минералы, которые вы добыли');
$tpl->assign('LANGUAGE_Here_are_the_current_mineral_prices_for_one_unit_of_a_mineral',  'Вот цены на продажу сырья за единицу минерала');
$tpl->assign('LANGUAGE_Mine_again',  'Работаем дальше');
$tpl->assign('LANGUAGE_Well_done',  'Молодец'); 
$tpl->assign('LANGUAGE_Remember_the_more_mines_you_have_the_more_minerals_you_will_get',  'Помните, чем больше шахт, тем больше минералов вы получите');
$_SESSION['You_have_bought_a_mining_license_and_your_first_mine']   =   'Вы купили лицензию на добычу полезных ископаемых и свой первый рудник!';
$_SESSION['You_do_not_have_enough_money_to_buy_a_mining_license']   =   'Вам не хватает денег на покупку лицензии на добычу!';
$_SESSION['You_need_to_buy_a_mining_license_first']   =   'Нужно сначала купить лицензию на добычу';
$_SESSION['You_do_not_have_enough_money_to_buy_a_new mine']   =   'Вы не имеете достаточно денег, чтобы купить новый рудник';
$_SESSION['You_do_not_have_enough_rocks_to_buy_a_new mine']   =   'Вы не имеете достаточно камней, чтобы купить новый рудник';
$_SESSION['You_do_not_have_enough_copper_to_buy_a_new mine']   =   'Вы не имеете достаточно меди, чтобы купить новый рудник';
$_SESSION['You_do_not_have_enough_diamonds_to_buy_a_new mine']   =   'Вы не имеете достаточно алмазов, чтобы купить новый рудник';
$_SESSION['You_have_bought_a_new_mine']   =   'Вы купили новый рудник';
$_SESSION['You_do_not_have_many_rocks']   =   'Вы не имеете столько камней!<br />';
$_SESSION['You_do_not_have_much_copper']   =   'Вы не имеете столько меди!<br />';
$_SESSION['You_do_not_have_many_diamonds']   =   'Вы не имеете столько алмазов!<br />';
$_SESSION['You_have_sold_your_minerals_for']   =   'Вы продали минералов на ';
$_SESSION['You_do_not_have_enough_energy_to_mine']   =   'Вы не имеете достаточно энергии, чтобы продолжать добычу!';
?>