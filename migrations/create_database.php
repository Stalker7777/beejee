<?php

/**
 * localhost/beejee/console.php?file=create_database
 */

$db = new DB();

$connection = $db->getConnection();

$sql = "
    CREATE DATABASE IF NOT EXISTS " . $connection['dbname'] . "
    CHARACTER SET utf8
    COLLATE utf8_general_ci
";

$connection['dbname'] = null;

$result = $db->execSQL($sql, $connection);

if($result['error']) {
    echo $result['message'] . ' - ' . date('d.m.Y H:i:s' ,time()) . '<br>';
}
else {
    echo $result['message'] . ' - ' . date('d.m.Y H:i:s' ,time()) . '<br>';
}
