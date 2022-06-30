<?php
$sname= "localhost";
$unmae= "id19041353_inqolav";
$password = "9+J@[DzPfdQ&zgNp";
$db_name = "id19041353_inqola";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
