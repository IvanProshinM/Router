<?php




$dblocation = "mailsender";
$dbuser = "mailsender";
$dbpasswd = "qwerty";

//Подключение к базе данных
$connection = mysqli_connect('mariadb', $dbuser, $dbpasswd);
var_dump($connection);

if (!$connection) {
     echo 'ошибка подключения';
} else {
    echo 'бд подключена успешно!';
}



/*
try {
    $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty');
} catch (\PDOException $e) {
    die($e->getMessage());
}*/