<?php

    class people_tax extends model
    {
        protected $additionalInfo = '';

        public function add(array $data)
        {
            $this->passport = $this->getPassport($data['passport']);
            $this->tax_id   = $this->getTaxId($data['inn']);

            if($this->checkData()){
                $this->save();
            }

            return true;
        }

        public function get($passport)
        {
            $result = self::$db->select($this->tableName, '*', ['passport' => $passport]);

            return reset($result);
        }

        protected function getTaxId($org)
        {
            if(is_numeric($org)){
                $result = self::$db->select('tax', 'id', ['inn' => $org]);
            }else{
                $result = self::$db->select('tax', 'id', ['organization_name' => $org]);
            }
            $result = reset($result);
            if($result === false){
                return false;
            }
            return $result['id'];
        }

        protected function checkPassport($passport)
        {
            $result = self::$db->select($this->tableName, '*', ['passport' => $passport]);
            $result = reset($result);
            if($result){
                $orgInfo = self::$db->select('tax', '*', ['id' => $result['tax_id']]);
                $orgInfo = reset($orgInfo);
                $this->additionalInfo = 'ИНН => '.$orgInfo['inn']. ' Название => '.$orgInfo['organization_name'];
            }
            return $result;
        }

        protected function getPassport($passport)
        {
            $result = self::$db->select('mfc', 'passport', ['passport' => $passport]);
            $result = reset($result);
            if($result === false){
                return false;
           }
           return $result['passport'];
        }

        protected function checkData()
        {
            if(!$this->passport){
                throw new Exception('Номер паспорта не верен');
            }
            if(!$this->tax_id){
                throw new Exception('ИНН или название фирмы введено не верно');
            }
            if($this->checkPassport($this->passport)){
                throw new Exception('Товарищ уже зарегистрирован на работе -> '.$this->additionalInfo);
            }

            return true;
        }
    }