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

<h1>DB_Records example</h1>

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


$values = array(
  new DB_Record(array('key' => 1, 'name' => 'Pedro', 'salary' => 1254.2, 'hiredate' => new DB_Date('2001/01/25'))),
  new DB_Record(array('key' => 2, 'name' => 'Phil', 'salary' => 1554.99, 'hiredate' => new DB_Date('2001/03/25'))),
  new DB_Record(array('key' => 3, 'name' => 'Patrick', 'salary' => 2023, 'hiredate' => new DB_Date('2011/05/25'))),
  );

$recs = new DB_Records($values);

echo "Let's print the content of the records:<br />";

foreach($recs as $k => $v)
{
  echo $k . ': ' . $v . '<br />';
}

echo "<hr />Let's add and remove some records:<br />";

$r1 = $recs->pop();

$recs->push(
  new DB_Record(array('key' => 4, 'name' => 'Peter', 'salary' => 1234.56, 'hiredate' => new DB_Date('2015/02/10')))
);

$recs->push($r1);

$r2 = $recs->shift();

$recs->unshift(
  new DB_Record(array('key' => 5, 'name' => 'Paul', 'salary' => 4321.01, 'hiredate' => new DB_Date('2015/11/10')))
);

echo nl2br($recs);


?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
