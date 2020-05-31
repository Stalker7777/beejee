<?php

/**
 * localhost/beejee/console.php?file=create_table
 */

$db = new DB();

$connection = $db->getConnection();

$sql = "
    CREATE TABLE IF NOT EXISTS tasks (
      id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL,
      task TEXT NOT NULL,
      status INT NOT NULL DEFAULT 0,
      created_at INT NOT NULL,
      updated_at INT NULL
    ) CHARACTER SET utf8 COLLATE utf8_general_ci
";

$result = $db->execSQL($sql, $connection);

if($result['error']) {
    echo $result['message'] . ' - ' . date('d.m.Y H:i:s' ,time()) . '<br>';
}
else {
    echo $result['message'] . ' - ' . date('d.m.Y H:i:s' ,time()) . '<br>';
}
