<?php

$dir_file_index = dirname(__FILE__);

require_once  ($dir_file_index . '/views/layouts/header.php');

if(isset($_GET['form'])) {
    $form = $_GET['form'];
    
    switch ($form) {
        case 'login': require_once ($dir_file_index . '/controllers/login.php'); break;
        case 'logout': require_once ($dir_file_index . '/controllers/logout.php'); break;
        case 'create_task': require_once ($dir_file_index . '/controllers/create_task.php'); break;
        case 'update_task': require_once ($dir_file_index . '/controllers/update_task.php'); break;
        default: require_once  ($dir_file_index . '/controllers/index.php');
    }
}
else {
    require_once  ($dir_file_index . '/controllers/index.php');
}

require_once ($dir_file_index . '/views/layouts/footer.php');