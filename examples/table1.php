<?php

// We assure any Dominion library we call will be automatically loaded
include_once '../include/__autoload.lib';

define ('WADEBUG', false);

// We set spanish messages file
// WAMessage::setMessagesFile('../messages/message.es.xml');

require 'config/db.php';

$country = new DB_Table('config/country.xml');

print $country->explain();
print serialize($country);


?>
