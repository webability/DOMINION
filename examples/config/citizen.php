<?php

// Dominion v8 examples
// Language: PHP
// Creation: 09/10/2011

// TABLE: citizen,
// citizens

$citizen = new DB_Table("citizen", "cit_", DB_Table::TABLE);

//PK, SEQUENCE
$citizen->AddField(
  new DB_FieldInteger("key", new DB_Check(array(DB_Check::PK, DB_Check::AI)))
);

$citizen->AddField(
  new DB_FieldVarchar("name", 255, new DB_Check(DB_Check::NN))
);

$citizen->AddField(
  new DB_FieldVarchar("mail", 255, new DB_Check(DB_Check::NN))
);

$citizen->AddField(
  new DB_FieldText("info")
);

$citizen->AddField(
  new DB_FieldLob("picture")
);

$citizen->AddField(
  new DB_FieldDateTime("date", new DB_Check(DB_Check::NN))
);

?>