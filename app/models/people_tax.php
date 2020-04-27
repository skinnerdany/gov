<?php

    class people_tax extends model
    {
        public function add(array $data)
        {
            $this->passport = $this->checkPassport($data['passport']);
            $this->id       = $this->getTaxId($data['inn']);
            
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

        protected function getTaxId($inn)
        {
            $result = self::$db->select('tax', 'id', ['inn' => $inn]);
            $result = reset($result);
            if($result === false){
                 $result = [];
            }
            return $result;
        }

        protected function checkPassport($passport)
        {
            $result = self::$db->select('mfc', 'passport', ['passport' => $passport]);
            $result = reset($result);
            if($result === false){
                $result = [];
           }
           return $result;
        }

        protected function checkData()
        {
            if(!$this->passport){
                throw new Exception('Номер паспорта не верен');
            }
            if(!$this->id){
                throw new Exception('ИНН не верен');
            }

            return true;
        }
    }