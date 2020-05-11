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
        private $models = [];

        public function __construct()
        {
            $result = parent::__construct();
            $this->tableName = 'pass';
            $this->tableSchema = $this->getTableSchema();
            return $result;
        }

        public function getModel($name){
            if(isset($this->models[$name])){
                return $this->models[$name];
            }

            return $this->$name;
        }

        public function test()
        {
            var_dump($this->tableSchema);
        }

        public function buildPass($data)
        {

            foreach($data as $key => $value){
                $data[$key] = trim($value);
            }
            $this->validateData($data);
            $this->addModel('tax');
            $this->addModel('okved');
            $this->addModel('people_tax');
            
            $this->setOrganization($data);
            $this->aggregateData($data);
            
            //var_dump($this->tableSchema);
            if($this->organization['always'] == 1){
                $this->generatePass();
            }else{
                throw new Exception('Деятельность Вашей организации приостановлена.');
            }
        }

        public function showPass($data)
        {
            $res = self::$db->select('pass', '*', ['pass_id' => $data['pass_id']]);
            if(count($res) == 0){
                throw new Exception('Пропуска с номером ' . $data['pass_id'] . ' не существует.');
            }
            return reset($res);
        }

        protected function generatePass()
        {
            $this->create_date = time();
            $this->expire_date = time() + 60*60*24*15; // +15 дней;
            $this->pass_id     = $this->getPassId();
            
            if($this->social_card || $this->troika){
                $this->unlockTransportCard();
            }
            
            $this->save();
        }

        private function getPassId()
        {
            return md5(md5($this->passport).md5(random_int(0, PHP_INT_MAX)));
        }

        protected function aggregateData($data)
        {
            if(!$this->isExistData('mfc', ['passport' => $data['passport']] )){
                $this->addData('mfc', [
                    'name'          => $data['name'],
                    'second_name'   => $data['second_name'],
                    'passport'      => $data['passport'],
                    'sex'           => $data['sex'],
                    'social_card'   => (int)$data['social_card'],
                    'email'         => $data['email'],
                    'phone'         => $data['phone'] // 10 цифр
                ]);
            }

            if(!$this->isExistData('social_transport', ['passport' => $data['passport']])){
                $this->addData('social_transport', [
                    'troika'        => (int)$data['troika'],
                    'social_card'   => (int)$data['social_card'],
                    'passport'      => $data['passport'],
                    '`lock`'        => 1,
                    'unlock_expire' => 0
                ]);
            }

            if(!$this->isExistData('gibdd', ['nunmber' => $data['car_number']])){
                $this->addData('gibdd', [
                    'nunmber'   => $data['car_number'],
                    'passport'  => $data['passport']
                ]);
            }
            $this->tax_id = $this->organization['id'];
            foreach($data as $key => $value){
                if(is_numeric($value)){
                    $this->$key = (int) $value;
                    continue;
                }
                $this->$key = $value;
            }

            $this->social_card = (int) $this->social_card;
            $this->troika      = (int) $this->troika;

        }

        // функция для добавления новых моделей необходимых для работы pass
        private function addModel($modelName)
        {
            if(file_exists(core::app()->models_dir.$modelName.'.php')){
                include_once core::app()->models_dir.$modelName.'.php';
                $this->models[$modelName] = new $modelName();
                return true;
            }

            return false;
        }

        protected function setOrganization($data)
        {
            $organization = $this->getModel('tax')->getOrganization($data['inn']);
            $this->organization = reset($organization);

            if(empty($this->organization)){
                throw new Exception('Организации с ИНН '.$data['inn'].' нет в базе данных.');
            }

            return true;
        }

        protected function addData(string $table, array $data)
        {
            $res = self::$db->insert($table, $data);

            return $res;
        }

        protected function isExistData(string $table, array $data)
        {
            $res = self::$db->select($table, '*', $data);

            if(count($res) > 0){
                $res = true;
            }else{
                $res = false;
            }

            return $res;
        }

        protected function lockTransportCard()
        {
            $res = self::$db->query("
                UPDATE social_transport
                SET `lock` = 1
                WHERE   'passport' = {$this->passport}
            ");

            return $res;
        }

        protected function unlockTransportCard()
        {
            
            $res = self::$db->query("
                UPDATE social_transport
                SET `lock` = 0, unlock_expire = '{$this->expire_date}'
                WHERE   passport = '{$this->passport}'
            ");

            return $res;
        }   

        private function validateData($data)
        {
            if(strlen($data['name']) == 0){
                throw new Exception('Поле "Имя" должно быть заполнено.');
            }
            if(strlen($data['second_name']) == 0){
                throw new Exception('Поле "Фамилия" должно быть заполнено.');
            }
            if(strlen($data['passport']) == 0){
                throw new Exception('Поле "Паспорт" должно быть заполнено.');
            }
            if(strlen($data['email']) == 0){
                throw new Exception('Поле "Email" должно быть заполнено.');
            }
            if(strlen($data['phone']) == 0){
                throw new Exception('Поле "Телефон" должно быть заполнено.');
            }
            if(strlen($data['phone']) > 10){
                throw new Exception('В поле телефон должно быть не более 10 цифр');
            }
            if(strlen($data['inn']) == 0){
                throw new Exception('Поле "ИНН" должно быть заполнено.');
            }
            
            return true;
        }
    }