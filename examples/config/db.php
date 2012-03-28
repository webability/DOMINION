<?php
/*
$dbtype = DB_Base::POSTGRES;
$db = 'wa_test';
$un = 'wa_admin';
$pw = 'watest';
*/
$dbtype = DB_Base::POSTGRES;
$db = 'mall';
$un = 'root';
$pw = 'pgjaftc1';

$DB = new DB_Base($dbtype);
$DB->setLogon($un, $pw, $db);

?>