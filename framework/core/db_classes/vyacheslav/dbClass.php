<?php

class dbClass implements ifDb
{
    public function query(string $sql) : array
    {
        
    }

    public function escape(string $value) : string
    {
        
    }

    public function select(string $table, $fields = '*', array $where = []) : array
    {
        
    }

    public function insert(string $table, array $data, $returnId = false)
    {
        
    }

    public function delete(string $table, array $where = [])
    {
        
    }

    public function update(string $table, array $data, array $where = [])
    {
        
    }
}
