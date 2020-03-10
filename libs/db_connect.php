<?php 
$server = 'localhost';
$name = 'backster';
$pass = '19972507b';

$dsn = 'mysql: host='.$server.'; dbname=leaderingold; charset=utf8;';
$pdo = new PDO($dsn, $name, $pass);
?>