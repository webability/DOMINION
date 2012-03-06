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
  <link rel="stylesheet" href="/skins/css/domcore.css" type="text/css" />

</head>
<body>

<div class="container">

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />
<br />

<h1>WASHM example</h1>

<?php

// We assure any DomCore library we call will be automatically loaded
include_once '../include/__autoload.lib';

define('WADEBUG', false);

echo "We are testing this on:<br />";
echo "DomCore version ".WADebug::VERSION."<br />";
echo "HTML API ? ".(WADebug::getHTMLAPI()?'Yes':'No')."<br />";
echo "OS Type ? ".(WADebug::getOSType()==WADebug::WINDOWS?'Windows':(WADebug::getOSType()==WADebug::UNIX?'Unix':'Mac'))."<br />";
echo "<br />";

// Start the SHM with 20Mb default size and default ID
$SHM = new WASHM();

echo <<<EOF
Menu: <br />
<a href="shm.php?option=1">Add or modify a shared memory variable</a><br />
<a href="shm.php?option=4">Empty the shared memory</a><br />
<br />
<hr />
<br />
EOF;

$option = isset($_GET['option'])?$_GET['option']:null;

switch($option)
{
  case 1:
    $name = isset($_GET['name'])?$_GET['name']:null;
    $value = null;
    if ($name)
      $value = htmlentities($SHM->read(rawurldecode($name)), ENT_COMPAT, 'UTF-8');
    $vname = htmlentities($name, ENT_COMPAT, 'UTF-8');
    echo <<<EOF
<form method="GET" action="shm.php">
  Name: <input type="text" name="name" value="$vname"/><br />
  Value: <input type="text" name="value" value="$value" /><br />
  <input type="hidden" name="option" value="2" /><br />
  <input type="submit" value="Add or modify the variable" /><br />
</form>
<br /><hr /><br />
EOF;
    break;
  case 2:
    $name = isset($_GET['name'])?$_GET['name']:null;
    $value = isset($_GET['value'])?$_GET['value']:null;
    if ($name)
    {
      $SHM->write($name, $value);
    }
    break;
  case 3:
    $name = isset($_GET['name'])?$_GET['name']:null;
    $SHM->delete($name);
    break;
  case 4:
    $SHM->flush();
    break;
}

$m = $SHM->size();
echo "Used: {$m['used']}, free: {$m['free']}<br />";
$c = $SHM->content();
foreach($c as $name => $link)
{
  echo 'Variable: <b>' . htmlentities($name, ENT_COMPAT, 'UTF-8') . "</b>: pointer: {$link['p']}, last read: ". date('Y/m/d H:i:s', $link['r']) . ", last write: " . date('Y/m/d H:i:s', $link['w']) . ' [<a href="?option=1&name='.rawurlencode($name).'">Modify</a>] [<a href="?option=3&name='.rawurlencode($name).'">Delete</a>]<br />' .
       'Value: ' . htmlentities(print_r($SHM->read($name), true), ENT_COMPAT, 'UTF-8') . '<br /><hr />';

}

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
