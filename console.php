<?php

$dir_file_index = dirname(__FILE__);

require_once  ($dir_file_index . '/models/db.php');

if(isset($_GET['file'])) {
    $form = $_GET['file'];
    
    switch ($form) {
        case 'create_database': require_once ($dir_file_index . '/migrations/create_database.php'); break;
        case 'create_table': require_once ($dir_file_index . '/migrations/create_table.php'); break;
        case 'insert_data': require_once ($dir_file_index . '/migrations/insert_data.php'); break;
        default: echo 'Указан не верный файл для выполнения - ' . date('d.m.Y H:i:s' ,time()) . '<br>';
    }
}
else {
    echo 'Не указан файл для выполнения - ' . date('d.m.Y H:i:s' ,time()) . '<br>';
}