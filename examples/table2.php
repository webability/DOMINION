<?php

// We assure any Dominion library we call will be automatically loaded
include_once '../include/__autoload.lib';

define ('WADEBUG', false);

// We set spanish messages file
// WAMessage::setMessagesFile('../messages/message.es.xml');

require 'config/db.php';

// Leemos 100 veces y creamos 100 veces la tabla desde disco duro
$t1 = new DB_uTime('N');
$t1->startChronometer();

for ($i = 0; $i < 100; $i++)
{
  require 'config/country.php';
}

print $t1->getChronometer() . '<br />';

// Start the SHM with 20Mb default size and default ID
$SHM = new WASHM();

// Leemos 100 veces y creamos 100 veces la tabla desde disco duro
$t1->startChronometer();

for ($i = 0; $i < 100; $i++)
{
  $ts = new TableSource(
    'country',
    'config/country.php',
    new FastObjectSource(new FileSource('./', '', 'table.country.afo'),
                         new SHMSource('country', $SHM)
                        )
  );

  $country = $ts->read();
}

print $t1->getChronometer() . '<br />';

?>
