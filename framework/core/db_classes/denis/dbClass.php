<?php

class dbClass implements ifDb
{
    private $connection = null;
    private $host;
    private $user;
    private $password;
    private $db;

    public function __construct($host, $user, $password, $db)
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->db);
        if($this->connection->connect_error){
            echo $this->connection->connect_error;
        }

    }

    public function query(string $sql) : array
    {
        $result = $this->connection->query($sql);
        if (empty($result)) {
            $result = [];
        }
        return $result;
    }

    public function escape(string $value) : string
    {
        return mysqli_escape_string($this->connection, $value);
    }

    public function select(string $table, $fields = '*', array $where = []) : array
    {
        $sql = 'SELECT ';
        $sql .= is_array($fields) ? implode(',', $fields) : $fields;
        $sql .= ' FROM ' . $table;
        $sql .= $this->getWhere($where);
        return $this->query($sql);
    }

    public function insert(string $table, array $data, $returnId = false)
    {
        $sql = 'INSERT INTO ' . $table;
        $insertSqlFields = [];
        $insertSqlValues = [];
        foreach ($data as $field => $value) {
            $insertSqlFields[] = $field;
            $insertSqlValues[] = "'" . $this->escape($value) . "'";
        }
        $sql .= '(' . implode(',', $insertSqlFields) . ') VALUES (' .implode(',', $insertSqlValues) . ')';
        if ($returnId) {
            $sql .= ' RETURNING id';
        }
        $id = 0;
        $res = $this->query($sql);
        if (!empty($res)) {
            $id = $res[0]['id'];
        }
        
        return $id;
    }

    public function delete(string $table, array $where = [])
    {
        return $this->query('DELETE FROM ' . $table . $this->getWhere($where));
    }

    public function update(string $table, array $data, array $where = [])
    {
        $sql = 'UPDATE ' . $table . ' SET ';
        
        $updateData = [];
        foreach ($data as $field => $value) {
            $updateData[] = $field . '=\'' . $this->escape($value) . "'";
        }
        $sql .= implode(',', $updateData);
        $sql .= $this->getWhere($where);
        return $this->query($sql);
    }

    protected function getWhere($where = [])
    {
        $sql = '';
        if (is_array($where) && !empty($where)) {
            $whereSql = [];
            foreach ($where as $field => $value) {
                $whereSql[] = $field . '=\'' . $this->escape($value) . "'";
            }
            if (!empty($whereSql)) {
                $sql .= ' WHERE ' . implode(' AND ', $whereSql);
            }
        }
        return $sql;
    }
}
