<?php

require_once  ($dir_file_index . '/models/tasks.php');

$tasks = new Tasks();

$error_text = '';

$data_form = [];

require_once  ($dir_file_index . '/views/task/_params.php');

if(isset($_POST['submit'])) {
    
    if(isset($_POST['name'])) {
        if(empty($_POST['name'])) {
            $error_text .= 'Введите Имя' . '<br>';
        }
        else {
            $data_form['name'] = $_POST['name'];
        }
    }
    
    if(isset($_POST['email'])) {
        if(empty($_POST['email'])) {
            $error_text .= 'Введите Еmail' . '<br>';
        }
        else {
            $data_form['email'] = $_POST['email'];
        }
    }
    
    if(isset($_POST['task'])) {
        if(empty($_POST['task'])) {
            $error_text .= 'Введите Текст задачи' . '<br>';
        }
        else {
            $data_form['task'] = $_POST['task'];
        }
    }
    
    if(!filter_var($data_form['email'], FILTER_VALIDATE_EMAIL))
    {
        $error_text .= 'EMAIL - заполнен не верно!' . '<br>';
    }
    
    if(empty($error_text)) {
        
        $insert = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'task' => htmlentities($_POST['task']),
        ];

        $result = $tasks->insert($insert);
        
        if($result['error']) {
            $error_text .= $result['message'] . '<br>';
        }
        else {
            Header('Location: ' . 'index.php?params' . $url_params);
        }
    }
}

require_once($dir_file_index . '/views/task/create.php');