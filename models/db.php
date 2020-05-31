<?php

class DB
{
    private $connection = [
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'dbname' => 'beejee',
    ];
    
    public function getConnection()
    {
        return $this->connection;
    }
    
    public function execSQL($sql, $connection)
    {
        $mysqli = new mysqli($connection['host'], $connection['username'], $connection['password'], $connection['dbname']);
    
        if ($mysqli->connect_errno) {
            return ['error' => true, 'message' => 'Не удалась создать соединение с базой данных!'];
        }
    
        if (!$result = $mysqli->query($sql)) {
            return ['error' => true, 'message' => 'Ошибка при выполнении запроса!' /*. $mysqli->error*/];
        }
        
        $mysqli->close();

        return ['error' => false, 'message' => 'Запрос выполнен!'];
    }
    
    public function selectSQL($fields, $sql, $connection)
    {
        $mysqli = new mysqli($connection['host'], $connection['username'], $connection['password'], $connection['dbname']);
        
        if ($mysqli->connect_errno) {
            return ['error' => true, 'message' => 'Не удалась создать соединение с базой данных!'];
        }
        
        if (!$result = $mysqli->query($sql)) {
            return ['error' => true, 'message' => 'Ошибка при выполнении запроса!' /*. $mysqli->error*/];
        }
    
        if ($result->num_rows === 0) {
            return ['error' => false, 'message' => 'Данных нет!', 'data' => []];
        }

        $data = [];
        
        while ($item = $result->fetch_assoc()) {
            $result_temp = [];
            foreach ($fields as $field) {
                $result_temp[$field] = $item[$field];
            }
            $data[] = $result_temp;
        }
    
        $result->free();
        $mysqli->close();
        
        return ['error' => false, 'message' => 'Запрос выполнен!', 'data' => $data];
    }
}