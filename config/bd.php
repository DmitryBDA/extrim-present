<?php
//переменные основные

// данные подключения к базе данных
$server = "localhost";
$username = "root";
$password = "";
$dbname = "extrim";

// функции подключенияfg
// подключение к базе данных chat
$connect = mysqli_connect($server, $username, $password, $dbname);
//кодировка базы данных
mysqli_set_charset($connect, "utf8");

?>