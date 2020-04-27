<?php

class dbClass implements ifDb
{

    public $connection = false;
    public function __construct(){
   
        if($this->connection === false){
            $this->connection = mysqli_connect(
                core::app()->db['host'],
                core::app()->db['user'],
                core::app()->db['password'],
                core::app()->db['database']
            );
        }

 /*        $res = mysqli_query($this->connection, "INSERT INTO gibdd (passport) VALUE ('avsbsbsbs')");
        var_dump($res);
        print_r(mysqli_error($this->connection));
        die();  */

    }

    public function query(string $sql) : array {

        $data =[];
        $result = mysqli_query($this->connection, $sql);
        //var_dump( $result);
        if($result === true){
            $data['result'] = true;
        }
        if($result === false){
            echo mysqli_error($this->connection);
             $data['result'] = mysqli_errno($this->connection);
             
        }
        if( $result instanceof mysqli_result ){

            while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)){
                $data[] = $row;
            } 
        } 
            return $data;       
    }



    public function escape(string $value):string
    {
        return mysqli_escape_string($this->connection, $value);
    }
         
    public function select(string $table, $fields = '*', array $where = []) : array{
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
    
        //print_r($res);
       /*  if (empty($res) ) {
            $id = mysqli_insert_id($this->connection);
        } */
        //echo $id;

        
        return $res['result'];
    }

    public function delete(string $table, array $where = [])
    {
        return $this->query('DELETE FROM ' . $table . $this->getWhere($where));
    }

    public function update(string $table, array $data,  array $where = [])
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








