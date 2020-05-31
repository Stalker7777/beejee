<?php

require_once  ($dir_file_index . '/models/tasks.php');

$tasks = new Tasks();

$error_text = '';

if(!isset($_SESSION['isAdmin'])) {
    echo 'Доступ запрещен';
    return;
}

require_once  ($dir_file_index . '/views/task/_params.php');

if(isset($_POST['submit'])) {
    
    $id = $_POST['id'];
    
    $done = 0;
    
    if(isset($_POST['done'])) {
        $done = 1;
    }

    $result = $tasks->updateDone($id, $done);
    
    if($result['error']) {
        $error_text .= $result['message'] . '<br>';
    }
    else {
        Header('Location: ' . 'index.php?params' . $url_params);
    }
}

if(isset($_POST['id'])) {
    $id = $_POST['id'];
}
else {
    $id = $_GET['id'];
}

$result = $tasks->selectOne($id);

if($result['error']) {
    $data_form = [];
    $error_text .= $result['message'] . '<br>';
}
else {
    $data_form = $result['data'];
}

require_once($dir_file_index . '/views/task/update.php');