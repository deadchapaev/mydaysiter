<?php
include "application/model/db/dao/class.UserDao.php";

if (isset($_POST['emailin'])) {
    $email = $_POST['emailr'];
    if ($email == '') {
        unset($email);
    }
}
if (isset($_POST['passin'])) {
    $pass = $_POST['passir'];
    if ($pass == '') {
        unset($pass);
    }
}

if (empty($email) or empty($pass)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$pass = stripslashes($pass);
$pass = htmlspecialchars($pass);
//удаляем лишние пробелы
$login = trim($login);
$pass = trim($pass);

// подключаемся к базе
$userDao = new UserDao();

if (!$userDao->userAuthentication($login, $password)) {


} else {
    //если ошибка авторизации то редиректим на страничку ошибки
    header('Location:/Error');
    exit;
}


?>