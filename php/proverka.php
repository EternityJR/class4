<?php
    header('Content-Type: text/html; charset=utf-8');
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    if(mb_strlen($name) < 2 || mb_strlen($name) > 20) {
        echo "Недопустимая длина имени<br>";
        echo "<a href='../index.php'>Вернуться назад</a>";
        exit();
    }
    else if(mb_strlen($surname) < 3 || mb_strlen($surname) > 20) {
        echo "Недопустимая длина фамилии (от 4 до 20)<br>";
        echo "<a href='../index.php'>Вернуться назад</a>";
        exit();
    }
    
    else if(mb_strlen($login) < 5 || mb_strlen($login) > 15) {
        echo "Недопустимая длина логина (от 6 до 15)<br>";
        echo "<a href='../index.php'>Вернуться назад</a>";
        exit();
    }
    else if(mb_strlen($mail) < 6 || mb_strlen($mail) > 60) {
        echo "Недопустимая длина почты<br>";
        echo "<a href='../index.php'>Вернуться назад</a>";
        exit();
    }
    else if(mb_strlen($password) < 5 || mb_strlen($password) > 32) {
        echo "Недопустимая длина пароля (от 6 до 32)<br>";
        echo "<a href='../index.php'>Вернуться назад</a>";
        exit();
    }

    $mysql = new mysqli('class4', 'root', '', 'base');
    $mysql->query("INSERT INTO `users` (`name`, `surname`, `login`, `mail`, `password`) VALUES ('$name', '$surname', '$login', '$mail', '$password')");

    $mysql->close();

    header('location: ../log.php');

?>