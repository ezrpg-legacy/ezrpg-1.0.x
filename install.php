<?php
error_reporting(0);
define('IN_EZRPG', true);
include './lib/func.rand.php';

function displayHeader()
{
    echo <<<HEAD
<html>
<head>
<title>ezRPG Installation</title>
<link rel="stylesheet" href="static/default/style.css" type="text/css" />
<style>
#content
{
  width: 50%;
  margin: auto;
  font: 1.0em Verdana, Arial, Sans-serif;
  color: #444;
  padding: 10px;
  border: 1px solid #3182C0;
}
</style>
</head>

<body>
<div id="content">
<h1>ezRPG Installation</h1>

HEAD;
}

function displayFooter()
{
    echo <<<FOOT
</div>
</body>
</html>
FOOT;
}

if (!isset($_GET['act']))
{
    if (!is_writable('config.php') || !is_writable('smarty/templates_c'))
    {
        displayHeader();
        echo '<h2>Step 1</h2>';
        echo '<p>Please make sure the following files and folders are writable:';
        echo '<strong>config.php</strong><br />';
        echo '<strong>smarty/templates_c</strong><br />';
        echo '<\p>';
        echo '<p>';
        echo 'The below folders are optional to make writable:<br />';
        echo '<strong>lib/ext/htmlpurifier/HTMLPurifier/DefinitionCache/Serializer</strong>';
        echo '<strong>lib/ext/htmlpurifier/HTMLPurifier/DefinitionCache/Serializer/HTML</strong>';
        echo '<strong>lib/ext/htmlpurifier/HTMLPurifier/DefinitionCache/Serializer/URI</strong>';
        echo '</p>';
        echo '<p>';
        echo '<br />Chmod those files and folders to 0755 or 0777.</p>';
        echo '<p><a href="install.php">Click here to check again</a></p>';
        displayFooter();
        exit;
    }
    else
    {
        displayHeader();
        echo '<h2>Step 1</h2>';
        echo '<p>You have given the files/folders the correct file permissions.</p>';
        echo '<p><a href="install.php?act=2">Continue to next step</a></p>';
        displayFooter();
        exit;
    }
}
else if ($_GET['act'] == '2')
{
    displayHeader();
    echo '<h2>Step 2</h2>';
    
    if (!isset($_POST['submit']))
    {
        $dbhost = 'localhost';
        $dbname = 'ezrpg';
        $dbuser = '';
        $dbpass = '';
        $dbprefix = '';
    }
    else
    {
        $errors = 0;
        $msg = '';
        
        if (isset($_POST['dbhost']) && empty($_POST['dbhost']))
        {
            $errors = 1;
            $msg .= 'You need to enter a host name!<br />';
        }
        if (isset($_POST['dbname']) && empty($_POST['dbname']))
        {
            $errors = 1;
            $msg .= 'You need to enter a database name!<br />';
        }
        if (isset($_POST['dbuser']) && empty($_POST['dbuser']))
        {
            $errors = 1;
            $msg .= 'You need to enter a database user!<br />';
        }
        
        //so far so good...
        if ($errors == 0)
        {
            //let's test the connection
            $db = mysql_connect($_POST['dbhost'], $_POST['dbuser'], $_POST['dbpass']);
            if (!$db)
            {
                $errors = 1;
                $msg .= 'ezRPG could not connect to the database with the details you entered!<br />';
            }
            else
            {
                $db_selected = mysql_select_db($_POST['dbname']);
                if (!$db_selected)
                {
                    $errors = 1;
                    $msg .= 'ezRPG could not select the database with the database name you entered!<br />';
                }
            }
        }
        
        if ($errors == 0)
        {
            //No problesm connecting and selecting the database
            //Save details to the config file and fill the database
            $dbhost = $_POST['dbhost'];
            $dbname = $_POST['dbname'];
            $dbuser = $_POST['dbuser'];
            $dbpass = $_POST['dbpass'];
            $dbprefix = $_POST['dbprefix'];
            //fill the database first
            $query1 = <<<QUERY
CREATE TABLE IF NOT EXISTS `{$dbprefix}players` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `username` varchar(30) default NULL,
  `password` varchar(40) default NULL,
  `email` varchar(255) default NULL,
  `secret_key` text,
  `rank` smallint(5) unsigned NOT NULL default '1',
  `registered` int(11) unsigned default NULL,
  `last_active` int(11) unsigned default '0',
  `last_login` int(11) unsigned default '0',
  `money` int(11) unsigned default '100',
  `level` int(11) unsigned default '1',
  `stat_points` int(11) unsigned default '10',
  `exp` int(11) unsigned default '0',
  `max_exp` int(11) unsigned default '10',
  `hp` int(11) unsigned default '20',
  `max_hp` int(11) unsigned default '20',
  `energy` int(11) unsigned NOT NULL default '10',
  `max_energy` int(11) unsigned NOT NULL default '10',
  `strength` int(11) unsigned default '5',
  `vitality` int(11) unsigned default '5',
  `agility` int(11) unsigned default '5',
  `dexterity` int(11) unsigned default '5',
  `damage` int(11) unsigned default '0',
  `kills` int(11) unsigned NOT NULL default '0',
  `deaths` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
QUERY;
            mysql_query($query1) or die('Something went wrong.');
            
            $query2 = <<<QUERY
CREATE TABLE IF NOT EXISTS `{$dbprefix}player_log` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `player` int(11) unsigned NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `player_log` (`player`,`time`),
  KEY `new_logs` (`player`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
QUERY;
            mysql_query($query2) or die('Something went wrong.');
            
            echo '<p>Tables installed.</p>';
            
            //Save data to config file
            $secret_key = createKey(24);
            $config = <<<CONF
<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Title: Config
  The most important settings for the game are set here.
*/

/*
  Variables: Database Connection
  Connection settings for the database.
  
  \$config_server - Database server
  \$config_dbname - Database name
  \$config_username - Username to login to server with
  \$config_password - Password to login to server with
  \$config_driver - Contains the database driver to use to connect to the database.
*/
\$config_server = '{$dbhost}';
\$config_dbname = '{$dbname}';
\$config_username = '{$dbuser}';
\$config_password = '{$dbpass}';
\$config_driver = 'mysql';

/*
  Constant:
  This secret key is used in the hashing of player passwords and other important data.
  Secret keys can be of any length, however longer keys are more effective.
  
  This should only ever be set ONCE! Any changes to it will cause your game to break!
  You should save a copy of the key on your computer, just in case the secret key is lost or accidentally changed,.
  
  SECRET_KEY - A long string of random characters.
*/
define('SECRET_KEY', '{$secret_key}');


/*
  Constants: Settings
  Various settings used in ezRPG.
  
  DB_PREFIX - Prefix to the table names
  VERSION - Version of ezRPG
  SHOW_ERRORS - Turn on to show PHP errors.
  DEBUG_MODE - Turn on to show database errors and debug information.
*/
define('DB_PREFIX', '{$dbprefix}');
define('VERSION', '1.0');
define('SHOW_ERRORS', 0);
define('DEBUG_MODE', 0);
?>
CONF;
            file_put_contents('config.php', $config);
            echo '<p>Config file written.</p>';
            echo '<p><a href="install.php?act=3">Continue to next step</a></p>';
            displayFooter();
            exit;
        }
        else
        {
            echo '<p><strong>Sorry, there were some problems:</strong><br />', $msg, '</p>';
            
            $dbhost = $_POST['dbhost'];
            $dbname = $_POST['dbname'];
            $dbuser = $_POST['dbuser'];
            $dbpass = $_POST['dbpass'];
            $dbprefix = $_POST['dbprefix'];
        }
    }
    
    echo '<p>Please fill in the database access details here.</p>';
    echo '<form method="post" action="install.php?act=2">';
    echo '<label>Host</label>';
    echo '<input type="text" name="dbhost" value="', $dbhost, '" />';
    echo '<label>Database Name</label>';
    echo '<input type="text" name="dbname" value="', $dbname, '" />';
    echo '<label>User</label>';
    echo '<input type="text" name="dbuser" value="', $dbuser, '" />';
    echo '<label>Password</label>';
    echo '<input type="password" name="dbpass" value="', $dbpass, '" />';
    echo '<label>Table Prefix (Optional)</label>';
    echo '<input type="text" name="dbprefix" value="', $dbprefix, '" />';
    echo '<p>You can enter a prefix for your table names if you like.<br />This can be useful if you will be sharing the database with other applications, or if you are running more than one ezRPG instance in a single database.</p>';
    echo '<input type="submit" name="submit" value="Submit"  class="button" />';
    echo '</form>';
    displayFooter();
    exit;
}

else if ($_GET['act'] == '3')
{
    displayHeader();
    echo '<h1>Step 3</h1>';
    
    if (isset($_POST['submit']))
    {
        $errors = 0;
        $msg = '';
        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password']))
        {
            $errors = 1;
            $msg .= 'You forgot to fill in something!';
        }
        if ($_POST['password'] != $_POST['password2'])
        {
            $errors = 1;
            $msg .= 'You didn\'t verify your password correctly.';
        }
        
        if ($errors == 0)
        {
            include 'config.php';
            mysql_connect($config_server, $config_username, $config_password);
            mysql_select_db($config_dbname);
            
            $secret_key = createKey(16);
            $query = 'INSERT INTO `' . DB_PREFIX . 'players` (`username`, `password`, `email`, `secret_key`, `registered`, `rank`) VALUES(\'' . mysql_real_escape_string($_POST['username']) . '\', \'' . mysql_real_escape_string(sha1($secret_key . $_POST['password'] . SECRET_KEY)) . '\', \'' . mysql_real_escape_string($_POST['email']) . '\', \'' . mysql_real_escape_string($secret_key) . '\', ' . time() . ', 10)';
            mysql_query($query);
            
            echo '<p>Your admin account has been created! You may now login to the game. You can access the admin panel at <em>/admin</em>.</p>';
            echo '<p><strong>Please delete install.php immediately!</strong></p>';
            echo '<p><a href="index.php">Visit your ezRPG!</a></p>';
            displayFooter();
            exit;
        }
        else
        {
            echo '<p><strong>Sorry, there were some problems:</strong><br />', $msg, '</p>';
        }
    }
    
    echo '<p>Create your admin account for ezRPG.</p>';
    echo '<form method="post" action="install.php?act=3">';
    echo '<label>Username</label>';
    echo '<input type="text" name="username" value="', $_POST['username'], '" />';
    echo '<label>Email</label>';
    echo '<input type="text" name="email" value="', $_POST['email'], '" />';
    echo '<label>Password</label>';
    echo '<input type="password" name="password" />';
    echo '<label>Verify Password</label>';
    echo '<input type="password" name="password2" />';
    echo '<br />';
    echo '<input type="submit" value="Create" name="submit" class="button" />';
    echo '</form>';
    displayFooter();
    exit;
}
?>