<?php
/**
 * Created by PhpStorm.
 * User: STALKER
 * Date: 08.10.2018
 * Time: 13:38
 */

$error_text = '';

if(isset($_POST['submit'])) {
    
    if(empty($_POST['login'])) {
        $error_text .= 'Введите логин' . '<br>';
    }
    
    if(empty($_POST['password'])) {
        $error_text .= 'Введите пароль' . '<br>';
    }
    
    if(empty($error_text)) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        if(strcmp($login, 'admin') == 0 && strcmp($password, '123') == 0) {
            $_SESSION['user'] = 'admin';
            $_SESSION['isAdmin'] = true;
            Header('Location: index.php');
        }
        else {
            $error_text .= 'Не правильный логин или пароль' . '<br>';
        }
    }
}

require_once($dir_file_index . '/views/login/index.php');