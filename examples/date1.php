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

print $D1;
print "<hr />";
print $D2;
print "<hr />";
print $D3;
print "<hr />";
print $D4;
print "<hr />";
print $D5;
print "<hr />";
print $D6;
print "<hr />";
print $D7;
print "<hr />";
print $D8;
print "<hr />";
print $D9;
print "<hr />";
print $D10;
print "<hr />";

$dbase = new DB_Date('N');
for ($i = 0; $i < 12; $i += 2)
{
  $d[$i] = clone $dbase;
  $d[$i]->addHours($i);
  $d[$i]->setZone($i *2 - 10);
}

print '<table border="1">';
print "<tr><td></td>";
foreach ($d as $dy)
{
  print "<td>" . $dy . "</td>";
}
print "</tr>";
foreach($d as $dx)
{
  print "<tr>";
  print "<td>" . $dx . "</td>";
  foreach ($d as $dy)
  {
    $diff = $dx->diff($dy);
    if ($diff['neg'])
      print '<td style="background-color: #ffaaaa;">';
    elseif (!$diff['neg'] && $diff['days'] == 0 && $diff['cents'] == 0)
      print '<td style="background-color: #aaaaff;">';
    else
      print '<td style="background-color: #aaffaa;">';
    print ($diff['neg']?'-':'') . $diff['days'] . ':' . $diff['cents'];
    print "</td>";
  }
  print "<tr>";
}
print "</table>";


var_dump($D1->diff($D2));
var_dump($D1->diff($D1));
var_dump($D8->diff($D9));
var_dump($D9->diff($D8));


print "<hr />";
var_dump($D11->diff($D12));
var_dump($D12->diff($D11));
print "<hr />";
var_dump($D13->diff($D14));
var_dump($D14->diff($D13));
print "<hr />";
var_dump($D15->diff($D16));
var_dump($D16->diff($D15));
print "<hr />";

var_dump($D15->inf($D16));
var_dump($D16->inf($D15));
print "<hr />";

var_dump($D15->between($D12, $D14));
var_dump($D15->between($D15, $D16));
var_dump($D15->between($D16, $D15));
print "<hr />";

?>

<?php require 'config/footer.php'; ?>
