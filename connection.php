<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "Icu_tv";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
