<?php

// Dominion v8 examples
// Language: PHP
// Creation: 09/10/2011

// TABLE: language,
// languages

$language = new DB_Table("language", "lan_", DB_Table::TABLE);

// PK, 2 ISO letters
$language->AddField(
  new DB_FieldVarchar("key", 2, new DB_Check(array(DB_Check::AI)))
);

$language->AddField(
  new DB_FieldVarchar("name", 255, new DB_Check(DB_Check::NN))
);

?>