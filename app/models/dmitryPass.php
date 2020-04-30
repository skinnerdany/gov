<?php
    /*
    array (size=14)
        'pass_id' => 
            array (size=1)
            'type' => string 'varchar' (length=7)
        'passport' => 
            array (size=1)
            'type' => string 'int' (length=3)
        'expire_date' => 
            array (size=1)
            'type' => string 'int' (length=3)
        'create_date' => 
            array (size=1)
            'type' => string 'int' (length=3)
        'name' => 
            array (size=1)
            'type' => string 'varchar' (length=7)
        'second_name' => 
            array (size=1)
            'type' => string 'varchar' (length=7)
        'email' => 
            array (size=1)
            'type' => string 'varchar' (length=7)
        'phone' => 
            array (size=1)
            'type' => string 'varchar' (length=7)
        'tax_id' => 
            array (size=1)
            'type' => string 'int' (length=3)
        'inn' => 
            array (size=1)
            'type' => string 'int' (length=3)
        'organization_name' => 
            array (size=1)
            'type' => string 'varchar' (length=7)
        'car_number' => 
            array (size=1)
            'type' => string 'varchar' (length=7)
        'social_card' => 
            array (size=1)
            'type' => string 'int' (length=3)
        'troika' => 
            array (size=1)
            'type' => string 'int' (length=3)
     */
    class dmitryPass extends model
    {
        public function __construct()
        {
            $result = parent::__construct();
            $this->tableName = 'pass';
            $this->tableSchema = $this->getTableSchema();
            return $result;
        }

        public function test()
        {
            var_dump($this->tableSchema);
        }
    }