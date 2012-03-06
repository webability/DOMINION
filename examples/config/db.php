<?php

$dbtype = DB_Base::POSTGRES;
$db = 'wa_test';
$un = 'wa_admin';
$pw = 'watest';

$DB = new DB_Base($dbtype);
$DB->setLogon($un, $pw, $db);

?>