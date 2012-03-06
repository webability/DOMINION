<?php

// Dominion v8 examples
// Language: PHP
// Creation: 09/10/2011

// TABLE: country,
// countries

$country = new DB_Table("country", "cou_", DB_Table::TABLE);

// PK, 2 ISO letters
$country->AddField(
  new DB_FieldVarchar("key", 2, new DB_Check(array(DB_Check::PK)))
);

// Name of the country
$country->AddField(
  new DB_FieldVarchar("name", 255, new DB_Check(DB_Check::NN))
);

// Population of the country
$country->AddField(
  new DB_FieldInteger("population", new DB_Check(DB_Check::NN))
);

// Flag of the country
$country->AddField(
  new DB_FieldLob("flag")
);

?>