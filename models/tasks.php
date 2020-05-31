<?php

require_once  ($dir_file_index . '/models/db.php');

class Tasks
{
    private $db;
    private $connection;
    
    function __construct()
    {
        $this->db = new DB();
        $this->connection = $this->db->getConnection();
    }

    public function select($order_by = null)
    {
        $fields = ['id', 'name', 'email', 'task', 'status', 'created_at', 'updated_at'];
        
        $sql = "SELECT " . implode(', ', $fields) . " FROM tasks $order_by;";
        
        return $this->db->selectSQL($fields, $sql, $this->connection);
    }
    
    public function selectOne($id = null)
    {
        if($id === null) return ['error' => true, 'message' => 'Не указан id записи!'];
    
        $fields = ['id', 'name', 'email', 'task', 'status', 'created_at', 'updated_at'];
    
        $sql = "SELECT " . implode(', ', $fields) . " FROM tasks WHERE id = " . (int)$id . ";";
    
        $result = $this->db->selectSQL($fields, $sql, $this->connection);
        
        if(count($result['data']) == 0) return ['error' => true, 'message' => 'Нет данных!'];
        
        foreach ($result['data'] as $item) {
            $data = [
                'id' => $item['id'],
                'name' => $item['name'],
                'email' => $item['email'],
                'task' => $item['task'],
                'status' => $item['status'],
                'created_at' => $item['created_at'],
                'updated_at' => $item['updated_at'],
            ];
            
            break;
        }
        
        $result['data'] = $data;
        
        return $result;
    }
    
    public function insert($data = null)
    {
        if($data === null) return ['error' => true, 'message' => 'Нет данных!'];
        
        $keys = [];
        $values = [];
        
        foreach ($data as $key => $value) {
            $keys[] = $key;
            $values[] = "'" . $value . "'";
        }
        
        $sql = "INSERT INTO tasks (" . implode(', ', $keys) . ") VALUES (" . implode(', ', $values) . ");";

        return $this->db->execSQL($sql, $this->connection);
    }
    
    public function updateDone($id = null, $done = false)
    {
        if($id === null) return ['error' => true, 'message' => 'Не указан id записи!'];
        
        $save_done = 0;
        
        if($done) {
            $save_done = 1;
        }
        
        $sql = "UPDATE tasks SET status = " . $save_done . " WHERE id = " . $id . ";";
    
        return $this->db->execSQL($sql, $this->connection);
    }
}