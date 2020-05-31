<?php

/**
 * localhost/beejee/console.php?file=insert_data
 */

$db = new DB();

$connection = $db->getConnection();

for($i = 1; $i <= 10; $i++) {

    $sql = "
        INSERT INTO tasks (id, name, email, task, created_at) VALUES (" . $i . ", 'name " . $i . "' , 'test" . $i . "@test.com', 'test task " . $i . "', " . time() . ")
    ";

    $result = $db->execSQL($sql, $connection);
    
    if($result['error']) {
        echo $result['message'] . ' - ' . date('d.m.Y H:i:s' ,time()) . '<br>';
    }
    else {
        echo $result['message'] . ' - ' . date('d.m.Y H:i:s' ,time()) . '<br>';
    }
}
