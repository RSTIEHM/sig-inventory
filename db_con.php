<?php 
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "inventory");

// define("HOSTNAME", "localhost");
// define("USERNAME", "DBAdmin");
// define("PASSWORD", "G811TwrF");
// define("DATABASE", "inventory");

$con = mysqli_connect(HOSTNAME, USERNAME,PASSWORD, DATABASE);

if(!$con) {
  die("Connection Failed!!!");
} 
