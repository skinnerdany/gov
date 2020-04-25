<?php

class dbClass implements ifDb
{
    private $connection = false;

    public function __construct()
    {
        foreach(Core::app()->db as $key => $value){
            $$key = $value;
        }
        $port = $port ?? '3306';
        $this->connection = mysqli_connect(
            $host, 
            $user, 
            $password, 
            $database,
            $port
         );

         mysqli_query($this->connection, "SET NAMES 'utf8'");
    }
    public function query(string $sql) : array
    {
        $result = mysqli_query($this->connection, $sql) or mysqli_error($this->connection);
        //echo $sql;
        if(!is_bool($result)){
            for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
            if(empty($data)){
                $result = [];
            }else{
                $result = $data;
            }
        }

        if(is_bool($result)){
           $result = $result === true ? ['true'] : ['false'];
        }
        return $result;
    }
    
    public function escape(string $value) : string
    {
        return mysqli_escape_string($this->connection, $value);
    }
    
    public function select(string $table, $fields = '*', $where = []) : array
    {
        $sql = 'SELECT ';
        $sql .= is_array($fields) ? implode(',', $fields) : $fields;
        $sql .= ' FROM ' . $table;
        $sql .= $this->getWhere($where);
        return $this->query($sql);
    }

    public function insert(string $table, array $data, $returnId = false)
    {
        $sql = 'INSERT INTO ' . $table. ' ';
        $insertSqlFields = [];
        $insertSqlValues = [];
        foreach ($data as $field => $value) {
            $insertSqlFields[] = $field;
            $insertSqlValues[] = "'" . $this->escape($value) . "'";
        }
        $sql .= '(' . implode(',', $insertSqlFields) . ') VALUES (' .implode(',', $insertSqlValues) . ')';
        $res = $this->query($sql);

        if($res[0] == 'true' && $returnId){
            $res = $this->select($table, 'id', ['id' => 'LAST_INSERT_ID']);
        }
        
        return $res;
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

    protected function getWhere(array $where = [])
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


/*
    Query builder for MySQL

    select()                    ===> ()='*', ('param1, param2, ...'), ['param1', 'param2', ...], ('param1','param2', ...)
    update(table, params)       ===> ('table', ['param1' => 'value1', 'param2'=>'value2', ...])
    delete(table, bool = false) ===> ('table') put true as second parameter for using without WHERE
    where(params, bool = true)  ===> ('param1 = value, param2 <= value2'), (['param1 = value1', 'param2 <= value2'], bool) true is 'AND' as default, false is 'OR';
    insert(table, params)       ===> ('table', ['param1' => 'value1', 'param2' => 'value2', ...])
    group($fields)              ===> ('param1, param2, ...'), ('param1', 'param2', ...)
    orderBy()                   ===> ('param1', 'param2', ...)
    limit()                     ===> ('param1', 'param2')

    execute(strict = false) if true executes in order as written in code - good for complex query;

------------------------------------------------------------------------------------------------------------------------
    EXAMPLE:

    $query = new QueryBuilder($host, $user, $password, $database)

    $query->select('id', 'param1', 'param2')
                        ->where(['id < 5', 'param1 = 4'])
                        ->from('table1')
                        ->join('table2', 'id', 'id')
                        ->groupBy('id')
                        ->execute();
    RESULT: ===> SELECT id, param1, param2 FROM table1 JOIN table2 ON table2.id = table1.id WHERE id < '5' AND param1 = '4' GROUP BY id
 ----------------------------------------------------------------------------------------------------------------------
*/

    class QueryBuilder
    {

        private $sentences = [];
        private $db;

        private $select = [];
        private $update = [];
        private $delete = [];
        private $from   = [];
        private $where  = [];
        private $insert = [];
        private $group  = [];
        private $join   = [];
        private $order  = [];
        private $limit  = [];

        public function __construct()
        {
            $this->db = new dbClass();

             $this->db->query("SET NAMES 'utf8'");
        }

        public function select()
        {
            if(empty(func_get_args())){
                $fields = ['*'];
            }elseif(is_array((func_get_args())[0])){
                $fields = (func_get_args())[0];
            }else{
                $fields = func_get_args();
            }

            $this->select[] = $fields;
            $this->sentences[] = $this->buildSelect();

            return $this;
        }
        
        private function buildSelect()
        {

            $fields = $this->select[0];
            $fields = implode(', ', $fields);
            $fields = $this->escape($fields);
           
           return 'SELECT ' . $fields;
            
        }

        public function from(string $table)
        {   
            $this->from[] = $table;
            $this->sentences[] = $this->buildFrom();

            return $this;
        }
        
        private function buildFrom()
        {
            $from = $this->from[0];
            $from = $this->escape($from);

            return 'FROM ' . $from;
        }

        public function update(string $table, array $assoc)
        {
            $this->update[] = $table;
            $this->update[] = $assoc;
            $this->sentences[] = $this->buildUpdate();
            
            return $this;
        }
        
        private function buildUpdate()
        {
            $table = $this->escape($this->update[0]);
            $fields = $this->getFieldsFromAssoc($this->update[1]);
    
            $fields = implode(', ', $fields);
    

            return 'UPDATE '.$table.' SET '.$fields;
        }

        public function where($fields, bool $AND = true)
        {
            $this->where['fields'] = $fields;
            $this->where['AND'] = $AND;
            $this->sentences[] = $this->buildWhere();


            return $this;
        }
        
        private function buildWhere()
        {
            $regex = '/([^ ][\'"a-zA-Z0-9_а-яА-Я.]*)\W*?([!<=>]{1,2})\W*?([^ ][\'"a-zA-Z0-9_а-яА-Я.@]*)/u';
            if(is_array($this->where['fields'])){
                $rawFields = $this->where['fields'];
                foreach($rawFields as $value){
                    preg_match(
                        $regex, 
                        $value, $matches);
                   
                     $fields[] = "{$matches[1]} {$matches[2]} '{$this->escape($matches[3])}'";
                }
                if($this->where['AND'])
                {
                    $fields = implode(' AND ', $fields);
                }else{
                    $fields = implode(' OR ', $fields);
                }
            }else{
                $fields = preg_replace(
                    $regex, 
                    '$1 $2 \'$3\'', $this->where['fields']);
            }

            return 'WHERE ' . $fields;
        }

        public function insert(string $table, array $assoc)
        {
            $this->insert['table'] = $table;
            $this->insert['fields'] = $assoc;
            $this->sentences[] = $this->buildInsert();
            
            return $this;
        }
        
        private function buildInsert()
        {
            $table = $this->insert['table'];
            $assoc = $this->insert['fields'];

            foreach($assoc as $key => $value){
                $keys[] = $this->escape($key);
                $values[] ="'".$this->escape($value)."'";
            }
    
            $keys = implode(', ', $keys);
            $values = implode(', ', $values);

            return "INSERT INTO $table ($keys) VALUES ($values)";
        }
        
        public function delete(string $table, bool $I_KNOW_WHAT_I_DOING = false)
        {
            $this->delete['table'] = $table;
            $this->delete['I_KNOW_WHAT_I_DOING'] = $I_KNOW_WHAT_I_DOING;
            $this->sentences[] = $this->buildDelete();

            return $this;
        }
        
        private function buildDelete()
        {
            $table = $this->delete['table'];
            $table = $this->escape($table);

            return 'DELETE FROM '.$table;
        }

        public function join(string $table, string $table_param, string $from_table_param)
        {
            $this->join['table'] = $table;
            $this->join['table_param'] = $table_param;
            $this->join['from_table_param'] = $from_table_param;
            $this->sentences[] = $this->buildJoin();

            return $this;
        }

        private function buildJoin()
        {
            $rawFields = $this->join;
            $fields = [];
            foreach($rawFields as $key => $value){
                $fields[$key] = $this->escape($value);
            }

            $table = $fields['table'];
            $fromTable = $this->escape($this->from[0]);
            $tableParam = $fields['table_param'];
            $fromTableParam = $fields['from_table_param'];

            return "JOIN $table ON $table.$tableParam = $fromTable.$fromTableParam";
        }

        public function groupBy()
        {
            $this->group = func_get_args();
            $this->sentences[] = $this->buildGroup();
            
            return $this;
        }

        private function buildGroup()
        {
            $rawFields = $this->group;
            $fields = [];
            foreach($rawFields as $value){
                $fields[] = $this->escape($value);
            }

            return 'GROUP BY '.implode(', ', $fields);
        }

        public function orderBy()
        {
            $this->order = func_get_args();
            $this->sentences[] = $this->buildOrder();

            return $this;
        }

        private function buildOrder()
        {
            $rawFields = $this->order;
            $fields = [];
            foreach($rawFields as $value){
                $fields[] = $this->escape($value);
            }

            return 'ORDER BY '.implode(', ', $fields);
        }

        public function limit()
        {
            $this->limit = func_get_args();
            $this->sentences = $this->buildLimit();

            return $this;
        }

        private function buildLimit()
        {
            $rawFields = $this->limit;
            $fields = [];
            foreach($rawFields as $value){
                $fields[] = $this->escape($value);
            }

            return 'LIMIT '.implode(', ', $fields);
        }

        public function getText($strict = false)
        {
            $query = '';
            if($this->insert){
                $query .= ' '.$this->buildInsert().' ';
            }
            if($this->update){
                $query .= ' '.$this->buildUpdate().' ';
            }
            if($this->delete && ($this->delete['I_KNOW_WHAT_I_DOING'] || $this->where)){
                $query .= ' '.$this->buildDelete().' ';
            }elseif($this->delete){
                echo 'You\'re going to clean all table if you meant that put TRUE as second parameter in delete()';
            }
            if($this->select){
                $query .= ' '.$this->buildSelect().' ';
            }
            if($this->from){
                $query .= ' '.$this->buildFrom().' ';
            }
            if($this->join){
                $query .= ' '.$this->buildJoin().' ';
            }
            if($this->where){
                $query .= ' '.$this->buildWhere().' ';
            }
            if($this->group){
                $query .= ' '.$this->buildGroup().' ';
            }
            if($this->order){
                $query .= ' '.$this->buildOrder().' ';
            }
            if($this->limit){
                $query .= ' '.$this->buildLimit().' ';
            }

            if($strict){
                return implode(' ', $this->sentences);
            }

            return $query;
        }

        
        public function execute($strict = false)
        {  
            $sql = $this->getText($strict);
            //echo $sql;
            $result = $this->db->query($sql);

            $out = [];
            if($result === false){
                //echo '<b>Fail:</b> '.$sql;
                $out = false;
            }else{
                $out = $this->extractResult($result);
            }
            $this->cleanStatements();

            return $out;
        }

        private function getFieldsFromAssoc(array $assoc)
        {
            $fields = [];
            foreach($assoc as $key => $value){
                $key = $this->escape($key);
                $value = "'".$this->escape($value)."'";
                $fields[] = "$key = $value";
            }

            return $fields;
        }

        private function cleanStatements()
        {
            $this->select    = [];
            $this->update    = [];
            $this->delete    = [];
            $this->from      = [];
            $this->insert    = [];
            $this->where     = [];
            $this->groupBy   = [];
            $this->orderBy   = [];
            $this->limit     = [];
            $this->join      = [];
            $this->sentences = [];
        }

        private function escape($sql)
        {
            return mysqli_escape_string($this->db, $sql);
        }

        private function extractResult($result)
        {
            $out = [];
            if(!is_bool($result)){
                while($row = mysqli_fetch_assoc($result)){
                    $out[] = $row;
                }
            }else{
                $out = $result;
            }
            return $out;
        }
    }