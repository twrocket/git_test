<?php
// define PDO - tell about the database file
$database = new SQLite3("news.db");
$dat = new Post();
if($database)
{
  echo "connected";
}
//write sql

// run sql
