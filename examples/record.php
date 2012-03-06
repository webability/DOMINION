<?php
  // have to put this into a php block or the <?xml will be put as a PHP syntax error on extended code escape
  echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <!-- Generic browser family -->
  <title>DomCore Demos, a WebAbility&reg; Network Project</title>
  <meta http-equiv="PRAGMA" content="NO-CACHE" />
  <meta http-equiv="Expires" content="-1" />

  <meta name="Keywords" content="WAJAF, WebAbility" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="Charset" content="UTF-8" />
  <meta name="Language" content="en" />
  <link rel="stylesheet" href="/skins/css/dominion.css" type="text/css" />

</head>
<body>

<div class="container">

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />
<br />

<h1>DB_Record example</h1>

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

$values = array('key' => 1, 'name' => 'Pedro', 'salary' => 1254.2, 'hiredate' => new DB_Date('2001/01/25'));

$rec = new DB_Record($values);

echo "Let's print the content of the record:<br />";

foreach($rec as $k => $v)
{
  echo $k . ': ' . $v . '<br />';
}

echo "<hr />Let's change some data and print again the content of the record:<br />";

$rec->salary = 1433.40;
$rec->dept = 'Legal';
$rec->promotiondate = new DB_Date('N');
unset($rec->hiredate);

echo $rec;

echo "<hr />Let's assign another record:<br />";

$rec->setArray(
  array(
    'key' => 2,
    'name' => 'Steve',
    'salary' => 22534.2,
    'dept' => 'CEO',
  )
);

echo $rec;

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
