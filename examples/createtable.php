<?php

// We assure any Dominion library we call will be automatically loaded
include_once '../include/__autoload.lib';

define ('WADEBUG', false);

echo <<<EOF
If you get an exception, you should edit db.php to fix the database type,<br />
database name, username and password of the database you are going to use<br />
to test the examples.<br /><br />
EOF;

// Load the instances

echo "Loading the instances...<br />";

require 'config/db.php';
require 'config/country.php';
require 'config/language.php';
require 'config/citizen.php';

// Create the tables

echo "Creating the 3 tables...<br />";

$country->setDB($DB);
$country->synchronize(false);

$language->setDB($DB);
$language->synchronize(false);

$citizen->setDB($DB);
$citizen->synchronize(false);

// fill the tables

echo "Filling the 3 tables...<br />";



echo "Done.<br />";


?>
