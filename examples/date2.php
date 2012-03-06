<?php require 'config/header.php'; ?>

<h1>DB_Date examples</h1>

<?php

// We assure any Dominion library we call will be automatically loaded
include_once '../include/__autoload.lib';

define ('WADEBUG', false);

echo "We are testing this on:<br />";
echo "DomCore version ".WADebug::VERSION."<br />";
echo "Dominion version ".DB_Base::VERSION."<br />";
echo "HTML API ? ".(WADebug::getHTMLAPI()?'Yes':'No')."<br />";
echo "OS Type ? ".(WADebug::getOSType()==WADebug::WINDOWS?'Windows':(WADebug::getOSType()==WADebug::UNIX?'Unix':'Mac'))."<br />";
echo "<br />";

echo "Please refer to the php code of this example to understand each result.<br /><br />";


// We set spanish messages file
WAMessage::setMessagesFile('../messages/message.es.xml');

$D1 = new DB_Date();
$D2 = new DB_Date('N');
$D3 = new DB_Date(time());
$D4 = new DB_Date('2012-11-08');
$D5 = new DB_Date('12:01:35');
$D6 = new DB_Date('12:01:35.43');

$D7 = new DB_Date('2012-11-08T12:01:35');
$D8 = new DB_Date('2012-11-08T12:01:35.12');
$D9 = new DB_Date('2012-11-08T12:01:35+08');
$D10 = new DB_Date('2012-11-08T12:01:35.12+08');

$D11 = new DB_Date('2012-11-08T00:01:01.05-11');
$D12 = new DB_Date('2012-11-08T23:58:35.96+11');

$D13 = new DB_Date('2012-11-07T00:01:01.05-11');
$D14 = new DB_Date('2012-11-08T23:58:35.96+11');

$D15 = new DB_Date('2012-11-08T00:01:01.05-11');
$D16 = new DB_Date('2012-11-07T23:58:35.96+11');

print $D1->getDateFormat('D l F M');
print "<hr />";
print $D2->getDateFormat('D l F M');
print "<hr />";
print $D3->getDateFormat('D l F M');
print "<hr />";
print $D4->getDateFormat('D l F M');

?>

<?php require 'config/footer.php'; ?>
